<?php


function xtiv_assets(){

    wp_register_style('google-font',"https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700", array(), false, 'all');
    wp_register_style('google-font-1',"https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap",array(), false, 'all');
    wp_register_style('bootstrap',"https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css",array(),'5-1', 'all');

    wp_enqueue_style("estilos", get_template_directory_uri()."/assets/css/style.css" , array("google-font", "bootstrap"));

    wp_enqueue_script("xtivsales-js",get_template_directory_uri()."/assets/js/scripts.js");
}

function xtiv_theme_support(){

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo',  // appearance/customize -> Para modificar el logo
        array(
            "width" => 170,
            "height" => 35,
            "flex-width" => true,
            "flex-height" => true
        )
    );
}

function xtiv_add_menus(){
    register_nav_menus(
        array(
            'main-menu' => 'Main Menu',
            'responsive-menu' => 'Responsive Menu'
        )
        );
}

function xtiv_footer_sidebar(){
    register_sidebar( array(
        'name' => 'Pie de pagina',
        'id' => 'pie-de-pagina',
        'before_widget' => '',
        'after_widget' => ''
    ) );
}

function xtiv_cpt_producto(){

    $labels = array(
        'name' => 'Producto',
        'singular_name' => 'Producto',
        'all_items' => 'Todos los productos',
        'add_new' => 'Añadir producto'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Productos para listar en un catálogos.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'producto' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array('category'),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-cart'
    );

    register_post_type( 'producto', $args );
}

function xtiv_add_signin_menu(){
    $current_user = wp_get_current_user(  );
    $msg = is_user_logged_in(  )? $current_user->user_email : "Sign in";
    echo $msg;
}

add_action('xtiv_signin','xtiv_add_signin_menu');
add_action('init', 'xtiv_cpt_producto');
add_action("widgets_init","xtiv_footer_sidebar");
add_action("after_setup_theme", "xtiv_add_menus");
add_action("after_setup_theme", "xtiv_theme_support");
add_action("wp_enqueue_scripts", "xtiv_assets" );


function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');
