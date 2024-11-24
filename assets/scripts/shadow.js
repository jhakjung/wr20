const shadowBoxes = document.querySelectorAll('#shadow-box');

const shadowRaise = (event) => {
  event.target.classList.add('shadow');
};

const shadowDown = (event) => {
  event.target.classList.remove('shadow');
}

// DOM이 완전히 로드된 후에 이벤트 리스너를 추가합니다.
document.addEventListener('DOMContentLoaded', () => {
  shadowBoxes.forEach( box => {
    box.addEventListener('mouseenter', shadowRaise);
    box.addEventListener('mouseleave', shadowDown);
  });
});

export { shadowRaise, shadowDown };
