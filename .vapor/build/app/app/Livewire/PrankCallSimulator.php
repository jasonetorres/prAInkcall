<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\UserAudio;
use Illuminate\Support\Facades\Auth;

class PrankCallSimulator extends Component
{
    public $textToConvert = '';
    public $selectedVoice = '';
    public $stability = 0.5;
    public $similarity = 0.5;
    public $voices = [];
    public $generatedAudioPath = '';
    public $soundboard = [];
    public $phoneNumber = '';

    public function mount()
    {
        $this->fetchVoices();
        $this->loadUserAudios();
    }

    public function fetchVoices()
    {
        $apiKey = config('services.elevenlabs.api_key');
        $response = Http::withHeaders(['xi-api-key' => $apiKey])
            ->get('https://api.elevenlabs.io/v1/voices');

        if ($response->successful()) {
            $this->voices = $response->json('voices');
        }
    }

    public function generateVoice()
    {
        $apiKey = config('services.elevenlabs.api_key');
        
        $response = Http::withHeaders([
            'xi-api-key' => $apiKey,
            'Accept' => 'audio/mpeg',
        ])->post('https://api.elevenlabs.io/v1/text-to-speech/' . $this->selectedVoice, [
            'text' => $this->textToConvert,
            'voice_settings' => [
                'stability' => $this->stability,
                'similarity_boost' => $this->similarity,
            ],
        ]);

        if ($response->successful()) {
            $fileName = 'generated_audio_' . time() . '.mp3';
            $filePath = 'user_audios/' . Auth::id() . '/' . $fileName;
            Storage::disk('public')->put($filePath, $response->body());

            $userAudio = UserAudio::create([
                'user_id' => Auth::id(),
                'name' => substr($this->textToConvert, 0, 30) . '...',
                'file_path' => $filePath,
            ]);

            $this->generatedAudioPath = Storage::url($filePath);
            $this->loadUserAudios();
            $this->textToConvert = '';
        } else {
            $this->addError('apiError', 'Failed to generate audio: ' . $response->body());
        }
    }

    public function loadUserAudios()
    {
        $this->soundboard = Auth::user()->audios()->latest()->get()->map(function ($audio) {
            return [
                'name' => $audio->name,
                'path' => Storage::url($audio->file_path),
            ];
        })->toArray();
    }

    public function addToPhoneNumber($key)
    {
        $this->phoneNumber .= $key;
    }

    public function clearPhoneNumber()
    {
        $this->phoneNumber = '';
    }

    public function call()
    {
        // Implement call functionality here
        // For now, we'll just reset the phone number
        $this->phoneNumber = '';
    }

    public function render()
    {
        return view('livewire.prank-call-simulator');
    }
}
