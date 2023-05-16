<?php
// Contact Form 7 remove auto added p tags
add_filter('wpcf7_autop_or_not', '__return_false');

function makeTitle()
{
    $blogName = get_bloginfo('name');
    $blogDescription = get_bloginfo('description');
    $category = get_queried_object();
    return !empty($category) ? $category->name . " - " . $blogName : "$blogName - $blogDescription";
}

$title = makeTitle();

empty(session_id()) && session_start();
if (isset($_GET['_lang'])) {
    $_SESSION['_lang'] = $_GET['_lang'];
}
isset($_SESSION) && isset($_SESSION['_lang']) && switch_to_locale($_SESSION['_lang']);

?>

<!DOCTYPE html>
<html class="no-js pc ">
<head>
    <title><?= $title ?></title>
    <meta name="title" content="<?= $title ?>"/>
    <meta name="description" content="<?= $title ?>"/>
    <meta name="keywords" content=""/>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="/wp-content/themes/wp_unravel/img/favicon.ico@mtime=1595226416"/>
    <link rel="icon" type="image/png"
          href="/wp-content/themes/wp_unravel/img/favicon.png@mtime=1595226416"/>
    <link rel="apple-touch-icon" href="/wp-content/themes/wp_unravel/img/favicon.png@mtime=1595226416">
    <!-- open graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:description" content="">

    <!-- blueimp gallery -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.15.1/js/blueimp-gallery.min.js"></script>

    <!-- jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    <script type="text/javascript">
      $.fn.uiSlider = $.fn.slider;
    </script>
    <!-- blueimp gallery -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.15.1/css/blueimp-gallery.min.css"/>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/2.15.1/js/jquery.blueimp-gallery.js"></script>

    <!-- jquery.smoothState.js -->
    <!--script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/smoothState.js/0.7.2/jquery.smoothState.min.js"></script-->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.smoothState.min.js@mtime=1595226416"></script>

    <!-- materialize -->
    <!-- EDIT ALSO /css/basic/ckeditor.css -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css"/>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>

    <!-- modernize -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/modernizr-custom.js@mtime=1595226416"></script>

    <!-- tether-tooltip -->
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/helpers/tether-tooltip/tooltip-theme-arrows.min.css@mtime=1595226416.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tether-drop/1.4.2/js/drop.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tether-tooltip/1.2.0/js/tooltip.min.js"></script>

    <!-- stickyfill -->
    <!--script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/stickyfill/1.1.4/stickyfill.min.js"></script-->
    <script type="text/javascript" src="/wp-content/themes/wp_unravel/js/stickyfill.min.js"></script>


    <!-- isotope -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.1/isotope.pkgd.min.js"></script>

    <!-- loading spin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>

    <!-- jquery.imagesloaded -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js"></script>

    <!-- jqueryui.timepicker -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jqueryui.timepicker/jquery-ui-timepicker-addon.min.js@mtime=1595226416"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/jqueryui.timepicker/jquery-ui-timepicker-addon.min.css@mtime=1595226416.css"/>

    <!-- jquery.select2 -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/i18n/ko.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css"/>

    <!-- jquery.dform -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.formatCurrency-1.4.0.pack.js@mtime=1595226416"></script>
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.dform/dform.min.js@mtime=1595226416"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/jquery.dform/dform.min.css@mtime=1595226416.css"/>

    <!-- jquery.dcomment -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.dcomment/dcomment.min.js@mtime=1595226416"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/jquery.dcomment/dcomment.min.css@mtime=1595226416.css"/>

    <!-- jquery.dsave -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/ajaxfileupload.min.js@mtime=1595226416"></script>
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.dsave/dsave.min.js@mtime=1595226416"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/jquery.dsave/dsave.min.css@mtime=1595226416.css"/>

    <!-- jquery.dmodal -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.dmodal/dmodal.min.js@mtime=1595226416"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/jquery.dmodal/dmodal.min.css@mtime=1595226416.css"/>

    <!-- jquery.dslide -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.dslide/dslide.min.js@mtime=1595226416"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/jquery.dslide/dslide.min.css@mtime=1595226416.css"/>

    <!-- jquery.dvideo -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.dvideo/dvideo.min.js@mtime=1635833020"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/jquery.dvideo/dvideo.min.css@mtime=1595226416.css"/>

    <!-- jquery.daudio -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/jquery.daudio/daudio.min.js@mtime=1595226416"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/jquery.daudio/daudio.min.css@mtime=1595226416.css"/>

    <!-- redactor -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/redactor/redactor.js@mtime=1595226416"></script>
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/redactor/plugins/source.min.js@mtime=1595226416"></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/js/redactor/redactor.min.css@mtime=1595226416.css"/>

    <!-- momentjs -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/ko.js"></script>

    <!-- fullcalendar -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.css"/>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/gcal.js"></script>

    <!-- hasher -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/js-signals/1.0.0/js-signals.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/hasher/1.2.0/hasher.min.js"></script>
    <!--script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/crossroads/0.12.2/crossroads.min.js"></script-->


    <!-- css -->
    <!--    <link rel="stylesheet" type="text/css"-->
    <!--          href="/wp-content/themes/wp_unravel/css/basic/fonts.min.css@mtime=1595226416.css"/>-->
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/dcore.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/basic.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/helpers/materialize.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/helpers/jquery-ui.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/helpers/blueimp-gallery.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/helpers/select2.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/helpers/datepicker.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/basic/helpers/ckeditor.min.css@mtime=1595226416.css"/>

    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/layout.min.css@mtime=1617941740.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/common.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/pages.min.css@mtime=1595226416.css"/>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/themes/wp_unravel/css/grailed.css?v=5"/>

    <!-- js -->
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/basic.min.js@mtime=1595226416"></script>
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/materialize.min.js@mtime=1595226416"></script>
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/dcore.min.js@mtime=1635833016"></script>
    <script type="text/javascript"
            src="/wp-content/themes/wp_unravel/js/main.min.js@mtime=1595226416"></script>

    <!-- cf7 -->
    <script src="/wp-content/plugins/contact-form-7/includes/js/index.js" async defer></script>
    <link rel="stylesheet" type="text/css"
          href="/wp-content/plugins/contact-form-7/includes/css/styles.css"/>
    <?php

    wp_head(); // необходимо для работы плагинов и функционала ?>
