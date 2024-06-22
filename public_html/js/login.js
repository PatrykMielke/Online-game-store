// Walidacja formularza
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    // Walidacja email
    if (!validateEmail(email)) {
        showError('Wprowadź poprawny email.');
        return;
    }

    // Walidacja hasła (dla uproszczenia przykładu zakładam, że hasło musi mieć co najmniej 6 znaków)
    if (password.length < 6) {
        showError('Hasło musi mieć co najmniej 6 znaków.');
        return;
    }

    // Tutaj można dodać logikę logowania
    showError('Zalogowano pomyślnie!');
});

// Funkcja do walidacji email
function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return re.test(email);
}

// Funkcja do wyświetlania komunikatu błędu
function showError(message) {
    const errorElement = document.createElement('div');
    errorElement.className = 'error-message';
    errorElement.textContent = message;
    document.getElementById('errorMessages').appendChild(errorElement);
    
    setTimeout(() => {
        errorElement.remove();
    }, 3000);
}

// Generowanie spadających pasków
const container = document.querySelector('.falling-bars-container');

function createBar() {
    const bar = document.createElement('div');
    bar.className = 'falling-bar';
    bar.style.left = `${Math.random() * 100}%`; // Losowa pozycja pozioma
    container.appendChild(bar);
    
    // Usuwanie paska po zakończeniu animacji
    bar.addEventListener('animationend', () => {
        container.removeChild(bar);
    });
}

// Generowanie pasków co określony czas
setInterval(createBar, 300); // Co 300 milisekund (0.3 sekundy)
