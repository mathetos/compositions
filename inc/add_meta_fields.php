<?php
/**
 * Add Meta Data to Compositions CPT
 * Version: 1.0
 * Author: Matt Cromwell
 * Author URI: https://www.mattcromwell.com
 * License: GPLv2
 *
 **/

add_action( 'cmb2_admin_init', 'compositions_register_top_metabox' );

function compositions_register_top_metabox()
{
    $prefix = 'compositions_';

    $compositions_meta = new_cmb2_box(array(
        'id' => $prefix . 'composer',
        'title' => esc_html__('Composer Info', 'compositions'),
        'object_types' => array('compositions'), // Post type
        'context'    => 'advanced',
    ));

    $compositions_meta->add_field(array(
        'name' => esc_html__('Composer Name', 'compositions'),
        'desc' => esc_html__('Full Name of the composer of this composition', 'compositions'),
        'id' => $prefix . 'composer_name',
        'type' => 'text',
    ));

    $compositions_meta->add_field(array(
        'name' => esc_html__('Date of Composition', 'compositions'),
        'desc' => esc_html__('Date Composition was authored or published', 'compositions'),
        'id' => $prefix . 'composition_date',
        'type' => 'text_date',
        'date_format' => 'M d, yy',
    ));
}

add_action( 'cmb2_admin_init', 'compositions_register_bottom_metabox' );

function compositions_register_bottom_metabox()
{
    $prefix = 'compositions_';

    $compositions_meta = new_cmb2_box(array(
        'id' => $prefix . 'media',
        'title' => esc_html__('Test Metabox', 'compositions'),
        'object_types' => array('compositions'), // Post type
        'context'    => 'normal',
    ));

    $compositions_meta->add_field(array(
        'name' => esc_html__('Audio', 'compositions'),
        'desc' => esc_html__('Upload your Composition Audio file as an MP3', 'compositions'),
        'id' => $prefix . 'audio_file',
        'type' => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add MP3' // Change upload button text. Default: "Add or Upload File"
        ),
    ));

    $compositions_meta->add_field(array(
        'name' => esc_html__('Orchestration', 'compositions'),
        'desc' => esc_html__('Upload your Composition Orchestration file as a PDF', 'compositions'),
        'id' => $prefix . 'pdf_file',
        'type' => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add PDF' // Change upload button text. Default: "Add or Upload File"
        ),
    ));
}


// Move all "advanced" metaboxes to directly below the title field
add_action('edit_form_after_title', function() {
    global $post, $wp_meta_boxes;
    do_meta_boxes(get_current_screen(), 'advanced', $post);
    unset($wp_meta_boxes[get_post_type($post)]['advanced']);
});