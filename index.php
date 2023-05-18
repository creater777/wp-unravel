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
    <div class="grailed">
        <div class="intro">
            <div class="video-wrapper">
                <video autoplay loop muted playsinline poster="/wp-content/themes/wp_unravel/img/poster.jpg">
                    <source src="/wp-content/themes/wp_unravel/img/intro.mp4" type="video/mp4">
                </video>
                <div class="ticker">
                    <div class="ticker-wrapper">
                        <div class="ticker-wrapper__item">
                            <?= __(CFS()->get('logo_text', $global_id)); ?>
                        </div>
                        <ul class="ticker-wrapper__buttons">
                            <?php
                            $subcategories = get_categories(['child_of' => 0]);
                            $subItems = [];
                            foreach ($subcategories as $cat) {
                                if (array_search($cat->term_id, [3, 48, 108]) !== false) {
                                    continue;
                                }
                                $subItems[] = "<li class='main-menu-item'><a href='" . get_category_link($cat->term_id) . "'>{$cat->name}</a></li>";
                            }
                            if (!empty($subItems)) {
                                echo implode("", $subItems);
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-screen"></div>
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
        let grailed = $('.grailed'), ticker = $('.ticker'),
          tickerWrapper = $('.ticker-wrapper'),
          tickerItem = $('.ticker-wrapper__item'),
          tickerButtons = $('.ticker-wrapper__buttons'),
          maxWidth = ticker.width(), left = 0, width = tickerItem.width() + tickerButtons.width() + 80;

        function fixBodyPosition() {
          if (window.scrollY > grailed.height()) {
            $('#body').removeClass('fixed');
            $('.h-screen').css({'display': 'none'});
          } else {
            $('#body').addClass('fixed');
            $('.h-screen').css({'display': 'block'});
          }
        }

        fixBodyPosition();
        $(document).on('scroll', fixBodyPosition);

        do {
          tickerWrapper.append(tickerItem.clone());
          tickerWrapper.append(tickerButtons.clone());
          width += tickerItem.width() + tickerButtons.width() + 80;
        } while (width < maxWidth * 2);

        setInterval(function () {
          left--;
          tickerWrapper.css({'left': left});
          if (Math.abs(left) > tickerItem.width() + tickerButtons.width() + 80) {
            left += tickerItem.width() + tickerButtons.width() + 80;
            tickerWrapper.css({'left': left});
          }
        }, 20);
      })
    </script>
<?php

get_footer();
