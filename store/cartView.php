<?php include '../view/header.php'; ?>
<main>
    <?php if (!empty($message)) : ?>
        <h3 class="invalid"><?php echo htmlspecialchars($message) ?></h3>
    <?php endif; ?>
        
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php foreach ($cart as $items) : ?>
            <tr>
                <td><?php echo htmlspecialchars($items['name']) ?></td>
                <td><?php echo htmlspecialchars($items['description']) ?></td>
                <td><?php echo htmlspecialchars($items['quantity']) ?></td>
                <td><?php echo htmlspecialchars(sprintf('%.2f', $items['linePrice'])) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td id="textAlign" colspan="3"><b>Subtotal</b></td>
            <td><?php echo sprintf('$%.2f', cartSubtotal()); ?></td>
        </tr>
    </table><br>
    <?php if (count($_SESSION['cart']) > 0) : ?>
        <p>
            Proceed to: <a href="?action=checkout">Checkout</a><br>
            Keep Shopping: <a href="?action=storeHome">Store</a><br>
        </p>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>