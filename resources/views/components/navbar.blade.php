<div class="navbar text-gray-900">
    <div class="navbar-start">
      <a class="normal-case text-xl font-bold" href="{{ route('user.index') }}">AdaUtang</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal p-0">
          <li><a href="{{ route('debt.create') }}">Create</a></li>
          <li><a href="{{ route('ping.index') }}">Ping</a></li>
          <li><a href="{{ route('user.history') }}">History</a></li>
          <li><a href="{{ route('user.debts') }}">Your Debts</a></li>
        <li><a href="{{ route('user.leaderboard')}}">Leaderboard</a></li>
      </ul>
    </div>
    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <button class="btn btn-outline text-gray-900">Halo, {{ Auth::user()->name }}</button>
            <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-gray-100 rounded-box w-52">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </ul>
          </div>
    </div>
  </div>
