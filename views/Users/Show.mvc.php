{% extends "base.mvc.php" %}
{% block title %} show {% endblock %}
{% block body %}

<h2>{{ $user->name }}</h2> 
        <p>{{$user->email}}</p>
        <p>Registration date: {{$user->created_on}}</p>
        
        {% !empty($user->updated_on) ? "<p>edited on: $user->updated_on </p>" : '' %}
        <p>
            <a href="{<URL_ROOT>}/users/edit/{{$user->id}}">Edit</a>
            <a href="{<URL_ROOT>}/users/delete/{{$user->id}}">Delete</a>
        </p>

{% endblock %}