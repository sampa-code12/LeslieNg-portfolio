# FolioOne Portfolio - Laravel Integration

## Structure

This project integrates the FolioOne Bootstrap portfolio template into Laravel using Blade templates.

### Directory Structure

```
resources/
├── views/
│   ├── layouts/
│   │   └── folio.blade.php       # Main layout template
│   └── folio/
│       ├── index.blade.php         # Home page
│       ├── about.blade.php         # About page
│       ├── resume.blade.php        # Resume page
│       ├── services.blade.php      # Services page
│       ├── portfolio.blade.php     # Portfolio page
│       ├── contact.blade.php       # Contact page
│       ├── service-details.blade.php   # Service details page
│       ├── portfolio-details.blade.php # Portfolio details page
│       └── starter-page.blade.php  # Starter template page

public/
└── folio/                          # All portfolio assets
    ├── assets/
    │   ├── css/
    │   │   └── main.css
    │   ├── js/
    │   │   └── main.js
    │   ├── img/                # All portfolio images
    │   ├── scss/               # SCSS source files
    │   └── vendor/             # Bootstrap and dependencies
    └── forms/
        └── contact.php         # Contact form handler
```

### Routes

All FolioOne pages are accessible under the `/folio` prefix:

- **Home**: `/folio`
- **About**: `/folio/about`
- **Resume**: `/folio/resume`
- **Services**: `/folio/services`
- **Portfolio**: `/folio/portfolio`
- **Contact**: `/folio/contact`
- **Service Details**: `/folio/service-details`
- **Portfolio Details**: `/folio/portfolio-details`
- **Starter Page**: `/folio/starter-page`

### Asset Usage

All assets are loaded using Laravel's `asset()` helper function with the `folio/` prefix:

```blade
<link href="{{ asset('folio/css/main.css') }}" rel="stylesheet">
<script src="{{ asset('folio/js/main.js') }}"></script>
<img src="{{ asset('folio/img/portfolio/portfolio-1.webp') }}" alt="">
```

### Navigation Links

Navigation links are generated using Laravel's `route()` helper function:

```blade
<a href="{{ route('folio.index') }}">Home</a>
<a href="{{ route('folio.about') }}">About</a>
<a href="{{ route('folio.portfolio') }}">Portfolio</a>
```

### Static Links

For static HTML pages in the original template, navigation is handled dynamically:

- Pages detect the current route using `Route::currentRouteName()`
- Active menu items are highlighted based on the current page

### Contact Form

The contact form uses Laravel's CSRF protection with `@csrf` directive. The form action uses `route()` helper:

```blade
<form action="{{ url('contact/submit') }}" method="post">
    @csrf
    ...
</form>
```

To handle contact form submissions, add a route and controller method as needed.

## Running the Application

1. Start the Laravel development server:
```bash
php artisan serve
```

2. Access the portfolio at:
```
http://localhost:8000/folio
```

## Customization

### Update Content

Edit the Blade files in `resources/views/folio/` to customize content for each page.

### Update Styles

Modify the CSS files in `public/folio/assets/css/` or the SCSS source files in `public/folio/assets/scss/`.

### Add More Pages

1. Create a new Blade file in `resources/views/folio/`
2. Add a method to `app/Http/Controllers/FolioController.php`
3. Add a route in `routes/web.php`

## Notes

- All asset paths use the `folio/` prefix for organization
- The layout template (`folio.blade.php`) contains header, navigation, and footer
- Each page extends this layout and provides content via `@yield('content')`
- Image paths reference the correct location using `asset()` helper
