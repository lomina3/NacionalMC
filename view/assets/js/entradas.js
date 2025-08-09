// entradas.js

// Definir un objeto para agrupar funciones relacionadas con entradas
const entradas = {
    updateTotalPrice: function(quantity) {
        const pricePerTicket = 100.00;
        const totalPrice = (parseFloat(quantity) * pricePerTicket).toFixed(2);
        
        document.getElementById('ticket-quantity-container input').textContent = quantity;
        document.getElementById('total-price').textContent = `$${totalPrice}`;
    },

    incrementQuantity: function() {
        const quantityInput = document.querySelector('.ticket-quantity-container input');
        quantityInput.value = Math.min(parseInt(quantityInput.value, 10) + 1, 10);
        this.updateTotalPrice(quantityInput.value);
    },

    decrementQuantity: function() {
        const quantityInput = document.querySelector('.ticket-quantity-container input');
        quantityInput.value = Math.max(parseInt(quantityInput.value, 10) - 1, 1);
        this.updateTotalPrice(quantityInput.value);
    },

    addToCart: function() {
        // Agrega aquí la lógica para añadir al carrito
        alert('Añadido al carrito');
    }
};

// POP-UP
function showPopup() {
    var popup = document.getElementById("infoPopup");
    popup.style.display = "block";
}

function hidePopup() {
    var popup = document.getElementById("infoPopup");
    popup.style.display = "none";
}


// BOTON
const cartButtons = document.querySelectorAll('.cart-button');

cartButtons.forEach(button => {
	button.addEventListener('click', cartClick);
});

function cartClick() {
	let button = this;
	button.classList.add('clicked');
}
