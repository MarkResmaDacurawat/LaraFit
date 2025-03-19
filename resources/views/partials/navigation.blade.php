<nav class="w-full fixed top-0 left-0 bg-white border-b border-gray-200 shadow-md z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-extrabold text-blue-600 tracking-wide">LaraFit</a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex gap-6 items-center">
                @guest
                    <a href="{{ route('login') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition">Login</a>
                    <a href="{{ route('register') }}" class="text-white bg-gray-700 hover:bg-gray-800 px-4 py-2 rounded-lg transition">Register</a>
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                    <a href="{{ route('goals.index') }}" class="text-gray-700 hover:text-blue-600 transition">Goals</a>
                    <a href="{{ route('activities.index') }}" class="text-gray-700 hover:text-blue-600 transition">Activities</a>
                    <a href="{{ route('workouts.index') }}" class="text-gray-700 hover:text-blue-600 transition">Workouts</a>
                    <a href="{{ route('food_logs.index') }}" class="text-gray-700 hover:text-blue-600 transition">Food Logs</a>

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profile-button" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 transition focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="profile-menu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-md rounded-lg hidden">
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
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

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden lg:hidden bg-gray-50 border-t border-gray-200 py-3">
        <div class="px-4 space-y-2">
            @guest
                <a href="{{ route('login') }}" class="block text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg">Login</a>
                <a href="{{ route('register') }}" class="block text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg">Register</a>
            @endguest
            @auth
                <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg">Dashboard</a>
                <a href="{{ route('goals.index') }}" class="block text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg">Goals</a>
                <a href="{{ route('activities.index') }}" class="block text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg">Activities</a>
                <a href="{{ route('workouts.index') }}" class="block text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg">Workouts</a>
                <a href="{{ route('food_logs.index') }}" class="block text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg">Food Logs</a>
                <a href="{{ route('profile.show') }}" class="block text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg">Profile</a>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left text-red-600 hover:bg-gray-100 px-4 py-2 rounded-lg">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('menu-button').addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Profile dropdown toggle
    document.getElementById('profile-button')?.addEventListener('click', () => {
        document.getElementById('profile-menu').classList.toggle('hidden');
    });

    // Close profile dropdown when clicking outside
    document.addEventListener('click', (event) => {
        const profileMenu = document.getElementById('profile-menu');
        const profileButton = document.getElementById('profile-button');
        if (profileButton && !profileButton.contains(event.target) && profileMenu && !profileMenu.contains(event.target)) {
            profileMenu.classList.add('hidden');
        }
    });
</script>
