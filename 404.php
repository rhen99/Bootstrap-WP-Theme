<?php get_header(); ?>
<header class="masthead" style="background-image: url('<?php echo has_post_thumbnail() ?  esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) : '' ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Page Not Found</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<?php get_footer(); ?>