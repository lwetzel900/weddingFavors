<?php include '../view/header.php'; ?>
<body>
    <p>Please register.</p>
    <h2 class="invalid"><?php echo htmlspecialchars($errorMessage) ?></h2>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="addUser">

        <label for="firstName">First Name: </label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName) ?>"><br>

        <label for="lastName">Last Name: </label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName) ?>"><br>

        <label for="email">Email Address: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>"><br>

        <label for="address">Address: </label>
        <input type="text" name="address" placeholder="no puncuation" value="<?php echo htmlspecialchars($address) ?>"><br>

        <label for="city">City: </label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($city) ?>"><br>

        <label for="zip">Zip: </label>
        <input type="text" name="zip" placeholder="00000" value="<?php echo htmlspecialchars($zip) ?>"><br>

        <label for="phone">Phone: </label>
        <input type="text" name="phone" placeholder="123-456-7890" value="<?php echo htmlspecialchars($phone) ?>"><br>

        <label for="password">Password: </label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($password) ?>"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Register">
    </form>
</body>
<?php include '../view/footer.php'; ?>

