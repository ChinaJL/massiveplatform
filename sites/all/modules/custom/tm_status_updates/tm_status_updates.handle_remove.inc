<?php

// tm_status_updates.handle_remove.inc - handle remove update

/**
 * Check if user can remove an update
 */
function tm_status_updates_remove_status_check($account) {

	global $user;
	global $conf;

	// need to be logged in
	if (!user_is_logged_in()) {
		return false;
	}

	// check if status_updates are enabled
	if (!$conf["tm_status_updates_enabled"]) {
		return false;
	}

	// check its your uid
	if ($user->uid != $account->uid) {
		return false;
	}

	// need status_update_id
	if (!isset($_POST["status_update_id"])) {
		return false;
	}

	// get status update
	$status_update_id = $_POST["status_update_id"];
	$status_update = tm_status_updates_get_update_by_id($status_update_id);
	if ($status_update == null) {
		return false;
	}

	// get entity type and id
	$entity_type = $status_update->entity_type;
	$entity_id = $status_update->entity_id;

	// check if user can remove based on their company profiles, and chapters
	if (tm_status_updates_check_permission($entity_type, $entity_id, "remove", $user->uid)) {
		return true;
	}

	// not allowed to remove
	return false;
}

/** 
 * Remove status
 * tm_status_updates_remove_status_check() should be called first
 * returns array. ie: array("result" => false, "error_message" => "something"); 
 */
function tm_status_updates_remove_status_ajax() {

	global $conf;

	// get status update id
	$status_update_id = $_POST["status_update_id"];
	
	// remove status update
	tm_status_updates_remove_by_id($status_update_id);

	// Updated successfully
	$ret = array("result" => true, "error_message" => null);
	drupal_json_output($ret);
	return;
}
