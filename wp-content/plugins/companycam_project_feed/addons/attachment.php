<?php
add_action('add_meta_boxes', 'add_companycam_id');
add_action('add_meta_boxes', 'add_custom_subtitle');
add_action('add_meta_boxes', 'add_custom_seo');
add_action('add_meta_boxes', 'add_custom_meta_boxes');
add_action('admin_head-post.php', 'print_scripts');
add_action('admin_head-post-new.php', 'print_scripts');
add_action('save_post', 'update_post_gallery', 10, 2);

/**
 * Add custom Meta Box to Posts post type
 */
function add_custom_meta_boxes()
{
    // Define the custom attachment for companycam_feed
    add_meta_box(
        'wp_custom_attachment',
        'Photos',
        'post_gallery_options',
        'companycam_feed',
        'normal',
        'core'
    );
} // end add_custom_meta_boxes


/**
 * Print the Meta Box content
 */
function post_gallery_options()
{
    global $post;
    $gallery_data = get_post_meta($post->ID, 'gallery_data', true);

    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'noncename');
    ?>

    <div id="dynamic_form">
        <div id="field_wrap">
            <?php
            if (isset($gallery_data['image_url'])):
            for ($i = 0;
            $i < count($gallery_data['image_url']);
            $i++):
            ?>

            <div class="field_row">
                <div class="field_left">
                    <div class="form_field">
                        <label><?= _e('Image URL'); ?></label>
                        <input type="text"
                               class="meta_image_url"
                               name="gallery[image_url][]"
                               value="<?php esc_html_e($gallery_data['image_url'][$i]); ?>"
                        />
                        <p>
                            <label><?= _e('Image Alt'); ?></label>
                            <input type="text"
                                   class="meta_image_alt"
                                   name="gallery[alt][]"
                                   value="<?php esc_html_e($gallery_data['alt'][$i]); ?>"
                            />
                        </p>
                    </div>
                </div>
                <div class="field_right image_wrap">
                    <img src="<?php esc_html_e($gallery_data['image_url'][$i]); ?>" height="48" width="48"/>
                </div>

                <div class="field_right">
                    <input class="button" type="button" value="Choose File" onclick="add_image(this)"/><br/>
                    <input class="button" type="button" value="Remove" onclick="remove_field(this)"/>
                </div>

                <div class="clear"/>
            </div>
        </div>
        <?php
        endfor;
        endif;
        ?>
    </div>

    <div style="display:none" id="master-row">
        <div class="field_row">
            <div class="field_left">
                <div class="form_field">
                    <label><?= _e('Image URL'); ?></label>
                    <input class="meta_image_url" value="" type="text" name="gallery[image_url][]"/>
                    <p>
                        <label><?= _e('Image Alt'); ?></label>
                        <input class="meta_image_alt" value="" type="text" name="gallery[alt][]"/>
                    </p>
                </div>
            </div>
            <div class="field_right image_wrap">
            </div>
            <div class="field_right">
                <input type="button" class="button" value="Choose File" onclick="add_image(this)"/>
                <br/>
                <input class="button" type="button" value="Remove" onclick="remove_field(this)"/>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div id="add_field_row">
        <input class="button" type="button" value="Add Field" onclick="add_field_row();"/>
    </div>

    </div>

    <?php
}

/**
 * Print styles and scripts
 */
function print_scripts()
{
// Check for correct post_type
    global $post;
    if ('companycam_feed' != $post->post_type)// here you can set post type name
        return;
    ?>
    <style type="text/css">
        #dynamic_form input[type=text] {
            width: 300px;
        }

        #dynamic_form .field_row {
            border: 1px solid #999;
            margin-bottom: 10px;
            padding: 10px;
        }

        #dynamic_form label {
            padding: 0 6px;
        }

        .field {
            padding: 3px 8px;
            font-size: 1.7em;
            line-height: 100%;
            height: 1.7em;
            width: 100%;
            outline: 0;
            margin: 0 0 3px;
            background-color: #fff;
        }
    </style>

    <script type="text/javascript">
        function add_image(obj) {
            var parent = jQuery(obj).parent().parent('div.field_row');
            var inputField = jQuery(parent).find("input.meta_image_url");
            var inputAlt = jQuery(parent).find("input.meta_image_alt");

            tb_show('', 'media-upload.php?TB_iframe=true');

            window.send_to_editor = function (html) {
                var url = jQuery(html).find('img').attr('src');
                var alt = jQuery(html).find('img').attr('alt');
                inputField.val(url);
                inputAlt.val(alt);
                jQuery(parent)
                    .find("div.image_wrap")
                    .html('<img src="' + url + '" height="48" width="48" />');
                tb_remove();
            };

            return false;
        }

        function remove_field(obj) {
            var parent = jQuery(obj).parent().parent();
            parent.remove();
        }

        function add_field_row() {
            var row = jQuery('#master-row').html();
            jQuery(row).appendTo('#field_wrap');
        }

    </script>
    <?php
}

