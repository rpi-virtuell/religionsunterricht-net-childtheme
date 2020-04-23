
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
				<div class="werkzeug-timestamp">
					<time><a href="<?php the_permalink(); ?>" title="<?php the_time( get_option( 'date_format' ) ); ?> <?php the_time( get_option( 'time_format' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></time>
				</div>
				<div style="clear: both;"></div>
				<div class="entry-header-meta">
				<?php 
					$link = get_field('link_zum_starten');
					if ( $link != '' && $link !== null ) :?>
						<button class="werkzeug-detail"><a href="<?php echo $link; ?>" target="_blank"><?php the_title(); ?> erstellen</a></button>
					<?php endif ?>
				</div>
				<?php
				the_title( '<div><h1 class="entry-title">', '</h1></div>' );

				// Make sure we have a custom excerpt
				
				// Only output post meta data on single
				if ( is_single() || is_attachment() ) : ?>

					<div class="meta meta-werkzeug">
						<?php 
						if ( has_excerpt() ) {
							echo '<p>' . get_the_excerpt() . '</p>';
						}
						?>
						<?php if ( ! is_attachment() ) : 
						
									$pro = array();
									$contra = array();
									$kosten_lehrer = get_field("kosten_lehrer"); 
									$kostenfrei_schueler = get_field("kostenfrei_schueler");
									if ( $kostenfrei_schueler == 1 && $kosten_lehrer == 1 ) { 
										$pro[] = "Kostenlos";
									} elseif( $kostenfrei_schueler == 1 ) {
										$pro[] = "Für Lernende kostenlos";
										$contra[] = "Für Unterrichtende fallen Kosten an";
									} else { 
										$contra¢[] = "Für Lernende nicht kostenlos";
									}
									$anonym_schuler = get_field("anonym_schuler");
									if ( $anonym_schuler == 1 ) { 
										$pro[] = "Anonym nutzbar";
									} else { 
										$contra[] = "Nicht anonym nutzbar"; 
									} 
									
									$schule_lehrer = get_field("schule_lehrer");
									if ( $schule_lehrer == 1 ) { 
										$contra[] = "Nur über eine Schullizenz nutzbar";
									}  
									
									$eltern_lehrer = get_field("eltern_lehrer");
									if ( $eltern_lehrer == 1 ) { 
										$contra[] = "Zustimmung der Eltern nötig";
									} else { 
										$pro[] = "Unbedenkliche Nutzung";
									} 	
									$servicestandort = get_field("servicestandort");
									if ( $servicestandort == 1 ) { 
										$pro[] = "Servicestandort EU";
									} else { 
										if ($servicestandort == 0 ) {
											$contra[] = "Servicestandort außerhalb der EU";
										} else {
											$contra[] = "Servicestandort: Keine Angabe";
										}
									} 
									 
									$size = "100%";
									if ( sizeof($pro) != 0 && sizeof($contra) != 0 ) {
										$size = "49%";
									}
									?>
									<div class="procontra">
										<?php if ( sizeof($pro)  != 0 ) { ?>
											<div class="pro" style="float: left; width: <?php echo $size; ?>;">
												<ul>
												<?php foreach ($pro as $key => $value) {
													echo "<li>".$value."</li>";
												} ?>
												</ul>
											</div>
										<?php } ?>
										<?php if ( sizeof($contra)  != 0 ) { ?>
											<div class="contra" style="float: left; width: <?php echo $size; ?>;">
												<ul>
												<?php foreach ($contra as $key => $value) {
													echo "<li>".$value."</li>";
												} ?>
												</ul>
											</div>
										<?php } ?>

									</div>
									<div style="clear: both;" class="werkzeug-terms">
									
										<span>
											<?php
											$terms = get_the_terms( get_the_ID(), 'werkzeug_kategorie' );
											//($terms);
											foreach ($terms as $term) {  ?>
												<span class="material-klassenstufe-entry">
													<a href="<?php echo get_permalink( get_option( 'page_for_posts' )); ?>?fwp_klassenstufe=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
											<?php	
											}  
											?>

												 
											
										</span>
									</div>
							
						<?php endif;?>
						
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
