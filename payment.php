
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
        darkBlue: "#63888B",
        blue: "#85ACAF",
        lightBlue: "#AEC7C4",
        whiteBlue: "#F1EBE6",
        sand: "#E5D3BC",
        yellow: "#D9C5A0",
        white: "#f5f5f5",
        gray: "#999",
        pink: "#db5252",
        brown: "#886E3D",
      },
      margin: {
        '-46': '-46rem',
      },
    },
  },
};

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
            <li><a href="./login.php"><i class="fa-solid fa-user"></i></a></li>
        </ul>
    </nav>
</header>
    <main class=" w-full">
        <article class='bg-whiteBlue w-2/5 p-10 flex flex-col gap-y-4'>
            <h3 class="text-brown font-bold mb-6 text-6xl">Payment Details</h3>
            <div class="inline-block text-left flex flex-col gap-y-4">
                <div>
                    <button type="button" class="inline-flex w-full justify-between gap-x-1.5 rounded-md bg-white px-3 py-2 text-2xl  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="" aria-expanded="true" aria-haspopup="true">
                    Google Pay
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                    </button>
                </div>
                <div>
                    <button type="button" class="inline-flex w-full  justify-between gap-x-1.5 rounded-md bg-white px-3 py-2 text-2xl  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="" aria-expanded="true" aria-haspopup="true">
                    Apple Pay
                    <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                    </button>
                </div>
                <div class="relative">
                    <button type="button" class="inline-flex w-full  justify-between gap-x-1.5 rounded-md bg-white px-3 py-2 text-2xl  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
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
            <p class="text-2xl">Your Credit cards are secured with SSL encryption on our website</p>
            <p class="text-2xl">By providing your credit card information, you allow Coastal Cove Cafe to charge your card for future payments in accordance with thier terms.</p>
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
                <label class="mt-px font-light text-gray-700 text-2xl cursor-pointer select-none" htmlFor="check">
                    Save this card for future payment
                </label>
            </div> 
            <button class='bg-yellow block text-brown drop-shadow font-bold text-2xl p-3 hover:bg-sand' onclick='modalOpen()'>Confirm Order</button>
        </article>

        <!-- Confirmation -->
        <div id='confirmModal' data-open="false" class="fixed z-10 inset-0 overflow-y-auto hidden" >
          <div class='absolute w-full h-lvh bg-gray opacity-50'></div>
          <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
              <div class="fixed inset-0 transition-opacity">
                  <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
              </div>
              <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
              <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:-mt-46 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                  <div class="sm:flex sm:items-start">
                      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left flex flex-col items-center gap-y-4">
                          <div
                              class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue sm:mx-0 sm:h-10 sm:w-10 md:w-16 md:h-16 ">
                              <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                              </svg>
                          </div>
                          <h3 class="text-2xl leading-6 font-medium text-center text-gray-900 md:leading-8">
                              Thank you </br>
                              Your order has been received
                          </h3>
                          <div class="mt-2">
                              <p class="text-sm md:text-base leading-5 text-gray-500">
                                  Your order has been confirmed and the Confirmation email will be sent to you soon.
                              </p>
                          </div>
                      </div>
                  </div>
                  <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button 
                              onclick='modalClose("accept")'
                              class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue text-base leading-6 font-medium text-white shadow-sm hover:bg-darkBlue focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                              Accept
                            </button>
                      </span>
                      <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                          <button type="button"
                              onclick='modalClose()'
                              class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                              Cancel
                          </button>
                      </span>
                  </div>
              </div>
          </div>
      </div>
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

      <script src='./script.js'></script>

      
</body>
</html>