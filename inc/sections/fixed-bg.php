<section id="fixed-bg">
	<div class="container">
		<img src="<?php echo get_template_directory_uri().'/img/logo-lg.png';?>" alt="Logo" class="pull-left" />
        <div class="pull-right">
        <span style="color: white; font-weight: bold;">
            <?php _e('our members','oseo');?>
        </span>
        <?php
        $result = count_users();
        $count = $result['total_users'];?>
		<span class="count" style="font-size: 48px; color: #FFF; margin: 20px auto; border: #FFF 2px solid; width: 200px; height: 200px; display: block; text-align: center; line-height: 200px; background: rgba(255, 255, 255, 0.3)"><?php echo $count;?></span>
        </div>
	</div>
</section>
