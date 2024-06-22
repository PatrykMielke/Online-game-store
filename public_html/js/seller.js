// Skrypt dla wykresu sprzedaży
var ctx = document.getElementById('salesChart').getContext('2d');
var salesChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    datasets: [{
      label: 'Sales',
      data: [1000, 1500, 1200, 1800, 2000, 2500],
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
  $('#editProductModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Przyciski, które otworzyły modal
        var card = button.closest('.card'); // Znajdź kartę produktu

        var name = card.find('.card-title').text().trim();
        var description = card.find('.card-text').eq(0).text().replace('Description: ', '').trim();
        var price = card.find('.card-text').eq(1).text().replace('Price: $', '').trim();

        var modal = $(this);
        modal.find('#editProductName').val(name);
        modal.find('#editProductDescription').val(description);
        modal.find('#editProductPrice').val(price);
    });

    // Obsługa zapisu zmian
    $('#saveChangesButton').on('click', function () {
        var modal = $('#editProductModal');
        var name = modal.find('#editProductName').val();
        var description = modal.find('#editProductDescription').val();
        var price = modal.find('#editProductPrice').val();

        // Walidacja danych
        if (name === '' || description === '' || price === '') {
            alert('Wszystkie pola są wymagane.');
            return;
        }

        var button = $('a[data-target="#editProductModal"]:visible');
        var card = button.closest('.card');

        // Aktualizuj dane w karcie
        card.find('.card-title').text(name);
        card.find('.card-text').eq(0).text('Description: ' + description);
        card.find('.card-text').eq(1).text('Price: $' + parseFloat(price).toFixed(2));

        // Zamknij modal
        modal.modal('hide'); });

         // Skrypt do obsługi potwierdzenia usunięcia produktu
         $('#deleteProductModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Przycisk, który otworzył modal
          var productName = button.data('product-name'); // Pobierz nazwę produktu z atrybutu data-product-name

          var modal = $(this);
          modal.find('#deleteProductName').text(productName);
      });
