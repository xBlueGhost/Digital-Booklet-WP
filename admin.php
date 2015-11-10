<?php 
class ENSICAEN_Digital_Booklet__admin {

	public function add_admin_menu()
	{
		add_menu_page('Livret Pédagogique', 'Livret Pédagogique', 'manage_options', 'ensicaen_digital_booklet', array('ENSICAEN_Digital_Booklet__admin', 'menu_html'));
		$hook_responsable=add_submenu_page('ensicaen_digital_booklet', 'Gestion Responsable', 'Gestion Responsable', 'manage_options', 'ensicaen_digital_booklet__Responsable', array('ENSICAEN_Digital_Booklet__admin', 'menu_Responsable'));
		$hook_specialite=add_submenu_page('ensicaen_digital_booklet', 'Gestion Spécialité', 'Gestion Spécialité', 'manage_options', 'ensicaen_digital_booklet__Specialite', array('ENSICAEN_Digital_Booklet__admin', 'menu_Specialite'));
		$hook_semestre=add_submenu_page('ensicaen_digital_booklet', 'Gestion Semestre', 'Gestion Semestre', 'manage_options', 'ensicaen_digital_booklet__Semestre', array('ENSICAEN_Digital_Booklet__admin', 'menu_Semestre'));
		$hook_UE=add_submenu_page('ensicaen_digital_booklet', 'Gestion UE', 'Gestion UE', 'manage_options', 'ensicaen_digital_booklet__UE', array('ENSICAEN_Digital_Booklet__admin', 'menu_UE'));
		$hook_module=add_submenu_page('ensicaen_digital_booklet', 'Gestion Modules', 'Gestion Modules', 'manage_options', 'ensicaen_digital_booklet__Modules', array('ENSICAEN_Digital_Booklet__admin', 'menu_Modules'));

		add_action('load-'.$hook_UE, array('ENSICAEN_Digital_Booklet__admin', 'inserer_UE'));
		add_action('load-'.$hook_module, array('ENSICAEN_Digital_Booklet__admin', 'inserer_module'));
		add_action('load-'.$hook_specialite, array('ENSICAEN_Digital_Booklet__admin', 'inserer_specialite'));
		add_action('load-'.$hook_responsable, array('ENSICAEN_Digital_Booklet__admin', 'inserer_responsable'));
		add_action('load-'.$hook_semestre, array('ENSICAEN_Digital_Booklet__admin', 'inserer_semestre'));

	}

