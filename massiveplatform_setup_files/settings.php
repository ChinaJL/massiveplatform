<?php

/** Add these lines to your sites/default/settings.php **/

// MINIMAL / QUICK START  
// PLEASE REFER TO DRUPAL INSTALLATION GUIDE
//
// To create mysql database run these commands:
// create database massiveplatform;
// grant all on massiveplatform.* to massiveplatform@localhost identified by 'YOUR_DB_PASS';
//
// Uncomment the configuration below for quick start
/*$databases = array (
  'default' =>
  array (
    'default' =>
    array (
      'database' => 'massiveplatform',
      'username' => 'massiveplatform',
      'password' => 'YOUR_DB_PASS',
      'host' => 'localhost',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
      // uncomment two lines below if you are using utf8mb4
      //'charset' => 'utf8mb4',
      //'collation' => 'utf8mb4_general_ci',
    ),
  ),
);

$update_free_access = FALSE;
$drupal_hash_salt = 'RANDOM_STRING_HERE'; // generate a random string and insert here
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', (60 * 60 * 24 * 90)); // 90 days
ini_set('session.cookie_lifetime', (60 * 60 * 24 * 90)); // 90 days
*/

/** PERFORMANCE SETTINGS **/
$conf['cache'] = 1;                      // Page cache (disable if using geoip branding)
$conf['page_cache_maximum_age'] = 300;   // External cache TTL
$conf['preprocess_css'] = TRUE;          // Optimize css
$conf['preprocess_js'] = TRUE;           // Optimize javascript

/** MASSIVE PLATFORM **/
/** Add the following settings to your sites/default/settings.php file **/
$conf['install_profile'] = 'tm';
$conf['image_suppress_itok_output'] = TRUE; // supress ?itok so email images can be loaded by gmail
$conf['image_allow_insecure_derivatives'] = TRUE;

/** ADMIN PAGES **/
/** Additional admin pages that moderator can access **/
//$conf["tm_admin_moderator_whitelist"] = array("admin/your_own_page");

/** SIGN IN METHODS **/
/** If you just want password login only, disable Facebook and Twitter sign in **/
$conf['tm_signin_facebook'] = true; // allow signin with facebook
$conf['tm_signin_facebook_label'] = "Continue with Facebook"; // or Log in with Facebook
$conf['tm_signin_twitter'] = false; // allow signin with twitter
$conf['tm_signin_twitter_label'] = "Sign in with Twitter";
$conf['tm_signin_buttons'] = array("facebook"); // login button display
$conf['tm_signin_links'] = array("twitter"); // link display
$conf['tm_signin_title'] = "JOIN OUR COMMUNITY"; // message to display at top of login box
$conf['tm_signin_facebook_always_sync'] = true; // fill empty fields from Facebook when logging in
$conf['tm_signin_facebook_sync_avatar'] = true; // sync avatar picture
$conf['tm_signin_facebook_sync_cover'] = true; // sync cover picture

/** FACEBOOK OAUTH **/
$conf['simple_fb_connect_appid'] = ""; // app id - create one at https://developers.facebook.com/apps
$conf['simple_fb_connect_skey'] = ""; // secret key
$conf['simple_fb_connect_connect_url'] = "https://example.massiveplatform.com"; // our domain
$conf['simple_fb_connect_redirect_user_form'] = 0; // redirect to user form after register
$conf['simple_fb_connect_post_login_url'] = "user"; // redirect to profile page after login

/** TWITTER OAUTH **/
/** Required for Twitter authentication **/
$conf['tm_twitter_consumer_key'] = '';
$conf['tm_twitter_consumer_secret'] = '';

/** ACCOUNT MENU **/
// $conf['tm_users_account_menu_links'] = array("Visit Massive" => "http://massiveplatform.com"); // array of account links (optional)

/** WORDPRESS FEEDME **/
/** This calls a module hosted on wordpress to embed blog (plus other) content based on current page **/
/** You will need this wordpress plugin: https://github.com/travelmassive/massiveplatform-wordpress-feedme **/
$conf['tm_enable_wordpress_feedme'] = false;
$conf['tm_wordpress_feedme_url'] = "/blog/wp-content/plugins/tm-feeds/feedme.php";
$conf['tm_wordpress_feedme_frontpage_id'] = "1831";

/** LIMIT FOLLOW AND JOIN **/
/** NOTE: Administrator and chapter leaders do not have limits **/
$conf['tm_following_ratio_limit'] = '100'; // difference between following/followers (for approved members)
$conf['tm_following_ratio_limit_unapproved'] = '20'; // set to zero to disallow unapproved members from following and show a feature message
$conf['tm_following_ratio_limit_daily'] = '0.5'; // number of followers added to limit each day since approval
$conf['tm_chapter_join_limit'] = '16'; // "join" limit for the non chapter leaders
$conf['tm_add_company_limit'] = '8'; // maximum number of companies a user can add (no limit for chapter leaders, moderators)
$conf['tm_unapproved_follow_member'] = false; // allow unapproved members to follow other members
$conf['tm_unapproved_follow_company'] = true; // allow unapproved members to follow other organizations

/** COMPANY PROFILES **/
$conf['tm_add_company_enabled'] = true; // allow approved members to create company profiles

/** SETTINGS FOR EMAIL TEMPLATES **/
$conf['tm_site_name'] = "Massive"; // used by emails and in templates to refer to the site
$conf['tm_email_server_http'] = "https"; // http or https depending on your setup. Will be used in email settings
$conf['tm_email_server_url_domain'] = "example.massiveplatform.com"; // domain to use for links to site in emails
$conf['tm_email_signoff'] = "Cheers,<br>- The Massive Team"; // default email sign off at bottom of emails
$conf['tm_email_default_footer'] = "__UNSUBSCRIBE_LINK__<br>
Example Company LLC. 123 Smith St, San Francisco CA 94111<br> Phone +1 555-123-456 &middot; community@massiveplatform.com"; // used by emails and in templates to refer to the site
$conf['tm_announcement_copy_email'] = "community@massiveplatform.com"; // Send a copy of any announcement to this address
$conf['tm_announcement_reply_email'] = "commmunity@massiveplatform.com"; // Default reply_to address if left blank
$conf['tm_invitations_custom_message'] = "I'd like to invite you to Massive, a global community that connects industry insiders, leaders and innovators to collaborate and share ideas at locally organized events."; // tm_invitations_custom_message

