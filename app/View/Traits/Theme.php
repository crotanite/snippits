<?php
namespace App\View\Traits;

trait Theme
{
    /**
     * The theme to apply to the element.
     * @var string
     */
    public string $theme;

    /**
     * Apply the theme styles.
     *
     * @return string
     */
    public function applyTheme(): string
    {
        switch($this->theme) {
            case 'error': {
                return 'bg-red-500 border-red-500 text-white hover:bg-red-600';
            }
            case 'info': {
                return 'bg-blue-500 border-blue-500 text-white hover:bg-blue-600';
            }
            case 'success': {
                return 'bg-green-500 border-green-500 text-white hover:bg-green-600';
            }
            default: {
                return 'bg-gray-500 border-gray-500 text-white hover:bg-gray-600';
            }
        }
    }
}
