<?php
 
// Enqueue Flexslider Files
 
    function wptuts_slider_scripts() {
        wp_enqueue_script( 'jquery' );
 
        wp_enqueue_style( 'flex-style', get_template_directory_uri() . '/inc/slider/css/flexslider.css' );
 
        wp_enqueue_script( 'flex-script', get_template_directory_uri() .  '/basic_cafe/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
    }
    add_action( 'wp_enqueue_scripts', 'wptuts_slider_scripts' );

// Initialize Slider
 
    function wptuts_slider_initialize() { ?>
        <script type="text/javascript" charset="utf-8">
            jQuery(window).load(function() {
                jQuery('.flexslider').flexslider({
                    animation: "fade",
                    direction: "horizontal",
                    slideshowSpeed: 5000,
                    animationSpeed: 500,
                });
            });
        </script>
    <?php }
    add_action( 'wp_head', 'wptuts_slider_initialize' );
    
    
    // Slider Shortcode
 
    function wptuts_slider_shortcode() {
        ob_start();
        wptuts_slider_template();
        $slider = ob_get_clean();
        return $slider;
    }
    add_shortcode( 'slider', 'wptuts_slider_shortcode' );