<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cars</title>
    <?php wp_head();?>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="row no-gutters align-items-center justify-sm-center">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                }else { ?>
                    <a href='<?php echo home_url()?>' class='logo'>LOGO</a>
                    <?php
                }
                ?>
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <?php
                $header_phone_link = get_theme_mod('header_phone', 'Номер телефона...');
                $header_phone_link = str_replace(array('(', ')', ' ', '-'), array('','','',''), $header_phone_link);
                ?>
                <a class="phone" href="tel:<?php echo $header_phone_link; ?>">
                    <img class="phone__icon" src="<?php echo get_template_directory_uri(); ?>/img/tel.svg" alt="">
                    <?php echo get_theme_mod('header_phone', 'Номер телефона...'); ?>
                </a>
            </div>
        </div>
    </div>
</header>