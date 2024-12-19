<h2>Register page</h2>
<form action="<?= $_ENV["URL_ROOT"] ?>/users/create" method="post">
   <?php require_once "form.php"; ?>
    <input type="submit" value="Register">
</form>
</body>
</html>