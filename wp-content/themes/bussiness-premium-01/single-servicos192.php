<?php
	get_header();

	$id_page = get_page_by_path( 'servicos', OBJECT, 'page' )->ID;
	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-servico-interna_01">
		<div class="wq-container">
			<div class="wq-flex">
				<article class="wq-box_8 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div>
						<p><?php echo get_post_meta( get_the_ID(), 'wsg_servico_interna_subtitulo', true ); ?></p>
						<h2><?php echo get_post_meta( get_the_ID(), 'wsg_servico_interna_titulo', true ); ?></h2>
						<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_servico_interna_conteudo', true )); ?>
					</div>
					<?php
						$entries = get_post_meta( get_the_ID(), 'servico_interna_items', true );
						if ( !empty($entries) ) {
					?>
						<div class="wq-servico-interna_info">
							<?php

								foreach ( (array) $entries as $key => $entry ) {

									if ( isset( $entry['wsg_servico_interna_items_subtitulo'] ) ) {
										$wsg_servico_interna_items_subtitulo = $entry['wsg_servico_interna_items_subtitulo'];
									}
									if ( isset( $entry['wsg_servico_interna_items_titulo'] ) ) {
										$wsg_servico_interna_items_titulo = $entry['wsg_servico_interna_items_titulo'];
									}
							?>
								<div>
									<p><?php echo $wsg_servico_interna_items_subtitulo; ?></p>
									<h3><?php echo $wsg_servico_interna_items_titulo; ?></h3>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</article>
				<aside class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div class="wq-inscricao_box">
						<figure>
							<?php
								$wsg_servico_item_img_id = get_post_meta( get_the_ID(), 'wsg_servico_item_img_id', true );
								getImageThumb($wsg_servico_item_img_id,'370x300');
							?>
							<figcaption>
								<h3><?php echo get_post_meta( get_the_ID(), 'wsg_servico_interna_form_titulo', true ); ?></h3>
							</figcaption>
						</figure>
						<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

							<input type="hidden" name="subject_email" value="Newsletter enviado pelo site">
							<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

							<input type="hidden" name="label-send-data-name" value="Nome">
							<input required type="text" name="send-data-name" placeholder="Qual é o seu nome?">

							<input type="hidden" name="label-send-data-email" value="Email">
							<input required type="email" name="send-data-email" placeholder="Qual é o seu melhor email?">

							<input type="hidden" name="label-send-data-phone" value="telefone">
							<input required type="text" name="send-data-phone" placeholder="Qual é o seu whatsapp?" class="inputphone">

							<input type="hidden" name="label-send-data-message" value="Mensagem">
							<textarea required name="send-data-message" cols="30" rows="10" placeholder="Deixe sua mensagem"></textarea>

							<div class="wq-dir">
								<button class="wq-btn wq-btn_peq" type="submit">
									<span>Enviar</span>
								</button>
							</div>

							<?php if (strlen($wsg_contato_widget) > 0) { ?>
								<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>
							<?php } ?>
						</form>
					</div>
				</aside>
			</div>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

	<?php include "inc-depoimentos.php"; ?>

<?php get_footer(); ?>