<?php
/**
 * The template for displaying all pages.
 *
 * @package Fluffy-Master
 */
 
/** 
* Template Name: Site Map Page
 * 
 * @package Fluffy-Master 
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
	
	<?php the_content();?>
	
	
	<h2>Pages</h2>
	<ul class="sitemap">
		<?php wp_list_pages
		('sort_column=menu_order&title_li='); ?>
		</ul>
	
	<h2>Categories</h2>
	<ul class="sitemap">
		<?php wp_list_categories('title_li='); ?>
	</ul>
	
	<h2>Posts</h2>
	<ul class="sitemap">
		<?php wp_get_archives('type=postbypost'); ?>
	</ul>	
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


