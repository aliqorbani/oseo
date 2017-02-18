<section id="courses">
	<div class="container">
		<div class="row">
			<?php
				$args =
						array(
								'post_type' => 'course',
								'posts_per_page'    => 5
						);
				$q = new WP_Query($args);
				if($q->have_posts()):
					?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 accordion" id="latest-courses">
				<h3 class="title"><?php echo _e('Latest Courses','oseo');?></h3>
				<div class="panel-group" id="accordion">
				<?php while ($q->have_posts()) :
				$q->the_post();?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#latest-course<?php echo get_the_ID();?>">
									<?php the_title();
										$views = get_post_meta(get_the_ID(),'views', true);
										echo '<span class="pull-left"><i class="fa fa-eye fa-fw"></i>'. $views .'</span> ';?>
								</a>
							</h4>
						</div>
						<div id="latest-course<?php echo get_the_ID();?>" class="panel-collapse collapse">
							<div class="panel-body">
								<?php echo get_the_excerpt();?>
								<a href="<?php the_permalink();?>" class="btn btn-primary pull-left btn-block btn-reg"><?php _e('View and register','oseo');?></a>
							</div>
						</div>
					</div>
					<?php endwhile;
					else :
					?>
					<?php _e('No courses added right now','oseo');?>
				<?php endif; wp_reset_postdata();  ?>
				</div>
			</div><!-- latest-courses -->
			<?php
				$args =
						array(
							'post_type' => 'course',
							'posts_per_page'    => 5,
							'meta_key' => 'views',
							'orderby' => 'meta_value_num',
							'order' => 'DESC'
						);
				$q = new WP_Query($args);
			if($q->have_posts()):
			?>

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 accordion" id="most-popular-courses">
				<h3 class="title"><?php echo _e('Most Popular','oseo');?></h3>
				<div class="panel-group" id="accordion2">
				<?php while ($q->have_posts()) :
					$q->the_post();?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#most-popular-course<?php echo get_the_ID();?>">
									<?php the_title();
										$views = get_post_meta(get_the_ID(),'views', true);
										echo '<span class="pull-left"><i class="fa fa-eye fa-fw"></i>'. $views .'</span> ';?>
								</a>
							</h4>
						</div>
						<div id="most-popular-course<?php echo get_the_ID();?>" class="panel-collapse collapse">
							<div class="panel-body">
								<?php echo get_the_excerpt();?>
								<a href="<?php the_permalink();?>" class="btn btn-primary pull-left btn-block btn-reg"><?php _e('View and register','oseo');?></a>
							</div>
						</div>
					</div>
					<?php endwhile;
						else :
				?>
					<?php _e('No Courses added right now','oseo');?>

				<?php endif; wp_reset_postdata(); ?>
				</div>
			</div><!-- most-popular-courses -->
		</div>
	</div>
</section>
