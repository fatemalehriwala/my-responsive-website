// login page



const bar = document.getElementById("bar");
const nav = document.getElementById("navbar");
const close = document.getElementById("close");
if (bar) {
  bar.addEventListener("click", () => {
    nav.classList.add("active");
  });
}

if (close) {
  close.addEventListener("click", () => {
    nav.classList.remove("active");
  });
}


// cart

function updateSubtotal(input) {
  // Get the price of the product
  let price = parseFloat(input.parentNode.previousElementSibling.innerText.replace('$', ''));
  // Get the quantity entered by the user
  let quantity = parseInt(input.value);
  // Calculate subtotal
  let subtotal = price * quantity;
  // Update the subtotal in the HTML
  input.parentNode.nextElementSibling.innerText = '$ ' + subtotal.toFixed(2);

  // Recalculate the total
  let total = 0;
  document.querySelectorAll('.quantity-input').forEach(function (input) {
      price = parseFloat(input.parentNode.previousElementSibling.innerText.replace('$', ''));
      quantity = parseInt(input.value);
      total += price * quantity;
  });
  document.getElementById('cart-subtotal').innerText = '$ ' + total.toFixed(2);
  document.getElementById('total').innerText = '$ ' + total.toFixed(2);
}