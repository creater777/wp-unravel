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
    <div id="body">
        <div class="nav-group fixed">
            <div class="nav-main">
                <span><?= $current->name ?></span>
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
                $(window).on('scroll', function(){
                  if (height) {
                    $('#body').css({'padding-top': height});
                  }
                });
              })
            </script>
        </div>

        <?php if (have_posts()) : ?>
            <div class="container posts">
                <div class="dcore dcore-list dcore-menu-10">
                    <div class="dcore-thumbnails menu-list">
                        <div class="items">
                            <?php
                            /* Start the Loop */
                            global $post;
                            foreach (get_posts(['numberposts' => -1, 'category' => $current->cat_ID]) as $p){
                                if (!have_posts()){
                                    break;
                                }
                                the_post();
                                get_template_part('template-parts/content');
                            }
                            echo get_the_posts_navigation();
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
