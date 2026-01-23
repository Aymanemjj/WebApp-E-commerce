            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin-dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Products dataTable
                            </div>
                            <div class="card-body">

                                <div class="mb-3">
                                    <button type="button" id="product-creat" class="btn btn-primary">New product</button>
                                    <button type="button" id="category-creat" class="btn btn-warning">New category</button>
                                </div>

                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Category</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Category</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

use app\controllers\AdminController;

                                        $adminController = new AdminController;
                                        $list = $adminController->showProducts();
                                        foreach ($list as $product) {
                                            echo '
                                            <tr>
                                            <td>' . $product->getName() . '</td>
                                            <td>' . $product->getPrice() . '</td>
                                            <td>' . $product->getStock() . '</td>
                                            <td>' . $product->getCategory() . '</td>
                                            <td>
                                                <button type="submit" name="edit" value="' . $product->getId() . '" class="btn btn-secondary">Edit</button>
                                                <button type="submit" name="delete" value="' . $product->getId() . '" class="btn btn-danger">Delete</button>
                                            </td>
                                            </tr>';
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>


                <div id="product-modal" class="modal">
                    <div class="container ">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="text-center font-weight-light my-4">Create a product</h3>
                                        <button id="productModalClose" class="btn btn-outline-dark"><i class="fa-regular fa-rectangle-xmark"></i></button>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="text" name="name" placeholder="Name" />
                                                        <label for="name">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="category">

                                                            <option value=""></option>
                                                            <?php


                                                            $list = $adminController->showCategorys();
                                                            foreach ($list as $category) {
                                                                echo '<option value="' . $category->getId() . '">'
                                                                    . $category->getName() .
                                                                    '</option>';
                                                            }

                                                            ?>

                                                        </select>
                                                        <label for="category">Category</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" maxlength="255" type="text" name="description" placeholder="description"></textarea>
                                                <label for="description">Description</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="number" name="price" placeholder="Product price" />
                                                        <label for="price">Price</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="number" name="stock" placeholder="Stock" />
                                                        <label for="stock">Stock</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid mt-4 mb-0">
                                                <button type="submit" name="submit" value="newProduct" class="btn btn-primary">New product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="category-modal" class="modal">
                    <div class="container ">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="text-center font-weight-light my-4">Create a category</h3>
                                        <button id="categoryModalClose" class="btn btn-outline-dark"><i class="fa-regular fa-rectangle-xmark"></i></button>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">

                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="name" placeholder="Name" />
                                                <label for="name">name</label>
                                            </div>
                                            <div class="d-grid mt-4 mb-0">
                                                <button type="submit" name="submit" value="newCategory" class="btn btn-primary">New category</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>