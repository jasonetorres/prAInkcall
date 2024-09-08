<x-guest-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900">
                    <p class="mb-4">Sign in to start simulating prank calls with AI-generated voices!</p>
                    <div class="flex flex-col space-y-6">
                        <a href="{{ route('login') }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>