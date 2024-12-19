
        <h2><?= htmlspecialchars($user->name) ?></h2> 
        <p><?= htmlspecialchars($user->email) ?></p>
        <p>Registration date: <?= htmlspecialchars($user->created_on) ?></p>
        
        <?= !empty($user->updated_on) ? "<p>edited on: $user->updated_on </p>" : '' ?>
        <p>
            <a href="<?= $_ENV["URL_ROOT"].'/users/edit/'.$user->id ?>">Edit</a>
            <a href="<?= $_ENV["URL_ROOT"].'/users/delete/'.$user->id ?>">Delete</a>
        </p>
    </body>
</html>