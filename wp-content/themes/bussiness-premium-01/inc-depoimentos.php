	<section class="wq-07 wq-cto">
		<div class="wq-container">
			<div class="wq-carousel_depoimentos">
				<?php
					$arrayQueryDepoimentos = array(
						'post_type'				=> array( 'depoimentos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
					);
					$queryDepoimentos = new WP_Query($arrayQueryDepoimentos);
					while ( $queryDepoimentos->have_posts()) {
						$queryDepoimentos->the_post();
				?>
					<div class="wq-depoimento_item">
						<figure>
							<?php
								$wsg_depoimento_item_img_id = get_post_meta( get_the_ID(), 'wsg_depoimento_item_img_id', true );
								getImageThumb($wsg_depoimento_item_img_id,'128x128');
							?>
						</figure>
						<div>
							<h3><?php the_title(); ?></h3>
							<h4><?php echo get_post_meta( get_the_ID(), 'wsg_depoimento_item_cargo', true ); ?></h4>
							<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_depoimento_item_conteudo', true )); ?>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>