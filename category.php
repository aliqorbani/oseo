<?php get_header();?>
<div class="container content">
    <div class="row">
        <?php get_sidebar('top');?>
        <?php get_sidebar();?>
        <div id="left-col" class="col-md-9">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                <div class="entry-content">
                    <?php if(has_post_thumbnail()){the_post_thumbnail('project',array('class' =>  'img-responsive'));}?>
                    <?php echo get_the_excerpt();?>
                    <?php echo '<a class="btn btn-link btn-xs" href="'. get_permalink() .'">'. __('Continue Reading ...','oseo') .'</a>';?>
                </div>
            </div>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria', 'oseo') ?></p>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>