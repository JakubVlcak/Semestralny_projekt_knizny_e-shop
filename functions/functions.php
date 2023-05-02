<?php
function preview($conn)
{
    $item_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM books WHERE idbooks = ?");
    $stmt->execute([$item_id]);
    $item = $stmt->fetch();
    return $item;
}

function get_preview($item, $conn)
{
    $item = preview($conn);
    echo '<section class="row tm-item-preview">';
    echo '<div class="col-md-6 col-sm-12 mb-md-0 mb-5">';
    echo '<img src="' . $item["urlimage"] . '" alt="Image" class="img-fluid tm-img-center-sm">';
    echo '</div>';
    echo '<div class="col-md-6 col-sm-12">';
    echo '<h2 class="tm-blue-text tm-margin-b-p">' . $item["title"] . '</h2>';
    echo '<p class="tm-margin-b-p">' . $item["description"] . '</p>';
    echo '<p class="tm-blue-text tm-margin-b">Price: ' . $item["price"] . ' €</p>';
    echo '<a href="#" class="tm-btn tm-btn-blue">Add to cart</a>';
    echo '</div>';
    echo '</section>';
}


function get_books($conn)
{
    $stmt = $conn->query("SELECT * FROM books");
    while ($row = $stmt->fetch()) {
        echo '<figure class="text-center col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
        echo '<a href="preview.php?id=' . $row['idbooks'] . '">';
        echo '<div class="tm-gallery-item-overlay">';
        echo '<img src="' . $row["urlimage"] . '" alt="Image" class="img-fluid tm-img-center">';
        echo '</div>';
        echo '<span class="tm-figcaption">' . $row["title"] . ' ' . $row["price"] . '€ </span>';
        echo '</a>';
        echo '<button onclick="addToCart(' . $row['idbooks'] . ',' . $_SESSION['idcart'] . ')">&#128722</button>';
        echo '</figure>';
    }
}
function show_cart($conn)
{
    $stmt = get_books_from_cart($conn);
    while ($row = $stmt->fetch()) {
        echo '<tr>';
        echo '<td>' . $row["books_idbooks"] . '</td>';
        echo '<th scope="row">' . $row["title"] . '</th>';
        echo '<td>' . $row["count(books_has_cart.books_idbooks)"] . '</td>';
        echo '<td>' . $row["price"] . '</td>';
        echo '<td>' . $row["total"] . '</td>';
        echo  '</tr>';
    }
}
function get_books_from_cart($conn)
{
    $stmt = $conn->prepare("SELECT count(books_has_cart.books_idbooks),books.price,books.title,books_has_cart.books_idbooks,(books.price*count(books_has_cart.books_idbooks)) as total from books_has_cart inner join books on books.idbooks = books_has_cart.books_idbooks
    inner join cart on cart.idcart = books_has_cart.cart_idcart
    where cart.users_idusers = ?
    group by books_has_cart.books_idbooks");
    $stmt->execute([$_SESSION['iduser']]);
    return $stmt;
}
