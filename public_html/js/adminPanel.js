document.querySelectorAll('.role-select').forEach(function(select) {
    select.addEventListener('change', function() {
        const role = this.value;
        // Handle role change logic here
        console.log(`Role changed to: ${role}`);
    });
});

document.querySelectorAll('.btn-primary').forEach(function(button) {
    button.addEventListener('click', function() {
        // Handle save action
        alert('Role saved successfully!');
    });
});

document.querySelectorAll('.btn-danger').forEach(function(button) {
    button.addEventListener('click', function() {
        // Handle delete action
        if (confirm('Are you sure you want to delete this user?')) {
            this.closest('tr').remove();
        }
    });
});