/** TIP SETTINGS **/
$conf['tm_tips_start_chapter_link'] = "https://example.massiveplatform.com/blog/start-a-chapter-guide/"; // tm_tips_start_chapter_link
$conf['tm_tips_sponsor_page_link'] = "https://example.massiveplatform.com/blog/sponsors-guide/"; // tm_tips_start_chapter_link
$conf['tm_tips_chapter_leaders_link'] = "https://example.massiveplatform.com/blog/chapter-leader-resources/"; // tm_tips_chapter_leaders_guide
$conf["tm_reports_chapter_insights_tip"] = "Join our Facebook group to share tips with other members on growing your chapter and be part of our global team!"; // Display a tip on chapter insights page
// $conf["tm_tips_community_list"] = "Discover and follow other members and companies in our community with our <a href='/search'>Community Search</a>."; // optional - override community page tip

/** COMMUNITY VALUES URL **/
$conf['tm_community_values_url'] = "https://example.massiveplatform.com/blog/community-values/"; // tm_community_values_url

/** CONTACT AND NOTIFICATION EMAILS **/
$conf['tm_contact_page_email'] = "hello@massiveplatform.com"; // Where to send contact form emails to
$conf['tm_contact_page_contacts'] = array("media" => "Media and Press"); // optional: list of department titles
$conf['tm_contact_page_addresses'] = array("media" => "media@massiveplatform.com"); // optional: list of department email addresses
$conf['tm_user_remove_own_account_notify'] = 'community@massiveplatform.com'; // If user removes their account, who do we notify?

/** MEMBER LABELS **/
$conf["tm_member_label"] = "massive member"; // singular
$conf["tm_members_label"] = "massive members"; // plural
$conf["tm_approved_label"] = "Approved Member"; // title for approved member
$conf["tm_unapproved_label"] = "Guest Member"; // title for unapproved member
$conf["tm_approved_label_plural"] = "Approved Members"; // title for approved member
$conf["tm_unapproved_label_plural"] = "Guest Members"; // title for unapproved member
$conf["tm_request_approval_text"] = "Request approval"; // label for request approval link
$conf["tm_requested_approval_text"] = "Requested approval"; // label for requested approval link

/** OTHER LABELS **/
// $conf["tm_segment_label"] = "Industry Segment"; // optional - change the "industry" label 
// $conf["tm_segment_user_description"] = "Please select the industry segment that best applies to you."; // optional
// $conf["tm_segment_organization_description"] = "Please provide the segment which identifies the company the best."; // optional

/** MESSAGING OPTIONS **/
/** Allow approved members to message each other via email if they follow each other **/
/** Emails will be sent by notification system and reply-to set to the sender's email address **/
$conf['tm_messaging_enabled'] = true; // turn on or off email messaging if following each other
$conf['tm_messaging_wait_time'] = 1800; // number of seconds between messaging the same person
$conf['tm_messaging_limit_days'] = 14; // number of days to check for rate limit
$conf['tm_messaging_limit_max'] = 30; // limit of messages you can send to different people within period
$conf['tm_messaging_from_email'] = "communications@massiveplatform.com"; // from address. reply-to will be senders.

/** EVENT OPTIONS **/
$conf['tm_event_show_spots_left'] = 20; // show number of free seats when less than this number
$conf['tm_event_auto_register_waitlist'] = true; // if a member unregisters, automatically add next person from waitlist if there are free spots
$conf['tm_event_chapter_events_enabled'] = true; // allow chapters to create their own events
$conf['tm_event_company_events_enabled'] = true; // allow companies to create their own events
$conf['tm_event_member_events_enabled'] = true; // allow members to create their own events
$conf['tm_event_company_event_min_followers'] = 10; // how many followers a company needs to create an event. Set to 0 to disable.
$conf['tm_event_member_event_min_followers'] = 5; // how many followers a member needs to create an event. Set to 0 to disable.
$conf['tm_event_send_announcements_intro'] = "Get more people to your event by sending a great announcement. See our guide below."; // tip
$conf['tm_event_announcement_enable_cover_image'] = true; // enable including event cover image in announcement email
$conf['tm_event_online_timezones'] = array("America/Los_Angeles" => "Los Angeles", "America/New_York" => "New York", "Europe/London" => "London", "Europe/Athens" => "Athens", "Asia/Singapore" => "Singapore", "Australia/Sydney" => "Sydney"); // display online event date in these timezones
$conf['tm_event_title_placeholder_text'] = 'Write a clear and engaging event title'; // placeholder text for event title
$conf['tm_event_description_placeholder_text'] = 'Describe how fantastic your event will be and why people should attend.'; // placeholder text for event description
$conf['tm_event_follow_company'] = true; // follow company when joining company event
$conf['tm_event_follow_member'] = true; // follow member when joining member event
$conf['tm_event_restrict_announcement_rsvp'] = true; // if true, don't allow members to send announcement from external rsvp events
$conf["tm_event_approved_members_default"] = 1; // (default = 1) set default of approved members checkbox
$conf["tm_event_approved_members_title"] = "Approved Members Only"; // optional - set the title for approved members checkbox
$conf["tm_event_approved_members_description"] = "Check this box if you want to restrict registration and waitlist to members who are approved. Guest members won't be able to register."; // optional - set the description for the approved members description

