@extends('layout.main')

@section('content')

<!-- <pre>{{ print_r($errors) }}</pre> -->

<div class="row">
	<div class="col-sm-10">
		<fieldset class="sign_in">
				<legend class="legend_create"><h2>Sign in</h2></legend>

					<form class="form-horizontal" action="{{ URL::route('account-sign-in-post') }}" method="post" role="role">

							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-5">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }} autofocus>
								</div>
								<label for="email" class="control-label">
									@if($errors->has('email'))
										{{ $errors->first('email') }}
									@endif
								</label>
							</div>							

							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password"{{ (Input::old('password')) ? ' value="' . e(Input::old('password')) . '"' : '' }}>
								</div>
								<label for="password" class="control-label">
									@if($errors->has('password'))
										{{ $errors->first('password') }}
									@endif
								</label>
							</div>

							<div class="form-group">
								<div class="checkbox col-sm-offset-2">
							    <label for="remember">
							    Remember me <input type="checkbox" name="remember" id="remember"></label>
							     <!--  <input type="checkbox" name="remember" id="remember"> Remember me --> 
							    <label for="forget" class="col-sm-offset-1">
							    	<a href="{{ URL::Route('account-forgot-password') }}">Forget your password?</a>
							    </label>
							 </div>
							</div>					
							
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="submit" value="Create account" class="btn btn-default">Sign in</button>
								</div>
							</div>

							{{Form::token()}}

					</form>

		</fieldset>

</div>

@stop