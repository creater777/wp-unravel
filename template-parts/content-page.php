<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package unravel
 */

?>



<?php


$post = get_post();

$columg_description = CFS()->get('column_loop');
$gallert = CFS()->get('gallery_post');
?>

<div id="body">
    <div class="container halfpage">
        <div class="dcore dcore-view dcore-menu-84">
            <div class="dcore-section dcore-section-body">
                <div class="dcore-body"><strong><? echo $post->post_title; ?></strong><br>
                    <? the_content(); ?>
                </div>

            </div>
            <? if (isset($gallert)) : ?>
                <? foreach ($gallert as $item) : ?>
                    <div class="dcore-section dcore-section-images">
                        <div class="dcore-image-view">
                            <div class="row">
                                <div class="item col s12">
                                    <a href="<?= $item['gallery_image']; ?>" class="image" target="_blank"
                                       data-gallery="#dcore-image-gallery"
                                       style="padding-bottom: 56.25%; background-image: url(<? echo $item['gallery_image']; ?>);">
                                    </a>
                                </div>
                            </div> <!-- .row -->
                        </div> <!-- .dcore-image-view -->
                    </div>
                <? endforeach; ?>
            <? endif; ?>
        </div>
    </div>
</div>


<div id="dcore-image-gallery" class="blueimp-gallery simple">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev" style="display: block;"><span class="fa fa-fw fa-chevron-left"></span></a>
    <a class="next" style="display: block;"><span class="fa fa-fw fa-chevron-right"></span></a>
    <a class="close" style="display: block;"><span class="fa fa-fw fa-times"></span></a>
</div>
