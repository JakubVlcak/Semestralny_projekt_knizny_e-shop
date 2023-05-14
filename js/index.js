function addToCart(id, idcart) {
    data = {
        "id": id,
        "idcart": idcart
    };
    fetch('add_to_cart.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.log(error));
    console.log(JSON.stringify(data));
}