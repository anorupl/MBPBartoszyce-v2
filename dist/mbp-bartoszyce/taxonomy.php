<?php
/**
* The template for displaying taxonomy.
*
* @package MBP Bartoszyce
* @since 0.1.0
*/
get_header(); ?>
<div id="content" class="site-content clear-both">
  <div class="header-content pad-all text-light text-center">
    <div class="class-h2 h--xxl" aria-hidden="true">
      <?php the_archive_title(); ?>
    </div>
    <div id="breadcrumbs" class="a-light a-hover-two">
      <span><?php _e('You are here: &nbsp;', 'wpg_theme'); ?></span>
      <?php if (function_exists('wpg_breadcrumbs')) wpg_breadcrumbs(); ?>
    </div>
  </div><!-- .header-content -->
  <div class="container">
    <div id="primary" class="content-area col-primary hentry-multi gutters">
      <section>
        <?php if (is_tax('clubs') && $paged == 0): $term_object = get_queried_object(); $description = get_term_field( 'description', $term_object->term_id, $term_object->taxonomy ); ?>
          <div id="term_description">
            <div class="desc_header pad-all text-light a-light a-hover-one clear-both">
              <header class="col-9">
                <h2><?php echo $term_object->name ?></h2>
              </header>
              <div class="col-3">
                <?php echo the_term_thumbnail($term_object->term_id); ?>
              </div>
            </div>
            <div class="pad-all">
              <?php echo is_wp_error( $description ) ? '' : $description; ?>
            </div>
          </div><!-- term_description -->
        <?php endif; ?>
        <main id="main" class="site-main ">
          <?php
          if ( have_posts() ):
            
            while ( have_posts() ):
              
              the_post();
              
              get_template_part( 'components/content_multi/content', get_post_format() );
              
            endwhile;
            
            // Previous/next page navigation.
            the_posts_pagination( array(
              'prev_text'          => __( 'Previous page', 'wpg_theme' ),
              'next_text'          => __( 'Next page', 'wpg_theme' ),
              'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
            ));
          else:
            get_template_part( 'components/content_multi/content', 'none' );
          endif;
          ?>
        </main><!-- .site-main -->
      </section>
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
  </div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
