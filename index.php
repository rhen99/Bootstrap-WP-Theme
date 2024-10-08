<?php get_header(); ?>
<header class="masthead" style="background-image: url('<?php echo esc_url(get_theme_mod('blog_page_bannerbg')) ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1><?php echo single_post_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="category-list">
                    <?php wp_list_categories(array(
                        'orderby' => 'name',
                        'show_count' => true,
                        'title_li' => '<h6>Categories</h6>',
                    )); ?>
                </ul>
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <!-- Post preview-->
                        <div class="post-preview">
                            <a href="<?php the_permalink(); ?>">
                                <h2 class="post-title"><?php the_title(); ?></h2>
                            </a>
                            <p class="post-meta">
                                Posted by
                                <a href="#!"><?php the_author(); ?></a>
                                on <?php the_time('F j, Y'); ?>
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                <?php endwhile;
                    function custom_pagination()
                    {
                        global $wp_query;

                        $pagination_args = array(
                            'total'        => $wp_query->max_num_pages,
                            'current'      => max(1, get_query_var('paged')),
                            'prev_text'    => __("« Previous"),
                            'next_text'    => __("Next »"),
                            'type'         => 'array',
                            'format'       => '?paged=%#%',
                        );


                        $links = paginate_links($pagination_args);

                        if (is_array($links)) {


                            foreach ($links as $link) {
                                $link = str_replace('<a', '<a class="page-numbers btn btn-primary btn-sm mx-1"', $link);
                                echo  $link;
                            }
                        }
                    }

                    custom_pagination();

                endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>