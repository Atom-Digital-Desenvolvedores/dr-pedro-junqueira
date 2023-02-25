<?php

	add_action( 'cmb2_admin_init', 'metaboxes_all_pages' );

	function metaboxes_all_pages() {

		$id_page01 = get_page_by_path( 'sobre', OBJECT, 'page' )->ID;
		$id_page02 = get_page_by_path( 'servicos', OBJECT, 'page' )->ID;
		$id_page03 = get_page_by_path( 'projetos', OBJECT, 'page' )->ID;
		$id_page04 = get_page_by_path( 'eventos', OBJECT, 'page' )->ID;
		$id_page05 = get_page_by_path( 'blog', OBJECT, 'page' )->ID;
		$id_page06 = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

		$arrayPages = [ $id_page01, $id_page02, $id_page03, $id_page04, $id_page05, $id_page06 ];

		// Metabox Banner
		$banner_all_pages = new_cmb2_box( array(
			'id'            => 'banner_all_pages',
			'title'         => __( 'Banner' ),
			'object_types'  => array( 'page', ),
			'show_on'      => array( 'key' => 'id', 'value' => $arrayPages ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$banner_all_pages->add_field( array(
			'name'       => __( 'Imagem do banner' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x106</strong>' ),
			'id'         => 'wsg_banner_all_pages_img',
			'type' => 'file',
			'preview_size' => array( 1920/2, 106/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );

	}

?>