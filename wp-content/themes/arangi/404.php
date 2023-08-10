<?php
get_header();
$title = Arangi::setting('error_title');
$error404_content = Arangi::setting('error404_content');
$overlay_enable = Arangi::setting('overlay_enable');
$go_back_home_404 = Arangi::setting('go_back_home_404');
?>
    <div class="page-404  error-page <?php if ($overlay_enable == 1) echo 'overlay404'; ?>">
        <div class="page-container-404 container">
            <div class="page-content-404">
                <div class="heading-404">
                    <div class="content-404">
                        <?php if (!empty($title)) { ?>
                            <h1 class="page-title"><?php echo esc_attr($title); ?></h1>
                        <?php } ?>
                        <?php if (!empty($error404_content)) { ?>
                            <p><?php echo esc_attr($error404_content); ?></p>
                        <?php } ?>
                        <a class="btn btn-primary go-home" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php echo esc_html($go_back_home_404); ?></a>
                    </div><!-- .content-404 -->
                </div>
            </div>
        </div>
    </div>
<?php get_footer();