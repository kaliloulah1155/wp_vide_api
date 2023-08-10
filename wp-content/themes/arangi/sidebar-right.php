<?php
$get_right_sidebar = Arangi_Global::get_right_sidebar();
if ( $get_right_sidebar  !== 'none' && $get_right_sidebar != ''):?>
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 right-sidebar active-sidebar">
		<div class="sticky-sidebar">
			<?php dynamic_sidebar($get_right_sidebar); ?>
		</div>	
    </div>
<?php endif;?>