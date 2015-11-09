<?php 
class ENSICAEN_Digital_Booklet__admin {

	public function add_admin_menu()
	{
		add_menu_page('Livret Pédagogique', 'Livret Pédagogique', 'manage_options', 'ensicaen_digital_booklet', array('ENSICAEN_Digital_Booklet__admin', 'menu_html'));
		add_submenu_page('ensicaen_digital_booklet', 'Gestion UE', 'Gestion UE', 'manage_options', 'ensicaen_digital_booklet__UE', array('ENSICAEN_Digital_Booklet__admin', 'menu_UE'));
		add_submenu_page('ensicaen_digital_booklet', 'Gestion Modules', 'Gestion Modules', 'manage_options', 'ensicaen_digital_booklet__Modules', array('ENSICAEN_Digital_Booklet__admin', 'menu_Modules'));
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
		<form action="envoi.php" method="post">
			<?php settings_fields('ENSICAEN_Digital_Booklet__admin_settings') ?>
			<?php do_settings_sections('ENSICAEN_Digital_Booklet__admin_settings') ?>




			<?php submit_button(); ?>
			
		</form>

		<?php

	}

	public function register_settings()
	{
		
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section', 'Création d\'une UE', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings');
		register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'numero');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'nom');


		add_settings_field('numero', 'Numéro de l\'UE', array('ENSICAEN_Digital_Booklet__admin', 'numero_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('nom', 'Nom de l\'UE', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');

	}


	public function section_html()
	{
	    echo 'Renseignez les champs.';
	}

	public function numero_html()
	{	?>
	    <input type="text" name="numero" value="<?php echo get_option('numero')?>"/>
	    <?php
	}

	public function nom_html()
	{	?>
	    <input type="text" name="nom" value="<?php echo get_option('nom')?>"/>
	    <?php
	}

	public function menu_Modules()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des modules</p>';
	}
}

