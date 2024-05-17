document.addEventListener('scroll', function() {
    var footer = document.querySelector('.footer');
    var scrollPosition = window.scrollY + window.innerHeight;
    var documentHeight = document.documentElement.scrollHeight;
    var footerHeight = footer.clientHeight;
    var threshold = 10;

    // Calcula a porcentagem de quanto o footer deve estar visível
    var visibilityPercentage = (documentHeight - scrollPosition - threshold) / footerHeight;
    if (visibilityPercentage > 0) {
        footer.style.opacity = 1 - visibilityPercentage; // Inverte a opacidade
    } else {
        footer.style.opacity = '1';
    }
});

// Adiciona uma transição suave ao footer
document.querySelector('.footer').style.transition = 'opacity 0.7s ease';
