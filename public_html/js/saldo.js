      // Otwarcie modala do potwierdzenia doładowania
      $('#confirmModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Przyciski, które otworzyły modal
          var amount = parseFloat(button.data('amount')); // Kwota doładowania
          var modal = $(this);
          const wartosc = document.querySelector('#wartosc')
          wartosc.value = amount
          modal.find('#modalAmount').text(amount.toFixed(2));
      });
