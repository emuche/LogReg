        <label for="name">Name</label>
    {% if(isset($errors["name"])): %}
        <p> {{$errors['name'] }}</p>
    {% endif; %}
        <input type="text" name="name" id="name" value="{{ $user->name }}">
        <label for="email">email</label>
    {% if(isset($errors["email"])): %}
        <p><?= $errors['email'] ?></p>
    {% endif; %}
        <input type="email" name="email" id="email" value="{{ $user->email }}" {% echo !empty($user->email ) ? "disabled" : "" %}>