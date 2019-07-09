<?php

namespace  App\Basecode\Classes\Repositories;

use App\Item;
use App\ItemLog;
use App\Store;
use App\MediaFile;

class ItemRepository extends Repository
{

    public $model = '\App\Item';

    public $viewIndex = 'admin.items.index';
    public $viewCreate = 'admin.items.create';
    public $viewEdit = 'admin.items.edit';
    public $viewShow = 'admin.items.show';

    public $storeValidateRules = [
        // 'name' => 'required',
        'quantity' => 'min:1',
        
    ];
    public $updateValidateRules = [
        // 'name' => 'required',
        'quantity' => 'min:1',
    ];

    public function save( $attrs  ) {
        
        $attrs = $this->getValueArray($attrs);
        $attrs['user_id'] = auth()->user()->id;

        $model = new $this->model;
        $model->fill($attrs);
        $model->save();

        // if(request('store_id')) $model->stores()->sync( request('store_id') );

        return $model;
    }

    public function update($model, $attrs = null) {
        
        if(! $attrs ) $attrs = $this->getAttrs();
        
        $model->fill($attrs);

        $model->update();

//        if(request('store_id')) $model->stores()->sync( request('store_id') );
        
        return $model;
    }

    public function getAttrs() {
        $attrs = request()->all();

        $uploads = ['image', 'fat_reports'];

        if (filter_var(request('image'), FILTER_VALIDATE_URL)) {
            $attrs['image'] = $this->download_image(request('image'));

        } else {

            foreach ( $uploads as $upload ) {
                if( request()->hasFile($upload) ){
                    $attrs[$upload] = self::upload_file($upload);
                } elseif( $attrs && count($attrs) && array_key_exists($upload, $attrs) ) {
                    unset($attrs[$upload]);
                }
            }

        }
        
        return $attrs;
    }

    

    public function getCollection($withFilters = true) {
        
        $model = new $this->model;
        
        if($val = \request('stock')) $model = $model->where('items.name', 'like', '%'.$val.'%');

        if( $val = request('store_id') ) $model = $model->where('store_id', $val);

        $model = $model->orderBy('items.created_at', 'desc');
        
        if ( userHasChildUserCondition() ) {
            $storeIds = Store::where('user_id', auth()->user()->id)->pluck('id');
            $model = $model->whereIn('items.store_id', $storeIds);
        }

        return $model;
    }

    public function getItemLogsCollection( $withFilters = true ) {

        $model = new ItemLog();

        if ( userHasChildUserCondition() ) {

            $storeIds = Store::where('user_id', auth()->user()->id)->pluck('id');
            $itemIds = Item::where('store_id', $storeIds)->pluck('id');

            $model = $model->whereIn('item_logs.item_id', $itemIds);
        }

        return $model;

    }

    public function addItemLog($itemModel, $qty, $activity_type = ItemLog::ADD ) {

        $model = new ItemLog;

        $model->fill( $this->getAttrs() );
        $model->user_id = auth()->user()->id;
        $model->item_id = $itemModel->id;
        $model->qty_added = $itemModel->quantity;
        $model->qty = $qty;
        $model->activity_type = $activity_type;

        $model->save();
        
        if($files = \request('uploads')) {

            $i = 0;
            $templateIds = request('upload_template_id');
            foreach ($files as $file) {

                $url = $this->upload_file_s($file, 'items');
                
                MediaFile::create([
                    'model'                 => 'App\ItemLog',
                    'model_id'              => $model->id,
                    'type'                  => MediaFile::ITEM_DOCUMENT,
                    'name'                  => $file->getClientOriginalName(),
                    'url'                   => $url,
                    'upload_template_id'    => $templateIds[$i++]
                ]);
            }
        }
        

    }

    

}