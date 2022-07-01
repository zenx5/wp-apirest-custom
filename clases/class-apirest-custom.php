<?php

class ApirestCustom extends Plugink
{
    public static function active()
    {
    }

    public static function deactive()
    {
    }

    public static function init()
    {
        self::create_endpoint_type();
        add_action('add_meta_boxes_endpoint_custom', array('ApirestCustom', 'create_metas'));
        add_action('rest_api_init', array('ApirestCustom', 'endpoints'));
    }

    public static function endpoints()
    {
        $endpoints = new WP_Query([
            "type_post" => "endpoint_custom",
            "post_per_page" => -1
        ]);

        foreach ($endpoints as $endpoint) {
            $method = self::get_var_meta('apirest-custom-method', $endpoint->ID);
            $url = self::get_var_meta('apirest-custom-url', $endpoint->ID);
            $vendor = self::get_var_meta('apirest-custom-vendor', $endpoint->ID);
            $version = self::get_var_meta('apirest-custom-version', $endpoint->ID);

            register_rest_route("$vendor/$version", $url, array(
                'methods' => $method,
                'callback' => function () {
                    include "./exec/$vendor-$version-$metho-$url.php";
                }
            ));
        }
    }

    public static function create_metas()
    {
        self::create_meta('endpoint_custom', [
            [
                'title' => 'Vendor',
                'render_callback' => function () {
                    include WP_PLUGIN_DIR . '/wp-apirest-custom/metas/vendor.php';
                }
            ],
            [
                'title' => 'Configuracion',
                'render_callback' => function () {
                    include WP_PLUGIN_DIR . '/wp-apirest-custom/metas/settings.php';
                }
            ]
        ]);
    }

    public static function create_endpoint_type()
    {
        self::create_type_post('endpoint_custom', 'Endpoint', 'Endpoints', [
            'description' => 'Define los endpoints para la APIRest Full',
            'public'       => false,
            'can_export'   => false,
            'show_ui'      => true,
            'show_in_menu' => true,
            'query_var'    => false,
            'rewrite'      => false,
            'has_archive'  => false,
            'hierarchical' => false,
            'supports'     => array('title'),
            //'menu_icon'    => pods_svg_icon('pods'),
            //'menu_position' => 5,
            'show_in_nav_menus' => false,
        ]);
    }
}
