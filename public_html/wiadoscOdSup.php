<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiadomości uzytkownika</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/wiadomoscOdSup.css">
</head>
<body>
<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
   
  ?>
<div class="container mt-5">
    <h2>Wiadomości</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Temat wiadomości</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Wiadomość 1</td>
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#modal1">Otwórz</button></td>
            </tr>
            <tr>
                <td>Wiadomość 2</td>
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#modal2">Otwórz</button></td>
            </tr>
            <!-- Dodaj więcej wierszy według potrzeby -->
        </tbody>
    </table>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal1Label">Wiadomość 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Treść wiadomości 1: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal2Label">Wiadomość 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Treść wiadomości 2: Vestibulum cursus turpis non urna mollis, vitae pharetra orci interdum.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
