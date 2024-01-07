function handleChange() {
    cashGiven = parseInt(document.getElementById('Cash').value)
    quantity = parseInt(document.getElementById('Quantity').value)
    itemPrice = parseInt(document.getElementById('ItemPrice').value)
    discount = parseInt(document.getElementById('Discount').value)
    discounted = parseInt(document.getElementById('Discounted').value)
    totalPrice = quantity * itemPrice

    totalQuantity += quantity
    totalDiscount += discount
    totalDiscounted += discounted

    document.getElementById('Change').value = cashGiven - discounted
    document.getElementById('totalQuantity').value = totalQuantity
    document.getElementById('totalDiscount').value = totalDiscount
    document.getElementById('totalDiscounted').value = totalDiscounted
}