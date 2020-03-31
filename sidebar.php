<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div id="secondary">


	<?php if ( is_active_sidebar( 'sidebar-principal' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-principal' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>

</div><!-- #secondary -->