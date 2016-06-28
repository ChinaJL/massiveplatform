<?php 

// account user menu template

global $user;
global $conf;

// Only a loaded user has values for the fields.
$loaded = user_load($user->uid);
$user_score = 0;

// Set hidden fields
$reason_for_joining = "";
if (isset($loaded->field_reason_for_joining[LANGUAGE_NONE][0]['value'])) {
  $reason_for_joining = $loaded->field_reason_for_joining[LANGUAGE_NONE][0]['value'];
}
$user_score = tm_users_signup_score();
?>
<div id='tm-user-hidden-fields' style='display: none;'>
<input style='display: none;' id='reason_for_joining' value='<?php print urlencode($reason_for_joining);?>'>
<input style='display: none;' id='current_user_score' value='<?php print($user_score); ?>'>
<input style='display: none;' id='current_user_uid' value='<?php print($loaded->uid); ?>'>
</div>

<?php

// Set create member event message as js var
// We use this in jq_create_member_event_message()
$member_event_message = _tm_events_check_create_member_event_message($loaded);
drupal_add_js(array('tm_events' => array('create_member_event_message' => $member_event_message)), array('type' => 'setting'));

// Set avatar
if (empty($loaded->field_avatar)) {
  $img_uri = $conf["tm_images_default_field_avatar"];
}  else {
  $img_uri = $loaded->field_avatar[LANGUAGE_NONE][0]['uri'];
}

// If image is default, replace with random image from folder
if (isset($conf["tm_images_default_path"])) {
  if ($img_uri == $conf["tm_images_default_field_avatar"]) {
    $image_id = $loaded->uid;
    $cover_files = $conf["tm_images_default_avatar"];
    $image_index = $image_id % sizeof($cover_files);
    $img_uri = $conf["tm_images_default_path"] . $cover_files[$image_index];
  }
}

$image = theme('image_style', array(
  'style_name' => 'avatar',
  'path' => $img_uri,
  'alt' => 'user image',
  'title' => 'The user image',
));

?>

<h2>
  <a class="toggle" href="#account-menu-blk" data-dropd-toggle>
    <span class="hide"><?= t('Account'); ?></span>
    <?php if ($user->uid) : ?>
    <span class="avatar"><?php print $image; ?></span>
    <?php endif; ?>
  </a>
