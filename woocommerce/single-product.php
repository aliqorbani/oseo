<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>
<div class="container content">
    <div class="row">
        <?php get_sidebar('top');?>
        <?php do_action( 'woocommerce_sidebar' ); ?>
        <div id="left-col" class="col-md-9">
	<?php do_action( 'woocommerce_before_main_content' ); ?>
        <?php do_action( 'woocommerce_before_shop_loop' ); ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php wc_get_template_part( 'content', 'single-product' ); ?>
        <?php endwhile; // end of the loop. ?>
     <?php do_action( 'woocommerce_after_main_content' ); ?>
        </div>
    </div>
</div>
<?php get_footer( 'shop' ); ?>