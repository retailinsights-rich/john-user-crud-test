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
      <h3>User Details</h3>
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
    <table class="table">
        <tbody>
            <tr>
                <td>Username:</td>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td>{{ $user->first_name }}</td>
            </tr>
            <tr>
                <td>Middle Name:</td>
                <td>{{ $user->middle_name }}</td>
            </tr>
                <td>Last Name:</td>
                <td>{{ $user->last_name }}</td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td>{{ $user->email_address }}</td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>{{ $user->phone_number }}</td>
            </tr>
            <tr>
                <td>Street Address:</td>
                <td>{{ $user->street_address }}</td>
            </tr>
        </tbody>
    </table>
    <div>
    <br>
        <div>
            <div style="">
                <div class="form-group" style="text-align:center;">
                    <a class="form-control" style="" href="/user/{{ $user->id }}/update-form">Update User</a>
                </div>
            </div>
        </div>
        <br>
        <div>
            <form method="POST" action="/user/{{ $user->id }}/delete" style="">
                @csrf
                <div class="form-group" style="background-color:red;">
                    <input type="hidden" name="user_id" value="{{ $user->id }}" />
                    <input type="submit" class="form-control" style="background-color:red;color:white;" id="user_delete_id" value="Delete User" />
                </div>
            </form>
        </div>

    <br>
    <hr>
    <a href="/user/index">List Of Users</a>
    </div>
</div>
@endsection