<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/AdminPanel.css" />
</head>
<body>
<?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
    
  ?>

<!-- Main Container -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">User Management</h2>

            <!-- User Table -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Users</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Login</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <!-- Placeholder for user rows -->
                            <tr>
                                <td>1</td>
                                <td>john_doe</td>
                                <td>
                                    <select class="form-select form-select-sm role-select">
                                        <option value="kupujący">Kupujący</option>
                                        <option value="niezarejestrowany">Niezarejestrowany</option>
                                        <option value="sprzedający">Sprzedający</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="support">Support</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Save</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>jane_smith</td>
                                <td>
                                    <select class="form-select form-select-sm role-select">
                                        <option value="kupujący">Kupujący</option>
                                        <option value="niezarejestrowany">Niezarejestrowany</option>
                                        <option value="sprzedający">Sprzedający</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="support">Support</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Save</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <!-- Example Widget -->
            <div class="card">
                <div class="card-header">
                    <h4>Widget 1</h4>
                </div>
                <div class="card-body">
                    <p>This could be a chart or summary of data.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Example Widget -->
            <div class="card">
                <div class="card-header">
                    <h4>Widget 2</h4>
                </div>
                <div class="card-body">
                    <p>This could be a chart or summary of data.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript to Handle Role Change and Save/Delete -->
<script src="../js/adminPanel.js"></script>

</body>
</html>
