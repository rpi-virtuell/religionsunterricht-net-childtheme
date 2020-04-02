<?php get_header(); ?>

<div class="section-inner">

	<?php if ( is_home() && get_theme_mod( 'mcluhan_home_title' ) ) : ?>

		<header class="page-header">
			<div>
				<?php echo ( get_field("info", get_option( 'page_for_posts' ) ) ); ?>
			</div>
			<div style="margin-top: 30px;">
				<div style="width: 100%; columns:2;" class="facetts">
						<div style="display:none" class="facet-suche"><?php echo facetwp_display( 'facet', 'suche' ); ?></div>
						<div  class="facet-thema"><?php echo facetwp_display( 'facet', 'thema' ); ?></div>
						
						<div class="facet-klassenstufe" style="display:none"><?php echo facetwp_display( 'facet', 'klassenstufe' ); ?></div>
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

		<div class="posts" id="posts">
			<div class="masonry">

			<?php while ( have_posts() ) : the_post();


				 
					 

					$title_args = array();

					if ( is_sticky() ) {
						$title_args = array(
							'before' => __( 'Sticky post:', 'mcluhan' ) . ' ',
						);
					}

					?>

					<div class="material-entry">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( $title_args ); ?>">
							<?php
							$sticky = is_sticky() ? '<div class="sticky-arrow"></div>'  : '';
							the_title( '<h2 class="title">' . $sticky . '<span>', '</span></h2>' );
							?>
						</a>

						<div class="material-excerpt">
							<?php
							$featured_img_url = get_the_post_thumbnail_url();
							if ( $featured_img_url !== false ) { ?>
							<div class="material-picture">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( $title_args ); ?>"><?php echo the_post_thumbnail('thumbnail');?></a>
							</div>
							<?php } ?>
							<div class="material-aufgabe">
								<?php echo ( get_field("excerpt")); ?>
							</div>
							<div class="material-meta">
								
									<?php
									$terms = get_the_terms( get_the_ID(), 'themen' );
									//($terms);
									foreach ($terms as $term) {  ?>
									<div class="material-thema terms">
										<span class="material-thema-entry">
											<a href="?fwp_thema=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
											</div>
									<?php	
									}
									?>
								
								
									<?php
									$terms = get_the_terms( get_the_ID(), 'klassenstufe' );
									//($terms);
									foreach ($terms as $term) {  ?>
									<div class="material-klassenstufe terms">
										<span class="material-klassenstufe-entry">
											<a href="?fwp_klassenstufe=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
									</div>
									<?php	
									}
									?>
								
								
									<?php
									$terms = get_the_terms( get_the_ID(), 'autoren' );
									//($terms);
									foreach ($terms as $term) {  ?>
									<div class="material-autoren terms">
										<span class="material-autoren-entry">
											<a href="?fwp_autoren=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
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
