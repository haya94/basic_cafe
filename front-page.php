<?php
/**
 * The template for displaying all pages.
 *
 * @package Fluffy
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		
<!--codes from codex.wordpress.org, developer.wordpress.org -->

	
	<?php	 
		
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$haya=array('showposts'=> 5, 'cat'=>'1', 'paged' => $paged );
		$my_query= new WP_Query($haya);
?>


<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php the_title(); ?></a></h5>

<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('medium'); ?>
    </a>
<?php endif; ?>

	</article><!-- #post-## -->
	<?php endwhile; endif; ?>
	
<div class="nav-previous alignleft"><?php next_posts_link( '&larr; Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>


	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>