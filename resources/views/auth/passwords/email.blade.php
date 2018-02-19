@extends('layouts.main')

@section('content')
<div class="callout primary">
    <article class="grid-container">
      <div class="">
        <h1>Forget Email</h1>
        
      </div>
    </article>
  </div>
 <div class="row small-up-2 medium-up-3 large-up-4" >
   <div class="main">
         @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
   </div> 
 </div>
@stop










