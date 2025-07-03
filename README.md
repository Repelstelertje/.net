# .net

This repository contains the sources for multiple small PHP sites.

Each site has its own directory (`18D`, `S55` and `SD`). To refresh the
sitemap for a site, change into the desired directory and run:

```bash
php generate_sitemap.php
```

The command regenerates or appends new URLs to `sitemap.xml` using the
configuration found in `includes/config.php`.

