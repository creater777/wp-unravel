<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package unravel
 */

global $index, $lastDblRow, $lastDblHeight, $wp_query;
$currentPost = get_post();
$id = $currentPost->ID;
$index = (int)$index;
$lastDblRow = !!$lastDblRow;
$lastDblHeight = !!$lastDblHeight;

$dblRow = $lastDblRow || $lastDblHeight && ($index === 1) || ($id % 3 === 0);
$dblHeight = $lastDblRow && !$dblRow && ($index === 1);// || !$dblRow && ($id % 3 === 1) && ($index === 0);
$full = !$dblRow && !$dblHeight;

if ($dblRow) {
    if (!have_posts()) {
        $dblRow = false;
        $dblHeight = false;
        $full = true;
    } else {
        $wp_query->the_post();
    };
}
$_posts = $dblRow ? [$currentPost, get_post()] : [$currentPost];

?>
  <div class="item" id="post-<?= $id ?>" data-var="<?= $dblHeight ?>" style="flex: <?= $full ? '100%' : '50%' ?>">
      <? foreach ($_posts as $post): ?>
        <a href="<?= $post->guid ?>" class="link dcore-zoom-out- save-last-scroll">

        <span class="image" style="padding-bottom: <?= $dblHeight ? '140%; padding-top: 1px;' : '70%' ?>; ">
			<span class="dcore-zoom-cover loaded-" data-src="<? the_post_thumbnail_url('large'); ?>'"
            style="background-image: url('<? the_post_thumbnail_url('large'); ?>');">
            </span>
		</span>
    <span class="info">
			<span class="middle-outer">
				<span class="middle-inner">
					<span class="title"><?= $post->post_title ?></span>
				</span>
			</span>
		</span>

        </a>
      <? endforeach; ?>
  </div>

<?
$index++;
if ($full || ($index % 2 === 1)) {
    $dblRow = false;
    $dblHeight = false;
    $index = 0;
}
$lastDblRow = $dblRow;
$lastDblHeight = $dblHeight;
?>