<?php
/* Install functions plugin
============================================================*/
add_action( 'admin_init', 'mylessons_admin' );
function mylessons_admin() {
  add_meta_box( 'mylessons_info_meta_box',
    'Информация по mylessons',
    'display_mylessons_info_meta_box',
    'mylessons', 'normal', 'high'
  );
}

function display_mylessons_info_meta_box( $mylessons ) {
  // Retrieve current name of the Director and Movie Rating based on review ID
  $prod_shearhe = intval( get_post_meta( $mylessons->ID, 'magazin_shearhe', true ) );
  $prod_data = esc_html( get_post_meta( $mylessons->ID, 'magazin_data', true ) );
  $prod_time = esc_html( get_post_meta( $mylessons->ID, 'magazin_time', true ) );
  $prod_price = intval( get_post_meta( $mylessons->ID, 'magazin_price', true ) );
  $prod_autor = esc_html( get_post_meta( $mylessons->ID, 'magazin_autor', true ) );
  $prod_info = get_post_meta( $mylessons->ID, 'magazin_info', true );
  $prod_paylink = esc_html( get_post_meta( $mylessons->ID, 'magazin_paylink', true ) );
?>

<div class="atmb-wrap-fields">
	<div class="atmb-field-row atmb-title" style="display: block;">
		<div class="atmb-label">
			<label for="atmb-id-14">Доступность товара к продажи:</label>
		</div>
		<div class="atmb-input">
			<?php //var_dump($prod_shearhe);?>
			<select id="atmb-id-10" class="atmb-field-select" name="magazin_shearhe">
			<?php
				switch ($prod_shearhe) {
						case '0':
							# code...
							$checkbox_car_sold = '';
							break;
						case '1':
							# code...
							$checkbox_car_sold_1 = 'selected';
							break;
						default:
							# code...
							break;
				}


			?>

				<option value="0" <?=$checkbox_car_sold;?> >Показывать</option>
				<option value="1" <?=$checkbox_car_sold_1;?> >Скрыть</option>
			</select>
		</div>
	</div>
  <div class="atmb-field-row atmb-title" style="display: block;">
      <div class="atmb-label">
          <label for="atmb-id-14">Дата:</label>
      </div>
      <div class="atmb-input">
          <input type="text" class="atmb-field-text large-text" size="80" name="magazin_data" value="<?php echo $prod_data; ?>" />
      </div>
  </div>
  <div class="atmb-field-row atmb-title" style="display: block;">
      <div class="atmb-label">
          <label for="atmb-id-14">Время:</label>
      </div>
      <div class="atmb-input">
          <input type="text" class="atmb-field-text large-text" size="80" name="magazin_time" value="<?php echo $prod_time; ?>" />
      </div>
  </div>
	<div class="atmb-field-row atmb-title" style="display: block;">
		<div class="atmb-label">
			<label for="atmb-id-14">Стоимость (USD):</label>
		</div>
		<div class="atmb-input">
			<input type="text" class="atmb-field-text large-text" size="80" name="magazin_price" value="<?php echo $prod_price; ?>" />
		</div>
	</div>
	<div class="atmb-field-row atmb-title" style="display: block;">
		<div class="atmb-label">
			<label for="atmb-id-14">Автор курса</label>
		</div>
		<div class="atmb-input">
			<input type="text" class="atmb-field-text large-text" size="80" name="magazin_autor" value="<?php echo $prod_autor; ?>" />
		</div>
	</div>
	<div class="atmb-field-row atmb-title" style="display: block;">
		<div class="atmb-label">
			<label for="atmb-id-14">Ссылка на оформление заказа:</label>
		</div>
		<div class="atmb-input">
			<input type="text" class="atmb-field-text large-text" size="80" name="magazin_paylink" value="<?php echo $prod_paylink; ?>" />
		</div>
	</div>
	<div class="atmb-field-row atmb-title" style="display: block;">
		<div class="atmb-label">
			<label for="atmb-id-14">Краткое описание:</label>
		</div>
		<div class="atmb-input">
			<!-- <input type="text" class="atmb-field-text large-text" size="80" name="magazin_info" value="<?php echo $prod_info; ?>" /> -->
			<?php wp_editor($prod_info,'magazin_info'); ?>
		</div>
	</div>
</div> <!-- //.atmb-wrap-fields -->

<?php
}

add_action( 'save_post', 'add_bek_magazin_fields', 10, 2 );
function add_bek_magazin_fields( $bek_magazin_id, $bek_magazin ) {
  // Check post type for movie reviews
  if ( $bek_magazin->post_type == 'mylessons' ) {
    // Store data in post meta table if present in post data
    if ( isset( $_POST['magazin_shearhe'] ) && $_POST['magazin_shearhe'] != '' ) {
      update_post_meta( $bek_magazin_id, 'magazin_shearhe', $_POST['magazin_shearhe'] );
    }
    if ( isset( $_POST['magazin_data'] ) && $_POST['magazin_data'] != '' ) {
      update_post_meta( $bek_magazin_id, 'magazin_data', $_POST['magazin_data'] );
    }
    if ( isset( $_POST['magazin_time'] ) && $_POST['magazin_time'] != '' ) {
      update_post_meta( $bek_magazin_id, 'magazin_time', $_POST['magazin_time'] );
    }
    if ( isset( $_POST['magazin_price'] ) && $_POST['magazin_price'] != '' ) {
      update_post_meta( $bek_magazin_id, 'magazin_price', $_POST['magazin_price'] );
    }
    if ( isset( $_POST['magazin_autor'] ) && $_POST['magazin_autor'] != '' ) {
      update_post_meta( $bek_magazin_id, 'magazin_autor', $_POST['magazin_autor'] );
    }
    if ( isset( $_POST['magazin_info'] ) && $_POST['magazin_info'] != '' ) {
      update_post_meta( $bek_magazin_id, 'magazin_info', $_POST['magazin_info'] );
    }
    if ( isset( $_POST['magazin_paylink'] ) && $_POST['magazin_paylink'] != '' ) {
      update_post_meta( $bek_magazin_id, 'magazin_paylink', $_POST['magazin_paylink'] );
    }
  }
}

/*
 * STYLE PLUGIN IN ADMIN
 ===================================*/
add_action('admin_print_styles', 'do2_css' );
function do2_css(){
    wp_register_style( 'bekmagazin-mainstyle', plugins_url('/css/main.css', __FILE__) );
    wp_enqueue_style( 'bekmagazin-mainstyle' );
}