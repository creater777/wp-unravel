<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const body = $('#body');
    const iscreen = $('.h-screen');
    const height = $('.nav-main').height();
    const grailed = $('.grailed');
    let timer = 0, pause = false, isScroll = false;

    function start(){
      !timer && (timer = setTimeout(function () {
        timer = 0;
        !isScroll && !pause && window.scrollBy(0, 1);
        window.requestAnimationFrame(start);
      }, 10));
    }

    function fixBodyPosition() {
      body.css({'padding-top': height ? height : 0});

      if (grailed.is(":hidden") || !grailed.length ||
        window.scrollY >= grailed.height() && body.height() > grailed.height())
      {
        body.removeClass('fixed');
        iscreen.css({'display': 'none'});
        isScroll = false;
      } else {
        body.addClass('fixed');
        iscreen.css({'display': 'block'});
        isScroll = true;
      }
    }

    start();
    $(document).on('touchmove', () => body.trigger('scroll'));
    $(document).on('scroll', (e) => {
      e.preventDefault();
      isScroll = true;
      fixBodyPosition()
    });
    $(document).on('visibilitychange', () => !document.hidden && body.trigger('scroll'));
    body.on('mousedown', () => pause = true);
    body.on('mouseup', () => pause = false);
    body.on('touchstart', () => pause = true);
    body.on('touchend', () => pause = false);
    fixBodyPosition();

    function doRunningLine(){
      let ticker = $('.ticker'),
        tickerWrapper = $('.ticker-wrapper'),
        tickerItem = $('.ticker-wrapper__item'),
        tickerButtons = $('.ticker-wrapper__buttons'),
        left = 0, width = tickerItem.width() + tickerButtons.width() + 80;

      do {
        tickerWrapper.append(tickerItem.clone());
        tickerWrapper.append(tickerButtons.clone());
        width += tickerItem.width() + tickerButtons.width() + 80;
      } while (width < ticker.width() * 2);

      function runningLine(){
        setTimeout(function () {
          left--;
          tickerWrapper.css({'left': left});
          if (Math.abs(left) > tickerItem.width() + tickerButtons.width() + 80) {
            left += tickerItem.width() + tickerButtons.width() + 80;
            tickerWrapper.css({'left': left});
          }
          window.requestAnimationFrame(runningLine);
        }, 20);
      }
      window.requestAnimationFrame(runningLine);
    }
    doRunningLine();
  })
</script>
</body>
</html>
