<?php

namespace Modules\CupGeo\Console;

use Gecche\Cupparis\App\Console\Commands\CupparisModuleInstall;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CupparisInstall extends CupparisModuleInstall
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'cup-geo:cupparis-install {type=i : install (i) or uninstall (u), default i}';

    /**
     * The console command description.
     */
    protected $description = 'Cupparis Geo Install';


    protected $moduleName = 'CupGeo';

}
