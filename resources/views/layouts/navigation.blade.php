@auth
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4 py-2">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="{{ route('jobs.index') }}">WorkPal</a>

        <!-- Right Side -->
        <div class="d-flex align-items-center ms-auto">
            <span class="me-3 fw-semibold text-dark">{{ Auth::user()->name }}</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Log Out</button>
            </form>
        </div>
    </div>
</nav>
@endauth
