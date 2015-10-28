<?php
/**
 * Fichier contenant les fonctions utilisées lors de l'activation du du plugin
 * @author Quentin CATHERINE
 * @version 0.0.1-alpha
 */
class ENSICAEN_Digital_Booklet__uninstall {

	/**
	 * Fonction permettant de supprimer la base de données
	 */
	public static function uninstall_db()
	{
		global $wpdb; // Variable d'accès à la base

		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_test;");
	}

}