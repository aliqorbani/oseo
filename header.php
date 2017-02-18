<?php $thm = wp_get_theme();
//var_dump($thm);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="<?php echo get_bloginfo('description');?>">
	<meta name="author" content="<?php echo $thm->display('Author', false, true);?>">
	<meta name="author:url" content="<?php echo $thm->display('AuthorURI', false, true);?>">
	<link rel="icon" href="<?php echo get_template_directory_uri().'/favicon.png';?>">
	<?php wp_head();?>
</head>
<body <?php body_class();?>>
<header>
	<nav class="navbar navbar-inverse top-navigation navbar-static-top">
		<div class="container-fluid">
		    <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#user-nav" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only"><?php _e('User Menu','oseo');?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
            <div id="user-nav" class="collapse navbar-collapse">
    			<ul class="nav navbar-nav">
    				<?php echo '<li><a href="#"><img src="' . get_template_directory_uri() . '/img/flags/ir.gif" alt="' . __('IR Flag','oseo') . '" /></a></li>';?>
    				<?php echo '<li><a href="#"><img src="' . get_template_directory_uri() . '/img/flags/uk.gif" alt="' . __('UK Flag','oseo') . '" /></a></li>';?>
    			</ul>
    			<ul class="nav navbar-nav navbar-right">
			    <?php if(!is_user_logged_in()):?>
    				<?php echo '<li><a href="'. esc_url(home_url().'/login/') . '"><i class="fa fa-sign-in" style="line-height: 30px; vertical-align: top;"></i> ' . __('Login','oseo') . '</a></li>';?>
    				<?php echo '<li><a href="' . wp_registration_url() . '"><i class="fa fa-user" style="line-height: 25px;"></i> ' . __('register','oseo') . '</a></li>';?>
                <?php else :
                    echo '<li><a href="' . esc_url(home_url().'/account/') . '"><i class="fa fa-cog" style="line-height: 25px;"></i> ' . __('My Profile','oseo') . '</a> ';
                endif;
                ?>
    			</ul>
            </div>
		</div>
        <div class="clearfix">

        </div>
	</nav>

	<nav class="navbar navbar-default navbar-static-top" data-spy="affix" data-offset-top="63">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only"><?php _e('Main Menu','oseo');?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo esc_url(home_url());?>"><img src="<?php echo get_template_directory_uri().'/img/logo.png';?>" style="height: 100%;" class="img-responsive" alt="Chatra"></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<?php if (has_nav_menu('primary')) {
                                wp_nav_menu( array(
									'theme_location' => 'primary',
                                    'container' => false,
									'menu_class' => 'nav navbar-nav',
                                    'walker' => new BootstrapNavWalker()
							)
					);
                    if(function_exists('oseo_wc_cart_count')){
                        echo oseo_wc_cart_count();
                    }
				} else{
					echo _e('Please go to admin panel and add a new menu as "Primary" location','oseo');
				}
				?>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
    <div class="clearfix"></div>
</header>