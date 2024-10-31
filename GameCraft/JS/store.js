const nav = document.querySelector('nav');
const toggle_btn = document.getElementById('toggle-btn');

toggle_btn.onclick = function () {
  nav.classList.toggle('hide');
  content.classList.toggle('expand');
};

const body = document.querySelector('body');
const bgModeBtn = document.getElementById('bgModeBtn');
const bgModeIcon = document.getElementById('bgModeIcon');

bgModeBtn.onclick = function () {
  body.classList.toggle('dark-mode');
  bgModeIcon.classList.toggle('bx bx-sun');
  bgModeIcon.classList.toggle('bx bx-moon');
};
