<nav class="w-full fixed top-0 left-0 bg-white border-b border-gray-200 shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-xl font-bold text-blue-600">LaraFit Tracker</a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex gap-6 items-center justify-center">
                @guest
                    <a href="{{ route('login') }}" class="text-white bg-gray-700 hover:bg-blue-600 px-4 py-2 rounded-sm">Login</a>
                    <a href="{{ route('register') }}" class="text-white bg-gray-700 hover:bg-blue-600 px-4 py-2 rounded-sm">Register</a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">Dashboard</a>
                    <a href="{{ route('goals.index') }}" class="text-gray-700 hover:text-blue-600">Goals</a>
                    <a href="{{ route('activities.index') }}" class="text-gray-700 hover:text-blue-600">Activities</a>
                    <a href="{{ route('workouts.index') }}" class="text-gray-700 hover:text-blue-600">Workouts</a>
                    <a href="{{ route('food_logs.index') }}" class="text-gray-700 hover:text-blue-600">Food Logs</a> 
                    @if(Auth::check())
                        | <a href="{{ route('profile') }}" class="text-gray-700 hover:text-blue-600">{{ Auth::user()->name }}</a>
                    @endif
                    <form action="{{  route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-gray-700 hover:bg-blue-600 px-4 py-2 rounded-sm">Logout</button>
                    </form>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button id="menu-button" class="text-gray-500 hover:text-gray-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden">
        <div class="space-y-1 bg-gray-50 border-t border-gray-200 py-3">
            @guest
                <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Register</a>
            @endguest
            @auth
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
                <a href="{{ route('goals.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Goals</a>
                <a href="{{ route('activities.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Activities</a>
                <a href="{{ route('workouts.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Workouts</a>
                <a href="{{ route('food_logs.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Food Logs</a>
                <form action="{{  route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="ml-3 block px-4 py-2 text-white bg-gray-700 hover:bg-blue-600">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.getElementById('menu-button').addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
