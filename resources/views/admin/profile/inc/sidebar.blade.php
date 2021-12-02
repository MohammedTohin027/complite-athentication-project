{{-- sidebar start --}}
<div class="col-md-4 ">
    <div class="card" style="width: 16rem;">
        <img class="card-img-top" style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;"
            width="100%;" alt="Card image cap">
        <ul class="list-group list-group-flush">
            <a href="{{ route('view.profile') }}" class="btn btn-primary btn-sm btn-block ">Home</a>
            <a href="{{ route('admin.change.image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>
            <a href="{{ route('admin.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                class="btn btn-danger btn-sm btn-block">
                Sign Out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</div>
{{-- sidebar end --}}
