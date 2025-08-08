@extends("layouts/main")

@section('content')
<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success" style="margin-bottom: -50px;">
      {{ session('message') }}
    </div>
    <br><br>
    @endif
    <div class="">
      <br><br>
      <h3>Update User</h3>
      <div STYLE="background-color:#000000; height:1px; width:100%;margin-top:0.5rem;"></div>
      <br>
      <div class="">
        @if($errors->any())
          <div style="background:orange;" class="w-6/8 m-auto text-left">
            <br>
            <ul style="margin:1rem;">
              @foreach($errors->all() as $error)
                <li style="" class="text-red-500 list-none">
                  {{ $error }}
                </li>
              @endforeach
            </ul>
            <br>
          </div>
          <br>
        @endif
      </div>
    </div>

    @if(session()->has('uniqueConstraintErr'))
      <div class="alert alert-success" style="margin-bottom: -50px;">
          {{ session('uniqueConstraintErr') }}
      </div>
    @endif
    <form action="/user/{{ $user->id }}/update" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <div class="form-group">
            <label for="user_username">Username</label>
            <input type="text" class="form-control" id="user_username_id" aria-describedby="user_username" value="{{ $user->username }}" name="user_username">
        </div>
        <br>
        <div class="form-group">
            <label for="user_first_name">First Name</label>
            <input type="text" class="form-control" id="user_first_name_id" aria-describedby="user_first_name" value="{{ $user->first_name }}" name="user_first_name">
        </div>
        <br>
        <div class="form-group">
            <label for="user_middle_name">Middle Name</label>
            <input type="text" class="form-control" id="user_middle_name_id" aria-describedby="user_middle_name" value="{{ $user->middle_name }}" name="user_middle_name">
        </div>
        <br>
        <div class="form-group">
            <label for="user_last_name">Last Name</label>
            <input type="text" class="form-control" id="user_last_name_id" aria-describedby="user_last_name" value="{{ $user->last_name }}" name="user_last_name">
        </div>
        <br>
        <div class="form-group">
            <label for="user_email_address">Email address</label>
            <input type="text" class="form-control" id="user_email_address_id" aria-describedby="user_email_address" value="{{ $user->email_address }}" name="user_email_address">
        </div>
        <br>
        <div class="form-group">
            <label for="user_phone_number">Phone Number</label>
            <input type="text" class="form-control" id="user_phone_number_id" aria-describedby="user_phone_number" value="{{ $user->phone_number }}" name="user_phone_number">
        </div>
        <br>
        <div class="form-group">
            <label for="user_street_address">Street Address</label>
            <input type="text" class="form-control" id="user_street_address_id" aria-describedby="user_street_address" value="{{ $user->street_address }}" name="user_street_address">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
