jQuery(document).ready(function($) {
    // Muestra el carrito lateral cuando se agrega un producto al carrito
    $(document.body).on('added_to_cart', function() {
        $('#side-cart').addClass('open');
    });

    // Oculta el carrito lateral cuando se hace clic fuera de él
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#side-cart').length) {
            $('#side-cart').removeClass('open');
        }
    });
});