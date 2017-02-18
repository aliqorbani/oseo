<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header( 'shop' ); ?>
<div class="container content">
    <div class="row">
        <?php get_sidebar('top');?>
        <?php do_action( 'woocommerce_sidebar' ); ?>
        <div id="left-col" class="col-md-9">
	<?php do_action( 'woocommerce_before_main_content' ); ?>
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
		<?php do_action( 'woocommerce_archive_description' ); ?>
		<?php if ( have_posts() ) : ?>
			<?php do_action( 'woocommerce_before_shop_loop' ); ?>
			<?php woocommerce_product_loop_start(); ?>
            <div class="product_subcategories container-fluid">
                <div class="row">
                    <div class="row">
    			    	<?php woocommerce_product_subcategories(); ?>
                    </div>
                </div>
            </div>
            <div class="clearfix white-space hr"></div>
<?php
    $args1 = array(
    	'post_type'     =>  array('product'),
        'post_status'   =>  array('publish'),
        'posts_per_page'=>  12,
    );
    $q1 = new WP_Query($args1);
    $meta_query2 = WC()->query->get_meta_query();
    $args2 = array(
	    'post_type'     =>  array('product'),
        'post_status'   =>  array('publish'),
	    'posts_per_page'=>  12,
    	'meta_key'      => 'total_sales',
    	'orderby'       => 'meta_value_num',
    	'meta_query'    => $meta_query2
    );
    $q2 = new WP_Query($args2);
    $meta_query = WC()->query->get_meta_query();
    $atts = array(
    	'orderby' => 'title',
    	'order'   => 'asc');
    $args3 = array(
	    'post_type'           => 'product',
	    'post_status'         => 'publish',
	    'ignore_sticky_posts' => 1,
	    'orderby'             => $atts['orderby'],
	    'order'               => $atts['order'],
	    'posts_per_page'      => 12,
	    'meta_query'          => $meta_query3
    );
    $q3 = new WP_Query($args3);
    ?>
            <div class="tabbable-products">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#latest-products"><?php _e('Latest products','oseo');?></a></li>
                    <li><a data-toggle="tab" href="#top-sellers"><?php _e('Top Sellers','oseo');?></a></li>
                    <li><a data-toggle="tab" href="#popularity"><?php _e('Most Popular','oseo');?></a></li>
                </ul>
                <div class="tab-content">
                    <div id="latest-products" class="tab-pane fade in active">
                        <h3><?php _e('Latest products','oseo');?></h3>
        				<?php while ( $q1->have_posts() ) : $q1->the_post(); ?>
        					<?php wc_get_template_part( 'content', 'product' ); ?>
        				<?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="top-sellers" class="tab-pane fade">
                        <h3><?php _e('Top Sellers','oseo');?></h3>
                        <?php while ( $q2->have_posts() ) : $q2->the_post(); ?>
        					<?php wc_get_template_part( 'content', 'product' ); ?>
        				<?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="popularity" class="tab-pane fade">
                        <h3><?php _e('Most Popular','oseo');?></h3>
                        <?php while ( $q3->have_posts() ) : $q3->the_post(); ?>
        					<?php wc_get_template_part( 'content', 'product' ); ?>
        				<?php endwhile; // end of the loop. ?>
                    </div>
                </div>
            </div>
            <?php woocommerce_product_loop_end(); ?>
			<?php do_action( 'woocommerce_after_shop_loop' ); ?>
		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>
		<?php endif; ?>
	<?php do_action( 'woocommerce_after_main_content' ); ?>
        </div>
    </div>
</div>
<?php get_footer( 'shop' ); ?>