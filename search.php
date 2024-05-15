<?php
$connection = mysqli_connect("localhost", "root", "", "ajax");
$search = $_POST['search'];
$select = "SELECT * FROM student WHERE name LIKE '%{$search}%'";
$result = mysqli_query($connection, $select);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
<tr>

            <td> <?php echo $row['id'] ?> </td>
            <td> <?php echo $row['name'] ?> </td>
            <td> <?php echo $row['age'] ?> </td>
            <td> <?php echo $row['class'] ?> </td>
        </tr>

<?php
    }
}
?>