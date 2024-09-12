<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-gray-900">Welcome to PrankAI</h2>
            <p class="text-center text-gray-600">Experience AI-powered prank calls!</p>
            <div class="space-y-4">
                <a href="{{ route('login') }}" class="block w-full px-4 py-3 text-sm font-medium text-center text-white transition-colors bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="block w-full px-4 py-3 text-sm font-medium text-center text-indigo-600 transition-colors bg-white border-2 border-indigo-600 rounded-md hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Register
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>