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
        wp_enqueue_style('foundation',get_template_directory_uri() . "/assets/css/foundation.min.css", array(), '', 'all');
        //Bootstrap
        // wp_enqueue_style('bootstrap',get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '', 'all');
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
        wp_enqueue_script('foundation', get_template_directory_uri() . '/assets/js/foundation.min.js', array(), '', 'all' );
        //Bootstrap
        // wp_enqueue_script('foundation', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '', 'all' );
        //Fontawesome
        wp_enqueue_script('fontawesome', get_template_directory_uri() . '/assets/js/fontawesome-all.min.js', '', 'all');
        //Sript WP
        wp_enqueue_script('script',get_template_directory_uri() . "/assets/js/app.js", array(), '', 'all');
                
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
            'main-menu' => __('Main Menu', 'taller'),
        ));
    }

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

    include 'assets/inc/smk.php';

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
    # Simple Page Ordering                                                      #
    #---------------------------------------------------------------------------# 

    //Include Simple Page Ordering
    include_once( get_stylesheet_directory() . '/assets/inc/simple-page-ordering/simple-page-ordering.php' );


    #---------------------------------------------------------------------------#
    # Protect WordPress Against Malicious URL Requests Plugin                   #
    #---------------------------------------------------------------------------# 

    include_once( get_stylesheet_directory() . '/assets/inc/security.php' );


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
            'separator1', // First separator
            'edit.php', // Páginas
            'separator2', // Second separator
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