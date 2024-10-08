<?php get_header(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo esc_url(get_theme_mod('front_page_bannerbg')) ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?php echo get_theme_mod('front_page_text', 'Blog Website') ?></h1>
                    <span class="subheading"><?php echo get_theme_mod('front_page_subtext', 'Welcome to this blog website.'); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h1>Recent Posts</h1>
            <?php get_template_part('template-parts/recent', 'post') ?>
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="<?php echo esc_url(get_permalink(get_option("page_for_posts"))) ?>">More Posts →</a></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>