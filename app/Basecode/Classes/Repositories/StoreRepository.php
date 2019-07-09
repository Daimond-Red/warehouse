<?php

namespace  App\Basecode\Classes\Repositories;

class StoreRepository extends Repository
{

    public $model = '\App\Store';

    public $viewIndex = 'admin.stores.index';
    public $viewCreate = 'admin.stores.create';
    public $viewEdit = 'admin.stores.edit';
    public $viewShow = 'admin.stores.show';

    public $storeValidateRules = [
        'name' => 'required',
        'address' => 'required'
    ];

    public $updateValidateRules = [
        'name' => 'required',
        'address' => 'required'
    ];

    public function save( $attrs ) {

        $attrs = $this->getValueArray($attrs);

        $model = new $this->model;
        $model->fill($attrs);
        $model->user_id = auth()->user()->id;
        $model->save();

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

        if( $val = request('address') ) {

            if(! request('lat') ) {
                $addressData = getAddressFromGoogle($val);
                
                $attrs['lat'] = $addressData['lat'];
                $attrs['lng'] = $addressData['lng'];
            }

        }

        return $attrs;
    }

    public function getCollection($withFilters = true) {
        
        $model = new $this->model;

        $radius = 15;
        if($withFilters) {
            if (\request('radius')) $radius = \request('radius');

            if ($val = \request('name')) $model = $model->where('name', 'like', '%' . $val . '%');

            if ($val = \request('location')) {

                $addressData = getAddressFromGoogle($val);

                $lat = $addressData['lat'];
                $lng = $addressData['lng'];

                $model = $this->whereStoreLocationDistance($addressData['lat'], $addressData['lng'], $radius);

            }

            if (\request('item_id')) {
                $itemModel = \App\Item::find(\request('item_id'));

                if ($itemModel) $model = $itemModel->stores();
            }

            
        }
        if (userHasChildUserCondition()) {
            $model = $model->where('user_id', auth()->user()->id);
        }
        $model = $model->orderBy('created_at', 'desc');
        
        return $model;
    }

    public function whereStoreLocationDistance($orig_lat, $orig_lon, $distanceInMiles = 15) {

        if(! $orig_lat ) $orig_lat = 0;
        if(! $orig_lon ) $orig_lon = 0;

        return \App\Store::select('*', \DB::raw(" round( 3956 * 2 * ASIN(SQRT( POWER(SIN(($orig_lat - abs( lat)) * pi()/180 / 2),2) + COS($orig_lat * pi()/180 ) * COS( abs (lat) *  pi()/180) * POWER(SIN(($orig_lon - lng) *  pi()/180 / 2), 2) )), 1) as gDistance"))->having('gDistance', '<=', $distanceInMiles);

    }
}