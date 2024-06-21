      // Przykładowe saldo użytkownika
      var userBalance = 0.00; // PLN

      // Otwarcie modala do potwierdzenia doładowania
      $('#confirmModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Przyciski, które otworzyły modal
          var amount = parseFloat(button.data('amount')); // Kwota doładowania

          var newBalance = (userBalance + amount).toFixed(2);

          var modal = $(this);
          modal.find('#modalAmount').text(amount.toFixed(2));
          modal.find('#modalNewBalance').text(newBalance);
      });

      // Obsługa potwierdzenia doładowania
      $('#confirmAddFundsButton').on('click', function () {
          var modal = $('#confirmModal');
          var amount = parseFloat(modal.find('#modalAmount').text());

          // Zaktualizuj saldo użytkownika
          userBalance += amount;

          // Aktualizuj widoczne saldo
          $('#currentBalance').text(userBalance.toFixed(2));

          alert('Doładowanie zakończone sukcesem! Nowe saldo: ' + userBalance.toFixed(2) + ' PLN');

          // Zamknij modal
          modal.modal('hide');
      });