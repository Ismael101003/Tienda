<nav class="bg-white shadow border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
           
            <div class="flex items-center space-x-2">
                <span class="text-gray-700 font-semibold">
                    👋 Bienvenido, <span class="text-gray-900">{{ Auth::user()->name }}</span>
                </span>
            </div>

            
            <div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 active:bg-red-700 transition-all duration-200 text-white font-medium px-4 py-2 rounded-lg shadow-sm">
                        🚪 Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
