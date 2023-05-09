<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package unravel
 */

get_header();
?>
    <div id="body">
        <div class="container posts">
            <div class="dcore dcore-view dcore-menu-10">
                <? while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                };
                ?>
            </div>
        </div>
    </div>
<?php

get_footer();
