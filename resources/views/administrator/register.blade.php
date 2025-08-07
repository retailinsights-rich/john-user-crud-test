@extends("layouts/main")

@section('content')

<div class="container">
    <div class="">
    <br><br>
    <h3>Register Administrator</h3>
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

@if(session()->has('passwordErr'))
    <div class="alert alert-success" style="margin-bottom: -50px;">
        {{ session('passwordErr') }}
    </div>
    <br><br>
@endif

@if(session()->has('uniqueConstraintErr'))
    <div class="alert alert-success" style="margin-bottom: -50px;">
        {{ session('uniqueConstraintErr') }}
    </div>
    <br><br>
@endif

<br>
<form action="/administrator/register" method="POST">
    @csrf
    <div class="form-group">
        <label for="administrator_username">Username</label>
        <input type="text" class="form-control" id="administrator_username_id" aria-describedby="administrator_username" name="administrator_username">
    </div>
    <br>
    <div class="form-group">
        <label for="administrator_first_name">First Name</label>
        <input type="text" class="form-control" id="administrator_first_name_id" aria-describedby="administrator_first_name" name="administrator_first_name">
    </div>
    <br>
    <div class="form-group">
        <label for="administrator_middle_name">Middle Name</label>
        <input type="text" class="form-control" id="administrator_middle_name_id" aria-describedby="administrator_middle_name" name="administrator_middle_name">
    </div>
    <br>
    <div class="form-group">
        <label for="administrator_last_name">Last Name</label>
        <input type="text" class="form-control" id="administrator_last_name_id" aria-describedby="administrator_last_name" name="administrator_last_name">
    </div>
    <br>
    <div class="form-group">
        <label for="administrator_email_address">Email address</label>
        <input type="text" class="form-control" id="administrator_email_address_id" aria-describedby="administrator_email_address" name="administrator_email_address">
    </div>
    <br>
    <div class="form-group">
        <label for="administrator_phone_number">Phone Number</label>
        <input type="text" class="form-control" id="administrator_phone_number_id" aria-describedby="administrator_phone_number" name="administrator_phone_number">
    </div>
    <br>
    <div class="form-group">
        <label for="administrator_street_address">Street Address</label>
        <input type="text" class="form-control" id="administrator_street_address_id" aria-describedby="administrator_street_address" name="administrator_street_address">
    </div>
    <br>
    <div class="form-group">
        <label for="administrator_password">Password</label>
        <input type="password" class="form-control" id="administrator_password_id" aria-describedby="administrator_password" name="administrator_password">
    </div>
    <br>
    <div class="form-group">
        <label for="administrator_confirm_password">Confirm Password</label>
        <input type="password" class="form-control" id="administrator_confirm_password_id" aria-describedby="administrator_confirm_password" name="administrator_confirm_password">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
</div>
    
@endsection
