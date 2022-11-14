<?php
/**
 * Plugin Name: Remove Invite | Remove invite option while creating group for BuddyBoss
 * Description: Remove the option of inviting users while creating a group from the frontend. No configuations needed. Simply activate the plugin, and you are good to go.
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 1.0.0
 * Text Domain: remove-invite
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function remove_send_invites_on_groups() {
  global $bp;
  
  //Remove invites option during group creation.
  if ( isset( $bp->groups->group_creation_steps['group-invites'] ) ){
    unset( $bp->groups->group_creation_steps['group-invites'] );
  }
  $parent_slug = isset( $bp->groups->root_slug ) && isset( $bp->groups->current_group->slug ) ? $bp->groups->current_group->slug : $bp->groups->slug;
  
  // 2.Remove "Send Invites" on group page for all members.
  bp_core_remove_subnav_item( $parent_slug, 'invite' );
}
add_action( 'bp_setup_nav', 'remove_send_invites_on_groups', 15 );