<?php
	get_header();

	$id_page = get_page_by_path( 'blog', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-blog_01">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_8 wq-box_cp-12 wq-box_cl-12">
					<?php
						global $query_string;
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$query_args = explode("&", $query_string);
						// essa variavel não deve ser reuniciada
						$search_query = array();
						foreach($query_args as $key => $string) {
							$query_split = explode("=", $string);
							$search_query[$query_split[0]] = urldecode($query_split[1]);
						}
						$search_query['post_type'] = array('post');
						$search_query['posts_per_page'] = 5;
						$search_query['paged'] = $paged;

						$query = new WP_Query( $search_query );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								$attachID = get_post_thumbnail_id( get_the_ID() );

								$categories = get_the_terms( get_the_ID(), 'category' );
								$htmlCategory = '';
								if ( $categories && ! is_wp_error( $categories ) ){
									$draught_links = array();
									foreach ($categories as $category) {
										$item = '<a href="'.get_term_link($category->term_id, "category").'" title="'.$category->name.'" > '.$category->name.'</a>';
										array_push($draught_links, $item);
									}
									$htmlCategory = implode(' | ', $draught_links);
								}
					?>
						<article class="wq-blog_item blog_listagem">
							<div class="wq-flex">
								<div class="wq-box_5">
									<figure>
										<?php echo getImageThumb(get_post_thumbnail_id(), '750x400'); ?>
									</figure>
								</div>
								<div class="wq-box_7">
									<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="wq-blog_info">
										<span><?php echo get_the_date('d', $item->ID); ?>.<?php echo get_the_date('m', $item->ID); ?>.<?php echo get_the_date('Y', $item->ID); ?></span>
										<span>
											<?php echo $htmlCategory; ?>
										</span>
									</div>
									<?php echo wpautop(the_excerpt()); ?>
									<a href="<?php echo get_permalink(); ?>" class="wq-btn wq-btn_peq">
										<span>Ler tudo</span>
									</a>
								</div>
							</div>
						</article>
					<?php } } wp_reset_query(); ?>
				</div>
				<?php
					get_sidebar();
				?>
			</div>
			<?php
				if (function_exists("pagination")) {
					pagination($query);
				}
			?>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>