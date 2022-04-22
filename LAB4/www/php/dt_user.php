<?php

require('../query/conDB.php');

?>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Sex</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM tb_user ORDER BY age ASC";
        $result = $mysqli->query($sql);
        $i = 1;
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['sname'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['sex'] ?></td>
                <td>
                <button<td class="btn-user" data-name="<?= $row['name'] ?>">DEL></button>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    $(".btn-del").click(function() {
        let data = $(this).data("name");
        alert($data);
        $.ajax({
            url:"./querty/user_del.php",
            method: "POST",
            data: {
                name:data
            },
            success:function(){
                    $("#div_content").load("./php/dt_user.php");
            }
        });
    });
</script>