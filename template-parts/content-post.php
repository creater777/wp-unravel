<?php
/**
 * Template part for displaying post
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


<div class="dcore-contents">
    <div class="dcore-body">
        <strong><? echo $post->post_title; ?></strong>
    </div>
    <div class="dcore-section dcore-section-body_2cols">
        <div class="row">
            <? if (isset($columg_description)) { ?>
                <? foreach ($columg_description as $description) { ?>
                    <div class="col s12 m6">
                        <div class="dcore-body"><? echo $description['text_column']; ?></div>
                    </div>
                <? } ?>
            <? } ?>
            <span style="background: url(<?= $post->guid ?>)"></span>
        </div>
    </div>
    <? if (isset($gallert)): ?>
        <? foreach ($gallert as $item) : ?>
            <? if (!empty($item['gallery_image'])): ?>
                <div class="dcore-section dcore-section-images">
                    <div class="dcore-image-view">
                        <div class="row">
                            <div class="item col s12">
                                <a href="<? echo $item['gallery_image']; ?>" class="image" target="_blank"
                                   data-gallery="#dcore-image-gallery"
                                   style="padding-bottom: 56.25%; background-image: url(<? echo $item['gallery_image']; ?>);"></a>

                            </div>
                        </div> <!-- .row -->
                    </div> <!-- .dcore-image-view -->
                </div>
            <? endif; ?>
            <? if (!empty($item['gallery_video'])): ?>
                <div class="dcore-section dcore-section-video">
                    <div class="dcore-video-view">
                        <div class="dvideo-view" style="padding-bottom: 56.25%;">
                            <video playsinline muted loop style="width: 100%; object-fit: cover;">
                                <source src="<?=$item['gallery_video']?>" type="video/webm">
                            </video>
                        </div>
                    </div>
                </div>
            <? endif; ?>

        <? endforeach; ?>
    <? endif; ?>
</div>
<div class="dcore-section dcore-section-images"></div></div>

<div id="dcore-image-gallery" class="blueimp-gallery simple">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev" style="display: block;"><span class="fa fa-fw fa-chevron-left"></span></a>
    <a class="next" style="display: block;"><span class="fa fa-fw fa-chevron-right"></span></a>
    <a class="close" style="display: block;"><span class="fa fa-fw fa-times"></span></a>
</div>

<script>
    $('.dvideo-view video').each(function(){
        $(this).dvideo({}).on('mouseover',function(){
            $(this)[0].play();
        }).on('mouseout', function(){
            $(this)[0].pause();
        });
    })
</script>