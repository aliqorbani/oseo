<?php get_header();?>
<div class="container content">
    <div class="row">
        <?php get_sidebar('top');?>
        <?php get_sidebar();?>
        <div id="left-col" class="col-md-9"><h4><?php _e('Not Found','oseo');?></h4>
            <?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'oseo' ); ?>
            <p><?php _e( 'Please try the following:', 'oseo' ); ?></p>
            <ul>
                <li><?php _e( 'Check your spelling', 'oseo' ); ?></li>
                <li><?php printf( __( 'Return to the <a href="%s">home page</a>', 'oseo' ), home_url() ); ?></li>
                <li><?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'oseo' ); ?></li>
            </ul>
        </div>
    </div>
</div>
<?php get_footer(); ?>