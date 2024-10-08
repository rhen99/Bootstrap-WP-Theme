<?php

function load_styles_and_scripts()
{
    wp_register_style('bootstrap', get_template_directory_uri() . "/css/bootstrap.min.css", [], false, 'all');
    wp_register_style('theme_styles', get_template_directory_uri() . "/css/styles.css", [], false, 'all');
    wp_register_style('style', get_template_directory_uri() . "/style.css", [], false, 'all');
    wp_register_script('bootstrap', get_template_directory_uri() . "/js/bootstrap.min.js", [], false, true);
    wp_register_script('theme_scripts', get_template_directory_uri() . "/js/script.js", [], false, true);
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('theme_scripts');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('theme_styles');
    wp_enqueue_style('style');
}
function after_setup_bootstrapwptheme()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
}
function register_my_menu_and_add_comments_support()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu'),
    ));
    add_post_type_support('post', 'comments');
}
function add_additional_class_on_li($classes, $item, $args)
{
    $classes[] = 'nav-item';
    return $classes;
}
function add_menu_link_class($atts, $item, $args)
{
    $atts['class'] = 'nav-link px-lg-3 py-3 py-lg-4';
    return $atts;
}


function bootstrapwptheme_customizer_settings($wp_customize)
{
    $wp_customize->add_section('front_page_section', array(
        'title'       => __('Front Page', 'bootstrapwptheme'),
        'description' => __('Customize the banner and other things.', 'bootstrapwptheme'),
        'priority'    => 130,
    ));
    $wp_customize->add_setting('front_page_text', array(
        'default'    => __('Blog Website', 'bootstrapwptheme'),
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'refresh',
    ));

    $wp_customize->add_control('front_page_text_input', array(
        'label'       => __('Banner Text', 'bootstrapwptheme'),
        'section'     => 'front_page_section',
        'settings'    => 'front_page_text',
        'type'        => 'text',
    ));
    $wp_customize->add_setting('front_page_subtext', array(
        'default'    => __('Welcome to this blog website.', 'bootstrapwptheme'),
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport'  => 'refresh',
    ));

    $wp_customize->add_control('front_page_subtext_input', array(
        'label'       => __('Banner Subtext', 'bootstrapwptheme'),
        'section'     => 'front_page_section',
        'settings'    => 'front_page_subtext',
        'type'        => 'text',
    ));
    $wp_customize->add_setting('front_page_bannerbg', array(
        'default'    => get_template_directory_uri() . "/assets/home-bg.jpg",
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'transport'  => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_bannerbg_input', array(
        'label'       => __('Upload Banner Background Image', 'bootstrapwptheme'),
        'section'     => 'front_page_section',
        'settings'    => 'front_page_bannerbg',
        'description' => __('Upload an image for the front page header/banner.', 'bootstrapwptheme'),
    )));

    $wp_customize->add_setting('front_page_posts_count', array(
        'default'    => __(5, 'bootstrapwptheme'),
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'transport'  => 'refresh',
    ));
    $wp_customize->add_control('front_page_posts_count_inp', array(
        'label'       => __('Recent Posts Count', 'bootstrapwptheme'),
        'section'     => 'front_page_section',
        'settings'    => 'front_page_posts_count',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 3
        )
    ));


    $wp_customize->add_section('blog_page_section', array(
        'title'       => __('Blog Page', 'bootstrapwptheme'),
        'description' => __('Customize the banner and other things.', 'bootstrapwptheme'),
        'priority'    => 131,
    ));
    $wp_customize->add_setting('blog_page_bannerbg', array(
        'default'    => '',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        'transport'  => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_bannerbg_input', array(
        'label'       => __('Upload Banner Background Image', 'bootstrapwptheme'),
        'section'     => 'blog_page_section',
        'settings'    => 'blog_page_bannerbg',
        'description' => __('Upload an image for the front page header/banner.', 'bootstrapwptheme'),
    )));
}

