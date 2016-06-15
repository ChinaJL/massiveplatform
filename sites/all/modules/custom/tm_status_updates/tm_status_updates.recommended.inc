<?php

// tm_status_updates.recommended.inc - methods to display recommended members

/**
 * Fetch a list of recommended members uids in the newsfeed
 * If uid == 0, return for global users
 */
function tm_status_updates_get_recommended_members($uid, $limit = 5) {

	global $user;

	// todo: wrap this with method implementation from tm_newsfeed

	// anonymous user
	if ($uid == 0) {
		return array(1,1,1,1,1);
	}
	
	// logged in user
	return array($user->uid, $user->uid, $user->uid, $user->uid);
}

/**
 * Helper method to render recommended members list
 */
function tm_status_updated_render_recommended_members($account) {

	global $tm_status_updates_recommended_members_template;

	// fetch recommended users
	$recommended_members_uids = tm_status_updates_get_recommended_members($account->uid, 5);
	if (sizeof($recommended_members_uids) == 0) {
		return ""; // no results
	}

	// generate display
	$recommended_member_items = array();
	foreach($recommended_members_uids as $uid) {
		$account = user_load($uid);
		$recommended_member_items[] = tm_status_updates_render_recommended_member($account);

	}
	$recommended_members_html = implode("\n", $recommended_member_items);
	$recommended_html = str_replace("__RECOMMENDED_MEMBERS_TITLE__", "Recommended members", $tm_status_updates_recommended_members_template);
	$recommended_html = str_replace("__RECOMMENDED_ITEMS__", $recommended_members_html, $recommended_html);
	

	return $recommended_html;
}

/**
 * Render recommended member from template
 */
function tm_status_updates_render_recommended_member($account) {
	global $tm_status_updates_recommended_member_template;

	// member details
	$member_name = strip_tags($account->field_user_first_name[LANGUAGE_NONE][0]['value'] . " " . $account->field_user_last_name[LANGUAGE_NONE][0]['value']);
	$image_uri = _tm_users_get_avatar_uri($account);
	$image_url = image_style_url("avatar", $image_uri);
	$member_url = drupal_get_path_alias("user/" . $account->uid);

	// home chapter
	$home_chapter_url = "";
	$home_chapter_color = "#000000";
	$home_chapter_code = "";
	if (isset($account->field_home_chapter[LANGUAGE_NONE][0]['target_id'])) {
		$home_chapter_nid = $account->field_home_chapter[LANGUAGE_NONE][0]['target_id'];
		$home_chapter = node_load($home_chapter_nid);
		if ($home_chapter != null) {
			$home_chapter_url = drupal_get_path_alias("node/" . $home_chapter_nid);
			$home_chapter_color = $home_chapter->field_chapter_color[LANGUAGE_NONE][0]['rgb'];
			$home_chapter_code = $home_chapter->field_chapter_shortcode[LANGUAGE_NONE][0]['safe_value'];
		}
	}

	$html = str_replace("__MEMBER_URL__", $member_url, $tm_status_updates_recommended_member_template);
	$html = str_replace("__MEMBER_IMAGE_URL__", $image_url, $html);
	$html = str_replace("__MEMBER_NAME__", $member_name, $html);
	$html = str_replace("__MEMBER_HOME_CHAPTER_URL__", $home_chapter_url, $html);
	$html = str_replace("__MEMBER_HOME_CHAPTER_COLOR__", $home_chapter_color, $html);	
	$html = str_replace("__MEMBER_HOME_CHAPTER_CODE__", $home_chapter_code, $html);
	return $html;
}

global $tm_status_updates_recommended_members_template;
$tm_status_updates_recommended_members_template = <<<EOT
<section class="contained contained-block recommended">
	<header class="contained-head">
		<h1 class="prime-title recommended top">__RECOMMENDED_MEMBERS_TITLE__</h1>
	</header>
	<div class="contained-body recommended">
		<ul class="user-list related-list">
			__RECOMMENDED_ITEMS__
		</ul>
	</div>
	<!--<div class="more-link" style="font-size: 14px;">
		<a href='__RECOMMENDED_MORE_URL__'>__RECOMMENDED_MORE_TEXT__</a>&nbsp;
	</div>-->
</section>
EOT;

global $tm_status_updates_recommended_member_template;
$tm_status_updates_recommended_member_template = <<<EOT
<div class="view-content">
	<ul>
		<li>
			<article class="card contained user-profile view-mode-grid clearfix">
				<a href="__MEMBER_URL__">
					<div class="media">
						<div class="avatar">
							<span class="badge-user">
								<img typeof="foaf:Image" src="__MEMBER_IMAGE_URL__" width="256" height="256" alt="">
							</span>
						</div>
					</div>
					<div class="teaser">
						<h1 class="prime-title">__MEMBER_NAME__</h1>
					</div>
				</a>
				<div class="extra">
					<a class="chapter-sticker" href="__MEMBER_HOME_CHAPTER_URL__" style="background-color: __MEMBER_HOME_CHAPTER_COLOR__">__MEMBER_HOME_CHAPTER_CODE__</a>
				</div>
			</article>
		</li>
	</ul>
</div>
EOT;