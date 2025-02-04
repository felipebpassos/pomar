const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const progressBar = document.querySelector('.progress-bar'); // Seleciona a barra de progresso
const logoImg = document.querySelector('.hero-logo'); // Seleciona a logo
const sliderContainer = document.querySelector('.slider'); // Container dos slides
let currentIndex = 0;
let slideInterval;
const slideDuration = 10000; // Duração do slide em milissegundos

let startX = 0;
let isDragging = false;

function updateLogo(index) {
  if (index === 1) { // Slide 2 (Açaí)
    logoImg.src = './img/logo-acai.png';
  } else if (index === 2) { // Slide 3 (Sorvete)
    logoImg.src = './img/logo-sorvete.png';
  } else { // Slide inicial (Polpa)
    logoImg.src = './img/logo.png';
  }
}

function updateSlider(index) {
  slides.forEach((slide, idx) => {
    slide.classList.toggle('active', idx === index);
  });

  dots.forEach((dot, idx) => {
    dot.classList.toggle('active', idx === index);
  });

  updateLogo(index); // Atualiza a logo com base no slide atual
  resetProgressBar(); // Reinicia a barra de progresso sempre que o slider muda
}

function startProgressBar() {
  progressBar.style.transition = `width ${slideDuration}ms linear`;
  progressBar.style.width = '100%'; // Faz a barra preencher no tempo do slide
}

function resetProgressBar() {
  progressBar.style.transition = 'none';
  progressBar.style.width = '0'; // Reseta a barra
  setTimeout(startProgressBar, 50); // Pequeno atraso para reiniciar a animação
}

// Função para mudar de slide automaticamente
function startAutoSlide() {
  startProgressBar(); // Inicia a barra de progresso
  slideInterval = setInterval(() => {
    currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
    updateSlider(currentIndex);
  }, slideDuration); // Muda de slide a cada 10 segundos
}

// Função para reiniciar o timer ao interagir manualmente
function resetAutoSlide() {
  clearInterval(slideInterval); // Para o timer atual
  startAutoSlide(); // Inicia um novo timer
}

// Eventos para as setas
document.querySelector('.angle-left').addEventListener('click', () => {
  currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
  updateSlider(currentIndex);
  resetAutoSlide(); // Reinicia o timer
});

document.querySelector('.angle-right').addEventListener('click', () => {
  currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
  updateSlider(currentIndex);
  resetAutoSlide(); // Reinicia o timer
});

// Eventos para os dots
dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    currentIndex = index;
    updateSlider(index);
    resetAutoSlide(); // Reinicia o timer
  });
});

// Adicione esta variável no início do script
let lastSlideTime = 0;
const SLIDE_COOLDOWN = 500; // 500ms de intervalo entre os slides

// Modifique os eventos de mouse e touch assim:

// Eventos para arrastar (drag)
sliderContainer.addEventListener('mousedown', (e) => {
  startX = e.clientX;
  isDragging = true;
});

sliderContainer.addEventListener('mousemove', (e) => {
  if (!isDragging) return;
  const deltaX = e.clientX - startX;
  const now = Date.now();

  if (deltaX > 60 && now - lastSlideTime > SLIDE_COOLDOWN) {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
    updateSlider(currentIndex);
    resetAutoSlide();
    isDragging = false;
    lastSlideTime = Date.now();
  } else if (deltaX < -60 && now - lastSlideTime > SLIDE_COOLDOWN) {
    currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
    updateSlider(currentIndex);
    resetAutoSlide();
    isDragging = false;
    lastSlideTime = Date.now();
  }
});

// Eventos para touch (mobile)
sliderContainer.addEventListener('touchstart', (e) => {
  startX = e.touches[0].clientX;
});

sliderContainer.addEventListener('touchmove', (e) => {
  const deltaX = e.touches[0].clientX - startX;
  const now = Date.now();

  if (deltaX > 60 && now - lastSlideTime > SLIDE_COOLDOWN) {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
    updateSlider(currentIndex);
    resetAutoSlide();
    lastSlideTime = Date.now();
  } else if (deltaX < -60 && now - lastSlideTime > SLIDE_COOLDOWN) {
    currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
    updateSlider(currentIndex);
    resetAutoSlide();
    lastSlideTime = Date.now();
  }
});
