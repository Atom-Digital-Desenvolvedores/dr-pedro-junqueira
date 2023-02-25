<?php
	get_header();

	$id_page = get_page_by_path( 'projetos', OBJECT, 'page' )->ID;
	$categoryProject = get_queried_object();
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-beneficios_01 wq-cto">
		<div class="wq-container">
			<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_projetos_01_titulo', true ); ?></h3>
			<?php echo wpautop(get_post_meta( $id_page, 'wsg_projetos_01_texto', true )); ?>
			<ul class="wq-servicos_btns wq-lista-inline">
				<?php
					// categoria primeira linhagem
					$catOriginais = get_terms('categorias_projetos', array(
						'hide_empty' => false,
						'parent'   => 0,
					));
					$catsPrincipais = array();
					foreach ($catOriginais as $keyCat => $mainCat) {
						$categoria_ordem_valor = get_term_meta($mainCat->term_id, "categoria_ordem_valor");
						if (is_array($categoria_ordem_valor) && count($categoria_ordem_valor) > 0) {
							$mainCat->categoria_ordem_valor = $categoria_ordem_valor[0];
						}else{
							$mainCat->categoria_ordem_valor = 0;
						}
						array_push($catsPrincipais, $mainCat);
					}
					usort($catsPrincipais, "cmp_orde_menu_top");
					foreach ($catsPrincipais as $keyCat => $mainCat) {
				?>
					<li>
						<a href="<?php echo get_term_link($mainCat->term_id, 'categorias_projetos' ); ?>" <?php if ( $categoryProject->name == $mainCat->name ){ echo 'class="active"'; } ?>>
							<?php echo $mainCat->name; ?>
						</a>
					</li>
				<?php } ?>
			</ul>
			<div class="wq-flex">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$arrayQueryProjetos = array(
						'post_type'				=> array( 'projetos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
						'tax_query' => array(
							array(
								'taxonomy'		=> 'categorias_projetos',
								'field'			=> 'slug',
								'terms'			=> array( $categoryProject->slug),
							)
						),
						'paged' => $paged
					);
					$queryProjetos = new WP_Query($arrayQueryProjetos);
					while ( $queryProjetos->have_posts()) {
						$queryProjetos->the_post();
				?>
					<div class="wq-box_4 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
						<div class="wq-treinamento_box">
							<figure>
								<?php
									$wsg_projeto_item_img_id = get_post_meta( get_the_ID(), 'wsg_projeto_item_img_id', true );
									getImageThumb($wsg_projeto_item_img_id,'370x300');
								?>
							</figure>
							<div>
								<h2><?php the_title(); ?></h2>
								<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_projeto_item_resumo', true )); ?>
								<a href="<?php the_permalink(); ?>" class="wq-btn">
									<span>Saiba mais</span>
								</a>
							</div>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
			<?php
				if (function_exists("pagination")) {
					pagination($queryProjetos);
				}
			?>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>