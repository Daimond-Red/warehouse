<?php

namespace  App\Basecode\Classes\Repositories;

class LocationRepository extends Repository
{

    public $model = '\App\Location';

    public $viewIndex = 'admin.locations.index';
    public $viewEdit = 'admin.locations.edit';

    public $updateValidateRules = [
        'location' => 'required'
    ];
    public function save( $attrs  ) {
        
        $attrs = $this->getValueArray($attrs);
        
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

        if( $val = request('location') ) {
                
            $addressData = getAddressFromGoogle($val);
            
            $attrs['lat'] = $addressData['lat'];
            $attrs['lng'] = $addressData['lng'];
        }

        return $attrs;
    }

}