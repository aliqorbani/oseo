<?php
	/**
	 * register scripts
	 */
	if ( ! function_exists( 'observerseo_scripts' ) ) :

		function observerseo_scripts(){
			/* check if IE 9 */
			wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/assets/js/html5shiv.min.js' );
			wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
			wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/js/respond.min.js' );
			wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );


		// Enqueue the main Stylesheet.
			wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
			wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7', 'all' );
			wp_enqueue_style( 'ie10-viewport-bug', get_template_directory_uri() . '/assets/css/ie10-viewport-bug-workaround.css', array(), null, null );
			wp_enqueue_style( 'woocommerce-css', get_template_directory_uri() . '/css/woocommerce.css', array(), null, null );
			wp_enqueue_style( 'charitable-rtl-css', get_template_directory_uri() . '/charitable/rtl.css', array(), null, null );
			wp_enqueue_style( 'charitable-css', get_template_directory_uri() . '/charitable/style.css', array(), null, null );

			wp_enqueue_style( 'main-stylesheet', get_stylesheet_uri(), array(), '1.0', null );

			if(is_rtl()){
				wp_enqueue_style( 'rtl-stylesheet', get_template_directory_uri().'/css/rtl.css', array(), '1.0', null );
			}

			wp_enqueue_script( 'jquery' );

			wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
			wp_enqueue_script( 'ie10-viewport-debug', get_template_directory_uri() . '/assets/js/ie10-viewport-bug-workaround.js', array('jquery'), null, true );
			if(is_home() || is_front_page()){
                wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true );
			}

			// Add the comment-reply library on pages where it is necessary
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		add_action( 'wp_enqueue_scripts', 'observerseo_scripts' );
	endif;

	if(!function_exists('observerseo_theme_install')):
		function observerseo_theme_install(){
			load_theme_textdomain('oseo', get_template_directory() . '/languages');

			// add theme support post and comment automatic feed links
			add_theme_support('automatic-feed-links');

			//add woocommerce support to theme
			add_theme_support( 'woocommerce' );
            add_theme_support('title-tag');

			// enable support for post thumbnail or feature image on posts and pages
			add_theme_support('post-thumbnails');
			add_image_size('campaign',478,160,true);
			add_image_size('project',363,243,true);
			add_image_size('showcase',313,250,true);
			add_image_size('course-archive',60,60,true);
			add_image_size('course-single',424,200,true);
			add_image_size('inner_page',900,250,true);

			add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));
			register_nav_menus(
	            array(
		            'primary'   =>  __('Primary Menu','oseo'),
		            'top_bar'   =>  __('Top Bar Menu','oseo'),
	            )
            );
		}

	add_action('after_setup_theme','observerseo_theme_install');
	endif;
if ( ! isset( $content_width ) ) $content_width = 900;
    if(!function_exists('oseo_widget')){
        function oseo_widgets(){
            if ( function_exists('register_sidebar') ){
                register_sidebar(
                    array(
                        'name'          =>  __('Main Sidebar','oseo'),
                        'id'            =>  'sidebar-1',
                        'before_widget' =>  '<div class="widget %s" id="%s">',
                        'after_widget'  =>  '</div>',
                        'before_title'  =>  '<h3 class="widget_title">',
                        'after_title'   =>  '</h3>'
                    )
                );
                register_sidebar(
                    array(
                        'name'          =>  __('Sticky Sidebar','oseo'),
                        'id'            =>  'sticky_sidebar',
                        'before_widget' =>  '<div class="widget %s" id="%s">',
                        'after_widget'  =>  '</div>',
                        'before_title'  =>  '<h3 class="widget_title">',
                        'after_title'   =>  '</h3>'
                    )
                );
                register_sidebar(
                    array(
                        'name'          =>  __('Shop Sidebar','oseo'),
                        'id'            =>  'sidebar-shop',
                        'before_widget' =>  '<div class="widget %s" id="%s">',
                        'after_widget'  =>  '</div>',
                        'before_title'  =>  '<h3 class="widget_title">',
                        'after_title'   =>  '</h3>'
                    )
                );
                register_sidebar(
                    array(
                        'name'          =>  __('Top Sidebar','oseo'),
                        'description'   =>  __('showing on top of single posts and pages','oseo'),
                        'id'            =>  'sidebar-top',
                        'before_widget' =>  '<div class="widget %s" id="%s">',
                        'after_widget'  =>  '</div>',
                        'before_title'  =>  '<h3 class="widget-title">',
                        'after_title'   =>  '</h3>'
                    )
                );
                register_sidebar(
                    array(
                        'name'          =>  __('Footer 1','oseo'),
                        'description'   =>  __('showing on footer','oseo'),
                        'id'            =>  'footer-1',
                        'before_widget' =>  '<div class="col-lg-4 col-md-4 col-sm-12 footer-widget %s" id="%s">',
                        'after_widget'  =>  '</div>',
                        'before_title'  =>  '<h3 class="widget-title">',
                        'after_title'   =>  '</h3>'
                    )
                );
                register_sidebar(
                    array(
                        'name'          =>  __('Footer 2','oseo'),
                        'description'   =>  __('showing on footer middle','oseo'),
                        'id'            =>  'footer-2',
                        'before_widget' =>  '<div class="col-lg-4 col-md-4 col-sm-12 footer-widget %s" id="%s">',
                        'after_widget'  =>  '</div>',
                        'before_title'  =>  '<h3 class="widget-title">',
                        'after_title'   =>  '</h3>'
                    )
                );
                register_sidebar(
                    array(
                        'name'          =>  __('Footer 3','oseo'),
                        'description'   =>  __('showing on Footer','oseo'),
                        'id'            =>  'footer-3',
                        'before_widget' =>  '<div class="col-lg-4 col-md-4 col-sm-12 footer-widget %s" id="%s">',
                        'after_widget'  =>  '</div>',
                        'before_title'  =>  '<h3 class="widget-title">',
                        'after_title'   =>  '</h3>'
                    )
                );
            }
        }
    add_action('widgets_init','oseo_widgets');
    }

	require_once (get_template_directory().'/inc/functions/BootstrapNavWalker.php');
	require_once (get_template_directory().'/inc/functions/cleanup.php');
	require_once (get_template_directory().'/inc/functions/functions.php');

if( class_exists( 'Woocommerce' ) ){
	//require_once (get_template_directory().'/inc/plugins/currency-converter/currency-converter.php'); // currency converter
	require_once (get_template_directory().'/inc/woocommerce-setup.php');	// Utility functions
}