</head>

<?php
$global_id = get_global();
?>
<body id="page-works" class="dcore-scaff-mode-list korean page-works">

    <div class="dcore-loading loading"></div>
    <div id="feedback" class="modal">
        <a class="modal-feedback__close" href="#" rel="modal:close"></a>
        <div class="modal-feedback">
            <?php echo do_shortcode('[contact-form-7 id="557" title="Отправить запрос"]'); ?>
        </div>
    </div>
    <div id="body-info" data-id="page-works" data-class="dcore-scaff-mode-list korean page-works"></div>
    <div id="header" class="underline">
        <div class="container">
            <div class="relative">
                <div id="logo">
                    <a href="<?= home_url(); ?>" class="logo">
                        <video autoplay playsinline muted loop
                               style="max-height: 20px; object-fit: cover;margin-left: -2px;">
                            <source
                                src="/wp-content/uploads/2023/02/<?= get_locale() === 'en_US' ? 'logo_en.mp4' : 'logo_ru.mp4' ?>"
                                type="video/mp4">
                        </video>
                        <div><?= __(CFS()->get('logo_text', $global_id)); ?></div>
                        <br>
                    </a>
                    <div class="layout-contact">
                        <div class="dsave-single dsave-single-richtext dcore-body">
                            <?= __('Phone') ?>&nbsp;<?= CFS()->get('phone_1', $global_id) ?><br/>
                            <?= CFS()->get('phone_2', $global_id) ?><br/>
                            <a href="mailto:<? echo CFS()->get('email_1', $global_id); ?>"><?= CFS()->get('email_1', $global_id) ?></a><br/>
                            <a href="mailto:<? echo CFS()->get('email_2', $global_id); ?>"><?= CFS()->get('email_2', $global_id) ?></a>&nbsp;(<?= __('Recruit') ?>
                            )<br/>
                            <?= __(CFS()->get('address', $global_id)) ?>
                        </div>
                        <div class="dsave-single dsave-single-richtext dcore-body">
                            <br/>
                            <br/>
                        </div>
                        <!-- Link to open the modal -->
                        <div class="dsave-single dsave-single-richtext dcore-body">
                            <a href="#feedback" rel="modal:open"><?= __('Feedback') ?></a>
                            <br/>
                            <br/>
                            <?= html_entity_decode(__(CFS()->get('copyright'), $global_id)) ?>
                        </div>
                    </div>
                </div>
                <button type="button" id="nav-trigger"><span><i></i></span></button>
                <div id="nav-group">
                    <div class="outer">
                        <div class="inner">
                            <div id="nav">
                                <ul id="nav-main">
                                    <?php my_nav_menu(['menu' => 'Навигация по сайту']); ?>
                                </ul>
                                <div id="nav-feedback" class="dsave-single dsave-single-richtext dcore-body">
                                    <br/>
                                    <a href="#feedback" rel="modal:open"><?= __('Feedback') ?></a>
                                </div>
                                <div id="menu-category-menu-10" class="menu-categories">

                                    <?php
                                    $category = get_queried_object();
                                    $current_cat_id = !empty($category) ? $category->term_id : 0;
                                    my_nav_menu_post(['container_id' => 'nav-posts', 'category' => $current_cat_id]);
                                    ?>

                                </div>
                                <? if (!empty(get_post()) && get_post()->post_type !== 'page'): ?>
                                    <!--           Ссылки на посты записей-->
                                    <div id="menu-list-all" class="menu-list">
                                        <ul>
                                            <?
                                            foreach (get_posts(array('category' => $current_cat_id, 'numberposts' => 10000)) as $post) {
                                                echo '<li><a href="' . $post->guid . '" class="truncate">' . __($post->post_title) . '</a></li>';
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      $(document).ready(function () {
        $('.dcore-thumbnails .item a.link').on('touchstart', function () {
          $(this).find('.info').addClass('opacity-on');
        }).on('touchend', function () {
          $('.dcore-thumbnails .item a.link .info').removeClass('opacity-on')
        });
      })

      $('.modal-feedback__close').on('click', function () {
        $('.modal').modal('close');
      });

      $('input[type=file]').each(function () {
        var label = $(this).parents('.field__file-wrapper').find('.field__file-fake');
        var labelVal = label.text();
        $(this).on('change', function (e) {
          var countFiles = this.files && this.files.length >= 1 && this.files.length;
          label.text(countFiles ? 'Выбрано файлов: ' + countFiles : labelVal);
        });
      });
    </script>
