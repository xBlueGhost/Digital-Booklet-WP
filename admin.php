<?php 
class ENSICAEN_Digital_Booklet__admin {
    
	public function add_admin_menu()
	{
		add_menu_page('Livret Pédagogique', 'Livret Pédagogique', 'manage_options', 'ensicaen_digital_booklet', array('ENSICAEN_Digital_Booklet__admin', 'menu_html'));
		$hook_responsable = add_submenu_page('ensicaen_digital_booklet', 'Gestion Responsable', 'Gestion Responsable', 'manage_options', 'ensicaen_digital_booklet__Responsable', array('ENSICAEN_Digital_Booklet__admin', 'menu_Responsable'));
		$hook_specialite = add_submenu_page('ensicaen_digital_booklet', 'Gestion Spécialité', 'Gestion Spécialité', 'manage_options', 'ensicaen_digital_booklet__Specialite', array('ENSICAEN_Digital_Booklet__admin', 'menu_Specialite'));
		$hook_semestre = add_submenu_page('ensicaen_digital_booklet', 'Gestion Semestre', 'Gestion Semestre', 'manage_options', 'ensicaen_digital_booklet__Semestre', array('ENSICAEN_Digital_Booklet__admin', 'menu_Semestre'));
		$hook_UE = add_submenu_page('ensicaen_digital_booklet', 'Gestion UE', 'Gestion UE', 'manage_options', 'ensicaen_digital_booklet__UE', array('ENSICAEN_Digital_Booklet__admin', 'menu_UE'));
		$hook_module = add_submenu_page('ensicaen_digital_booklet', 'Gestion Modules', 'Gestion Modules', 'manage_options', 'ensicaen_digital_booklet__Modules', array('ENSICAEN_Digital_Booklet__admin', 'menu_Modules'));
		
		
		add_action('load-'.$hook_UE, array('ENSICAEN_Digital_Booklet__admin', 'process_action'));
    	add_action('load-'.$hook_module, array('ENSICAEN_Digital_Booklet__admin', 'process_action'));
		add_action('load-'.$hook_specialite, array('ENSICAEN_Digital_Booklet__admin', 'process_action'));
		add_action('load-'.$hook_responsable, array('ENSICAEN_Digital_Booklet__admin', 'process_action'));
		add_action('load-'.$hook_semestre, array('ENSICAEN_Digital_Booklet__admin', 'process_action'));

	}

	function menu_UE() {
        
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des UE</p>';?>

   
    <div class="wrap">
     
        <div id="icon-themes" class="icon32"></div>
       
        <?php settings_errors(); ?>
         
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } // end if
        ?>
         
        <h2 class="nav-tab-wrapper">
            <a href="?page=ensicaen_digital_booklet__UE&tab=ajout" class="nav-tab <?php echo $active_tab == 'ajout' ? 'nav-tab-active' : ''; ?>">Ajouter une UE</a>
            <a href="?page=ensicaen_digital_booklet__UE&tab=modif" class="nav-tab <?php echo $active_tab == 'modif' ? 'nav-tab-active' : ''; ?>">Modifier une UE</a>
            <a href="?page=ensicaen_digital_booklet__UE&tab=suppression" class="nav-tab <?php echo $active_tab == 'suppression' ? 'nav-tab-active' : ''; ?>">Supprimer une UE</a>

        </h2>
         
		<form method="post" action="">
   		 <?php
         
        if( $active_tab == 'ajout' ) {
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings' );
             ?>
            <input type="hidden" name="ajout_ue" value="1"/>
            <?php
            submit_button("Ajouter une UE");
        } 
        if ( $active_tab == 'modif' ){
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings' );
             ?>
            <input type="hidden" name="modifier_ue" value="1"/>
            <?php
            submit_button();
        } 
        if( $active_tab == 'suppression' ){
        	 settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_SUE' );
             do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_SUE' );
              ?>
            <input type="hidden" name="supprimer_ue" value="1"/>
            <?php
            submit_button("supprimer une UE");
        }
        
         
    ?>
		</form>
         
