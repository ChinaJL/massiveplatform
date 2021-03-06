<?php
/**
 * @file
 * tm_chapters.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function tm_chapters_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_action_menu_wrapper|node|chapter|full';
  $field_group->group_name = 'group_action_menu_wrapper';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'full';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Action menu wrapper',
    'weight' => '4',
    'children' => array(
      0 => 'group_action_menu',
    ),
    'format_type' => 'html-element',
    'format_settings' => array(
      'label' => 'Action menu wrapper',
      'instance_settings' => array(
        'classes' => 'actions',
        'element' => 'div',
        'show_label' => '0',
        'label_element' => '',
        'attributes' => '',
        'id' => '',
      ),
    ),
  );
  $field_groups['group_action_menu_wrapper|node|chapter|full'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_action_menu|node|chapter|full';
  $field_group->group_name = 'group_action_menu';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'full';
  $field_group->parent_name = 'group_action_menu_wrapper';
  $field_group->data = array(
    'label' => 'Action menu',
    'weight' => '16',
    'children' => array(
      0 => 'ds_flag_signup',
      1 => 'tm_ds_more_actions',
      2 => 'tm_ds_communication_actions',
      3 => 'tm_ds_anon_flag_placeholder',
    ),
    'format_type' => 'html-element',
    'format_settings' => array(
      'label' => 'Action menu',
      'instance_settings' => array(
        'classes' => 'actions-menu',
        'element' => 'ul',
        'show_label' => '0',
        'label_element' => '',
        'attributes' => '',
        'id' => '',
      ),
    ),
  );
  $field_groups['group_action_menu|node|chapter|full'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_chapter_leaders|node|chapter|form';
  $field_group->group_name = 'group_chapter_leaders';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Chapter Leaders',
    'weight' => '1',
    'children' => array(
      0 => 'field_chapter_leaders',
      1 => 'field_chapter_management_reason',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Chapter Leaders',
      'instance_settings' => array(
        'required_fields' => 0,
        'id' => '',
        'classes' => 'group-chapter-leaders field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_chapter_leaders|node|chapter|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_chapter_location|node|chapter|form';
  $field_group->group_name = 'group_chapter_location';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Location',
    'weight' => '4',
    'children' => array(
      0 => 'field_geomaplocation',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Location',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-chapter-location field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_chapter_location|node|chapter|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_chapter_payments|node|chapter|form';
  $field_group->group_name = 'group_chapter_payments';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Payments',
    'weight' => '8',
    'children' => array(
      0 => 'field_chapter_payment_commission',
      1 => 'field_chapter_payments_enabled',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Payments',
      'instance_settings' => array(
        'required_fields' => 1,
        'id' => '',
        'classes' => 'group-chapter-payments field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_chapter_payments|node|chapter|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_chapter_sponsors|node|chapter|form';
  $field_group->group_name = 'group_chapter_sponsors';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Chapter Sponsors',
    'weight' => '3',
    'children' => array(
      0 => 'field_chapter_sponsors',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Chapter Sponsors',
      'instance_settings' => array(
        'required_fields' => 1,
        'id' => '',
        'classes' => 'group-chapter-sponsors field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_chapter_sponsors|node|chapter|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_chapter_sponsors|node|chapter|full';
  $field_group->group_name = 'group_chapter_sponsors';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'full';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Chapter Sponsors',
    'weight' => '7',
    'children' => array(
      0 => 'field_chapter_sponsors',
    ),
    'format_type' => 'contained_block',
    'format_settings' => array(
      'formatter' => 'open',
      'instance_settings' => array(
        'classes' => 'group-chapter-sponsors field-group-contained_block',
      ),
    ),
  );
  $field_groups['group_chapter_sponsors|node|chapter|full'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_community_management|node|chapter|form';
  $field_group->group_name = 'group_community_management';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Community Management',
    'weight' => '5',
    'children' => array(
      0 => 'field_community_managers',
      1 => 'field_chapter_leaders_needed',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Community Management',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-community-management field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_community_management|node|chapter|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_community_wrapper|node|chapter|full';
  $field_group->group_name = 'group_community_wrapper';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'full';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Community',
    'weight' => '9',
    'children' => array(
      0 => 'chapter_members',
    ),
    'format_type' => 'contained_block',
    'format_settings' => array(
      'label' => 'Community',
      'formatter' => 'open',
    ),
  );
  $field_groups['group_community_wrapper|node|chapter|full'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_details_wrapper|node|chapter|full';
  $field_group->group_name = 'group_details_wrapper';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'full';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'About',
    'weight' => '5',
    'children' => array(
      0 => 'body',
      1 => 'field_link_facebook',
      2 => 'field_link_linkedin',
      3 => 'field_link_twitter',
      4 => 'field_link_website',
      5 => 'tm_ds_chapter_stats',
    ),
    'format_type' => 'contained_block',
    'format_settings' => array(
      'label' => 'About',
      'formatter' => 'open',
    ),
  );
  $field_groups['group_details_wrapper|node|chapter|full'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_form_about|node|chapter|form';
  $field_group->group_name = 'group_form_about';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'About',
    'weight' => '0',
    'children' => array(
      0 => 'body',
      1 => 'field_chapter_color',
      2 => 'field_chapter_shortcode',
      3 => 'field_image',
      4 => 'field_chapter_timezone',
      5 => 'field_country',
      6 => 'field_join_chapter_message',
      7 => 'field_chapter_cover_video',
      8 => 'field_chapter_is_group',
      9 => 'title',
      10 => 'path',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'About',
      'instance_settings' => array(
        'required_fields' => 0,
        'classes' => 'group-form-about field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_form_about|node|chapter|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_form_elsewhere|node|chapter|form';
  $field_group->group_name = 'group_form_elsewhere';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Elsewhere',
    'weight' => '2',
    'children' => array(
      0 => 'field_link_facebook',
      1 => 'field_link_linkedin',
      2 => 'field_link_twitter',
      3 => 'field_link_website',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Elsewhere',
      'instance_settings' => array(
        'required_fields' => 0,
        'classes' => 'group-form-elsewhere field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_form_elsewhere|node|chapter|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_summary_wrapper|node|chapter|search_result';
  $field_group->group_name = 'group_summary_wrapper';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'search_result';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Summary',
    'weight' => '2',
    'children' => array(
      0 => 'body',
    ),
    'format_type' => 'html-element',
    'format_settings' => array(
      'label' => 'Summary',
      'instance_settings' => array(
        'classes' => 'summary',
        'element' => 'div',
        'show_label' => '0',
        'label_element' => '',
        'attributes' => '',
      ),
    ),
  );
  $field_groups['group_summary_wrapper|node|chapter|search_result'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_team_wrapper|node|chapter|full';
  $field_group->group_name = 'group_team_wrapper';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'chapter';
  $field_group->mode = 'full';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Chapter leaders',
    'weight' => '8',
    'children' => array(
      0 => 'field_chapter_leaders',
    ),
    'format_type' => 'contained_block',
    'format_settings' => array(
      'label' => 'Chapter leaders',
      'formatter' => 'open',
    ),
  );
  $field_groups['group_team_wrapper|node|chapter|full'] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t('About');
  t('Action menu');
  t('Action menu wrapper');
  t('Chapter Leaders');
  t('Chapter Sponsors');
  t('Chapter leaders');
  t('Community');
  t('Community Management');
  t('Elsewhere');
  t('Location');
  t('Payments');
  t('Summary');

  return $field_groups;
}
