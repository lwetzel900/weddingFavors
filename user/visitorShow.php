<?php include '../view/header.php'; ?>
<?php if(!isset($_SESSION)){
    header("Location: ..");
}?>
<main>
    <br>
    <p>We have a variety of venues and services to choose from </p>
    <br>

    <table>
        <caption>Venues</caption>
        <tr>
            <th>Venue Name</th>
            <th>City</th>
            <th>State</th>
            <!--<th>Picture</th>-->
        </tr>

        <?php foreach ($allVenues as $venue) : ?>
            <tr>
                <td><?php echo htmlspecialchars($venue['name']) ?></td>
                <td><?php echo htmlspecialchars($venue['city']) ?></td>
                <td><?php echo htmlspecialchars($venue['state']) ?></td>
                <!--<td><image src="<?php // echo htmlspecialchars($venue['venuePicture']); ?>" height="120" width="180"</td>-->
            </tr>
        <?php endforeach; ?>
    </table><br>

    <table>
        <caption>Services</caption>
        <tr>
            <th>Service Type</th>
            <th>Description</th>
            <!--<th>Picture</th>-->
        </tr>

        <?php foreach ($allServices as $service) : ?>
            <tr>
                <td><?php echo htmlspecialchars($service['serviceType']) ?></td>
                <td><?php echo htmlspecialchars($service['serviceDescription']) ?></td>
                <!--<td><image src="<?php // echo htmlspecialchars($service['servicePicture']); ?>" height="120" width="180"</td>-->
            </tr>
        <?php endforeach; ?>
    </table><br>
    <p><a href="?action=register">Register</a> for an account to save your options</p>

</main>
<?php include '../view/footer.php'; ?>