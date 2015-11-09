<?php
class ENSICAEN_Digital_Booklet__deactivation {

	public static function deactivation()
	{
		$page = get_page_by_title('Livret Numérique');

		if (is_page($page->ID))
			wp_delete_post($page->ID, true);
	}

}