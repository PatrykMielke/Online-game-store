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
    <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
        <a class="navbar-brand custom-navbar-brand" href="#"
            ><img
                src="../zdj/stadia_controller_FILL0_wght400_GRAD0_opsz24.png"
                alt="Logo"
                style="max-width: 100px"
        /></a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse custom-navbar-nav"
            id="navbarSupportedContent1"
        >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="../html/profilPage.html"
                        >Strona 1</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="#">Strona 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="#">Strona 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="../html/login.html"
                        ><img
                            src="../zdj/login_FILL0_wght400_GRAD0_opsz24.png"
                            alt="Logowanie"
                    /></a>
                </li>
            </ul>
        </div>
    </nav>
    <header
    class="jumbotron jumbotron-fluid text-white text-center custom-jumbotron"
>
    <div class="container">
        <h1 class="display-4 custom-jumbotron-heading">TRITON</h1>
    </div>
</header>

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
