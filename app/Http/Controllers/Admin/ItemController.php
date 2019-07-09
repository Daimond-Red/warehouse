<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\ItemLog;
use App\MediaFile;
use Illuminate\Http\Request;
use App\Basecode\Classes\Repositories\ItemRepository as Repository;
use App\Basecode\Classes\Repositories\StoreRepository;
use App\Basecode\Classes\Permissions\ItemPermission as Permission;

class ItemController extends BackendController
{
    public $repository, $storeRepository, $permission;

    function __construct(Repository $repository, StoreRepository $storeRepository, Permission $permission)
    {
        $this->repository = $repository;
        $this->storeRepository = $storeRepository;
        $this->permission = $permission;
    }

    public function index() {

        if(! $this->permission->index()) return;

        $collection = $this->repository->getCollection();

        if($val = \request('itemMasterId')) $collection = $collection->where('item_master_id', $val);

        if($val = \request('storeId')) $collection = $collection->where('store_id', $val);

        $collection = $collection->paginate(50000000);

        // dd($collection);

        return view($this->repository->viewIndex, [
           'collection' => $collection,
           'repository' => $this->repository
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        if(! $this->permission->create() ) return;
        
        $request->validate( getValidationRules(['store_id' => 'required']));

        if( request('quantity') <= 0 ) return $this->repository->redirectBackWithErrors('Invalid Qty');

        try {
            \DB::beginTransaction();

            foreach (request('store_id') as $store_id) {
                $model = $this
                    ->repository
                    ->getModel()
                    ->where('item_master_id', \request('item_master_id'))
                    ->where('store_id', $store_id)
                    ->where('user_id', auth()->user()->id)
                    ->first();

                if( $model ) {

                    $attrs['quantity'] = $model->quantity + \request('quantity');
                    $model->update($attrs);

                } else {

                    $attrs = $this->repository->getAttrs();
                    $attrs['store_id'] = $store_id;
                    $model = $this->repository->save( $attrs );
                }

                if( request('is_return') ) {
                    $this->repository->addItemLog( $model, \request('quantity'), ItemLog::RETURN );
                } else {
                    $this->repository->addItemLog( $model, \request('quantity') );
                }

            }

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return $this->repository->redirectBackWithSuccess($this->repository->create_msg);

    }

    public function edit($id) {

        if(! $this->permission->edit() ) return;

        $model = $this->repository->find($id);

        $stores = [];
        try {
            $collection = $model->stores()->get(['stores.id', 'stores.name']);
            foreach( $collection as $res ) $stores[$res->id] =  $res->name;

        } catch (\Exception $e){
        }
        

        return view($this->repository->viewEdit, [
            'model'         => $model,
            'stores'        => $stores,
            'repository'    => $this->repository
        ]);

    }

    public function stocks() {

        if(!$this->permission->stocks()) return;

        $location = \App\Location::first();

        $lat = (float)$location->lat;
        $lng = (float)$location->lng;
        

        if(\request('name')) {
            $lat = 0;
            $lng = 0;
        }
        $stocks = $this->repository->getCollection();

        if($val = \request('location') ) {
            
            $addressData = getAddressFromGoogle($val);
            if(! $addressData['lat'] ) return $this->repository->redirectBackWithErrors('Invalid location');

            $lat = $addressData['lat'];
            $lng = $addressData['lng'];
        }

        $collection = $this->storeRepository->getCollection()->get();

        $points = [];

        if(count($collection)) {


            foreach ($collection as $model) {
                $html = '<table style="background:white;box-shadow:0 0 3px lightgrey;border-radius:10px;" cellpadding="10" >';
                $html .= '<tr width="100%"><td colspan="2">';
                $html .= '<h5 style="font-weight:550;margin-bottom:2px;">'.$model->name.'</h5>';
                $html .= '<p style="margin-bottom:2px;width:360px;">'.$model->address.'</p>';
                $html .= '<p>'.$model->postcode.'</p></td>';
                $html .= '<td><image src="'.getImageUrl($model->image).'" alt="store-image" width="50px"></td></tr>';


                $items = $this->repository->getCollection()
                    ->where('store_id', $model->id)
                    ->get();
                
                $html .='<tr><td colspan="3"><table width="100%">';
                $html .= '<tr style="background:gray;color:white;"><th>ITEM</th><th>Available Quantity</th><th></th></tr>';
                if(count($items)) {
                    foreach ($items as $item) {

                        $html .= '<tr><td>'.optional($item->itemMasterRel)->name .' </td>';
                        $html .= '<td style="font-weight: bold;"> <span style="margin-left:2px">'. $item->quantity.' <span></td>';
                        $html .= '<td style="padding-top:.5rem;float:right"><a href="'.route('admin.releaseStocks.index', ['store_id' => $model->id]) .'" class="btn btn-info btn-sm" style="margin-right:5px">Release</a><a href="'.route('admin.items.index') .'" class="btn btn-info btn-sm">Add Stock</a></td></tr>';

                    }
                } else {
                    $html .='<tr style="text-align:center;"><td colspan="4">No Stock available.</td></tr>';
                }


                $html .= '</table></td></tr></table>';
                $points[] = [
                    trim($html),
                    (float)$model->lat,
                    (float)$model->lng,
                    1
                ];
            }
        }

        $data[] = $points;

        return view('admin.items.stocks', [
            'data' => $data,
            'lat' => $lat,
            'lng' => $lng
        ]);
    }

    public function quantity(){

        if(!$this->permission->edit()) return;
        $model = $this->repository->getModel()->where('id', request('id'))->first();
        return view('admin.items.quantity', [
            'model' => $model
        ]);
    }

    public function item() {
//        if(!$this->permission->edit()) return;

        $model = $this->repository->getModel()->where('id', request('item_id'))->first();

        $quantity = request('quantity');

        if($quantity > $model->quantity) return view('admin.items.item', [
            'model' => [],
            'quantity' => $quantity
        ]);



        return view('admin.items.item', [
            'model' => $model,
            'quantity' => $quantity

        ]);
    }
    public function itemCheck() {

        $model = $this->repository->getModel()->where('id', request('item_id'))->first();

        $quantity = request('quantity');

        if($quantity > $model->quantity) return 0;

        return 1;
    }

    public function _map() {

        $collection = $this->storeRepository->getCollection()->get();

        if(!count($collection)) return [];

        $points = [];

        foreach ($collection as $model) {
            $html = '<table style="background:white;box-shadow:0 0 3px lightgrey;border-radius:10px;" cellpadding="10">';
            $html .= '<tr><td colspan="2">';
            $html .= '<h5 style="font-weight:550;margin-bottom:2px;">'.$model->name.'</h5>';
            $html .= '<p style="margin-bottom:2px;">'.$model->address.'</p>';
            $html .= '<p>'.$model->postcode.'</p></td>';
            $html .= '<td><image src="'.getImageUrl($model->image).'" alt="store-image" width="50px"></td></tr>';

            $items = $model->items;

            $html .='<tr><td colspan="3"><table width="100%">';
            $html .= '<tr style="background:gray;color:white;"><th>ITEM</th><th>STOCK</th><th></th></tr>';

            foreach ($items as $item) {

                $html .= '<tr><td>'.$item->name .'</td>';
                $html .= '<td>'.$item->quantity.'</td>';
                $html .= '<td><a class="btn btn-outline-secondary btn-sm">View</a></td></tr>';

            }
            $html .= '</table></td></tr></table>';

            $points[] = [
                trim($html),
                (float)$model->lat,
                (float)$model->lng,
                1
            ];
        }
        return $points;

    }

    public function history ( $id ) {

        $collection = ItemLog::whereItemId($id)->get();

        return view('admin.items.history', compact('collection'));

    }

    public function activityIndex($userId) {

        $collection = $this->repository
            ->getItemLogsCollection()
            ->join('items', 'items.id', '=', 'item_logs.item_id')
            ->where('item_logs.user_id', $userId)
            ->select('item_logs.*')
            ->get();

        return view('admin.items.activityIndex', compact('collection'));

    }

    public function activityApprove($id) {

        $model = ItemLog::find($id);

        if($model->is_approved != 0) return redirect()->back();

        $model->update(['is_approved' => 1]);

        return redirect()->back();

    }

    public function documents($id) {
        $model = Item::findOrFail($id);
        $type = MediaFile::ITEM_DOCUMENT;
        return view('admin.items.documents', compact('model', 'type'));
    }

    public function finalFiles($id) {
        $model = Item::findOrFail($id);
        $type = MediaFile::ITEM_FINAL_FILES;
        return view('admin.items.documents', compact('model', 'type'));
    }

    public function documentsStore( $id ) {

        $url = $this->repository->upload_file('file');

        MediaFile::create([
            'model'                 => Item::class,
            'model_id'              => $id,
            'type'                  => request('type'),
            'name'                  => request()->file('file')->getClientOriginalName(),
            'url'                   => $url,
            'upload_template_id'    => request('upload_template_id')
        ]);

        return $this->repository->redirectBackWithSuccess('File uploaded successfully');

    }

    public function documentsDelete( $id ) {

        $model = MediaFile::findOrFail($id);
        $model->delete();

        return $this->repository->redirectBackWithSuccess($this->repository->delete_msg);

    }

}
