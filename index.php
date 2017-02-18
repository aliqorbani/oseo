<?php
	get_header();?>
	<div class="container">
	<?php if(have_posts()):

		while(have_posts()): the_post();
	        get_template_part( 'content', get_post_format() );
	    endwhile;
	    // Previous/next page navigation.
	    the_posts_pagination( array(
	        'prev_text'          => __( 'Previous page', 'oseo' ),
	        'next_text'          => __( 'Next page', 'oseo' ),
	        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'oseo' ) . ' </span>',
	    ) );
	    else:
	    get_template_part('content', 'none');
	endif;?>
	</div>

<?php get_footer();
