<?php
/**
 * Edit Nav Menu
 */
add_filter( 'wp_setup_nav_menu_item', 'arangi_setup_custom_nav_fields'  );
add_action( 'wp_update_nav_menu_item', 'arangi_update_custom_nav_fields' , 10, 2 );
add_filter( 'wp_edit_nav_menu_walker', 'arangi_replace_walker_class' , 90, 2 );
add_action( 'wp_nav_menu_item_custom_fields', 'arangi_nav_menu_item_custom_fields' , 99, 4 );
add_filter( 'nav_menu_css_class', 'arangi_add_current_url_menu_class', 10, 3 );
/** 
* Fixed: wrong active menu item. 
*/
function arangi_add_current_url_menu_class( $classes = array(), $item = false ) {
  // Get current URL
	global $wp;
	$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
  	// Get homepage URL
 	$homepage_url = trailingslashit( home_url('/') );
  // Exclude 404 and homepage
  	if( is_404() or $item->url == $homepage_url ){
    	return $classes;
  	}
    unset($classes[array_search('current_page_parent',$classes)]);
    if($item->url && !empty($item->url)) {
      	if ( strstr( $current_url, $item->url) ){
        	$classes[] = 'current-menu-item';
      	}
    }
  	return $classes;
}
/**
 * Setup custom menu item fields before output.
 */
function arangi_setup_custom_nav_fields( $menu_item ) {
	$menu_item->arangi_mega_menu_iconfont = get_post_meta( $menu_item->ID, '_menu_item_arangi_mega_menu_iconfont', true );
	$menu_item->arangi_mega_menu_iconfont_position = get_post_meta( $menu_item->ID, '_menu_item_arangi_mega_menu_iconfont_position', true );
	$menu_item->arangi_mega_menu_iconfont_color = get_post_meta( $menu_item->ID, '_menu_item_arangi_mega_menu_iconfont_color', true );
	$menu_item->tip_label = get_post_meta( $menu_item->ID, '_menu_item_tip_label', true );
    $menu_item->tip_color = get_post_meta( $menu_item->ID, '_menu_item_tip_color', true );
    $menu_item->tip_bg = get_post_meta( $menu_item->ID, '_menu_item_tip_bg', true );
	// First level & Mega menu
	$menu_item->arangi_mega_menu_enabled = (bool) get_post_meta( $menu_item->ID, '_menu_item_arangi_mega_menu_enabled', true );
	$menu_item->arangi_mega_menu_fullwidth = (bool) get_post_meta( $menu_item->ID, '_menu_item_arangi_mega_menu_fullwidth', true );
	$menu_item->choose_mega_menu = get_post_meta( $menu_item->ID, '_choose_mega_menu_key', true );
// Second level & Third level
	$menu_item->arangi_menu_hide_title = (bool) get_post_meta( $menu_item->ID, '_menu_item_arangi_menu_hide_title', true );
	$menu_item->arangi_menu_remove_link = (bool) get_post_meta( $menu_item->ID, '_menu_item_arangi_menu_remove_link', true );	
	$menu_item->arangi_menu_start_row = (bool) get_post_meta( $menu_item->ID, '_menu_item_arangi_menu_start_row', true );	
	$menu_item->arangi_mega_menu_block = get_post_meta( $menu_item->ID, '_menu_item_arangi_mega_menu_block', true );	
	return $menu_item;
}

/**
 * Update custom menu item fields.
 */
