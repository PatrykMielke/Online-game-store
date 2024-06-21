$('#messageModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Przyciski, które otworzyły modal
    var name = button.data('name');
    var email = button.data('email');
    var subject = button.data('subject');
    var message = button.data('message');
    
    // Aktualizuj zawartość modala
    var modal = $(this);
    modal.find('#modalName').text(name);
    modal.find('#modalEmail').text(email);
    modal.find('#modalSubject').text(subject);
    modal.find('#modalMessage').text(message);
    modal.find('#modalReply').val(''); // Wyczyść pole odpowiedzi
});

$('#sendReplyButton').on('click', function () {
    var reply = $('#modalReply').val();
    if (reply.trim() === '') {
        alert('Proszę wpisać odpowiedź.');
        return;
    }

    // Pobierz informacje z modala
    var name = $('#modalName').text();
    var email = $('#modalEmail').text();
    var subject = $('#modalSubject').text();

    // Pokaż odpowiedź w konsoli (zastąp to kodem wysyłającym na serwer w prawdziwej aplikacji)
    console.log(`Odpowiedź do ${name} (${email}):`);
    console.log(`Temat: ${subject}`);
    console.log(`Treść odpowiedzi: ${reply}`);

    // Zamknij modal
    $('#messageModal').modal('hide');

    // Opcjonalnie, możesz dodać powiadomienie lub inną logikę tutaj
    alert('Odpowiedź została wysłana.');
});