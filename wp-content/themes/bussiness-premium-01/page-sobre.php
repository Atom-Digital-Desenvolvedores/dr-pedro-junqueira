<?php
	get_header();

	$id_page = get_page_by_path( 'sobre', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-empresa_01">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<figure>
						<?php
							$wsg_sobre_01_link = get_post_meta( $id_page, 'wsg_sobre_01_link', true );
							if (!empty($wsg_sobre_01_link)) {
						?>
							<a href="<?php echo get_post_meta( $id_page, 'wsg_sobre_01_link', true ); ?>" data-lity>
								<?php
									$wsg_sobre_01_img_id = get_post_meta( $id_page, 'wsg_sobre_01_img_id', true );
									getImageThumb($wsg_sobre_01_img_id,'462x312');
								?>
							</a>
						<?php } else{ ?>
							<?php
								$wsg_sobre_01_img_id = get_post_meta( $id_page, 'wsg_sobre_01_img_id', true );
								getImageThumb($wsg_sobre_01_img_id,'462x312');
							?>
						<?php } ?>
					</figure>
					<blockquote class="wq-blockquote">
						<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_01_blockquote', true )); ?>
					</blockquote>
				</div>
				<div class="wq-box_7 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div>
						<p><?php echo get_post_meta( $id_page, 'wsg_sobre_01_subtitulo', true ); ?></p>
						<h2><?php echo get_post_meta( $id_page, 'wsg_sobre_01_titulo', true ); ?></h2>
						<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_01_texto', true )); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-empresa_02 wq-cto">
		<div class="wq-container">
			<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_sobre_02_titulo', true ); ?></h3>
			<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_02_texto', true )); ?>
			<div class="wq-flex wq-esq">
				<?php
					$entries = get_post_meta( $id_page, 'sobre_02_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						if ( isset( $entry['wsg_sobre_02_items_img_id'] ) ) {
							$wsg_sobre_02_items_img_id = $entry['wsg_sobre_02_items_img_id'];
						}
						if ( isset( $entry['wsg_sobre_02_items_titulo'] ) ) {
							$wsg_sobre_02_items_titulo = $entry['wsg_sobre_02_items_titulo'];
						}
						if ( isset( $entry['wsg_sobre_02_items_texto'] ) ) {
							$wsg_sobre_02_items_texto = $entry['wsg_sobre_02_items_texto'];
						}
				?>
					<div class="wq-box_4 wq-box_cp-12 wq-box_cl-6">
						<figure>
							<?php getImageThumb($wsg_sobre_02_items_img_id,'100x100') ?>
							<figcaption>
								<h3><?php echo $wsg_sobre_02_items_titulo; ?></h3>
							</figcaption>
						</figure>
						<div>
							<?php echo wpautop($wsg_sobre_02_items_texto); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<?php //include "inc-estatisticas.php"; ?>

	<?php include "inc-depoimentos.php"; ?>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>