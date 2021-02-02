<?php
 
    // $conn = mysqli_connect("localhost:8889", "root", "root", "tutorials");
 
    if (isset($_POST["addInvoice"]))
    {
        $customerName = $_POST["customerName"];
 
        // $sql = "INSERT INTO invoices (customerName) VALUES ('$customerName')";
        // mysqli_query($conn, $sql);
        // $invoiceId = mysqli_insert_id($conn);
 
        for ($a = 0; $a < count($_POST["itemName"]); $a++)
        {
            echo $_POST["itemName"][$a];
            // $sql = "INSERT INTO items (invoiceId, itemName, itemQuantity) VALUES ('$invoiceId', '" . $_POST["itemName"][$a] . "', '" . $_POST["itemQuantity"][$a] . "')";
            // mysqli_query($conn, $sql);
        }
 
        echo "<p>Invoice has been added.</p>";
    }
 
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table tr td,
    table tr th {
        border: 1px solid black;
        padding: 25px;
    }
</style>
</head>
<body>
<form method="POST" action="index.php">
    <input type="text" name="customerName" placeholder="Enter customer name" required>
 
    <table>
        <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Item Quantity</th>
        </tr>
        <tbody id="tbody"></tbody>
    </table>
 
    <button type="button" onclick="addItem();">Add Item</button>
    <input type="submit" name="addInvoice" value="Add Invoice">
</form>




<script>
    var items = 0;
    function addItem() {
        items++;
 
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='itemName[]'></td>";
            html += "<td><input type='number' name='itemQuantity[]'></td>";
            html += "<td><button type='button' onclick='deleteRow(this);'>Delete</button></td>"
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }
 
function deleteRow(button) {
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}
</script>
</body>
</html>
