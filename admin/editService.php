<?php if (($_SESSION['user']['userRole']) != 1) {
    header("Location: ..");
} ?>
<?php include '../view/header.php'; ?>
<main>
    <h2>Edit Services</h2><br>
    
    <form action='' method='post' id="aligned" enctype="multipart/form-data">
        <input type='hidden' name='action' value='updateService'>
        <input type='hidden' name='ID' value='<?php echo htmlspecialchars($serviceID) ?>'>
        
        <label>Type: </label>
        <input type='text' name='type' value='<?php echo htmlspecialchars($type) ?>'><br>

        <label>Description: </label>
        <textarea cols="21" rows="5" name='description' ><?php echo htmlspecialchars($description) ?></textarea><br>

        <label>Current picture:</label>
        <image src="<?php echo htmlspecialchars('/' . $basedir . '/' . $pic); ?>" height="100" width="150"><br><br>
        <input type="hidden" name="imageLocation"
                               value="<?php echo htmlspecialchars($pic); ?>">
        
        <label>Upload New Picture:</label>
        <input type="file" name="image" /><br>
        
        <label>Currently offered at: </label>
        <textarea cols="21" rows="3" readonly="true"><?php foreach ($name as $n) : ?><?php echo htmlspecialchars($n) ?>, <?php endforeach; ?></textarea>          
        <br>

        <label>Venue Offered: </label>
        <select name="venueSelect[]" multiple>
            <?php foreach ($allVenues as $ven) : ?>
                <option value="<?php echo htmlspecialchars($ven['venueID']) ?>">
                    <?php echo htmlspecialchars($ven['name']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update">
    </form><br>
    
    <form id="aligned" class="cancel" action="." method="post">
        <input type="hidden" name="action" value="servicesUpdate">
        <input type="submit" value="Cancel">
    </form><br>

</main>
<?php include '../view/footer.php'; ?>
