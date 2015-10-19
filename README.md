# WP Admin 1 Pager
This is a WordPress plugin which I have used for creating optimised WordPress admin screen for a  1 page WordPress website. It should be used in conjunction with the [WP Basis plugin](https://wordpress.org/plugins/wpbasis/).

## What does the plugin do?
When activated is alters significantly the WordPress dashboard for non WP Basis super users. These are users who have restricted privillages as created by the WP Basis plugin. The changes are as follow:

* Remove the dashboard admin page
* Rempve the appearance, posts and pages menu items
* Add in a new top level content menu item, which links to the post edit screen for the default page (this should be set as the sites home page in `Settings > Reading`)
* Add new top level menu item for Nav Menus - essentially moving this from appearance to a parent level item
* Adjust capabilities to prevent none WP Basis users from creating additional pages
* Redirect users on login to the edit screen for the default page set as front page

This makes the back end work like the front end - for a certain type of site.

## What about the meta boxes for the front page, page?

The plugin adds meta boxes to the page set as the home page as well as removing the defauly title and editor. These are for header, content, services etc. and some footer text. These can be altered by filtering `cmb_meta_boxes` to either add or remove meta boxes as you need.

## What about the front end?

This plugin offer no front end output or theming. Typically your theme would need only a `index.php` file to display the output of the meta data added to the page marked as front page in the admin.
