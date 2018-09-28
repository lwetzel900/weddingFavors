<?php include '../view/header.php'; ?>
<main>
    <table>
        <caption>Invoice Number <?php echo htmlspecialchars($idOrder) ?></caption>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php foreach ($invoice as $items) : ?>
            <tr>
                <td><?php echo htmlspecialchars($items['name']) ?></td>
                <td><?php echo htmlspecialchars($items['description']) ?></td>
                <td><?php echo htmlspecialchars($items['quantity']) ?></td>
                <td><?php echo htmlspecialchars(sprintf('$%.2f',$items['linePrice'])) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td id="textAlign" colspan="3"><b>Subtotal</b></td>
            <td><?php echo htmlspecialchars(sprintf('$%.2f', $subtotal)); ?></td>
        </tr>
        <tr>
            <td id="textAlign" colspan="3"><b>Sales Tax</b></td>
            <td><?php echo htmlspecialchars(sprintf('$%.2f', $salesTax)); ?></td>
        </tr>
        <tr>
            <td id="textAlign" colspan="3"><b>Shipping</b></td>
            <td><?php echo htmlspecialchars(sprintf('$%.2f', $shipping)); ?></td>
        </tr>
        <tr>
            <td id="textAlign" colspan="3"><b>Grand Total</b></td>
            <td><?php echo htmlspecialchars(sprintf('$%.2f', $total)); ?></td>
        </tr>
        
    </table><br>

</main>
<?php include '../view/footer.php'; ?>