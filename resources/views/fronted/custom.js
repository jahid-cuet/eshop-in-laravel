function incrementQuantity(button) {
    let quantityInput = button.parentElement.querySelector('.quantity');
    let currentValue = parseInt(quantityInput.value);
    if (currentValue < 10) {
      quantityInput.value = currentValue + 1;
    }
  }

  function decrementQuantity(button) {
    let quantityInput = button.parentElement.querySelector('.quantity');
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
    }
  }