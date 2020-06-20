@extends('layouts.default')

@section('post')
<hr>
<form action="{{ route('Send') }}" method="post" name="Send" >
                @csrf
                <div class="form-group">
                <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</p>
              </div>

              <div class="form-group">
                <label>Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</p>
              </div>
              
              <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</p>
              </div>

              <div class="form-group">
              <label>Message</label>
                    <textarea name="description" rows="5" class="form-control" placeholder="Message" id="description" required data-validation-required-message="Please enter a message." >{{ old('description') }}</textarea>
                    <p class="help-block text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</p>
              </div>
              
              <button type="submit" class="btn btn-primary">Send</button>
        </form>
<hr>
@if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif
@endsection