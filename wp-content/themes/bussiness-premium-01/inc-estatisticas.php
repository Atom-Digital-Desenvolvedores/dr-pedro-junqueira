<?php $id_page = get_page_by_path( 'home', OBJECT, 'page' )->ID; ?>

	<?php
		$wsg_estatisticas_img_id = get_post_meta($id_page, 'wsg_estatisticas_img_id', true);
		$wsg_estatisticas_img_id = wp_get_attachment_image_src($wsg_estatisticas_img_id, '1920x360');
		$wsg_estatisticas_img_id = $wsg_estatisticas_img_id[0];
	?>
	<section class="wq-03 wq-cto" style="background-image: url(<?php echo $wsg_estatisticas_img_id; ?>);">
		<div class="wq-container">
			<div class="wq-flex">
				<?php
					$entries = get_post_meta( $id_page, 'estatisticas_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						if ( isset( $entry['wsg_estatisticas_items_valor'] ) ) {
							$wsg_estatisticas_items_valor = $entry['wsg_estatisticas_items_valor'];
						}
						if ( isset( $entry['wsg_estatisticas_items_legenda'] ) ) {
							$wsg_estatisticas_items_legenda = $entry['wsg_estatisticas_items_legenda'];
						}
				?>
					<div class="wq-box_3 wq-box_cp-6 wq-box_cl-6 wq-box_tp-6">
						<div class="wq-statistics">
							<h3><?php echo $wsg_estatisticas_items_valor; ?></h3>
							<h4><?php echo $wsg_estatisticas_items_legenda; ?></h4>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>