/** SIGNUP PAGE SETTINGS **/
/** Provides a list of validated options on the signup page to indicate how the user connects with the community **/
/** These options are not saved to the user account **/
/** Replace COMMUNITY_INDUSTRY with your own industry and customize questions **/
$conf["tm_community_values_description"] = "Our community is for industry insiders, leaders, and innovators.";
$conf["tm_community_values_options"] = array(
    0 => t('I work in the COMMUNITY_INDUSTRY industry (example: startup, service provider)'),
    1 => t('I work with COMMUNITY_INDUSTRY industry customers (example: marketing, PR)'),
    2 => t('I create COMMUNITY_INDUSTRY content (example: blogger, journalist, presenter)'),
    3 => t('I study COMMUNITY_INDUSTRY or a closely related course'),
    4 => t('I am signing up as an COMMUNITY_INDUSTRY company / brand'),
    5 => t('I love COMMUNITY_INDUSTRY'));
$conf["tm_community_values_options_validate"] = array(
    0 => array("valid" => true, "message" => ""),
    1 => array("valid" => true, "message" => ""),
    2 => array("valid" => true, "message" => ""),
    3 => array("valid" => true, "message" => ""),
    4 => array("valid" => false, "message" => "<strong>Massive accounts are for individuals.</strong> Please choose a community connection that applies to you personally. Once your account is approved you can create a company profile."),
    5 => array("valid" => false, "message" => "<strong>Why can't I join?</strong> Our community provides professional networking and development for members of the COMMUNITY_INDUSTRY industry. Instead please become a <a href='https://example.massiveplatform.com/blog/join-mailing-list/'>friend of our community</a>."));

/** PROFILE QUESTIONS **/
/** Specify the 5 questions users are asked in their profile **/
/** These answers are optional and shown on the public profile page **/
/** Note: Once you launch, you can't change these **/
$conf["tm_field_user_question_1_title"] = "What is your favorite thing?"; // ie: "What is your favorite travel destination?";
$conf["tm_field_user_question_2_title"] = "What do you dream about?"; // ie: Where do you dream of traveling to?";
$conf["tm_field_user_question_3_title"] = "How did you get into this space?"; // ie: "What was your first travel job?";
$conf["tm_field_user_question_4_title"] = "What do you want to learn more about?"; // ie: "What do you want to learn more about?";
$conf["tm_field_user_question_5_title"] = "What do you want to contribute?"; // ie: "Three words that describe why we should travel?";

/** SITE SPECIFIC TITLE AND DESCRIPTIONS IN PROFILE AND NODE EDIT **/
/** Customize the example proviced to members when filling out their profile **/
$conf["tm_field_job_role_description"] = "examples: Founder, CEO, VP Marketing, Social Media Manager";
$conf["tm_field_friendly_url_title"] = "Massive URL (example.massiveplatform.com/your-name)";
$conf["tm_field_friendly_url_description"] = "Make your profile available through a friendly URL such as https://example.massiveplatform.com/your-name.<br>Example: \"your-name\"";
$conf["tm_field_company_friendly_url_title"] = "Massive URL (example.massiveplatform.com/your-company)";
$conf["tm_field_company_friendly_url_description"] = "Make your company profile available through a friendly URL such as https://example.massiveplatform.com/your-company.<br>Example: \"your-company\"";

/** WELCOME MESSAGE WHEN APPROVED **/
/** Include a welcome message and a call to action when the member is approved **/
$conf["tm_notification_approval_welcome_message"] = '<strong>WELCOME TO OUR COMMUNITY</strong>
<br>
<br>Welcome to our community and we hope that you enjoy the benefits of being a member.
<br>Please invite your friends and colleagues in the industry to join us.
<br>
<br>If there\'s a chapter in your city, then please join it and attend our events to connect with like-minded members.
If you can\'t find a chapter, why don\'t you consider starting a Massive chapter? Get in touch with us to find out more.';

/** MEMBERSHIP CRITERIA PROVIDED IF MEMBER FLAGGED AS NON-COMMUNITY MEMBER **/
/** Replace COMMUNITY_INDUSTRY with your own industry and customize criteria **/
$conf["tm_notification_moderation_non_community_message"] = 'To be a member of the Massive community, you must demonstrate one of the following:
<br>* You are active in the COMMUNITY_INDUSTRY industry (example: startup, service provider)
<br>* You are active in a field closely related to the COMMUNITY_INDUSTRY industry (example: PR)
<br>* You are studying COMMUNITY_INDUSTRY or a closely related course
<br>* Any other criteria that reasonably demonstrates a professional connection to the COMMUNITY_INDUSTRY industry.
<br>* You can read our community values at https://example.massiveplatform.com/blog/community-values/
<br>
<br>
<br><strong>But I love COMMUNITY_INDUSTRY, can I join still?</strong>
<br>Our community provides professional networking and development for members of the COMMUNITY_INDUSTRY industry.';

/** FRONTPAGE CONFIGURATION VARIABLES **/
//$conf['tm_frontpage_launch_message'] = "We've just launched our new community platform. Read our <a style='color: #fff; text-decoration: underline;' href='/blog/'>announcement</a>."; // launch message (comment out to disable)
$conf['tm_frontpage_show_anon_stats'] = array('members', 'chapters', 'connections'); // Options: members, chapters, organizations, connections, mutual_follows
$conf['tm_frontpage_title_anon'] = 'Be Part Of Massive.';
$conf['tm_frontpage_title_members'] = 'Welcome back, [current-user:name].';
$conf['tm_frontpage_description_anon'] = 'Massive connects thousands of people to meet, learn and collaborate at free events all around the world. We are a global community of industry insiders, leaders, and innovators.';
$conf['tm_frontpage_description_members'] = 'Welcome to the Massive Community. We are the community of industry insiders, leaders, and innovators. Join your local chapter, connect with other members, or apply to start a chapter in your city.';
$conf['tm_frontpage_meta_og_title'] = "Massive";
$conf['tm_frontpage_meta_og_image'] = ""; // url for social sharing image of front page
$conf['tm_frontpage_meta_description'] = "Massive connects thousands of members to meet, learn and collaborate at free events all around the world. We are a global community of industry insiders, leaders, and innovators.";

