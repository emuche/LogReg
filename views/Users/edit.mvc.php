{% extends "base.mvc.php" %}
{% block title %} Update User {% endblock %}
{% block body %}
<h2>Update User</h2>
<p><a href="{< URL_ROOT >}/users/show/{{ $user->id }}">Cancel</a></p>
<form action="{< URL_ROOT >}/users/update/{{$user->id}}" method="post">
    {% include "users/form.mvc.php" %}
    <input type="submit" value="Update">
</form>
{% endblock %}