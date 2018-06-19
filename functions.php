<?php
    #---------------------------------------------------------------------------#
    # URL Template and blog                                                     #
    #---------------------------------------------------------------------------#
    
    function theme_url() {
        echo get_template_directory_uri();
    }

    function blog_url() {
        bloginfo('url');
    }

    #---------------------------------------------------------------------------#
    # Remove WP Version                                                         #
    #---------------------------------------------------------------------------#
    
    add_filter('the_generator', 'wpbeginner_remove_version');

    function wpbeginner_remove_version() {
        return '';
    }

    #---------------------------------------------------------------------------#
    # Register Menu                                                             #
    #---------------------------------------------------------------------------#
	
	add_action('init','register_menus');

	function register_menus() {
        register_nav_menus( array(
            'main-menu' => __('Main Menu', 'lagom'),
            'social-menu' => __('Social','lagom')
        ));
    }

    #---------------------------------------------------------------------------#
    # Hide Adminbar                                                             #
    #---------------------------------------------------------------------------#
    
    show_admin_bar(false);

    #---------------------------------------------------------------------------#
    # Add Thumbnails Support                                                    #
    #---------------------------------------------------------------------------#

    add_theme_support( 'post-thumbnails'); 

    function get_excerpt($limit, $source = null){

        if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
        $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, $limit);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
        $excerpt = $excerpt.'...';
        return $excerpt;
    }

    #---------------------------------------------------------------------------#
    # SMK Template Loader                                                       #
    #---------------------------------------------------------------------------#

    include 'includes/smk.php';

    function buildTree( array $elements, $parentId = 0 )
    {
        $branch = array();
        foreach ( $elements as $element )
        {
            if ( $element->menu_item_parent == $parentId )
            {
                $children = buildTree( $elements, $element->ID );
                if ( $children )
                    $element->wpse_children = $children;
    
                $branch[$element->ID] = $element;
                unset( $element );
            }
        }
        return $branch;
    }    

  	#---------------------------------------------------------------------------#
    # Enqueue Frontend Scripts and Styles                                       #
    #---------------------------------------------------------------------------#

	add_action( 'wp_enqueue_scripts', 'lagom_load_css' );

    function lagom_load_css() {
        //Swiper
        wp_enqueue_style('swiper',get_template_directory_uri() . "/css/swiper.min.css", array(), '', 'all');
        //Normalize
        wp_enqueue_style('normalize',get_template_directory_uri() . "/css/normalize.css", array(), '', 'all');
        //Foundation
        wp_enqueue_style('foundation',get_template_directory_uri() . "/css/foundation.min.css", array(), '', 'all');
        //Font Awesome
        // wp_enqueue_style('font-awesome',get_template_directory_uri() . "/css/font-awesome.min.css", array(), '', 'all');
        //Hover
        // wp_enqueue_style('hover',get_template_directory_uri() . "/css/hover.css", array(), '', 'all');
        //Swal
        // wp_enqueue_style('swal',get_template_directory_uri() . "/css/swal.css", array(), '', 'all');
        //Hamburguers
        wp_enqueue_style('hamburgers',get_template_directory_uri() . "/css/hamburgers.css", array(), '', 'all');
        //Animated
        // wp_enqueue_style('animated',get_template_directory_uri() . "/css/animations.css", array(), '', 'all');
        //Izimodal
        wp_enqueue_style('izimodal',get_template_directory_uri() . "/css/iziModal.min.css", array(), '', 'all');
        //wp-editor
        wp_enqueue_style('wp-editor',get_template_directory_uri() . "/css/wp-editor.css", array(), '', 'all');
        //Style Theme
        wp_enqueue_style('style',get_template_directory_uri() . "/style.css", array(), '', 'all');
        
    }

    add_action( 'wp_enqueue_scripts', 'lagom_load_scripts' );

    function lagom_load_scripts() {
        // if ( is_page_template( 'page-about.php' ) ) {
        //     $key = 'AIzaSyBVQQ73Yp-ChV1eLDrlyPPlNwxK-qXsQng';
        //     wp_enqueue_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?key=' . $key . '&libraries=places', null, null, true );
        // }
        //Jquery
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '', 'all' );
        //Foundation
        wp_enqueue_script('foundation', get_template_directory_uri() . '/js/foundation.min.js', array(), '', 'all' );
        //Animated
        // wp_enqueue_script('animate', get_template_directory_uri() . '/js/css3-animate-it.js', array(), '', 'all');        
        //Swiper
        wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), '', 'all' );
        //Fontaswesome
        wp_enqueue_script('font-aswesomw', 'https://use.fontawesome.com/releases/v5.0.13/js/all.js', '', 'all');
        //Swal
        // wp_enqueue_script('swal', get_template_directory_uri() . '/js/swal.js', array(), '', 'all' );
        //IziModal
        wp_enqueue_script('izimodal', get_template_directory_uri() . '/js/iziModal.min.js', array(), '', 'all' );
        //Skrollr
        wp_enqueue_script('skrollr', get_template_directory_uri() . '/js/skrollr.min.js', array(), '', 'all');
        //Modernizr
        wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '', 'all');      
        //Sript WP
        wp_enqueue_script('script',get_template_directory_uri() . "/script.js", array(), '', 'all');
                
    }


	#---------------------------------------------------------------------------#
    # Remove Welcome Widget from the Dashboard                                  #
    #---------------------------------------------------------------------------#

    add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

    function remove_dashboard_widgets() {
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	}

	remove_action( 'welcome_panel', 'wp_welcome_panel' );

    #---------------------------------------------------------------------------#
    # Reorder admin menu                                                        #
    #---------------------------------------------------------------------------#

    add_filter('custom_menu_order', 'custom_menu_order');
    add_filter('menu_order', 'custom_menu_order');
    
    function custom_menu_order($menu_ord) {
        if (!$menu_ord) return true;
        return array(
            'index.php', // Dashboard
            // 'separator1',
            // 'edit.php?post_type=home_conf',
            // 'edit.php?post_type=testimonial',
            // 'edit.php?post_type=product',
            'separator1', // First separator
            'edit.php', // Páginas
            'separator2', // First separator
            'edit.php?post_type=page', // Páginas
            'separator-last', // Last separator
        );
    }
    
	#---------------------------------------------------------------------------#
    # Theme Widgets                                                             #
    #---------------------------------------------------------------------------#
	
	add_action('widgets_init', 'lagom_widgets_init');

	function lagom_widgets_init()
	{
		register_sidebar( array (
			'name' => __( 'Sidebar Widget Area', 'lagom' ),
			'id' => 'primary-widget-area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</li>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
			) );
	}

	#---------------------------------------------------------------------------#
    # Advanced Custom Fields                                                    #
    #---------------------------------------------------------------------------# 

    // //Include ACF Custom CSS
    // if( class_exists('acf') ) {
    // 	add_action( 'admin_enqueue_scripts', 'load_acf_style' );

    //     function load_acf_style() {
    //         wp_register_style( 'acf_css', get_template_directory_uri() . '/css/acf.css', array( 'acf-global','acf-input' ), '1.0.0' );
    //         wp_enqueue_style( 'acf_css' );
    //     }
    // }

    #---------------------------------------------------------------------------#
    # Simple Page Ordering                                                      #
    #---------------------------------------------------------------------------# 

    //Include Simple Page Ordering
    include_once( get_stylesheet_directory() . '/inc/simple-page-ordering/simple-page-ordering.php' );


    #---------------------------------------------------------------------------#
    # Protect WordPress Against Malicious URL Requests Plugin                   #
    #---------------------------------------------------------------------------# 

    include_once( get_stylesheet_directory() . '/inc/security.php' );


    #---------------------------------------------------------------------------#
    # Get the Slug                   #
    #---------------------------------------------------------------------------# 

    function the_slug($echo=true){
      $slug = basename(get_permalink());
      do_action('before_slug', $slug);
      $slug = apply_filters('slug_filter', $slug);
      if( $echo ) echo $slug;
      do_action('after_slug', $slug);
      return $slug;
    }
?>