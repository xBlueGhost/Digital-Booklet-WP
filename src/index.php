<?php
/*
Plugin Name: ENSICAEN Digital Booklet
Plugin URI: http://ensicaen-digital-booklet.github.io/Digital-Booklet-WP/
Description: Permet de mettre en place le livret numérique de l'ENSICAEN au sein de leur nouveau site Wordpress
Version: 1.0.0-balsa
Author: Quentin CATHERINE, Camille NEVEU, Martin GILLET, Margaux LEQUERTIER
License: A déterminer
*/
class EDB_Plugin {
	
	public function __construct()
	{
		//////////
		// Inclusions des pages utilisées
		//////////
		include_once plugin_dir_path(__FILE__) . 'install.php';
		include_once plugin_dir_path(__FILE__) . 'uninstall.php';
		
		//////////
		// 
		//////////
		wp_enqueue_style('edb-css', plugins_url('assets/css/edb.css', __FILE__));
		wp_enqueue_script('edb-jquery', plugins_url('assets/js/jquery.min.js', __FILE__));
		wp_enqueue_script('edb-js', plugins_url('assets/js/edb.js', __FILE__));
		
		//////////
		// Filtres
		//////////
		add_filter('the_content', array( $this, 'override_content' ));
		
		//////////
		// Mappages des événements
		//////////
		register_activation_hook(__FILE__, array( 'EDB_Install', 'install_page' ));
		register_deactivation_hook(__FILE__, array( 'EDB_Uninstall', 'uninstall_page' ));
	}
	
	public function override_content($content)
	{
		global $post;
		
		if ($post->post_title == 'Livret numérique')
			include plugin_dir_path(__FILE__) . 'template.php';
	}
	
}

new EDB_Plugin();