/** EVENT TYPES **/
/** Customize the event types for your community **/
$conf['tm_event_types_system'] = array("community" => "Chapter Event", "member" => "Member Event", "company" => "Company Event"); // DO NOT ALTER. These are system event types.
$conf['tm_event_types_custom'] = array("workshop" => "Workshop", "conference" => "Conference"); // add your own custom events here
$conf['tm_event_types'] = array_merge($conf['tm_event_types_system'], $conf['tm_event_types_custom']);
$conf['tm_event_types_display'] = array("all" => "All Events", "conference" => "Conferences", "member" => "Member Events"); // event types to select on /event page
$conf['tm_event_types_tips'] = array("workshop" => "Learn and share with other members around the world. Do you have an idea for a workshop you would like to attend or host? Please <a href='/contact'>let us know</a>.", "conference" => "We're proud community partners with the world's leading industry conferences and exhibitions. <a href='/blog/about-us'>Learn more</a>", "member" => "Do you have a local event you want to share with the community? Add an event from your profile page or <a href='/contact'>contact us</a> to learn more.");
$conf['tm_event_types_default'] = "all"; // default setting for /events listing
$conf['tm_event_types_sticker_icon_color'] = "#000000"; // color of sticker for non-chapter events
$conf['tm_event_types_edit_tips'] = array();
$conf['tm_event_types_edit_tips']['community'] = "Make your event stand out. Here's a few <a target='_blank' href='#'>tips</a>.";
$conf['tm_event_types_edit_tips']['company'] = "Create a company event in our community.<br>Please follow our <a target='_blank' href='" . $conf['tm_community_values_url'] . "'>community guidelines</a>.";
$conf['tm_event_types_edit_tips']['member'] = "Create a member event in our community.<br>Please follow our <a target='_blank' href='" . $conf['tm_community_values_url'] . "'>community guidelines</a>.";
$conf['tm_event_types_labels'] = array("workshop" => "workshop"); // optional label when referencing event type. ie: "Attend this workshop" 

/** PROFILE AND COMPANY LINK FIELDS **/
/** Options available: website, twitter, facebook, linkedin, instagram, youtube, vimeo, snapchat **/
$conf["tm_users_link_fields"] = array('website', 'twitter', 'facebook', 'linkedin', 'instagram', 'youtube', 'vimeo', 'snapchat'); /* also: strava */
$conf["tm_organizations_link_fields"] = array('website', 'twitter', 'facebook', 'linkedin', 'instagram', 'youtube', 'vimeo');

/** RANDOMIZE DEFAULT IMAGES **/
/** After editing, run drush image-flush and ensure image folder is writeable by web server **/
$conf["tm_images_default_path"] = "public://default_images/"; // Unset if you don't want to use random default images
$conf["tm_images_default_field_avatar"] = "public://default_images/avatar-default.png"; // The default image for field_avatar
$conf["tm_images_default_field_image"] = "public://default_images/cover-default.png"; // The default image for field_image
$conf["tm_images_default_avatar"] = array("default_avatar_1.jpg", "default_avatar_2.jpg", "default_avatar_3.jpg");
$conf["tm_images_default_cover_user"] = array("default_cover_user_1.jpg", "default_cover_user_2.jpg", "default_cover_user_3.jpg");
$conf["tm_images_default_cover_organization"] = array("default_cover_organization_1.jpg", "default_cover_organization_2.jpg", "default_cover_organization_3.jpg");
$conf["tm_images_default_cover_event"] = array("default_cover_event_1.jpg", "default_cover_event_2.jpg", "default_cover_event_3.jpg");
$conf["tm_images_default_cover_chapter"] = array("default_cover_chapter_1.jpg");

/** FEATURED MEMBER SETTING **/
/** Set labels that members will receieve when they are set as featured members of events **/
$conf["tm_featured_members_event_types"] = array("all" => "Special Guests", "community" => "Special Guests", "workshop" => "Workshop Leaders", "conference" => "Speakers");
$conf["tm_featured_members_badge_text"] = "A Massive Rockstar!";

/** ALLOW SHORT MESSAGE TO BE SENT ON FOLLOW **/
$conf["tm_following_enable_message_user"] = true;
$conf["tm_following_enable_message_organization"] = true;

/** CHAPTER SETTINGS **/
$conf["tm_chapters_allow_edit_chapter_leaders"] = false; // Allow chapter leaders to edit leaders for their own chapter (default false)
$conf["tm_chapters_groups_enabled"] = true; // Allow group chapters. Exposes the /groups url.
$conf["tm_chapters_leaders_needed_max_days_since_event"] = 180; // show the help needed message if no events since this many days
$conf["tm_chapters_leaders_needed_message"] = "We're looking for Chapter Leaders to help organize regular events for this chapter. Is that you? <a href='/contact'>Apply to lead this chapter</a>."; // message to display if chapter leader needed
$conf["tm_chapters_community_search_filter"] = "country"; // filter /community page by country (default) or chapter

/** THEME SETTINGS **/
$conf["tm_theme_meta_color"] = "#007DB7"; // Set the theme color for mobile Android, iOS 

/** SEARCH SETTINGS **/
$conf["tm_search_api_sort_method"] = "followers"; // sort by: followers, newest, or default
$conf["tm_search_api_results_per_page"] = 10; // how many results to show per page
$conf["tm_search_api_max_search_terms"] = 8; // max terms allowed in search
$conf["tm_search_api_top_results_display"] = 5; // perform a quote search first, and insert N results at top
$conf["tm_search_api_top_results_strip_spaces"] = true; // if enabled, will also search for string with no spaces in top results
$conf["tm_search_cache_results_seconds"] = 60; // set to 0 to disable cache and rely on search_api_db cache
$conf["tm_search_api_catch_exceptions"] = true; // will display friendly error message if error occurs
$conf["tm_search_api_pluralize_keywords"] = true; // search for keyword plurals - ie: nomad = "nomad", "nomads"
$conf["tm_search_api_ignore_keywords_people"] = array(); // ignore these keywords when searching people
$conf["tm_search_api_ignore_keywords_events"] = array(); // ignore these keywords when searching events
$conf["tm_search_api_ignore_keywords_chapters"] = array(); // ignore these keywords when searching chapters
$conf["tm_search_api_ignore_keywords_companies"] = array(); // ignore thesee keywords when searching companies
$conf["tm_search_open_external"] = true; // open search result in new window
$conf['tm_search_meta_og_title'] = "Massive Search";
//$conf['tm_search_meta_og_image'] = ""; // url of image to use for social sharing
$conf['tm_search_meta_description'] = "Search our community.";
$conf['tm_search_meta_opensearch_title'] = "example.massiveplatform.com"; // title for opensearch header link
$conf['tm_search_api_example_search'] = "Prague"; // example search option is user tries empty search

