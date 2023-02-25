<?php

	add_action( 'cmb2_admin_init', 'metaboxes_home' );

	function metaboxes_home() {

		// Método de especificação de página
		$homePage = get_page_by_path( 'home', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($homePage && $homePage->ID != $post_id){
			return;
		}

		// Metabox Banner
		$banner = new_cmb2_box( array(
			'id'            => 'banners',
			'title'         => __( 'Banners' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$banner_items = $banner->add_field( array(
			'id'            => 'banner_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );

		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Imagem do banner' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x580</strong>' ),
			'id'         => 'wsg_banner_items_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 580/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Subtitulo do banner' ),
			'id'         => 'wsg_banner_items_subtitulo',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Titulo do banner' ),
			'id'         => 'wsg_banner_items_titulo',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'texto do botão' ),
			'id'         => 'wsg_banner_items_btn_texto',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Link do botão' ),
			'id'         => 'wsg_banner_items_btn_link',
			'type'       => 'text',
		) );

		// Metabox Sobre
		$sobre = new_cmb2_box( array(
			'id'            => 'sobre',
			'title'         => __( 'Sobre nós' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$sobre->add_field( array(
			'name'       => __( 'link da popup da seção' ),
			'id'         => 'wsg_sobre_link',
			'type'       => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Imagem da seção' ),
			'desc'       => __( 'Tamanho recomendado <strong>473x320</strong>' ),
			'id'         => 'wsg_sobre_img',
			'type' => 'file',
			'preview_size' => array( 473/1, 320/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$sobre->add_field( array(
			'name'       => __( 'Subtítulo da seção' ),
			'id'         => 'wsg_sobre_subtitulo',
			'type'       => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_sobre_titulo',
			'type'       => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_sobre_texto',
			'type'       => 'wysiwyg',
		) );

		// // Metabox Estatísticas
		// $estatisticas = new_cmb2_box( array(
		// 	'id'            => 'estatisticas',
		// 	'title'         => __( 'Estatísticas' ),
		// 	'object_types'  => array( 'page', ),
		// 	'context'       => 'normal',
		// 	'priority'      => 'high',
		// 	'show_names'    => true,
		// 	'closed'        => true,
		// ) );
		// $estatisticas->add_field( array(
		// 	'name'       => __( 'Imagem de fundo da seção' ),
		// 	'desc'       => __( 'Tamanho recomendado <strong>1920x360</strong>' ),
		// 	'id'         => 'wsg_estatisticas_img',
		// 	'type' => 'file',
		// 	'preview_size' => array( 1920/1, 360/1 ),
		// 	'query_args' => array( 'type' => 'image' ),
		// ) );
		// $estatisticas_items = $estatisticas->add_field( array(
		// 	'name'			=> __( 'Items sobre nós' ),
		// 	'id'            => 'estatisticas_items',
		// 	'type'          => 'group',
		// 	'options'       => array(
		// 		'group_title'   => __( 'Item {#}' ),
		// 		'add_button'    => __( 'Adicionar Outro Item' ),
		// 		'remove_button' => __( 'Remover Item' ),
		// 		'sortable'      => true,
		// 		'closed'        => true,
		// 	),
		// ) );
		// $estatisticas->add_group_field( $estatisticas_items, array(
		// 	'name'       => __( 'valor do item' ),
		// 	'id'         => 'wsg_estatisticas_items_valor',
		// 	'type' => 'text',
		// ) );
		// $estatisticas->add_group_field( $estatisticas_items, array(
		// 	'name'       => __( 'legenda do item' ),
		// 	'id'         => 'wsg_estatisticas_items_legenda',
		// 	'type' => 'text',
		// ) );

		// Metabox Serviços
		$servicos = new_cmb2_box( array(
			'id'            => 'servicos',
			'title'         => __( 'Serviços' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$servicos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_servicos_titulo',
			'type'       => 'text',
		) );
		$servicos->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_servicos_texto',
			'type'       => 'wysiwyg',
		) );
		$servicos->add_field( array(
			'name'    => __( 'Listagem de serviços' ),
			'desc'    => __( 'Arraste os serviços da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos serviços na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_servicos_na_home',
			'type'    => 'custom_attached_posts',
			'column'  => true,
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => -1,
					'post_type'      => 'servicos192',
				),
			),
		) );

		// Metabox Projetos
		$projetos = new_cmb2_box( array(
			'id'            => 'projetos',
			'title'         => __( 'Projetos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$projetos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_projetos_titulo',
			'type'       => 'text',
		) );
		$projetos->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_projetos_texto',
			'type'       => 'wysiwyg',
		) );
		$projetos->add_field( array(
			'name'    => __( 'Listagem de projetos' ),
			'desc'    => __( 'Arraste os projetos da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos projetos na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_projetos_na_home',
			'type'    => 'custom_attached_posts',
			'column'  => true,
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => -1,
					'post_type'      => 'projetos192',
				),
			),
		) );

		// Metabox Blog
		$blog = new_cmb2_box( array(
			'id'            => 'blog',
			'title'         => __( 'Blog' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$blog->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_blog_titulo',
			'type'       => 'text',
		) );
		$blog->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_blog_texto',
			'type'       => 'wysiwyg',
		) );

		// Metabox Newsletter
		$newsletter = new_cmb2_box( array(
			'id'            => 'newsletter',
			'title'         => __( 'Newsletter' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$newsletter->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_newsletter_titulo',
			'type'       => 'text',
		) );
		$newsletter->add_field( array(
			'name'       => __( 'Subtítulo da seção' ),
			'id'         => 'wsg_newsletter_subtitulo',
			'type'       => 'text',
		) );

	}

?>