composer require laravel/ui

git add .
git commit -m "first commit"
git push -u origin main


php artisan ui:auth
php artisan make:controller Admin/ProfileController --resource


php artisan route:list --except-vendor


composer require yoeunes/toastr
php artisan flasher:install
 composer require spatie/laravel-permission

php artisan make:controller Admin/RoleController --resource

npm install vue
