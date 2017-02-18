<section id="latest-posts">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 posts-widget">
				<?php $q = new WP_Query(
						array(
								'cat'               => 1,
								'posts_per_page'    => 8
						)
				);
					if($q->have_posts()):?>
				<h3 class="title"><?php _e('Latest News','oseo');?></h3>
				<ul class="list-unstyled list-post">
					<?php
					while($q->have_posts()): $q->the_post();?>
					<li class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
					<?php endwhile;

					else: ?>
					<li class="item-title"><a href="<?php echo esc_url(bloginfo('admin_url'));?>"><?php _e('Add New post to be view in here','oseo');?></a></li>
				</ul>
				<?php endif;?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 posts-widget">
			    <?php $q = new WP_Query(
						array(
								'post_type'         => 'subsets',
								'posts_per_page'    => 8
						)
				);
					if($q->have_posts()):?>
				<h3 class="title"><?php _e('subset centers','oseo');?></h3>
				<ul class="list-unstyled list-post">
				    <?php
					while($q->have_posts()): $q->the_post();?>
					<li class="item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
					<?php endwhile;
					else: ?>
					<li class="item-title"><a href="<?php echo esc_url(bloginfo('admin_url'));?>"><?php _e('Add New post to be view in here','oseo');?></a></li>
				</ul>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>