/**
 * Save post action, process fields
 */
function update_post_gallery($post_id, $post_object)
{

// Doing revision, exit earlier **can be removed**
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

// Doing revision, exit earlier
    if ('revision' == $post_object->post_type)
        return;

// Verify authenticity
    if (!wp_verify_nonce($_POST['noncename'], plugin_basename(__FILE__)))
        return;

// Correct post type
    if ('companycam_feed' != $_POST['post_type']) // here you can set post type name
        return;
    // save Photos Meta
    if ($_POST['gallery']) {
        // Build array for saving post meta
        $gallery_data = array();
        for ($i = 0; $i < count($_POST['gallery']['image_url']); $i++) {
            if ('' != $_POST['gallery']['image_url'][$i]) {
                $gallery_data['image_url'][] = $_POST['gallery']['image_url'][$i];
                $gallery_data['createdAt'][] = time();
                $gallery_data['alt'][] = $_POST['gallery']['alt'][$i];
            }
        }

        if ($gallery_data)
            update_post_meta($post_id, 'gallery_data', $gallery_data);
        else
            delete_post_meta($post_id, 'gallery_data');
    } // Nothing received, all fields are empty, delete option
    else {
        delete_post_meta($post_id, 'gallery_data');
    }

    // save Subtitle Meta
    if ($subtitle = $_POST['post_subtitle']) {

        // Build array for saving post meta
        if ($subtitle)
            update_post_meta($post_id, 'post_subtitle', $subtitle);
        else
            delete_post_meta($post_id, 'post_subtitle');
    } // Nothing received, all fields are empty, delete option
    else {
        delete_post_meta($post_id, 'post_subtitle');
    }
    // save Subtitle Meta
    if ($seo = $_POST['post_seo']) {

// Build array for saving post meta
        if ($seo)
            update_post_meta($post_id, 'post_seo', $seo);
        else
            delete_post_meta($post_id, 'post_seo');
    } // Nothing received, all fields are empty, delete option
    else {
        delete_post_meta($post_id, 'post_seo');
    }
}


function add_custom_subtitle()
{
    // Define the custom attachment for companycam_feed
    add_meta_box(
        'wp_custom_subtitle',
        'Subtitle',
        'post_subtitle',
        'companycam_feed',
        'normal',
        'core'
    );
} // end add_custom_meta_boxes

function add_custom_seo()
{
    // Define the custom attachment for companycam_feed
    add_meta_box(
        'wp_custom_seo',
        'Seo Data',
        'post_seo',
        'companycam_feed',
        'normal',
        'core'
    );
} // end add_custom_meta_boxes

function add_companycam_id()
{
    // Define the custom attachment for companycam_feed
    add_meta_box(
        'wp_custom_ccid',
        'CompanyCam ID',
        'companycam_id',
        'companycam_feed',
        'normal',
        'core'
    );
} // end add_custom_meta_boxes


/**
 * Print the Meta Box content
 */
function post_subtitle()
{
    global $post;
    $subtitle = get_post_meta($post->ID, 'post_subtitle', true);

    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'subtitle');
    ?>

    <div id="titlewrap">
        <label class="screen-reader-text" id="subtitle-prompt-text"
               for="subtitle"><?= _e('Enter Subtitle here'); ?></label>
        <input type="text" class="field" name="post_subtitle" size="30" value="<?= $subtitle ?>" id="subtitle"
               autocomplete="off">
    </div>

    <?php
}

/**
 * Print the Meta Box content
 */
function post_seo()
{
    global $post;
    $post_seo = get_post_meta($post->ID, 'post_seo', true);

    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'post_seo');
    ?>

    <div id="titlewrap">
        <label class="screen-reader-text" id="seo-prompt-text" for="subtitle"><?= _e('Seo Data'); ?></label>
        <p>
            <label id="seo-prompt-title" for="post_seo_title"><?= _e('Title'); ?></label>
            <input type="text" class="field" name="post_seo[title]" size="30" placeholder="title"
                   value="<?= $post_seo && $post_seo['title'] ? $post_seo['title'] : '' ?>" id="post_seo_title"
                   autocomplete="off">
        </p>
        <label id="seo-prompt-desc" for="post_seo_desc"><?= _e('Description'); ?></label>
        <input type="text" class="field" name="post_seo[description]" size="30" placeholder="Description"
               value="<?= $post_seo && $post_seo['description'] ? $post_seo['description'] : ''; ?>" id="post_seo_desc"
               autocomplete="off">
    </div>
    <?php
}

function companycam_id()
{
    global $post;
    ?>

    <div id="titlewrap">
        <label class="screen-reader-text" id="cc-prompt-text"><?= _e('CompanyCam ID '); ?></label>
        <input type="text" class="field" name="companycam_id" size="30" placeholder="Description"
               value="<?= $post->ID; ?>" autocomplete="off" disabled>
    </div>

    <?php
}
