<h2>Update User</h2>
<p><a href="<?= $_ENV["URL_ROOT"].'/users/show/'.$user->id ?>">Cancel</a></p>
<form action="<?= $_ENV["URL_ROOT"] ?>/users/update/<?= $user->id ?>" method="post">
    <?php require_once "form.php"?>
    <input type="submit" value="Update">
</form>
</body>
</html>