<?php if (($_SESSION['user']['userRole']) != 1) {
    header("Location: ..");
} ?>
<?php include '../view/header.php'; ?>
<main>
    <p>Product Edit</p>
    <form action="." method="post" id="aligned" enctype="multipart/form-data">

        <input type="hidden" name="action" value="edited">

        <label>Product Name:</label>
        <!--<input type="text" name="productName" value='<?php // echo htmlspecialchars($productName) ?>'> <br>-->
        <textarea cols="21" rows="2" name='productName'><?php echo htmlspecialchars($productName) ?></textarea><br>

        <label>Description:</label>
        <textarea cols="21" rows="5" name='description' ><?php echo htmlspecialchars($description) ?></textarea><br>

        <label>SKU:</label>
        <input type="text" name="SKU"value='<?php echo htmlspecialchars($SKU) ?>'> <br>

        <label>Vendor:</label>
        <select name="vendorSelect">
            <?php foreach ($vendorNames as $v) : ?>
            <option <?php if ($vendorID == $v['vendorID'] ):?> selected<?php endif;?>
                    value="<?php echo htmlspecialchars($v['vendorID']) ?>">
                    <?php echo htmlspecialchars($v['name']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Vendor SKU:</label>
        <input type="text" name="vendorSKU"value='<?php echo htmlspecialchars($vendorSKU) ?>'> <br>

        <!--add text box here to add category by typing-->
        <label>Add New Category</label>
        <input type="text" name="categories"> <br>
        <span>Separate multiple categories with commas</span><br>
        
        <label>Categories</label>
        <select name="categorySelect[]" multiple>
            <?php foreach ($categoryNames as $cat) : ?>
                <option value="<?php echo htmlspecialchars($cat['categoryID']) ?>">
                    <?php echo htmlspecialchars($cat['categoryName']) ?></option>
            <?php endforeach; ?>
        </select>
        <span>Select multiple categories</span><br>

        <label>Price:</label>
        <input type="text" name="price"value='<?php echo htmlspecialchars($price) ?>'> <br>
        
        <!--        <label>Picture:</label>
                <input type="file" name="image" /><br>
                <br>-->

        <!--<label>Venue Offered:</label>
                <select name="venueSelect">
        <?php // foreach ($allVenues as $ven) : ?>
                        <option value="<?php //echo htmlspecialchars($ven['venueID'])  ?>">
        <?php //echo htmlspecialchars($ven['name']) ?></option>
        <?php //endforeach; ?>
                </select><br>
                <span>NOTE!!!! Maybe make this multiple select</span><br>-->

        <label>&nbsp;</label>
        <input type="hidden" name="productID"value='<?php echo htmlspecialchars($productID) ?>'>
        <input type="submit" value="Edit Product"><br>
    </form>

</main>
<?php include '../view/footer.php'; ?>
