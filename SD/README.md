# 18D
Broncode 18D

## Development

Set the `APP_DEBUG` environment variable to `true` to display PHP errors. In
production this variable should be unset or `false` so that errors are hidden.

### API configuration

The application communicates with different API endpoints depending on the
country. Base URLs can be overridden using environment variables:

- `API_BASE_URL_DEFAULT` - default API endpoint
- `API_BASE_URL_BE` - Belgium specific endpoint
- `API_BASE_URL_UK` - United Kingdom specific endpoint
 - `API_BASE_URL_DE` - Germany specific endpoint, also used for Austria (`AT`) and Switzerland (`CH`)

### Dating tips content

The entries defined in `includes/array_tips.php` contain HTML fragments. These
are stored in `$tips["tekst"]` and considered trusted HTML.
