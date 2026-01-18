<?php
/**
 * Dark Mode Toggle
 *
 * @package zuari
 */

function zuari_enqueue_dark_mode_script() {
	wp_enqueue_script( 'zuari-dark-mode', get_template_directory_uri() . '/js/dark-mode.js', array(), '1.0.0', true );
	wp_localize_script( 'zuari-dark-mode', 'zuariDarkMode', array(
		'enabled' => get_theme_mod( 'enable_darkmode' ) === '1',
	) );
}
add_action( 'wp_enqueue_scripts', 'zuari_enqueue_dark_mode_script' );

function zuari_add_dark_mode_toggle() {
	if ( get_theme_mod( 'enable_darkmode' ) === '1' ) {
		?>
		<button id="dark-mode-toggle" class="dark-mode-toggle" aria-label="<?php esc_attr_e( 'Toggle dark mode', 'zuari' ); ?>">
			<svg class="sun-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
			</svg>
			<svg class="moon-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
				<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
			</svg>
		</button>
		<?php
	}
}
add_action( 'wp_footer', 'zuari_add_dark_mode_toggle' );
