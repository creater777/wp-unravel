<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package unravel
 */

get_header();
$current = get_queried_object();
?>
    <div class="nav-group fixed">
        <div class="nav-main">
            <h3><?= $current->name ?></h3>
            <?
            $subcategories = get_categories(['child_of' => $current->term_id]);
            $subItems = [];
            foreach ($subcategories as $cat) {
                if ($cat->name != 'Все' && $cat->name != 'Всё') {
                    $subItems[] = "<li class='main-menu-item'><a href='" . get_category_link($cat->term_id) . "'>{$cat->name}</a></li>";
                }
            }
            if (!empty($subItems)) {
                echo "<ul>" . implode("", $subItems) . "</ul>";
            }
            ?>
        </div>
        <script>
            $(function(){
              var height = $('.nav-main').height();
              if (height) {
                $('#body').offset({top: height + 54});
              }
            })
        </script>
    </div>
    <div id="body">
        <?php if (have_posts()) : ?>
            <div class="container posts">
                <div class="dcore dcore-list dcore-menu-10">
                    <div class="dcore-thumbnails menu-list">
                        <div class="items">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) {
                                the_post();
                                get_template_part('template-parts/content');
                            }
                            the_posts_navigation();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <? else : ?>
            <section class="error-404 not-found">
                <div class="page-content">
                    <p><?= __('Not found') ?></p>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        <? endif; ?>
    </div><!-- #main -->

<?php
get_sidebar();
get_footer();
