

const checkout = () => {
    document.querySelector(".checkout").style.display = "block";
    window.scrollTo(0, 0);
    document.querySelector(".bg").style.height = `${document.documentElement.scrollHeight}px`;

   

    const cartLocal = localStorage.getItem('cart');
    if (cartLocal) {
        const menuItems = JSON.parse(cartLocal);

        // Get the container where we will display the data
        const dataContainer = document.getElementById('itemContainer');

        // Clear the container (optional, in case of refresh or existing data)
        dataContainer.innerHTML = '';

        const totalCheckout = document.querySelectorAll(".totalCheckout")
        const totalLocal = JSON.parse(localStorage.getItem("totalLocal"))
        const totalLocalVal = Object.values(totalLocal)
        for (let i = 0; i < totalLocalVal.length; i++) {
            totalCheckout[i].innerHTML = `${totalLocalVal[i].toFixed(2)}`
        }

        // Loop through the menu items and create HTML elements
        menuItems.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'item';
            itemDiv.innerHTML = `<img id='itemImg' src="${item.img}" alt="">
            <div id="descrp">
                <div>
                    <div id="nameBox">
                        <p id='itemName'>${item.name}</p>
                        <span id='itemPrice'>$${item.price}</span>
                    </div>
                    <div>
                        <p id='itemSize'>Size: ${item.size}</p>
                        <p id='itemSize'>Quantity: ${item.quantity}</p>
                    </div>
                </div>
                <div>
                    <p>*redeem</p>
                </div>
            </div>`;
            dataContainer.appendChild(itemDiv);
        });

        
    } else {
        // Handle the case where there is no data in localStorage
        dataContainer.innerHTML = '<p>No data available.</p>';
    }

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

let totalObj = {
    subtotal:0,
    tax:0,
    points:0,
    discount:0,
    total:0
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

        console.log(data);
        localStorage.setItem("cart", JSON.stringify(data))
        data.forEach(item => {
            let itemTotal = item.price * item.quantity;
            totalObj.subtotal += itemTotal;

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

        totalObj.tax = totalObj.subtotal * 0.1; // Assume 10% tax rate
        totalObj.total = totalObj.subtotal + totalObj.tax;

        document.querySelector('.total .subtotal').textContent = `$${totalObj.subtotal.toFixed(2)}`;
        document.querySelector('.total .tax').textContent = `$${totalObj.tax.toFixed(2)}`;
        document.querySelector('.total .total').textContent = `$${totalObj.total.toFixed(2)}`;

        localStorage.setItem("totalLocal", JSON.stringify(totalObj))

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
    totalObj.points = points
    let redeemBtn = document.getElementById('redeemBtn');

    if (points >= 200 && !redeemBtn.classList.contains('redeemed')) {
        let discount = points / 40;
        totalObj.discount = discount;
        document.querySelector('.total .discount').textContent = `-$${totalObj.discount.toFixed(2)}`;
        
        totalObj.subtotal = parseFloat(document.querySelector('.total .subtotal').textContent.replace('$', ''));
        totalObj.tax = totalObj.subtotal * 0.1;
        totalObj.total = totalObj.subtotal + totalObj.tax - totalObj.discount;
        totalObj.points = points - (discount*40)

        document.querySelector('.total .total').textContent = `$${totalObj.total.toFixed(2)}`;
        
        // Set points to zero and show close button
        document.getElementById('points').textContent = '0';
        redeemBtn.classList.add('redeemed');
        document.querySelector('#redeemBtn .close-btn').style.display = 'block';

        localStorage.setItem("totalLocal", JSON.stringify(totalObj))
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
    
    totalObj.subtotal = parseFloat(document.querySelector('.total .subtotal').textContent.replace('$', ''));
    totalObj.tax = totalObj.subtotal * 0.1;
    totalObj.total = totalObj.subtotal + totalObj.tax;

    console.log(totalObj);

    document.querySelector('.total .total').textContent = `$${totalObj.total.toFixed(2)}`;
    
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


const dropdownMenu = document.querySelector("#dropdown");
const menuButton = document.getElementById('menu-button');

menuButton.addEventListener('click', () => {
  dropdownMenu.classList.toggle('opacity-100');
  dropdownMenu.classList.toggle('scale-100');
});

const confirmModal = document.querySelector("#confirmModal")
let isOpen = confirmModal.dataset.open
const modalOpen = () => {
console.log(Boolean(isOpen));
  if(Boolean(isOpen)){
    confirmModal.classList.remove("hidden")
    isOpen= "false";
  }else{
    confirmModal.classList.add("hidden")
    isOpen = "true";
  }
}



const modalClose = (btn) => {
    confirmModal.classList.add("hidden")

    if(btn=="accept"){
        const userSession = JSON.parse(sessionStorage.getItem("user"))
        const totalLocal = JSON.parse(localStorage.getItem("totalLocal"))

        userSession.reward = totalLocal.points
        sessionStorage.setItem("user", JSON.stringify(userSession))
        localStorage.removeItem("cart")
        updateCartBadge();
    }
}