</h2>
<div id="account-menu-blk" class="inner dropd dropd-right" data-dropd>

  <?php if ($user->uid) : ?>
    <ul class="dropd-menu">
      <li>
        <div class="media-obj">
          <a href="<?php print url('user/' . $loaded->uid); ?>">
            <div class="media-fig">
              <span class="avatar"><?php print $image; ?></span>
            </div>
            <div class="media-bd">
              <strong><?php print check_plain($loaded->realname); ?></strong>
              <?php print t('View profile'); ?>
                <?php
                if ($user_score >= 100) {
                  $css_color = "green";
                }
                if ($user_score < 100) {
                  $css_color = "green";
                }
                if ($user_score < 50) {
                  $css_color = "orange";
                }
                if ($user_score < 20) {
                  $css_color = "orange"; // could be red but we don't want to alarm
                }
                ?>
                <span style='padding-left: 0.2em; font-size: smaller; font-style: normal; background-color: <?php print($css_color); ?>; color: #fff; border-radius: 2px; padding: 2px; padding-left: 4px; padding-right: 4px;'><?php print($user_score); ?>% complete</span>
            </div>
          </a>
        </div>
      </li>
    </ul>

    <ul class="dropd-menu dropdown-account-settings">
      <li><?php print l(t('Account settings'), 'user/' . $loaded->uid . '/edit', array('fragment' => 'user-account-options')); ?></li>
      <li><?php print l(t('Notification settings'), 'user/' . $loaded->uid . '/edit', array('fragment' => 'user-notifications-options')); ?></li>
      <li><?php print l(t('Invite members'), 'invite'); ?></li>
      <?php $twitter_data = tm_twitter_account_load($loaded->uid);
      if (!$twitter_data): ?>
      <li><?php print l(t('Connect with Twitter'), 'tm_twitter/oauth'); ?></li>
      <?php endif; ?>

      <?php if ($conf['tm_event_member_events_enabled'] == true) { ?>
        <?php if (_tm_events_check_create_member_event($loaded)) { ?>
        <li><?php print l(t('Add member event'), 'node/add/event'); ?></li>
        <?php } else {
          if ($member_event_message != "") { ?>
            <li><?php print l(t('Add member event'), 'javascript:jq_create_member_event_message();', array('fragment' => '','external'=>true)); ?></li>
          <?php } // end if teaser_message ?>
        <?php } // end else ?>
      <?php } // ense if tm_event_member_events_enabled?>

      <?php if (!in_array("approved user", $loaded->roles)) { 
      // show last time request info was flagged
      $who_flagged = flag_get_entity_flags("user", $loaded->uid, "approval_requested_by_user");
      if (sizeof($who_flagged) > 0) {
        foreach ($who_flagged as $flagger) {
          $difference = time() - $flagger->timestamp;
        }
        $flagged_time = format_interval($difference, 1) . " ago";
      ?>
      <li><?php print l(t('Approval requested (' . $flagged_time . ')'), 'javascript:jq_approval_already_requested();', array('fragment' => '','external'=>true)); ?></li>
      <?php } else { ?>
      <li><?php
        print l(t('Approve my account'), 'javascript:jq_request_approval(' . $loaded->uid . ')', array('fragment' => '','external'=>true, 'attributes' => array('class' => array('approval-link')))); ?></li>
      <?php
      } // end if flagged
      } // end if not approved
      ?>
    </ul>

  <?php
    $include_chapter_events = in_array("chapter leader", $loaded->roles);
    $member_events_html = tm_users_menu_events($loaded->uid, $include_chapter_events, 5);
    if ($member_events_html != ""): ?>
    <ul class="dropd-menu dropdown-company-profiles">
    <?php print $member_events_html; ?>
    </ul>
  <?php endif; ?>

  <?php if (in_array("approved user", $loaded->roles)) : ?>
    <ul class="dropd-menu dropdown-company-profiles">
      <?php print tm_users_menu_companies($loaded->uid); ?>
      <?php if (tm_organizations_check_user_can_create_company($loaded->uid)): ?>
      <li><?php print l(t('Add company profile'), 'node/add/organization'); ?></li>
      <?php endif; ?>
    </ul>
  <?php endif; ?>

  <?php if (!in_array("approved user", $loaded->roles)) : ?>
    <ul class="dropd-menu">
      <li><?php print l(t('Add company profile'), 'javascript:jq_alert("How can list my company profile?", "To create a company profile that can be discovered on our <a href=\"/companies\">company listings</a> page, your account needs to be approved first.<br><br><strong>What should I do next?</strong><br>Please complete your personal profile and request approval of your account. Once your account is approved this feature will be enabled.");', array('fragment' => '','external'=>true)); ?></li>
    </ul>
  <?php endif; ?>

    <ul class="dropd-menu dropdown-chapter-leader-resources">
        <?php print tm_users_menu_chapters($loaded->uid); ?>
        <?php
        if (in_array("chapter leader", $loaded->roles)): ?>
        <li>
          <?php
          print l(t('Chapter leader resources'), $conf['tm_tips_chapter_leaders_link'], array('fragment' => '','external'=>true)); 
          ?>
        </li> 
        <?php endif; ?>       
    </ul>

  <?php if ((in_array("moderator", $loaded->roles)) or (in_array("administrator", $loaded->roles))) : ?>
      <ul class="dropd-menu" id="account_menu_moderator_actions_show">
        <li><?php print l(t('Moderator tools'), 'javascript:tm_show_account_menu_moderator_actions();', array('fragment' => '','external'=>true)); ?></li>
      </ul>
      <ul class="dropd-menu dropdown-moderator-tools" id="account_menu_moderator_actions_items" style="display: none;">
        <li><?php print l(t('Add event'), 'node/add/event'); ?></li>
        <li><?php print l(t('Add chapter'), 'node/add/chapter'); ?></li>
        <li><?php print l(t('All unapproved members'), 'admin/unapproved-members'); ?></li>
        <li><?php print l(t('Community reports'), 'admin/tm_reports'); ?></li>
        <li><?php print l(t('Global insights'), 'admin/global_insights'); ?></li>
        <?php if (in_array("brand-editor", $loaded->roles) or in_array("administrator", $loaded->roles)): ?>
          <li><?php print l(t('Manage branding'), 'admin/branding'); ?></li>
        <?php endif; ?>
        <?php if (tm_users_download_global_newsletter_csv_check()): ?>
        <li><?php print l(t('Export newsletter subscribers'), 'javascript:jq_alert_no_buttons("<img style=\'width: 16px; height: 11px; margin-right: 4px;\' src=\'/sites/all/themes/tm/images/load-more-ajax-loader.gif\'> Please wait", "Your download will begin in a moment.<iframe style=\'display: none\' src=\'/admin/export_global_newsletter\'></iframe>");', array('fragment' => '','external'=>true)); ?></li>
        <?php endif; ?>
         <?php if (tm_users_download_chapter_leaders_csv_check()): ?>
        <li><?php print l(t('Export chapter leaders'), 'admin/export_chapter_leaders'); ?></li>
        <?php endif; ?>
      </ul>
  <?php endif; ?>

    <ul class="dropd-menu">
      <li><?php print l(t('Sign out'), 'user/logout'); ?></li>
    </ul>

  <?php else : ?>

    <h3 class="menu-blk-title">Sign in</h3>
    <p><?php print l(t('Twitter'), 'tm_twitter/oauth', array('attributes' => array('class' => 'twitter-login'))); ?></p>
    <i class="or">or</i>

    <?php $login_form = drupal_get_form('user_login_block'); ?>
    <?php print render($login_form); ?>

    <?php if (variable_get('user_register', 1)) : ?>
      <h3 class="menu-blk-title">New to <?php print($conf["tm_site_name"]);?>?</h3>
      <p><?php print l(t('Sign up now'), 'user/register', array('attributes' => array('title' => 'Create account', 'class' => array('cta-inline')))); ?></p>
    <?php endif; ?>

  <?php endif; ?>

