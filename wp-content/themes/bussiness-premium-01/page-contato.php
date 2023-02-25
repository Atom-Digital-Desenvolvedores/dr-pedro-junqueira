<?php
	get_header();

	$id_page = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;

	$wsg_contato_widget = get_post_meta($id_page, 'wsg_contato_widget', true);
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-contato_01">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_3 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div>
						<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_contato_01_titulo', true ); ?></h3>
						<?php echo wpautop(get_post_meta( $id_page, 'wsg_contato_01_texto', true )); ?>
					</div>
				</div>
				<div class="wq-box_9 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div class="wq-mensagem">
						<h3><?php echo get_post_meta( $id_page, 'wsg_contato_01_form_titulo', true ); ?></h3>
						<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

							<input type="hidden" name="subject_email" value="Enviado pelo site">
							<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

							<div class="wq-flex">
								<div class="wq-box_12">
									<p>Qual é o seu nome?</p>
									<input type="hidden" name="label-send-data-name" value="Nome">
									<input required type="text" name="send-data-name" placeholder="Nome">
								</div>
								<div class="wq-box_6 wq-box_cp-12">
									<p>Qual é o seu whatsapp?</p>
									<input type="hidden" name="label-send-data-phone" value="Telefone">
									<input required type="text" name="send-data-phone" placeholder="(99) 99999-9999" class="inputphone">
								</div>
								<div class="wq-box_6 wq-box_cp-12">
									<p>Qual é o seu email?</p>
									<input type="hidden" name="label-send-data-email" value="Email">
									<input required type="email" name="send-data-email" placeholder="Email">
								</div>
								<div class="wq-box_12">
									<p>Deixe uma mensagem</p>
									<input type="hidden" name="label-send-data-message" value="Mensagem">
									<textarea required name="send-data-message" placeholder="Mensagem"></textarea>
								</div>
								<div class="wq-box_12 wq-dir">
									<button class="wq-btn wq-btn_peq" type="submit">
										<span>Enviar</span>
									</button>
								</div>

								<?php if (strlen($wsg_contato_widget) > 0) { ?>
									<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>
								<?php } ?>
							</div>
						</form>
					</div>
					<div class="wq-contato_box">
						<ul class="wq-contato wq-lista-inline">
							<?php
								$entries = get_post_meta( $id_telefones, 'wsg_telefone_items', true );

								foreach ( (array) $entries as $key => $entry ) {

									if ( isset( $entry['wsg_telefone_nmr'] ) ) {
										$wsg_telefone_nmr = $entry['wsg_telefone_nmr'];
									}
									if ( isset( $entry['wsg_telefone_link'] ) ) {
										$wsg_telefone_link = $entry['wsg_telefone_link'];
									}
									if ( isset( $entry['wsg_telefone_icone'] ) ) {
										$wsg_telefone_icone = $entry['wsg_telefone_icone'];
									}
							?>
								<li>
									<a href="<?php echo $wsg_telefone_link; ?>" target="_blank">
										<span class="flaticon-<?php echo $wsg_telefone_icone; ?>"></span>
										<address><?php echo $wsg_telefone_nmr; ?></address>
									</a>
								</li>
							<?php } ?>
							<?php
								$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
								foreach ( (array) $wsg_emails as $key => $email ) {
							?>
								<li>
									<a href="mailto:<?php echo $email; ?>" target="_blank">
										<span class="flaticon-mail-1"></span>
										<address><?php echo $email; ?></address>
									</a>
								</li>
							<?php } ?>
							<li>
								<a href="<?php echo get_post_meta( $id_endereco, 'wsg_endereco_link', true ); ?>">
									<span class="flaticon-placeholder-1"></span>
									<address><?php echo get_post_meta( $id_endereco, 'wsg_endereco', true ); ?></address>
								</a>
							</li>
						</ul>
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
								} wp_reset_query();
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include "inc-estatisticas.php"; ?>

	<?php include "inc-depoimentos.php"; ?>

<?php get_footer(); ?>