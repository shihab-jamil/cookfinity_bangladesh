<?php
    require_once('../../config.php');
    $uid = $_SESSION['uid'];

    if(isset($_POST['order_table'])){
        $criteria = $_POST['condition'];
        $all_data = get_order_table($criteria,$uid);  
        while($row = mysqli_fetch_array($all_data)){
            ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['meal_title'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['phone_number'] ?></td>
                    <td><?= date_format(date_create($row['delivery_date']),"jS M").', '.time_conversion($row['delivery_time']) ?></td>
                    <td>
                        <?php
                            if($row['status'] == 'Pending'){
                              ?>
                                <i class="fa fa-hourglass" title="Pending" aria-hidden="true"></i>
                              <?php
                            }else if($row['status'] == 'Active'){
                                 ?>
                                <i class="fa fa-circle text-success" title="Active" aria-hidden="true"></i>
                              <?php
                            }else if($row['status'] == 'Canceled'){
                                 ?>
                               <i class="fas fa-ban text-danger" title="Canceled"></i>
                              <?php
                            }else if($row['status'] == 'Confirmed'){
                                 ?>
                               <i class="fas fa-check-double text-success"></i>
                              <?php
                            }
                          ?>
                    </td>
                    <td>
                        <?php
                            if($row['status'] == 'Pending'){
                              ?>
                                <a href="./pages/DB/accept_order.php?id=<?= $row['id'] ?>" class="btn btn-success" title="Approve"><i class="fas fa-check"></i></a>
                                <a href="./pages/DB/decline_order.php?id=<?= $row['id'] ?>" class="btn btn-danger" title="Decline"><i class="fas fa-times"></i></i></a>
                              <?php
                            }else{
                                 ?>
                                <a href="" class="btn btn-success disabled" title="Approve"><i class="fas fa-check"></i></a>
                                <a href="" class="btn btn-danger disabled" title="Decline"><i class="fas fa-times"></i></i></a>
                              <?php
                            }
                          ?>
                    </td>
                </tr>
            <?php
        }
    }
?>



<script>
    $(function () {
        $("#example3").DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[ 0, "desc" ]]
        });
    });

</script>