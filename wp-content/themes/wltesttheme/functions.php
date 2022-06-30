<?php

/*Styles and scripts*/
add_action('wp_enqueue_scripts', 'wl_test_theme_scripts_styles');
function wl_test_theme_scripts_styles(){
    /*Stylesheets*/
    wp_enqueue_style( 'bootstrap_styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css');
    wp_enqueue_style( 'theme_styles', get_stylesheet_directory_uri().'/css/style.css', array('bootstrap_styles'));

    /*Scripts*/
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_stylesheet_directory_uri().'/js/jquery-3.6.0.min.js', '', '3.6.0', true);
    wp_enqueue_script('bootstrap_scripts', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', 'jquery', '', true);
}

/*Enable wp color picker*/
add_action( 'admin_enqueue_scripts', 'color_picker_scripts' );
function color_picker_scripts( $hook ){
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'main-scripts', get_stylesheet_directory_uri().'/js/main.js', array('wp-color-picker', 'jquery'), false, true );
}

/*Custom post type - Car ** Car taxonomies*/
add_action('init', 'car_taxonomies');
function car_taxonomies () {

    /*Car name taxonomy*/
    $car_name_labels = array(
        'name' => _x( 'Марки авто', 'taxonomy general name' ),
        'singular_name' => _x( 'Марка авто', 'taxonomy singular name' ),
        'menu_name' => __( 'Марки' ),
        'all_items' => __( 'Все Марки' ),
        'edit_item' => __( 'Изменить марку' ),
        'view_item' => __( 'Просмотреть Марки' ),
        'update_item' => __( 'Обновить марку' ),
        'add_new_item' => __( 'Добавить новую марку' ),
        'new_item_name' => __( 'Название' ),
        'parent_item' => __( 'Родительская' ),
        'parent_item_colon' => __( 'Родительская:' ),
        'search_items' => __( 'Поиск марок' ),
        'not_found' => __( 'Марку не найдено.' ),
    );

    $car_name_args = array(
        'labels' => $car_name_labels,
        'public' => true,
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'description' => '',
        'hierarchical' => false,
        'rewrite' => true,
    );

    register_taxonomy('car_name', 'car', $car_name_args);

    /*Car country of origin taxonomy*/
    $car_country_labels = array(
        'name' => _x( 'Страны производители', 'taxonomy general name' ),
        'singular_name' => _x( 'Страна производитель', 'taxonomy singular name' ),
        'menu_name' => __( 'Страны' ),
        'all_items' => __( 'Все Страны' ),
        'edit_item' => __( 'Изменить страну' ),
        'view_item' => __( 'Просмотреть Страны' ),
        'update_item' => __( 'Обновить страну' ),
        'add_new_item' => __( 'Добавить новую страну' ),
        'new_item_name' => __( 'Название' ),
        'parent_item' => __( 'Родительская' ),
        'parent_item_colon' => __( 'Родительская:' ),
        'search_items' => __( 'Поиск стран' ),
        'not_found' => __( 'Страну не найдено.' ),
    );

    $car_country_args = array(
        'labels' => $car_country_labels,
        'public' => true,
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'description' => '',
        'hierarchical' => false,
        'rewrite' => true,
    );

    register_taxonomy('car_country', 'car', $car_country_args);

    /*Custom post type - Car*/
    $car_labels = array(
        'name'               => 'Автомобили',
        'singular_name'      => 'Автомобиль',
        'add_new'            => 'Добавить автомобиль',
        'add_new_item'       => 'Добавление автомобиля',
        'edit_item'          => 'Редактирование автомобиля',
        'new_item'           => 'Новый автомобиль',
        'view_item'          => 'Смотреть автомобиль',
        'search_items'       => 'Искать автомобиль',
        'not_found'          => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon'  => '',
        'menu_name'          => 'Автомобили',
    );
    register_post_type( 'car', [

        'labels' => $car_labels,
        'description'         => '',
        'public'              => true,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields'],
        'taxonomies'          => ['car_name', 'car_country'],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

/*Meta box for custom fields*/
function car_metabox() {
    add_meta_box(
        'car_metabox',
        'Характеристики авто',
        'car_metabox_callback',
        'car',
        'normal',
    );
}
add_action( 'add_meta_boxes', 'car_metabox' );

/*Car meta fields*/
$car_meta_fields = array(
    array(
        'label' => 'Цвет',
        'desc'  => 'Выберите цвет авто.',
        'id'    => 'car_meta_color',
        'type'  => 'text'
    ),
    array(
        'label' => 'Топливо',
        'desc'  => 'Укажите тип топлива.',
        'id'    => 'car_meta_fuel',
        'type'  => 'select',
        'options' => array (
            array (
                'label' => 'Бензин',
                'value' => 'Бензин'
            ),
            array (
                'label' => 'Дизель',
                'value' => 'Дизель'
            ),
            array (
                'label' => 'Электро',
                'value' => 'Электро'
            ),
            array (
                'label' => 'Гибрид',
                'value' => 'Гибрид'
            )
        )
    ),
    array(
        'label' => 'Мощность',
        'desc'  => 'Укажите мощность авто (л.с.)',
        'id'    => 'car_meta_power',
        'type'  => 'number'
    ),
    array(
        'label' => 'Цена',
        'desc'  => 'Укажите цену авто ($)',
        'id'    => 'car_meta_price',
        'type'  => 'number'
    )
);
/*Car meta fields in admin*/
function car_metabox_callback( $post ) {
    global $car_meta_fields;

    echo "<input type=\"hidden\" name=\"custom_meta_box_nonce\" value=\"".wp_create_nonce(basename(__FILE__))."\" >";

    echo '<table class="form-table">';
    foreach ($car_meta_fields as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr><th><label for="'.$field['id'].'">'.$field['label'].'</label></th><td>';
        switch($field['type']) {
            case 'text':
            case 'number':
                echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'">
        <br><span class="description">'.$field['desc'].'</span>';
                break;
            case 'select':
                echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
                foreach ($field['options'] as $option) {
                    echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
                }
                echo '</select><br><span class="description">'.$field['desc'].'</span>';
                break;
        }
        echo '</td></tr>';
    }
    echo '</table>';
}

/*Save meta fields*/
function save_car_meta_fields($post_id) {
    global $car_meta_fields;

    if (!isset( $_POST['custom_meta_box_nonce'] ) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    if ('car' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($car_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_action('save_post', 'save_car_meta_fields');

/*
 * Add menu support for customizer warning disappear
 * You can see details on:
 * https://github.com/bobbingwide/bobbingwide/issues/47
*/
add_theme_support('menus');

/*Customizer custom section for phone number*/
add_action('customize_register', function($customizer){
    /*Phone number*/
    $customizer->add_section(
        'header_phone_section',
        array(
            'title' => 'Номер телефона',
            'description' => 'В данной секции можно задать номер телефона для шапки сайта',
            'priority' => 11
        )
    );
    $customizer->add_setting(
        'header_phone',
        array('default' => '+xx (xxx) xxx - xx - xx')
    );

    $customizer->add_control(
        'header_phone',
        array(
            'label' => 'Номер телефона',
            'section' => 'header_phone_section',
            'type' => 'text',
        )
    );
});

/*Customizer logo support*/
add_action( 'after_setup_theme', 'add_customizer_logo' );
function add_customizer_logo() {
    add_theme_support( 'custom-logo', array(
        'width' => 250,
        'height' => 100,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => array('site-title', 'site-description')
    ));
}

/*10 last cars shortcode*/
function last_ten_cars() {
    $args = array(
        'post_type' => 'car',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 10
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        $car_list = "<ul>";
        while ( $query->have_posts() ) {
            $query->the_post();
            $car_list .= "<li><a href=\"".get_permalink()."\">".get_the_title()."</a></li>";
        }
        $car_list .= "</ul>";
    }
    else {
        $car_list = "No cars found...";
    }

    wp_reset_postdata();

    return $car_list;
}
add_shortcode('show_last_ten_cars', 'last_ten_cars');

/*Enable post image*/
add_theme_support( 'post-thumbnails' );