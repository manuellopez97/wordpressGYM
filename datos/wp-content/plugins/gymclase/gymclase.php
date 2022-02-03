<?php
/*
 Plugin Name: Apoyo al Gym
 Author: Javier
 Plugin URI:
 Author URI:
 Description: Plugin para el uso del Gym
 Version: 1.0.0
*/
// Registrar Custom Post Type
// Instalamos además un plugin llamado Advanced Custom Fields

if (!defined("ABSPATH")) die();

function crear_clases() {
    $labels = array(
        'name'                  => _x( 'Clases', 'Post Type General Name', 'a' ),
        'singular_name'         => _x( 'Clase', 'Post Type Singular Name', 'a' ),
        'menu_name'             => __( 'Clases', 'a' ),
        'name_admin_bar'        => __( 'Clase', 'a' ),
        'archives'              => __( 'Archivo', 'a' ),
        'attributes'            => __( 'Atributos', 'a' ),
        'parent_item_colon'     => __( 'Clase Padre', 'a' ),
        'all_items'             => __( 'Todas Las Clases', 'a' ),
        'add_new_item'          => __( 'Agregar Clase', 'a' ),
        'add_new'               => __( 'Agregar Clase', 'a' ),
        'new_item'              => __( 'Nueva Clase', 'a' ),
        'edit_item'             => __( 'Editar Clase', 'a' ),
        'update_item'           => __( 'Actualizar Clase', 'a' ),
        'view_item'             => __( 'Ver Clase', 'a' ),
        'view_items'            => __( 'Ver Clases', 'a' ),
        'search_items'          => __( 'Buscar Clase', 'a' ),
        'not_found'             => __( 'No Encontrado', 'a' ),
        'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'a' ),
        'featured_image'        => __( 'Imagen Destacada', 'a' ),
        'set_featured_image'    => __( 'Guardar Imagen destacada', 'a' ),
        'remove_featured_image' => __( 'Eliminar Imagen destacada', 'a' ),
        'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'a' ),
        'insert_into_item'      => __( 'Insertar en Clase', 'a' ),
        'uploaded_to_this_item' => __( 'Agregado en Clase', 'a' ),
        'items_list'            => __( 'Lista de Clases', 'a' ),
        'items_list_navigation' => __( 'Navegación de Clases', 'a' ),
        'filter_items_list'     => __( 'Filtrar Clases', 'a' ),
    );
    $args = array(
        'label'                 => __( 'Clase', 'a' ),
        'description'           => __( 'Clases para el Sitio Web', 'a' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-image-filter',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'nueva_opt', $args );

}
add_action( 'init', 'crear_clases', 0 );
?>