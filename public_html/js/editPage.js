// editPage.js
function previewProfileImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('profileImage');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

// Upewnij się, że funkcja jest dostępna globalnie
window.previewProfileImage = previewProfileImage;
