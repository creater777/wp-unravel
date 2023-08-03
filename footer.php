<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    let grailed = $('.grailed'), ticker = $('.ticker'),
      tickerWrapper = $('.ticker-wrapper'),
      tickerItem = $('.ticker-wrapper__item'),
      tickerButtons = $('.ticker-wrapper__buttons'),
      left = 0, width = tickerItem.width() + tickerButtons.width() + 80,

      timer = 0, isScroll = false;

    function stop() {
      clearTimeout(timer);
      timer = 0;
    }

    function start(){
      stop();
      timer = setTimeout(function () {
        !isScroll && window.scroll({
          top: window.scrollY + 2,
        });
        window.requestAnimationFrame(start);
      }, 10);
    }

    function fixBodyPosition() {
      const body = $('#body'), iscreen = $('.h-screen');
      const height = $('.nav-main').height();

      if (height) {
        body.css({'padding-top': height});
      } else {
        body.css({'padding-top': 0});
      }

      if (grailed.is(":hidden") || !grailed.length ||
        window.scrollY >= grailed.height() && body.height() > grailed.height())
      {
        start();
        body.removeClass('fixed');
        iscreen.css({'display': 'none'});
      } else {
        stop();
        body.addClass('fixed');
        iscreen.css({'display': 'block'});
      }
    }

    fixBodyPosition();
    $(document).on('touchstart', function () {
      isScroll = true;
      fixBodyPosition();
    });
    $(document).on('touchend', function () {
      isScroll = false;
      fixBodyPosition();
    });
    $(document).on('scroll', fixBodyPosition);
    $(document).on('visibilitychange', function(){
      console.log('visibilitychange ' + document.hidden)
      isScroll = false;
      stop();
      !document.hidden && fixBodyPosition();
    });

    do {
      tickerWrapper.append(tickerItem.clone());
      tickerWrapper.append(tickerButtons.clone());
      width += tickerItem.width() + tickerButtons.width() + 80;
    } while (width < ticker.width() * 2);

    setInterval(function () {
      left--;
      tickerWrapper.css({'left': left});
      if (Math.abs(left) > tickerItem.width() + tickerButtons.width() + 80) {
        left += tickerItem.width() + tickerButtons.width() + 80;
        tickerWrapper.css({'left': left});
      }
    }, 20);
  })
</script>
</body>
</html>
