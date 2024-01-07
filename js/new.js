function handleNew() {
    document.getElementById('ItemName').value = ""
    document.getElementById('ItemPrice').value = ""
    document.getElementById('Quantity').value = ""
    document.getElementById('Discount').value = ""
    document.getElementById('Discounted').value = ""
    document.getElementById('Cash').value = ""
    document.getElementById('Change').value = ""

    document.getElementById('senior').checked = false
    document.getElementById('discountCard').checked = false
    document.getElementById('employee').checked = false
    document.getElementById('noDiscount').checked = false
}
