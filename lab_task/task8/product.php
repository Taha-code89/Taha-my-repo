<?php
include "db.php";
include "header.php";
// <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h2 style="text-align:center;">Product Inventory</h2>

<table border="1" width="100%" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Company</th>
        <th>Price</th>
    </tr>

    <?php foreach ($products as $item) { ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['Name']; ?></td>
            <td><?php echo $item['Type']; ?></td>
            <td><?php echo $item['Company']; ?></td>
            <td><?php echo $item['Price']; ?></td>
        </tr>
    <?php } ?>
</table>

<?php include "footer.php"; ?>
