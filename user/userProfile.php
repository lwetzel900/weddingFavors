<?php if (!isset($_SESSION)) {
    header("Location: .");
}?>
<?php include '../view/header.php'; ?>
<main>
    <h3>Welcome <?php echo htmlspecialchars("$firstName $lastName") ?></h3>
<?PHP if (empty($allTogether)) : ?>
        <p>You haven't picked out anything yet...</p>
        <br>
        <p>Please choose some <a href=".?action=showOptions">options</a> from our venues and services</p>
        <br>
    <?php else: ?>
        <p>Here is what you choose...</p>
        <br>
    <?php foreach ($allTogether as $key => $something) : ?>
            <table id="otherTable">
                <tr>
                    <th>Venue: </th>
                    <th><?php echo htmlspecialchars("$key") ?></th>
                </tr>

        <?php foreach ($something as $key => $val): ?>
                    <tr>
                        <td>Service: </td>
                        <td><?php echo htmlspecialchars("$val") ?></td>
                    </tr>
            <?php endforeach; ?>
            </table>
            <br>
    <?php endforeach; ?>
<?PHP endif; ?><br>
</main>
<?php include '../view/footer.php'; ?>
