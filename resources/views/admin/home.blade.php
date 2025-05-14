<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container-admin">
        <h1>Admin Panel</h1>
        <a href="{{ url('/admin/create') }}"><button>Add New Product</button></a>
        <a href="{{ url('/admin/allproducts') }}"><button>All products</button></a>
        <a href="{{ url('') }}"><button>All users</button></a>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Logout</button>
            </form>
        @endauth
    </div>
</body>
</html>