<?php
/**
 * Zuari Theme Customizer
 *
 * @package zuari
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zuari_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_image' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'header_image_data' )->transport = 'postMessage';

	// Colors.
	$wp_customize->add_setting(
		'header_bgcolor',
		array(
			'default'           => '#eaeaea',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_bgcolor',
			array(
				'label'    => __( 'Header Background Color', 'zuari' ),
				'section'  => 'colors',
				'settings' => 'header_bgcolor',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting(
		'fgcolor',
		array(
			'default'           => '#000000',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'fgcolor',
			array(
				'label'    => __( 'Foreground Color', 'zuari' ),
				'section'  => 'colors',
				'settings' => 'fgcolor',
				// 'priority'   => 5
			)
		)
	);

	$wp_customize->add_section(
		'dark_mode',
		array(
			'title'    => __( 'Dark Mode', 'zuari' ),
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'enable_darkmode',
		array(
			'default'           => '',
			'sanitize_callback' => 'zuari_sanitize_enable_darkmode',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'enable_darkmode',
			array(
				'label'    => __( 'Enable dark mode', 'zuari' ),
				'section'  => 'dark_mode',
				'settings' => 'enable_darkmode',
				'type'     => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting(
		'dark_mode_background',
		array(
			'default'           => '#222222',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dark_mode_background',
			array(
				'label'    => __( 'Dark mode background', 'zuari' ),
				'section'  => 'dark_mode',
				'settings' => 'dark_mode_background',
			)
		)
	);

	$wp_customize->add_setting(
		'dark_mode_text',
		array(
			'default'           => '#bdc3c7',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dark_mode_text',
			array(
				'label'    => __( 'Dark mode text color', 'zuari' ),
				'section'  => 'dark_mode',
				'settings' => 'dark_mode_text',
			)
		)
	);

	// Spacing.
	$wp_customize->add_section(
		'spacing',
		array(
			'title'    => __( 'Spacing', 'zuari' ),
			'priority' => 85,
		)
	);

	$wp_customize->add_setting(
		'content_width',
		array(
			'default'           => '680',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'content_width',
			array(
				'type'        => 'number',
				'label'       => __( 'Content Width (px)', 'zuari' ),
				'description' => __( 'Maximum width of the main content area.', 'zuari' ),
				'section'     => 'spacing',
				'settings'    => 'content_width',
				'input_attrs' => array(
					'min'  => 400,
					'max'  => 1200,
					'step' => 10,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'line_height',
		array(
			'default'           => '1.6',
			'sanitize_callback' => 'zuari_sanitize_float',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'line_height',
			array(
				'type'        => 'number',
				'label'       => __( 'Line Height', 'zuari' ),
				'description' => __( 'Line height for body text.', 'zuari' ),
				'section'     => 'spacing',
				'settings'    => 'line_height',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 2.5,
					'step' => 0.1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'font_size_base',
		array(
			'default'           => '18',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'font_size_base',
			array(
				'type'        => 'number',
				'label'       => __( 'Base Font Size (px)', 'zuari' ),
				'description' => __( 'Base font size for body text.', 'zuari' ),
				'section'     => 'spacing',
				'settings'    => 'font_size_base',
				'input_attrs' => array(
					'min'  => 14,
					'max'  => 24,
					'step' => 1,
				),
			)
		)
	);

	// Typography.
	$wp_customize->add_section(
		'typography',
		array(
			'title'    => __( 'Typography', 'zuari' ),
			'priority' => 90, // Before Widgets.
		)
	);

	$wp_customize->add_setting(
		'mono_font',
		array(
			'default'           => 'IBM Plex Mono',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'mono_font',
		array(
			'type'    => 'select',
			'section' => 'typography',
			'label'   => __( 'Site title font (Mono)', 'zuari' ),
			'choices' => array(
				'IBM Plex Mono'   => 'IBM Plex Mono',
				'Space Mono'      => 'Space Mono',
				'Source Code Pro' => 'Source Code Pro',
				'Fira Mono'       => 'Fira Mono',
			),
		)
	);

	$wp_customize->add_setting(
		'heading_font',
		array(
			'default'           => 'IBM Plex Sans Condensed',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'heading_font',
		array(
			'type'    => 'select',
			'section' => 'typography',
			'label'   => __( 'Heading font (Condensed)', 'zuari' ),
			'choices' => array(
				'IBM Plex Sans Condensed' => 'IBM Plex Sans Condensed',
				'Archivo Narrow'          => 'Archivo Narrow',
				'Barlow Condensed'        => 'Barlow Condensed',
				'Roboto Condensed'        => 'Roboto Condensed',
			),
		)
	);

	$wp_customize->add_setting(
		'body_font',
		array(
			'default'           => 'IBM Plex Serif',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'body_font',
		array(
			'type'    => 'select',
			'section' => 'typography',
			'label'   => __( 'Body font (Serif)', 'zuari' ),
			'choices' => array(
				'IBM Plex Serif'   => 'IBM Plex Serif',
				'Source Serif Pro' => 'Source Serif Pro',
				'Merriweather'     => 'Merriweather',
				'Lora'             => 'Lora',
			),
		)
	);

	$wp_customize->add_setting(
		'body_alt_font',
		array(
			'default'           => 'IBM Plex Sans',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'body_alt_font',
		array(
			'type'    => 'select',
			'section' => 'typography',
			'label'   => __( 'Body font alternative (Sans serif)', 'zuari' ),
			'choices' => array(
				'IBM Plex Sans'   => 'IBM Plex Sans',
				'Source Sans Pro' => 'Source Sans Pro',
				'Poppins'         => 'Poppins',
				'Rubik'           => 'Rubik',
			),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.header__title a',
				'render_callback' => 'zuari_customize_partial_blogname',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.header__description',
				'render_callback' => 'zuari_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'zuari_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function zuari_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function zuari_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zuari_customize_preview_js() {
	wp_enqueue_script( 'zuari-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), 'zuari', true );
}
add_action( 'customize_preview_init', 'zuari_customize_preview_js' );

/**
 * Render the header in the correct background color.
 *
 * @return void
 */