	public function menu_html()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
    	echo '<p>Bienvenue sur la page d\'accueil</p>';
	}

	public function menu_UE()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des UE</p>';?>
		<form action="" method="post">
			<?php settings_fields('ENSICAEN_Digital_Booklet__admin_settings') ?>
			<?php do_settings_sections('ENSICAEN_Digital_Booklet__admin_settings') ?>
			<?php submit_button(); ?>
			
		</form>

		<?php

	}

	public function menu_Responsable()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des responsables</p>';?>
		<form action="" method="post">
			<?php settings_fields('ENSICAEN_Digital_Booklet__admin_settings_responsable') ?>
			<?php do_settings_sections('ENSICAEN_Digital_Booklet__admin_settings_responsable') ?>
			<?php submit_button(); ?>
			
		</form>

		<?php

	}
	public function menu_Modules()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des modules</p>';
		?>
		<form action="" method="post">
			<?php settings_fields('ENSICAEN_Digital_Booklet__admin_settings_module') ?>
			<?php do_settings_sections('ENSICAEN_Digital_Booklet__admin_settings_module') ?>
			<?php submit_button(); ?>
			
		</form>
		<?php
	}

	public function menu_Specialite()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des spécialités</p>';
		?>
		<form action="" method="post">
			<?php settings_fields('ENSICAEN_Digital_Booklet__admin_settings_specialite') ?>
			<?php do_settings_sections('ENSICAEN_Digital_Booklet__admin_settings_specialite') ?>
			<?php submit_button(); ?>
			
		</form>
		<?php
	}

	public function menu_Semestre()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des semestres</p>';
		?>
		<form action="" method="post">
			<?php settings_fields('ENSICAEN_Digital_Booklet__admin_settings_semestre') ?>
			<?php do_settings_sections('ENSICAEN_Digital_Booklet__admin_settings_semestre') ?>
			<?php submit_button(); ?>
			
		</form>
		<?php
	}

	public function register_settings()
	{
		//Formulaire de Spécialité
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section_specialite', 'Création d\'une spécialité', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_specialite');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_specialite', 'nom');

		add_settings_field('nom', 'Nom de la spécialité', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_specialite', 'ENSICAEN_Digital_Booklet__admin_section_specialite');

		//Formulaire de Responsable
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section_responsable', 'Création d\'un responsable', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_responsable');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_responsable', 'nom');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_responsable', 'prenom');

		add_settings_field('nom', 'Nom du responsable', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_responsable', 'ENSICAEN_Digital_Booklet__admin_section_responsable');
		add_settings_field('prenom', 'Prénom du responsable', array('ENSICAEN_Digital_Booklet__admin', 'prenom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_responsable', 'ENSICAEN_Digital_Booklet__admin_section_responsable');

		//Formulaure de semestre
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section_semestre', 'Création d\'un semestre', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_semestre');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_semestre', 'nom');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_semestre', 'sousSemestre');

		add_settings_field('nom', 'Nom du semestre', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_semestre', 'ENSICAEN_Digital_Booklet__admin_section_semestre');
		add_settings_field('sousSemestre', 'Sous Semestre?', array('ENSICAEN_Digital_Booklet__admin', 'sous_Semestre_html'), 'ENSICAEN_Digital_Booklet__admin_settings_semestre', 'ENSICAEN_Digital_Booklet__admin_section_semestre');

		//Formulaire création UE
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section', 'Création d\'une UE', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings');
		register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'numero');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'nom');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'moyenne');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'ects');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'nb_heure_totale');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'activite');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'majeure');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'option');

		add_settings_field('numero', 'Numéro de l\'UE', array('ENSICAEN_Digital_Booklet__admin', 'numero_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('nom', 'Nom de l\'UE', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('moyenne', 'Moyenne minimum', array('ENSICAEN_Digital_Booklet__admin', 'moyenne_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('ECTS', 'ECTS', array('ENSICAEN_Digital_Booklet__admin', 'ECTS_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('nb_heure_totale', 'Nombre total d\'heures de l\'UE', array('ENSICAEN_Digital_Booklet__admin', 'nb_heures_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('activite', 'Activité ?', array('ENSICAEN_Digital_Booklet__admin', 'activite_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('majeure', 'Majeure ?', array('ENSICAEN_Digital_Booklet__admin', 'majeure_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('option', 'Option ?', array('ENSICAEN_Digital_Booklet__admin', 'option_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');


		//Formulaire création Module
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section_module', 'Création d\'un module', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_module');
		register_setting('ENSICAEN_Digital_Booklet__admin_settings_module', 'numero');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_module', 'nom');

    	add_settings_field('numero', 'Numéro du module', array('ENSICAEN_Digital_Booklet__admin', 'numero_html'), 'ENSICAEN_Digital_Booklet__admin_settings_module', 'ENSICAEN_Digital_Booklet__admin_section_module');
		add_settings_field('nom', 'Nom du module', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_module', 'ENSICAEN_Digital_Booklet__admin_section_module');
		add_settings_field('option', 'Option ?', array('ENSICAEN_Digital_Booklet__admin', 'option_html'), 'ENSICAEN_Digital_Booklet__admin_settings_module', 'ENSICAEN_Digital_Booklet__admin_section_module');

	}


	public function section_html()
	{
	    echo 'Renseignez les champs.';
	}

	public function numero_html()
	{	?>
	    <input type="text" name="numero" value=""/>
	    <?php
	}

	public function nom_html()
	{	?>
	    <input type="text" name="nom" value=""/>
	    <?php
	}

	public function prenom_html()
	{	?>
	    <input type="text" name="prenom" value=""/>
	    <?php
	}

	public function nb_heures_html()
	{
		?>
		<input type="number" name="nb_heure_totale" value=""/>

		<?php
	}

	public function moyenne_html()
	{
		?>
		<input type="number" name="moyenne" value=""/>
		<?php
	}

	public function ECTS_html()
	{
		?>
		<input type="number" name="ects" value=""/>
		<?php
	}

	public function activite_html(){
		?>

		<input type="checkbox" name="activite"/>

		<?php
	}

	public function majeure_html(){
		?>

		<input type="checkbox" name="majeure"/>

		<?php
	}

	public function option_html(){
		?>

		<input type="checkbox" name="option"/>

		<?php
	}

	public function sous_Semestre_html()
	{
		?>

		<input type="checkbox" name="sousSemestre"/>

		<?php
	}
	

	public function inserer_UE(){

	if (isset($_POST) && !empty($_POST))	
	{
		
		if (
			isset($_POST['numero']) &&
			isset($_POST['nom']) &&
			isset($_POST['moyenne']) &&
			isset($_POST['ects']) && 
			isset($_POST['nb_heure_totale'])
			)

		{
			
			
			$numero = $_POST['numero'];
			$nom = $_POST['nom'];
			$moyenne = $_POST['moyenne'];
			$ects = $_POST['ects'];
			$nb_heure = $_POST['nb_heure_totale'];
			$activite = $_POST['activite'] == 'on' ? 1 : 0;
			$majeure = $_POST['majeure'] == 'on' ? 1 : 0;
			$option=$_POST['option'] == 'on' ? 1 : 0;
	
			global $wpdb;
		    
			$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_ue",
							array (
							'numero'=> $numero,
							'libelle'=> $nom,
							'moyenn_Min' => $moyenne, 
							'ECTS' => $ects, 
							'nb_heure_totale' => $nb_heure,
							'activite' => $activite,
							'majeure' => $majeure,
							'optionnelle' => $option
							)
						);

		}
	}

	echo 'données insérées';
}

	public function inserer_module()
	{
		if (isset($_POST) && !empty($_POST))	
		{
			
			if (
				isset($_POST['numero']) &&
				isset($_POST['nom'])
				)

			{
	
				$numero = $_POST['numero'];
				$nom = $_POST['nom'];
				$option=$_POST['option'] == 'on' ? 1 : 0;

				global $wpdb;
			    
				$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_module",
								array (
								'numero'=> $numero,
								'nom'=> $nom,
								'optionnel' => $option
								)
							);

			}
		}
	}

	public function inserer_specialite()
	{
		if (isset($_POST) && !empty($_POST))	
		{
			
			if (
				isset($_POST['nom'])
				)

			{
				
				$nom = $_POST['nom'];
				global $wpdb;
			    
				$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_specialite",
								array (
								'nom'=> $nom
								)
							);
			}
		}
	}

	public function inserer_responsable()
	{
		if (isset($_POST) && !empty($_POST))	
		{
			
			if (
				isset($_POST['nom']) &&
				isset($_POST['prenom'])
				)

			{
				
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				global $wpdb;
			    
				$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_responsable",
								array (
								'nom'=> $nom,
								'prenom' => $prenom
								)
							);
			}
		}
	}

	public function inserer_semestre()
	{
		if (isset($_POST) && !empty($_POST))	
		{
			
			if (
				isset($_POST['nom'])
				)

			{
				
				$nom = $_POST['nom'];
				$sousSemestre = $_POST['sousSemestre'] == 'on' ? 1 : 0;
				global $wpdb;
			    
				$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_semestre",
								array (
								'nom'=> $nom,
								'sousSemestre' => $sousSemestre
								)
							);
			}
		}
	}


}
