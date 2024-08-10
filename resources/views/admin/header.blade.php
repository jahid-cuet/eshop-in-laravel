<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">

        </div>
        <div class="right-menu list-inline no-margin-bottom">
        


            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <input type="submit" value="Logout">
            </form>
    </div>
    </div>
</nav>