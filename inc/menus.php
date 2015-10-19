<?php
/**
 * function wpaop_remove_admin_menus()
 *
 * removes the admin menus for posts, pages and also appearance
 * these menus are not needed
 */
function wpaop_remove_admin_menus( $menus ) {
	
	$menus[] = 'edit.php';
	$menus[] = 'edit.php?post_type=page';
	$menus[] = 'themes.php';
	$menus[] = 'wpbasis_dashboard';
	
	return $menus;
	
}

add_filter( 'wpbasis_remove_admin_menus', 'wpaop_remove_admin_menus' );

/**
 * function wpaop_add_admin_pages()
 *
 * adds new admin pages for non wp basis users
 * adds a content menu item which links to the post editor for the home page
 * also adds menus (nav-menus) as a top level menu item for easier access
 */
function wpaop_add_admin_pages() {
	
	/* if this is a wp basis super user */
	if( wpbasis_is_wpbasis_user() ) {
		return;
	}
	
	/* add the top level menu called content */
	add_menu_page(
		'Content',
		'Content',
		'edit_posts',
		'post.php?post=2&action=edit',
		'',
		'dashicons-admin-page',
		9
	);
	
	/* add a top level menu for nav-menus */
	add_menu_page(
		'Menus',
		'Menus',
		'edit_posts',
		'nav-menus.php',
		'',
		'dashicons-menu',
		61
	);
	
}

add_action( 'admin_menu', 'wpaop_add_admin_pages' );