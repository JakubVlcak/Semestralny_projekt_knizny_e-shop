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
        echo '<figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">';
        echo '<a href="preview.php?id=' . $row['idbooks'] . '">';
        echo '<div class="tm-gallery-item-overlay">';
        echo '<img src="' . $row["urlimage"] . '" alt="Image" class="img-fluid tm-img-center">';
        echo '</div>';
        echo '<p class="tm-figcaption">' . $row["title"] . ' ' . $row["price"] . '€</p>';
        echo '</a>';
        echo '</figure>';
    }
}