function bootstrapwptheme_comment_form($fields)
{
    $fields = array(
        'author' => '<div class="mb-3"><label for="author" class="form-label">' . __('Name*', 'bootstrapwptheme') . '</label><input type="text" class="form-control" id="author" name="author" required="required"></div>',
        'email'  => '<div class="mb-3"><label for="email" class="form-label">' . __('Email*', 'bootstrapwptheme') . '</label><input type="email" required="required" name="email" class="form-control" id="email"></div>',
        'url'    => '<div class="mb-3"><label for="url" class="form-label">' . __('Website', 'bootstrapwptheme') . '</label><input type="url" class="form-control" name="url" id="url"></div>',
        'remember' => '<div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember" />
        <label class="form-check-label" for="remember">' . __('Remember my name and email', 'bootstrapwptheme') . '</label>
    </div>'
    );

    return $fields;
}
function bootstrapwptheme_check_cf7_plugin()
{
    if (! is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
?>
        <div class="notice notice-error is-dismissible">
            <p><?php esc_html_e('The Contact Form 7 plugin is required for this theme. Please install and activate it.', 'bootstrapwptheme'); ?></p>
            <p>
                <a href="<?php echo esc_url(admin_url('themes.php?page=install-required-plugin&plugin=contact-form-7&install')); ?>" class="button-primary">
                    <?php esc_html_e('Install Contact Form 7', 'bootstrapwptheme'); ?>
                </a>
            </p>
        </div>
    <?php
    }
}

function bootstrapwptheme_install_cf7_plugin()
{
    if (isset($_GET['page']) && $_GET['page'] === 'install-required-plugin' && isset($_GET['plugin']) && $_GET['plugin'] === 'contact-form-7') {
        require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/misc.php';
        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        require_once ABSPATH . 'wp-admin/includes/plugin.php';

        $plugin_slug = 'contact-form-7';
        $plugin_api = plugins_api('plugin_information', array('slug' => $plugin_slug));

        if (is_wp_error($plugin_api)) {
            wp_die($plugin_api->get_error_message());
        }

        $upgrader = new Plugin_Upgrader();
        $install_result = $upgrader->install($plugin_api->download_link);

        if ($install_result) {
            activate_plugin('contact-form-7/wp-contact-form-7.php');
            wp_safe_redirect(admin_url('plugins.php'));
            exit;
        }
    }
}


add_filter('comment_form_default_fields', 'bootstrapwptheme_comment_form');
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 10, 3);
add_action('admin_notices', 'bootstrapwptheme_check_cf7_plugin');
add_action('admin_init', 'bootstrapwptheme_install_cf7_plugin');
add_action('customize_register', 'bootstrapwptheme_customizer_settings');
add_action('init', 'register_my_menu_and_add_comments_support');
add_action('after_setup_theme', 'after_setup_bootstrapwptheme');
add_action('wp_enqueue_scripts', "load_styles_and_scripts");

function bootstrapwptheme_comment_callback($comment, $args, $depth)
{
    $tag = ('div' === $args['style']) ? 'div' : 'li';
    $comment_classes = 'list-group-item';

    if ($comment->user_id == get_the_author_meta('ID')) {
        $comment_classes .= ' comment-by-author';
    }

    ?>
    <<?php echo $tag; ?> <?php comment_class($comment_classes, $comment); ?> id="comment-<?php comment_ID(); ?>">
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <div class="comment-author vcard">
                    <?php echo get_avatar($comment, 48); ?>
                    <?php printf(__('<b class="fn">%s</b> <span class="says">says:</span>', 'your-theme-text-domain'), get_comment_author_link()); ?>
                </div>

                <div class="comment-metadata">
                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php printf(__('%1$s at %2$s', 'bootstrapwptheme'), get_comment_date(), get_comment_time()); ?>
                        </time>
                    </a>
                    <?php edit_comment_link(__('(Edit)', 'bootstrapwptheme'), '<span class="edit-link">', '</span>'); ?>
                </div>
            </footer>

            <div class="comment-content">
                <?php comment_text(); ?>
            </div>

            <div class="reply">
                <?php
                comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Reply', 'bootstrapwptheme'),
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth']
                )));
                ?>
            </div>
        </article>
    </<?php echo $tag; ?>>
<?php
}
