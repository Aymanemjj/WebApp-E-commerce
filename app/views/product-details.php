        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=1420&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $product->getName() ?></h1>
                        <div class="fs-5 mb-5">
                            <span>$<?php echo $product->getPrice() ?>.00</span>
                        </div>
                        <p class="lead">
                            <?php echo $product->getDescription() ?>
                        </p>
                        <div class="d-flex">
                            <form action="" method="post" class="d-flex">

                                <input class="form-control text-center me-3" type="num" name="quantity" value="1" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="addToCart" value="<?php echo $product->getID() ?>">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>