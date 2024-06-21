$('#messageModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Przyciski, które otworzyły modal
    var name = button.data('name');
    var subject = button.data('subject');
    var message = button.data('message');
    var id = button.data('id');

    // Aktualizuj zawartość modala
    var modal = $(this);
    modal.find('#modalName').text(name);
    modal.find('#sendReplyButton').val(id);
    modal.find('#modalSubject').text(subject);
    modal.find('#modalMessage').text(message);
    modal.find('#modalReply').val(''); // Wyczyść pole odpowiedzi
});