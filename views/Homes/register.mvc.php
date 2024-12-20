{% extends "base.mvc" %}

{% block title %} Register {% endblock %}

{% block body %}

<section class="py-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"></path>
                                </svg></div>
                            <form method="post" action="{{URL_ROOT}}/register-new-user">
                                <div class="mb-3"></div><div class="mb-3">
                                    <input class="form-control  {% echo empty($errors->name) ? '' : 'is-invalid'; %}" type="text" name="name" value="{{$user->name}}" placeholder="Full Name"  required/>
                                    <div class="invalid-feedback">{{$errors->name}}</div>
                                    
                                </div>
                                <div class="mb-3">
                                    <input class="form-control {% echo empty($errors->email) ? '' : 'is-invalid'; %}" type="email" name="email" value="{{$user->email}}" placeholder="email"  required/>
                                    <div class="invalid-feedback"> {{$errors->email}} </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control {% echo empty($errors->password) ? '' : 'is-invalid'; %}" type="password" name="password" placeholder="Password" data-bs-theme="dark" minlength="6" required>
                                    <div class="invalid-feedback"> {{$errors->password}} </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control {% echo empty($errors->password) ? '' : 'is-invalid'; %}" type="password" name="confirm_password" placeholder="Password Again" data-bs-theme="dark" minlength="6" required>
                                </div>
                                <button class="btn btn-primary shadow d-block w-100" type="submit">Sign up</button>
                                <div class="mb-3"></div><p class="text-muted">Already have an account? <a href="{{URL_ROOT}}">Log in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
{% endblock %}

