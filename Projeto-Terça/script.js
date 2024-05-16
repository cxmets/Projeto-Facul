/* JavaScript to handle footer visibility */
document.addEventListener('scroll', function() {
    var footer = document.querySelector('.footer');
    if (window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 10) {
        footer.style.bottom = '0';
    } else {
        footer.style.bottom = '-100px';
    }
  });