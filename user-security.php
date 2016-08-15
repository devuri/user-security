<?php
/**
 *	Plugin Name: User Security
 *	Description: Hides login errors, disables author archives (to hide usernames), changes author links to title => sitename / URL => homepage
 *	Version:     1.0.0
 *	Author:      James Morrison
 *	Author URI:  https://www.jamesmorrison.me/
 **/


/**
 * Security Check
 *
 * @since 1.0.0
 **/

defined( 'ABSPATH' ) or die();


/**
 * Stop the redirect to "pretty permalinks" - i.e. ?author={ID} redirect to /author/{username}
 *
 * @since 1.0.0
 **/

add_action( 'redirect_canonical', function( $redirect_url, $requested_url ) {

	if ( is_author() || ( ! empty( $_GET[ 'author' ] ) && preg_match( '|^[0-9]+$|', $_GET[ 'author' ] ) ) ) {
		return false;
	}

	return $redirect_url;

}, 1, 2 );


/**
 * Show a 404 template instead of author template
 *
 * @since 1.0.0
 **/

add_action( 'template_include', function( $template ) {
	
	if ( is_author() || ( ! empty( $_GET[ 'author' ] ) && preg_match( '|^[0-9]+$|', $_GET[ 'author' ] ) ) ) {
		status_header(404);
		return get_404_template(); 
	}
	
	return $template;
	
}, 1, 1 );


/**
 * Change the author link to the homepage
 *
 * @since 1.0.0
 **/

add_filter( 'author_link', function( $link, $author_id, $author_nicename ) {

	return esc_url( home_url( '/' ) );

}, 1, 3 );


/**
 * Change the author posts link to generic text / homepage link
 *
 * @since 1.0.0
 **/

add_filter( 'the_author_posts_link', function( $link ) {

	return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . get_bloginfo( 'name' ) . '">' . get_bloginfo( 'name' ) . '</a>';

}, 1, 1 );


/**
 * Hide login errors
 *
 * @since 1.0.0
 **/

add_filter( 'login_errors', function() {

	return 'You have entered an incorrect username or password.';

}, 1 );


