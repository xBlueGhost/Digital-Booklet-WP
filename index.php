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
		include_once plugin_dir_path(__FILE__) . 'admin.php'; // Fichier d'administration du plugin

		add_action('admin_menu', array('ENSICAEN_Digital_Booklet__admin', 'add_admin_menu'), 20);
		add_action('admin_init', array('ENSICAEN_Digital_Booklet__admin', 'register_settings'));

		register_activation_hook(__FILE__, array( 'ENSICAEN_Digital_Booklet__install', 'install_db' )); // Enregistre l'énvènement d'installation du plugin
		register_uninstall_hook(__FILE__, array( 'ENSICAEN_Digital_Booklet__uninstall', 'uninstall_db' )); // Enregistre l'évènement de désinstallation du plugin
	}

}

new ENSICAEN_Digital_Booklet(); // Instance de la classe. Sans elle le plguin ne fonctionnerait pas <3