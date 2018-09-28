<?php if (!isset($_SESSION)) {
    header("Location: .");
}?>
<?php include '../view/header.php'; ?>
<main>
    <br>
    <form id="aligned" action="" method="post">
        <input type="hidden" name="action" value="selectVenue">
        <h2>Select a venue</h2>
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
                               height="40" width="80"></td>
                    <td>
                        <input type="radio" name="venue" value="<?php echo htmlspecialchars($venue['venueID']); ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table><br>
        <label>&nbsp;</label>
        <input type="submit" value="Select">
    </form><br>

    <form id="aligned" class="cancel" action="." method="post">
        <input type="hidden" name="action" value="userProfile">
        <input type="submit" value="Cancel">
    </form><br>
</main>
<?php include '../view/footer.php'; ?>