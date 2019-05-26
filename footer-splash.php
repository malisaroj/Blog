<?php if (!is_active_sidebar('footer-widget')) {
    return;
}
?>
<div id="footer-widget">
    <?php dynamic_sidebar('footer-widget'); ?>
</div>