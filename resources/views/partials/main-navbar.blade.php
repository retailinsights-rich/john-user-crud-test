<div>
    <nav class="navbar navbar-dark bg-dark" style="padding:1rem;">
        <div>
            <a class="navbar-brand" href="#">Active Manage</a>
        </div>
        @if(session("logged_in_administrator_id") == NULL)
        <div class="" style="text-color:white;">
            <a class="" href="/administrator/login-form" style="color:white;margin-right:0.25rem;">Login</a><span style="color:white;">|</span><a class="" href="/administrator/register-form" style="color:white;margin-left:0.25rem;">Create Administrator Account</a>
        </div>
        @else
        <div class="" style="text-color:white;">
            <span style="color:white;margin-left:0.25rem;">Welcome, {{ session('logged_in_administrator_username') }}</span><span style="color:white;margin-right:0.25rem;margin-left:0.25rem;">|</span><a class="" href="/administrator/logout" style="color:white;margin-right:0.25rem;">Logout</a>
        </div>
        @endif
    </nav>
</div>
<br>
