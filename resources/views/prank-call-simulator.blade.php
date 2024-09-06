

<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Voice Generator</h2>
    <div class="mb-4">
        <label for="text" class="block mb-2">Text to speak:</label>
        <textarea wire:model="text" id="text" class="w-full p-2 border rounded"></textarea>
    </div>
    <div class="mb-4">
        <label for="voice" class="block mb-2">Voice:</label>
        <select wire:model="voice" id="voice" class="w-full p-2 border rounded">
            <option value="adam">Adam</option>
            <option value="bella">Bella</option>
            <!-- Add more voice options as needed -->
        </select>
    </div>
    <button wire:click="generateVoice" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Generate Voice
    </button>
    @if ($audioUrl)
        <div class="mt-4">
            <audio controls src="{{ $audioUrl }}"></audio>
        </div>
    @endif

    <h2 class="text-2xl font-bold mt-8 mb-4">Phone Keyboard</h2>
    <div class="grid grid-cols-3 gap-4" x-data="{ playTone: (tone) => new Audio(`/audio/dtmf-${tone}.mp3`).play() }">
        @foreach (range(1, 9) as $number)
            <button @click="playTone({{ $number }})" class="bg-gray-200 hover:bg-gray-300 py-4 rounded">
                {{ $number }}
            </button>
        @endforeach
        <button @click="playTone('star')" class="bg-gray-200 hover:bg-gray-300 py-4 rounded">*</button>
        <button @click="playTone(0)" class="bg-gray-200 hover:bg-gray-300 py-4 rounded">0</button>
        <button @click="playTone('pound')" class="bg-gray-200 hover:bg-gray-300 py-4 rounded">#</button>
    </div>
</div>
