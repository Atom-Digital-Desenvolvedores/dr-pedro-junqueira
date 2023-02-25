<?php

	add_action( 'cmb2_admin_init', 'metaboxes_servicos' );

	function metaboxes_servicos() {

		// Detalhes do serviço na home
		$servico_item = new_cmb2_box( array(
			'id'            => 'servico_item',
			'title'         => __( 'Detalhes do serviço na home' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$servico_item->add_field( array(
			'name'       => __( 'Icone do serviço' ),
			'desc'       => __( 'Tamanho recomendado <strong>128x128</strong>' ),
			'id'         => 'wsg_servico_item_img',
			'type' => 'file',
			'preview_size' => array( 128/1, 128/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Página do serviço
		$servico_interna = new_cmb2_box( array(
			'id'            => 'servico_interna',
			'title'         => __( 'Página do serviço' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$servico_interna->add_field( array(
			'name'       => __( 'Imagem do serviço' ),
			'desc'       => __( 'Tamanho recomendado <strong>370x300</strong>' ),
			'id'         => 'wsg_servico_interna_img',
			'type' => 'file',
			'preview_size' => array( 370/1, 300/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$servico_interna->add_field( array(
			'name'       => __( 'Subtítulo do serviço' ),
			'id'         => 'wsg_servico_interna_subtitulo',
			'type'       => 'text',
		) );
		$servico_interna->add_field( array(
			'name'       => __( 'Título do conteúdo do serviço' ),
			'id'         => 'wsg_servico_interna_titulo',
			'type'       => 'text',
		) );
		$servico_interna->add_field( array(
			'name'       => __( 'Conteúdo do serviço' ),
			'id'         => 'wsg_servico_interna_conteudo',
			'type'       => 'wysiwyg',
		) );
		$servico_interna->add_field( array(
			'name'       => __( 'Título do formulário do serviço' ),
			'id'         => 'wsg_servico_interna_form_titulo',
			'type'       => 'text',
		) );
		$servico_interna_items = $servico_interna->add_field( array(
			'id'            => 'servico_interna_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$servico_interna->add_group_field( $servico_interna_items, array(
			'name'       => __( 'subtítulo do item' ),
			'id'         => 'wsg_servico_interna_items_subtitulo',
			'type' => 'text',
		) );
		$servico_interna->add_group_field( $servico_interna_items, array(
			'name'       => __( 'Título do item' ),
			'id'         => 'wsg_servico_interna_items_titulo',
			'type' => 'text',
		) );

		// Método de especificação de página
		$projetosPage = get_page_by_path( 'servicos', OBJECT, 'page' );

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

		// Metabox Serviços
		$servicos_01 = new_cmb2_box( array(
			'id'            => 'servicos_01',
			'title'         => __( 'Serviços' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$servicos_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_servicos_01_titulo',
			'type'       => 'text',
		) );

		$servicos_01->add_field( array(
			'name'       => __( 'texto da seção' ),
			'id'         => 'wsg_servicos_01_texto',
			'type'       => 'wysiwyg',
		) );

	}

?>