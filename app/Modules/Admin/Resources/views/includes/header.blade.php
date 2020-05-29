<div class="navbar navbar-expand-md navbar-dark border-transparent"
@if($setting != null)) style="background-color: {{$setting->main_navbar_color}};" @endif>
<div class="navbar-brand wmin-0 mr-5">
    <a href="{{ route('dashboard') }}" class="d-inline-block">
    </a>
</div>

<div class="d-md-none">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
        <i class="icon-tree5"></i>
    </button>
</div>

<div class="collapse navbar-collapse" id="navbar-mobile">

    <ul class="navbar-nav ml-md-auto">
      
    @php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    $user_type = $user->user_type;

    if($user_type != 'super_admin'){

       if($user->userEmployer->profile_pic !=''){
           $imagePath = asset($user->userEmployer->file_full_path).'/'.$user->userEmployer->profile_pic;
       }else{
           $imagePath = asset('admin/default.png');
       }

   }else{
       $imagePath = asset('admin/default.png');
   }

   @endphp

   <li class="nav-item dropdown dropdown-user">
    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
        <img src="{{ $imagePath }}" class="rounded-circle mr-2" height="34" alt="">
        <span>{{ $user->first_name }}</span>
    </a>

    <div class="dropdown-menu dropdown-menu-right">
       
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout')}}" class="dropdown-item"><i class="icon-exit2"></i> Logout</a>
    </div>
</li>
</ul>
</div>
</div>