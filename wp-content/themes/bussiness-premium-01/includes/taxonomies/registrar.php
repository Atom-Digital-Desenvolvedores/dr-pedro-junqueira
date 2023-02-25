<?php

// Minhas taxonomies
	function minhas_taxonomies(){

		// Na home
		register_taxonomy( 'categorias_projetos', array( 'projetos192' ), array(
			'hierarchical' => true,
			'label' => __( 'Categorias de projetos' ),
			'show_ui' => true,
			'show_in_tag_cloud' => false,
			'query_var' => true,
				'rewrite' => array(
					'slug' => 'categorias-projetos',
					'with_front' => true,
				),
				'capabilities' => array(
					'manage_terms' => true,
					'edit_terms' => true,
					'delete_terms' => true,
				)
			)
		);

	}
	//add_action('init', 'minhas_taxonomies');

?>