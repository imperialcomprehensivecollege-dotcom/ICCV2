import defaultConfig from 'tailwindcss/defaultConfig'

export default {
  presets: [defaultConfig],
  content: [
    './resources/**/*.blade.php',
    './app/Filament/**/*.php',
    './vendor/filament/**/*.blade.php',
  ],
}
