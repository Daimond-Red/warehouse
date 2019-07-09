<?php

namespace App\Http\Controllers;

use App\Basecode\Classes\Repositories\ItemRepository;
use App\Basecode\Classes\Repositories\ReleaseStockRepository;
use App\Basecode\Classes\Repositories\StoreRepository;
use App\Basecode\Classes\Repositories\UserRepository;
use App\Basecode\Classes\Repositories\ItemMasterRepository;

class HomeController extends Controller {

    public $storeRepository, $userRepository, $itemRepository, $releaseStockRepository, $itemMasterRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        StoreRepository $storeRepository,
        UserRepository $userRepository,
        ItemRepository $itemRepository,
        ReleaseStockRepository $releaseStockRepository,
        ItemMasterRepository $itemMasterRepository
    ) {
        $this->middleware('auth');
        $this->storeRepository = $storeRepository;
        $this->userRepository = $userRepository;
        $this->itemRepository = $itemRepository;
        $this->releaseStockRepository = $releaseStockRepository;
        $this->itemMasterRepository = $itemMasterRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        if(! isSuperAdmin() ) return redirect()->route('admin.items.stocks');
        
        $storeCount = $this->storeRepository->getCollection()->where('user_id', '<>', 1)->count();
        
        $itemCount = $this->itemRepository->getCollection()->count();
        $releaseStockCount = $this->releaseStockRepository->getCollection()->count();

        $firstHalfItems = $this->itemMasterRepository->getCollection()->skip(0)->latest()->take(4)->get();

        $secondHalfItems = $this->itemMasterRepository->getCollection()->skip(4)->latest()->take(4)->get();

        $userCollection = $this->userRepository->getCollection()->get();

        
        return view('dashboard', compact('storeCount',  'itemCount', 'releaseStockCount', 'userCollection', 'firstHalfItems', 'secondHalfItems'));

    }
}
