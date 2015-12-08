<?php
class EDB_Install {
	
	public function install_page()
	{
		$edb_page = array(
			'post_title'    => 'Livret numérique',
			'post_name'     => 'livret-numerique',
			'post_content'  => 'Ceci est le contenu du livret numérique',
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_category' => array(),
			'post_type'     => 'page'	
		);
		
		wp_insert_post($edb_page);
	}
	
}