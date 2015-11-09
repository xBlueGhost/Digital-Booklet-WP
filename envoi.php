<?php
public function send_donnees()
{

	if (isset($_POST)&& !empty($_POST))	
	{
		if (
			isset($_POST['numero']) &&
			isset($_POST['nom'])
			)
		{
			$numero=$_POST['numero'];
			$nom=$_POST['nom'];
		}
	}

    global $wpdb;

	$wpdb->insert("{$wpdb->prefix}ensicaen_digital_boolket_UE",array ('numero'=>$numero,'libelle'=>$nom,'moyenn_Min'=>10,'ECTS'=>6, 'nb_heure_totale'=> 107.5, 'activite' => false, 'majeure' => false, 'optionnelle' => false));

	echo 'données insérées';


   
    
}
?>