{% extends "base.mvc.php" %}
{% block title %} Users {% endblock %}

{% block body %}
        <a href="{<URL_ROOT>}/register">Click Here to Register</a>
        <h4>Total users: {{$total}}</h4>
        <ol>
{% foreach($users as $user): %}
            <h2>
                <li>
                    <a href="{<URL_ROOT>}/users/show/{{ $user->id }}">
                        {{ ucwords($user->name) }}
                    </a>
                </li>
            </h2>
{% endforeach; %}
        </ol>
{% endblock %}