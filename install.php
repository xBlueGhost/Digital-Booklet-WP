<?php
/**
 * Fichier contenant les fonctions utilisées lors de l'activation du du plugin
 * @author Quentin CATHERINE
 * @version 0.0.1-alpha
 */
class ENSICAEN_Digital_Booklet__install {

	/**
	 *	Fonction permettant d'installer la base de données
	 */
	public static function install_db()
	{
		global $wpdb; // Variable d'accès à la base

		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_test(id INT AUTO_INCREMENT PRIMARY KEY, text VARCHAR(255) NOT NULL);");
	}

}