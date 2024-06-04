// Animação do footer
document.addEventListener('scroll', function() {
    var footer = document.querySelector('.footer');
    var scrollPosition = window.scrollY + window.innerHeight;
    var documentHeight = document.documentElement.scrollHeight;
    var footerHeight = footer.clientHeight;
    var threshold = 10;

    var visibilityPercentage = (documentHeight - scrollPosition - threshold) / footerHeight;
    if (visibilityPercentage > 0) {
        footer.style.opacity = 1 - visibilityPercentage;
    } else {
        footer.style.opacity = '1';
    }
});
document.querySelector('.footer').style.transition = 'opacity 0.7s ease';

// Carrinho
document.addEventListener('DOMContentLoaded', async function() {
    const cartIcon = document.querySelector('.cart-icon');
    const cartCount = document.querySelector('.cart-count');

    try {
        const response = await fetch('cart_count.php');
        const data = await response.json();
        if (data.totalQuantity) {
            cartCount.innerText = data.totalQuantity;
            cartCount.style.display = 'inline-block';
        }
    } catch (error) {
        console.error('Erro ao obter o contador do carrinho:', error);
    }

    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', async function(event) {
            event.preventDefault();

            const productId = this.getAttribute('data-product-id');
            const quantityInput = document.querySelector(`#quantity-${productId}`);
            const quantity = quantityInput ? quantityInput.value : 1;

            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('quantity', quantity);

            try {
                const response = await fetch('add_to_cart.php', {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    const responseData = await response.json();
                    if (responseData.totalQuantity) {
                        cartCount.innerText = responseData.totalQuantity;
                        cartCount.style.display = 'inline-block';
                        cartIcon.classList.add('cart-icon-animation');
                        setTimeout(() => {
                            cartIcon.classList.remove('cart-icon-animation');
                        }, 500);
                    }
                    // msg de confirmação de que foi para o carrinho - depois.
                } else {
                    throw new Error('Erro ao adicionar produto ao carrinho.');
                }
            } catch (error) {
                console.error(error);
                alert('Ocorreu um erro ao adicionar o produto ao carrinho.');
            }
            cartCount.classList.add('cart-count-animation');
            setTimeout(() => {
                cartCount.classList.remove('cart-count-animation');
            }, 1000);// <<<< tempo do pulse
        });
    });
});




// Favoritos - ALL
document.addEventListener('DOMContentLoaded', () => {
    const favoritesLink = document.getElementById('favorites-link');
    const allCards = document.querySelectorAll('.card');
    const noFavoritesMessage = document.getElementById('no-favorites-message');

    // Carregar o estado inicial dos favoritos
    document.querySelectorAll('.star-icon').forEach(star => {
        const productId = star.dataset.productId;
        fetch(`is_favorite.php?product_id=${productId}`)
            .then(response => response.text())
            .then(isFavorite => {
                if (isFavorite === 'yes') {
                    star.classList.remove('bx-star');
                    star.classList.add('bxs-star',  'bx-spin');
                }
            });
    });

    // Adicionar ou remover dos favoritos ao clicar na estrela
    document.querySelectorAll('.star-icon').forEach(star => {
        star.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const price = this.dataset.price;

            fetch('toggle_favorite.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `product_id=${productId}&price=${price}`
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'added') {
                    this.classList.remove('bx-star');
                    this.classList.add('bxs-star',  'bx-spin');
                } else if (data === 'removed') {
                    this.classList.remove('bxs-star',  'bx-spin');
                    this.classList.add('bx-star');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Filtrar e mostrar apenas os favoritos ao clicar no link de favoritos
    favoritesLink.addEventListener('click', function(e) {
        e.preventDefault();
        fetch(`get_favorites.php`)
            .then(response => response.json())
            .then(favorites => {
                if (favorites.length === 0) {
                    noFavoritesMessage.style.display = 'block';
                } else {
                    noFavoritesMessage.style.display = 'none';
                }
                allCards.forEach(card => {
                    const productId = card.dataset.productId;
                    if (favorites.includes(productId)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
    });
});


// Carrossel
let count = 1;
document.getElementById("radio1").checked = true;

setInterval( function (){
    nextImage();
},4000) 

function nextImage(){
    count++;
    if(count>4){
        count = 1;
    }
    document.getElementById("radio"+count).checked = true;
}