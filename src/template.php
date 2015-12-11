<?php

global $wpdb;

$edblang      = isset($_GET['edblang']) && !empty($_GET['edblang']) ? $_GET['edblang'] : 'FR';
$lang_id      = $wpdb->get_row("SELECT id FROM {$wpdb->prefix}edb_langs WHERE code = '$edblang'")->id;

$langs        = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_langs");

$specialities = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_specialities WHERE lang_id = $lang_id");
$semesters    = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_semesters WHERE lang_id = $lang_id");

echo '$_GET: <br>';
echo '<pre>';
print_r($_GET);
echo '</pre>';

?>

<nav class="edb_flags">
	<?php foreach ($langs as $lang): ?>
	
	<a href="<?php echo esc_url(add_query_arg('edblang', $lang->code)); ?>"><img src="<?php echo plugins_url('assets/img/flags/' . $lang->code . '.png', __FILE__); ?>" alt="<?php echo $lang->name; ?>"></a>
	
	<?php endforeach; ?>
</nav>

<div id="edb" class="specialities">
	<?php foreach ($specialities as $k => $speciality): ?>
	
	<div class="item speciality">
		<a href="#<?php echo sanitize_title($speciality->name) . '-' . $speciality->id; ?>" class="accordion_title"><?php echo $speciality->name; ?></a>
		
		<div id="<?php echo sanitize_title($speciality->name) . '-' . $speciality->id; ?>" class="accordion_content">
			
			<div class="semesters">
				<?php foreach ($semesters as $k => $semester): ?>
				
				<div class="item semester">
					<a href="#<?php echo sanitize_title($semester->name) . '-' . $semester->id; ?>" class="accordion_title"><?php echo $semester->name; ?></a>
					
					<table>
						<tbody>
							<tr>
								<td>
									<!-- Description UE -->
								</td>
								<td>
									<!-- Modules de l'UE -->
								</td>
							</tr>
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