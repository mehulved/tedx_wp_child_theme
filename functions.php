<?php 
$args = array(
    'width'         => 255,
    'height'        => 60,
    'default-image' => get_template_directory_uri() . '/images/header.jpg',
    'uploads'       => true
);
add_theme_support('custom-header', $args);

function tedx_theme_admin_menu() {
    add_theme_page('TEDx Theme Options', 'TEDx Theme Options', 'edit_themes', basename(__FILE__), 'tedx_options_page');
}

function tedx_options_page() {
    wp_enqueue_style('tedx_options_stylesheet', get_stylesheet_directory_uri() . '/assets/css/options.css');
    if ( $_POST['update_themeoptions'] == 'true' ) { tedx_options_update(); }
?>
    <h2>TEDx Theme Options Page</h2>
    <form method="POST" action="">
        <input type="hidden" name="update_themeoptions" value="true" />
        <div class="tedx-options">
            <h3>Social Media</h3>
            <p id="twitter">
                <label for="twitter">Twitter URL:</label> <input type="text" name="tedx_twitter_url" id="twitter_options" value="<?php echo get_option('tedx_twitter_url'); ?>" />
            </p>
            <p id="facebook">
                <label for="facebook">Facebook URL:</label> <input type="text" name="tedx_fb_url" id="fb_options" value="<?php echo get_option('tedx_fb_url'); ?>" />
            </p>
            <p id="youtube">
            <label for="youtube">Youtube URL:</label> <input type="text" name="tedx_yt_url" id="yt_options" value="<?php echo get_option('tedx_yt_url'); ?>" />
            </p>
            <h3>Theme Colours</h3>
            <p id="sidebar_background">
                <label for="sidebar_background_colour">Sidebar Background Color:</label>
                <input type="text" id="sidebar_background_colour" name="tedx_sidebar_background" value="<?php echo get_option('tedx_sidebar_background'); ?>" />
            </p>
            <div id="image_slider">
            <?php
            $slider_images = get_option('tedx_slider_images');
            ?>
                <h3>Image Slider</h3>
                <p>Upload/Select Images that you want to display on the slider. Dimension: 970px x 370px</p>
                <p id="slider1" class="slider">
                    <label for="upload_image1">
                        Image 1:
                    </label>
                    <input type="text" id="upload_image1_text" size="36" name="upload_image[]" value="<?php echo $slider_images[0]; ?>" />
                    <input type="button" id="upload_image1" class="upload_button" value="Upload Image" />
                </p>
                <p id="slider2" class="slider">
                    <label for="upload_image2">
                        Image 2:
                    </label>
                    <input type="text" id="upload_image2_text" size="36" name="upload_image[]" value="<?php echo $slider_images[1]; ?>" />
                    <input type="button" id="upload_image2" class="upload_button" value="Upload Image" />
                </p>
                <p id="slider3" class="slider">
                    <label for="upload_image3">
                        Image 3:
                    </label>
                    <input type="text" id="upload_image3_text" size="36" name="upload_image[]" value="<?php echo $slider_images[2]; ?>" />
                    <input type="button" id="upload_image3" class="upload_button" value="Upload Image" />
                </p>
                <p id="slider4" class="slider">
                    <label for="upload_image4">
                        Image 4:
                    </label>
                    <input type="text" id="upload_image4_text" size="36" name="upload_image[]" value="<?php echo $slider_images[3]; ?>" />
                    <input type="button" id="upload_image4" class="upload_button" value="Upload Image" />
                </p>
                <p id="slider5" class="slider">
                    <label for="upload_image5">
                        Image 5:
                    </label>
                    <input type="text" id="upload_image5_text" size="36" name="upload_image[]" value="<?php echo $slider_images[4]; ?>" />
                    <input type="button" id="upload_image5" class="upload_button" value="Upload Image" />
                </p>
            </div>
        <input type="submit" name="search" value="Update Theme Options" class="button" />
    </form>
<?php
}

function tedx_options_update() {
    if ($_POST['tedx_twitter_url'] != '') {
        update_option('tedx_twitter_url', $_POST['tedx_twitter_url']);
    }
    if ($_POST['tedx_fb_url'] != '') {
        update_option('tedx_fb_url', $_POST['tedx_fb_url']);
    }
    if ($_POST['tedx_yt_url'] != '') {
        update_option('tedx_yt_url', $_POST['tedx_yt_url']);
    }
    if ($_POST['tedx_sidebar_background'] != '') {
        update_option('tedx_sidebar_background', $_POST['tedx_sidebar_background']);
    }
    update_option('tedx_slider_images', $_POST['upload_image']);
}
add_action('admin_menu', 'tedx_theme_admin_menu');

function tedx_scripts() {
    wp_enqueue_script('tedx_frontend_script', get_stylesheet_directory_uri() .'/assets/js/tedx_theme-scripts.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'tedx_scripts');

function tedx_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('tedx_upload', get_stylesheet_directory_uri() .'/assets/js/tedx-script.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('tedx_upload');
}

function tedx_admin_styles() {
    wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) && ($_GET['page'] == 'functions.php')) {
    add_action('admin_print_scripts', 'tedx_admin_scripts');
    add_action('admin_print_styles', 'tedx_admin_styles');
}

wp_embed_register_handler( 'google_map', '#http://maps\.google\.com/maps(.*)#i', 'embed_google_map' );
function embed_google_map( $matches ) {
    $query = parse_url($matches[0]);
    parse_str($query['query'], $qvars);
    $width = isset($qvars['w']) ? $qvars['w'] : 600;
    $height = isset($qvars['w']) ? $qvars['h'] : 450;
    $embed = '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$matches[0].'"></iframe>';
    return apply_filters( 'embed_g_map', $embed );
}

add_action('init', 'tedx_speakers_custom_post_type');
function tedx_speakers_custom_post_type() {
    register_post_type('tedx_speakers',
        array(
            'labels' => array(
                'name' => __('Speakers'),
                'all_items' => __('Speakers List'),
                'add_new' => __('New Speaker'),
                'edit_item' => __('Edit Speaker'),
                'view_item' => __('View Speaker')
            ),
            'public' => false,
            'show_ui' => true,
            'menu_position' => 5,
            'supports' => array(
                'title',
                'editor',
                'thumbnail'
            ),
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'speakers'
            )
        )
    );
}

add_action('init', 'tedx_team_custom_post_type');
function tedx_team_custom_post_type() {
    register_post_type('tedx_team',
        array(
            'labels' => array(
                'name' => __('Team'),
                'all_items' => __('Team Members'),
                'add_new' => __('New Member'),
                'edit_item' => __('Edit Member'),
                'view_item' => __('View Member')
            ),
            'public' => false,
            'show_ui' => true,
            'menu_position' => 5,
            'supports' => array(
                'title',
                'editor',
                'thumbnail'
            ),
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'team'
            )
        )
    );
}

if ( function_exists('add_theme_support')) {
    add_theme_support('post-thumbnail');
    set_post_thumbnail_size(150,150);
    add_image_size('medium',300,300);
}
?>
