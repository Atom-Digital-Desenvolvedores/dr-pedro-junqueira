<?php

	//add_action( 'cmb2_admin_init', 'metaboxes_eventos' );

	function metaboxes_eventos() {

		// Detalhes do evento na home
		$evento_item = new_cmb2_box( array(
			'id'            => 'evento_item',
			'title'         => __( 'Detalhes do evento na home' ),
			'object_types'  => array( 'eventos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$evento_item->add_field( array(
			'name'       => __( 'Imagem do evento' ),
			'desc'       => __( 'Tamanho recomendado <strong>370x300</strong>' ),
			'id'         => 'wsg_evento_item_img',
			'type' => 'file',
			'preview_size' => array( 370/1, 300/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$evento_item->add_field( array(
			'name'       => __( 'Resumo do evento' ),
			'id'         => 'wsg_evento_item_resumo',
			'type'       => 'wysiwyg',
		) );

		// Página do evento
		$evento_interna = new_cmb2_box( array(
			'id'            => 'evento_interna',
			'title'         => __( 'Página do evento' ),
			'object_types'  => array( 'eventos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$evento_interna->add_field( array(
			'name'       => __( 'Imagem do evento' ),
			'desc'       => __( 'Tamanho recomendado <strong>715x450</strong>' ),
			'id'         => 'wsg_evento_interna_img',
			'type' => 'file_list',
			'preview_size' => array( 715/3, 450/3 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$evento_interna->add_field( array(
			'name'       => __( 'Subtítulo do conteúdo do evento' ),
			'id'         => 'wsg_evento_interna_subtitulo',
			'type'       => 'text',
		) );
		$evento_interna->add_field( array(
			'name'       => __( 'Título do conteúdo do evento' ),
			'id'         => 'wsg_evento_interna_titulo',
			'type'       => 'text',
		) );
		$evento_interna->add_field( array(
			'name'       => __( 'Conteúdo do evento' ),
			'id'         => 'wsg_evento_interna_conteudo',
			'type'       => 'wysiwyg',
		) );
		$evento_interna->add_field( array(
			'name'       => __( 'Título do formulário do evento' ),
			'id'         => 'wsg_evento_interna_form_titulo',
			'type'       => 'text',
		) );
		$evento_interna_items = $evento_interna->add_field( array(
			'id'            => 'evento_interna_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$evento_interna->add_group_field( $evento_interna_items, array(
			'name'       => __( 'subtítulo do item' ),
			'id'         => 'wsg_evento_interna_items_subtitulo',
			'type' => 'text',
		) );
		$evento_interna->add_group_field( $evento_interna_items, array(
			'name'       => __( 'Título do item' ),
			'id'         => 'wsg_evento_interna_items_titulo',
			'type' => 'text',
		) );

		$evento_data = new_cmb2_box( array(
			'id'            => 'evento_data',
			'title'         => __( 'Data do evento' ),
			'object_types'  => array( 'eventos192', ),
			'context'       => 'side',
			'priority'      => 'high',
			'show_names'    => true,
		) );
		$evento_data->add_field( array(
			'desc'       => __( 'Data(mm/dd/aaaa) e hora(hh:mm)' ),
			'id'         => 'wsg_evento_data_valor',
			'type' => 'text_datetime_timestamp',
		) );

		// Método de especificação de página
		$eventosPage = get_page_by_path( 'eventos', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($eventosPage && $eventosPage->ID != $post_id){
			return;
		}

		// Metabox eventos
		$eventos_01 = new_cmb2_box( array(
			'id'            => 'eventos_01',
			'title'         => __( 'eventos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$eventos_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_eventos_01_titulo',
			'type'       => 'text',
		) );

		$eventos_01->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_eventos_01_texto',
			'type'       => 'wysiwyg',
		) );

	}

?>