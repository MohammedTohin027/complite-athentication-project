<div class="card" style="width: 18rem;">
    <img class="card-img-top" style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;"
        width="100%;" alt="Card image cap">
    <ul class="list-group list-group-flush">
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block ">Home</a>
        <a href="{{ route('change.image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>
        <a href="{{ route('update.password') }}" class="btn btn-primary btn-sm btn-block">Update Password</a>
        <a href="" class="btn btn-primary btn-sm btn-block">My Orders</a>
        <a href="" class="btn btn-primary btn-sm btn-block">Return Orders</a>
        <a href="" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        {{-- <a href="" class="btn btn-danger btn-sm btn-block"> Log Out</a> --}}
        <a class="btn btn-danger btn-sm btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            {{ __('Log Out') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>
