<?php
	$id_sobre = get_page_by_path( 'sobre', OBJECT, 'page' )->ID;
	$id_admin = get_page_by_path( 'slug-outras-info', OBJECT, 'adminpanel' )->ID;

	$id_logo = get_page_by_path( 'configuracoes-da-logo', OBJECT, 'gerais' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;
?>

	<footer class="wq-footer">
		<div class="wq-footer_top wq-cto">
			<ul class="wq-midias-sociais wq-lista-inline">
				<?php
					$arrayQuery_Midias_Sociais = array(
						'post_type'			=> array( 'redes_sociais' ),
						'posts_per_page'	=> '-1',
						'orderby' 			=> 'menu_order',
						'order' 			=> 'ASC',
					);

					$query_Midias_Sociais = new WP_Query($arrayQuery_Midias_Sociais);

					while ( $query_Midias_Sociais->have_posts()) {
						$query_Midias_Sociais->the_post();
				?>
					<li>
						<a href="<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_link', true ); ?>" target="_blank">
							<span class="flaticon-<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_titulo', true); ?>"></span>
						</a>
					</li>
				<?php
					}
					wp_reset_query();
				?>
			</ul>
		</div>
		<div class="wq-footer_bottom">
			<div class="wq-container">
				<div class="wq-flex">
					<?php echo wpautop(get_post_meta( $id_sobre, 'wsg_sobre_footer_copyright', true )); ?>
					<?php echo wpautop(get_post_meta( $id_admin, 'agency_setting_footer_site_content', true )); ?>
				</div>
			</div>
		</div>
	</footer>

	<?php
		$id_google = get_page_by_path( 'configuracoes-do-google', OBJECT, 'gerais' )->ID;

		echo get_post_meta( $id_google, 'script_analytics', true );
	?>

	<script src="<?php bloginfo('template_url') ?>/js-template/footer-load.js"></script>

	<?php wp_footer(); ?>

</body>
</html>