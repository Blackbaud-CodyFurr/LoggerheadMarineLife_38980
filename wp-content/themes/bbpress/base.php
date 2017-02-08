<?php
use Roots\Sage\Config;
use Roots\Sage\Wrapper;
?>
<?php get_template_part('templates/s__head'); ?>
<body <?php body_class(); ?>>

    <!--[if lt IE 9]>
    <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="//browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
    </div>
    <![endif]-->

    <?php if (get_field('facebook_widget', 'option')) : ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
    <?php endif; ?>

    <div id="bb-wrapper">

        <?php
        do_action('get_header');
        get_template_part('templates/s__header');
        ?>

        <?php if (! (is_front_page() || is_404())) : ?>
            <?php get_template_part('templates/s__pages-header'); ?>
        <?php endif; ?>

        <div id="bb-main">
            <div class="bb-main__cont">
                <div class="bb-main__row">
                    <?php include Wrapper\template_path(); ?>
                </div>
            </div>
        </div>

        <?php if (!is_front_page()) : ?>
            <?php get_template_part('templates/s__pages-sections'); ?>
        <?php endif; ?>

        <?php
        get_template_part('templates/s__footer');
        wp_footer();
        ?>
    </div>

    <!-- Font Resizer -->
    <?php if (get_field('font_resizer_js', 'option')) : ?>
        <script>
            (function($) {
                $('#bb-main .main-content').jfontsize({
                    btnMinusClasseId: '#jfontsize-minus',
                    btnDefaultClasseId: '#jfontsize-default',
                    btnPlusClasseId: '#jfontsize-plus'
                });
            })(jQuery);
        </script>
    <?php endif; ?>
    </body>
</html>
