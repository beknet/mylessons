<?php
 /*Template Name: Bekpost single page
 */
get_header(); ?>


<?php
$mypost = array( 'post_type' => 'bek_posts', );
$loop = new WP_Query( $mypost );

//var_dump($maker_one);
?>
<?php /*while ( $loop->have_posts() ) : $loop->the_post();*/?>

<section id="main" class="col-sm-12 col-md-12 full-width" role="main">

  <h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
  <!-- CONTENT HOTEL -->
  <div class="col-sm-12 col-md-6">
    <div class="row">

      <div class="bek-hotel-gallery">
        <div class="grosse-photo">
          <a class="example-image-link" href="<?=wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );?>" data-lightbox="<?=the_title();?>" alt="<?=the_title();?>">
            <?php the_post_thumbnail( 'large' ); ?>
          </a>
        </div>
        <div class="clearfix"></div>
        <ul class="bek-hotel-gallery-tumbnull">
          <li>
            <a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject1', true ) ); ?>"
               class="example-image-link" data-lightbox="<?=the_title();?>" alt="<?=the_title();?>">
              <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject1', true ) ); ?>" class="" />
            </a>
          </li>
          <li>
            <a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject2', true ) ); ?>"
               class="example-image-link" data-lightbox="<?=the_title();?>" alt="<?=the_title();?>">
              <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject2', true ) ); ?>" class="" />
            </a>
          </li>
          <li>
            <a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject3', true ) ); ?>"
               class="example-image-link" data-lightbox="<?=the_title();?>" alt="<?=the_title();?>">
              <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject3', true ) ); ?>" class="" />
            </a>
          </li>
          <li>
            <a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject4', true ) ); ?>"
               class="example-image-link" data-lightbox="<?=the_title();?>" alt="<?=the_title();?>">
              <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject4', true ) ); ?>" class="" />
            </a>
          </li>
          <li>
            <a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject5', true ) ); ?>"
               class="example-image-link" data-lightbox="<?=the_title();?>" alt="<?=the_title();?>">
              <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject5', true ) ); ?>" class="" />
            </a>
          </li>
          <li>
            <a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject6', true ) ); ?>"
               class="example-image-link" data-lightbox="<?=the_title();?>" alt="<?=the_title();?>">
              <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject6', true ) ); ?>" class="" />
            </a>
          </li>
        </ul>
      </div>

    </div>
  </div>
  <div class="col-sm-12 col-md-6">
    <div class="row">
      <div itemprop="description" class="description">
        <div class="column-12 widget-column non-margin-bottom-5">
          <div class="pb-widget-inner">

            <?php echo get_post_field('post_content', get_the_ID()); ?>

          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="product_meta">

      </div>
      <!-- start plugin bekcontactinfo -->
      <?php echo do_shortcode( '[shortcode_wooc_bekcontactinfo]' ); ?><!-- //plugin bekcontactinfo -->
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="clear-margin-botton-30"></div><!-- end content hotel -->

  <!-- INFO HOTEL -->
  <div class="col-sm-12 col-md-6" id="tab-description-right">
    <div class="row">
      <h2>שירותי המלון</h2>

      <?php echo get_post_meta( get_the_ID(), 'contentservice', true ); ?>
    </div>
  </div>
  <div class="col-sm-12 col-md-6" id="tab-description-left">

    <?php if( get_post_meta( get_the_ID(), 'photoproject7', true ) ){ ?>

    <img src="<?php echo esc_html( get_post_meta( get_the_ID(), 'photoproject7', true ) ); ?>" class="" />

    <?php } ?>
    <?php
      if( get_post_meta( get_the_ID(), 'contentplus', true ) ){

        echo get_post_meta( get_the_ID(), 'contentplus', true );

      }
    ?>

  </div>
  <div class="clearfix"></div>
  <div class="clear-margin-botton-30"></div><!-- end info hotel -->

  <!-- INFO ROOM -->
  <?php if( get_post_meta( get_the_ID(), 'contentother', true ) ){ ?>

  <div class="col-sm-12 col-md-12 contentother">
    <div class="row">
      <h2>חדרי המלון</h2>

      <?php echo get_post_meta( get_the_ID(), 'contentother', true ); ?>

    </div>
  </div>
  <div class="clearfix"></div>
  <div class="clear-margin-botton-30"></div><!-- end info room -->

  <?php } //end $contentother ?>

</section>

<footer>
  <?php pojo_button_post_edit(); ?>
</footer>


<?php
  // Previous/next post navigation.
  // echo pojo_get_post_navigation(
  //     array(
  //         'prev_text' => __( '&laquo; Previous', 'pojo' ),
  //         'next_text' => __( 'Next &raquo;', 'pojo' ),
  //     )
  // );
?>
<?php //endwhile; ?>


<?php get_footer(); ?>
