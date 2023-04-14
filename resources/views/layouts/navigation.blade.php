<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('main') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @if (Route::has('login'))
                <div class="hidden md:block sm:fixed sm:top-0 sm:right-0 pr-6 pt-2 text-right">
                    @auth
                        <a href="{{route('profile.edit')}}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2  focus:outline-red-500"> {{ __('Profile') }}  </a>
  
                        <form method="POST" action="{{ route('logout') }}">   @csrf
                            <a href="{{route('logout')}}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2   focus:outline-red-500"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
                @endif


                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('main')" :active="request()->routeIs('main')">
                        {{ __('All posts') }}
                    </x-nav-link>

                    @auth
                    <x-nav-link :href="route('blogadmin')" :active="request()->routeIs('blogadmin')">
                        {{ __('My dashboard') }}
                    </x-nav-link>  
                    @endauth
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
      
        @if (Route::has('login'))
        <div class="pt-2 pb-3 space-y-1">
                    @auth
                    <x-responsive-nav-link :href="route('main')" :active="request()->routeIs('main')"> {{ __('All posts') }}  </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('blogadmin')" :active="request()->routeIs('blogadmin')"> {{ __('My blog') }} </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"> {{ __('Profile') }} </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">   @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                    @else
                        <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')"> {{ __('Log in') }} </x-responsive-nav-link>
                        @if (Route::has('register'))
                        <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')"> {{ __('Register') }} </x-responsive-nav-link>
                        @endif
                    @endauth
        </div>
        @endif
 
    </div>
</nav>
