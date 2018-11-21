<?php
/**
 * The template for displaying blog archives
 *
 * @package WordPress
 * @subpackage Struck
 * @since Struck 1.0
 */
get_header();

global $fields_installed; // custom fields installed
global $tw_options; // theme options

// cache blog page
$pageID = get_option('page_for_posts');

// get page options
$tw_page = tw_get_page_options(array(
	'pageID' 			=> $pageID, // set page ID of blog page
	'loop_template' 	=> 'posts', // get only posts
	'filters' 			=> false, // don't show filters
	'posts_per_page' 	=> false, // use settings posts per page
	'display' 			=> 'minimal' // display minimal template
)); ?>

<div <?php post_class( $tw_page['classes'] ); ?>>

	<?php
		// page title template
		if ( locate_template( TW_TITLES_DIR . 'page-title.php' ) ) {
			include( locate_template( TW_TITLES_DIR . 'page-title.php' ) );
		}
	?>

	<div class="page-content-inner">

		<?php
			// overwrite our custom loop with archive query
			global $wp_query;
			$loop = $wp_query;
		?>

		<?php
			// display template
			if ( locate_template( TW_DISPLAYS_DIR . $tw_page['display'] . '.php' ) ) {
				include( locate_template( TW_DISPLAYS_DIR . $tw_page['display'] . '.php' ) );
			}
		?>

	</div><!-- .page-content -->

</div>

<?php get_footer(); // Theme footer