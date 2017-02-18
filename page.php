<?php
/* ------------------------------------------------------------------------ */
/* Theme Single Page
/* ------------------------------------------------------------------------ */
get_header();
?>

<!--left col-->

<div class="container content">
<div class="row">
        <?php get_sidebar('top');?>
        <?php get_sidebar();?>
<!--left col-->
<article id="article" class="col-md-9">
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
   <div class="top-fixed-bg" style="background-image: url(<?php echo $img_url;?>);"></div>
    <?php endif;?>
    <?php the_title('<h1 class="page-title">','</h1>', true) ?>
    <?php oseoEntryMeta();?>
    <div class="entry-content">
        <?php the_content('');?>
    </div>
    <?php endwhile; else: ?>
    <p>
        <?php _e('Sorry, no posts matched your criteria', 'oseo') ?>
        .</p>
    <?php endif; ?>
    <!--comments-->
    <?php comments_template('',true); ?>
    <!--comments end-->
</article>
<!--left col end-->
</div>
</div>
<!--sidebar end-->
<?php get_footer(); ?>