// example search tips
// customise these examples to suit your community segments and data
$conf["tm_search_api_tips"] = array(
  "Founders in Italy: <i><a href='#' class='search-example' data-search-example='role:founder in:Italy'>role:founder in:Italy</i></a>",
  "Startups in San Francisco: <i><a href='#' class='search-example' data-search-example='startup in:\"San Francisco\"'>startup in:\"San Francisco\"</i></a>",
  "Marketing in Miami: <i><a href='#' class='search-example' data-search-example='segment:marketing in:Miami'>segment:marketing in:Miami</a></i>",
  "Investors: <i><a href='#' class='search-example' data-search-example='investors'>investors</a></i>",
  "Search by topic. Example <i><a href='#' class='search-example' data-search-example='photographer'>photographer</a></i>",
  "Filter by location. Example: <i><a href='#' class='search-example' data-search-example='in:Tokyo'>in:Tokyo</a></i>",
  "Filter by segment. Example: <i><a href='#' class='search-example' data-search-example='segment:marketing'>segment:marketing</a></i>",
  "Filter by role. Example: <i><a href='#' class='search-example' data-search-example='role:manager'>role:manager</a></i>",
  "Filter by company. Example: <i><a href='#' class='search-example' data-search-example='at:Massive'>at:Massive</a></i>",
  "Exact match a name. Example: <i><a href='#' class='search-example' data-search-example='\"John Appleseed\"'>\"John Appleseed\"</a></i>",
  "Find a company. Example: <i><a href='#' class='search-example' data-search-example='\"Awesome Company\"'>\"Awesome Company\"</a></i>",
  "Help us improve search. Send us <i><a href='/contact'>feedback</a></i>."
);

// what to show if no results
$conf["tm_search_api_no_results_text"] = "<strong>There's more places we can help you search...</strong>
        <ul>
          <li><a class='search-external-blog' target='_blank' href='#'>Search on our blog</a> for news articles and interviews.</li>
          <li>Or, try a <a class='search-external-google' target='_blank' href='#'>Google Search</a> on our site.</li>
          <li>Still can't find it? Get in <a target='_blank' href='/contact'>contact with us</a>.</li>
        </ul>";

// help text to show
$conf["tm_search_api_help_text"] = "<p style='font-size: 16px;'><strong>More places</strong></p>
        <ul>
          <li><a class='search-external-blog' target='_blank' href='#'>Search on our blog</a></li>
          <li>Or, try a <a class='search-external-google' target='_blank' href='#'>Google Search</a></li>
        </ul>
<p style='border-top: 1px solid #eee; padding-top: 1rem; margin-right: 1.2rem; font-size: 10pt; color: #79828c;'>
Welcome to Massive Search - an open database of the EXAMPLE_INDUSTRY industry. Help us keep this up to date by adding your <a href='/companies'>company profile</a>.
</p>
";

// search tips to show
// customize these for your community
$conf["tm_search_api_help_tips"] = "<p style='font-size: 16px;'><strong>Example filters</strong></p>
<p style='border-top: 1px solid #eee; padding-top: 1rem; margin-right: 1.2rem; font-size: 10pt; color: #79828c;'>
Add options to your search text to filter your results. Here's some examples.
  <ul>
    <li><a href='#' class='search-example' data-search-example='in: \"New York\"'>in: \"New York\"</a></li>
    <li><a href='#' class='search-example' data-search-example='in: Thailand'>in: Thailand</a></li>
    <li><a href='#' class='search-example' data-search-example='segment: marketing'>segment: marketing</a></li>
    <li><a href='#' class='search-example' data-search-example='role: manager'>role: manager</a></li>
    <li><a href='#' class='search-example' data-search-example='at: Massive'>at: Massive</a></li>
    <li><a href='#' class='search-example' data-search-example='has: snapchat'>has: snapchat</a></li>
  </ul>
</p>";

/** EU COOKIE CONSENT **/
$conf["tm_cookieconsent_enable"] = true; // enable EU cookie consent notice
$conf["tm_cookieconsent_privacy_url"] = ""; // link to privacy policy
$conf["tm_cookieconsent_check_geoip_is_eu"] = true; // use geoip to limit cookie consent to eu visitors

/** NOTIFICATION UNSUBSCRIBE LINK **/
$conf["tm_notifications_subscription_secret_key"] = "randomstring123"; // random string

/** COVER VIDEOS **/
/** Allow members to use a Youtube video as their cover **/
$conf["tm_cover_videos_enabled"] = true; // enable cover video

// GOOGLE ANALYTICS REPORT **/
// Base path to Google Analytics drilldown report
// Replace GOOGLE_ANALYTICS_HASH from your own GA report URL
$conf["tm_google_analytics_report_path"] = "https://analytics.google.com/analytics/web/?authuser=1#report/content-drilldown/GOOGLE_ANALYTICS_HASH/%3F_u.dateOption%3Dlast30days%26explorer-table.plotKeys%3D%5B%5D%26_r.drilldown%3D";

/** GEO IP MODULE **/
/** Enable maxmind for geoip **/
$conf['tm_geoip_maxmind_db'] = '/usr/local/share/GeoIP/GeoIP2-City.mmd'; // path to maxmind geoip datbase
//$conf['tm_geoip_fake_ip'] = '183.108.246.31'; // simulate a visitor ip address for testing geoip module

