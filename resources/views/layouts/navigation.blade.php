<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="navbar bg-base-100 bg-neutral-700">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-circle bg-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" color="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-gray-50 rounded-box w-52">
                <li>
                    <a href={{route('productos')}}>{{trans('Home')}}</a>
                </li>
                <li> @can('see-user')
                        <a href={{route('admin.users.index')}}>{{trans('Users')}}</a>
                    @endcan
                </li>
                <li> @can('see-rol')
                        <a href={{route('admin.roles.index')}}>{{trans('Roles')}}</a>
                    @endcan
                </li>
                <li> @can('see-product')
                        <a href={{route('admin.products.index')}}>{{trans('Products')}}</a>
                    @endcan
                </li>
                <li>
                    <a href={{route('payments.index')}}>{{trans('Payments')}}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-center">
        <a href="{{route('productos')}}" class="btn-ghost normal-case text-xl mx-4 text-white">Mercatodo</a>
    </div>

    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" color="white"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </label>
            <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                <div class="card-body">
                    <div class="card-actions">
                        <a href="{{route('shoppingCartUser')}}"> {{trans('Ver ')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-4 rounded-md">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img class="rounded-full" src="https://api.lorem.space/image/face?hash=33791"/>
                    </div>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>



