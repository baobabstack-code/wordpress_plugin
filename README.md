# My Custom Plugin

A modern WordPress plugin boilerplate with PSR-4 autoloading and organized structure.

## Description

This is a boilerplate template for developing WordPress plugins using modern PHP practices, including Composer autoloading and a clean MVC-style architecture.

## Features

- PSR-4 autoloading with Composer
- Organized directory structure
- Separate admin and public-facing functionality
- Activation/Deactivation hooks
- Asset management (CSS/JS)
- Translation ready

## Directory Structure

```
wordpress_plugin/
├── src/
│   ├── Admin/
│   │   ├── Admin.php
│   │   └── views/
│   │       └── admin-page.php
│   ├── Public/
│   │   └── PublicFacing.php
│   ├── Plugin.php
│   ├── Loader.php
│   ├── Activator.php
│   └── Deactivator.php
├── assets/
│   ├── css/
│   │   ├── admin.css
│   │   └── public.css
│   ├── js/
│   │   ├── admin.js
│   │   └── public.js
│   └── images/
├── languages/
├── my-custom-plugin.php
├── composer.json
└── README.md
```

## Installation

1. Clone this repository into your WordPress plugins directory:
   ```bash
   cd wp-content/plugins/
   git clone https://github.com/baobabstack-code/wordpress_plugin.git
   ```

2. Install Composer dependencies:
   ```bash
   cd wordpress_plugin
   composer install
   ```

3. Activate the plugin through the WordPress admin panel

## Development

### Prerequisites

- PHP >= 7.4
- Composer
- WordPress >= 5.8

### Setup

1. Install dependencies:
   ```bash
   composer install
   ```

2. Customize the plugin:
   - Update plugin header in `my-custom-plugin.php`
   - Rename namespace from `MyCustomPlugin` to your plugin name
   - Update text domain throughout files

### Git Workflow

1. Create a feature branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. Make your changes and commit:
   ```bash
   git add .
   git commit -m "Add your feature"
   ```

3. Push to GitHub:
   ```bash
   git push origin feature/your-feature-name
   ```

4. Create a Pull Request on GitHub

## Usage

After activation, you'll find a new menu item "My Plugin" in the WordPress admin dashboard.

### Adding Custom Functionality

**Admin hooks** - Edit `src/Admin/Admin.php`

**Public hooks** - Edit `src/Public/PublicFacing.php`

**Custom classes** - Add to `src/` directory with proper namespace

## Testing

```bash
composer require --dev phpunit/phpunit
vendor/bin/phpunit
```

## License

GPL v2 or later

## Credits

Developed by [Your Name](https://yourwebsite.com)
