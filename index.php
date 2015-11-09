<?php
/*
Plugin Name: ENSICAEN Digital Booklet
Plugin URI: http://ensicaen-digital-booklet.github.io/Digital-Booklet-WP
Description: Plugin Wordpress permettant d'ajouter le livret numérique de l'ENSICAEN à leur nouveau site sous Wordpress
Version: 0.0.1-alpha
Author: Quentin CATHERINE, Camille NEVEU
*/
class ENSICAEN_Digital_Booklet {

	/**
	 * Constructeur de la classe. Fonction exécutée à l'instant de la classe
	 */
	public function __construct()
	{
		//////////
		// Inclusion des fichiers requis pour le bon fonctionnement du plugin
		//////////
		include_once plugin_dir_path(__FILE__) . 'install.php'; // Fichier d'installation du plugin
		include_once plugin_dir_path(__FILE__) . 'uninstall.php'; // Fichier de désinstallation du plugin
		include_once plugin_dir_path(__FILE__) . 'deactivation.php'; // Fichier de la déactivation du plugin
		include_once plugin_dir_path(__FILE__) . 'admin.php'; // Fichier d'administration du plugin
		include_once plugin_dir_path(__FILE__) . 'template.php';

		//////////
		// Mappage des actions
		//////////
		add_action('admin_menu', array('ENSICAEN_Digital_Booklet__admin', 'add_admin_menu'), 20);
		add_action('admin_init', array('ENSICAEN_Digital_Booklet__admin', 'register_settings'));

		//////////
		// Mappage des filtres
		//////////
		add_filter('template_include', array('ENSICAEN_Digital_Booklet__template', 'override_template'));

		//////////
		// Mappage des événements
		//////////
		register_activation_hook(__FILE__, array( 'ENSICAEN_Digital_Booklet__install', 'install_db' )); // Enregistre l'évènement d'installation du plugin
		register_activation_hook(__FILE__, array( 'ENSICAEN_Digital_Booklet__install', 'install_page')); // Enregistre l'évènement de l'installation de la page
		register_uninstall_hook(__FILE__, array( 'ENSICAEN_Digital_Booklet__uninstall', 'uninstall_db' )); // Enregistre l'évènement de désinstallation du plugin
		register_deactivation_hook(__FILE__, array( 'ENSICAEN_Digital_Booklet__deactivation', 'uninstall_page' )); // Enregistre l'évènement de la déinsallation de la page
	}

}

new ENSICAEN_Digital_Booklet(); // Instance de la classe. Sans elle le plguin ne fonctionnerait pas <3