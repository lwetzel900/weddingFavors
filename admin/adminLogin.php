<?php include '../view/header.php'; ?>
<main>
    <h2>Admin Login</h2>
    <p><?php echo htmlspecialchars($errorMessage); ?></p>

    <form action="." method="post" id="aligned">
        <!--for the control-->
        <input type="hidden" name="action" value="adminLogin">
        
        <label>Email:</label>
        <input type="email" name="email"> <br>
        
        <label>Password:</label>
        <input type="password" name="password"> <br>

        <label>&nbsp;</label>
        <input type="submit" value="Admin Login"><br>

    </form>
    <br><br>
</main>

<?php include '../view/footer.php'; ?>


