<?php

namespace  App\Basecode\Classes\Repositories;

use App\ItemLog;
use App\MediaFile;
use App\ReleaseStock;

class ReleaseStockRepository extends Repository
{

    public $model = '\App\ReleaseStock';

    public $viewIndex = 'admin.releaseStocks.index';
    public $viewCreate = 'admin.releaseStocks.create';
    public $viewEdit = 'admin.releaseStocks.edit';
    public $viewShow = 'admin.releaseStocks.show';

    public $storeValidateRules = [
        // 'vendor_id' => 'required',
        'store_id' => 'required'
    ];

    public $updateValidateRules = [
        // 'vendor_id' => 'required',
        'store_id' => 'required'
    ];

    public function save( $attrs ) {

        $attrs = $this->getAttrs();

        if(!\request('vendor_id')) $attrs['vendor_id'] = 0;

        $i = 0;

        $quantities = request('quantities');
        
        $items = request('items');

        
        if($items) {

            foreach($items as $item) {

                $attrs['item_id'] = $item;
                $attrs['quantity'] = $quantities[$item];

                $attrs['user_id'] = auth()->user()->id;
                
                $model = new $this->model;

                $model->fill($attrs);
                $model->save();

                $itemModel = \App\Item::find($item);

                $itemModel->quantity = (Int)$itemModel->quantity - (Int)$quantities[$item];

                $itemModel->update();

                if($files = \request('uploads')) {

                    $i = 0;
                    $templateIds = request('upload_template_id');
                    foreach ($files as $file) {

                        $url = $this->upload_file_s($file, 'items');

                        MediaFile::create([
                            'model'                 => ReleaseStock::class,
                            'model_id'              => $model->id,
                            'type'                  => MediaFile::ITEM_DOCUMENT,
                            'name'                  => $file->getClientOriginalName(),
                            'url'                   => $url,
                            'upload_template_id'    => $templateIds[$i++]
                        ]);
                    }
                }

                $this->addItemLog($itemModel, $quantities[$item]);
            }
        } else {
            return '';
        }
        

        return $model;
    }

    public function getAttrs() {
        $attrs = parent::getAttrs();
        if(request('date')) $attrs['date'] = date('Y-m-d', strtotime(request('date')));
        return $attrs;
    }

    public function getCollection($withFilters = true) {
        
        $model = new $this->model;
        
        $model = $model->orderBy('created_at', 'desc');

        if ( userHasChildUserCondition() ) {
            $model = $model->where('user_id', auth()->user()->id);
        }
        return $model;
    }

    public function addItemLog($itemModel, $qty) {

        $model = new ItemLog;
        $model->fill(request()->all());
        $model->user_id = auth()->user()->id;
        $model->item_id = $itemModel->id;
        $model->qty_added = $itemModel->quantity;
        $model->qty = $qty;
        $model->activity_type = \App\ItemLog::RELEASE;
        $model->save();

    }

}