<?php
/**
 * Posts Carousel.
 * 
 * @package Aquila
 */

 $args = [
    'posts_per_page' => 5,
    'post_type' => 'post',
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
];

$post_query = new \WP_Query($args);


?>

<div class="posts-carousel px-5">
    <!-- 1st Slide
 <div>
     <img src="https://placehold.co/600x400" alt="slide 1 " />
  </div>
-->
     <?php 
          if($post_query->have_posts()):
               while($post_query->have_posts()) :
                        $post_query->the_post();
                        ?>
                            <div class="card">
                                   <?php 
                                           if(has_post_thumbnail()){
                                                 the_post_custom_thumbnail(
                                                           get_the_ID(),
                                                           'feature-thumbnail',
                                                           [
                                                                 'sizes' => '(max-width: 350px) 350px, 233px',
							                                    'class' => 'w-100',
                                                           ]
                                                  ); 
                                                    /*$thumbnail_id = get_post_thumbnail_id();
                                                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'feature-thumbnail'); // Replace 'thumbnail' with the desired image size
                                                    $thumbnail_width = $thumbnail_url[1];
                                                    $thumbnail_height = $thumbnail_url[2];

                                                    ?>
                                                        <img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title_attribute(); ?>" width="<?php echo $thumbnail_width; ?>" height="<?php echo $thumbnail_height; ?>">
                                                    <?php*/

                                           }else{
                                               ?>
                                               <img src="https://placehold.co/600x400" alt="slide 1 " />
                                               <?php
                                           }

                                           ?> 
                                           <div class="card-body">
                                                    <?php the_title('<h3 class="card-title">','</h3>'); ?>
                                                    <?php aquila_the_excerpt(); ?>
                                                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                                            <?php esc_html_e( 'View more','aquila' ) ?>
                                                    </a>
                                           </div>
                                           
                                           <?php
                                   
                                   ?>
                            </div>
                        <?php
               endwhile;
            endif;

            wp_reset_postdata();
          
          ?>
</div>