<div class="menu bg-slate-900 h-screen w-36 text-white">

<div class="flex items-center  justify-center flex-wrap  profile w-32">
  <div class="profile-image flex items-center  justify-center  bg-white rounded-full w-24 h-24 mt-10">
    <img src="https://avatars.dicebear.com/api/bottts/:{{ Auth::user()->name }}.svg" alt="Profile Image" class="w-20">
  </div>

  <div class="profile-name mt-4 mb-4">
    <div class="text-1xl font-bold">
      @auth
      {{ Auth::user()->name }}
      @endauth
    </div>
    <p class="text-sm">Administrator</p>
  </div>
</div>

<ul class="w-full">

    <li class="menu-item  mt-2 ml-5">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-tachometer-alt"></i>
            </span>
            <span class="menu-text">Dashboard</span>
        </a>
    </li>
    <li class="menu-item  mt-2 ml-5">
        <a href="{{ route('product.index') }}" class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-home"></i>
            </span>
            <span class="menu-text">Products</span>
        </a>
    </li>
    <li class="menu-item  mt-2 ml-5">
        <a href="{{ route('sale.index') }}" class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-users"></i>
            </span>
            <span class="menu-text">Sales</span>
        </a>
    </li>

    <li class="menu-item  mt-2 ml-5">
        <a href="{{ route('logout') }}" class="menu-link">
            <span class="menu-icon">
                <i class="fas fa-sign-out-alt"></i>
            </span>
            <span class="menu-text">Logout</span>
        </a>
    </li>
</ul>
</div>