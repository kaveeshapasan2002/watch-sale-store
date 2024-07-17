<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="adminhomenew.php">Admin Dashboard</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="adminhome.php">Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="../website/shopnow.php">Product</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

    <div class="container mt-5">
        <h2>Update Product</h2>
        <?php
        include 'db.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-danger'>Product not found</div>";
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image_url = $_POST['image_url'];

            $sql = "UPDATE products SET name='$name', price='$price', description='$description', image_url='$image_url' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Product updated successfully</div>";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        }
        ?>
        <form action="update_product.php" method="post">
            <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Product Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo isset($row['price']) ? $row['price'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Product Description:</label>
                <textarea class="form-control" id="description" name="description" required><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image_url">Product Image URL:</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="<?php echo isset($row['image_url']) ? $row['image_url'] : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
</body>
</html>
