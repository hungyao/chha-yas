<?php
/**
 * Displays the page section of the theme.
 *
 */
?>

<?php get_header(); ?>

<?php
  /**
   * travelify_before_main_container hook
   */
  do_action( 'travelify_before_main_container' );
?>

<script id="profiles" type="text/html" style="display:none">
  <style>
    .profile-container {
      display: inline-block;
      padding: 16px;
    }

    .profile-container a {
      text-decoration: none;
    }

    .profile-container:hover .title,
    .profile-container:hover svg {
      opacity: 1;
    }

    .profile-container svg {
      opacity: .5;
      -webkit-transition: opacity 0.2s ease-in-out;
      -moz-transition: opacity 0.2s ease-in-out;
      transition: opacity 0.2s ease-in-out;
    }

    .profile-container .title {
      display: block;
      text-align: center;
      opacity: 0;
      -webkit-transition: opacity 0.2s ease-in-out;
      -moz-transition: opacity 0.2s ease-in-out;
      transition: opacity 0.2s ease-in-out;
    }
  </style>
  <?php $args = array(
      'post_type' => 'post' ,
      'orderby' => 'date' ,
      'order' => 'DESC' ,
      'posts_per_page' => 50,
      'cat' => '35',
      'paged' => get_query_var('paged'),
      'post_parent' => $parent
  ); ?>
  <?php $q = new WP_Query($args); ?>

  <?php if ($q->have_posts()): ?>
    <?php while ($q->have_posts() ) : $q->the_post(); ?>
      <div class="profile-container">
        <a href="<?php the_permalink() ?>">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 150" xml:space="preserve" width="150px">
            <defs>
              <pattern id="pattern-<?php the_ID(); ?>" height="100%" width="100%"
              patternContentUnits="objectBoundingBox">
                  <image height="1" width="1" preserveAspectRatio="xMidYMid slice" xlink:href="<?php the_post_thumbnail_url('thumbnail'); ?>" />
              </pattern>
            </defs>
            <circle cx="50%" cy="50%" r="50%" fill="url(#pattern-<?php the_ID(); ?>)"/>
          </svg>
          <span class="title"><?php echo trim(array_pop(explode(':', get_the_title()))); ?></span>
        </a>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</script>

<div id="container">
  <?php
    /**
     * travelify_main_container hook
     *
     * HOOKED_FUNCTION_NAME PRIORITY
     *
     * travelify_content 10
     */
    do_action( 'travelify_main_container' );
  ?>
</div><!-- #container -->

<?php
  /**
   * travelify_after_main_container hook
   */
  do_action( 'travelify_after_main_container' );
?>

<?php get_footer(); ?>