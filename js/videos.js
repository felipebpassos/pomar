function playVideo() {
    const video = document.getElementById('video');
    const thumbnail = document.querySelector('.video-thumbnail');
    const playIcon = document.querySelector('.play-icon');

    // Esconde a thumbnail e o ícone, e reproduz o vídeo
    thumbnail.style.display = 'none';
    playIcon.style.display = 'none';
    video.style.display = 'block';
    video.play();
}
