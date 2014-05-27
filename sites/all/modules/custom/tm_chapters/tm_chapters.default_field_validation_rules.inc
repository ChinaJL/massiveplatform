<?php
/**
 * @file
 * tm_chapters.default_field_validation_rules.inc
 */

/**
 * Implements hook_default_field_validation_rule().
 */
function tm_chapters_default_field_validation_rule() {
  $export = array();

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'Chapter color unique';
  $rule->name = 'chapter_color_unique';
  $rule->field_name = 'field_chapter_color';
  $rule->col = 'rgb';
  $rule->entity_type = 'node';
  $rule->bundle = 'chapter';
  $rule->validator = 'field_validation_unique_validator';
  $rule->settings = array(
    'data' => 'bundle',
    'per_user' => 0,
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'This exact color is already in use by [existing-entity-link]. Please pick another one.';
  $export['chapter_color_unique'] = $rule;

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'shortcode_letters';
  $rule->name = 'shortcode_letters';
  $rule->field_name = 'field_chapter_shortcode';
  $rule->col = 'value';
  $rule->entity_type = 'node';
  $rule->bundle = 'chapter';
  $rule->validator = 'field_validation_regex_validator';
  $rule->settings = array(
    'data' => '^[a-zA-Z]*$',
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'The shortcode can only contain letters.';
  $export['shortcode_letters'] = $rule;

  $rule = new stdClass();
  $rule->disabled = FALSE; /* Edit this to true to make a default rule disabled initially */
  $rule->api_version = 2;
  $rule->rulename = 'shortcode_unique';
  $rule->name = 'shortcode_unique';
  $rule->field_name = 'field_chapter_shortcode';
  $rule->col = 'value';
  $rule->entity_type = 'node';
  $rule->bundle = 'chapter';
  $rule->validator = 'field_validation_unique_validator';
  $rule->settings = array(
    'data' => 'bundle',
    'per_user' => 0,
    'bypass' => 0,
    'roles' => array(
      1 => 0,
      2 => 0,
      3 => 0,
    ),
    'errors' => 0,
  );
  $rule->error_message = 'This shortcode is already in use by [existing-entity-link], please set another one.';
  $export['shortcode_unique'] = $rule;

  return $export;
}