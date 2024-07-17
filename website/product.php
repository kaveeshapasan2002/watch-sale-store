<!DOCTYPE html>
<html>
<head>
    <title>Watch Store</title>
    <link rel="stylesheet" href="css/shopnow.css">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Bootstrap linked -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .main-content img {
            max-width: 80%;
            height: 500px;
            margin-bottom: 30px;
        }
        .product-details {
            margin-top: 80px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .product-details h2 {
            margin-bottom: 15px;
            font-size: 28px;
            font-family: 'Arial', sans-serif;
            color: #333;
            text-align: center;
        }
        .product-details p {
            margin-bottom: 10px;
            font-size: 18px;
            font-family: 'Arial', sans-serif;
            color: #666;
            text-align: center;
        }
        .product-details .btn {
            margin-top: 50px;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .product-details .btn:hover {
            background-color: #218838;
        }
        .main-content {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .navbar {
            padding-top: 5px;
            padding-bottom: 5px;
        }
        footer {
            margin-top: 10px;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        @media (max-width: 768px) {
            .navbar {
                padding-top: 5px;
                padding-bottom: 5px;
            }
            .main-content {
                margin-top: 5px;
                margin-bottom: 5px;
            }
            footer {
                margin-top: 5px;
                padding-top: 15px;
                padding-bottom: 15px;
            }
            .product-details {
                padding: 15px;
            }
            .product-details h2 {
                font-size: 24px;
            }
            .product-details p {
                font-size: 16px;
            }
            .product-details .btn {
                font-size: 16px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar section Start -->
    <div class="navbar-dark">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand py-3" href="#"><img src="img/wrist-watch.png" width="160" height="80" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shopnow.html">Shop Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-2" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Navbar section end -->

    <div class="container main-content">
        <div class="row">
            <?php
            include 'db.php';

            $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            if ($product_id > 0) {
                $sql = "SELECT * FROM products WHERE id = $product_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<div class='col-md-6'>
                            <img src='{$row['image_url']}' class='img-fluid' alt='Watch'>
                          </div>
                          <div class='col-md-6 product-details'>
                            <h2>{$row['name']}</h2>
                            <p>Price: LKR {$row['price']}/=</p>
                            <p>{$row['description']}</p>
                            <button id='buy-now' class='btn btn-success'>Buy Now</button>
                          </div>";
                } else {
                    echo "<p>Product not found.</p>";
                }
            } else {
                echo "<p>Invalid product ID.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script>
        document.getElementById('buy-now').addEventListener('click', function() {
            localStorage.setItem('productName', '<?php echo $row['name']; ?>');
            localStorage.setItem('productPrice', '<?php echo $row['price']; ?>');
            localStorage.setItem('productImage', '<?php echo $row['image_url']; ?>');
            window.location.href = 'payment.html';
        });
    </script>

    <!-- Footer section start -->
    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-6 col-lg-3 about-footer">
                        <h3>FOLLOW US</h3>
                        <br>
                        <img src="img/icons8-instagram.svg">
                        <a href="https://web.facebook.com/rolex/?_rdc=1&_rdr"></a>
                        <img src="img/icons8-facebook.svg">
                        <a href="" class="btn red-btn">Book Now</a>
                    </div>
                    <div class="col-md-6 col-lg-2 page-more-info">
                        <div class="footer-title">
                            <h4>MAIN MENU</h4>
                        </div>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Shop Now</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3 page-more-info">
                        <div class="footer-title">
                            <h4>More Info</h4>
                        </div>
                        <ul>
                            <li><a href="#">World Watches</a></li>
                            <li><a href="#">Rolex</a></li>
                            <li><a href="#">Casio</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4 open-hours">
                        <div class="footer-title">
                            <h4>BE IN THE KNOW</h4>
                        </div>
                        <p>Promotions, new products and sales.<br>Directly to your inbox</p>
                        <hr>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="footer-bottom container">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="">Privacy Policy</a>
                    </div>
                    <div class="col-sm-8">
                        <p>Watches @ 2024 All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer section end -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
