@extends('layouts.app')

@section('content')
<div class="container">
  <div class="column is-half is-offset-one-quarter">
    <div class="card">
      <div class="card-header">
        <p class="card-header-title">Login</p>
        <p class="card-header-icon"><a href="{{ url('/login/facebook') }}" class="btn"><i class="fa fa-facebook"></i></a></p>
        <p class="card-header-icon"><a href="{{ url('/login/google') }}" class="btn"><i class="fa fa-google"></i></a></p>
      </div>
      <div class="card-content">
        <form class="" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          {{-- input email address --}}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Email</label>
            </div>
            <div class="field-body">
              <div class="field is-expanded">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input type="email" name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" value="{{ old('email') }}">
                    <span class="icon is-small is-left">
                      <i class="fa fa-user"></i>
                    </span>
                  </p>
                </div>
                @if ($errors->has('email'))
                  <p class="help is-danger">
                    {{ $errors->first('email') }}
                  </p>
                @endif
              </div>
            </div>
          </div>
          {{-- input password --}}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Password</label>
            </div>
            <div class="field-body">
              <div class="field is-expanded">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input type="password" name="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}">
                    <span class="icon is-small is-left">
                      <i class="fa fa-lock"></i>
                    </span>
                  </p>
                </div>
                @if ($errors->has('password'))
                  <p class="help is-danger">
                    {{ $errors->first('password') }}
                  </p>
                @endif
              </div>
            </div>
          </div>
          {{-- input remember me --}}
          <div class="field is-horizontal">
            <div class="field-label is-normal"></div>
            <div class="field-body">
              <label class="checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember me
              </label>
            </div>
          </div>
          {{-- login button --}}
          <div class="field is-horizontal">
            <div class="field-label is-normal"></div>
            <div class="field-body">
              <div class="control">
                <button type="submit" class="button is-black">Log me in</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
