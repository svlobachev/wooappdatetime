<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       lobachev.xyz
 * @since      1.0.0
 *
 * @package    Wooappdatetime
 * @subpackage Wooappdatetime/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wooappdatetime
 * @subpackage Wooappdatetime/includes
 * @author     Sergei Lobachev <gsvlobachev@gmail.com>
 */
class Wooappdatetime_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wooappdatetime',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
