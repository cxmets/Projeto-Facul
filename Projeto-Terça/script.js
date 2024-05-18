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
            const formData = new FormData();
            formData.append('product_id', productId);

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
                    // msg de confirmação de que foi para o carrinho - depoiss.
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
