<?php

namespace App\Livewire;

use App\Models\Pengaturan;
use Livewire\Component;
use ScssPhp\ScssPhp\Compiler;

class SettingForm extends Component
{

    public $nama;
    public $primary;
    public $oldPrimary;

    public function mount()
    {
        $this->nama = Pengaturan::first()->nama;
        $this->primary = Pengaturan::first()->primary;
        $this->oldPrimary = Pengaturan::first()->primary;
    }

    public function save()
    {
        $scssFilePath = public_path('scss/sb.scss');
        $scssContent = file_get_contents($scssFilePath);
        $newScssContent = str_replace('$primary: ' . $this->oldPrimary . ';', '$primary: ' . $this->primary . ';', $scssContent);
        file_put_contents($scssFilePath, $newScssContent);
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
