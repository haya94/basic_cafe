<?php
/**
 * The template for displaying all pages.
 *
 * @package Basic Cafe
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		
<!--codes from codex.wordpress.org, developer.wordpress.org -->

	
	<?php	 
		
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$haya=array('showposts'=> 5, 'cat'=>'2', 'paged' => $paged );
		$my_query= new WP_Query($haya);
?>


<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php the_title(); ?></a></h5>

<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('large'); ?>
    </a>
<?php endif; ?>


	</article><!-- #post-## -->
	<?php endwhile; endif; ?>
	
		<!-- This function links the slider images and links when you click on the slider image -->
<div class="flexslider">

<h7> Top 5 </h7>
  <ul class="slides">
    <li>
      <a href="http://phoenix.sheridanc.on.ca/~ccit3402/index.php/2016/03/14/basic-club/"><img src="http://phoenix.sheridanc.on.ca/~ccit3402/wp-content/uploads/2016/03/club-sandwich-166229_1280.jpg" /></a>
    </li>
    <li>
      <a href="http://phoenix.sheridanc.on.ca/~ccit3402/index.php/2016/03/14/triple-chocolate-cake/"><img src="http://phoenix.sheridanc.on.ca/~ccit3402/wp-content/uploads/2016/03/cake-827399_1920.jpg" />
    </li>
    <li>
       <a href="http://phoenix.sheridanc.on.ca/~ccit3402/index.php/2016/03/14/basic-blueberry/"><img src="http://phoenix.sheridanc.on.ca/~ccit3402/wp-content/uploads/2016/03/bowl-932980_1280.jpg" /></a>
    </li>
    <li>
     <a href="http://phoenix.sheridanc.on.ca/~ccit3402/index.php/2016/03/14/strawberry-cheesecake/"><img src="http://phoenix.sheridanc.on.ca/~ccit3402/wp-content/uploads/2016/03/food-712117_1280.jpg" /></a>
    </li>
     <li>
     <a href="http://phoenix.sheridanc.on.ca/~ccit3402/index.php/2016/03/14/beef-cheddar-burger/"><img src="http://phoenix.sheridanc.on.ca/~ccit3402/wp-content/uploads/2016/03/burger-760873_1920.jpg" /></a>
    </li>
  </ul>
</div>
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>