    </div>
<?php
} // end sandbox_theme_display


	public function menu_html()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
    	echo '<p>Bienvenue sur la page d\'accueil</p>';
	}

	public function menu_Responsable()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des responsables</p>';?>
		<div class="wrap">
     
        <div id="icon-themes" class="icon32"></div>
       
        <?php settings_errors(); ?>
         
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } // end if
        ?>
         
        <h2 class="nav-tab-wrapper">
            <a href="?page=ensicaen_digital_booklet__Responsable&tab=ajout" class="nav-tab <?php echo $active_tab == 'ajout' ? 'nav-tab-active' : ''; ?>">Ajouter un responsable</a>
            <a href="?page=ensicaen_digital_booklet__Responsable&tab=modif" class="nav-tab <?php echo $active_tab == 'modif' ? 'nav-tab-active' : ''; ?>">Modifier un responsable</a>
            <a href="?page=ensicaen_digital_booklet__Responsable&tab=suppression" class="nav-tab <?php echo $active_tab == 'suppression' ? 'nav-tab-active' : ''; ?>">Supprimer un responsable</a>

        </h2>
         
		<form method="post" action="">
   		 <?php
         
        if( $active_tab == 'ajout' ) {
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_responsable' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_responsable' );
             ?>
            <input type="hidden" name="ajout_responsable" value="1"/>
            <?php
            submit_button("Ajouter un responsable");
        } 
        if ( $active_tab == 'modif' ){
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_responsable' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_responsable' );
             ?>
            <input type="hidden" name="modifier_responsable" value="1"/>
            <?php
            submit_button();
        } 
        if( $active_tab == 'suppression' ){
        	 settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_SR' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_SR' );
             ?>
            <input type="hidden" name="supprimer_responsable" value="1"/>
            <?php
            submit_button("Supprimer un responsable");
        }
        
         
    ?>
		</form>
         
    </div>
    <?php
	}

	public function menu_Modules()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des modules</p>';
		?>
		<div class="wrap">
     
        <div id="icon-themes" class="icon32"></div>
       
        <?php settings_errors(); ?>
         
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } // end if
        ?>
         
        <h2 class="nav-tab-wrapper">
            <a href="?page=ensicaen_digital_booklet__Modules&tab=ajout" class="nav-tab <?php echo $active_tab == 'ajout' ? 'nav-tab-active' : ''; ?>">Ajouter un module</a>
            <a href="?page=ensicaen_digital_booklet__Modules&tab=modif" class="nav-tab <?php echo $active_tab == 'modif' ? 'nav-tab-active' : ''; ?>">Modifier un module</a>
            <a href="?page=ensicaen_digital_booklet__Modules&tab=suppression" class="nav-tab <?php echo $active_tab == 'suppression' ? 'nav-tab-active' : ''; ?>">Supprimer un module</a>

        </h2>
         
		<form method="post" action="">
   		 <?php
         
        if( $active_tab == 'ajout' ) {
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_module' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_module' );
           ?>
            <input type="hidden" name="ajout_module" value="1"/>
            <?php submit_button("Ajouter un module");
        } 
        if ( $active_tab == 'modif' ){
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_module' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_module' );
             ?>
            <input type="hidden" name="modifier_module" value="1"/>
            <?php
            submit_button();
        } 
        if( $active_tab == 'suppression' ){
        	settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_SM' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_SM' );
             ?>
            <input type="hidden" name="supprimer_module" value="1"/>
            <?php
            submit_button("Supprimer un module");
        }
             
    ?>
		</form>
         
    </div>
    <?php
	}

   
	public function menu_Specialite()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des spécialités</p>';
		?>
		<div class="wrap">
     
        <div id="icon-themes" class="icon32"></div>
       
        <?php settings_errors(); ?>
         
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } // end if
        ?>
         
        <h2 class="nav-tab-wrapper">
            <a href="?page=ensicaen_digital_booklet__Specialite&tab=ajout" class="nav-tab <?php echo $active_tab == 'ajout' ? 'nav-tab-active' : ''; ?>">Ajouter une spécialité</a>
            <a href="?page=ensicaen_digital_booklet__Specialite&tab=modif" class="nav-tab <?php echo $active_tab == 'modif' ? 'nav-tab-active' : ''; ?>">Modifier une spécialité</a>
            <a href="?page=ensicaen_digital_booklet__Specialite&tab=suppression" class="nav-tab <?php echo $active_tab == 'suppression' ? 'nav-tab-active' : ''; ?>">Supprimer une spécialité</a>

        </h2>
         
		<form method="post" action="">
   		 <?php
         
        if( $active_tab == 'ajout' ) {
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_specialite' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_specialite' );
             ?>
            <input type="hidden" name="ajout_spe" value="1"/>
            <?php
            submit_button("Ajouter une spécialité");
        } 
        if ( $active_tab == 'modif' ){
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_specialite' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_specialite' );
             ?>
            <input type="hidden" name="modifier_spe" value="1"/>
            <?php
            submit_button();
        } 
        if( $active_tab == 'suppression' ){
        	 settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_SS' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_SS' );
             ?>
            <input type="hidden" name="supprimer_spe" value="1"/>
            <?php
            submit_button("Supprimer une specialite");
        }
        
         
    ?>
		</form>
         
    </div>
    <?php
	}

	public function menu_Semestre()
	{
		echo '<h1>'.get_admin_page_title().'</h1>';
		echo '<p>Gestion des semestres</p>';
		?>
		<div class="wrap">
     
        <div id="icon-themes" class="icon32"></div>
       
        <?php settings_errors(); ?>
         
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } // end if
        ?>
         
        <h2 class="nav-tab-wrapper">
            <a href="?page=ensicaen_digital_booklet__Semestre&tab=ajout" class="nav-tab <?php echo $active_tab == 'ajout' ? 'nav-tab-active' : ''; ?>">Ajouter un semestre</a>
            <a href="?page=ensicaen_digital_booklet__Semestre&tab=modif" class="nav-tab <?php echo $active_tab == 'modif' ? 'nav-tab-active' : ''; ?>">Modifier un semestre</a>
            <a href="?page=ensicaen_digital_booklet__Semestre&tab=suppression" class="nav-tab <?php echo $active_tab == 'suppression' ? 'nav-tab-active' : ''; ?>">Supprimer un semestre</a>

        </h2>
         
		<form method="post" action="">
   		 <?php
         
        if( $active_tab == 'ajout' ) {
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_semestre' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_semestre' );
             ?>
            <input type="hidden" name="ajout_semestre" value="1"/>
            <?php
            submit_button("Ajouter un semestre");
        } 
        if ( $active_tab == 'modif' ){
            settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_semestre' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_semestre' );
             ?>
            <input type="hidden" name="modifier_semestre" value="1"/>
            <?php
            submit_button();
        } 
        if( $active_tab == 'suppression' ){
        	 settings_fields( 'ENSICAEN_Digital_Booklet__admin_settings_SSE' );
            do_settings_sections( 'ENSICAEN_Digital_Booklet__admin_settings_SSE' );
             ?>
            <input type="hidden" name="supprimer_semestre" value="1"/>
            <?php
            submit_button("Supprimer un semestre");
        }
        
         
    ?>
		</form>
         
    </div>
    <?php
	}

	public function register_settings()
	{
		//Formulaire de Spécialité
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section_specialite', 'Création d\'une spécialité', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_specialite');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_specialite', 'nom');

		add_settings_field('nom', 'Nom de la spécialité', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_specialite', 'ENSICAEN_Digital_Booklet__admin_section_specialite');

		//Suppresion d'une spécialité
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section', 'Suppression d\'une spécialité', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_SS');
		add_settings_field('', '', array('ENSICAEN_Digital_Booklet__admin', 'suppr_specialite'), 'ENSICAEN_Digital_Booklet__admin_settings_SS', 'ENSICAEN_Digital_Booklet__admin_section');
		
		//Formulaire de Responsable
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section_responsable', 'Création d\'un responsable', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_responsable');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_responsable', 'nom');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_responsable', 'prenom');

		add_settings_field('nom', 'Nom du responsable', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_responsable', 'ENSICAEN_Digital_Booklet__admin_section_responsable');
		add_settings_field('prenom', 'Prénom du responsable', array('ENSICAEN_Digital_Booklet__admin', 'prenom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_responsable', 'ENSICAEN_Digital_Booklet__admin_section_responsable');
		
		//Suppression d'un responsable
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section', 'Suppression d\'un responsable', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_SR');
		add_settings_field('', '', array('ENSICAEN_Digital_Booklet__admin', 'suppr_responsable'), 'ENSICAEN_Digital_Booklet__admin_settings_SR', 'ENSICAEN_Digital_Booklet__admin_section');
		
		//Formulaure de semestre
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section_semestre', 'Création d\'un semestre', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_semestre');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_semestre', 'nom');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_semestre', 'sousSemestre');

		add_settings_field('num', 'Numéro :', array('ENSICAEN_Digital_Booklet__admin', 'numero'), 'ENSICAEN_Digital_Booklet__admin_settings_semestre', 'ENSICAEN_Digital_Booklet__admin_section_semestre');
        add_settings_field('nom', 'Nom du semestre', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_semestre', 'ENSICAEN_Digital_Booklet__admin_section_semestre');

		//Suppression d'un semestre
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section', 'Suppression d\'un semestre', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_SSE');
		add_settings_field('', '', array('ENSICAEN_Digital_Booklet__admin', 'suppr_semestre'), 'ENSICAEN_Digital_Booklet__admin_settings_SSE', 'ENSICAEN_Digital_Booklet__admin_section');
		
		
		//Formulaire création UE

		add_settings_section('ENSICAEN_Digital_Booklet__admin_section', 'Création d\'une UE', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings');
		register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'numero');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'nom');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'moyenne');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'ects');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings', 'nb_heure_totale');

		add_settings_field('numero', 'Numéro de l\'UE', array('ENSICAEN_Digital_Booklet__admin', 'numero_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('nom', 'Nom de l\'UE', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('moyenne', 'Moyenne minimum', array('ENSICAEN_Digital_Booklet__admin', 'moyenne_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		add_settings_field('ECTS', 'ECTS', array('ENSICAEN_Digital_Booklet__admin', 'ECTS_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		//add_settings_field('nb_heure_totale', 'Nombre total d\'heures de l\'UE', array('ENSICAEN_Digital_Booklet__admin', 'nb_heures_html'), 'ENSICAEN_Digital_Booklet__admin_settings', 'ENSICAEN_Digital_Booklet__admin_section');
		
		//Suppression d'une UE

		add_settings_section('ENSICAEN_Digital_Booklet__admin_section', 'Suppression d\'une UE', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_SUE');
		add_settings_field('', '', array('ENSICAEN_Digital_Booklet__admin', 'suppr_UE'), 'ENSICAEN_Digital_Booklet__admin_settings_SUE', 'ENSICAEN_Digital_Booklet__admin_section');


		//Formulaire création Module
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section_module', 'Création d\'un module', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_module');
		register_setting('ENSICAEN_Digital_Booklet__admin_settings_module', 'numero');
    	register_setting('ENSICAEN_Digital_Booklet__admin_settings_module', 'nom');

    	add_settings_field('numero', 'Numéro du module', array('ENSICAEN_Digital_Booklet__admin', 'numero_html'), 'ENSICAEN_Digital_Booklet__admin_settings_module', 'ENSICAEN_Digital_Booklet__admin_section_module');
		add_settings_field('nom', 'Nom du module', array('ENSICAEN_Digital_Booklet__admin', 'nom_html'), 'ENSICAEN_Digital_Booklet__admin_settings_module', 'ENSICAEN_Digital_Booklet__admin_section_module');
		//add_settings_field('option', 'Option ?', array('ENSICAEN_Digital_Booklet__admin', 'option_html'), 'ENSICAEN_Digital_Booklet__admin_settings_module', 'ENSICAEN_Digital_Booklet__admin_section_module');

		//Suppression d'un module
		add_settings_section('ENSICAEN_Digital_Booklet__admin_section', 'Suppression d\'un module', array('ENSICAEN_Digital_Booklet__admin', 'section_html'), 'ENSICAEN_Digital_Booklet__admin_settings_SM');
		add_settings_field('', '', array('ENSICAEN_Digital_Booklet__admin', 'suppr_module'), 'ENSICAEN_Digital_Booklet__admin_settings_SM', 'ENSICAEN_Digital_Booklet__admin_section');
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

	public function numero()
	{
		?>
		<input type="number" name="num" value=""/>

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

	public function sous_Semestre_html()
	{
		?>

		<input type="checkbox" name="sousSemestre"/>

		<?php
	}
	
	public function suppr_UE(){
		global $wpdb;
		$k =  $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_ues");
		foreach ($k as $eu)
    	{
    		?>
			<label>
    			<input type="checkbox" name="ue[]" value="<?php echo $eu->ue_num; ?>"/>
    			<?php echo $eu->code.' '.$eu->wording; ?>
    		</br>
			</label>
			<?php
		}
	}

	public function suppr_responsable(){
		global $wpdb;
		$k =  $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ensicaen_digital_boolket_responsable");

		foreach ($k as $re)
        {
            ?>
            <label>
                <input type="checkbox" name="resp[]" value="<?php echo $re->numero; ?>"/>
                <?php echo $re->nom.' '.$re->prenom; ?>
            </br>
            </label>
            <?php
		}
	}


	public function suppr_module(){
		global $wpdb;
		$k =  $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ensicaen_digital_boolket_module");

		  foreach ($k as $mo)
        {
            ?>
            <label>
                <input type="checkbox" name="mod[]" value="<?php echo $mo->num; ?>"/>
                <?php echo $mo->numero.' '.$mo->nom; ?>
            </br>
            </label>
            <?php
		}
	}
	public function suppr_specialite(){
		global $wpdb;
		$k =  $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ensicaen_digital_boolket_specialite");
        foreach ($k as $spe)
        {
            ?>
            <label>
                <input type="checkbox" name="spe[]" value="<?php echo $spe->numero; ?>"/>
                <?php echo $spe->nom; ?>
            </br>
            </label>
            <?php
		}
	}

	public function suppr_semestre(){
		global $wpdb;
		$k =  $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_semesters");

		foreach ($k as $se)
        {
            ?>
            <label>
                <input type="checkbox" name="semestre[]" value="<?php echo $se->semester_num; ?>"/>
                <?php echo $se->name; ?>
            </br>
            </label>
            <?php
        }
	}
    public function process_action()
    {
        if (isset($_POST['ajout_module'])){
            ENSICAEN_Digital_Booklet__admin::inserer_module();
        }
        if (isset($_POST['modifier_module'])){
            ENSICAEN_Digital_Booklet__admin::modifier_module();
        }
        if (isset($_POST['supprimer_module'])){
            ENSICAEN_Digital_Booklet__admin::supprimer_module();
        }
        if (isset($_POST['ajout_ue'])){
            ENSICAEN_Digital_Booklet__admin::inserer_ue();
        }
        if (isset($_POST['modifier_ue'])){
            ENSICAEN_Digital_Booklet__admin::modifier_ue();
        }
        if (isset($_POST['supprimer_ue'])){
            ENSICAEN_Digital_Booklet__admin::supprimer_ue();
        }
         if (isset($_POST['ajout_responsable'])){
            ENSICAEN_Digital_Booklet__admin::inserer_responsable();
        }
        if (isset($_POST['modifier_responsable'])){
            ENSICAEN_Digital_Booklet__admin::modifier_responsable();
        }
        if (isset($_POST['supprimer_responsable'])){
            ENSICAEN_Digital_Booklet__admin::supprimer_responsable();
        }
         if (isset($_POST['ajout_spe'])){
            ENSICAEN_Digital_Booklet__admin::inserer_specialite();
        }
        if (isset($_POST['modifier_spe'])){
            ENSICAEN_Digital_Booklet__admin::modifier_specialite();
        }
        if (isset($_POST['supprimer_spe'])){
            ENSICAEN_Digital_Booklet__admin::supprimer_specialite();
        }
         if (isset($_POST['ajout_semestre'])){
            ENSICAEN_Digital_Booklet__admin::inserer_semestre();
        }
        if (isset($_POST['modifier_semestre'])){
            ENSICAEN_Digital_Booklet__admin::modifier_semestre();
        }
        if (isset($_POST['supprimer_semestre'])){
            ENSICAEN_Digital_Booklet__admin::supprimer_semestre();
        }
    }



	public function inserer_UE(){

	if (isset($_POST) && !empty($_POST))	
	{
		
		if (
			isset($_POST['numero']) &&
			isset($_POST['nom']) &&
			isset($_POST['moyenne']) &&
			isset($_POST['ects'])
			)

		{
			
			
			$code = $_POST['numero'];
			$wording = $_POST['nom'];
			$average = $_POST['moyenne'];
			$ects = $_POST['ects'];
			
			global $wpdb;
		    
			$wpdb->insert("{$wpdb->prefix}edb_ues",
							array (
							'code'=> $code,
							'wording'=> $wording,
							'average_min' => $average, 
							'ECTS' => $ects
							)
						);

		}
	}

	echo 'données insérées';
    }

    public function supprimer_ue(){

        if (isset($_POST) && !empty($_POST))
        {
            if ($_POST['ue'])
            {
                $ue = $_POST['ue'];

                global $wpdb;

                foreach ($ue as $v)
                {

                 $wpdb->delete("{$wpdb->prefix}edb_ues",array('ue_num' =>$v));
            
                }

          }
       }

    }

    public function modifier_ue(){

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

				global $wpdb;
			    
				$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_module",
								array (
								'numero'=> $numero,
								'nom'=> $nom,
								)
							);

			}
		}
	}

     public function modifier_module(){

    }
    public function supprimer_module(){

         if (isset($_POST) && !empty($_POST))
        {
            if ($_POST['mod'])
            {
                $mod = $_POST['mod'];

                print_r($mod);


                global $wpdb;

                foreach ($mod as $v)
                {

                 $wpdb->delete("{$wpdb->prefix}ensicaen_digital_boolket_module",array('num' =>$v));
            
                }

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

    public function modifier_specialite(){

    }

    public function supprimer_specialite(){

         if (isset($_POST) && !empty($_POST))
        {
            if ($_POST['spe'])
            {
                $spe = $_POST['spe'];

                print_r($spe);


                global $wpdb;

                foreach ($spe as $v)
                {

                 $wpdb->delete("{$wpdb->prefix}ensicaen_digital_boolket_specialite",array('numero' =>$v));
            
                }

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

    public function modifier_responsable(){

    }

    public function supprimer_responsable(){

          if (isset($_POST))
        {
            if ($_POST['resp'])
            {
                $resp = $_POST['resp'];

                print_r($resp);

                global $wpdb;

                foreach ($resp as $v)
                {

                 $wpdb->delete("{$wpdb->prefix}ensicaen_digital_boolket_responsable",array('numero' =>$v));
            
                }

          }
       }

    }

	public function inserer_semestre()
	{
		if (isset($_POST) && !empty($_POST))	
		{
			
			if (
				isset($_POST['num'])
				)

			{
				
				$num = $_POST['num'];
                $name= $_POST['nom'];
				
				global $wpdb;
			    
				$wpdb->insert("{$wpdb->prefix}edb_semesters",
								array (
								'semester_num'=> $num,
								'name' => $name
								)
							);
			}
		}
	}

    public function modifier_semestre(){

    }

    public function supprimer_semestre(){

        if (isset($_POST))
        {
            if ($_POST['semestre'])
            {
                $sem = $_POST['semestre'];

                global $wpdb;

                print_r($sem);

                foreach ($sem as $v)
                {

                 $wpdb->delete("{$wpdb->prefix}edb_semesters",array('semester_num' =>$v));
            
                }

          }
       }

    }


	}
//ajouter a la spé un responsable un tronc commun des majeures
    //mettre les ue dans un tronc commun ou majeure
    //module :associer des matières
    // gerer les interfaces par "étape" 