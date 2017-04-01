<?php
/** Plugin groupBek
		shortcode page last posts (select)
*/
global $wpdb;
global $upload_dir;
global $post;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
		'posts_per_page' => 1,
		'paged' => $paged,
    'post_type' => 'bek_posts',
    'post_status' => 'publish',
    'tax_query' => array(
								      array(
								        'taxonomy' => 'type_product',
								        'field' => 'term_id',
								        'terms' => array(explode(',',$catID)),
								      ),
								   ),

    );

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

//var_dump($recent_posts);
?>

<div class="container-fluid" style="margin-bottom:10px;">
	<div class="row">
		<?php

		  foreach($recent_posts as $rec_post){

		  	$carPrice = intval( get_post_meta( $rec_post["ID"], 'car_price', true ) );
		?>

			<div class="col-md-6 oneproj">
				<div class="bekproject_onecat">
					<a href="<?=get_permalink($rec_post["ID"]);?>" title="<?=$rec_post["post_title"];?>">
						<?php echo get_the_post_thumbnail($rec_post["ID"], array( 470, 100 ) ); ?>
					</a>
				</div>
				<div class="overflow_onecat">
					<h3 class="text-center">
						<a href="<?=get_permalink($rec_post["ID"]);?>" title="<?=$rec_post["post_title"];?>"><?=$rec_post["post_title"];?></a>
					</h3>

					<?php if($carPrice != 0){ ?>

						<p class="price"><?=$carPrice;?> ש״ח</p>

					<?php } ?>

				</div>
			</div>

		<?php

		    } // end foreach($allcat as $allcat)

		?>
		<div class="clearfix"></div>
	</div>
</div>