function zuari_header_bgcolor_css() {
	?>
	<meta name="theme-color" content="<?php echo esc_attr( get_theme_mod( 'header_bgcolor', 'eaeaea' ) ); ?>">
	<style media="screen">
		.header {
			background-color: <?php echo esc_attr( get_theme_mod( 'header_bgcolor', 'eaeaea' ) ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'zuari_header_bgcolor_css' );

/**
 * Render the text and links in the correct color.
 *
 * @return void
 */
function zuari_fgcolor_css() {
	?>
	<style media="screen">
		:root {
			--fg-color: <?php echo esc_attr( get_theme_mod( 'fgcolor', '#000000' ) ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'zuari_fgcolor_css' );

/**
 * Override the colors and add the dark mode CSS class if enabled
 *
 * @return void
 */
function zuari_dark_mode() {
	if ( get_theme_mod( 'enable_darkmode' ) === '1' ) {
		$dark_bg = get_theme_mod( 'dark_mode_background', '#222222' );
		$dark_text = get_theme_mod( 'dark_mode_text', '#bdc3c7' );
		?>
			<style media="screen">
			:root.dark-mode,
			@media (prefers-color-scheme: dark) {
				:root:not(.light-mode) {
					--bg-color: <?php echo esc_attr( $dark_bg ); ?>;
					--fg-color: <?php echo esc_attr( $dark_text ); ?>;
					--header-bg: <?php echo esc_attr( adjust_brightness( $dark_bg, 10 ) ); ?>;
				}

				body.custom-background {
					background-color: var(--bg-color) !important;
				}

				.header {
					background-color: var(--header-bg) !important;
				}
			}
			</style>
		<?php
	}
}
add_action( 'wp_head', 'zuari_dark_mode' );

/**
 * Adjust color brightness for dark mode variations
 */
function adjust_brightness( $hex, $steps ) {
	$steps = max( -255, min( 255, $steps ) );
	$hex = str_replace( '#', '', $hex );

	if ( strlen( $hex ) === 3 ) {
		$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) .
		       str_repeat( substr( $hex, 1, 1 ), 2 ) .
		       str_repeat( substr( $hex, 2, 1 ), 2 );
	}

	$parts = str_split( $hex, 2 );
	$color = array_map( 'hexdec', $parts );

	foreach ( $color as &$c ) {
		$c = max( 0, min( 255, $c + $steps ) );
	}

	return '#' . sprintf( '%02x%02x%02x', $color[0], $color[1], $color[2] );
}

/**
 * Takes the input value and turns it into something we can use reliably.
 *
 * @param boolean $input This is sometimes a boolean and sometimes a string.
 * @return String
 */
function zuari_sanitize_enable_darkmode( $input ) {
	if ( true === $input || '1' === $input ) {
		return '1';
	}
	return '';
}

function zuari_sanitize_float( $input ) {
	return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
}

/**
 * Render the spacing settings
 */
function zuari_spacing_settings() {
	$content_width = get_theme_mod( 'content_width', 680 );
	$line_height = get_theme_mod( 'line_height', 1.6 );
	$font_size_base = get_theme_mod( 'font_size_base', 18 );

	?>
	<style media="screen">
		:root {
			--content-width: <?php echo esc_attr( $content_width ); ?>px;
			--line-height: <?php echo esc_attr( $line_height ); ?>;
			--font-size-base: <?php echo esc_attr( $font_size_base ); ?>px;
		}
		.site-content {
			max-width: var(--content-width);
			margin: 0 auto;
			padding: 0 20px;
		}
		body {
			line-height: var(--line-height);
			font-size: var(--font-size-base);
		}
	</style>
	<?php
}
add_action( 'wp_head', 'zuari_spacing_settings' );

/**
 * Render the selected fonts
 *
 * @return void
 */
function zuari_typography() {
	$mono_font     = get_theme_mod( 'mono_font', 'IBM Plex Mono' );
	$heading_font  = get_theme_mod( 'heading_font', 'IBM Plex Sans Condensed' );
	$body_font     = get_theme_mod( 'body_font', 'IBM Plex Serif' );
	$body_alt_font = get_theme_mod( 'body_alt_font', 'IBM Plex Sans' );

	$mono_font     = '"' . $mono_font . '", "Monaco", "Consolas", monospace;';
	$heading_font  = '"' . $heading_font . '", "Monaco", "Consolas", monospace;, "Roboto Condensed", "HelveticaNeue-CondensedBold", "Tahoma", sans-serif';
	$body_font     = '"' . $body_font . '", "Garamond", "Georgia", serif;';
	$body_alt_font = '"' . $body_alt_font . '", "Helvetica Neue", "Helvetica", "Nimbus Sans L", "Arial", sans-serif;';

	?>
	<style media="screen">
		:root {
			--mono-font: <?php echo $mono_font; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			--heading-font: <?php echo $heading_font; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			--body-font: <?php echo $body_font; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			--body-alt-font: <?php echo $body_alt_font; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'zuari_typography' );
