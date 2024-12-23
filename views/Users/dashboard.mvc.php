{% extends "users/users-base.mvc" %}

{% block title %} Dashboard {% endblock %}
{% block body %}
<section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            

{{$user->email}}
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
   
{% endblock %}

