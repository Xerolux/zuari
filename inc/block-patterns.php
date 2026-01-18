<?php
/**
 * Block Patterns
 *
 * @package zuari
 */

function zuari_register_block_patterns() {
	register_block_pattern_category(
		'zuari',
		array( 'label' => __( 'Zuari', 'zuari' ) )
	);

	register_block_pattern(
		'zuari/hero-with-call-to-action',
		array(
			'title'       => __( 'Hero with Call to Action', 'zuari' ),
			'description' => _x( 'A large hero section with a heading, description, and button.', 'Block pattern description', 'zuari' ),
			'content'     => '<!-- wp:group {"align":"full","style":{"color":{"text":"#000000"},"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"ecru","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-text-color has-background has-ecru-background-color" style="color:#000000;padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Welcome to Zuari</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.5rem"}}} -->
<p style="font-size:1.5rem">A stream of your life. Capture your moments, thoughts, and experiences in beautiful simplicity.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"dark-green","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-dark-green-background-color has-text-color has-background">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
			'categories'  => array( 'zuari' ),
		)
	);

	register_block_pattern(
		'zuari/two-column-text',
		array(
			'title'       => __( 'Two Column Text', 'zuari' ),
			'description' => _x( 'Two columns of text content.', 'Block pattern description', 'zuari' ),
			'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">First Column</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Add your content here. This two-column layout is perfect for comparing ideas, presenting related information, or creating an engaging layout for your readers.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Second Column</h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Add more content here. The columns will stack vertically on mobile devices for better readability and will appear side-by-side on larger screens.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			'categories'  => array( 'zuari' ),
		)
	);

	register_block_pattern(
		'zuari/quote-with-attribution',
		array(
			'title'       => __( 'Quote with Attribution', 'zuari' ),
			'description' => _x( 'A styled quote block with author attribution.', 'Block pattern description', 'zuari' ),
			'content'     => '<!-- wp:quote {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brick"}}},"color":{"text":"#825A58"}},"className":"is-style-large"} -->
<blockquote class="wp-block-quote is-style-large has-text-color" style="color:#825A58"><!-- wp:paragraph -->
<p>The only way to do great work is to love what you do.</p>
<!-- /wp:paragraph -->
<cite>Steve Jobs</cite></blockquote>
<!-- /wp:quote -->',
			'categories'  => array( 'zuari' ),
		)
	);

	register_block_pattern(
		'zuari/image-with-caption',
		array(
			'title'       => __( 'Image with Caption', 'zuari' ),
			'description' => _x( 'An image with a styled caption overlay.', 'Block pattern description', 'zuari' ),
			'content'     => '<!-- wp:group {"align":"wide"} -->
<div class="wp-block-group alignwide"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://via.placeholder.com/1200x800/81AE8A/bdc3c7?text=Image+Placeholder" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->',
			'categories'  => array( 'zuari' ),
		)
	);

	register_block_pattern(
		'zuari/gallery-grid',
		array(
			'title'       => __( 'Gallery Grid', 'zuari' ),
			'description' => _x( 'A grid layout for images.', 'Block pattern description', 'zuari' ),
			'content'     => '<!-- wp:gallery {"linkTo":"none","sizeSlug":"large","className":"columns-3"} -->
<figure class="wp-block-gallery has-nested-images columns-default is-cropped columns-3"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://via.placeholder.com/400x400/BADCE0/283D5D?text=Image+1" alt=""/></figure>
<!-- /wp:image -->
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://via.placeholder.com/400x400/E0BAC0/283D5D?text=Image+2" alt=""/></figure>
<!-- /wp:image -->
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://via.placeholder.com/400x400/E6AA88/283D5D?text=Image+3" alt=""/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery -->',
			'categories'  => array( 'zuari' ),
		)
	);

	register_block_pattern(
		'zuari/simple-footer',
		array(
			'title'       => __( 'Simple Footer', 'zuari' ),
			'description' => _x( 'A simple footer with copyright and links.', 'Block pattern description', 'zuari' ),
			'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"backgroundColor":"dark-blue","textColor":"light-gray"} -->
<div class="wp-block-group alignfull has-light-gray-color has-dark-blue-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><strong>&copy; 2026 Your Site</strong></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Proudly powered by WordPress and Zuari theme.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><strong>Quick Links</strong></p>
<!-- /wp:paragraph --><!-- wp:navigation {"textColor":"light-gray"} -->
<!-- wp:navigation-link {"label":"Home","url":"#"} /-->
<!-- wp:navigation-link {"label":"About","url":"#"} /-->
<!-- wp:navigation-link {"label":"Contact","url":"#"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
			'categories'  => array( 'zuari', 'footer' ),
		)
	);
}
add_action( 'init', 'zuari_register_block_patterns' );
