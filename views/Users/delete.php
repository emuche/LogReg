<h2>Delete User</h2>
<p><a href="<?= $_ENV["URL_ROOT"].'/users/show/'.$user->id ?>">Cancel</a></p>
<form method = "post" action="<?= $_ENV["URL_ROOT"] ?>/users/destroy/<?= $user->id ?>">
    <p>Are you sure?</p>
    <input type="submit" value="Delete">
</form>
</body>
</html>