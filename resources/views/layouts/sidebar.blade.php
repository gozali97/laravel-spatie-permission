<div id="sidebar" class="active">
    <div class="sidebar-wrapper active bg-white border-end h-100">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <h2 class="fw-bold d-inline-flex">App</h2>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <!-- Dashboard -->
                <li class="sidebar-item">
                    <a href="/" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @php
                    $access = \App\Models\User::query()
                        ->join('roles', 'roles.id', '=', 'users.role_id')
                        ->join('role_has_permissions', 'role_has_permissions.role_id', '=', 'roles.id')
                        ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                        ->where('users.id', Auth::user()->id)
                        ->get();
                @endphp
                @foreach (getMenus() as $menu)
                    @can('read ' . $menu->url)
                        <li class="sidebar-item has-sub">
                            <a href="javascript:void(0);" class="sidebar-link">
                                <i class="bi {{ $menu->icon }}"></i>
                                <span>{{ $menu->name }}</span>
                            </a>
                            <ul class="submenu">
                                @foreach ($menu->subMenus as $subMenu)
                                    @can('read ' . $subMenu->url)
                                        <li class="submenu-item">
                                            <a href="{{ url($subMenu->url) }}">
                                                {{ $subMenu->name }}
                                            </a>
                                        </li>
                                    @endcan
                                @endforeach

                            </ul>
                        </li>
                    @endcan
                @endforeach

                <li class="sidebar-item  ">
                    <a href="#" class="sidebar-link"
                        onclick="event.preventDefault(); Swal.fire({
                                title: 'Apakah anda yakin?',
                                text: 'Anda akan keluar dari web!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Keluar!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById('logout-form').submit();
                                    }
                                });">
                        <i class="bi bi-box-arrow-in-left"></i></i> <span>Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
