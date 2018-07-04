<?php 
    #---------------------------------------------------------------------------#
    # Hide Adminbar                                                             #
    #---------------------------------------------------------------------------#
    
    show_admin_bar(false);

    #---------------------------------------------------------------------------#
    # URL Template and blog                                                     #
    #---------------------------------------------------------------------------#
    
    function theme_url() {
        echo get_template_directory_uri();
    }

    function blog_url() {
        echo bloginfo('url');
    }
    
      	#---------------------------------------------------------------------------#
    # Enqueue Frontend Scripts and Styles                                       #
    #---------------------------------------------------------------------------#

	add_action( 'wp_enqueue_scripts', 'load_css_frames' );

    function load_css_frames() {
        //Foundation
        wp_enqueue_style('foundation',get_template_directory_uri() . "/assets/css/semantic.min.css", array(), '', 'all');
        //wp-editor
        wp_enqueue_style('wp-editor',get_template_directory_uri() . "/assets/css/wp-editor.css", array(), '', 'all');
        //Style Theme
        wp_enqueue_style('style',get_template_directory_uri() . "/assets/css/app.css", array(), '', 'all');
        
    }

    add_action( 'wp_enqueue_scripts', 'load_scripts_frames' );

    function load_scripts_frames() {
        //Jquery
        wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '', 'all' );
        //Foundation
        wp_enqueue_script('semantic-ui', get_template_directory_uri() . '/assets/js/semantic.min.js', array(), '', 'all' );
        //Fontawesome
        wp_enqueue_script('fontawesome', get_template_directory_uri() . '/assets/js/fontawesome-all.min.js', '', 'all');
        //Sript WP
        wp_enqueue_script('script',get_template_directory_uri() . "/assets/js/app.js", array(), '', 'all');
                
    }

?>