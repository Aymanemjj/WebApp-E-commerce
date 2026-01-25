<?php
session_start();


$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!-- Header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Your Cart</h1>
            <p class="lead fw-normal text-white-50 mb-0">Review your selected items</p>
        </div>
    </div>
</header>

<!-- Cart Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <?php if (empty($cart)): ?>
            <div class="text-center">
                <h4>Your cart is empty 🛍️</h4>
                <a href="/" class="btn btn-primary mt-3">Continue shopping</a>
            </div>
        <?php else: ?>

            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-8">

                    <?php foreach ($cart as $item): 
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row align-items-center">

                                    <div class="col-md-3">
                                        <img class="img-fluid rounded"
                                             src="https://images.unsplash.com/photo-1531297484001-80022131f5a1"
                                             alt="">
                                    </div>

                                    <div class="col-md-4 text-center text-md-start">
                                        <h5 class="fw-bolder"><?= htmlspecialchars($item['name']) ?></h5>
                                        <small class="text-muted"><?= $item['price'] ?> $</small>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <span class="fw-bold"><?= $item['quantity'] ?></span>
                                    </div>

                                    <div class="col-md-2 text-center fw-bold">
                                        <?= $subtotal ?> $
                                    </div>

                                    <div class="col-md-1 text-center">
                                        <form method="post" action="">
                                            <button class="btn btn-outline-danger btn-sm"
                                                    name="remove"
                                                    value="<?= $item['id'] ?>">
                                                ✕
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <!-- Summary -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fw-bolder mb-3">Order Summary</h5>

                            <div class="d-flex justify-content-between">
                                <span>Total</span>
                                <span class="fw-bold"><?= $total ?> $</span>
                            </div>

                            <hr>

                            <div class="d-grid">
                                <a href="/checkout" class="btn btn-primary">
                                    Proceed to Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php endif; ?>

    </div>
</section>
