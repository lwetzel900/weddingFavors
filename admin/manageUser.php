<?php if (($_SESSION['user']['userRole']) != 1) {
    header("Location: ..");
} ?>
<?php include '../view/header.php'; ?>
<main>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

<?php foreach ($allUsers as $user) : ?>
            <tr>
                <td><?php echo htmlspecialchars($user->getId()) ?></td>
                <td><?php echo htmlspecialchars($user->getFullName()) ?></td>
                <td><?php echo htmlspecialchars($user->getEmail()) ?></td>
                <td><?php echo htmlspecialchars($user->getPhone()) ?></td>
                <td><?php echo htmlspecialchars($user->getUserRole()) ?></td>

                <td>
                    <form id="aligned" action="." method="post">
                        <input type="hidden" name="action" value="deleteUser">
                        <input type="hidden" name="userID" value="<?php echo htmlspecialchars($user->getId()); ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
                <td>
                    <form id="aligned" action="." method="post">
                        <input type="hidden" name="action" value="editUser">
                        <input type="hidden" name="userID" value="<?php echo htmlspecialchars($user->getId()); ?>">
                        <input type="submit" value="Edit Role">
                    </form>
                </td>
            </tr>
<?php endforeach; ?>
    </table><br>

</main>

<?php include '../view/footer.php'; ?>

