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
      'post_type' => 'instawidget', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'InstaWidget',
        'singular_name' => 'InstaWidget', 
        'menu_name'     => 'InstaWidget'
      ),
      // supports_label
      'supports_label' => array(
        'title',
        // 'thumbnail', 
        // 'editor',
        //'custom-fields',
      ),
      // rewrite
      'rewrite' => array(
        'slug'         => 'instawidget', // 2) custom-type slug
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
        'menu_icon'         => 'dashicons-instagram', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),

  )
);


new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Доп.поля',
    'post_types'      => array( 'instawidget' ),
    'page_templates'  => array(  ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'image',
            'field_name'   => 'image',
            'title'        => 'Изображение записи',
          ),
          array(
            'field_type'   => 'input',
            'type_input'   => 'url',
            'field_name'   => 'post_url',
            'title'        => 'Ссылка на пост',
            'required'     => true,
          ),
        )
      ),
      // Group fields
    )
  )
);


new WPS_PostColumns(
  array(
    'post_type' => 'instawidget',
    'fields'    => array(
      // views первый
      array(
        'field_type'   => 'image',
        'field_name'   => 'image',
        'columns_name' => 'Изображение'
      ),
    )
  )
);

