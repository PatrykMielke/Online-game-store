<?php
session_start();

// Include database connection
include './php/config.php';

// Fetch all tags from the database
$sql_tags = "SELECT DISTINCT nazwa FROM tagi";
$result_tags = $conn->query($sql_tags);

$tags = [];
if ($result_tags->num_rows > 0) {
    while ($row_tag = $result_tags->fetch_assoc()) {
        $tags[] = $row_tag['nazwa'];
    }
}

// Initialize filter variables
$filter_tags = [];
if (!empty($_POST['tags'])) {
    $filter_tags = $_POST['tags'];
}

// Construct the base SQL query
$sql = "SELECT p.id_produktu, p.nazwa AS nazwa_produktu, p.id_wydawcy, p.ikona, p.cena, p.czy_dostepny, p.opis, GROUP_CONCAT(t.nazwa SEPARATOR ', ') AS tagi
        FROM produkty p
        LEFT JOIN tagi t ON p.id_produktu = t.id_produktu";

// Add availability condition
$sql .= " WHERE p.czy_dostepny = 1";

// Add filter for selected tags if any
if (!empty($filter_tags)) {
    $sql .= " GROUP BY p.id_produktu
              HAVING COUNT(DISTINCT CASE WHEN t.nazwa IN ('" . implode("','", $filter_tags) . "') THEN t.nazwa END) = " . count($filter_tags);
} else {
    $sql .= " GROUP BY p.id_produktu";
}   

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Biblioteca.css">
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body class="body-biblo">
    <?php 
    include 'templates/navbar.php';
    include 'templates/header.php';
    include 'templates/navbar2.php';
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar with filter options -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h5>Tagi</h5>
                    <!-- Display checkboxes for each tag -->
                    <form id="filterForm" method="post">
                        <?php foreach ($tags as $tag): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="<?php echo $tag; ?>" id="tag<?php echo $tag; ?>" <?php if (in_array($tag, $filter_tags)) echo "checked"; ?>>
                                <label class="form-check-label" for="tag<?php echo $tag; ?>"><?php echo $tag; ?></label>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary mt-2">Filtruj</button>
                    </form>
                </div>
            </nav>

            <!-- Main content area to display products -->
            <main class="col-md-10 ml-sm-auto col-lg-10 px-md-4">
				<!-- Display products based on the query result -->
				<div class="row rounded">
					<?php if ($result->num_rows > 0): ?>
						<?php while ($row = $result->fetch_assoc()): ?>
							<div class="col-md-4 rounded">
								<div class="card m-4 shadow shadow-xl border rounded text-white">
									<img src="./img/products/<?php echo $row['ikona']; ?>" alt="<?php echo $row['nazwa_produktu']; ?>" class="bd-placeholder-img card-img-top rounded" style="height: 18vh;">
									<div class="card-body rounded text-white">
										<h5 class="card-title bordered-text"><?php echo $row['nazwa_produktu']; ?></h5>
										<p class="card-text">Cena: <?php echo $row['cena']; ?> PLN</p>
										<p class="card-text">Opis: <?php echo $row['opis']; ?></p>
										<p class="card-text">Tagi: <?php echo $row['tagi']; ?></p>
										<button class="glitch text-white" onclick='location.href="stronaGry.php?id=<?php echo htmlspecialchars($row['id_produktu']); ?>"'>Zobacz teraz</button>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else: ?>
						<p>Brak produktów spełniających kryteria.</p>
					<?php endif; ?>
				</div>
			</main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
