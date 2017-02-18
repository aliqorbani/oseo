<section id="slider-section">
	<div class="container-fluid">
		<div class="col-lg-8 pull-left" id="slider">
	    <?php if(!function_exists('layerslider')):?>
			<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel" data-slide-to="0" class="active"></li>
					<li data-target="#carousel" data-slide-to="1"></li>
					<li data-target="#carousel" data-slide-to="2"></li>
				</ol>
				<!-- Carousel items -->
				<div class="carousel-inner">
					<div class="active item"><img src="<?php echo get_template_directory_uri().'/img/demo/slide-1.jpg';?>" alt="" /></div>
					<div class="item"><img src="<?php echo get_template_directory_uri().'/img/demo/slide-2.jpg';?>" alt="" /></div>
					<div class="item"><img src="<?php echo get_template_directory_uri().'/img/demo/slide-3.jpg';?>" alt="" /></div>
				</div>
				<!-- Carousel nav -->
				<a class="carousel-control left" href="#carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
				<a class="carousel-control right" href="#carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
			</div>
        <?php else :
        layerslider(1);
        endif;
        ?>
		</div>
		<?php
			$q = new WP_Query(
					array(
							'post_type'         =>  'campaign',
                            //'category_name'     =>  'campaign',
							'posts_per_page'    =>  3
					)
			);
			if($q->have_posts()):
		?>
		<div class="col-lg-4 pull-right" id="latest-campaigns">
			<?php while($q->have_posts()): $q->the_post();
				$post_id = get_the_ID();
                $thumbnail_url = get_the_post_thumbnail_url($post_id,'campaign');
                //$images = get_the_attachment_link(  get_the_post_thumbnail_id() );
					if(!empty($thumbnail_url)) {
						$img_url = $thumbnail_url;
					}else{
						$img_url = get_template_directory_uri() . '/img/demo/campaign-1.jpg';
                	}
				echo '<div class="campaign-item">
				<a href="'. get_permalink().'">
					<img class="img-responsive" src="'.$img_url.'" alt="'.the_title_attribute('echo=0').'" />
                    <span class="donation-description">' . get_the_title() . '</span>
				</a>
				</div>';

			endwhile;?>

		</div>
		<?php endif; wp_reset_postdata();?>
	</div><!-- /.container -->
</section>
