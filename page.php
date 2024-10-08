<?php get_header(); ?>
<header class="masthead" style="background-image: url('<?php echo has_post_thumbnail() ?  esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) : '' ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1><?php single_post_title();  ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>