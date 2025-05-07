   #!/bin/bash
   
   # Build the project
   composer install --no-dev --optimize-autoloader
   npm run build
   
   # Cache everything
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   
   # Set permissions
   chmod -R 775 storage bootstrap/cache