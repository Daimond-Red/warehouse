<?php

namespace  App\Basecode\Classes\Repositories;

class ItemMasterRepository extends Repository
{

    public $model = '\App\ItemMaster';

    public $viewIndex = 'admin.itemMasters.index';
    public $viewCreate = 'admin.itemMasters.create';
    public $viewEdit = 'admin.itemMasters.edit';
    public $viewShow = 'admin.itemMasters.show';

    public $storeValidateRules = [
        'name' => 'required',
    ];
    public $updateValidateRules = [
        'name' => 'required',
    ];

    public function save( $attrs  ) {
        
        $attrs = $this->getValueArray($attrs);

        $attrs['user_id'] = auth()->user()->id;
        
        $model = new $this->model;
        $model->fill($attrs);
        $model->save();

        return $model;
    }

    public function update($model, $attrs = null) {
        
        if(! $attrs ) $attrs = $this->getAttrs();
        
        $model->fill($attrs);

        $model->update();

        return $model;
    }

    public function getAttrs() {
        $attrs = request()->all();

        $uploads = ['image'];

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
        
        $model = $model->orderBy('created_at', 'asc');
        
        // if ( userHasChildUserCondition() ) {
        //     $model = $model->where('user_id', auth()->user()->id);
        // }
        
        return $model;
    }

}