<?php
class ENSICAEN_Digital_Booklet__deactivation {

	public static function uninstall_page()
	{
		$page = get_page_by_title('Livret numérique');

		if ($page)
			wp_delete_post($page->ID, true);
	}

}