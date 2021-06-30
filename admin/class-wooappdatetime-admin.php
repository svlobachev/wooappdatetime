<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       lobachev.xyz
 * @since      1.0.0
 *
 * @package    Wooappdatetime
 * @subpackage Wooappdatetime/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wooappdatetime
 * @subpackage Wooappdatetime/admin
 * @author     Sergei Lobachev <gsvlobachev@gmail.com>
 */
class Wooappdatetime_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     */


    function create_custom_meta_box()
    {
        add_meta_box(
            'custom_product_cost_field',
            __( $this->plugin_name, 'woocommerce' ),
            array($this,'add_custom_content_meta_box'),
            'product',
            'side',
            'high'
        );
    }

    function add_custom_content_meta_box( $post )
    {
        $obj = new Wooappdatetime_content();
        $obj->content();
    }

    function meta_box_ajax_response() {

        $obj = new Wooappdatetime_content();
        $obj->ajax_response();
    }

    /*
     * Этап 3. Сохранение
     */



    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
        */
        add_options_page(
            'My plugin and Base Options Functions Setup',
            'Settings',
            'manage_options',
            'Settings',
            array($this, 'display_plugin_settings_page')
        );
        add_options_page(
            'My plugin and Base Options Functions Setup',
            'Go Pro',
            'manage_options',
            'Go Pro',
            array($this, 'display_plugin_gopro_page')
        );

    }

    //скрываем из общего меню Settings, останутся только ссылки в установщике плагинов
    function remove_menu_setting_links() {;
        remove_submenu_page( 'options-general.php', 'Settings');
        remove_submenu_page( 'options-general.php','Go Pro');

    }

    /**
     * Add settings action link to the plugins page.
     */

    public function add_action_links( $links ) {
        //Добавим ссылки в инсталятор плагинов
        $settings_link = array(
            '<a href="' . admin_url( 'options-general.php?page=Settings' ) . '">' . __('Settings', 'Settings') . '</a>',
        );
        $go_pro_link = array(
            '<a  style="color: #39b54a; font-weight: bold;" href="' . admin_url( 'options-general.php?page=Go Pro') . '">' . __('Go Pro', 'Go Pro') . '</a>',
        );
        return array_merge(  $settings_link, $links ,$go_pro_link);
    }

    /**
     * Render the settings page for this plugin.
     */

    public function display_plugin_settings_page() {
    // страница с настройками в классе
        $obj = new Wooappdatetime_content();
        $obj->settings();

    }

    public function display_plugin_gopro_page() {

        $obj = new Wooappdatetime_content();
        $obj->gopro();

    }

    /**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wooappdatetime_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wooappdatetime_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style(
		    $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'css/wooappdatetime-admin.css', array(),
            $this->version, 'all' );

        wp_enqueue_style(
            $this->plugin_name.'jquery.datetimepicker.min.css',
            plugin_dir_url( __FILE__ ) . 'css/jquery.datetimepicker.css', array(),
            $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wooappdatetime_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wooappdatetime_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_script(
		    $this->plugin_name,
            plugin_dir_url( __FILE__ ) . 'js/wooappdatetime-admin.js',
            array( 'jquery' ),
            $this->version,
            false );

        wp_enqueue_script(
            $this->plugin_name.'jquery.datetimepicker',
            plugin_dir_url( __FILE__ ) . 'js/jquery.datetimepicker.full.js',
            array( 'jquery' ),
            $this->version,
            false );

	}

}
