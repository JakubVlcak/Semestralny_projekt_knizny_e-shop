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
    echo '<button onclick="addToCart(' . $item['idbooks'] . ',' . $_SESSION['idcart'] . ')" class="tm-btn tm-btn-blue">Add to cart</button>';
    echo '</div>';
    echo '</section>';
}


function get_books($conn)
{
    $per_page_record = 8;
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $per_page_record;
    $stmt = $conn->query("SELECT * FROM books LIMIT $start_from, $per_page_record");
    echo '<div class="tm-gallery">';
    echo '<div class="row">';
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
    echo '</div>';
    echo '</div>';
    echo '<nav class="tm-gallery-nav">';
    echo '<ul class="nav justify-content-center">';

    $stmt = $conn->query("SELECT COUNT(*) FROM books");
    $stmt->execute();
    $row = $stmt->fetch();
    $total_records = $row[0];

    
    // Number of pages required.   
    $total_pages = ceil($total_records / $per_page_record);
    $pagLink = "";

    if ($page > 2) {
        echo '<li class="nav-item"><a class="nav-link" href="index.php?page="' . ($page - 1) . '">  Prev </a>';
    }
    elseif($page == 2){
        echo '<li class="nav-item"><a class="nav-link" href="index.php"> Prev </a>';
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            $pagLink .= '<li class="nav-item"><a class="nav-link" "active" href="index.php?page='
                . $i . '">' . $i . ' </a>';
        } else {
            $pagLink .= '<li class="nav-item"><a class="nav-link" href="index.php?page=' . $i . '">   
                                                ' . $i . ' </a>';
        }
    };
    echo $pagLink;

    if ($page < $total_pages) {
        echo ' <li class="nav-item"><a class="nav-link" href="index.php?page=' . ($page + 1) . '">  Next </a>';
    }


    echo '</ul>';
    echo '</nav>';
}
function show_cart($conn)
{
    $stmt = get_books_from_cart($conn);
    while ($row = $stmt->fetch()) {
        echo '<tr>';
        echo '<td>' . $row["books_idbooks"] . '</td>';
        echo '<th scope="row">' . $row["title"] . '</th>';
        echo '<td>  <button onclick="plusToCart(' . $row["books_idbooks"] . ',' . $_SESSION['idcart'] . ')"><i class="fa-solid fa-plus"></i></button> ' . $row["count(books_has_cart.books_idbooks)"] . ' <button onclick="minusFromCart(' . $row["books_idbooks"] . ',' . $_SESSION['idcart'] . ')"><i class="fa-solid fa-minus"></i></button></td>';
        echo '<td>' . $row["price"] . ' € </td>';
        echo '<td>' . $row["total"] . ' € <button onclick="deleteFromCart(' . $row["books_idbooks"] . ',' . $_SESSION['idcart'] . ')"><i class="fa-solid fa-xmark"></i></button></td>';
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

function get_random_books($conn)
{
    echo'<div class="tm-gallery no-pad-b">';
    echo' <div class="row">';
    $stmt = random_books($conn);
    while ($row = $stmt->fetch()) {
    
                    
    echo'<figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item mb-5">';
                        echo'<a href="preview.php?id=' . $row['idbooks'] . '">';
                            echo'<div class="tm-gallery-item-overlay">';
                                echo'<img src="' . $row["urlimage"] . '" alt="Image" class="img-fluid tm-img-center">';
                            echo'</div>';
                            echo' <span class="text-nowrap tm-figcaption no-pad-b">' . $row["title"] . ' ' . $row["price"] . '€ </span>';
                        echo'</a>';
                        echo '<button onclick="addToCart(' . $row['idbooks'] . ',' . $_SESSION['idcart'] . ')">&#128722</button>';
                    echo'</figure>';
              
    }
    echo'</div>';
    echo'</div>';
}

function random_books($conn)
{
    $stmt = $conn->prepare("SELECT * FROM books ORDER BY RAND() LIMIT 4");
    $stmt->execute();
    return $stmt;
}