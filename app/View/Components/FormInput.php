<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $type;
    public $id;
    public $label;
    public $error;
    public $baseClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'text', $id = null, $label = null, $error = false)
    {
        $this->type = $type;
        $this->id = $id;
        $this->label = $label;
        $this->error = $error;

        $this->baseClass = !$error ? 'bg-gray-50 border shadow-md transition duration-200 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-950 focus:border-primary-950 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-950 dark:focus:border-primary-950' : 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500';
        // // Definisikan class dasar yang digunakan oleh semua tipe input
        // // $this->baseClass = 'bg-gray-50 border shadow-md transition duration-200 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-950 focus:border-primary-950 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-950 dark:focus:border-primary-950';
        // $this->baseClass = 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-input');
    }
}