</div>

<?php 

// Prompt user to request approval.
// Conditions:
// 1. User is not approved
// 2. User score > 50
// 3. User account has changed
// 4. User is not flagged as requested approval
// 5. (in jq_prompt_request_approval) user has not clicked "not yet" in past day
// Then show a prompt to request approval of account

$tm_account_changed = false;
$tm_account_changed_set = false;
if (isset($_SESSION["tm_account_changed"])) {
  $tm_account_changed_set = true;
  $tm_account_changed = $_SESSION["tm_account_changed"];
}

// show last time request info was flagged
$who_flagged = flag_get_entity_flags("user", $loaded->uid, "approval_requested_by_user");
$user_requested_approval = (sizeof($who_flagged) > 0);

if ((!in_array("approved user", $loaded->roles)) 
  and ($user_score > 50) 
  and ($tm_account_changed)
  and (!$user_requested_approval)) {
    
      // add cookie library  
      drupal_add_library('system', 'jquery.cookie');

      // Load the prompt
      drupal_add_js("jQuery(document).ready(function($) {
          setTimeout(function(){
            if (typeof jq_prompt_request_approval == 'function') { 
              jq_prompt_request_approval(" . $loaded->uid . ");
            }
          }, 1000);
          });
        ", "inline");
} 

//  unset account changed session
if ($tm_account_changed_set) {
  unset($_SESSION["tm_account_changed"]);
}
?>
