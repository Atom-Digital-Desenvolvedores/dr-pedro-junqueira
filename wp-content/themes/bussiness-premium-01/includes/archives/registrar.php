<?php

// Meus posts types
	function meus_post_types(){

		// Serviços
		register_post_type('servicos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Serviços'),
					'singular_name'	=> _x('Serviço', 'post type singular name'),
					'add_new'		=> _x('Novo serviço', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo serviço', 'portfolio item'),
					'edit_item'		=> _x('Editar serviço', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'servicos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Galeria
		register_post_type('projetos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Galeria'),
					'singular_name'	=> _x('item', 'post type singular name'),
					'add_new'		=> _x('Novo item', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo item', 'portfolio item'),
					'edit_item'		=> _x('Editar item', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'galeria'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-format-gallery',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Depoimentos
		register_post_type('depoimentos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Depoimentos'),
					'singular_name'	=> _x('depoimento', 'post type singular name'),
					'add_new'		=> _x('Novo depoimento', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo depoimento', 'portfolio item'),
					'edit_item'		=> _x('Editar depoimento', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'depoimentos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-testimonial',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

	}
	add_action('init', 'meus_post_types');

?>