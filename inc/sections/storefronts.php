<section id="storefronts">
	<div class="content">
		<div class="container">
			<div class="row">
			    <h2 class="section-title">
                    <?php _e('value creation','oseo');?>
			    </h2>
			    <?php
                $cat_id     = 23;
                $product_cat = get_term($cat_id,'product_cat');
				$args = array(
					'post_type'     =>  array('product'),
                    'post_status'   =>  array('publish'),
					'posts_per_page'=>  1,
                    'tax_query'     => array(
                        'relation'  => 'AND',
                        array(
                            'taxonomy'  =>  'product_cat',
                            'field'     =>  'term_id',
                            'terms'     =>  $cat_id
                        ),
                    ),
				);
				$q = new WP_Query($args);
				if($q->have_posts()): while($q->have_posts()): $q->the_post();?>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="product-item text-center">
					    <?php
                            $cat_title = $product_cat->name;
                            $cat_desc = $product_cat->description;
                            $cat_url = get_term_link($cat_id,'product_cat');?>
                        <a href="<?php echo $cat_url;?>" class="btn btn-bld btn-block" data-toggle="tooltip" data-placement="top" title="<?php echo sprintf( __('view all product in %s ','oseo'),$cat_title);?>"><?php echo $cat_title;?></a>
						<?php
							$post_id = get_the_ID();
							if(has_post_thumbnail($post_id )){
								//$product_img = get_the_post_thumbnail($post_id,'showcase');
                                $product_img = get_the_post_thumbnail($post_id,'showcase',array('class'    =>  'img-responsive product-image', 'alt'   =>  the_title_attribute('echo=0') ) );
							}else{
                                $product_img = '<img class="img-responsive product-image" src="'.get_template_directory_uri().'/img/demo/bag.jpg'.'" alt="'.the_title_attribute("echo=0").'" />';
							}?>
						<a href="<?php the_permalink();?>">
                            <?php echo $product_img;?>
                        </a>
						<?php the_title('<h3 class="product-title">','</h3>');?>
						<?php
                        global $product;
                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                        	sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button btn btn-default btn-add-to-cart  %s product_type_%s"> <i class="fa fa-cart-plus"></i> %s</a>',
                        		esc_url( $product->add_to_cart_url() ),
                        		esc_attr( $product->id ),
                        		esc_attr( $product->get_sku() ),
                        		esc_attr( isset( $quantity ) ? $quantity : 1 ),
                        		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        		esc_attr( $product->product_type ),
                        		esc_html( $product->add_to_cart_text() )
                        	),
                        $product );
                        ?>
					</div>
				</div>
				<?php
					endwhile;
				else :
                    __('<span>there is no product added to the site yet. please add one to be viewed here</span>','oseo');
                endif;?>
                                <?php
                $cat_id     = 24;
                $product_cat = get_term($cat_id,'product_cat');
				$args = array(
					'post_type'     =>  array('product'),
                    'post_status'   =>  array('publish'),
					'posts_per_page'=>  1,
                    'tax_query'     => array(
                        'relation'  => 'AND',
                        array(
                            'taxonomy'  =>  'product_cat',
                            'field'     =>  'term_id',
                            'terms'     =>  $cat_id
                        ),
                    ),
				);
				$q = new WP_Query($args);
				if($q->have_posts()): while($q->have_posts()): $q->the_post();?>
                				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="product-item text-center">
					    <?php
                            $cat_title = $product_cat->name;
                            $cat_desc = $product_cat->description;
                            $cat_url = get_term_link($cat_id,'product_cat');?>
                        <a href="<?php echo $cat_url;?>" class="btn btn-bld btn-block" data-toggle="tooltip" data-placement="top" title="<?php echo sprintf( __('view all product in %s ','oseo'),$cat_title);?>"><?php echo $cat_title;?></a>
                        <?php
							$post_id = get_the_ID();
							if(has_post_thumbnail($post_id )){
								//$product_img = get_the_post_thumbnail($post_id,'showcase');
                                $product_img = get_the_post_thumbnail($post_id,'showcase',array('class'    =>  'img-responsive product-image', 'alt'   =>  the_title_attribute('echo=0') ) );
							}else{
                                $product_img = '<img class="img-responsive product-image" src="'.get_template_directory_uri().'/img/demo/bag.jpg'.'" alt="'.the_title_attribute("echo=0").'" />';
							}?>
						<a href="<?php the_permalink();?>">
                            <?php echo $product_img;?>
                        </a>
						<?php the_title('<h3 class="product-title">','</h3>');?>
                        <?php
                        global $product;
                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                        	sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button btn btn-default btn-add-to-cart  %s product_type_%s"> <i class="fa fa-cart-plus"></i> %s</a>',
                        		esc_url( $product->add_to_cart_url() ),
                        		esc_attr( $product->id ),
                        		esc_attr( $product->get_sku() ),
                        		esc_attr( isset( $quantity ) ? $quantity : 1 ),
                        		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        		esc_attr( $product->product_type ),
                        		esc_html( $product->add_to_cart_text() )
                        	),
                        $product );
                        ?>
                        <!--<a rel="nofollow" href="<?php echo esc_url(home_url()) . '/?add-to-cart=' . get_the_ID();?>" data-quantity="1" data-product_id="<?php echo get_the_ID();?>" data-product_sku="000101" class="btn btn-default btn-add-to-cart add_to_cart_button ajax_add_to_cart"><?php _e('add to cart','oseo');?></a>-->
					</div>
				</div>
				<?php
					endwhile;
				else :
                    __('<span>there is no product added to the site yet. please add one to be viewed here</span>','oseo');
                endif;?>

                <?php
                $cat_id     = 25;
				$product_cat = get_term($cat_id,'product_cat');
				$args = array(
					'post_type'     =>  array('product'),
                    'post_status'   =>  array('publish'),
					'posts_per_page'=>  1,
                    'tax_query'     => array(
                        'relation'  => 'AND',
                        array(
                            'taxonomy'  =>  'product_cat',
                            'field'     =>  'term_id',
                            'terms'     =>  $cat_id
                        ),
                    ),
				);

				$q = new WP_Query($args);
				if($q->have_posts()): while($q->have_posts()): $q->the_post();?>
                				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="product-item text-center">
					    <?php
                            $cat_title = $product_cat->name;
                            $cat_desc = $product_cat->description;
                            $cat_url = get_term_link($cat_id,'product_cat');?>
                        <a href="<?php echo $cat_url;?>" class="btn btn-bld btn-block" data-toggle="tooltip" data-placement="top" title="<?php echo sprintf( __('view all product in %s ','oseo'),$cat_title);?>"><?php echo $cat_title;?></a>
                        <?php
							$post_id = get_the_ID();
							if(has_post_thumbnail($post_id )){
								//$product_img = get_the_post_thumbnail($post_id,'showcase');
                                $product_img = get_the_post_thumbnail($post_id,'showcase',array('class'    =>  'img-responsive product-image', 'alt'   =>  the_title_attribute('echo=0') ) );
							}else{
                                $product_img = '<img class="img-responsive product-image" src="'.get_template_directory_uri().'/img/demo/bag.jpg'.'" alt="'.the_title_attribute("echo=0").'" />';
							}?>
						<a href="<?php the_permalink();?>">
                            <?php echo $product_img;?>
                        </a>
                        <?php the_title('<h3 class="product-title">','</h3>');?>
                        <?php
                        global $product;
                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                        	sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button btn btn-default btn-add-to-cart  %s product_type_%s"> <i class="fa fa-cart-plus"></i> %s</a>',
                        		esc_url( $product->add_to_cart_url() ),
                        		esc_attr( $product->id ),
                        		esc_attr( $product->get_sku() ),
                        		esc_attr( isset( $quantity ) ? $quantity : 1 ),
                        		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        		esc_attr( $product->product_type ),
                        		esc_html( $product->add_to_cart_text() )
                        	),
                        $product );
                        ?>
                        <!--<a rel="nofollow" href="<?php echo esc_url(home_url()) . '/?add-to-cart=' . get_the_ID();?>" data-quantity="1" data-product_id="<?php echo get_the_ID();?>" data-product_sku="000101" class="btn btn-default btn-add-to-cart add_to_cart_button ajax_add_to_cart"><?php _e('add to cart','oseo');?></a>-->
					</div>
				</div>
				<?php
					endwhile;
				else :
                    __('<span>there is no product added to the site yet. please add one to be viewed here</span>','oseo');
                endif;?>


			</div>
		</div>
	</div>
</section>
