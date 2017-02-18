<section id="testimonial">
	<div class="container">
	    <?php
				$args =
						array(
								'post_type' => 'testimonial',
								'posts_per_page'    => 3
						);
				$q = new WP_Query($args);
				if($q->have_posts()):
					?>
		<h2 class="title"><?php _e('what others says about us','oseo');?></h2>
		<div id="testimonials-carousel" class="carousel slide carousel-fade" data-ride="carousel">
			<!-- Carousel items -->
			<div class="carousel-inner">
			    <?php $i = 0; while($q->have_posts()) : $q->the_post();?>
				<div class="item <?php if($i === 0 ){echo 'active';}?>">
					<?php echo the_content();?>
				</div>
                <?php $i++; endwhile;?>
			</div>
			<ol class="carousel-indicators">
			    <?php $j = 0; while($q->have_posts()) : $q->the_post();?>
				<li data-target="#testimonials-carousel" data-slide-to="<?php if($j === 0){echo '0';}else{echo $j;}?>" class="<?php if($j == 0){echo 'active';}?>">
				    <?php $img = get_the_post_thumbnail_url();?>
                    <?php if($img){
                        $img_u = $img;
                    }else{
                        $img_u = get_template_directory_uri().'/img/demo/logo-1.png';
                    }?>
				    <img src="<?php echo $img_u;?>" class="img-circle img-responsive" alt="<?php the_title_attribute('echo=0');?>" /></li>

                <?php $j++;  endwhile;?>
			</ol>

			<!-- Carousel nav -->
			<a class="carousel-control left" href="#testimonials-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
			<a class="carousel-control right" href="#testimonials-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		</div>
	</div>
    <?php endif;?>
</section>