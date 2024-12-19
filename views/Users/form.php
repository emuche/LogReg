    <label for="name">Name</label>
    <?php if(isset($errors["name"])): ?>
        <p><?= $errors['name'] ?></p>
    <?php endif; ?>
    <input type="text" name="name" id="name" value="<?= $user->name ?? '' ?>">
    <label for="email">email</label>
    <?php if(isset($errors["email"])): ?>
        <p><?= $errors['email'] ?></p>
    <?php endif; ?>
    <input type="email" name="email" id="email" value="<?= $user->email ?? '' ?>" <?= !empty($user->email) ? 'disabled' : '' ?>>
    <br>