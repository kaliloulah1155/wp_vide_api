<?php
/*
 Template Name: Coming soon
 */
$cm_title = Arangi::setting('cm_title');
$cm_text_content = Arangi::setting('cm_text_content');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <?php 
        if (is_ssl()) {
            echo '<link rel="profile" href="//gmpg.org/xfn/11" />';
        }else{
            echo '<link rel="profile" href="http://gmpg.org/xfn/11" />';
        }
    ?>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page">
<div id="content" class="content-coming-soon">
    <div class="coming-soon-container text-center error-page">
        <div class="page-coming-soon container">
            <div class="coming-soon">
                <div class="cm-countdown">
                    <div id="clock_coming_soon" class="countdown_container"></div>
                </div>
                <?php if (!empty($cm_title)) { ?>
                    <h1><?php echo esc_attr($cm_title); ?></h1>
                <?php } ?>
                <?php if (!empty($cm_text_content)) { ?>
                    <p class="cm-info"><?php echo esc_attr($cm_text_content) ?></p>
                <?php } ?>
                <div class="coming-subcribe">
                    <?php
                    if (function_exists('mc4wp_show_form')) {
                        mc4wp_show_form();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- #content --></div>
<?php wp_footer(); ?>
</body>
</html>
