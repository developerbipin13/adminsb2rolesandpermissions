@extends('layouts.login_app')

@section('content')
<div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">SkeinSoft Technology Pokhara</h1>
                    <h4>Client Management Reset Account</h4>
                  </div>
                  <form class="user" action="{{ route('password.email') }}" method="POST">
                    @include('flash')
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Your Email Address..." name="email">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">Send Link</button>
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="small" href="{{ url('/register') }}">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ url('/login') }}">Already Have an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
@endsection
