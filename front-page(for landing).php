<?php get_header(); ?>

<main class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4">Welcome to Our Tutorial Website</h1>
                <p class="lead">Learn the latest technologies with our step-by-step tutorials.</p>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary btn-lg">Explore Tutorials</a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>