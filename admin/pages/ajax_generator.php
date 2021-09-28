<?php
    require_once('../../config.php');

    if(isset($_POST['admin_portal_table'])){
        $role_id = $_POST['role_id'];
        $all_data = get_users_per_role($role_id);
        while($row = mysqli_fetch_array($all_data)){
            ?>
                <tr >
                    <td>
                        <?= $row['id'] ?>
                        <a onclick="return confirm('do you wanna delete this item ?')" class="btn btn-default btn-sm" href="./pages/delete_user.php?id=<?= $row['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                        <a class="btn btn-default btn-sm" href="<?= './?page=edit_user&id='.$row['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td><?= $row['first_name'].' '.$row['last_name'] ?></td>
                    <td><?php $role_details = get_single_table_record('roles', 'id', $row['platform_role_id']); echo $role_details['role_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone_number'] ?></td>
                    <td><?= get_user_name_by_id($row['added_by']) ?></td>
                </tr>
            <?php
        }
    }
?>



<script>

    $(function () {
        $("#example5").DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[ 0, "desc" ]]
        });
        
    });
   
</script>