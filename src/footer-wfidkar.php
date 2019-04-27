<?php
/**
* The template for displaying the footer with iframe fidkar (yellow bg).
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package MBP Bartoszyce
* @since 0.1.0
*/
?>
<footer class="clear-both fidkar-white">
  <?php
  /* ====================
  * Section - contact  *
  * ===================*/
  get_template_part('components/features/section', 'contact' );
  ?>
</footer>
<?php
/* ====================
* Section - partners *
* ===================*/
if (get_theme_mod('wpg_partners_active', false) === true) {
  get_template_part('components/features/section', 'partners' );
}
?>
<div id="copyright" class="col-12 pad-all text-center">
  <?php if (get_theme_mod('wpg_privacy_active', false) === true) :

    $privacy_policy_page = get_option( 'wp_page_for_privacy_policy' );

    ?>
    <span id="cookies-message">
      <?php _e('Our site uses cookies of its own to properly display the page. Third-party cookies may also be locally used on the site. You can disable the use of cookies in your web browser, however, this may make it impossible to use the website! ', 'wpg_theme'); ?>
      <a href="<?php echo ($privacy_policy_page) ? esc_url( get_permalink( $privacy_policy_page ) ) : '#'; ?>"><?php _e('More information in our Privacy Policy regarding cookies.', 'wpg_theme') ?></a>
    </span>
    <hr />
  <?php endif; ?>
  &copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.<?php  _e('All Rights Reserved', 'wpg_theme'); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
