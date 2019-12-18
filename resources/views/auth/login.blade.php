@extends('layouts.app')

@section('content')
<section class="hero is-fullheight">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-5-tablet is-4-desktop is-4-widescreen">
            <form class="box" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    
              <div class="field">
                <h2 class="title is-5 has-text-centered">Нэвтрэх</h2>
              </div>
              <div class="field">
                <label for="" class="label">Имэйл</label>
                <div class="control has-icons-left">
                  <input class="input" id="email" type="email" name="email" placeholder="e.g. bobsmith@gmail.com"  value="{{ old('email') }}" required autofocus>
                  <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                  </span>

                    @if ($errors->has('email'))
                  <p class="help is-danger">
                      {{ $errors->first('email') }}
                  </p>
                    @endif
                </div>
              </div>
              <div class="field">
                <label for="" class="label">Нууц үг</label>
                <div class="control has-icons-left">
                  <input type="password" name="password" placeholder="*******" class="input" required>                  
                  <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                  </span>
                  @if ($errors->has('password'))
                    <p class="help is-danger">
                        {{ $errors->first('password') }}
                    </p>
                  @endif
                </div>
              </div>
              <div class="field">
                <label for="" class="checkbox">
                  <input type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                 Remember me 
                </label>
              </div>
              <div class="field">
                <button class="button is-success">
                  Login
                </button>
                    <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
