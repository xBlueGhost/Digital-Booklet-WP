<?php 
class ENSICAEN_Digital_Booklet__admin {

	public function add_admin_menu()
	{
		add_menu_page('Livret Pédagogique', 'Livret Pédagogique', 'manage_options', 'ensicaen_digital_booklet', array('ENSICAEN_Digital_Booklet__admin', 'menu_html'));
		add_submenu_page('ensicaen_digital_booklet', 'Gestion UE', 'Gestion UE', 'manage_options', 'ensicaen_digital_booklet__UE', array('ENSICAEN_Digital_Booklet__admin', 'menu_UE'));
		add_submenu_page('ensicaen_digital_booklet', 'Gestion Modules', 'Gestion Modules', 'manage_options', 'ensicaen_digital_booklet__Modules', array('ENSICAEN_Digital_Booklet__admin', 'menu_Modules'));
	}

	public function register_settings()
	{
		register_setting('ENSICAEN_Digital_Booklet__admin', 'ENSICAEN_Digital_Booklet__admin_sender');
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
		<form action="options.php" method="post">
			<label>Nom de l'UE</label>
			<input type="text" name="ENSICAEN_Digital_Booklet__admin_nom" value="<?php echo get_option('ENSICAEN_Digital_Booklet__adminE_nom')?>"/>
			<?php submit_button(); ?>
			<?php settings_fields('ENSICAEN_Digital_Booklet__admin_settings') ?>
		</form>

		<?php

	}

	public function menu_Modules()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des modules</p>';
	}
}

