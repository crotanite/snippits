<?php

namespace App\Http\Livewire;

use App\Models\Theme;
use Livewire\Component;
use App\Models\Language;

class TorchlightSnippet extends Component
{
    public string $language = 'php';
    public array $languages;
    public bool $preview = false;
    public string $snippet = '';
    public string $theme = 'nord';
    public array $themes;

    private ?string $keyState = null;

    public function mount()
    {
        $this->languages = Language::all()->toArray();
        $this->themes = Theme::all()->toArray();
    }

    public function render()
    {
        return view('livewire.torchlight-snippet');
    }

    public function togglePreview()
    {
        $this->preview = !$this->preview;
    }
}
