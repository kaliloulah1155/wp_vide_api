<?php
/**
 * Custom search form
 */

 ?>

 <form role="search" method="get" class="form-inline my-2 my-lg-0 " action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'aquila' ); ?></span>
            <input class="form-control mr-sm-2 " type="search" placeholder="<?php echo esc_attr_x( 'Recherche', 'placeholder', 'aquila' ); ?>"   value="<?php the_search_query(); ?>" aria-label="Search" name="s">
             <div class="mb-2">
                    <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><?php echo esc_attr_x( 'Recherche', 'submit button', 'aquila' ); ?></button>
             </div>
				
</form>