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


                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

use app\controllers\OrderController;

                                        $ordersController = new OrderController;
                                        $list = $ordersController->findAll();
                                        foreach ($list as $order) {
                                            echo '
                                            <tr>
                                            <td>' . $order->getDate() . '</td>
                                            <td>' . $order->getTotal() . '</td>
                                            <td>' . $order->getAddress() . '</td>
                                            <td>' . $order->getStatus() . '</td>
                                            <td>
                                                <button type="button" id="order-Edit" value="' . $order->getId() . '" class="btn btn-secondary">Edit</button>
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

