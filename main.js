function addToCart(name, price) {
    let qty = prompt("Enter quantity for " + name + ":", "1");
    if(qty != null && qty > 0) {
        // Redirect to payment page with data
        window.location.href = `payment.php?item=${name}&price=${price}&qty=${qty}`;
    }
}