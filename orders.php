<?php
require_once "header.php";
$query="SELECT * FROM orders o INNER JOIN users u on o.ord_user=u.id INNER JOIN classes c on o.ord_room_class=c.class_id";
$res=mysqli_query($conn,$query);

?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>Place</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Room Type</th>
                                            <th>Persons</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        while($row=mysqli_fetch_assoc($res)){
                                            echo ' <tr>
                                            <td>'.$row["ord_id"].'</th>
                                            <td>'.$row["name"].'</td>
                                            <td>'.$row["ord_product"].'</td>
                                            <td>'.$row["ord_start_date"].'</td>
                                            <td>'.$row["ord_end_date"].'</td>
                                            <td>'.$row["class"].'</td>
                                            <td>'.$row["ord_persons"].'</td>
                                        </tr>';
                                        };

                                        ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

    </div>
            <!-- End of Main Content -->


<?php

require_once "footer.php"

?>