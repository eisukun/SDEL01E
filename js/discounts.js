function handleDiscounts(current_discount) {
    quantity = parseInt(document.getElementById('Quantity').value)
    itemPrice = parseInt(document.getElementById('ItemPrice').value)
    totalPrice = quantity * itemPrice
    document.getElementById('Discount').value = current_discount * totalPrice
    document.getElementById('Discounted').value = totalPrice - (current_discount * totalPrice)
}
