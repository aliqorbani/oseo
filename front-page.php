<?php
	/*
	 * Template Name : Front-page
	 * */
	get_header();
	get_template_part('inc/sections/slider');

	get_template_part('inc/sections/about');
	get_template_part('inc/sections/storefronts');
	get_template_part('inc/sections/courses');
	get_template_part('inc/sections/fixed-bg');
	get_template_part('inc/sections/projects');
	get_template_part('inc/sections/testimonial');
	get_template_part('inc/sections/latest-posts');
	get_template_part('inc/sections/logos');

    /*
    $location = get_nav_menu_locations();
    var_dump($location);
    */

	get_footer();