<?php
get_header();
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                echo do_shortcode( '[show_last_ten_cars]' );
                ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();