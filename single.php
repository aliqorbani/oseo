<?php get_header();?>
<div class="container content">
    <div class="row">
        <?php get_sidebar('top');?>
        <?php get_sidebar();?>
        <div id="left-col" class="col-md-9">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <?php if( class_exists('Dynamic_Featured_Image') ):
                global $dynamic_featured_image;
                global $post;
                $featured_images = $dynamic_featured_image->get_featured_images( $post->ID );
                if ( $featured_images ):
                foreach( $featured_images as $images ):
                $img_url = $images['full'];
                ?>
            <?php endforeach;
            else:
                $img_url = get_template_directory_uri().'/img/default-page.jpg';
            ?>
            <?php endif;?>
               <div class="top-fixed-bg" style="background-image: url(<?php echo $img_url;?>)"></div>
            <?php endif;?>
            <?php the_title('<h1 class="post-title">','</h1>', true); ?>
            <?php if ('post' == get_post_type()) { ?>
            <?php oseoEntryMeta();?>
            <?php } //endif; ?>
            <div class="entry-content">
                <?php the_content('');?>
            </div>
            <div class="post-tags">
            <?php
                $tag_list = get_the_tag_list('', __(', ', 'oseo'));
                bootstrapBasicTagsList($tag_list);?>
            </div>
            <?php endwhile; else: ?><p><?php _e('Sorry, no posts matched your criteria', 'oseo') ?></p>
        <?php endif; ?>
            <?php comments_template('', true); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>