<?php
/**
 * The template used for displaying page content.
 *
 * @package ThemeGrill
 * @subpackage Himalayas
 * @since Himalayas 1.0
 */
?>

<?php get_header(); ?>

	<div id="content" class="site-content">
	   <main id="main" class="clearfix <?php echo $himalayas_layout; ?>">
	      <div class="tg-container">

				<div id="primary">
					<div id="content-2">
						<h1>Hello World</h1>
						<p>Je suis le template personnalisé du plugin <b>ENSICAEN Digital Booklet</b>, tu peux me retourver ici :</p>
						<pre>wp-content/plugins/ENSICAEN Digital Booklet/templates/digital-booklet.php</pre>
					</div><!-- #content -->
				</div><!-- #primary -->

				<?php  himalayas_sidebar_select(); ?>
			</div>
		</main>
	</div>

<?php get_footer(); ?>