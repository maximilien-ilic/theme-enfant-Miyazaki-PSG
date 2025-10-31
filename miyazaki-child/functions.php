<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** CSS child dépend du parent */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'miyazaki-child-style',
        get_stylesheet_uri(),
        [ 'miyazaki-style' ],
        wp_get_theme()->get( 'Version' )
    );
}, 20 );


add_action( 'wp', function () {
    remove_all_actions( 'miyazaki_footer' );
    add_action( 'miyazaki_footer', 'miyazaki_child_footer_markup' );
} );


add_action( 'wp', function () {
    remove_all_actions( 'miyazaki_header' );
    add_action( 'miyazaki_header', 'miyazaki_child_header_markup' );
} );


add_action( 'wp', function () {
    remove_all_actions( 'miyazaki_index' );
    add_action( 'miyazaki_index', 'miyazaki_child_index_markup' );
} );



add_action( 'wp', function () {
    remove_all_actions( 'miyazaki_content' );
    add_action( 'miyazaki_content', 'miyazaki_child_content_markup' );
} );




if ( ! function_exists( 'miyazaki_get_archive_title_prefix' ) ) :
	function miyazaki_get_archive_title_prefix() {

		if ( is_category() ) {
			$title_prefix = __( 'Category', 'miyazaki' );
		} elseif ( is_tag() ) {
			$title_prefix = __( 'Tag', 'miyazaki' );
		} elseif ( is_author() ) {
			$title_prefix = __( 'Autheur', 'miyazaki' );
		} elseif ( is_year() ) {
			$title_prefix = __( 'Année', 'miyazaki' );
		} elseif ( is_month() ) {
			$title_prefix = __( 'Mois', 'miyazaki' );
		} elseif ( is_day() ) {
			$title_prefix = __( 'Jour', 'miyazaki' );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			$title_prefix = $tax->labels->singular_name;
		} elseif ( is_search() ) {
			$title_prefix = __( 'Recherche pour', 'miyazaki' );
		} else {
			$title_prefix = __( 'Archives', 'miyazaki' );
		}
		return $title_prefix;

	}
endif;



