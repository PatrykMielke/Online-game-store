<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seller Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/SellerPanel.css" />
</head>
<body>
    <?php 
        include 'templates/navbar.php';
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h2>Sprzedawane produkty <a href="dodajgre.php"><button type="button" class="btn btn-primary">Wystaw nową grę</button></a></h2>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">
                            Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut aliquam, odio a suscipit blandit.
                        </p>
                        <p class="card-text">Price: $10</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editProductModal">Edytuj</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductModal" data-product-name="Product Name">Zakończ sprzedaż</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <p class="card-text">$1000</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">50</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Average Order Value</h5>
                        <p class="card-text">$20</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h2>Sales Overview</h2>
                <canvas id="salesChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <!-- Modal do edycji produktu -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edytuj Produkt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm">
                        <div class="form-group">
                            <label for="editProductName">Nazwa gry</label>
                            <input type="text" class="form-control" id="editProductName" required />
                        </div>
                        <div class="form-group">
                            <label for="editProductDescription">Opis</label>
                            <textarea class="form-control" id="editProductDescription" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editProductPrice">Cena</label>
                            <input type="number" class="form-control" id="editProductPrice" step="0.01" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-primary" id="saveChangesButton">Zapisz zmiany</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal do potwierdzenia usunięcia produktu -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Potwierdzenie Usunięcia Produktu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Czy na pewno chcesz usunąć produkt "<span id="deleteProductName"></span>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-danger" id="deleteProductButton">Usuń</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Skrypty JS (jQuery, Popper.js, Bootstrap, Chart.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- Skrypt JavaScript do obsługi modali i innych funkcji -->
    <script src="js/seller.js"></script>

    <script>
       
    </script>
</body>
</html>
