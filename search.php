<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package unravel
 */

get_header();
?>
    <div id="body">
        <? if (have_posts()) : ?>
            <div class="container posts">
                <div class="dcore dcore-list dcore-menu-10">
                    <div class="dcore-thumbnails menu-list">
                        <div class="items">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) {
                                the_post();
                                get_template_part('template-parts/content', '');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <? else : ?>
            <section class="error-404 not-found">
                <div class="page-content">
                    <p><?=__('Not found') ?></p>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        <? endif; ?>
    </div>
<?php
get_footer();
