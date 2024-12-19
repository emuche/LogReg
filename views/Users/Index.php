<a href="<?= $_ENV['URL_ROOT']?>/register">Click Here to Register</a>

        <h4>Total users: <?= $total ?></h4>
        <?php foreach($users as $user): ?>
            <a href="<?= $_ENV['URL_ROOT'].'/users/show/'. $user->id?>"><h2><?= htmlspecialchars($user->name) ?></h2></a>
            <p><?= htmlspecialchars($user->email) ?></p>
            <p><?= htmlspecialchars($user->created_on) ?></p>
        <?php endforeach; ?>
    </body>
</html>