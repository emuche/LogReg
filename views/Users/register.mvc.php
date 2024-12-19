{% extends "base.mvc" %}
{% block title %} Register {% endblock %}
{% block body %}
<h2>Register page</h2>

<form action="{<URL_ROOT>}/users/create" method="post">
    {% include "users/form.mvc" %}
    <input type="submit" value="Register">
</form>

{% endblock %}
 