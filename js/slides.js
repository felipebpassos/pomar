const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const progressBar = document.querySelector('.progress-bar');
const logoImg = document.querySelector('.hero-logo');
const sliderContainer = document.querySelector('.slider');
let currentIndex = 0;
let slideInterval;
const slideDuration = 6000;

let startX = 0;
let isDragging = false;
let isTouchDragging = false;
let lastSlideTime = 0;
const SLIDE_COOLDOWN = 500;

function updateLogo(index) {
  if (index === 1) {
    logoImg.src = './img/logo-acai.png';
  } else if (index === 2) {
    logoImg.src = './img/logo-sorvete.png';
  } else {
    logoImg.src = './img/logo.png';
  }
}

function updateSlider(index) {
  slides.forEach((slide, idx) => slide.classList.toggle('active', idx === index));
  dots.forEach((dot, idx) => dot.classList.toggle('active', idx === index));
  updateLogo(index);
  resetProgressBar();
}

function startProgressBar() {
  progressBar.style.transition = `width ${slideDuration}ms linear`;
  progressBar.style.width = '100%';
}

function resetProgressBar() {
  progressBar.style.transition = 'none';
  progressBar.style.width = '0';
  requestAnimationFrame(() => {
    progressBar.style.transition = `width ${slideDuration}ms linear`;
    progressBar.style.width = '100%';
  });
}

function startAutoSlide() {
  resetProgressBar();
  slideInterval = setInterval(() => {
    currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
    updateSlider(currentIndex);
  }, slideDuration);
}

function resetAutoSlide() {
  clearInterval(slideInterval);
  startAutoSlide();
}

// Eventos de transição e inicialização
progressBar.addEventListener('transitionend', () => {
  currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
  updateSlider(currentIndex);
});

document.addEventListener('DOMContentLoaded', () => {
  updateSlider(currentIndex);
  startAutoSlide();
});

// Controles manuais
document.querySelector('.angle-left').addEventListener('click', () => {
  currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
  updateSlider(currentIndex);
  resetAutoSlide();
});

document.querySelector('.angle-right').addEventListener('click', () => {
  currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
  updateSlider(currentIndex);
  resetAutoSlide();
});

dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    currentIndex = index;
    updateSlider(index);
    resetAutoSlide();
  });
});

// Controle por arraste
sliderContainer.addEventListener('mousedown', (e) => {
  startX = e.clientX;
  isDragging = true;
});

sliderContainer.addEventListener('mousemove', (e) => {
  if (!isDragging) return;
  const deltaX = e.clientX - startX;
  const now = Date.now();

  if (Math.abs(deltaX) > 60 && now - lastSlideTime > SLIDE_COOLDOWN) {
    const direction = deltaX > 0 ? -1 : 1;
    currentIndex = (currentIndex + direction + slides.length) % slides.length;
    updateSlider(currentIndex);
    resetAutoSlide();
    isDragging = false;
    lastSlideTime = Date.now();
  }
});

sliderContainer.addEventListener('mouseup', () => isDragging = false);
sliderContainer.addEventListener('mouseleave', () => isDragging = false);

// Controle touch
sliderContainer.addEventListener('touchstart', (e) => {
  startX = e.touches[0].clientX;
  isTouchDragging = true;
  e.preventDefault();
});

sliderContainer.addEventListener('touchend', () => isTouchDragging = false);

sliderContainer.addEventListener('touchmove', (e) => {
  if (!isTouchDragging) return;
  const deltaX = e.touches[0].clientX - startX;
  const now = Date.now();
  e.preventDefault();

  if (Math.abs(deltaX) > 60 && now - lastSlideTime > SLIDE_COOLDOWN) {
    const direction = deltaX > 0 ? -1 : 1;
    currentIndex = (currentIndex + direction + slides.length) % slides.length;
    updateSlider(currentIndex);
    resetAutoSlide();
    isTouchDragging = false;
    lastSlideTime = Date.now();
  }
});

// Bloqueia arraste de imagens
sliderContainer.addEventListener('dragstart', (e) => e.preventDefault());