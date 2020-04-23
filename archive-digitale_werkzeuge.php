<?php get_header(); ?>

<div class="section-inner section-werkzeuge">

	<?php if ( true) : ?>

		<header class="page-header">
			<div>
				<?php echo ( get_field("info", get_option( 'page_for_posts' ) ) ); ?>
			</div>
			<div style="margin-top: 0px;">
				<div style="width: 100%; columns:2;" class="facetts">
					<div  class="facet-werkzeug"><?php echo facetwp_display( 'facet', 'werkzeug_kategorie' ); ?></div>
				</div>
				<div  style="display:none" class="material-selection"><?php echo facetwp_display( 'selections' ); ?></div>
                <div style="width: 100%;display:none">
					<div class="material-counter">
						<?php echo facetwp_display( 'counts' ); ?> Treffer 
					</div>
					<div class="material-pager">
						<?php echo facetwp_display( 'pager' ); ?>
					</div>
				</div>
		</div>
		</header>
		<?php
	endif;

	if ( have_posts() ) :
		$old_year = '1'; ?>
		<div class="werkzeuge" id="werkzeuge">
			<div class="masonry">
			<?php while ( have_posts() ) : the_post();
					$title_args = array();
					if ( is_sticky() ) {
						$title_args = array(
							'before' => __( 'Sticky post:', 'mcluhan' ) . ' ',
						);
					}
					?>
					<div class="werkzeug-entry">
						<?php 
							$link = get_field('link_zum_starten');
							if ( $link != '' && $link !== null ) {
						?>
						<button class="werkzeug"><a href="<?php echo $link; ?>" target="_blank">+</a></button>
						<?php } ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( $title_args ); ?>">
							<?php
							$sticky = is_sticky() ? '<div class="sticky-arrow"></div>'  : '';
							the_title( '<h2 class="title">' . $sticky . '<span>', '</span></h2>' );
							?>
						</a>
						
						<div class="werkzeug-excerpt werkzeug">
							<?php
							$featured_img_url = get_the_post_thumbnail_url();
							if ( $featured_img_url !== false ) { ?>
							<div class="werkzeug-picture werkzeug">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( $title_args ); ?>"><?php echo the_post_thumbnail('thumbnail');?></a>
							</div>
							<?php } ?> 
							<div class="werkzeug-beschreibung werkzeug" >
								<?php echo ( get_the_excerpt( )); ?>
							</div>
							<div class="werkzeug-meta werkzeug">
									<?php
									$terms = get_the_terms( get_the_ID(), 'werkzeug_kategorie' );
									//($terms);
									foreach ($terms as $term) {  ?>
									<div class="material-thema terms werkzeug">
										<span class="material-thema-entry werkzeug">
											<a href="?fwp_werkzeug_kategorie=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
											</div>
									<?php	
									}
									?>

							</div>
							<div class="clearer"></div>
						</div>
					</div>				 


<?php

			endwhile; ?>
		</div>
 <div style="float: right;"><?php echo facetwp_display( 'pager' );  ?></div>
		</div><!-- .posts -->

	<?php endif; ?>

</div><!-- .section-inner -->

<?php
 
 //get_template_part( 'pagination' );

get_footer(); ?>
