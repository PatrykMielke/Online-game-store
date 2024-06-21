var userBalance = 100.00; // PLN

        // Otwieranie modala do potwierdzenia zakupu i wypełnianie danymi
        $('#purchaseModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Przyciski, które otworzyły modal
            var title = button.data('title');
            var price = button.data('price');

            var modal = $(this);
            modal.find('#gameTitle').text(title);
            modal.find('#gamePrice').text(price.toFixed(2));
            modal.find('#balanceAfterPurchase').text((userBalance - price).toFixed(2));
        });

        // Obsługa potwierdzenia zakupu
        $('#confirmPurchaseButton').on('click', function () {
            var modal = $('#purchaseModal');
            var price = parseFloat(modal.find('#gamePrice').text());

            // Zaktualizuj stan konta
            userBalance -= price;

            alert('Zakup zakończony sukcesem! Pozostały stan konta: ' + userBalance.toFixed(2) + ' PLN');

            // Zamknij modal
            modal.modal('hide');
        });