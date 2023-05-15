<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider" class="mt-4">
    <div class="container">
      <?php $hotel_booking_lite_slide_pages = array();
        for ( $hotel_booking_lite_count = 1; $hotel_booking_lite_count <= 3; $hotel_booking_lite_count++ ) {
          $hotel_booking_lite_mod = intval( get_theme_mod( 'hotel_booking_lite_top_slider_page' . $hotel_booking_lite_count ));
          if ( 'page-none-selected' != $hotel_booking_lite_mod ) {
            $hotel_booking_lite_slide_pages[] = $hotel_booking_lite_mod;
          }
        }
        if( !empty($hotel_booking_lite_slide_pages) ) :
          $hotel_booking_lite_args = array(
            'post_type' => 'page',
            'post__in' => $hotel_booking_lite_slide_pages,
            'orderby' => 'post__in'
          );
          $hotel_booking_lite_query = new WP_Query( $hotel_booking_lite_args );
          if ( $hotel_booking_lite_query->have_posts() ) :
            $i = 1;
      ?>
      <div class="owl-carousel" role="listbox">
        <?php  while ( $hotel_booking_lite_query->have_posts() ) : $hotel_booking_lite_query->the_post(); ?>
          <div class="slider-box">
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="slider-inner-box">
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <div class="slider-box-btn mt-4">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','hotel-booking-lite'); ?></a>
              </div>
            </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
    </div>
  </section>

  <section id="room_post" class="py-5">
    <div class="container">
      <?php if(get_theme_mod('hotel_booking_lite_popular_room_heading') != ''){ ?>
        <h2 class="text-center mb-4"><?php echo esc_html(get_theme_mod('hotel_booking_lite_popular_room_heading','')); ?></h2>
      <?php }?>
      <?php $hotel_booking_lite_popular_room_post_section = array();
        $popular_room_post_loop = get_theme_mod('hotel_booking_lite_popular_room_post_loop');
        for ($i=1; $i <= $popular_room_post_loop; $i++) {
          $hotel_booking_lite_mod = intval( get_theme_mod( 'hotel_booking_lite_popular_room_post_section' .$i));
          if ( 'page-none-selected' != $hotel_booking_lite_mod ) {
            $hotel_booking_lite_popular_room_post_section[] = $hotel_booking_lite_mod;
          }
        }
        if( !empty($hotel_booking_lite_popular_room_post_section) ) :
        $hotel_booking_lite_args = array(
          'post_type' => 'post',
          'post__in' => $hotel_booking_lite_popular_room_post_section,
          'orderby' => 'post__in'
        );
        $hotel_booking_lite_query = new WP_Query( $hotel_booking_lite_args );
        if ( $hotel_booking_lite_query->have_posts() ) :
          $i = 1;
      ?>
      <div class="row">
        <?php while ( $hotel_booking_lite_query->have_posts() ) : $hotel_booking_lite_query->the_post(); ?>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="popular-room-box">
              <?php if ( has_post_thumbnail() ) { ?><?php hotel_booking_lite_post_thumbnail(); ?><?php }?>
              <?php if( get_post_meta($post->ID, 'hotel_booking_lite_room_rating', true) ) {?>
                <p class="my-2 rating-box"><i class="fas fa-star mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'hotel_booking_lite_room_rating',true)); ?></p>
              <?php }?>
              <h3 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php if( get_post_meta($post->ID, 'hotel_booking_lite_room_address', true) ) {?>
                <p><?php echo esc_html(get_post_meta($post->ID,'hotel_booking_lite_room_address',true)); ?></p>
              <?php }?>
              <?php if( get_post_meta($post->ID, 'hotel_booking_lite_room_price', true) ) {?>
                <span class="price-box mr-3"><?php echo esc_html(get_post_meta($post->ID,'hotel_booking_lite_room_price',true)); ?></span>
              <?php }?>
              <?php if( get_post_meta($post->ID, 'hotel_booking_lite_room_price_discount', true) ) {?>
                <span class="discount-box"><?php echo esc_html(get_post_meta($post->ID,'hotel_booking_lite_room_price_discount',true)); ?></span>
              <?php }?>
            </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
      </div>
    </div>
  </section>

  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
