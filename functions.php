<?php 
$args = array(
    'width'         => 388,
    'height'        => 96,
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
            <p id="footer_background">
                <label for="footer_background_colour">Footer Background Color:</label>
                <input type="text" id="footer_background_colour" name="tedx_footer_background" value="<?php echo get_option('tedx_footer_background'); ?>" />
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
                <p id="slider6" class="slider">
                    <label for="upload_image6">
                        Image 6:
                    </label>
                    <input type="text" id="upload_image6_text" size="36" name="upload_image[]" value="<?php echo $slider_images[5]; ?>" />
                    <input type="button" id="upload_image6" class="upload_button" value="Upload Image" />
                </p>
                <p id="slider7" class="slider">
                    <label for="upload_image7">
                        Image 7:
                    </label>
                    <input type="text" id="upload_image7_text" size="36" name="upload_image[]" value="<?php echo $slider_images[6]; ?>" />
                    <input type="button" id="upload_image7" class="upload_button" value="Upload Image" />
                </p>
                <p id="slider8" class="slider">
                    <label for="upload_image8">
                        Image 8:
                    </label>
                    <input type="text" id="upload_image8_text" size="36" name="upload_image[]" value="<?php echo $slider_images[7]; ?>" />
                    <input type="button" id="upload_image8" class="upload_button" value="Upload Image" />
                </p>
                <p id="slider9" class="slider">
                    <label for="upload_image9">
                        Image 9:
                    </label>
                    <input type="text" id="upload_image9_text" size="36" name="upload_image[]" value="<?php echo $slider_images[8]; ?>" />
                    <input type="button" id="upload_image9" class="upload_button" value="Upload Image" />
                </p>
                <p id="slider10" class="slider">
                    <label for="upload_image10">
                        Image 10:
                    </label>
                    <input type="text" id="upload_image10_text" size="36" name="upload_image[]" value="<?php echo $slider_images[9]; ?>" />
                    <input type="button" id="upload_image10" class="upload_button" value="Upload Image" />
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
    if ($_POST['tedx_footer_background'] != '') {
        update_option('tedx_footer_background', $_POST['tedx_footer_background']);
    }
    update_option('tedx_slider_images', $_POST['upload_image']);
}
add_action('admin_menu', 'tedx_theme_admin_menu');

function tedx_scripts() {
    wp_enqueue_style('jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/ui-darkness/jquery-ui.css');
    wp_enqueue_script('tedx_frontend_script', get_stylesheet_directory_uri() .'/assets/js/tedx_theme-scripts.js', array('jquery','jquery-ui-dialog'));
    wp_enqueue_style('tedx_heading_font', get_stylesheet_directory_uri() .'/assets/fonts/museoslab/stylesheet.css');
    wp_enqueue_script('jquery_rotator', get_stylesheet_directory_uri() . '/assets/js/jQueryRotateCompressed.2.2.js', array('jquery'));
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
                'thumbnail',
            ),
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'team'
            ),
            'register_meta_box_cb' => 'tedx_speakers_social_links'
        )
    );
}

function tedx_speakers_social_links() {
    add_meta_box('twitter', 'Twitter', 'twitter', 'tedx_team', 'side', 'default');
    add_meta_box('facebook', 'Facebook', 'facebook', 'tedx_team', 'side', 'default');
    add_meta_box('linkedin', 'Linkedin', 'linkedin', 'tedx_team', 'side', 'default');
}
add_action('add_meta_boxes', 'tedx_speakers_social_links');

function twitter() {
    global $post;
    //noncename is required to verify where the data originated
    echo '<input type="hidden" name="socialmeta_noncename" id="socialmeta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__)) . '" />';
    // get the data if it has already been entered
    $twitter = get_post_meta($post->ID, 'twitter', true);
    echo '<input type="text" name="twitter" value="' . $twitter . '" class="widefat" />';
}

function facebook() {
    global $post;
    //noncename is required to verify where the data originated
    echo '<input type="hidden" name="socialmeta_noncename" id="socialmeta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__)) . '" />';
    // get the data if it has already been entered
    $facebook = get_post_meta($post->ID, 'facebook', true);
    echo '<input type="text" name="facebook" value="' . $facebook . '" class="widefat" />';
}

function linkedin() {
    global $post;
    //noncename is required to verify where the data originated
    echo '<input type="hidden" name="socialmeta_noncename" id="socialmeta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__)) . '" />';
    // get the data if it has already been entered
    $linkedin = get_post_meta($post->ID, 'linkedin', true);
    echo '<input type="text" name="linkedin" value="' . $linkedin . '" class="widefat" />';
}

function tedx_save_meta($post_id, $post) {
    //first verify if it came from our screen and with proper authorisation because save_post can be automatically triggered too
    if (!wp_verify_nonce( $_POST['socialmeta_noncename'], plugin_basename(__FILE__))) {
        return $post->ID;
    }
    // Is the user allowed to edit the post
    if (!current_user_can('edit_post', $post->ID)) {
        return $post->ID;
    }
    //We're authenticated. Find and save the data.
    $social['twitter'] = $_POST['twitter'];
    $social['facebook'] = $_POST['facebook'];
    $social['linkedin'] = $_POST['linkedin'];
    foreach ($social as $key => $value) {
        if ($post->post_type == 'revision') return;
        if (get_post_meta($post->ID, $key, false)) {
            update_post_meta($post->ID, $key, $value);
        }
        else {
            add_post_meta($post->ID, $key, $value);
        }
        if (!value) {
            delete_post_meta($post->ID, $key);
        }
    }
}
add_action('save_post', 'tedx_save_meta', 1, 2);

?>
