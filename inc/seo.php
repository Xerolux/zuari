<?php
/**
 * SEO Enhancements
 *
 * @package zuari
 */

function zuari_add_seo_meta_tags() {
	if ( is_singular() ) {
		$title = get_the_title();
		$description = get_the_excerpt() ? wp_trim_words( get_the_excerpt(), 30 ) : get_bloginfo( 'description' );
		$image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		$url = get_permalink();
		$type = is_front_page() ? 'website' : 'article';
		$published_time = get_the_date( 'c' );
		$modified_time = get_the_modified_date( 'c' );
		$author = get_the_author_meta( 'display_name', get_post_field( 'post_author', get_the_ID() ) );
	} else {
		$title = get_bloginfo( 'name' );
		$description = get_bloginfo( 'description' );
		$url = home_url( '/' );
		$type = 'website';
		$image = null;
		$published_time = null;
		$modified_time = null;
		$author = null;
	}

	if ( is_archive() ) {
		$title = post_type_archive_title( '', false ) . ' - ' . get_bloginfo( 'name' );
	}

	if ( is_search() ) {
		$title = __( 'Search Results for: ', 'zuari' ) . get_search_query() . ' - ' . get_bloginfo( 'name' );
	}

	?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">

	<?php if ( $image ) : ?>
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<?php endif; ?>

	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta property="og:type" content="<?php echo esc_attr( $type ); ?>">
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
	<?php if ( $image ) : ?>
	<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
	<?php endif; ?>

	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "<?php echo esc_js( $type ); ?>",
		"name": "<?php echo esc_js( $title ); ?>",
		"description": "<?php echo esc_js( $description ); ?>",
		"url": "<?php echo esc_url( $url ); ?>"
		<?php if ( $published_time ) : ?>
		,"datePublished": "<?php echo esc_js( $published_time ); ?>"
		<?php endif; ?>
		<?php if ( $modified_time ) : ?>
		,"dateModified": "<?php echo esc_js( $modified_time ); ?>"
		<?php endif; ?>
		<?php if ( $author ) : ?>
		,"author": {
			"@type": "Person",
			"name": "<?php echo esc_js( $author ); ?>"
		}
		<?php endif; ?>
		<?php if ( $image ) : ?>
		,"image": "<?php echo esc_url( $image ); ?>"
		<?php endif; ?>
	}
	</script>
	<?php
}
add_action( 'wp_head', 'zuari_add_seo_meta_tags', 5 );

function zuari_add_breadcrumb_schema() {
	if ( ! is_singular() ) {
		return;
	}

	$items = array(
		array(
			'@type' => 'ListItem',
			'position' => 1,
			'name' => get_bloginfo( 'name' ),
			'item' => home_url( '/' ),
		)
	);

	if ( ! is_front_page() ) {
		$items[] = array(
			'@type' => 'ListItem',
			'position' => 2,
			'name' => get_the_title(),
			'item' => get_permalink(),
		);
	}

	?>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "BreadcrumbList",
		"itemListElement": <?php echo wp_json_encode( $items ); ?>
	}
	</script>
	<?php
}
add_action( 'wp_head', 'zuari_add_breadcrumb_schema', 6 );

function zuari_add_canonical_url() {
	if ( is_singular() ) {
		?>
		<link rel="canonical" href="<?php the_permalink(); ?>">
		<?php
	}
}
add_action( 'wp_head', 'zuari_add_canonical_url', 1 );

function zuari_prevent_bad_indexing() {
	if ( is_search() || is_404() ) {
		?>
		<meta name="robots" content="noindex, nofollow">
		<?php
	}
}
add_action( 'wp_head', 'zuari_prevent_bad_indexing', 1 );
