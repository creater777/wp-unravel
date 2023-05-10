<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package unravel
 */

get_header();
$global_id = get_global();
?>
<? if (empty(get_post()) || get_post()->post_type !== 'page'): ?>
    <div class="grailed">
        <div class="intro">
            <div class="video-wrapper">
                <video autoplay loop muted playsinline>
                    <source src="/wp-content/themes/wp_unravel/img/intro.mp4" type="video/mp4">
                </video>
                <div class="ticker">
                    <div class="ticker-wrapper">
                        <div class="ticker-wrapper__item">
                            <?= __(CFS()->get('logo_text', $global_id)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="nav-group">-->
<!--            <div class="nav-main">-->
<!--                <ul>-->
<!--                    --><?php //my_nav_menu(['depth' => 1]); ?>
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
    </div>
    <div class="h-screen"></div>
<?endif;?>

    <div id="body">
        <?php if (have_posts()) : ?>
            <div class="container posts">
                <div class="dcore dcore-list dcore-menu-10">
                    <div class="dcore-thumbnails menu-list">
                        <div class="items">
                            <?
                            while (have_posts()) {
                                the_post();
                                get_template_part('template-parts/content', '');
                            };
                            the_posts_navigation();
                            ?>
                        </div>
                    </div>
                </div>
            </div><!-- #main -->
        <? else : ?>
            <section class="error-404 not-found">
                <div class="page-content">
                    <p><?= __('Not found') ?></p>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        <? endif; ?>
    </div>
    <script>
      $(function () {
        var grailed = $('.grailed');
        function fixBodyPosition(){
          if ($(window).scrollTop() > grailed.height() || window.outerWidth > 992) {
            $('#body').css({'position': 'relative', 'top': '0px'});
            $('.h-screen').css({'display': 'none'});
          } else {
            $('#body').css({'position': 'fixed', 'top': '55px'});
            $('.h-screen').css({'display': 'block'});
          }
        };
        fixBodyPosition();
        $(document).on('scroll', fixBodyPosition);

        var ticker = $('.ticker'), tickerWrapper = $('.ticker-wrapper'), tickerItem = $('.ticker-wrapper__item'), left = 0, width = 0;
        while (width < ticker.width()){
          tickerWrapper.append(tickerItem.clone());
          width += tickerItem.width();
        }
        setInterval(function(){
          left --;
          tickerWrapper.css({'left': left});
          if (Math.abs(left + 80) > tickerItem.width()){
            left += tickerItem.width() + 80;
            tickerWrapper.css({'left': left});
          }
        }, 20);
      })
    </script>
<?php

get_footer();
