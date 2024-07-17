<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../website/adminhomenew.php">Admin Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="adminhomenew.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="../website/orders.php">Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="../website/shopnow.php">Store</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Products</h2>
        <div class="text-right mb-3">
            <a href="create_product.php" class="btn btn-success">Add Product</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['description']}</td>
                                <td><img src='{$row['image_url']}' width='50'></td>
                                <td>
                                    <a href='update_product.php?id={$row['id']}' class='btn btn-primary btn-sm'>Update</a>
                                    <a href='delete_product.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No products found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>


   





<div class="container">
        <h1>Order List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Address</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                </tr>
            </thead>
            <tbody>

            <?php
include 'db.php';

// Fetch orders
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['order_id'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $row['product_price'] . "</td>";
                        echo "<td><img src='" . $row['product_image'] . "' width='100'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>












</body>
</html>
