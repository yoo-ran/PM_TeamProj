<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/Logo-01.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            darkBlue:"#63888B",
            blue:"#85ACAF",
            lightBlue: "#AEC7C4",
            whiteBlue:"#F1EBE6",
            sand: "#E5D3BC",
            yellow: "#D9C5A0",
            white:"#f5f5f5",
            gray:"#999",
            pink:"#db5252",
            brown: "#886E3D",
          }
        }
      }
    }
  </script>
    <link rel="stylesheet" href="./styles/global.css">
    <title>Payment</title>
</head>
<body class="h-lvh bg-white">
    <header>
        <a href="./index.html"><img src="./images/Logo-01.png" alt="Header Logo"></a>
        <nav>
            <ul>
                <li><a href="./menu.html">Menu</a></li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
            <ul>
                <li><a href="./cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article class='bg-whiteBlue w-[40rem] p-10'>
            <h3 class="text-brown font-bold mb-6">Payment Details:</h3>
            <div class="inline-block text-left flex flex-col gap-y-4">
                <div>
                    <button type="button" class="inline-flex w-10/12 justify-between gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="" aria-expanded="true" aria-haspopup="true">
                    Google Pay
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                    </button>
                </div>
                <div>
                    <button type="button" class="inline-flex w-10/12 justify-between gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="" aria-expanded="true" aria-haspopup="true">
                    Apple Pay
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                    </button>
                </div>
                <div class="relative">
                    <button type="button" class="inline-flex w-10/12 justify-between gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                    Credit or Debit
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                    </button>
                        <div id="dropdown" class="absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none transition ease-out duration-100 opacity-0 scale-95" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 active:bg-gray-100 active:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-0"><i class="fa-brands fa-cc-visa"></i> BMO Bank **** 1234</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 active:bg-gray-100 active:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-1"><i class="fa-brands fa-cc-mastercard"></i> TD Bank **** 0987</a>
                            </div>
                        </div>
                </div>

            </div>
            <p>Your Credit cards are secured with SSL encryption on our website</p>
            <p>By providing your credit card information, you allow Coastal Cove Cafe to charge your card for future payments in accordance with thier terms.</p>
            <div class="inline-flex items-center">
                <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="check">
                    <input type="checkbox"
                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-darkBlue checked:bg-darkBlue checked:before:bg-darkBlue hover:before:opacity-10"
                    id="check" />
                    <span
                    class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                        stroke="currentColor" stroke-width="1">
                        <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                    </svg>
                    </span>
                </label>
                <label class="mt-px font-light text-gray-700 cursor-pointer select-none" htmlFor="check">
                    Save this card for future payment
                </label>
                </div> 
        </article>
    </main>
    <footer>
        <figure>
          <img src="/images/Logo-01.png" alt="Footer Logo">
          <figcaption>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-square-facebook"></i>
            <i class="fa-brands fa-youtube"></i>
          </figcaption>
        </figure>
          <ul>
            <li><a href="#"><h4>About</h4></a></li>
            <li>About</li>
            <li>Contact Us</li>
            <li>Catering Inquiry</li>
            <li>FAQ’s</li>
            <li>Terms and Policy</li>
          </ul>
          <ul>
            <li><a href="#"><h4>Shop</h4></a></li>
            <li>Coffee</li>
            <li>Gift Cards</li>
          </ul>
          <ul>
            <li><a href="#"><h4>Coffee</h4></a></li>
            <li>Blog Posts</li>
            <li>Transparency Reports</li>
            <li>Sourcing Philosophy</li>
            <li>Wholesale</li>
          </ul>
          <ul>
              <li><h4>Contact</h4></li>
              <li><i class="fa-solid fa-phone"></i>123.444.555</li>
              <li><i class="fa-regular fa-envelope"></i>coastalcove@mail.com</li>
              <li><i class="fa-solid fa-location-dot"></i>555 Seymour St, CA</li>
          </ul>
      </footer>

      <script>
    const dropdownMenu = document.querySelector("#dropdown");
const menuButton = document.getElementById('menu-button');

menuButton.addEventListener('click', () => {
  dropdownMenu.classList.toggle('opacity-100');
  dropdownMenu.classList.toggle('scale-100');
});
</script>
</body>
</html>