<section id="projects">
	<div class="content">
		<div class="container">
			<div class="row">
				<h2 class="text-center title"><?php _e('our projects','oseo');?></h2>
			<?php
            $category_id = 26;
				$args =
					array(
						'category_name'     => 'projects',
                        'category__in'      => $category_id,
						'post_type'         => 'post',
						'posts_per_page'    => 1
					);
				$q = new WP_Query($args);
				if($q->have_posts()):
			?>

				<?php while($q->have_posts()): $q->the_post(); $post_id = get_the_ID();?>
					<?php $img_url = get_the_post_thumbnail_url($post_id , 'project');?>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs12">
				    <?php echo '<a class="btn btn-lg btn-bld btn-block" href="'. $category_link = get_category_link( $category_id ) . '">'.get_the_category_by_ID($category_id).'</a>'?>
					<div class="project-item">
						<a href="<?php the_permalink();?>">
						<img class="img-responsive proj-img" src="<?php echo $img_url; ?>" style="z-index: 1" alt="<?php the_title_attribute('echo=0');?>" />
						</a>
						<div class="proj-description">
							<?php the_title('<h4 class="proj-title">','</h4>');?>
							<?php the_excerpt();?>
							<a href="<?php the_permalink();?>" class="btn btn-default btn-proj-view"><?php _e('view project','oseo');?></a>
						</div>
					</div>
				</div>
				<?php endwhile;?>
			<?php endif; wp_reset_query();?>

            <?php
            $category_id = 27;
				$args =
					array(
						'category_name'     => 'projects',
                        'category__in'      => $category_id,
						'post_type'         => 'post',
						'posts_per_page'    => 1
					);
				$q = new WP_Query($args);
				if($q->have_posts()):
			?>
				<?php while($q->have_posts()): $q->the_post(); $post_id = get_the_ID();?>
					<?php $img_url = get_the_post_thumbnail_url($post_id , 'project');?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs12">
				    <?php echo '<a class="btn btn-lg btn-bld btn-block" href="'. $category_link = get_category_link( $category_id ) . '">'.get_the_category_by_ID($category_id).'</a>'?>
					<div class="project-item">
						<a href="<?php the_permalink();?>">
						<img class="img-responsive proj-img" src="<?php echo $img_url; ?>" style="z-index: 1" alt="<?php the_title_attribute('echo=0');?>" />
						</a>
						<div class="proj-description">
							<?php the_title('<h4 class="proj-title">','</h4>');?>
							<?php the_excerpt();?>
							<a href="<?php the_permalink();?>" class="btn btn-default btn-proj-view"><?php _e('view project','oseo');?></a>
						</div>
					</div>
				</div>
				<?php endwhile;?>
			<?php endif; wp_reset_query();?>

            <?php
            $category_id = 28;
				$args =
					array(
						'category_name'     => 'projects',
                        'category__in'      => $category_id,
						'post_type'         => 'post',
						'posts_per_page'    => 1
					);
				$q = new WP_Query($args);
				if($q->have_posts()):
			?>
				<?php while($q->have_posts()): $q->the_post(); $post_id = get_the_ID();?>
					<?php $img_url = get_the_post_thumbnail_url($post_id , 'project');?>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs12">
				    <?php echo '<a class="btn btn-lg btn-bld btn-block" href="'. $category_link = get_category_link( $category_id ) . '">'.get_the_category_by_ID($category_id).'</a>'?>
                    <div class="project-item">
						<a href="<?php the_permalink();?>">
						<img class="img-responsive proj-img" src="<?php echo $img_url; ?>" style="z-index: 1" alt="<?php the_title_attribute('echo=0');?>" />
						</a>
						<div class="proj-description">
							<?php the_title('<h4 class="proj-title">','</h4>');?>
							<?php the_excerpt();?>
							<a href="<?php the_permalink();?>" class="btn btn-default btn-proj-view"><?php _e('view project','oseo');?></a>
						</div>
					</div>
				</div>
				<?php endwhile;?>
			<?php endif; wp_reset_postdata();?>
			</div>
			<div class="text-center" style="margin: 40px auto;">
				<?php $cat_id = get_category_by_slug('projects')->term_id; ?><a href="<?php echo get_category_link($cat_id); ?>" class="btn btn-primary" style="font-weight: bold"><?php _e('view all projects','oseo');?></a>
			</div>
		</div>
	</div>
</section>