/** SITE BRANDING **/
//Base site branding
$conf['tm_branding_enabled'] = true; // set to false to disable brand processing and only use config variables
$conf['tm_branding_frontpage_url'] = '/'; // link to frontpage url
$conf['tm_branding_assets_base_path'] = '/sites/default/files/site_branding'; // path to site_branding assets 
$conf['tm_branding_favicon'] = '/sites/default/files/site_branding/apple_touch_icons/apple-touch-icon-72x72.png'; // default favicon (ico)
$conf['tm_branding_apple_touch_icon_path'] = '/sites/default/files/site_branding/apple_touch_icons/'; // path to apple_touch_icons 
$conf['tm_branding_frontpage_image'] = '/sites/default/files/site_branding/frontpage_image/default_frontpage_image.jpg'; // frontpage image (jpg)
$conf['tm_branding_frontpage_opacity'] = 0.8; // frontpage image/video opacity
$conf['tm_branding_frontpage_video_url'] = ''; // frontpage video url (ie: 720p mp4 stream url from vimeo). Leave blank to disable
$conf['tm_branding_frontpage_video_text'] = 'Check out our awesome events'; // label for frontpage video
$conf['tm_branding_frontpage_video_link'] = '/events'; // link for frontpage video
$conf['tm_branding_frontpage_block_html'] = '<div style="padding: 2rem; color: #fff;">This is a custom frontpage block</div>'; // front page block html
$conf['tm_branding_header_logo'] = '/sites/default/files/site_branding/header_logo/default_header_logo.svg'; // default header logo (svg)
$conf['tm_branding_footer_logo'] = '/sites/default/files/site_branding/footer_logo/default_footer_logo.svg'; // default footer logo (svg)
$conf['tm_branding_search_page_banner'] = '/sites/default/files/site_branding/search_banner/default_search_banner.png'; // banner image to show on search page
$conf['tm_branding_search_page_link'] = ''; // link for search page banner
$conf['tm_branding_email_footer_html'] = ''; // insert text into email notification (excluding event announcements) 

// site navigation links
$conf["tm_branding_menu_html"] = "
<ul class='links'>
  <li class='menu-1383 first'><a href='/chapters'>Chapters</a></li>
  <li class='menu-368'><a href='/events'>Events</a></li>
  <li class='menu-1456'><a href='/community'>People</a></li>
  <li class='menu-1363'><a href='/companies'>Companies</a></li>
  <li class='menu-1457 last'><a href='/blog/'>News</a></li>
</ul>";

// footer html 
$conf['tm_branding_footer_html'] = "
<div class='row'>
  <nav id='foot-nav' role='navigation'>
    <div class='inner'>

      <section class='foot'>
        <h2>More Massive</h2>
          <ul class='links'>
          <li class='menu first'><a href='/blog/about-us/'>About</a></li>
          <li class='menu-770'><a href='/contact' class='active-trail active'>Contact</a></li>
          <li class='menu-770'><a href='/blog/community-values/' class='active-trail active'>Community Values</a></li>
          <li class='menu-770'><a href='/blog/start-a-chapter-guide/'>Start A Chapter</a></li>
          <li class='menu-770'><a href='/blog/media-kit/'>Media kit</a></li>
          <li class='menu-770'><a href='/sponsors'>Sponsors</a></li>
          <li class='menu-770 last'><a href='/blog'>Blog</a></li>
        </ul>
      </section>

      <section class='social'>
        <h2>Follow us</h2>
        <ul class='links'>
          <li class='menu-339 first'><a href='http://twitter.com/' title='Massive on Twitter' class='twitter' target='_blank'>Twitter</a></li>
          <li class='menu-340'><a href='https://www.facebook.com/' title='Massive on Facebook' class='facebook' target='_blank'>Facebook</a></li>
          <li class='menu-337'><a href='http://instagram.com/' title='See Massive on Instagram' class='instagram' target='_blank'>Instagram</a></li>
          <li class='menu-338'><a href='http://www.linkedin.com/' title='Massive on Linkedin' class='linkedin' target='_blank'>Linkedin</a></li>
          <li class='menu-1478'><a href='https://www.youtube.com/' title='See Massive on YouTube' class='youtube' target='_blank'>YouTube</a></li>
          <li class='menu-1479'><a href='https://vimeo.com/' title='Massive on Vimeo' class='vimeo' target='_blank'>Vimeo</a></li>
          <li class='menu-1603 last'><a href='https://www.snapchat.com/' title='Massive on Snapchat' class='snapchat' target='_blank'>Snapchat</a></li>
        </ul>
      </section>

    </div>
  </nav>

  <div id='foot-credits'>
    <p>
      <strong class='logo'>
      <a title='Home' rel='home' href='__FRONTPAGE_URL__'>
      <img src='__FOOTER_LOGO_URL__' alt='Home' width='104' height='48' />
      <span>__SITE_NAME__</span>
      </a>
      </strong>
      <small><time datetime='2011/__CURRENT_YEAR__'>&copy; 2011-__CURRENT_YEAR__ All Rights Reserved</time>Example Company LLC</small>
      </p>
      <p>Powered by <a href='http://massiveplatform.com'>Massive Platform</a><br>
      Made with <span style='color: #e93f33 !important;'>&hearts;</span> around the world
      <br><span style='font-size: 9pt;'><a href='/content/terms-use'>Terms</a> &middot; <a href='/content/privacy-policy'>Privacy</a>
      </span>
    </p>
  </div>

</div>";

// front page sub-footer html
$conf["tm_branding_footer_level1_html"] = "
<section id='footer-sponsors'>
  <span class='sponsors-headline' style='float: left;'>COMMUNITY SPONSORS</span>
  <span style='float: left; padding-left: 1.2rem;'><a href='https://joviam.com'><img alt='Joviam cloud hosting' style='height: 25px;' src='__ASSETS_BASE_PATH__/assets/joviam_logo.png'></span>
</section>";

// secondary level sub-footer html (ie: non frontpage)
$conf["tm_branding_footer_level2_html"] = "";

// include custom css for branding (do not include <style> tag)
$conf["tm_branding_include_css"] = "";

// include custom js for branding ( do not include <script> tag)
$conf["tm_branding_include_js"] = "";

