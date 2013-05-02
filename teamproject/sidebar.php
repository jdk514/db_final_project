<div id="sidebar">
	<?php
		if( isset( $_SESSION['user_login'] ) ):
			echo welcome_user();
			show_user_links();
		elseif ( isset( $_SESSION['login_error'] ) ):
			echo '<p class="error">Login error: ' . $_SESSION['login_error'] . '</p>';
			show_login_form();
		else:
			show_login_form();
		endif;
	?>
</div>