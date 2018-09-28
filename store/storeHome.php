<?php include '../view/header.php'; ?>
<main>
    <h2>Box to table ready </h2>

    <?php if (!empty($_SESSION['cart'])) : ?>
        <h3 class="admin">Go To <a href="../store/?action=cart">Cart</a></h3>
    <?php endif; ?> 

    <?php if (!empty($message)): ?>
        <h3 class="invalid"><?php echo htmlspecialchars($message) ?></h3>
    <?php endif; ?>

    <form action="." method="post" id="aligned">
        <legend>Search for products by category</legend>
        <br>
        <label for="categorySelect">Categories</label>
        <select id="categorySelect" name="categorySelect" autofocus>
            <?php foreach ($categoryNames as $cat) : ?>
                <option value="<?php echo htmlspecialchars($cat['categoryID']) ?>">
                    <?php echo htmlspecialchars($cat['categoryName']) ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="search">Search</label>
        <input type='text' id="search" name='search'>
        <br>
        <input type="hidden" name="action" value="category">
        <label>&nbsp;</label>
        <input type="submit" value="Show Me">
    </form>
    <?php if (isset($_SESSION['user']['userRole']) != 1): ?>
        <br>
    <?php endif; ?>

    <?php if (isset($_SESSION['user']['userRole']) == 1): ?>
        <form action="../admin/index.php" method="post" id="aligned">
            <legend>Add Category</legend>
            <br>
            <label class="invalid"><?php if (!empty($_SESSION['message'])): ?>
                    <?php echo htmlspecialchars($_SESSION['message']) ?><?php endif; ?></label>
            <br>
            <br>
            <label for="name">Category Name:</label>
            <input type='text' id="name" name='categoryName'>
            <br>
            <input type="hidden" name="action" value="category">
            <label>&nbsp;</label>
            <input type="submit" value="Add">
        </form>
        <br>
    <?php endif; ?>

    <?php if (!empty($allPoducts)): ?>
        <table>
            <caption><?php echo htmlspecialchars(ucwords(strtolower($title))) ?></caption>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <?php if (isset($_SESSION['user']['userRole']) == 1): ?>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                <?php else : ?>
                    <th class="colWidth">Quantity</th>
                <?php endif; ?>
            </tr>
            <?php foreach ($allPoducts as $products) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($products['productName']) ?></td>
                    <td><?php echo htmlspecialchars($products['description']) ?></td>
                    <td><?php echo htmlspecialchars($products['price']) ?></td>
                    <?php if (empty($_SESSION['user']) || isset($_SESSION['user']['userRole']) != 1): ?>
                        <td><form action="." method="post">
                                <input class="inputNum" type="number" name="quantity" min="0" value="1">
                                <input type="hidden" name="action" value="addProduct">
                                <input type="hidden" name="productID" value="<?php echo htmlspecialchars($products['productID']); ?>">
                                <input class="inputSub" type="submit" value="Add">
                            </form></td>
                    <?php else : ?>
                        <td><form action="../admin/index.php" method="post">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="editID" value="<?php echo htmlspecialchars($products['productID']); ?>">
                                <input class="inputSub" type="submit" value="Edit">
                            </form></td>
                        <td><form action="../admin/index.php" method="post">
                                <input type="hidden" name="action" value="deleteProduct">
                                <input type="hidden" name="deleteID" value="<?php echo htmlspecialchars($products['productID']); ?>">
                                <input class="inputSub" type="submit" value="Delete">
                            </form></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>