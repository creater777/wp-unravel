<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package unravel
 */

get_header();
?>

    <main id="primary" class="site-main">
        <section class="error-404 not-found">
            <div class="page-content">
                <p><?=__('Not found') ?></p>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </main><!-- #main -->
<?php
get_footer();
