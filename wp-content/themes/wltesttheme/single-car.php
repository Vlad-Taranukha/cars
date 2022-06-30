<?php get_header();
if ( isset(wp_get_post_terms(get_the_ID(), 'car_name', array('fields' => 'names'))[0] )) {
    $car_name = wp_get_post_terms(get_the_ID(), 'car_name', array('fields' => 'names'))[0];
}
if ( isset( wp_get_post_terms(get_the_ID(), 'car_country', array('fields' => 'names'))[0] )) {
    $car_country = wp_get_post_terms(get_the_ID(), 'car_country', array('fields' => 'names'))[0];
}
$car_color = get_post_meta(get_the_ID(), 'car_meta_color', true);
$car_fuel = get_post_meta(get_the_ID(), 'car_meta_fuel', true);
$car_power = get_post_meta(get_the_ID(), 'car_meta_power', true);
$car_price = get_post_meta(get_the_ID(), 'car_meta_price', true);
?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 car-img">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('post-thumbnail', ['style' => 'max-width:100%; height:auto']);
                            } else {
                                ?>
                                <img class="no-image" src="<?php echo get_template_directory_uri()?>/img/no-image.png" alt="">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <h3>Характеристики автомобиля</h3>
                            <?php if ( isset($car_name) ) { ?> <p>Марка: <span><?php echo $car_name; ?></span></p><?php } ?>
                            <?php if ( isset($car_country) ) { ?>
                                <p>Страна производитель: <span><?php echo $car_country; ?></span></p>
                            <?php } ?>
                            <?php if ( isset($car_color) && $car_color != '' ) { ?>
                                <p>Цвет: <span class="car-color" style="background: <?php echo $car_color ?>"></span></p>
                            <?php } ?>
                            <?php if ( isset($car_fuel) && $car_fuel != '' ) { ?>
                                <p>Топливо: <span><?php echo $car_fuel ?></span></p>
                            <?php } ?>
                            <?php if ( isset($car_power) && $car_power != '' ) { ?>
                                <p>Мощность: <span><?php echo $car_power ?> л.с.</span></p>
                            <?php } ?>
                            <?php if ( isset($car_price) && $car_price != '' ) { ?>
                                <p>Цена: <span><?php echo $car_price ?> $</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();
