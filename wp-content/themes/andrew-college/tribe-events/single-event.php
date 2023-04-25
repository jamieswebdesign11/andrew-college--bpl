<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<!-- Notices -->
	<?php tribe_the_notices() ?>
	<div class="head-of-single flex-display-align">
		<div class="flex-col">
			<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>
		</div>
	</div>
	
	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<nav class="tribe-events-nav-pagination" aria-label="<?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?>">
			<ul class="tribe-events-sub-nav">
				<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
				<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
			</ul>
			<!-- .tribe-events-sub-nav -->
		</nav>
	</div>
	<!-- #tribe-events-header -->
	 
	<?php while ( have_posts() ) :  the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="flex-display">
			<div class="event-details">
				<div class="flex-col flex-display meta">
					<div class="flex-col"><?php tribe_get_template_part( 'modules/meta/venue' ); ?></div>
					<div class="flex-col"><?php tribe_get_template_part( 'modules/meta/details' ); ?></div>
					<div class="flex-col"><?php tribe_get_template_part( 'modules/meta/organizer' ); ?></div>
				</div>
			</div>
		</div>
		<?php if (!empty(get_the_content())): ?> 
			<div class="flex-display map-img-wrapper">
			<?php $image = tribe_event_featured_image( $event_id, 'full', false ); ?>
				<div class="flex-col">
				<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
					<div class="tribe-events-single-event-description tribe-events-content">
						<?php if($image):?><div class="tribe-main-image">
							<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
						</div><?php endif;?>
						
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		<?php endif; ?> 
		<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
	</div>
		<?php// do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>
</div><!-- #tribe-events-content -->