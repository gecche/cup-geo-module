# cup-geo-module
Laravel cupparis app - modulo geografiche

Procedura di installazione

1 - php artisan vendor:publish
(copia i files)
2 - php artisan install-cupparis-package cupparis-app-geografiche
(aggiorna il json generale)
3 - php artisan migrate
4 - php artisan db:seed --class=CupGeoSeeder
(popola le tabelle geografiche con la versione dei files in corso)

in head aggiungere
{!! Theme::css('assets/css/cupgeo.css') !!}


```    
php artisan vendor:publish --provider="Modules\CupGeo\Providers\CupGeoServiceProvider"
composer dump-autoload
php artisan install-cupparis-package CupGeo
php artisan module:migrate CupGeo
php artisan module:migrate CupGeo --subpath=datafile
php artisan module:seed CupGeo
ln -s ../../../../vendor/components/flag-icon-css/css/flag-icon.css public/admin/assets/css/flag-icon.css
ln -s ../../../vendor/components/flag-icon-css/flags public/admin/assets/flags
```

Procedura di disinstallazione

1 - php artisan uninstall-cupparis-package cupparis-app-geografiche --json
(cancella i files, aggiorna il json generale e cancella il json del pacchetto)
2 - eventualmente:
a - php artisan migrate:rollback

```    
php artisan uninstall-cupparis-package CupGeo
php artisan migrate:rollback --path=Modules/CupGeo/Database/Migrations/datafile
php artisan module:migrate-rollback CupGeo
```    
