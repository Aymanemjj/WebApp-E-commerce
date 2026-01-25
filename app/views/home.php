        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class=" mb-3">
                    <form method="post" action="">
                        <label for="category">Category</label>

                        <select class="form-control" name="category">

                            <option value=""></option>
                            <?php

                            use app\controllers\AdminController;

                            $adminController = new AdminController;
                            $list = $adminController->showCategorys();
                            foreach ($list as $category) {
                                echo '<option value="' . $category->getId() . '">'
                                    . $category->getName() .
                                    '</option>';
                            }

                            ?>

                        </select>

                        <button type="submit" value="categoryFilter" class="btn btn-primary mt-3">Filter</button>

                    </form>
                </div>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <?php


                    if (isset($_POST['category'])) {

                        foreach ($params['products'] as $product) {
                            if ($product->getCategory() === $_POST['category']) {
                                echo '
                            <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=1420&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                <small>' . $product->getCategory() . '</small>
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">' . $product->getName() . '</h5>
                                    <!-- Product price-->
                                    ' . $product->getPrice() . '$
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><form action = "" method = "post"><button type="submit" name="viewDetails" value=' . $product->getId() . ' class="btn btn-primary mt-3">Filter</button></div>
                            </div>
                        </div>
                    </div>';
                            }
                        }
                    } else {
                        foreach ($params['products'] as $product) {

                            echo '
                            <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=1420&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <small>' . $product->getCategory() . '</small>
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">' . $product->getName() . '</h5>
                                    <!-- Product price-->
                                    ' . $product->getPrice() . '$
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/product-details?id=' . $product->getId() . '">View details</a></div>
                            </div>
                        </div>
                    </div>';
                        }
                    }




                    ?>

                </div>
            </div>
            </div>
            </div>
        </section>