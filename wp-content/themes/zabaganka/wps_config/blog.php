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
      'post_type' => 'blog', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'Блог',
        'singular_name' => 'Блог', 
        'menu_name'     => 'Блог'
      ),
      // supports_label
      'supports_label' => array(
        'title',
        'thumbnail', 
        'editor',
        //'custom-fields',
      ),
      // rewrite
      'rewrite' => array(
        'slug'         => 'blog', // 2) custom-type slug
        'with_front'   => false,
        'hierarchical' => true
      ),
      // general
      'general' => array(
        // if need remove in query
        'taxonomies'        => array(''), // 3) 
        'menu_icon'         => 'dashicons-media-document', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),

  )
);


new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Доп.поля',
    'post_types'      => array( 'blog' ),
    'page_templates'  => array(  ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'input',
            'field_name'   => 'h1_title',
            'title'        => 'Заголовок H1',
            'description'  => '',
          ),
          array(
            'field_type'   => 'input',
            'field_name'   => 'breadcrumb',
            'title'        => 'Хлебные крошки',
            'description'  => '',
          ),
        )
      ),
      // Group fields
    )
  )
);


new WPS_PostColumns(
  array(
    'post_type' => 'blog',
    'fields'    => array(
      // views первый
      array(
        'field_type'   => 'views',
        'columns_name' => 'Просмотры'
      ),
    )
  )
);

