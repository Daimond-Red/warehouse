<?php

namespace App\Providers;

use App\Basecode\Classes\Repositories\ItemMasterRepository;
use App\Basecode\Classes\Repositories\StoreRepository;
use App\UploadTemplate;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {

        view()->composer([
            'admin.items.form',
        ], function ($view) {

            $repository = new ItemMasterRepository();

            $collection = ['' => 'Please Select'] + $repository->getCollection()->orderBy('id', 'desc')->pluck('name', 'id')->toArray();

            $view->with('itemMasterSelect', $collection);
        });

        view()->composer([
            'admin.items.form',
        ], function ($view) {

            $repository = new StoreRepository();

            $collection = $repository->getCollection()->orderBy('id', 'desc')->pluck('name', 'id')->toArray();

            $view->with('storesSelect', $collection);
        });

        view()->composer([
            'admin.items.documents',
            'admin.items.form',
            'admin.items.create',
            'admin.items.edit',
            'admin.releaseStocks.index',
        ], function ($view) {

            $repository = new UploadTemplate();

            $collection = ['' => 'Please Select'] + $repository->orderBy('id', 'desc')->pluck('title', 'id')->toArray();

            $view->with('uploadTypesSelect', $collection);
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
