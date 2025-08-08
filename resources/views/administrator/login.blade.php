@extends("layouts/main")

@section('content')

<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success" style="margin-bottom: -50px;">
            {{ session('message') }}
        </div>
    @endif
    <br><br>
    <div class="">
      <br><br>
      <h3>Login</h3>
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
    <br>
    <form action="/administrator/login" method="POST">
        @csrf
        <div class="form-group">
            <label for="administrator_username">Username</label>
            <input type="text" class="form-control" id="administrator_username_id" aria-describedby="administrator_username" name="administrator_username">
        </div>
        <br>
        <div class="form-group">
            <label for="administrator_password">Password</label>
            <input type="password" class="form-control" id="administrator_password_id" aria-describedby="administrator_password" name="administrator_password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    
@endsection
