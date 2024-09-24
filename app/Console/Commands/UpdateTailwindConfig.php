<?php

namespace App\Console\Commands;

use App\Models\Pengaturan;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class UpdateTailwindConfig extends Command
{
    protected $signature = 'tailwind:update-config';
    protected $description = 'Update Tailwind Config with Dynamic Primary Color and Build';

    public function handle()
    {
        $primaryColor = Pengaturan::find(1)->primary;
        $shades = $this->generateShades($primaryColor);
        $tailwindConfigPath = base_path('tailwind.config.js');
        $newConfigContent = $this->generateTailwindConfigContent($shades);
        file_put_contents($tailwindConfigPath, $newConfigContent);
        if (config('app.env') == 'production') {
            $process = new Process(['npm', 'run', 'build']);
            $process->setWorkingDirectory(base_path());
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
        }
        $this->info('Tailwind config updated and CSS built successfully.');
    }

    private function generateShades($baseColor)
    {
        $baseRgb = $this->hexToRgb($baseColor);
        $shades = [];
        $factors = [0.00, 0.05, 0.10, 0.15, 0.20, 0.25, 0.30, 0.35, 0.50, 0.80, 1.00,];
        foreach ($factors as $factor) {
            $newRgb = [(int)($baseRgb[0] + (255 - $baseRgb[0]) * $factor), (int)($baseRgb[1] + (255 - $baseRgb[1]) * $factor), (int)($baseRgb[2] + (255 - $baseRgb[2]) * $factor),];
            $shades[] = $this->rgbToHex($newRgb[0], $newRgb[1], $newRgb[2]);
        }
        return $shades;
    }

    private function hexToRgb($hex)
    {
        $hex = ltrim($hex, '#');
        return [hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)),];
    }

    private function rgbToHex($r, $g, $b)
    {
        return sprintf('#%02x%02x%02x', $r, $g, $b);
    }

    private function generateTailwindConfigContent($shades)
    {
        return <<<EOT
import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    50: "{$shades[10]}", // Putih
                    100: "{$shades[9]}",
                    200: "{$shades[8]}",
                    300: "{$shades[7]}", // Titik seimbang
                    400: "{$shades[6]}",
                    500: "{$shades[5]}",
                    600: "{$shades[4]}",
                    700: "{$shades[3]}",
                    800: "{$shades[2]}",
                    900: "{$shades[1]}",
                    950: "{$shades[0]}", // Gelap
                },
                secondary: "#343A40",
            },
            fontFamily: {
                                body: [
                    "Gilroy",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
                sans: [
                    "Gilroy",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "system-ui",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
EOT;
    }
}
