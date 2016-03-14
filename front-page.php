<?php
/**
 * The template for displaying all pages.
 *
 * @package basic_cafe
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
	
<!-- Code for showing posts form a particular category retrieved from: 		 https://codex.wordpress.org/Class_Reference/WP_Query

Code for pagination retrieved from:
http://codex.wordpress.org/Pagination#Adding_the_.22paged.22_parameter_to_a_query 
			and
https://codex.wordpress.org/Pagination -->
		
		<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		 $stories=array('showposts'=> 6, 'cat'=>'4', 'paged' => $paged );
		$my_query= new WP_Query($stories);
?>

<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!--title code retrieved from: https://codex.wordpress.org/Function_Reference/the_title_attribute-->
	
	<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php the_title(); ?></a></h3>

<!--thumbnail code retrieved from: https://developer.wordpress.org/reference/functions/the_post_thumbnail/#Examples-->

<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?> </a>

<?php endif; ?>

	</article><!-- #post-## -->
	<?php endwhile; endif; ?>
	
	
<!-- Loop with Pagination code retrieved from: https://codex.wordpress.org/Pagination -->

<div class="nav-previous alignleft"><?php next_posts_link( 'Previous Page' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Next Page' ); ?></div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
