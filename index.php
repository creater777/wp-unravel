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
<?php

get_footer();
