<?php get_header(); ?>
<header class="masthead" style="background-image: url('<?php echo has_post_thumbnail() ?  esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) : '' ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?php the_title(); ?></h1>
                    <span class="meta">
                        Posted by
                        <a href="#!"><?php the_author(); ?></a>
                        on <?php the_time('F j, Y'); ?>
                    </span>
                    <p>
                        <?php the_category(', '); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <?php the_content(); ?>
                <?php endwhile;
                endif; ?>

                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>
        </div>
    </div>
</article>
<?php get_footer(); ?>