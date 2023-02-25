<?php
	$id_logo = get_page_by_path( 'configuracoes-da-logo', OBJECT, 'gerais' )->ID;

	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title('|', true, 'right'); ?></title>

	<meta name="robots" content="noodp" />
	<meta http-equiv="Content-Language" content="pt-br">

	<?php
		$wsg_favicon_img_id = get_post_meta( $id_logo, 'wsg_favicon_img_id', true );
		if ($wsg_favicon_img_id !== NULL && strlen($wsg_favicon_img_id) > 0) {
			$wsg_favicon = wp_get_attachment_image_src($wsg_favicon_img_id);
			if ($wsg_favicon !== NULL && count($wsg_favicon) > 0) {
				?>
					<link rel="icon" href="<?php echo $wsg_favicon[0]; ?>" type="image/x-icon"/>
				<?php
			}
		}
	?>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/webquantica-grid.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/lity.css">

	<?php if ( is_page('sobre') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/empresa.css">

	<?php } elseif ( is_post_type_archive('servicos192') || is_singular('servicos192')  ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/servicos.css">

	<?php } elseif ( is_post_type_archive('projetos192') || is_singular('projetos192') || is_tax('categorias_projetos')  ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/beneficios.css">

	<?php } elseif ( is_post_type_archive('eventos192') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/beneficios.css">

	<?php } elseif ( is_singular('eventos192') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/eventos.css">

	<?php } elseif ( is_page('contato') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/contato.css">

	<?php } elseif ( is_page('blog') || is_category() || is_search() || is_tag() || is_date() ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blog.css">

	<?php } elseif ( is_single() ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blog.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blog-interna.css">
	<?php } ?>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/mobile.css">

	<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/webquantica-grid.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/lity.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/carousel.js"></script>

	<meta name="wq_url_theme" content="<?php bloginfo('template_url'); ?>/">
	<!-- -->
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js-template/sweetalert2/sweetalert2.min.css">
	<script src="<?php bloginfo('template_url') ?>/js-template/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js-template/jquery.blockUI.js"></script>

	<script src="<?php bloginfo('template_url') ?>/js-template/jquery.maskedinput.min.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js-template/script-template.js"></script>

	<!-- -->
	<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallbackFormsRecaptcha&render=explicit' async defer></script>

	<?php wp_head(); ?>

	<?php
		$id_google = get_page_by_path( 'configuracoes-do-google', OBJECT, 'gerais' )->ID;

		echo get_post_meta( $id_google, 'pixel_de_conversao_facebook', true );
		echo get_post_meta( $id_google, 'code_webmaster_tools', true );
	?>

</head>
<body>
	<header class="wq-header wq-header_horizontal">
		<div class="wq-header_top">
			<div class="wq-container">
				<div class="wq-flex">
					<ul class="wq-contato wq-lista-inline">
						<?php
							$entries = get_post_meta( $id_telefones, 'wsg_telefone_items', true );

							$quantNum = 0;
							is_array($arrayNum);

							foreach ( (array) $entries as $key => $entry ) {

								$quantNum++;
								$arrayNum[$quantNum] = $quantNum;

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
								<a href="<?php echo $wsg_telefone_link; ?>" target="_blank" data-teste="<?php echo $arrayNum[$quantNum]; ?>">
									<span class="flaticon-<?php echo $wsg_telefone_icone; ?>"></span>
									<address><?php echo $wsg_telefone_nmr; ?></address>
								</a>
							</li>
						<?php
								if (count($arrayNum) > 1) {
									break;
								}
							}
						?>
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
		<div class="wq-header_bottom">
			<div class="wq-container">
				<div class="wq-flex">
					<div class="wq-logo">
						<a href="<?php bloginfo('url'); ?>/">
							<?php
								$wsg_logo_header_img_id = get_post_meta( $id_logo, 'wsg_logo_header_img_id', true );
								echo getImageThumb($wsg_logo_header_img_id, 'full');
							?>
						</a>
					</div>
					<div class="wq-btn_menu">
						<hr>
						<hr>
						<hr>
					</div>
					<nav class="wq-menu_principal">
						<ul class="wq-lista-inline">
							<?php
								$menu_name = 'header-menu';
								$locations = get_nav_menu_locations();
								$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
								$primaryNav = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

								$activeclass = '';
								$count = 0;
								$submenu = FALSE;
								foreach ( $primaryNav as $navItem ) {
									$activeclass = '';
									if (!$navItem->menu_item_parent ){
										$parent_id = $navItem->ID;
										echo '<li><a href="'.$navItem->url.'" '.$activeclass.' title="'.$navItem->title.'">'.$navItem->title.'</a>';
									}
									if ( $parent_id == $navItem->menu_item_parent ) {
										if ( !$submenu ): $submenu = true;
											echo "

												<ul>";
										endif;
							?>
								<li>
									<a href="<?php echo $navItem->url; ?>" class="title"><?php echo $navItem->title; ?></a>
								</li>
							<?php
										if ( $primaryNav[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
											echo "</ul>";
											$submenu = false;
										}
									}
									if ( $primaryNav[ $count + 1 ]->menu_item_parent != $parent_id ){
										echo "</li>";
										$submenu = false;
									}
									$count++;
								}
							?>
						</ul>
						<script>
							var $temFilho = $('.wq-menu_principal ul li').has( "ul" );
							$($temFilho).attr({
								class: "wq-drop",
								onclick: ""
							});
						</script>
					</nav>
				</div>
			</div>
		</div>
	</header>