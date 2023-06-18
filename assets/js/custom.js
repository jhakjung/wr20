// custom.js 파일에 JavaScript 코드 추가
jQuery(document).ready(function($) {
    // 페이지 로딩 후 해시 태그 확인
    if (window.location.hash === '#scroll-to-comments') {
      scrollToLastComment();
    }

    // 댓글 목록의 마지막 댓글로 스크롤 이동하는 함수
    function scrollToLastComment() {
      $('html, body').animate({
        scrollTop: $('#comments').offset().top
      }, 1000);
    }
  });
