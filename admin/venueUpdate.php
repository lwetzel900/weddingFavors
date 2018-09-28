<?php if (($_SESSION['user']['userRole']) != 1) {
    header("Location: ..");
} ?>
<?php include '../view/header.php'; ?>
<main>
    <br>
    <table>
        <tr>
            <th>Venue Name</th>
            <th>City</th>
            <th>State</th>
            <th>Picture</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($allVenues as $venue) : ?>
            <tr>
                <td><?php echo htmlspecialchars($venue['name']) ?></td>
                <td><?php echo htmlspecialchars($venue['city']) ?></td>
                <td><?php echo htmlspecialchars($venue['state']) ?></td>
                <td><image src="<?php echo htmlspecialchars('/' . $basedir . '/' . $venue['venuePicture']); ?>" 
                           height="40" width="80"</td>

                <td><form id="aligned" action="." method="post">
                        <input type="hidden" name="action" value="deleteVenue">
                        <input type="hidden" name="venueID" 
                               value="<?php echo htmlspecialchars($venue['venueID']); ?>">
                            <input type="hidden" name="imageLocation"
                               value="<?php echo htmlspecialchars('/' . $venue['venuePicture']); ?>">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table><br>
    <p>Add venues below</p>
    <form action="" method="post" id="aligned" enctype="multipart/form-data">
        <!--for the control-->
        <input type="hidden" name="action" value="venueAdd">

        <label>Venue Name:</label>
        <input type="text" name="name"><br>
        
        <label>City:</label>
        <input type="text" name="city"><br>
        
        <label>State:</label>
        <input type="text" name="state"><br>
        
                <label>Picture:</label>
                <input type="file" name="image"> 
                <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Venue"><br>
    </form><br>
</main>

<?php include '../view/footer.php'; ?>

