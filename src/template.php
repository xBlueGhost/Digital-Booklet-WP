<?php

global $wpdb;

$specialities = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_specialities");
$semesters    = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}edb_semesters");

?>

<div id="edb" class="specialities">
	<?php foreach ($specialities as $k => $speciality): ?>
	
	<div class="item speciality">
		<a href="#<?php echo sanitize_title($speciality->name) . '-' . $speciality->id; ?>" class="accordion_title"><?php echo $speciality->name; ?></a>
		
		<div id="<?php echo sanitize_title($speciality->name) . '-' . $speciality->id; ?>" class="accordion_content">
			
			<div class="semesters">
				<?php foreach ($semesters as $k => $semester): ?>
				
				<div class="item semester">
					<a href="#<?php echo sanitize_title($semester->name) . '-' . $semester->id; ?>" class="accordion_title"><?php echo $semester->name; ?></a>
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