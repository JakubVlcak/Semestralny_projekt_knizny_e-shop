function plusToCart(idbook, idcart) {
    data = {
        "id": idbook,
        "idcart": idcart
    };
    fetch('plus_to_cart.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.log(error));
    console.log(JSON.stringify(data));
    location.reload();
}
function minusFromCart(idbook, idcart) {
    data = {
        "id": idbook,
        "idcart": idcart
    };
    fetch('minus_to_cart.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.log(error));
    console.log(JSON.stringify(data));
    location.reload();
}
function deleteFromCart(idbook, idcart) {
    data = {
        "id": idbook,
        "idcart": idcart
    };
    fetch('delete_from_cart.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(data) })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.log(error));
    console.log(JSON.stringify(data));
    location.reload();
}