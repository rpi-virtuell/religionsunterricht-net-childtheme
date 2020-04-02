<?php

get_header();

if ( have_posts() ) :

	while ( have_posts() ) : the_post(); 

		$post_type = get_post_type();
	
		?>

		<article <?php post_class(); ?>>

			<?php if ( has_post_thumbnail() && ! post_password_required() && is_page()) : ?>

				<div class="featured-image">
					<?php the_post_thumbnail( 'mcluhan_fullscreen-image' ); ?>
				</div>

			<?php endif; ?>

			<header class="entry-header section-inner">
				<div class="entry-header-meta">
				</div>
				<?php
				the_title( '<h1 class="entry-title">', '</h2>' );

				// Make sure we have a custom excerpt
				
				if ( has_excerpt() ) {
					echo '<p class="excerpt">' . get_the_excerpt() . '</p>';
				}
				
				// Only output post meta data on single
				if ( is_single() || is_attachment() ) : ?>

					<div class="meta">

						<time><a href="<?php the_permalink(); ?>" title="<?php the_time( get_option( 'date_format' ) ); ?> <?php the_time( get_option( 'time_format' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></time>

						<?php if ( ! is_attachment() ) : ?>

							<span>
								<?php
								echo __( 'in', 'mcluhan' ) . ' ';
							
								$terms = get_the_terms( get_the_ID(), 'klassenstufe' );
								//($terms);
								foreach ($terms as $term) {  ?>
									<span class="material-klassenstufe-entry">
										<a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>?fwp_klassenstufe=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
								<?php	
								}
								
								$terms = get_the_terms( get_the_ID(), 'themen' );
								//($terms);
								foreach ($terms as $term) {  ?>
									<span class="material-thema-entry">
										<a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>?fwp_thema=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
								<?php	
								}
								
								$terms = get_the_terms( get_the_ID(), 'autoren' );
								if($terms){echo 'von ';}
								foreach ($terms as $term) {  ?>
									<span class="material-autoren-entry">
										<a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>?fwp_autoren=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
								<?php	
								}								
								
								echo ('<p class="excerpt">' . get_field("excerpt") .'</p>'); 
				
								//the_category( ', ' );
								?>
							</span>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</header><!-- .entry-header -->

			<div class="entry-content section-inner">

				<?php the_content(); ?>

			</div> <!-- .content -->

			<?php

			wp_link_pages( array(
				'before' => '<p class="section-inner linked-pages">' . __( 'Pages', 'mcluhan' ) . ':',
			) );

			if ( $post_type == 'post' && get_the_tags() ) : ?>

				<div class="meta bottom section-inner">

					<p class="tags"><?php the_tags( ' #', ' #', ' ' ); ?></p>

				</div> <!-- .meta -->

				<?php
			endif;



			// Output comments wrapper if it's a post, or if comments are open, or if there's a comment number – and check for password
			if ( ( $post_type == 'post' || comments_open() || get_comments_number() ) && ! post_password_required() ) : ?>

				<div class="comments-section-inner section-inner wide">
					<?php comments_template(); ?>
				</div><!-- .comments-section-inner -->

			<?php endif; ?>

		</div> <!-- .post -->

		<?php



	endwhile;

endif;

get_footer(); ?>
