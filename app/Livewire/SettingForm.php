<?php

namespace App\Livewire;

use App\Models\Pengaturan;
use Livewire\Component;
use ScssPhp\ScssPhp\Compiler;

class SettingForm extends Component
{

    public $nama;
    public $primary;
    // public $oldPrimary;

    public function mount()
    {
        $this->nama = Pengaturan::first()->nama;
        $this->primary = Pengaturan::first()->primary;
        // $this->oldPrimary = Pengaturan::first()->primary;
    }

    public function save()
    {
        $scssContent = '// Import Custom SB Admin 2 Variables (Overrides Default Bootstrap Variables)
// create custom primary and secondary colors
$primary: ;
// $secondary: #f44336;
@import "scss/variables.scss";
// Import Bootstrap
@import "vendor/bootstrap/scss/bootstrap.scss";
// Import Custom SB Admin 2 Mixins and Components
@import "scss/mixins.scss";
@import "scss/global.scss";
@import "scss/utilities.scss";
// Custom Components
@import "scss/dropdowns.scss";
@import "scss/navs.scss";
@import "scss/buttons.scss";
@import "scss/cards.scss";
@import "scss/charts.scss";
@import "scss/login.scss";
@import "scss/error.scss";
@import "scss/footer.scss";
.card {
    @extend .shadow-lg;
}

.btn-check:checked + .btn,
.btn.active,
.btn.show,
.btn:first-child:active,
:not(.btn-check) + .btn:active {
    color: #fff;
    background-color: $primary;
    border-color: $primary;
}

.btn-outline-primary {
    --bs-btn-color: #000;
    --bs-btn-border-color: #000;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #0d6efd;
    --bs-btn-hover-border-color: #0d6efd;
    --bs-btn-focus-shadow-rgb: 13, 110, 253;
    --bs-btn-active-color: #b1a5a5;
    --bs-btn-active-bg: #0d6efd;
    --bs-btn-active-border-color: #0d6efd;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #0d6efd;
    --bs-btn-disabled-bg: transparent;
    --bs-btn-disabled-border-color: #0d6efd;
    --bs-gradient: none;
}
';
        $newScssContent = str_replace('$primary: ;', '$primary: ' . $this->primary . ';', $scssContent);
        $scssCompiler = new Compiler();
        $compiledCss = $scssCompiler->compileString($newScssContent)->getCss();
        $cssFilePath = public_path('css/sb-admin-2.css');
        file_put_contents($cssFilePath, $compiledCss);
        Pengaturan::first()->update([
            'nama' => $this->nama,
            'primary' => $this->primary,
        ]);

        return redirect()->route('settings')->with('icon', 'success')->with('title', 'Berhasil')->with('message', 'Pengaturan berhasil disimpan!');;
    }

    public function render()
    {
        return view('livewire.setting-form');
    }
}
