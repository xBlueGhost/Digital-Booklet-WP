<?php
/**
 * Fichier contenant les fonctions utilisées lors de l'activation du du plugin
 * @author Quentin CATHERINE, Camille NEVEU
 * @version 0.0.1-alpha
 */
class ENSICAEN_Digital_Booklet__install {

	/**
	 *	Fonction permettant d'installer la base de données
	 */
	public static function install_db()
	{
		global $wpdb; // Variable d'accès à la base

		//Suppression des tables 

		/*$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_responsable" );		
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_specialite");
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_type");
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_parcours");
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_semestre");
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_UE");
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_module");
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_coefficient");
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_matiere");
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}ensicaen_digital_boolket_heure");*/
		

		// création des tables 
	
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_responsable(numero INT PRIMARY KEY AUTO_INCREMENT, nom VARCHAR(100),prenom VARCHAR(100));");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_specialite(numero INT PRIMARY KEY AUTO_INCREMENT, nom VARCHAR(100));");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_type(numero INT PRIMARY KEY AUTO_INCREMENT, nom VARCHAR(100));");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_parcours(numero INT PRIMARY KEY AUTO_INCREMENT, typeParcours VARCHAR(100));");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_semestre(numero INT PRIMARY KEY AUTO_INCREMENT, nom VARCHAR(100), sousSemestre BOOLEAN);");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_UE(numero VARCHAR(100) PRIMARY KEY, libelle VARCHAR(100), moyenn_Min FLOAT, ECTS INT, nb_heure_totale FLOAT, activite BOOLEAN, majeure BOOLEAN,optionnelle BOOLEAN);");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_module(numero VARCHAR(100) PRIMARY KEY, nom VARCHAR(100),optionnel BOOLEAN);");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_coefficient(numero VARCHAR(100) PRIMARY KEY, nom VARCHAR(100),valeur FLOAT);");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_matiere(numero INT PRIMARY KEY, nom VARCHAR(100), prerequis text, objectif text, programme text, applications text, compétences text, bibliographie text);");
		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}ensicaen_digital_boolket_heure(numero INT PRIMARY KEY,nom varchar(100), typeCours VARCHAR(100),valeur FLOAT);");


		//insertion des données

		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_responsable", array ('numero' => 1, 'nom'=> 'Flament','prenom' => 'Stéphane'));
		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_specialite", array ('numero' => 1, 'nom' => 'Electronique et Physique appliquée'));
		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_parcours", array ('numero'=> 1, 'nom'=>'TroncCommun'));
		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_semestre",array ('numero' => 1,'typeParcours'=>'semestre 1'));
		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_UE",array ('numero'=>'1L1AA','libelle'=>'Langue et culture de lentreprise','moyenn_Min'=>10,'ECTS'=>6, 'nb_heure_totale'=> 107.5, 'activite' => false, 'majeure' => false, 'optionnelle' => false));
		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_module", array ('numero'=> '1L1AA1', 'nom' => 'LV1', 'optionnel'=> false));
		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_coefficient", array ('numero' => '1L1AA','nom' => 'LV1', 'valeur' => 9));
		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_matiere", array ('numero' => 1, 'nom'=>'Anglais'));
		$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_heure",array ( 'numero' => 1, 'nom'=> 'Anglais','typeCours'=>'TD', 'valeur'=>10));




	}

	public static function install_page()
	{
		$my_post = array(
			'post_title' => 'Livret numérique',
			'post_name' => 'livret-numerique',
			'post_content' => 'Ceci est le contenu du livret numérique.',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_category' => array(),
			'post_type' => 'page'
		);

		wp_insert_post($my_post);
	}

}