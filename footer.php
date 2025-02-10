<footer class="bg-dark text-white py-4 text-body-secondary border-top mt-5">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('sidebar-footer-1')) : ?>
                <?php dynamic_sidebar('sidebar-footer-1'); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('sidebar-footer-2')) : ?>
                <?php dynamic_sidebar('sidebar-footer-2'); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('sidebar-footer-3')) : ?>
                <?php dynamic_sidebar('sidebar-footer-3'); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <p class="mb-0 text-center">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
            <i><a href="https://github.com/hyvercode/hyvercode-boots">Download theme</a></i>
        </p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>