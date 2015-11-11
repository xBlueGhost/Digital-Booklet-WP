<?php get_header(); ?>

	<div id="content" class="site-content">
	   <main id="main" class="clearfix">
	      <div class="tg-container">

				<div id="primary">
					<div id="content-2">
						<h1>Les spécialités</h1>


						<?php
						global $wpdb;
						global $wp;
						$results= $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ensicaen_digital_boolket_specialite");
						foreach($results as $result){
							echo '<a href="' . home_url(add_query_arg(array_merge($wp->query_vars, array('specialite' => $result->numero)), $wp->request)) . '">' . $result->nom.'</a><br>';
						}

						if ($_GET['specialite'] == 1){
							echo 'UE : ';
							$results= $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ensicaen_digital_boolket_ue");
							foreach($results as $result){
								echo $result->numero;
							}

							echo ' Matière : ';
							$results= $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ensicaen_digital_boolket_matiere");
							foreach($results as $result){
								echo $result->nom;
								
							}

							}
						?>

						<h1>Les mastères spécialisés</h1>
						
					</div><!-- #content -->
				</div><!-- #primary -->

				<?php  get_sidebar(); ?>
			</div>
		</main>
	</div>

<?php get_footer(); ?>
