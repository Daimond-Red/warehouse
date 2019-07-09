<?php

namespace App\Http\Controllers\Admin;

use App\Basecode\Classes\Permissions\ReportPermission as Permission;
use App\Basecode\Classes\Repositories\ItemMasterRepository;
use App\Basecode\Classes\Repositories\ItemRepository;
use App\Basecode\Classes\Repositories\Repository;
use App\ItemLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends BackendController {

    public $itemMasterRepository, $itemRepository;

    public function __construct(
        Repository $repository,
        ItemMasterRepository $itemMasterRepository,
        ItemRepository $itemRepository,
        Permission $permission
    ) {
        parent::__construct($repository, $permission);
        $this->itemMasterRepository = $itemMasterRepository;
        $this->itemRepository = $itemRepository;
    }

    public function index() {

        if(! $this->permission->index()) return;

        if ( request('download') ) {

            $itemMasterCollection = $this->itemMasterRepository->getCollection()->get();

            $prevMonthCount = $this->itemRepository
                        ->getItemLogsCollection()
                        ->join('items', 'items.id', '=', 'item_logs.item_id')
                        ->join('item_masters', 'items.item_master_id', '=', 'item_masters.id')
                        ->where('item_logs.activity_type', ItemLog::ADD)
                        ->whereMonth('item_logs.created_at', '<=', request('month')-1)
                        ->whereYear('item_logs.created_at', '<=', request('year'))
                        ->select('item_masters.id', \DB::raw('sum(qty) as sum'))
                        ->pluck('sum', 'id');

            $currentMonthCount = $this->itemRepository
                ->getItemLogsCollection()
                ->join('items', 'items.id', '=', 'item_logs.item_id')
                ->join('item_masters', 'items.item_master_id', '=', 'item_masters.id')
                ->where('item_logs.activity_type', ItemLog::ADD)
                ->whereMonth('item_logs.created_at', '=', request('month'))
                ->whereYear('item_logs.created_at', '=', request('year'))
                ->select('item_masters.id', \DB::raw('sum(qty) as sum'))
                ->pluck('sum', 'id');

            // ------------------------------------------------------
            $prevMonthCountRL = $this->itemRepository
                ->getItemLogsCollection()
                ->join('items', 'items.id', '=', 'item_logs.item_id')
                ->join('item_masters', 'items.item_master_id', '=', 'item_masters.id')
                ->where('item_logs.activity_type', ItemLog::RELEASE)
                ->whereMonth('item_logs.created_at', '<=', request('month')-1)
                ->whereYear('item_logs.created_at', '<=', request('year'))
                ->select('item_masters.id', \DB::raw('sum(qty) as sum'))
                ->pluck('sum', 'id');

            $currentMonthCountRL = $this->itemRepository
                ->getItemLogsCollection()
                ->join('items', 'items.id', '=', 'item_logs.item_id')
                ->join('item_masters', 'items.item_master_id', '=', 'item_masters.id')
                ->where('item_logs.activity_type', ItemLog::RELEASE)
                ->whereMonth('item_logs.created_at', '=', request('month'))
                ->whereYear('item_logs.created_at', '=', request('year'))
                ->select('item_masters.id', \DB::raw('sum(qty) as sum'))
                ->pluck('sum', 'id');

            // ------------------------------------------------------
            $prevMonthCountRT = $this->itemRepository
                ->getItemLogsCollection()
                ->join('items', 'items.id', '=', 'item_logs.item_id')
                ->join('item_masters', 'items.item_master_id', '=', 'item_masters.id')
                ->where('item_logs.activity_type', ItemLog::RETURN)
                ->whereMonth('item_logs.created_at', '<=', request('month')-1)
                ->whereYear('item_logs.created_at', '<=', request('year'))
                ->select('item_masters.id', \DB::raw('sum(qty) as sum'))
                ->pluck('sum', 'id');

            $currentMonthCountRT = $this->itemRepository
                ->getItemLogsCollection()
                ->join('items', 'items.id', '=', 'item_logs.item_id')
                ->join('item_masters', 'items.item_master_id', '=', 'item_masters.id')
                ->where('item_logs.activity_type', ItemLog::RETURN)
                ->whereMonth('item_logs.created_at', '=', request('month'))
                ->whereYear('item_logs.created_at', '=', request('year'))
                ->select('item_masters.id', \DB::raw('sum(qty) as sum'))
                ->pluck('sum', 'id');

            $data = compact(
                'itemMasterCollection',
                'prevMonthCount',
                'currentMonthCount',
                'prevMonthCountRL',
                'currentMonthCountRL',
                'prevMonthCountRT',
                'currentMonthCountRT'
            );

            $name = time(). '_'. date('F_Y', strtotime(request('year').'-'. \request('month'). '-01'));

            \Excel::create($name, function($excel) use($data) {

                $excel->sheet('New sheet', function($sheet) use($data) {
                    $sheet->loadView('admin.reports._index', $data);
                });

            })->export('xls');

            return view('admin.reports._index', compact(
                'itemMasterCollection',
                'prevMonthCount',
                'currentMonthCount',
                'prevMonthCountRL',
                'currentMonthCountRL',
                'prevMonthCountRT',
                'currentMonthCountRT'
            ));
        }

        return view('admin.reports.index');
    }

}
