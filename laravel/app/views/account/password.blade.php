@extends('layout.main')

@section('content')
<h3>{{$var}}</h3><hr>

<div class="row">
	<div class="col-sm-10">
		<fieldset class="change_password">
				<legend class="legend_create">Change Password</legend>

					<form class="form-horizontal" action="{{ URL::route('account-change-password-post') }}" method="post" role="role">

							<div class="form-group">
								<label for="old_password" class="col-sm-2 control-label">Old password:</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="old_password" name="old_password">
								</div>
								<label for="old_password" class="control-label">
									@if($errors->has('old_password'))
										{{ $errors->first('old_password') }}
									@endif
								</label>
							</div>

							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">New password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password" name="password">
								</div>
								<label for="password" class="control-label">
									@if($errors->has('password'))
										{{ $errors->first('password') }}
									@endif
								</label>
							</div>

							<div class="form-group">
								<label for="password_again" class="col-sm-2 control-label">Repeat password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password_again" name="password_again">
								</div>
								<label for="password_again" class="control-label">
									@if($errors->has('password_again'))
										{{ $errors->first('password_again') }}
									@endif
								</label>
							</div>
							
							
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="submit" value="Change password" class="btn btn-default">Change password</button>
								</div>
							</div>
							{{Form::token()}}

						</form>

		</fieldset>

</div>

@stop