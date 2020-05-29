@inject('menuRoles', '\App\Modules\User\Services\CheckUserRoles')
<div class="navbar navbar-expand-md navbar-dark border-top-0" @if($setting != null) style="background-color: {{$setting->secondary_navbar_color}};" @endif>
    <div class="d-md-none w-100">
        <button type="button" class="navbar-toggler d-flex align-items-center w-100" data-toggle="collapse"
        data-target="#navbar-navigation">
        <i class="icon-menu-open mr-2"></i>
        Main navigation
    </button>
</div>

<div class="navbar-collapse collapse" id="navbar-navigation">
    <ul class="navbar-nav navbar-nav-highlight">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="navbar-nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <i class="icon-home4 mr-2"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('assignments.index') }}" class="navbar-nav-link {{ Request::is('admin/assignments') ? 'active' : '' }}">
                <i class="icon-pencil mr-2"></i>
                Assignment 
            </a>
        </li>
       
    </ul>
</div>
</div>
