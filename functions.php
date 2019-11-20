<?php 
    // Funcion para crear menus
    if (function_exists('register_nav_menus')) {
        register_nav_menus (array('superior' => 'Menu Navbar'));
    }

    // Funcion para crear clases en anlcas
    function clase_ancla_menu($atts, $item, $args) {
        $atts['class'] = 'nav-link';
        return $atts;
    }
    add_filter('nav_menu_link_attributes', 'clase_ancla_menu', 10, 3);

    // Crear un Custom Post Type de Noticias
    function noticias_post_type() {

        $labels = array(
            'name'                  => _x( 'Noticias', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Noticia', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Noticias', 'text_domain' ),
            'name_admin_bar'        => __( 'Noticias', 'text_domain' ),
            'archives'              => __( 'Archivo Noticias', 'text_domain' ),
            'attributes'            => __( 'Atributos Noticias', 'text_domain' ),
            'parent_item_colon'     => __( 'Noticia Padre', 'text_domain' ),
            'all_items'             => __( 'Todas las Noticias', 'text_domain' ),
            'add_new_item'          => __( 'Agregar Nueva', 'text_domain' ),
            'add_new'               => __( 'Agregar', 'text_domain' ),
            'new_item'              => __( 'Nueva', 'text_domain' ),
            'edit_item'             => __( 'Editar', 'text_domain' ),
            'update_item'           => __( 'Modificar', 'text_domain' ),
            'view_item'             => __( 'Ver Noticia', 'text_domain' ),
            'view_items'            => __( 'Ver Noticias', 'text_domain' ),
            'search_items'          => __( 'Buscar Noticia', 'text_domain' ),
            'not_found'             => __( 'No se encontraron Noticias', 'text_domain' ),
            'not_found_in_trash'    => __( 'No se encontró en papelera', 'text_domain' ),
            'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
            'set_featured_image'    => __( 'Asignar Imagen destacada', 'text_domain' ),
            'remove_featured_image' => __( 'Borrar Imagen destacada', 'text_domain' ),
            'use_featured_image'    => __( 'Usar como Imagen destacada', 'text_domain' ),
            'insert_into_item'      => __( 'Insertar en Noticia', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Cargar a Noticia', 'text_domain' ),
            'items_list'            => __( 'Lista de Noticias', 'text_domain' ),
            'items_list_navigation' => __( 'Navegación de Recetas', 'text_domain' ),
            'filter_items_list'     => __( 'Filtro de Recetas', 'text_domain' ),
        );
        $rewrite = array(
            'slug'                  => 'noticias',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Noticia', 'text_domain' ),
            'description'           => __( 'Noticias destacadas', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'custom-fields' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-welcome-widgets-menus',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        register_post_type( 'noticias_post_type', $args );

    }
    add_action( 'init', 'noticias_post_type', 0 );

    // Funcion para agregar imagenes destacadas a los post
    if (function_exists('add_theme_support')) {
        add_theme_support('post_thumbnails');
    }

?>