/** STATUS UPDATES **/
$conf["tm_status_updates_enabled"] = true; // enable status updates
$conf['tm_status_updates_frontpage_feed'] = true; // display status updates and flags on front page
$conf["tm_status_updates_placeholders"] = array("Post a news update...", "What are you working on?", "Share an achievement with the community...");
$conf["tm_status_updates_silence_uids"] = array(); // silence any spamming members from newsfeeds
$conf["tm_status_updates_hide_recommended_uids"] = array(1, 10452); // hide members from recommended members lists
$conf["tm_status_updates_view_counter_no_cron"] = true; // for larger sites, set to fale and run "drush status-updates-index-view-counter" daily
$conf["tm_status_updates_preview_enabled"] = true; // enable link preview
$conf["tm_status_updates_preview_curl_timeout"] = 8; // max seconds to wait to fetch preview image
$conf["tm_status_updates_preview_curl_max_mb"] = 8; // max mb curl will download before ending connection
$conf["tm_status_updates_preview_image_path"] = "public://preview_link_images/"; // where to save preview images
$conf["tm_status_updates_preview_image_width"] = 512; // max width to resize preview image
$conf["tm_status_updates_preview_image_height"] = 512; // min width to resize preview image
$conf["tm_status_updates_preview_image_quality"] = 80; // image quality of preview images
$conf["tm_status_updates_preview_max_per_day"] = 200; // rate limit how many preview links a user can gererate in a day
//$conf["tm_status_updates_preview_utf_decode"] = true; // perform utf8_decode on incorrectly parsed multibyte utf8 characters
$conf["tm_status_updates_views_popular"] = 100; // how many views before shown as popular
$conf["tm_status_updates_google_maps_api_key"] = "API_KEY"; // your google maps client-side api key for location lookups
$conf["tm_status_updates_profile_display_days"] = 14; // show latest update on profile for how many days
$conf["tm_status_updates_limit_results_days"] = 30; // how far back to show results
$conf["tm_status_updates_items_per_load"] = 50; // how many items to show per load
$conf["tm_status_updates_show_featured"] = 2; // how many featured items to display on news feed
$conf["tm_status_updates_custom_message"] = array(); // custom messages for newsfeed display
$conf["tm_status_updates_custom_message"]["global"] = "Got a press release? Tag it <a href='/newsfeed/tags/news'>#news</a> to share with the community";
$conf["tm_status_updates_custom_message"]["newsfeed"] = "Share an update to your followers, or view the <a href='/newsfeed/global'>global news feed</a>";
$conf["tm_status_updates_meta_og_title"] = "Massive News Feed";
//$conf['tm_status_updates_meta_og_image"] = "";
$conf["tm_status_updates_meta_description"] = "Share the latest news with our community on your news feed.";
$conf["tm_status_updates_unapproved_message"] = "Your updates won't be published until your account is approved."; // display banner to unapproved members

/** NEWSFEED EMAIL NOTIFICATIONS **/
/** You will need to run a cron task to schedule newsfeed items **/
/** See the tm_newsfeed.module for instructions **/ 
$conf["tm_newsfeed_send_notifications"] = true; // enable sending newsfeed notifications
$conf['tm_newsfeed_daily_notification_time'] = "10:00:00"; // time of day to send daily notifications
$conf['tm_newsfeed_weekly_notification_time'] = "11:00:00"; // time of day to send weekly notifications
$conf['tm_newsfeed_moderator_preview'] = true; // show user's notification preview for moderators
$conf['tm_newsfeeds_email_utm_campaign'] = 'newsfeed&utm_medium=newsletter&utm_source=email'; // append ?utm_campaign= to email links
// $conf['tm_newsfeed_schedule_test_mod_userid'] = 10; // (uncomment to enable) enable schedules for selected users by mod

// external api feeds
$conf["tm_newsfeed_curl_timeout"] = 8; // seconds for curl timeout
$conf["tm_newsfeed_curl_check_certificate"] = false; // check ssl certificate
$conf["tm_newsfeed_marketplace_enabled"] = false; // enable marketplace newsfeed
$conf["tm_newsfeed_marketplace_api_url"] = ""; // url for marketplace api
$conf["tm_newsfeed_marketplace_cache"] = 60; // how long to cache results in seconds
// $conf["tm_newsfeed_marketplace_api_userpass"] = "user:pass"; // uncomment to use basic httpauth 
$conf["tm_newsfeed_blog_enabled"] = false; // enable blog newsfeed
$conf["tm_newsfeed_blog_api_url"] = ""; // url for blog api
$conf["tm_newsfeed_blog_cache"] = 60; // how long to cache results in seconds
// $conf["tm_newsfeed_blog_api_userpass"] = "user:pass"; // uncomment to use basic httpauth 
$conf["tm_newsfeed_discuss_enabled"] = false; // enable discussions newsfeed
$conf["tm_newsfeed_discuss_api_url"] = ""; // url for discussions api
$conf["tm_newsfeed_discuss_cache"] = 60; // how long to cache results in seconds
// $conf["tm_newsfeed_discuss_api_userpass"] = "user:pass"; // uncomment to use basic httpauth 
// $conf["tm_newsfeed_discuss_classes"] = array(); // optional: always include categories with these classes

// base email subject line
$conf['tm_newsfeed_subject_base'] = "What's happening in the community";
$conf['tm_newsfeed_subject_base_daily'] = "Your daily community update";
$conf['tm_newsfeed_subject_base_weekly'] = "This week in the community";

// subject extra text if no updates available to customise with
$conf['tm_newsfeed_subject_extra_fallbacks'] = array(
  "(Events to attend + more)",
  "(Blog posts not to be missed + more)",
  "(New users to follow + more)"
  );

