function filterTable() {
    const searchCategory = $('#searchCategory').val();
    const searchInput = $('#searchInput').val().toLowerCase();
    $('#tableBody tr').each(function() {
        const row = $(this);
        let match = false;
        
        // Jeżeli wyszukujemy we wszystkich kolumnach
        if (searchCategory === 'all') {
            row.find('td').each(function() {
                if ($(this).text().toLowerCase().includes(searchInput)) {
                    match = true;
                    return false; // Przerwij pętlę, gdy znajdzie się dopasowanie
                }
            });
        } else {
            // Używamy wartości searchCategory jako indeksu kolumny
            const cell = row.find(`td:nth-child(${searchCategory})`);
            if (cell.text().toLowerCase().includes(searchInput)) {
                match = true;
            }
        }
        row.toggle(match);
    });
}

// Inicjalizacja
$(document).ready(function() {
    $('#searchInput').on('input', filterTable);
    $('#searchCategory').on('change', filterTable);
});