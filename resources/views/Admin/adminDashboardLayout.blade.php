<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>

    <body>
        <section id="nav-bar">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/admin/dashboard">Blog Post Admin Dashboard</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.posts') }}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.users') }}">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.show.create.page') }}">Create post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.show.create.category') }}">Create category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>

        @yield('posts')
        @yield('content')
    </body>
</html>
