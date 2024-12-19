{% extends "base.mvc.php" %}
{% block title %} Delete User {% endblock %}
{% block body %}
<h2>Delete User</h2>
<p><a href="{<URL_ROOT>}/users/show/{{ $user->id }}">Cancel</a></p>
<form method = "post" action="{<URL_ROOT>}/users/destroy/{{$user->id}}">
    <p>Are you sure?</p>
    <input type="submit" value="Delete">
</form>
{% endblock %}
