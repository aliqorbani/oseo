<?php get_header();?>
<div class="container content">
    <div class="row">
        <?php get_sidebar('top');?>
        <?php get_sidebar();?>
        <div id="left-col" class="col-md-9">
            <?php if (have_posts()) :?>
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <thead>
                    <tr>
                        <th><?php _e('#','oseo');?></th>
                        <th><?php _e('title','oseo');?></th>
                        <th><?php _e('place','oseo');?></th>
                        <th><?php _e('starting date','oseo'); ?></th>
                        <th><?php _e('teacher','oseo'); ?></th>
                        <th><?php _e('coast','oseo'); ?></th>
                    </tr>
                </thead>
                <tbody>
        <?php while (have_posts()) : the_post();?>
        <?php   $course_coast = get_post_meta( get_the_ID(), '_course_coast', true );
                $course_place = get_post_meta( get_the_ID(), '_course_place', true );
                $course_teacher = get_post_meta( get_the_ID(), '_course_teacher', true );
                $course_time = get_post_meta( get_the_ID(), '_course_time', true );
                $course_startdate = get_post_meta( get_the_ID(), '_course_startdate', true );?>
                    <tr>
                        <td><?php if(has_post_thumbnail()): ?>
                            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'course-archive');?>
                            <img class="img img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute('echo=0');?>">
                            <?php else :?>
                            <img class="img img-responsive" src="<?php echo get_template_directory_uri();?>/img/course-archive.gif" alt="<?php the_title_attribute('echo=0');?>" />
                        <?php endif; ?>
                        </td>
                        <td><?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?></td>
                        <td><?php echo $course_place; ?></td>
                        <td><?php echo $course_startdate; ?></td>
                        <td><?php echo $course_teacher; ?></td>
                        <td><?php echo $course_coast; ?></td>
                    </tr>
            <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p><?php _e('Sorry, no posts matched your criteria', 'oseo') ?></p>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>