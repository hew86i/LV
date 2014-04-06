@extends('layout.main')

@section('content')

<!-- <pre>{{ print_r($errors) }}</pre> -->

<div class="row">
	<div class="col-sm-10">
		<fieldset class="sign_in">
				<legend class="legend_create"><h2>Password recovery</h2></legend>

					<form class="form-horizontal" action="{{ URL::route('account-forgot-password-post') }}" method="post" role="form">

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
								<div class="col-sm-offset-2 col-sm-4">
									<button type="submit" value="Create account" class="btn btn-default">Recover</button>
								</div>
							</div>

							{{Form::token()}}

					</form>

		</fieldset>

</div>

@stop