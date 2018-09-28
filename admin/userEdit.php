<?php if (($_SESSION['user']['userRole']) != 1) {
    header("Location: ..");
} ?>
<?php include '../view/header.php'; ?>
<h2>Edit user</h2>
<h2 class="invalid"><?php echo htmlspecialchars($errorMessage) ?></h2>
<main>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="userEdit">

        <label for="firstName">First Name: </label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName) ?>"><br>

        <label for="lastName">Last Name: </label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName) ?>"><br>

        <label for="userRole">User Role: </label>
        <input type="text" name="userRole" value="<?php echo htmlspecialchars($userRole) ?>"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update">
    </form>

</main>
<?php include '../view/footer.php'; ?>
