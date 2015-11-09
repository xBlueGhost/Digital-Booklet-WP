<?php
class ENSICAEN_Digital_Booklet__template {

	public static function override_template($template)
	{
		global $post;

		if ($post->post_title == 'Livret numérique')
			$template = plugin_dir_path(__FILE__) . 'templates/digital-booklet.php';

		return $template;
	}

}