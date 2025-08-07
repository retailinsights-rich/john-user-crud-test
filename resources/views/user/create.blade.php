@extends("layouts/main")

@section('content')

<div class="container" id="user_create_form">
   @if(session()->has('message'))
    <div class="alert alert-success" style="margin-bottom: -50px;">
      {{ session('message') }}
    </div>
    <br><br>
    @endif
    <div class="">
      <br><br>
      <h3>Add User</h3>
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

    <br>
    <form action="/user/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_username">Username</label>
            <input @blur="userUsernameErrHandlingFunc" type="text" class="form-control" id="user_username_id" aria-describedby="user_username" name="user_username">
            @verbatim
            <div id="user_username_err_handling" style="color:red;" >{{ userUsernameErrHandling }}</div>
            @endverbatim
          </div>
        <br>
        <div class="form-group">
            <label for="user_first_name">First Name</label>
            <input @blur="userFirstNameErrHandlingFunc" type="text" class="form-control" id="user_first_name_id" aria-describedby="user_first_name" name="user_first_name">
            @verbatim
            <div id="user_first_name_err_handling" style="color:red;" >{{ userFirstNameErrHandling }}</div>
            @endverbatim
        </div>
        <br>
        <div class="form-group">
            <label for="user_middle_name">Middle Name</label>
            <input @blur="userMiddleNameErrHandlingFunc" type="text" class="form-control" id="user_middle_name_id" aria-describedby="user_middle_name" name="user_middle_name">
            @verbatim
            <div id="user_middle_name_err_handling" style="color:red;" >{{ userMiddleNameErrHandling }}</div>
            @endverbatim
        </div>
        <br>
        <div class="form-group">
            <label for="user_last_name">Last Name</label>
            <input @blur="userLastNameErrHandlingFunc" type="text" class="form-control" id="user_last_name_id" aria-describedby="user_last_name" name="user_last_name">
            @verbatim
            <div id="user_last_name_err_handling" style="color:red;" >{{ userLastNameErrHandling }}</div>
            @endverbatim
        </div>
        <br>
        <div class="form-group">
            <label for="user_email_address">Email Address</label>
            <input @blur="userEmailAddressErrHandlingFunc" type="email" class="form-control" id="user_email_address_id" aria-describedby="user_email_address" name="user_email_address">
            @verbatim
            <div id="user_email_address_err_handling" style="color:red;" >{{ userEmailAddressErrHandling }}</div>
            @endverbatim
        </div>
        <br>
        <div class="form-group">
            <label for="user_phone_number">Phone Number</label>
            <input @blur="userPhoneNumberErrHandlingFunc" type="text" class="form-control" id="user_phone_number_id" aria-describedby="user_phone_number" name="user_phone_number">
            @verbatim
            <div id="user_phone_number_err_handling" style="color:red;" >{{ userPhoneNumberErrHandling }}</div>
            @endverbatim
        </div>
        <br>
        <div class="form-group">
            <label for="user_street_address">Street Address</label>
            <input @blur="userStreetAddressErrHandlingFunc" type="text" class="form-control" id="user_street_address_id" aria-describedby="user_street_address" name="user_street_address">
            @verbatim
            <div id="user_street_address_err_handling" style="color:red;" >{{ userStreetAddressErrHandling }}</div>
            @endverbatim
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <br>
@endsection
