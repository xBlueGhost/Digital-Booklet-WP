<?php
class EDB_Uninstall {
	
	public function uninstall_page()
	{
		$edb_page = get_page_by_title('Livret numérique');
		
		if ($edb_page)
			wp_delete_post($edb_page->ID, true);
	}
	
}