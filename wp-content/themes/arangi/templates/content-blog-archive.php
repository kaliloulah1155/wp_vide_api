<?php
global $wp_query;
$blog_archive_layout = Arangi_Post::blog_layout();
$blog_style = Arangi::setting( 'blog_archive_grid_style' );
$blog_column = Arangi_Post::blog_columns();
$blog_meta_list = Arangi::setting( 'blog_archive_post_meta_list' );
$blog_meta_grid1 = Arangi::setting( 'blog_archive_post_meta_grid' );
$blog_meta_grid2 = Arangi::setting( 'blog_archive_post_meta_grid2' );
$blog_meta_masonry = Arangi::setting( 'blog_archive_post_meta_masonry' );
$blog_date_format =  Arangi::setting( 'blog_general_date_format' );
$current_page = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
$animation = Arangi::setting( 'blog_css_animation' );
$animation_class = Arangi_Helper::get_animation_classes( $animation ); 
$blog_pagination = Arangi::setting( 'blog_archive_pagination' );
$blog_layout = Arangi::setting( 'blog_archive_layout' );
if (is_category()){
    $blog_layout = arangi_get_meta_value('blog_layout', false);
    $blog_pagination = arangi_get_meta_value('post_pagination', false);
    $blog_style = arangi_get_meta_value('blog_grid_style', false);
}

?>

