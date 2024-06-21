// Funkcja generująca losową pozycję dla ikon
function getRandomPosition() {
    var windowWidth = $(window).width();
    var randomLeft = Math.floor(Math.random() * windowWidth);
    return { top: -100, left: randomLeft }; // Startowa pozycja na górze strony (-100px od góry)
}

// Lista dostępnych ikon
var iconList = [
    "sports_esports_FILL0_wght400_GRAD0_opsz24.png",
    "joystick_FILL0_wght400_GRAD0_opsz24.png",
    "sports_esports_FILL0_wght400_GRAD0_opsz24.png",
    "stadia_controller_FILL0_wght400_GRAD0_opsz24.png"
];

// Funkcja dodająca ikonę
function addIcon() {
    // Tworzenie elementu <img>
    var icon = document.createElement("img");
    // Ustawianie atrybutów
    var randomIconIndex = Math.floor(Math.random() * iconList.length);
    icon.src = "img/" + iconList[randomIconIndex];
    icon.alt = "Falling Icon";
    icon.style.position = "absolute";
    var position = getRandomPosition();
    icon.style.top = position.top + "px";
    icon.style.left = position.left + "px";
    // Dodanie ikony do kontenera
    document.getElementById("fallingIconsContainer").appendChild(icon);
    // Rozpoczęcie animacji spadania
    animateFalling(icon);
}

// Funkcja animująca spadanie ikony
function animateFalling(icon) {
    var windowHeight = $(window).height();
    $(icon).animate(
        {
            top: windowHeight + "px" // Końcowa pozycja na samym dole strony
        },
        100000, // Czas trwania animacji (5 sekund)
        "linear", // Rodzaj animacji (liniowa)
        function() {
            // Funkcja wywoływana po zakończeniu animacji
            // Usunięcie ikony z DOM po zakończeniu animacji
            $(icon).remove();
        }
    );
}

// Funkcja dodająca ikony w określonych odstępach czasu
function addFallingIcons() {
    // Dodawanie ikony co 200 ms (5 ikon na sekundę)
    addIcon();
    setTimeout(addFallingIcons, 1000); // Dodanie nowej ikony po krótkim opóźnieniu
}

// Wywołanie funkcji dodającej pierwszą ikonę
addFallingIcons();



function submitRegisterForm() {

    var request_data = $('#search-form').serialize();
    $.post('search.php', request_data, function(data, textStatus, jqXHR){
        $('#search-results').html(data);
        }, 'html');
    }

function submitLoginForm() {

    var request_data = $('#search-form').serialize();
    $.post('search.php', request_data, function(data, textStatus, jqXHR){
        $('#search-results').html(data);
        }, 'html');
    }