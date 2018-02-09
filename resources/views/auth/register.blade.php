@extends('layouts.app')

@section('content')
<div class="container">
  <div class="column is-half is-offset-one-quarter">
    <div class="card">
      <div class="card-header">
        <p class="card-header-title">Register</p>
        <p class="card-header-icon"><i class="fa fa-user"></i></p>
      </div>
      <div class="card-content">
        <form class="" method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
          {{-- input name --}}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Name</label>
            </div>
            <div class="field-body">
              <div class="field is-expanded">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input type="text" name="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }}">
                    <span class="icon is-small is-left">
                      <i class="fa fa-user"></i>
                    </span>
                  </p>
                </div>
                @if ($errors->has('name'))
                  <p class="help is-danger">
                    {{ $errors->first('name') }}
                  </p>
                @endif
              </div>
            </div>
          </div>
          {{-- input email address --}}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Email</label>
            </div>
            <div class="field-body">
              <div class="field is-expanded">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input type="email" name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}">
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
          {{-- input confirm password --}}
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Confirm Password</label>
            </div>
            <div class="field-body">
              <div class="field is-expanded">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input id="password-confirm" type="password" name="password_confirmation" class="input">
                    <span class="icon is-small is-left">
                      <i class="fa fa-lock"></i>
                    </span>
                  </p>
                </div>
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

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
