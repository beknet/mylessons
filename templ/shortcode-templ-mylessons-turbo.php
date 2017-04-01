<?php
 /*Template Name: Bekpost TURBO

 [bek_hotel_turbo catID='10' count='12' grid='3' title='grid4']
 [bek_hotel_turbo catID='10' count='12' grid='' title='grid2']
 [bek_hotel_turbo catID='10' count='12' grid='4' title='grid3']
 [bek_hotel_turbo catID='10' count='' grid='' title='grid default + none count (DEFAULT 12)']
 [bek_hotel_turbo catID='9,10' count='' grid='3' title='grid4 + none count (DEFAULT 12) + array catid']
 [bek_hotel_turbo catID='' count='' grid='6' title='grid2 + none count (DEFAULT 12) + none catid (DEFAULT ALL)']
 [bek_hotel_turbo catID='' count='6' grid='4' title='grid3 + count6 + none catid (DEFAULT ALL)']

 */
global $wpdb;
global $upload_dir;
global $table_bek_project;
global $table_bek_project_cat;
global $post;

# функция получающая данные
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if( $grid == null ){

	$grid = 6;

}

if( $catID !== null && $count !== null ){

	$args = array( 'posts_per_page' => $count,
								 'paged' => $paged,
								 'post_type' => 'bek_posts',
								 'post_status' => 'publish',
								 'tax_query' => array(
								      array(
								        'taxonomy' => 'type_hotels',
								        'field' => 'term_id',
								        'terms' => explode(',',$catID)
								      )
								    ),

								);

	$bek_posts_list = new WP_Query( $args );

}elseif( $catID !== null && $count == null ){

	$args = array( 'posts_per_page' => 12,
								 'paged' => $paged,
								 'post_type' => 'bek_posts',
								 'post_status' => 'publish',
								 'tax_query' => array(
								      array(
								        'taxonomy' => 'type_hotels',
								        'field' => 'term_id',
								        'terms' => explode(',',$catID)
								      )
								    ),
								);

	$bek_posts_list = new WP_Query( $args );

}elseif( $catID == null && $count == null ){

	$args = array( 'posts_per_page' => 12,
								 'paged' => $paged,
								 'post_type' => 'bek_posts',
								 'post_status' => 'publish',
								);

	$bek_posts_list = new WP_Query( $args );

}elseif( $catID == null && $count !== null ){

	$args = array( 'posts_per_page' => $count,
								 'paged' => $paged,
								 'post_type' => 'bek_posts',
								 'post_status' => 'publish',
								);

	$bek_posts_list = new WP_Query( $args );

}

//var_dump($bek_posts_list);
?>

<div class="container-fluid" style="margin-bottom:10px;">
	<div class="row">
		
		<?php //if($title): ?>
		<header class="page-title">
	    <h1 style="color:#C40922;"><?=$title;?></h1>
	  </header>
	<?php //endif; ?>

		<?php

		  if ( $bek_posts_list->have_posts() ) :

		  	while ( $bek_posts_list->have_posts() ) : $bek_posts_list->the_post();

		?>

			<div class="col-md-<?=$grid;?> oneproj">
				<div class="bekproject_onecat" style="<?php if($grid == 3){ echo 'height: 115px;'; }elseif($grid == 4){ echo 'height: 160px;'; } ?>">
					<a href="<?=get_permalink($bek_posts_list->ID);?>" title="<?=the_title();?>">
						<?php echo get_the_post_thumbnail($bek_posts_list->ID, array( 470, 100 ) ); ?>
					</a>
				</div>
				<div class="overflow_onecat">
					<h3 class="text-center">
						<a href="<?=get_permalink($bek_posts_list->ID);?>" title="<?=the_title();?>"><?=the_title();?></a>
					</h3>

				</div>
			</div>

		<?php

		    endwhile;

		  endif; // end foreach($allcat as $allcat)

		?>
		<div class="clearfix"></div>
	</div>
</div>

<?php wp_reset_query(); ?>