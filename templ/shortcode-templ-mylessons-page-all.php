<?php
/** Plugin groupBek
    shortcode page global (select)
*/
$mypost = array( 'post_type' => 'bek_posts', );
$loop = new WP_Query( $mypost );

//var_dump($maker_one);
?>
<?php while ( $loop->have_posts() ) : $loop->the_post();?>

<section id="main" class="col-sm-12 col-md-12 full-width" role="main">

  <!-- CONTENT HOTEL -->
  <div class="col-sm-12 col-md-3">
    <div class="row">
    	<a class="example-image-link" href="<?=wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );?>" data-lightbox="<?=the_title();?>" alt="<?=the_title();?>">
        <?php the_post_thumbnail( 'large' ); ?>
      </a>
    </div>
  </div>
  <div class="col-sm-12 col-md-9">
    <div class="row">
      <div itemprop="description" class="description">
        <div class="column-12 widget-column non-margin-bottom-5">
          <div class="pb-widget-inner">
						<h3 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h3>
            <?php po_print_archive_excerpt(get_the_ID()); ?>
						<p class="pull-right"><?php po_print_archive_readmore(get_the_ID()); ?></p>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="clear-margin-botton-30"></div><!-- end content hotel -->

</section>


<?php
  // Previous/next post navigation.
  // echo pojo_get_post_navigation(
  //     array(
  //         'prev_text' => __( '&laquo; Previous', 'pojo' ),
  //         'next_text' => __( 'Next &raquo;', 'pojo' ),
  //     )
  // );
?>
<?php endwhile; ?>