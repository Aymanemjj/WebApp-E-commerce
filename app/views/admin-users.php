            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin-dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Users dataTable
                            </div>
                            <div class="card-body">

                                <div class="mb-3">
                                    <button type="button" id="user-creat" class="btn btn-primary">New User</button>
                                </div>

                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

use app\controllers\AdminController;

                                        $adminController = new AdminController;
                                        $list = $adminController->showUsers();
                                        foreach ($list as $User) {
                                            echo '
                                            <tr>
                                            <td>' . $User->getFullname() . '</td>
                                            <td>' . $User->getEmail() . '</td>
                                            <td>' . $User->getJoined() . '</td>
                                            <td>' . $User->getRole() . '</td>
                                            <td>' . $User->getActive() . '</td>
                                            <td>
                                                <button type="submit" name="edit" value="' . $User->getId() . '" class="btn btn-secondary">Edit</button>
                                                <button type="submit" name="delete" value="' . $User->getId() . '" class="btn btn-danger">Delete</button>
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



                <div id="user-modal" class="modal">
                    <div class="container ">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="text-center font-weight-light my-4">Creat a user</h3>
                                        <button id="userModalClose" class="btn btn-outline-dark"><i class="fa-regular fa-rectangle-xmark"></i></button>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="firstname" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="lastname" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                        <label for="inputEmail">Email address</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-control" name="role">

                                                            <option value="">Role</option>
                                                            <option value="user">User</option>
                                                            <option value="admin">Admin</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" name="confirmPassword" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" value="register" class="btn btn-primary">Creat an account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>