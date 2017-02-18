<?php if (is_active_sidebar('sidebar-1') || is_active_sidebar('sticky_sidebar')) { ?>
    <aside class="col-md-3" id="side">
        <?php if (is_active_sidebar('sidebar-1')) { ?>
        <div id="sidebar-1">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
    <?php } ?>
    <?php if (is_active_sidebar('sticky_sidebar')) { ?>
    <div id="sticky_sidebar">
        <?php dynamic_sidebar('sticky_sidebar'); ?>
    </div>
    <?php } ?>
    </aside>
<?php } ?>