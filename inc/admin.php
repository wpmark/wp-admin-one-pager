<?php
/**
 * function wpaop_remove_editor_on_pages()
 *
 * removes items for the pages edit screen including the editor,
 * the page attributes meta box and the title box.
 */
function wpaop_remove_editor_on_pages() {
	
	remove_post_type_support( 'page', 'editor' );
	remove_post_type_support( 'page', 'page-attributes' );
	remove_post_type_support( 'page', 'title' );
	
}

add_action( 'admin_init', 'wpaop_remove_editor_on_pages' );

/**
 * function wpaop_custom_caps()
 *
 * for no wp basis users this removes their ability to
 * add new pages, removing the "add new" link next to the pages title
 * when on a page edit screen
 */
function wpaop_custom_caps( $caps ) {
	
	$caps[ 'edit_pages' ] = array(
		'name'		=> 'edit_pages',
		'action'	=> false,
	);
	
	return $caps;
	
}

add_filter( 'wpbasis_user_capabilities', 'wpaop_custom_caps' );

/**
 * function wpaop_remove_wpbasis_login_redirect()
 *
 * removes the login redirect created by the wpbasis plugin
 */
function wpaop_remove_wpbasis_login_redirect() {
	
	remove_filter( 'login_redirect', 'wpbasis_change_login_landing', 20, 3 );
	
}

add_action( 'init', 'wpaop_remove_wpbasis_login_redirect' );

/**
 * function wpaop_login_redirect()
 * redirect user after successful login to the home page edit screen
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function wpaop_login_redirect( $redirect_to, $request, $user ) {
	
	/* get the home page post id */
	$home_id = get_option( 'page_on_front', 2 );
	
	/* return the new login redirect location */
	return admin_url( 'post.php?post=' . absint( $home_id ) . '&action=edit' );
	
}

add_filter( 'login_redirect', 'wpaop_login_redirect', 30, 3 );

/**
 * function wpaop_admin_bar_admin_url()
 *
 * changes the site admin link in the admin bar added by
 * the wpbasis plugin
 */
function wpaop_admin_bar_admin_url() {
	
	/* only do this if in the admin */
	if( is_admin() ) {
		
		$url = home_url( '/' );
		
	}
	
	/* if on the front end */
	else {
		
		/* get the home page post id */
		$home_id = get_option( 'page_on_front', 2 );
		
		/* return the new login redirect location */
		$url = admin_url( 'post.php?post=' . absint( $home_id ) . '&action=edit' );
		
	}
	
	return $url;
		
}

add_filter( 'wpbasis_admin_bar_site_admin_link_url', 'wpaop_admin_bar_admin_url' );