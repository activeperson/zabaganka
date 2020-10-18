<?php

/**
 * File for function declaration.
 *
 * @package   WPS_Framework
 * @version   1.0.0
 * @author    Alexander Laznevoy 
 * @copyright Copyright (c) 2017, Alexander Laznevoy
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 *
 */

// your code...


// БЛОГ
new WPS_CustomType(
  array(
    ## Create Files
    'create_archive_file' => false,
    'create_single_file'  => false,

    ## Post Type Register
    'register_post_type' => array(
      'post_type' => 'reviews', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'Отзывы',
        'singular_name' => 'Отзывы', 
        'menu_name'     => 'Отзывы'
      ),
      // supports_label
      'supports_label' => array(
        'title',
        'thumbnail', 
        // 'editor',
        //'custom-fields',
      ),
      // rewrite
      'rewrite' => array(
        'slug'         => 'reviews', // 2) custom-type slug
        'with_front'   => false,
        'hierarchical' => true
      ),
      // general
      'general' => array(
        // if need remove in query
        'query_var'           => false, 
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'taxonomies'        => array(''), // 3) 
        'menu_icon'         => 'dashicons-megaphone', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),

  )
);


new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Доп.поля',
    'post_types'      => array( 'reviews' ),
    'page_templates'  => array(  ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'input',
            'field_name'   => 'who',
            'title'        => 'Должность',
            'description'  => '',
          ),
          array(
            'field_type'   => 'wp_editor',
            'field_name'   => 'review_text',
            'title'        => 'Текст отзыва',
            'description'  => '',
          ),
          array(
            'field_type'   => 'input',
            'field_name'   => 'video_link',
            'title'        => 'Ссылка на видео-отзыв',
            'type_input'   => 'url',
            'description'  => 'Ссылка с YouTube',
          ),
          array(
            'field_type'   => 'input',
            'field_name'   => 'video_link_origin',
            'title'        => 'Ссылка на оригинал отзыва',
            'type_input'   => 'url',
            'description'  => '',
          ),
        )
      ),
      // Group fields
    )
  )
);
