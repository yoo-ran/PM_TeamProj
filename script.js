const checkout = () => {
    document.querySelector(".checkout").style.display = "block";
    window.scrollTo(0, 0);
    document.querySelector(".bg").style.height = `${document.documentElement.scrollHeight}px`;
}

const disappear = () => {
    document.querySelector(".checkout").style.display = "none";
    document.querySelector(".bg").style.display = "none";
}

// Function to add item to the cart
function addToCart(itemId, size = 'M') {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let itemIndex = cart.findIndex(item => item.id === itemId && item.size === size);
    
    if (itemIndex > -1) {
        cart[itemIndex].quantity += 1;
    } else {
        cart.push({ id: itemId, quantity: 1, size: size });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartBadge();
    showPopupMessage(itemId); // Show popup message
}

// Function to update cart badge
function updateCartBadge() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let totalItems = cart.reduce((acc, item) => acc + item.quantity, 0);
    const cartIcon = document.querySelector('.fa-cart-shopping');
    
    if (totalItems > 0) {
        cartIcon.setAttribute('data-count', totalItems);
        cartIcon.classList.add('badge-visible');
    } else {
        cartIcon.removeAttribute('data-count');
        cartIcon.classList.remove('badge-visible');
    }
}

// Function to load cart items
function loadCartItems() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    fetch('get_cart_items.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(cart),
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Error:', data.error);
            return;
        }

        let cartTable = document.querySelector('.cart tbody');
        cartTable.innerHTML = ''; // Clear existing items

        let subtotal = 0;
        let hasNonMerch = false;

        data.forEach(item => {
            let itemTotal = item.price * item.quantity;
            subtotal += itemTotal;

            if (!item.is_merch) {
                hasNonMerch = true;
            }

            let sizeSelect = '';
            if (item.is_merch) {
                sizeSelect = `
                    <select disabled>
                        <option value="M" selected>M</option>
                    </select>
                `;
            } else {
                sizeSelect = `
                    <select onchange="updateItemSize(${item.id}, this.value)">
                        <option value="S" ${item.size === 'S' ? 'selected' : ''}>S</option>
                        <option value="M" ${item.size === 'M' ? 'selected' : ''}>M</option>
                        <option value="L" ${item.size === 'L' ? 'selected' : ''}>L</option>
                    </select>
                `;
            }

            let itemRow = `
                <tr>
                    <td><img src="${item.img}" alt="${item.name}"></td>
                    <td>${item.name}</td>
                    <td>${sizeSelect}</td>
                    <td>
                        <button class="quantity-button" onclick="changeItemQuantity(${item.id}, -1)">-</button>
                        <span>${item.quantity}</span>
                        <button class="quantity-button" onclick="changeItemQuantity(${item.id}, 1)">+</button>
                    </td>
                    <td>$${itemTotal.toFixed(2)}</td>
                    <td><button class="remove-button" onclick="removeCartItem(${item.id})">&times;</button></td>
                </tr>
            `;
            cartTable.insertAdjacentHTML('beforeend', itemRow);
        });

        let tax = subtotal * 0.1; // Assume 10% tax rate
        let total = subtotal + tax;

        document.querySelector('.total .subtotal').textContent = `$${subtotal.toFixed(2)}`;
        document.querySelector('.total .tax').textContent = `$${tax.toFixed(2)}`;
        document.querySelector('.total .total').textContent = `$${total.toFixed(2)}`;

        // Disable redeem button if only merch items are in the cart
        const redeemBtn = document.getElementById('redeemBtn');
        redeemBtn.disabled = !hasNonMerch;

        if (!hasNonMerch) {
            cancelRedeem(); // Ensure discount is reset if no eligible items
        }
    })
    .catch(error => {
        console.error('Error loading cart items:', error);
    });

    updateCartBadge(); // Ensure badge is updated when loading cart items
}

// Function to show the "item added" popup message
function showPopupMessage(itemId) {
    const itemElement = document.querySelector(`[data-item-id="${itemId}"]`);
    const popup = document.createElement('div');
    popup.classList.add('popup-message');
    popup.textContent = 'Item Added';
    
    itemElement.appendChild(popup);

    setTimeout(() => {
        popup.remove();
    }, 2000); // Remove the popup after 2 seconds
}

// Function to change item quantity
function changeItemQuantity(itemId, change) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let itemIndex = cart.findIndex(item => item.id === itemId);

    if (itemIndex > -1) {
        cart[itemIndex].quantity += change;
        if (cart[itemIndex].quantity <= 0) {
            cart.splice(itemIndex, 1);
        }
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    loadCartItems(); // Reload items to reflect changes
}

// Function to remove item from cart
function removeCartItem(itemId) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.id !== itemId);

    localStorage.setItem('cart', JSON.stringify(cart));
    loadCartItems(); // Reload items to reflect changes
}

// Function to update item size
function updateItemSize(itemId, size) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let itemIndex = cart.findIndex(item => item.id === itemId);

    if (itemIndex > -1) {
        cart[itemIndex].size = size;
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    loadCartItems(); // Reload items to reflect changes
}

// Function to redeem points
function redeemPoints() {
    let points = parseInt(document.getElementById('points').textContent);
    let redeemBtn = document.getElementById('redeemBtn');

    if (points >= 200 && !redeemBtn.classList.contains('redeemed')) {
        let discount = 5.00;
        document.querySelector('.total .discount').textContent = `-$${discount.toFixed(2)}`;
        
        let subtotal = parseFloat(document.querySelector('.total .subtotal').textContent.replace('$', ''));
        let tax = subtotal * 0.1;
        let total = subtotal + tax - discount;

        document.querySelector('.total .total').textContent = `$${total.toFixed(2)}`;
        
        // Set points to zero and show close button
        document.getElementById('points').textContent = '0';
        redeemBtn.classList.add('redeemed');
        document.querySelector('#redeemBtn .close-btn').style.display = 'block';
    } else {
        cancelRedeem();
    }
}

// Function to cancel redeem points
function cancelRedeem(event) {
    if (event) {
        event.stopPropagation(); // Prevent the redeem button click event from firing
    }
    document.querySelector('.total .discount').textContent = `-$0.00`;
    
    let subtotal = parseFloat(document.querySelector('.total .subtotal').textContent.replace('$', ''));
    let tax = subtotal * 0.1;
    let total = subtotal + tax;

    document.querySelector('.total .total').textContent = `$${total.toFixed(2)}`;
    
    // Re-enable the redeem button and hide close button
    document.getElementById('points').textContent = '200';
    document.getElementById('redeemBtn').classList.remove('redeemed');
    document.querySelector('#redeemBtn .close-btn').style.display = 'none';
}

// Initialize cart badge on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartBadge();
    if (document.querySelector('.cart')) {
        loadCartItems();
    }
});
