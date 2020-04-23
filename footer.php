			
			<footer class="section-inner links" style="border-top: 1px solid #ccc; margin:20px auto; padding:20px 0;">
			
			<p class="copyright"><a href="/datenschutz">Datenschutz</a> | <a href="/impressum-ru-net">Impressum</a></p>
				
				
			</footer> 
			<footer class="site-footer section-inner">

				<p class="copyright"><a href="https://creativecommons.org/licenses/by/4.0/deed.de">CC BY 4.0</a> <a href="<?php echo esc_url( home_url() ); ?>" class="site-name"><?php bloginfo( 'wpurl' ); ?></a></p>
				<p class="theme-by">Powered by <a href="https://rpi-virtuell.de">rpi-virtuell.de</a></p>
				
			
			</footer> <!-- footer -->
			
		</main>
		
		<div class="footer-widgets">
		
		<?php if ( is_active_sidebar( 'footer-bar' ) ) : ?>
			<hr>
			<?php dynamic_sidebar( 'footer-bar' ); ?>
		<?php endif; ?>

		</div>
		<?php wp_footer(); ?>
		
			
	</body>
</html>
