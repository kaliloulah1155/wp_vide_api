<?php
$blog_post_meta = Arangi::setting('single_post_meta');
$single_layout = get_post_meta(get_the_id(), 'single_post_layout', true);
if ($single_layout !== "default") {
    $single_post_layout = $single_layout;
} else {
    $single_post_layout = Arangi::setting('single_post_layout');
}
?>
<div class="blog post-single <?php if ($single_post_layout === 'single-1') {
                                    echo 'single-1';
                                } ?> <?php if ($single_post_layout === 'single-2') {
                                                                                                    echo 'single-2';
                                                                                                } ?>">
    <div class="blog-content">
        <div class="blog-item">
            <div class="blog_info blog_info_single">
                <?php if (!empty($blog_post_meta)) {
                    foreach ($blog_post_meta as $value) {
                        if (in_array($value, $blog_post_meta, true)) { ?>
                            <?php if ($value === 'author') : ?>
                                <div class="info author-post">
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>">
                                        <?php the_author(); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($value === 'categories') : ?>
                                <div class="info info-category">
                                    <?php echo get_the_term_list($post->ID, 'category', '', ''); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($value === 'date') : ?>
                                <div class="info date-post">
                                    <div class=" default-date">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo get_the_date(); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($value === 'comment') : ?>
                                <div class="info info-comment">
                                    <?php comments_popup_link(esc_html__('0 comment (s)', 'arangi'), esc_html__('1 comment', 'arangi'), esc_html__('% comments', 'arangi')); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($value === 'tags') : ?>
                                <?php
                                $tag = get_the_tag_list('', '', '');
                                if (!empty($tag)) {
                                    echo '<div class="info info-tag">' . $tag . '</div>';
                                }
                                ?>
                            <?php endif; ?>
                <?php
                        }
                    }
                }
                ?>
            </div>
            <?php arangi_get_post_media(); ?>
            <div class="blog_post_desc">
                <?php if ($single_post_layout === 'single-2') : ?>
                    <div class="action">
                        <?php if (Arangi::setting('single_post_share_enable') === '1') : ?>
                            <?php Arangi_Templates::post_sharing(); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php
                wp_link_pages(array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'arangi') . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'arangi') . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ));
                ?>
            </div>
            <?php if ($single_post_layout === 'single-1') : ?>
                <?php if (!empty($tag)) : ?>
                    <div class="tagcloud">
                        <?php echo get_the_tag_list(''); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="post-info-author">
                <div class="row">
                    <div class="col-md-6 col-xs-12 author-post">
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>">
                            <?php if ($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE) : ?>
                                <img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'))); ?>" alt="<?php get_the_title(); ?>">
                            <?php endif; ?>
                            <span><?php the_author(); ?></span>
                        </a>
                    </div>
                    <?php if ($single_post_layout === 'single-1') : ?>
                        <div class="action col-md-6 col-xs-12 ">
                            <?php if (Arangi::setting('single_post_share_enable') === '1') : ?>
                                <?php Arangi_Templates::post_sharing(); ?>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <?php if (!empty($tag)) : ?>
                            <div class="tagcloud col-md-6 col-xs-12 ">
                                <?php echo get_the_tag_list(''); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            $single_layout = get_post_meta(get_the_id(), 'single_post_layout', true);
            if ($single_layout !== "default") {
                $single_post_layout = $single_layout;
            } else {
                $single_post_layout = Arangi::setting('single_post_layout');
            }
            $blog_related = get_post_meta(get_the_ID(), 'related_entries', true);
            ?>
            <?php if (is_array($blog_related)) : ?>
                <?php if (count($blog_related) > 0) : ?>
                    <div class="blog_related <?php if ($single_post_layout === 'single-1') {
                                                    echo 'type1';
                                                } ?> <?php if ($single_post_layout === 'single-2') {
                                                                                                                echo 'type2';
                                                                                                            } ?>">
                        <h3><?php echo esc_html__('Related posts', 'arangi'); ?> </h3>
                        <div class="blog-gallery2 blog-grid  grid-style2 load-item  row arrows-custom">
                            <?php foreach ($blog_related as $key => $entry) : ?>
                                <div class="item grid-col-3">
                                    <?php
                                    $post_term_arr = get_the_terms($entry, 'category');

                                    $post_term_names = '';

                                    if (is_array($post_term_names) && count($post_term_arr)) {
                                        foreach ($post_term_arr as $post_term) {
                                            $post_term_names .= $post_term->name . ', ';
                                        }
                                    }
                                    $post_term_names = substr($post_term_names, 0, -2);
                                    ?>
                                    <?php if (has_post_thumbnail($entry)) : ?>
                                        <div class="blog-img">
                                            <?php
                                            echo get_the_post_thumbnail_url(null, array(570, 570), array(
                                                'alt' => get_the_title()
                                            ));
                                            ?>
                                            <div class=" custom-date ">
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="date"><?php echo get_the_time('d'); ?></span><br>
                                                    <span class="month"><?php echo get_the_time('M'); ?></span>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="blog-post-info">
                                            <h4 class="post-name"><a href="<?php the_permalink($entry); ?>"><?php echo get_the_title($entry); ?></a></h4>
                                            <div class="blog_info">
                                                <div class="info info-category">
                                                    <?php echo get_the_term_list($entry, 'category', '', ',  '); ?>
                                                </div>
                                            </div>
                                            <div class="blog_post_desc">
                                                <?php
                                                echo '<div class="entry-content">';
                                                the_excerpt();
                                                wp_link_pages(array(
                                                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'arangi') . '</span>',
                                                    'after'       => '</div>',
                                                    'link_before' => '<span>',
                                                    'link_after'  => '</span>',
                                                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'arangi') . ' </span>%',
                                                    'separator'   => '<span class="screen-reader-text">, </span>',
                                                ));
                                                echo '</div>';
                                                ?>
                                            </div>
                                            <div class="read-more">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read more', 'arangi'); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php
            if (Arangi::setting('single_post_comment_enable') === '1') {
                comments_template('', true);
            } ?>
        </div>
    </div>
</div>