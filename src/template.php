<?php

global $wpdb;

$edblang         = isset($_GET['edblang']) && !empty($_GET['edblang']) ? $_GET['edblang'] : 'FR';

global $lang_num;
global $schooling_types;

$lang_num        = $wpdb->get_row("SELECT lang_num FROM {$wpdb->prefix}edb_langs        WHERE lang_code = '$edblang'")->lang_num;
$langs           = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_langs");
$specialities    = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_specialities    WHERE lang_num  = $lang_num");
$semesters       = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_semesters       WHERE lang_num  = $lang_num");
$schooling_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_schooling_types WHERE lang_num  = $lang_num");

function getSchooling($speciality_num, $semester)
{
	$schoolings      = array();
	
	global $lang_num;
	global $schooling_types;
	global $wpdb;
	
	foreach ($schooling_types as $schooling_type)
	{
		$schoolings[$schooling_type->schooling_type_name] = array( 
			$wpdb->get_results("
				SELECT * FROM wp_edb_schoolings
				JOIN wp_edb_schooling_types USING(schooling_type_num)
				JOIN wp_edb_specialities    USING(speciality_num, lang_num)
				JOIN wp_edb_semesters       USING(semester_num, lang_num)
				JOIN wp_edb_ues             USING(ue_num, lang_num)
				WHERE
				lang_num = (
					SELECT lang_num FROM wp_edb_langs WHERE lang_num = $lang_num
				)
				AND
				schooling_type_num = (
					SELECT schooling_type_num FROM wp_edb_schooling_types WHERE schooling_type_name = '$schooling_type->schooling_type_name'
				)
				AND
				speciality_num = $speciality_num
				AND
				semester_num = $semester
			")
		);
	}


	/*foreach ($schooling_types as $schooling_type)
	{	
		$schoolings[$schooling_type->schooling_type_name] = array( 
			$wpdb->get_results("
				SELECT * FROM wp_edb_schoolings
				JOIN wp_edb_schooling_types USING(schooling_type_num)
				JOIN wp_edb_specialities    USING(speciality_num, lang_num)
				JOIN wp_edb_semesters       USING(semester_num, lang_num)
				JOIN wp_edb_ues             USING(ue_num, lang_num)
				WHERE
				lang_num = (
					SELECT lang_num FROM wp_edb_langs WHERE lang_num = $lang_num
				)
				AND
				schooling_type_num = (
					SELECT schooling_type_num FROM wp_edb_schooling_types WHERE schooling_type_name = '$schooling_type->schooling_type_name'
				)
				AND
				speciality_num = $speciality_num
				AND
				semester_num = $semester
			")
		);
	}*/
	
	return $schoolings;
}

echo '$_GET: <br>';
echo '<pre>';
print_r($_GET);
echo '</pre>';

?>

<nav class="edb_flags">
	<?php foreach ($langs as $lang): ?>
	
	<a href="<?php echo esc_url(add_query_arg('edblang', $lang->lang_code)); ?>"><img src="<?php echo plugins_url('assets/img/flags/' . $lang->lang_code . '.png', __FILE__); ?>" alt="<?php echo $lang->lang_name; ?>"></a>
	
	<?php endforeach; ?>
</nav>

<div id="edb" class="specialities">
	<?php foreach ($specialities as $speciality): ?>
	
	<div class="item speciality">
		<a href="#<?php echo sanitize_title($speciality->speciality_name) . '-' . $speciality->speciality_num; ?>" class="accordion_title"><?php echo $speciality->speciality_name; ?></a>
		
		<div id="<?php echo sanitize_title($speciality->speciality_name) . '-' . $speciality->speciality_num; ?>" class="accordion_content">
			
			<div class="semesters">
				<?php foreach ($semesters as $semester): ?>
				
				<div class="item semester">
					<a href="#<?php echo sanitize_title($semester->semester_name) . '-' . $semester->semester_num; ?>" class="accordion_title"><?php echo $semester->semester_name; ?></a>
					
					<table class="ue_list">
						<tbody>
							<?php foreach (getSchooling($speciality->speciality_num, $semester->semester_num) as $schooling_name => $schoolings): ?>
									
							<tr>
								<td colspan="2" class="eu_separator">
									<span class="ue_type"><?php echo $schooling_name; ?></span>
								</td>
							</tr>
							
								<?php foreach (current($schoolings) as $schooling): print_r((array) $schooling); ?>
								
								<tr>
									<td width="25%">
										<span class="ue_code"><?php echo $schooling->ue_code; ?></span>
										<span class="ue_name"><?php echo $schooling->ue_wording; ?> </span>
										<span class="ue_average"><?php echo array_keys((array) $schooling, $schooling->ue_average_min) . ': ' . $schooling->ue_average_min; ?></span>
										<span class="ue_ects"><?php echo array_keys((array) $schooling, $schooling->ue_ECTS) . ': ' . $schooling->ue_ECTS; ?></span>
									</td>
									<td width="75%">
									</td>
								</tr>
								
								<?php endforeach; ?>
									
							<?php endforeach; ?>
							
							<!--
							<tr>
								<td colspan="2" class="eu_separator">
									<span class="ue_type">Tronc commun</span>
								</td>
							</tr>
							<tr>
								<td width="25%">
									<span class="ue_code">1L1aA</span>
									<span class="ue_name">Langues & Culture de l'Entreprise </span>
									<span class="ue_average">10</span>
									<span class="ue_ects">6</span>
								</td>
								<td width="75%">
								</td>
							</tr>
							-->
						</tbody>
					</table>
				</div>
				
				<?php endforeach; ?>
			</div>
			
		</div>
	</div>
	
	<?php endforeach; ?>
	
	<!--
	<div class="item speciality active">
		<a href="#speciality_1" class="accordion_title">Hello World</a>
		
		<div id="#speciality_1" class="accordion_content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, tempore magni. Quae mollitia dolore, saepe doloribus. Id, quasi. Ratione ad nemo minus repellendus excepturi odio, quasi odit iste doloribus incidunt.</p>
			<p>Mollitia beatae cumque dolores quas explicabo rem repudiandae, aut commodi, eos, accusantium, provident veniam laborum ratione. Vel unde, eaque voluptatem minima reprehenderit eligendi. Eius sit, beatae provident, eaque odio tempore!</p>
		</div>
	</div>
	<div class="item speciality">
		<a href="#speciality_2" class="accordion_title">Hello World</a>
		
		<div id="#speciality_2" class="accordion_content">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, tempore magni. Quae mollitia dolore, saepe doloribus. Id, quasi. Ratione ad nemo minus repellendus excepturi odio, quasi odit iste doloribus incidunt.</p>
			<p>Mollitia beatae cumque dolores quas explicabo rem repudiandae, aut commodi, eos, accusantium, provident veniam laborum ratione. Vel unde, eaque voluptatem minima reprehenderit eligendi. Eius sit, beatae provident, eaque odio tempore!</p>
		</div>
	</div>
	-->
</div>