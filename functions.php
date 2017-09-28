<?php
// Place all your custom functions below this line.

add_action( 'wp_enqueue_scripts', 'twentyseventeen_child_scripts' );
function twentyseventeen_child_scripts() {
	wp_enqueue_style( 'twentyseventeen-parent-style', get_template_directory_uri() . '/style.css' );
}

add_filter( 'body_class', 'twentyseventeen_child_body_classes', 20 );
function twentyseventeen_child_body_classes( $classes ) {
	if ( is_page_template( 'template-sidebar.php' ) ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'has-sidebar';
		}

		$remove = array(
			'page-one-column',
			'page-two-column',
		);

		foreach ( $remove as $class ) {
			$found = array_search( $class, $classes, true );

			if ( false !== $found ) {
				unset( $classes[ $found ] );
			}
		}

	}

	return $classes;
}
