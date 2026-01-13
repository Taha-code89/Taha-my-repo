<?php
include "db.php";
include "header.php";

// Fetch all products from database
$query = "SELECT * FROM products";
$resultSet = mysqli_query($conn, $query);
$products = mysqli_fetch_all($resultSet, MYSQLI_ASSOC);
?>

<h2 style="text-align:center; margin-top:20px; color:#333;">Product Inventory</h2>

<table style="width:100%; border-collapse:collapse; text-align:center; margin-top:20px;">
    <thead style="background-color:#f0f0f0;">
        <tr>
            <th style="padding:8px; border:1px solid #ccc;">ID</th>
            <th style="padding:8px; border:1px solid #ccc;">Name</th>
            <th style="padding:8px; border:1px solid #ccc;">Type</th>
            <th style="padding:8px; border:1px solid #ccc;">Company</th>
            <th style="padding:8px; border:1px solid #ccc;">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $item) { ?>
            <tr>
                <td style="padding:8px; border:1px solid #ccc;"><?php echo $item['id']; ?></td>
                <td style="padding:8px; border:1px solid #ccc;"><?php echo $item['Name']; ?></td>
                <td style="padding:8px; border:1px solid #ccc;"><?php echo $item['Type']; ?></td>
                <td style="padding:8px; border:1px solid #ccc;"><?php echo $item['Company']; ?></td>
                <td style="padding:8px; border:1px solid #ccc;"><?php echo $item['Price']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "footer.php"; ?>