// email tips
$conf["tm_newsfeed_email_tip_not_approved"] = "Your profile is not approved - please complete your <a href='__USER_PROFILE_URL__'>profile</a> and request approval";
$conf["tm_newsfeed_email_tip_not_following"] = "You aren't following anyone - connect with other members in the community to receive updates";
$conf["tm_newsfeed_email_tip_no_chapter"] = "You haven't joined a chapter yet - join a chapter near you to receive local updates.";
$conf['tm_newsfeed_email_more_tips'] = array(); // create additional tips that will be cycled through
$conf['tm_newsfeed_email_more_tips'][] = "Post a status update to share your latest news with your followers.";

// the headers for the email sections
$conf['tm_newsfeed_email_section_headers'] = array(
  'blog_posts' => 'New blog posts',
  'discussions' => 'Trending discussions',
  'jobs' => 'Jobs and opportunities',
  'new_members' => 'New members in your network',
  'new_companies' => 'New companies in your network',
  'updates' => 'Latest status updates',
  'events' => 'Upcoming events'
  );

// greetings to cycle through
$conf['tm_newsfeed_email_greetings'] = array(
  "Hello",
  "Hey",
  "Hola",
  "Konnichiwa"
  );

// opening lines to cycle through
$conf['tm_newsfeed_email_opening_lines'] = array(
  "Here’s what’s been happening at Massive.",
  "Check out what’s been happening at Massive."
  );

// closing lines to cycle through
$conf['tm_newsfeed_email_quotes'] = array(
  array("text" => "Travel makes one modest, you see what a tiny place you occupy in the world.",
        "author" => "Gustave Flaubert"),
  array("text" => "Oh the places you'll go!",
        "author" => "Dr. Seuss"),
  array("text" => "Investment in travel is an investment in yourself.",
        "author" => "Matthew Karsten")
  );

// start of feedback line and text of link
$conf['tm_newsfeed_feedback_base'] = 'Feedback? Suggestions?';
$conf['tm_newsfeed_feedback_link_text'] = 'Let us know';


/* EVENT PAYMENT SETTINGS */
/** Optional event payments settings **/
/** Note: this requires a stripe payments endpoint which is not provided in this distribution **/
/** If you would like to process event payments, please get in contact with the author. **/
/*
$conf["tm_payments_stripe_publishable_key"] = "publishable"; // stripe publishable key
$conf["tm_payments_stripe_image_url"] = '/sites/all/themes/tm/images/travel_massive_stripe_payment_icon.png'; // stripe image url
$conf["tm_payments_process_url"] = "https://example.massiveplatform.com/payments/process.php"; // external payment processor
$conf["tm_payments_process_check_certificate"] = false; // turn on for production 
$conf["tm_payments_process_timeout"] = 10; // seconds to wait for process url before timeout 
$conf["tm_payments_process_error_email"] = "support@massiveplatform.com"; // if payment process fails, who to email
$conf["tm_payments_error_message"] = "A problem occured processing your payment, please contact support@massiveplatform.com";
$conf["tm_payments_currencies"] = array("usd" => "\$", "aud" => "AUD \$", "cad" => "CAD \$", "eur" => "€", "gbp" => "GBP £"); // available currencies (must be supported by stripe)
$conf["tm_payments_currencies_default"] = "usd"; // default currency
$conf["tm_payments_currency_symbols"] = array("usd" => "$", "aud" => "$", "cad" => "$", "eur" => "€", "gbp" => "£");
$conf["tm_payments_refund_policy"] = "You can get a refund until 7 days before the event";
$conf["tm_payments_refund_url"] = "https://example.massiveplatform.com/blog/event-refund/";
$conf["tm_payments_receipt_details"] = "<strong>TAX RECEIPT</strong><br>Your company name<br>Your company address<br>Email: your@receiptemail";
$conf["tm_payments_early_bird_label"] = "Early Bird Ticket"; // default label for early bird ticket
$conf["tm_payments_stripe_logo"] = "<a target='_blank' href='https://stripe.com/gallery'><img style='width: 119px; height: 26px;' width='119' height='26' src='/sites/all/themes/tm/images/stripe_logo_solid@2x.png'></a><br>Secure payment gateway trusted by <a target='_blank' href='https://stripe.com/gallery'>global brands</a>"; // displayed when payment is enabled
$conf["tm_payments_handler_name"] = "Massive"; // merchant name to display on payment screen
$conf["tm_payments_handler_description"] = "Event Registration"; // default description to display on payment screen
$conf["tm_payments_enable_chapter_min_members"] = 100; // enable payments if event chapter has minimum member count (set to 0 to disable)
$conf["tm_payments_enable_help_text"] = "Congratulations, you can accept payments for events.<br>By accepting payments you agree to our event <a target='_blank' href='#'>terms and conditions</a>.";
$conf["tm_payments_commission_default_chapter"] = "80"; // default commission % for chapter event 
$conf["tm_payments_commission_default_company"] = "75"; // default commission % for company event
$conf["tm_payments_commission_default_member"] = "70"; // default commission % for member event
$conf["tm_payments_reports_url"] = ""; // external payment reports
$conf["tm_payments_reports_secret_token"] = "randomstring123"; // secret token to verify payment report 
$conf["tm_payments_reports_help_message"] = "Here's your ticket sales for this event."; // message to show user
*/

/** DISCUSSION SETTINGS **/
/** Optional discussion module, powered by Vanilla Forums.
/*
$conf['tm_discuss_full_path'] = "discussions"; // where vanilla is installed
$conf['tm_discuss_enable_feedme'] = true; // show recent discussions for a chapter or member
**/

/** MARKETPLACE/JOBS SETTINGS **/
/** Optional jobs board, powered by Jobskee. **/
/*
$conf['tm_marketplace_menu_path'] = "marketplace"; // where jobskee is installed
$conf['tm_marketplace_cookie_enable'] = true; // for marketplace subscription email field
$conf['tm_marketplace_cookie_secret_key'] = 'randomstringabc'; // must match jobskee config
$conf['tm_marketplace_cookie_secret_iv'] = 'randomstring123'; // must match jobskee config
$conf['tm_marketplace_enable_feedme'] = true; // embed marketplace jobs into chapter and company pages
$conf['tm_marketplace_feedme_url'] = '/jobs/api/search/'; // url for search
*/

