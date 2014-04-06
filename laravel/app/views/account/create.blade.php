@extends('layout.main')

@section('content')

<!-- printanje na greski -->
<!-- <pre>{{ print_r($errors) }}</pre> -->

<div class="row">
	<div class="col-sm-10">
		<fieldset class="create_account">
				<legend class="legend_create">Create Account</legend>

					<form class="form-horizontal" action="{{ URL::route('account-create-post') }}" method="post" role="role">

							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-5">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }} autofocus>
								</div>
								<label for="email" class="control-label">
									@if($errors->has('email'))
										{{ $errors->first() }}
									@endif
								</label>
							</div>

							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="username" name="username" placeholder="Username"{{ (Input::old('username')) ? ' value="' . e(Input::old('username')) . '"' : '' }}>
								</div>
								<label for="username" class="control-label">
									@if($errors->has('username'))
										{{ $errors->first('username') }}
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
								<label for="password_again" class="col-sm-2 control-label">Password again</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password_again" name="password_again" placeholder="Password"{{ (Input::old('password_again')) ? ' value="' . e(Input::old('password_again')) . '"' : '' }}>
								</div>
								<label for="password_again" class="control-label">
									@if($errors->has('password_again'))
										{{ $errors->first('password_again') }}
									@endif
								</label>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="submit" value="Create account" class="btn btn-default">Crate Account</button>
								</div>
							</div>
							{{Form::token()}}

						</form>

		</fieldset>

</div>

@stop