<?php get_header();?>
<div class="container content">
<div class="row">
        <?php get_sidebar('top');?>
        <?php get_sidebar();?>
<!--left col-->
<div id="left-col" class="col-md-9">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <?php
    $cr_course = get_the_ID();
    $cr_usr = get_current_user_id();

    $req_time = '';
    $us_ids = get_post_custom_values('user_requested',$cr_course);
    if(!empty($us_ids)){
        $us_ids = $us_ids;
    }else{
        $us_ids = array('-1');
    }
    if(!in_array($cr_usr,$us_ids)){
        $registration_btn = do_shortcode('[send-question-moortak]');
    }
    else {
        //echo 'User ID: ' . print_r( $us_ids ) . '<br> Current User ID: ' . $cr_usr . ' <br> Current Course ID: '.$cr_course. '<br>';
        $registration_btn = __('<button class="btn btn-default disabled" disabled="disabled" title="You have registered previously, be patient for calling you back">Register</button>','oseo');
    }
        $audiences = get_post_meta(get_the_ID(),'_course_audiences',true);
        $course_date_en = get_post_meta(get_the_ID(),'_course_startdate',true);
        $date = new DateTime($course_date_en);
        $result = $date->format('U');
        if(is_plugin_active('wp-jalali/wp-jalali.php')){
            $course_date = jdate('M j, Y',$result,false,NULL);
        }else{
            $course_date = $course_date_en;
        }
        $course_time = get_post_meta(get_the_ID(),'_course_time',true);
        $course_place = get_post_meta(get_the_ID(),'_course_place',true);
        $course_coast = get_post_meta(get_the_ID(),'_course_coast',true);

    ?>
    <div class="col-md-6" id="course_details">
        <div class="row">
            <?php echo sprintf(__('<h3 class="course-title"><strong>Course Title:</strong> %s</h3>','oseo'), get_the_title() ); ?>
            <?php echo sprintf(__('<div class="course_meta"><strong>Audiences:</strong> %s </div>','oseo'),$audiences);?>
            <?php echo sprintf(__('<div class="course_meta"><strong>Course Date:</strong> %s </div>','oseo'),$course_date);?>
            <?php echo sprintf(__('<div class="course_meta"><strong>Course Time:</strong> %s </div>','oseo'),$course_time);?>
            <?php echo sprintf(__('<div class="course_meta"><strong>Course Place:</strong> %s </div>','oseo'),$course_place);?>
            <?php echo sprintf(__('<div class="course_meta"><strong>Course Coast:</strong> %s </div>','oseo'),$course_coast);?>
            <?php if(has_excerpt()){ echo '<div class="well well-sm">'. get_the_excerpt() .'</div>'; } ?>
        </div>
    </div>
    <div class="col-md-6">
    <?php if(has_post_thumbnail()): ?>
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'course-single');?>
        <img class="img course-image img-responsive img-rounded" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute('echo=0');?>">
        <?php else :?>
        <img class="img course-image img-responsive img-rounded" src="<?php echo get_template_directory_uri();?>/img/course-default.jpg" alt="<?php the_title_attribute('echo=0');?>" />
    <?php endif; ?>
    <br>
        <?php echo $registration_btn;?>
    </div>
    <div class="clearfix"></div>
    <?php the_content();?>
    <?php endwhile; else: ?>
    <p>
        <?php _e('Sorry, no posts matched your criteria', 'oseo') ?>
        .</p>
    <?php endif; ?>
    <!--comments-->
    <?php comments_template('',true); ?>
    <!--comments end-->
</div>
<!--left col end-->
</div>
</div>
<!--sidebar end-->
<?php get_footer(); ?>
