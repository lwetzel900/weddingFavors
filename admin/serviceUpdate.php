<?php if (($_SESSION['user']['userRole']) != 1) {
    header("Location: ..");
} ?>
<?php include '../view/header.php'; ?>
<main>
    <br>
    <table>
        <tr>
            <th>Service Type</th>
            <th>Description</th>
            <th>Picture</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($allServices as $service) : ?>
            <tr>
                <td><?php echo htmlspecialchars($service['serviceType']) ?></td>
                <td><?php echo htmlspecialchars($service['serviceDescription']) ?></td>
                <td><image src="<?php echo htmlspecialchars('/' . $basedir . '/' . $service['servicePicture']); ?>" height="40" width="80"></td>

                <td><form id="aligned" action="." method="post">
                        <input type="hidden" name="action" value="deleteService">
                        <input type="hidden" name="serviceID" value="<?php echo htmlspecialchars($service['serviceID']); ?>">
                        <input type="hidden" name="imageLocation"
                               value="<?php echo htmlspecialchars('/' . $service['servicePicture']); ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                <td><form id="aligned" action="." method="post">
                        <input type="hidden" name="action" value="editServiceView">
                        <input type="hidden" name="serviceID" value="<?php echo htmlspecialchars($service['serviceID']); ?>">
                        <input type="submit" value="Edit">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table><br>

    <p>Add services below</p>
    <form action="." method="post" id="aligned" enctype="multipart/form-data">

        <input type="hidden" name="action" value="serviceAdd">

        <label>Service Type:</label>
        <input type="text" name="type"> <br>

        <label>Description:</label>
        <textarea cols="21" rows="5" name='description' ></textarea><br>

        <label>Venue Offered:</label>
        <select name="venueSelect[]" multiple>
            <?php foreach ($allVenues as $ven) : ?>
                <option value="<?php echo htmlspecialchars($ven['venueID']) ?>">
                    <?php echo htmlspecialchars($ven['name']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Picture:</label>
        <input type="file" name="image" /><br>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Service"><br>
    </form>

</main>

<?php include '../view/footer.php'; ?>