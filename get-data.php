<?php
$connection = mysqli_connect("localhost", "root", "", "ajax");
$select = "SELECT * FROM student";
$result = mysqli_query($connection, $select);
if ($result) {


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <tr>

            <td> <?php echo $row['id'] ?> </td>
            <td> <?php echo $row['name'] ?> </td>
            <td> <?php echo $row['age'] ?> </td>
            <td> <?php echo $row['class'] ?> </td>
        </tr>

<?php }
    }
}else{
    echo "error";
}

?>