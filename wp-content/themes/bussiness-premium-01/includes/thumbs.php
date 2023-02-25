<?php

	// tamanhos dinâmicos para thumbs
	function tamanhos_thumbs(){

		// Ativando suporte para imagem destacada
		add_theme_support('post-thumbnails');
		add_image_size( '1920x580', 1920, 580, true );
		add_image_size( '1920x360', 1920, 360, true );
		add_image_size( '1920x106', 1920, 106, true );
		add_image_size( '750x400', 750, 400, true );
		add_image_size( '715x450', 715, 450, true );
		add_image_size( '473x320', 473, 320, true );
		add_image_size( '462x312', 462, 312, true );
		add_image_size( '370x300', 370, 300, true );
		add_image_size( '370x250', 370, 250, true );
		add_image_size( '360x360', 360, 360, true );
		add_image_size( '340x180', 340, 180, true );
		add_image_size( '237x200', 237, 200, true );
		add_image_size( '128x128', 128, 128, true );
		add_image_size( '100x100', 100, 100, true );
		add_image_size( '64x64', 64, 64, true );
	}
	add_action('after_setup_theme', 'tamanhos_thumbs');

?>