<div class="row load-item blog-entries-wrap <?php echo esc_attr($blog_archive_layout);?> <?php if($blog_layout === 'grid' && $blog_style==='style1'){echo 'grid-style1';} ?> <?php if($blog_layout === 'grid' && $blog_style==='style2'){echo 'grid-style2';} ?>">
	<?php while (have_posts()) : the_post(); ?>
        <?php
            $format_class = '';
            if( get_post_format() ==='quote'){
                $format_class = 'post-quote';
            } elseif( get_post_format() ==='gallery'){
                $format_class = 'post-gallery';
            } elseif( get_post_format() ==='link'){
                $format_class = 'post-link';
            } elseif( get_post_format() ==='audio'){
                $format_class = 'post-audio';
            } elseif( get_post_format() ==='video'){
                $format_class = 'post-video';
            } elseif( get_post_format() ==='image'){ 
                $format_class = 'post-image';
            } elseif(has_post_thumbnail()){
                $format_class = 'blog-has-img';
            }else{
                $format_class = "";
            }
        ?>
		<div class="item <?php echo esc_attr($animation_class);?> <?php echo esc_attr($blog_column);?> item-page<?php echo esc_attr($current_page); ?>">
			<div class="blog-content">
				<div class="blog-item <?php echo esc_attr($format_class);?>  <?php if ( !has_post_thumbnail() &&  get_post_format() !=='quote' && get_post_format() !=='link' && get_post_format() !=='audio' ) {echo 'no-image';}?> <?php if ( is_sticky() ){ echo 'post_sticky';} ?>">
                     <?php if ( is_sticky() ):?>
                         <div class="icon-sticky"><span class="ti-pin-alt"></span></div>
                    <?php endif;?>
                    <?php arangi_get_post_media();?>
                    <?php if(($blog_layout ==='grid' && $blog_style==='style2') && get_post_format() !=='link' && get_post_format() !=='image' && get_post_format()  !=='quote' && get_post_format() !=='audio') : ?>
                        <?php
                            if (!empty($blog_meta_grid2)){
                                foreach ($blog_meta_grid2 as $value){
                                    if (in_array($value, $blog_meta_grid2,true)){?>
                                        <?php if ($value ==='date'):?>
                                            <div class=" custom-date ">
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="date"><?php echo get_the_time('d'); ?></span><br>
                                                    <span class="month"><?php echo get_the_time('M'); ?></span>
                                                    
                                                </a>
                                            </div>
                                        <?php endif;?>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    <?php endif;?>
                     <?php if($blog_layout === 'masonry' && get_post_format() !=='link' && get_post_format() !=='image' && get_post_format()  !=='quote' && get_post_format() !=='audio') : ?>
                        <?php
                            if (!empty($blog_meta_grid2)){
                                foreach ($blog_meta_grid2 as $value){
                                    if (in_array($value, $blog_meta_grid2,true)){?>
                                        <?php if ($value ==='date'):?>
                                            <div class=" custom-date ">
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="date"><?php echo get_the_time('d'); ?></span><br>
                                                    <span class="month"><?php echo get_the_time('M'); ?></span>
                                                    
                                                </a>
                                            </div>
                                        <?php endif;?>
                                        <?php
                                    }
                                }
                            }
                        ?>
                    <?php endif;?>
                    <?php if (has_post_thumbnail()): ?>
                        <?php
                            //echo get_the_post_thumbnail_url(null, 'full');
                        ?>
                    <?php endif; ?>
                    <?php if( get_post_format() !=='quote' || get_post_format() !=='quote' ):?>
                    <div class="blog-post-info">
                         <h4 class="post-name"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                        <?php if($blog_layout === 'list'): ?>
                            <div class="blog_info">
                            <?php
                                if (!empty($blog_meta_list)){
                                    foreach ($blog_meta_list as $value){
                                        if (in_array($value, $blog_meta_list,true)){?>
                                            <?php if ($value ==='author'):?>
                                                <div class="info author-post">
                                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                                        <?php the_author(); ?>
                                                    </a>     
                                                </div>
                                            <?php endif;?>
                                            <?php if ($value ==='categories'):?>  
                                                <div class="info info-category">
                                                   <?php echo get_the_term_list($post->ID,'category', '','' ); ?>
                                                </div>
                                            <?php endif;?>
                                            <?php if ($value ==='date'):?>
                                                <div class="info date-post">
                                                    <div class=" default-date">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php echo get_the_date(); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                             <?php if ($value ==='comment'):?>
                                                <div class="info info-comment"> 
                                                    <?php comments_popup_link(esc_html__('0 comment (s)', 'arangi'), esc_html__('1 comment', 'arangi'), esc_html__('% comments', 'arangi')); ?>
                                                </div>  
                                            <?php endif;?>
                                             <?php if ($value ==='tags'):?> 
                                                <?php
                                                 $tag = get_the_tag_list('','','');
                                                if(!empty($tag)){
                                                    echo '<div class="info info-tag">'. $tag .'</div>';
                                                } 
                                                ?>
                                            <?php endif;?>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                        </div>
                        <?php endif;?>
                        <?php if( $blog_layout === 'grid' &&  $blog_style==='style1'): ?>
                            <div class="blog_info">
                                <?php
                                    if (!empty($blog_meta_grid1)){
                                        foreach ($blog_meta_grid1 as $value){
                                            if (in_array($value, $blog_meta_grid1,true)){?>
                                                <?php if ($value ==='author'):?>
                                                    <div class="info author-post">
                                                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                                            <?php the_author(); ?>
                                                        </a>     
                                                    </div>
                                                <?php endif;?>
                                                <?php if ($value ==='categories'):?>  
                                                    <div class="info info-category">
                                                       <?php echo get_the_term_list($post->ID,'category', '','' ); ?>
                                                    </div>
                                                <?php endif;?>
                                                 <?php if ($value ==='tags'):?> 
                                                    <?php
                                                     $tag = get_the_tag_list('','','');
                                                    if(!empty($tag)){
                                                        echo '<div class="info info-tag">'. $tag .'</div>';
                                                    } 
                                                    ?>
                                                <?php endif;?>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if( $blog_layout === 'grid' &&  $blog_style==='style2'): ?>
                            <div class="blog_info">
                                <?php
                                    if (!empty($blog_meta_grid2)){
                                        foreach ($blog_meta_grid2 as $value){
                                            if (in_array($value, $blog_meta_grid1,true)){?>
                                                <?php if ($value ==='author'):?>
                                                    <div class="info author-post">
                                                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                                            <?php the_author(); ?>
                                                        </a>     
                                                    </div>
                                                <?php endif;?>
                                                <?php if ($value ==='categories'):?>  
                                                    <div class="info info-category">
                                                       <?php echo get_the_term_list($post->ID,'category', '','' ); ?>
                                                    </div>
                                                <?php endif;?>
                                                <?php if ($value ==='comment'):?>
                                                    <div class="info info-comment"> 
                                                        <?php comments_popup_link(esc_html__('0 comment (s)', 'arangi'), esc_html__('1 comment', 'arangi'), esc_html__('% comments', 'arangi')); ?>
                                                    </div>  
                                                <?php endif;?>
                                                 <?php if ($value ==='tags'):?> 
                                                    <?php
                                                    $tag = get_the_tag_list('','','');
                                                    if(!empty($tag)){
                                                        echo '<div class="info info-tag">'. $tag .'</div>';
                                                    } 
                                                    ?>
                                                <?php endif;?>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if( $blog_layout === 'masonry'): ?>
                            <div class="blog_info">
                                <?php
                                    if (!empty($blog_meta_masonry)){
                                        foreach ($blog_meta_masonry as $value){
                                            if (in_array($value, $blog_meta_masonry,true)){?>
                                                <?php if ($value ==='author'):?>
                                                    <div class="info author-post">
                                                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                                            <?php the_author(); ?>
                                                        </a>     
                                                    </div>
                                                <?php endif;?>
                                                <?php if ($value ==='categories'):?>  
                                                    <div class="info info-category">
                                                       <?php echo get_the_term_list($post->ID,'category', '','' ); ?>
                                                    </div>
                                                <?php endif;?>
                                                <?php if ($value ==='comment'):?>
                                                    <div class="info info-comment"> 
                                                        <?php comments_popup_link(esc_html__('0 comment (s)', 'arangi'), esc_html__('1 comment', 'arangi'), esc_html__('% comments', 'arangi')); ?>
                                                    </div>  
                                                <?php endif;?>
                                                 <?php if ($value ==='tags'):?> 
                                                    <?php
                                                     $tag = get_the_tag_list('','','');
                                                    if(!empty($tag)){
                                                        echo '<div class="info info-tag">'. $tag .'</div>';
                                                    } 
                                                    ?>
                                                <?php endif;?>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        <?php endif; ?>
                       
                        <?php if($blog_layout !== 'masonry'):?>
                            <div class="blog_post_desc">
                                <?php
                                echo '<div class="entry-content">';
                                the_excerpt();
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'arangi' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'arangi' ) . ' </span>%',
                                    'separator'   => '<span class="screen-reader-text">, </span>',
                                ) );
                                echo '</div>';
                                ?>
                            </div>
                            <div class="read-more">
                               <?php if($blog_layout === 'grid' && $blog_style==='style2'): ?>
                                    <a href="<?php the_permalink();?>"><?php echo esc_html__('Read more','arangi');?></a>
                                <?php else:?>
                                    <a class="btn btn-primary height-40" href="<?php the_permalink();?>"><?php echo esc_html__('+ Read more','arangi');?></a>
                                <?php endif;?>
                            </div>
                            <?php if( $blog_layout === 'grid' &&  $blog_style==='style1'): ?>
                                <div class="blog_info_ab">
                                    <ul>
                                    <?php
                                        if (!empty($blog_meta_grid1)){
                                            foreach ($blog_meta_grid1 as $value){
                                                if (in_array($value, $blog_meta_grid1,true)){?>
                                                    <?php if ($value ==='date'):?>
                                                        <li class="info date-post">
                                                            <?php if(!$blog_date_format ):?>
                                                                <div class=" custom-date ">
                                                                    <a href="<?php the_permalink(); ?>">
                                                                        <span class="month"><?php echo get_the_time('M'); ?></span>
                                                                        <span class="date"><?php echo get_the_time('d'); ?></span>
                                                                    </a>
                                                                </div>
                                                            <?php else:?>
                                                                <div class=" default-date">
                                                                    <i class="ti-calendar"></i><br>
                                                                    <a href="<?php the_permalink(); ?>">
                                                                        <?php echo get_the_date(); ?>
                                                                    </a>
                                                                </div>
                                                            <?php endif;?>
                                                        </li>
                                                    <?php endif;?>
                                                     <?php if ($value ==='comment'):?>
                                                        <li class="info info-comment"> 
                                                            <i class="ti-comment-alt"></i><br>
                                                            <?php comments_popup_link(esc_html__('0 comment (s)', 'arangi'), esc_html__('1 comment', 'arangi'), esc_html__('% comments', 'arangi')); ?>
                                                        </li>  
                                                    <?php endif;?>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                    </ul>
                                </div>
                            <?php endif;?>
                        <?php endif;?>
                        
                    </div>
                    <?php endif;?>
				</div>
			</div>
		</div>
	<?php endwhile;?>
	
</div>
<?php if ($blog_pagination === 'load_more'):?>
    <?php if (get_next_posts_link()) { ?>
        <div class="load_more_button text-center" rel="<?php echo esc_attr($wp_query->max_num_pages); ?>" data-paged="<?php echo esc_attr($current_page) ?>" data-totalpage="<?php echo esc_attr($wp_query->max_num_pages) ?>">
            <?php echo get_next_posts_link(esc_html__('More', 'arangi') .'<span class="icon-right-arrow"></span>'); ?>
        </div>
    <?php } ?>
<?php endif;?>
<?php if ($blog_pagination === 'next_prev'):?>
    <?php if( get_previous_posts_link() ||  get_next_posts_link()):?>
        <ul class="pagination-content type-button">
            <?php if( get_previous_posts_link()): ?>
                <li class="pagination_button_prev"><?php previous_posts_link( 'Prev ' ); ?></li>
            <?php endif; ?>
            <?php if( get_next_posts_link()): ?>
                <li class="pagination_button_next"><?php next_posts_link( 'Next'); ?></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
<?php endif;?>
<?php if ($blog_pagination === 'number'):?>
    <div class="pagination-content type-number">
        <?php Arangi_Templates::paging_nav(); ?>
    </div>
<?php endif;?>