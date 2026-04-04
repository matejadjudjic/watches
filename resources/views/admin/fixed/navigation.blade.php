<nav class="col-md-2 d-md-block bg-dark sidebar min-vh-100 p-3">
    <h5 class="text-white text-center mb-4">Admin Panel</h5>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="/admin/products">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/admin/users">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/admin/orders">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/admin/brands">Brands</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/admin/categories">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/">Back to Site</a>
        </li>

    </ul>
    <hr class="text-white">
    <form method="POST" action="/logout">
        @csrf
        <button class="btn btn-danger w-100">Logout</button>
    </form>
</nav>