function arangi_update_custom_nav_fields( $menu_id, $menu_db_id ) {
	if ( ! empty( $_POST['menu-item-iconfont'][ $menu_db_id ] )) {
		update_post_meta( $menu_db_id, '_menu_item_arangi_mega_menu_iconfont', $_POST['menu-item-iconfont'][ $menu_db_id ]  );
	} else {
		delete_post_meta( $menu_db_id, '_menu_item_arangi_mega_menu_iconfont' );
	}
    $check = array('tip_label', 'tip_color', 'tip_bg','arangi_mega_menu_block','arangi_menu_remove_link','arangi_menu_start_row', 'arangi_mega_menu_iconfont_position','arangi_mega_menu_iconfont_color');

    foreach ( $check as $key ) {
        if (isset($_POST['menu-item-'.$key][$menu_db_id])){
            update_post_meta( $menu_db_id, '_menu_item_'.$key, $_POST['menu-item-'.$key][$menu_db_id]);
        }
        else{
            delete_post_meta( $menu_db_id, '_menu_item_'.$key );
        }
    }
	$mega_menu_enabled = isset( $_POST['menu-item-arangi-enable-mega-menu'][ $menu_db_id ] );
	if ( $mega_menu_enabled ) {
		update_post_meta( $menu_db_id, '_menu_item_arangi_mega_menu_enabled', 'on' );
	} else {
		delete_post_meta( $menu_db_id, '_menu_item_arangi_mega_menu_enabled' );
	}

	if ( $mega_menu_enabled && isset( $_POST['menu-item-arangi-fullwidth-menu'][ $menu_db_id ] ) ) {
		update_post_meta( $menu_db_id, '_menu_item_arangi_mega_menu_fullwidth', 'on' );
	} else {
		delete_post_meta( $menu_db_id, '_menu_item_arangi_mega_menu_fullwidth' );
	}
	/* choose mega menu*/
	if ( $mega_menu_enabled && ! empty( $_POST['choose-mega-menu'][ $menu_db_id ] ) ) {
		update_post_meta( $menu_db_id, '_choose_mega_menu_key', absint( $_POST['choose-mega-menu'][ $menu_db_id ] ) );
	} else {
		delete_post_meta( $menu_db_id, '_choose_mega_menu_key' );
	}
	//Mega menu background image options
	if ( isset( $_POST['menu-item-arangi-hide-title'][ $menu_db_id ] ) ) {
		update_post_meta( $menu_db_id, '_menu_item_arangi_menu_hide_title', 'on' );
	} else {
		delete_post_meta( $menu_db_id, '_menu_item_arangi_menu_hide_title' );
	}
}
function arangi_replace_walker_class( $walker, $menu_id ) {

	if ( 'Walker_Nav_Menu_Edit' == $walker ) {
		$walker = 'Arangi_Walker_Nav_Menu_Edit';
	}

	return $walker;
}
function arangi_nav_menu_item_custom_fields( $item_id, $item, $depth, $args ) {
	// set default item fields
	$default_mega_menu_fields = array(
		'arangi_mega_menu_iconfont' => '',
		'arangi_mega_menu_enabled' => 0,
		'arangi_mega_menu_fullwidth' => 0,
		'tip_color' => '',
		'tip_label' => '',
		'tip_bg' => '',
		'arangi_mega_menu_block'=> '',
		'arangi_menu_hide_title' => 0,
		'choose_mega_menu' => '0',
	);
	// set defaults
	foreach ( $default_mega_menu_fields as $field=>$value ) {
		if ( !isset($item->$field) ) {
			$item->$field = $value;
		}
	}
	$mega_menu_container_classes = array( 'arangi-mega-menu-fields' );
	$mega_menu_container_classes = implode( ' ', $mega_menu_container_classes );
	?>
	<div class="<?php echo esc_attr( $mega_menu_container_classes ); ?>">
		<p class="field-arangi-iconfont description description-wide">
			<label>
				<?php echo esc_html__('Icon Font Class','arangi'); ?><br />
	            <input type="text" id="edit-menu-item-iconfont-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-iconfont"
	                <?php if (esc_attr( $item->arangi_mega_menu_iconfont )) : ?>
	                    name="menu-item-iconfont[<?php echo esc_attr($item_id); ?>]"
	                <?php endif; ?>
	                   data-name="menu-item-iconfont[<?php echo esc_attr($item_id); ?>]"
	                   value="<?php echo esc_attr( $item->arangi_mega_menu_iconfont ); ?>" />				
			</label>
		</p>
		<p class="description description-wide">
			<?php echo esc_html__('Icon Position: ','arangi'); ?>
			<select name="menu-item-arangi_mega_menu_iconfont_position[<?php echo esc_attr($item_id); ?>]" id="edit-menu-item-arangi_mega_menu_iconfont_position-<?php echo esc_attr($item_id); ?>">
				<?php 
				$arangi_menu_icon_pos = array( 
					esc_html__('left','arangi') => 'left',
					esc_html__('top','arangi') => 'top', 
				);
				foreach( $arangi_menu_icon_pos as $title=>$value): ?>
					<option value="<?php echo esc_attr($value); ?>" <?php selected($value, $item->arangi_mega_menu_iconfont_position); ?>><?php echo esc_html($title); ?></option>
				<?php endforeach; ?>
			</select>
		</p>	
		<p class="description description-wide">
			<?php echo esc_html__('Icon Color: ','arangi'); ?>
			<input type="text" id="edit-menu-item-arangi_mega_menu_iconfont_color-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-arangi_mega_menu_iconfont_color"
		                <?php if (esc_attr( $item->arangi_mega_menu_iconfont_color )) : ?>
		                    name="menu-item-arangi_mega_menu_iconfont_color[<?php echo esc_attr($item_id); ?>]"
		                <?php endif; ?>
		                   data-name="menu-item-arangi_mega_menu_iconfont_color[<?php echo esc_attr($item_id); ?>]"
		                   value="<?php echo esc_attr( $item->arangi_mega_menu_iconfont_color ); ?>" />
		</p>		
		<div class="menu-tip-fields description-wide">
		    <p class="description col-1">
		        <label for="edit-menu-item-tip_label-<?php echo esc_attr($item_id); ?>">
		            <?php echo esc_html__('Tip Label','arangi'); ?><br />
		            <input type="text" id="edit-menu-item-tip_label-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-tip_label"
		                <?php if (esc_attr( $item->tip_label )) : ?>
		                    name="menu-item-tip_label[<?php echo esc_attr($item_id); ?>]"
		                <?php endif; ?>
		                   data-name="menu-item-tip_label[<?php echo esc_attr($item_id); ?>]"
		                   value="<?php echo esc_attr( $item->tip_label ); ?>" />
		        </label>
		    </p>
		    <p class="description col-2">
		        <label for="edit-menu-item-tip_color-<?php echo esc_attr($item_id); ?>">
		            <?php echo esc_html__('Tip Text Color','arangi'); ?><br />
		            <input type="text" id="edit-menu-item-tip_color-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-tip_color"
		                <?php if (esc_attr( $item->tip_color )) : ?>
		                    name="menu-item-tip_color[<?php echo esc_attr($item_id); ?>]"
		                <?php endif; ?>
		                   data-name="menu-item-tip_color[<?php echo esc_attr($item_id); ?>]"
		                   value="<?php echo esc_attr( $item->tip_color ); ?>" />
		        </label>
		    </p>
		    <p class="description">
		        <label for="edit-menu-item-tip_bg-<?php echo esc_attr($item_id); ?>">
		            <?php echo esc_html__('Tip BG Color','arangi'); ?><br />
		            <input type="text" id="edit-menu-item-tip_bg-<?php echo esc_attr($item_id); ?>" class="widefat code edit-menu-item-tip_bg"
		                <?php if (esc_attr( $item->tip_bg )) : ?>
		                    name="menu-item-tip_bg[<?php echo esc_attr($item_id); ?>]"
		                <?php endif; ?>
		                   data-name="menu-item-tip_bg[<?php echo esc_attr($item_id); ?>]"
		                   value="<?php echo esc_attr( $item->tip_bg ); ?>" />
		        </label>
		    </p>
		</div>	    
		<!-- Mega menu in first level -->
		<div class="arangi-mega-menu-fist-lev description-wide">
			<p class="field-arangi-enable-mega-menu">
				<label for="edit-menu-item-arangi-enable-mega-menu-<?php echo esc_attr($item_id); ?>">
					<input id="edit-menu-item-arangi-enable-mega-menu-<?php echo esc_attr($item_id); ?>" type="checkbox" class="edit-menu-item-use_megamenu" name="menu-item-arangi-enable-mega-menu[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->arangi_mega_menu_enabled ); ?>/>
					<?php echo esc_html__('Enable Mega Menu','arangi'); ?>
				</label>
			</p>
			<p class="field-arangi-fullwidth-menu">
				<label for="edit-menu-item-arangi-fullwidth-menu-<?php echo esc_attr($item_id); ?>">
					<input id="edit-menu-item-arangi-fullwidth-menu-<?php echo esc_attr($item_id); ?>" type="checkbox" name="menu-item-arangi-fullwidth-menu[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->arangi_mega_menu_fullwidth ); ?>/>
					<?php echo esc_html__('Fullwidth','arangi'); ?>
				</label>
			</p>
            <!--Choose mega menu-->
            <p class="description description-wide">
                <label> <?php echo esc_html__('Choose Mega Menu: ','arangi'); ?></label>
                <select name="choose-mega-menu[<?php echo esc_attr($item_id); ?>]" id="edit-choose-mega-menu-<?php echo esc_attr($item_id); ?>">
                    <?php foreach (arangi_get_save_template() as $key => $value):?>
                        <option value="<?php echo esc_attr($key)?>"  <?php selected($key, $item->choose_mega_menu); ?>><?php echo esc_html($value);?></option>
                    <?php endforeach;?>
                </select>
            </p>

			<div class="field-arangi-menu-background-image">
				<p class="field-arangi-hide-menu-title">
					<label for="edit-menu-item-arangi-hide-title-<?php echo esc_attr($item_id); ?>">
						<input id="edit-menu-item-arangi-hide-title-<?php echo esc_attr($item_id); ?>" type="checkbox" name="menu-item-arangi-hide-title[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->arangi_menu_hide_title ); ?>/>
						<?php echo esc_html__( 'Hide Menu Title', 'arangi' ); ?>
					</label>
				</p>
				<p class="field-arangi_menu_remove_link">
					<label for="edit-menu-item-arangi_menu_remove_link-<?php echo esc_attr($item_id); ?>">
						<input id="edit-menu-item-arangi_menu_remove_link-<?php echo esc_attr($item_id); ?>" type="checkbox" class="edit-menu-item-use_megamenu" name="menu-item-arangi_menu_remove_link[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->arangi_menu_remove_link ); ?>/>
						<?php echo esc_html__('Remove link','arangi'); ?>
					</label>
				</p>													        
			</div>
		</div>
		<div class="arangi-mega-menu-second-lev">
			<p class="field-arangi_menu_start_row">
				<label for="edit-menu-item-arangi_menu_start_row-<?php echo esc_attr($item_id); ?>">
					<input id="edit-menu-item-arangi_menu_start_row-<?php echo esc_attr($item_id); ?>" type="checkbox" class="edit-menu-item-use_megamenu" name="menu-item-arangi_menu_start_row[<?php echo esc_attr($item_id); ?>]" <?php checked( $item->arangi_menu_start_row ); ?>/>
					<?php echo esc_html__('Start new row','arangi'); ?>
				</label>
			</p>			
		</div>

	</div>
	<!-- Mega Menu End -->
	<?php
}
?>