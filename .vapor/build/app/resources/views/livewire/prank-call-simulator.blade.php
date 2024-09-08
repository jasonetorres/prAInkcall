<div class="space-y-6">
    <!-- Text to Voice Generator Card (ElevenLabs API) -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4">Text to Voice Generator</h3>
            @error('apiError') <p class="text-red-500">{{ $message }}</p> @enderror
            <textarea wire:model="textToConvert" class="w-full p-2 border rounded" rows="4" placeholder="Enter text to convert to speech"></textarea>
            <div class="mt-4">
                <label for="voice" class="block text-sm font-medium text-gray-700">Select Voice</label>
                <select wire:model="selectedVoice" id="voice" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">Select a voice</option>
                    @foreach($voices as $voice)
                        <option value="{{ $voice['voice_id'] }}">{{ $voice['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <label for="stability" class="block text-sm font-medium text-gray-700">Stability (0-1)</label>
                <input wire:model="stability" type="range" min="0" max="1" step="0.1" id="stability" class="w-full">
            </div>
            <div class="mt-4">
                <label for="similarity" class="block text-sm font-medium text-gray-700">Similarity Boost (0-1)</label>
                <input wire:model="similarity" type="range" min="0" max="1" step="0.1" id="similarity" class="w-full">
            </div>
            <button wire:click="generateVoice" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Generate Voice
            </button>
            @if($generatedAudioPath)
                <div class="mt-4">
                    <audio controls>
                        <source src="{{ $generatedAudioPath }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    <a href="{{ $generatedAudioPath }}" download class="mt-2 inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Download Audio
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Soundboard -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4">Your Soundboard</h3>
            <div class="grid grid-cols-2 gap-4">
                @foreach($soundboard as $sound)
                    <div class="bg-gray-100 p-4 rounded">
                        <p class="font-semibold">{{ $sound['name'] }}</p>
                        <audio controls>
                            <source src="{{ $sound['path'] }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Phone Dialer Card -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4">Phone Dialer</h3>
            <input type="tel" wire:model="phoneNumber" class="w-full p-2 border rounded mb-4" placeholder="Enter phone number">
            <div class="grid grid-cols-3 gap-2 max-w-xs mx-auto">
                @foreach(['1', '2', '3', '4', '5', '6', '7', '8', '9', '*', '0', '#'] as $key)
                    <button wire:click="addToPhoneNumber('{{ $key }}')" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded text-sm">
                        {{ $key }}
                    </button>
                @endforeach
            </div>
            <div class="mt-4 flex justify-center space-x-2">
                <button wire:click="clearPhoneNumber" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Clear
                </button>
                <button wire:click="call" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Call
                </button>
            </div>
        </div>
    </div>
</div>
