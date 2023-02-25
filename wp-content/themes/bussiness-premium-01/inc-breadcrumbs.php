
	<section class="wq-banner_pagina">
		<?php
			$wsg_banner_all_pages_img_id = get_post_meta( $id_page, 'wsg_banner_all_pages_img_id', true );
			getImageThumb($wsg_banner_all_pages_img_id,'1920x106');
		?>
		<div class="wq-breadcrumbs">
			<div class="wq-container">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					}
				?>
				<?php if ( is_page() || is_single() ) { ?>
					<h1><?php the_title(); ?></h1>
				<?php } elseif ( is_post_type_archive('servicos192') ) { ?>
					<h1><?php echo get_page_by_path( 'servicos', OBJECT, 'page' )->post_title; ?></h1>
				<?php } elseif ( is_post_type_archive('projetos192') ) { ?>
					<h1><?php echo get_page_by_path( 'projetos', OBJECT, 'page' )->post_title; ?></h1>
				<?php } elseif ( is_post_type_archive('eventos192') ) { ?>
					<h1><?php echo get_page_by_path( 'eventos', OBJECT, 'page' )->post_title; ?></h1>
				<?php } elseif ( is_tax('categorias_projetos') ) { ?>
					<h1>Categoria: <?php echo $categoryProject->name; ?></h1>
				<?php } elseif ( is_category() ) { ?>
					<h1>Categoria: <?php echo $category->name; ?></h1>
				<?php } elseif ( is_search() ) { ?>
					<h1>Resultados de: <?php echo $_GET['s'];?></h1>
				<?php } elseif ( is_tag() ) { ?>
					<h1>Tag: <?php echo $tag->name; ?></h1>
				<?php } ?>
			</div>
		</div>
	</section>