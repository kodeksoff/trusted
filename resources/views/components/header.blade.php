<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                         alt="Workflow">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="#"
                           class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>

                        <a href="#"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>

                        <a href="#"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

                        <a href="#"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>

                        <a href="#"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Reports</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth()
                        <user-card :user="{{ Auth::user()  }}"></user-card>
                    @endauth
                    @guest()
                        <login-dropdown route="{{ route('login') }}"></login-dropdown>
                    @endguest
                </div>
            </div>
            <mobile-menu-button/>
        </div>
    </div>
    <mobile-menu/>
</nav>

<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Dashboard
        </h1>
    </div>
</header>
