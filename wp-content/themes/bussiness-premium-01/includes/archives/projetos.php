<?php

	add_action( 'cmb2_admin_init', 'metaboxes_projetos' );

	function metaboxes_projetos() {

		// Detalhes do item
		$projeto_item = new_cmb2_box( array(
			'id'            => 'projeto_item',
			'title'         => __( 'Detalhes do item' ),
			'object_types'  => array( 'projetos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$projeto_item->add_field( array(
			'name'       => __( 'Imagem do item' ),
			'desc'       => __( 'Tamanho recomendado <strong>715x450</strong>' ),
			'id'         => 'wsg_projeto_item_img',
			'type' => 'file',
			'preview_size' => array( 715/1, 450/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$projeto_item->add_field( array(
			'name'       => __( 'Iframe de vídeo do item' ),
			'desc'       => __( 'Se colocar um vídeo, quando clicar no item irá mostrar o vídeo em vez da imagem ampliada.' ),
			'id'         => 'wsg_projeto_item_iframe',
			'type' => 'textarea_code',
		) );

		// Método de especificação de página
		$projetosPage = get_page_by_path( 'galeria', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($projetosPage && $projetosPage->ID != $post_id){
			return;
		}

		// Metabox projetos
		$projetos_01 = new_cmb2_box( array(
			'id'            => 'projetos_01',
			'title'         => __( 'projetos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$projetos_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_projetos_01_titulo',
			'type'       => 'text',
		) );

		$projetos_01->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_projetos_01_texto',
			'type'       => 'wysiwyg',
		) );

	}

?>