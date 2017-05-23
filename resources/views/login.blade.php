@extends ('layouts.plane')
@section ('body')
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
               @section ('login_panel_title','Please Sign In')
               @section ('login_panel_body')
                        <form role="form" method="POST" action="{{ route('post.login') }}">
                            {{ csrf_field() }}

                            <fieldset>

                                <div class="form-group{{ $errors->has('loginFail') ? ' has-error' : '' }}" >
                                    @if ($errors->has('loginFail'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('loginFail') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input name="remember" type="checkbox" value="Remember Me">Remember Me--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </fieldset>
                        </form>
                    
                @endsection
                @include('widgets.panel', array('as'=>'login', 'header'=>true))
            </div>
        </div>
    </div>
@stop