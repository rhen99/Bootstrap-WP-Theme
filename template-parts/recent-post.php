<?php
$args = [
    'post_type'      => 'post',
    'numberposts'    => absint(get_theme_mod('front_page_posts_count', 5)),
];
if (!empty($recent_posts = get_posts($args))):
    foreach ($recent_posts as $post):
?>
        <?php setup_postdata($post); ?>
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
    <?php
    endforeach;
else: ?>
    <div class="post-preview">
        <p>No Posts Yet.</p>
    </div>
<?php endif;
?>