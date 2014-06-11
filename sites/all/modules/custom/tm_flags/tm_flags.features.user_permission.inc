<?php
/**
 * @file
 * tm_flags.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function tm_flags_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'flag signup'.
  $permissions['flag signup'] = array(
    'name' => 'flag signup',
    'roles' => array(
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'flag',
  );

  // Exported permission: 'unflag signup'.
  $permissions['unflag signup'] = array(
    'name' => 'unflag signup',
    'roles' => array(
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'flag',
  );

  return $permissions;
}