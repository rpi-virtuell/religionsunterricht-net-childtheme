<?php
	// Exit if accessed directly
	if( !defined( 'ABSPATH' ) ) exit;
?>
<style>
	#wpforo-wrap label{
		display: block;
	}
	#wpforo-wrap input[type="text"],#wpforo-wrap input[type="password"]{
		width:300px;
		margin: 12px 0;
		outline: 0 none;
		padding: 11px 11px 11px 13px;
		font-size: 14px;
		line-height: 18px;
	}
	#wpforo-wrap input[type="submit"]{
		margin: 12px 0;
		padding: 11px;
		font-size: 16px;
		line-height: 20px;
	}
</style>

<p id="wpforo-title"><?php wpforo_phrase('Forum - Login') ?></p>

<div class="wpforo-login-wrap">
	<?php wp_login_form( array('redirect' => home_url( )) ); ?>
</div>
<hr>
<div class="wpforo-register-wrap">
	<p>
		Noch kein Benutzerkonto bei rpi-virtuell? 
		<strong>
			<a href="https://konto.rpi-virtuell.de/registrieren/?ref_service=<?php echo urlencode(home_url( )); ?>">
				Kostenlos registrieren
			</a>
		</strong>
</div>