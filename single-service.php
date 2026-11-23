<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php $okko_service_slug = sanitize_html_class( get_post_field( 'post_name', get_the_ID() ) ); ?>
	<main class="page">
		<div data-att-<?php echo esc_attr( $okko_service_slug ); ?>="" class="<?php echo esc_attr( $okko_service_slug ); ?>">
			<?php get_template_part( 'template-parts/sections/service-hero' ); ?>
			<div data-att-servicebody="" class="servicebody">
				<?php if ( okko_show( 'service_show_works' ) ) : ?><?php get_template_part( 'template-parts/sections/service-works' ); ?><?php endif; ?>
				<?php get_template_part( 'template-parts/sections/service-sidebar' ); ?>
				<?php if ( okko_show( 'service_show_brands' ) ) : ?><?php get_template_part( 'template-parts/sections/service-brands' ); ?><?php endif; ?>
				<?php if ( okko_show( 'service_show_faq' ) ) : ?><?php get_template_part( 'template-parts/sections/service-faq' ); ?><?php endif; ?>
			</div>
			<?php if ( okko_show( 'service_show_request' ) || okko_show( 'service_show_breakdown' ) ) : ?>
			<div data-att-assist="" class="assist">
				<?php if ( okko_show( 'service_show_request' ) ) : ?><?php get_template_part( 'template-parts/sections/request-form' ); ?><?php endif; ?>
				<?php if ( okko_show( 'service_show_breakdown' ) ) : ?><?php get_template_part( 'template-parts/sections/service-breakdown' ); ?><?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</main>
<?php endwhile; ?>
<?php get_footer(); ?>
