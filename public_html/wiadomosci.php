<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Odczytywanie Wiadomości</title>
		<link
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="css/SupPage.css" />
	</head>
	<body>
	<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
    
  ?>

<div class="container messages-table">
        <div class="table-wrapper">
            <h3 class="text-center">Wiadomości od Użytkowników</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Imię i Nazwisko</th>
                        <th>Email</th>
                        <th>Temat</th>
                        <th>Wiadomość</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jan Kowalski</td>
                        <td>jan.kowalski@example.com</td>
                        <td>Problem z logowaniem</td>
                        <td>
                            <button
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#messageModal"
                                data-name="Jan Kowalski"
                                data-email="jan.kowalski@example.com"
                                data-subject="Problem z logowaniem"
                                data-message="Opis problemu..."
                                type="button"
                            >
                                Otwórz
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Anna Nowak</td>
                        <td>anna.nowak@example.com</td>
                        <td>Zapytanie o produkt</td>
                        <td>
                            <button
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#messageModal"
                                data-name="Anna Nowak"
                                data-email="anna.nowak@example.com"
                                data-subject="Zapytanie o produkt"
                                data-message="Opis zapytania..."
                                type="button"
                            >
                                Otwórz
                            </button>
                        </td>
                    </tr>
                    <!-- Dodaj więcej wierszy według potrzeb -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Szczegóły Wiadomości</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Imię i Nazwisko:</strong> <span id="modalName"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Temat:</strong> <span id="modalSubject"></span></p>
                    <p><strong>Wiadomość:</strong> <span id="modalMessage"></span></p>
                    <hr>
                    <div class="form-group">
                        <label for="modalReply">Twoja Odpowiedź:</label>
                        <textarea class="form-control" id="modalReply" rows="4" placeholder="Wpisz swoją odpowiedź tutaj..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                    <button type="button" class="btn btn-primary" id="sendReplyButton">Wyślij</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/wiadomosc.js">
       
    </script>
</body>
</html>