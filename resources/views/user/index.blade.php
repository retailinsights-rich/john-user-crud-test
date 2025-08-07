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
      <h3>List Of Users</h3>
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

      @if(count($users) > 0)
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Street Address</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row"><a href="/user/{{ $user->id }}/show">{{ $user->id }}</a></th>
                <td>{{ $user->username }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->middle_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email_address }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->street_address }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    @else
      <h4>
        There are not any users to list.
      </h4> 
    @endif
    <hr>
      <div>
        <a href="/user/create">Add User</a>
      </div>
    </div>
    
@endsection
