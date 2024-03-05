
<!---------- HTML/PHP code ------------------>
<div class="price">
  <span style="display:none;">$ <p  id="unit-price"><?php echo $product_row['price']; ?></p> </span>
	<span style="display:flex;">$ <p id="total-price"><?php echo  $product_row['price']; ?></p> </span> 
</div>

<button type="button" class="quantity-btn minus">-</button>
<input type="text" id="quantity" name="quantity" data-step="1" data-min="1" value="1" title="Qty" class="input-qty qty" size="4" readonly>
<button type="button" class="quantity-btn plus">+</button>


<!---------- JavaScript code ------------------>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const quantityInput = document.getElementById("quantity");
        const unitPrice = document.getElementById("unit-price");
        const totalPrice = document.getElementById("total-price");
        const minusButton = document.querySelector(".quantity-btn.minus");
        const plusButton = document.querySelector(".quantity-btn.plus");

        function updateTotalPrice() {
            let quantity = parseInt(quantityInput.value) || 0;
            let price = parseFloat(unitPrice.textContent) || 0;
            totalPrice.textContent = (quantity * price).toFixed(2);
        }

        minusButton.addEventListener("click", function() {
            let value = parseInt(quantityInput.value) || 0;
            const min = parseInt(quantityInput.getAttribute("data-min")) || 0;
            value = Math.max(min, value - (parseInt(quantityInput.getAttribute("data-step")) || 1));
            quantityInput.value = value;
            updateTotalPrice();
        });

        plusButton.addEventListener("click", function() {
            let value = parseInt(quantityInput.value) || 0;
            value += parseInt(quantityInput.getAttribute("data-step")) || 1;
            quantityInput.value = value;
            updateTotalPrice();
        });

        quantityInput.addEventListener("change", function() {
            updateTotalPrice();
        });
    });
</script>
