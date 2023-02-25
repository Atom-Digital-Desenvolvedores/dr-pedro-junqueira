<?php
	get_header();

	$id_page = get_page_by_path( 'home', OBJECT, 'page' )->ID;
?>

	<section class="wq-banner">
		<?php
			$entries = get_post_meta( $id_page, 'banner_items', true );

			foreach ( (array) $entries as $key => $entry ) {

				$wsg_banner_items_titulo = null;
				$wsg_banner_items_texto = null;
				$wsg_banner_items_btn_texto = null;

				if ( isset( $entry['wsg_banner_items_img_id'] ) ) {
					$wsg_banner_items_img_id = $entry['wsg_banner_items_img_id'];
				}
				if ( isset( $entry['wsg_banner_items_subtitulo'] ) ) {
					$wsg_banner_items_subtitulo = $entry['wsg_banner_items_subtitulo'];
				}
				if ( isset( $entry['wsg_banner_items_titulo'] ) ) {
					$wsg_banner_items_titulo = $entry['wsg_banner_items_titulo'];
				}
				if ( isset( $entry['wsg_banner_items_btn_link'] ) ) {
					$wsg_banner_items_btn_link = $entry['wsg_banner_items_btn_link'];
				}
				if ( isset( $entry['wsg_banner_items_btn_texto'] ) ) {
					$wsg_banner_items_btn_texto = $entry['wsg_banner_items_btn_texto'];
				}
		?>
			<div class="wq-banner_item">
				<figure>
					<?php getImageThumb($wsg_banner_items_img_id,'1920x580') ?>
				</figure>
				<div class="wq-banner_conteudo">
					<?php if ($wsg_banner_items_subtitulo != null && strlen($wsg_banner_items_subtitulo) > 0) { ?>
						<p><?php echo $wsg_banner_items_subtitulo; ?></p>
					<?php } ?>
					<?php if ($wsg_banner_items_titulo != null && strlen($wsg_banner_items_titulo) > 0) { ?>
						<h2><?php echo $wsg_banner_items_titulo; ?></h2>
					<?php } ?>
					<?php if ($wsg_banner_items_btn_texto != null && strlen($wsg_banner_items_btn_texto) > 0) { ?>
						<a href="<?php echo $wsg_banner_items_btn_link; ?>" class="wq-btn">
							<span><?php echo $wsg_banner_items_btn_texto; ?></span>
						</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</section>

	<section class="wq-01">
		<div class="wq-container">
			<div class="wq-empresa_box">
				<div class="wq-flex">
					<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12">
						<figure>
							<?php
								$wsg_sobre_link = get_post_meta( $id_page, 'wsg_sobre_link', true );
								if (!empty($wsg_sobre_link)) {
							?>
								<a href="<?php echo get_post_meta( $id_page, 'wsg_sobre_link', true ); ?>" data-lity>
									<?php
										$wsg_sobre_img_id = get_post_meta( $id_page, 'wsg_sobre_img_id', true );
										getImageThumb($wsg_sobre_img_id,'462x312');
									?>
								</a>
							<?php } else{ ?>
								<?php
									$wsg_sobre_img_id = get_post_meta( $id_page, 'wsg_sobre_img_id', true );
									getImageThumb($wsg_sobre_img_id,'462x312');
								?>
							<?php } ?>
						</figure>
					</div>
					<div class="wq-box_6 wq-box_cp-12 wq-box_cl-12">
						<div>
							<p><?php echo get_post_meta( $id_page, 'wsg_sobre_subtitulo', true ); ?></p>
							<h2><?php echo get_post_meta( $id_page, 'wsg_sobre_titulo', true ); ?></h2>
							<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_texto', true )); ?>
							<a href="<?php bloginfo('url'); ?>/sobre" class="wq-btn">
								<span>Saiba mais</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php //include "inc-estatisticas.php"; ?>

	<section class="wq-04 wq-cto wq-servicos">
		<div class="wq-container">
			<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_servicos_titulo', true ); ?></h3>
			<?php echo wpautop(get_post_meta( $id_page, 'wsg_servicos_texto', true )); ?>
			<div class="wq-flex">
				<?php
					$wsg_servicos_na_home = get_post_meta( $id_page, 'wsg_servicos_na_home', true );

					$arrayQueryServicos = array(
						'post_type'				=> array( 'servicos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
						'post__in'				=> $wsg_servicos_na_home
					);
					$queryServicos = new WP_Query($arrayQueryServicos);
					while ( $queryServicos->have_posts()) {
						$queryServicos->the_post();
				?>
					<div class="wq-box_4 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
						<a class="wq-servico_box" href="<?php the_permalink(); ?>">
							<figure>
								<?php
									$wsg_servico_item_img_id = get_post_meta( get_the_ID(), 'wsg_servico_item_img_id', true );
									getImageThumb($wsg_servico_item_img_id,'128x128');
								?>
							</figure>
							<div>
								<h2><?php the_title(); ?></h2>
							</div>
						</a>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<?php include "inc-depoimentos.php"; ?>

	<section class="wq-04 wq-cto">
		<div class="wq-container">
			<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_projetos_titulo', true ); ?></h3>
			<?php echo wpautop(get_post_meta( $id_page, 'wsg_projetos_texto', true )); ?>
			<div class="wq-carousel_treinamentos">
				<?php
					$wsg_projetos_na_home = get_post_meta( $id_page, 'wsg_projetos_na_home', true );

					$arrayQueryProjetos = array(
						'post_type'				=> array( 'projetos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
						'post__in'				=> $wsg_projetos_na_home
					);
					$queryProjetos = new WP_Query($arrayQueryProjetos);
					while ( $queryProjetos->have_posts()) {
						$queryProjetos->the_post();
				?>
					<div class="wq-treinamento_box">
						<figure>
							<?php
								$wsg_projeto_item_img_id = get_post_meta( get_the_ID(), 'wsg_projeto_item_img_id', true );
								getImageThumb($wsg_projeto_item_img_id,'370x300');
							?>
						</figure>
						<div>
							<h2><?php the_title(); ?></h2>
							<a href="<?php the_permalink(); ?>" class="wq-btn">
								<span>Ver imagem</span>
							</a>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<section class="wq-05 wq-cto">
		<div class="wq-container">
			<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_blog_titulo', true ); ?></h3>
			<?php echo wpautop(get_post_meta( $id_page, 'wsg_blog_texto', true )); ?>
			<div class="wq-flex wq-esq">
				<?php
					$args = array (
						'post_type'         => 'post',
						'posts_per_page'    => 3
					);
					$query = new WP_Query( $args );
					$posts = $query->get_posts();
					foreach ($posts as $key => $item) {
						// setup_postdata($item);
						$categories = get_the_terms( $item->ID, 'category' );
						$htmlCategory = '';
						if ( $categories && ! is_wp_error( $categories ) ){
							$draught_links = array();
							foreach ($categories as $category) {
								$cat_Item = '<a href="'.get_term_link($category->term_id, "category").'" title="'.$category->name.'" > '.$category->name.'</a>';
								array_push($draught_links, $cat_Item);
							}
							$htmlCategory = implode(' | ', $draught_links);
						}
				?>
					<div class="wq-box_4 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
						<article>
							<figure>
								<?php echo getImageThumb(get_post_thumbnail_id($item->ID), '370x250'); ?>
							</figure>
							<div>
								<ul class="wq-blog_info wq-lista-inline">
									<li>
										<span class="flaticon-calendar-1"></span>
										<?php echo get_the_date('d', $item->ID); ?>.<?php echo get_the_date('m', $item->ID); ?>.<?php echo get_the_date('Y', $item->ID); ?>
									</li>
									<li>
										<span class="flaticon-folder-1"></span><?php echo $htmlCategory; ?>
									</li>
								</ul>
								<h2><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a></h2>
								<?php echo wpautop($item->post_excerpt); ?>
								<a href="<?php echo get_permalink($item->ID); ?>">Ler mais</a>
							</div>
						</article>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
			<a href="<?php bloginfo('url'); ?>/blog" class="wq-btn">
				<span>TODOS OS ARTIGOS</span>
			</a>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>