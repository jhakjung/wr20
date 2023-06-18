jQuery(document).ready(function($) {
    var scrollToBottomIcon = $('#scroll-to-bottom');
    var scrollToTopIcon = $('#scroll-to-top');

    // 초기 설정: right-bottom 아이콘 표시, right-top 아이콘 숨김
    scrollToBottomIcon.show();
    scrollToTopIcon.show();

    scrollToBottomIcon.click(function(e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: $(document).height() }, '800');
    //   scrollToBottomIcon.hide();
    //   scrollToTopIcon.show();
    });

    scrollToTopIcon.click(function(e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, '800');
    //   scrollToTopIcon.hide();
    //   scrollToBottomIcon.show();
    });
  });
