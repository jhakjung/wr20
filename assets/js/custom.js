jQuery(document).ready(function($) {
<<<<<<< HEAD
  // 아이콘 요소 선택
  var scrollToBottomIcon = $('#scroll-to-bottom');
  var scrollToTopIcon = $('#scroll-to-top');

  // 초기 설정: 아이콘 모두 숨김
  scrollToBottomIcon.hide();
  scrollToTopIcon.hide();

  // 스크롤 이벤트 핸들러
  $(window).scroll(function() {
    var scrollPosition = $(window).scrollTop();
    var windowHeight = $(window).height();

    // 스크롤 위치에 따라 아이콘 표시/숨김 처리
    if (scrollPosition > windowHeight / 2) {
      scrollToTopIcon.show();
    } else {
      scrollToTopIcon.hide();
    }

    if (scrollPosition + windowHeight === $(document).height()) {
      scrollToBottomIcon.hide();
    } else {
      scrollToBottomIcon.show();
    }
  });

  // 맨 아래로 스크롤하는 함수
  scrollToBottomIcon.click(function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $(document).height() }, '800');
  });

  // 맨 위로 스크롤하는 함수
  scrollToTopIcon.click(function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '800');
  });
});
=======
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
>>>>>>> acd37acda096b3818e4a064611f0b28b2026e81d
