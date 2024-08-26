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

 const userActivityLabels = ['Dzień 1', 'Dzień 2', 'Dzień 3', 'Dzień 4', 'Dzień 5', 'Dzień 6', 'Dzień 7'];
 const userActivityData = [200, 150, 180, 220, 170, 190, 210];
 const userActivityLineCtx = document.getElementById('userActivityLineChart').getContext('2d');
 
 new Chart(userActivityLineCtx, {
     type: 'line',
     data: {
         labels: userActivityLabels,
         datasets: [{
             label: 'Aktywność',
             data: userActivityData,
             borderColor: 'rgba(75, 192, 192, 1)',
             backgroundColor: 'rgba(75, 192, 192, 0.2)',
             fill: true
         }]
     },
     options: {
         scales: {
             x: {
                 beginAtZero: true
             },
             y: {
                 beginAtZero: true
             }
         }
     }
 });


 const salesLabels = ['Tydzień 1', 'Tydzień 2', 'Tydzień 3', 'Tydzień 4', 'Tydzień 5', 'Tydzień 6', 'Tydzień 7'];
 const salesData = [5000, 10000, 15000, 20000, 25000, 30000, 35000];
 const salesLineCtx = document.getElementById('salesLineChart').getContext('2d');
 
 new Chart(salesLineCtx, {
     type: 'line',
     data: {
         labels: salesLabels,
         datasets: [{
             label: 'Sprzedaż',
             data: salesData,
             borderColor: 'rgba(153, 102, 255, 1)',
             backgroundColor: 'rgba(153, 102, 255, 0.2)',
             fill: true
         }]
     },
     options: {
         scales: {
             x: {
                 beginAtZero: true
             },
             y: {
                 beginAtZero: true
             }
         }
     }
 });

// User Age Data
const userAgeLabels = JSON.parse(document.getElementById('userAgeLabels').textContent);
const userAgeData = JSON.parse(document.getElementById('userAgeData').textContent);

const userAgeBarCtx = document.getElementById('userActivityBarChart').getContext('2d');

new Chart(userAgeBarCtx, {
    type: 'bar',
    data: {
        labels: userAgeLabels,
        datasets: [{
            label: 'Liczba użytkowników',
            data: userAgeData,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            fill: true
        }]
    },
    options: {
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        }
    }
});
