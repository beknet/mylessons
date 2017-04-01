<?php
 /*Template Name: Bekpost Arhive
 */
get_header(); ?>
<style>
	.oneproj .bekproject_onecat{
		height: 130px;
	}
</style>
<div id="page-header"></div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom:40px;">
  <?php if ( pojo_is_show_page_title() ) : ?>
  <header class="page-title">
    <?php
			the_archive_title( '<h1 style="color:#C40922;">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
  </header>
  <?php endif; ?>
  <div class="entry-content">
    <?php if ( ! Pojo_Core::instance()->builder->display_builder() ) : ?>

			<div id="container-fluid">
				<div class="row mobile-row">

					<?php

						if ( have_posts() ) :
						  # code
					?>
							<?php

								while ( have_posts() ) : the_post();

							?>

								<div class="col-md-3 oneproj">
									<div class="bekproject_onecat">
										<a href="<?=get_permalink();?>" title="<?=the_title();?>">
											<?php the_post_thumbnail( 'large' ); ?>
										</a>
									</div>
									<div class="bg-rgba-000">
										<h3><?=the_title();?></h3>
									</div>
								</div>

							<?php

								endwhile;

							?>
				
				</ul> <!-- //.list-bek-cars -->

				<?php

						// next_posts_link( 'עוד רכבים', max_num_pages );
						// previous_posts_link( 'Next Entries &raquo;' );

						wp_reset_postdata();

						endif;

					?>

				</div>
			</div><!-- #container -->

	</div>
</article>
<?php endif; ?>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>