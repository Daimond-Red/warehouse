@extends('layouts.master')

@section('pageBar')
    Dashboard
@stop

@section('content')
    <!-- stats -->
    <div class="panel wrapper">
        <div class="row">
            <div class="col-md-4 p-r no-border-xs">
                <span class="text-xs text-black pull-right m-r">
                    {{--<i class="fa fa-circle text-primary m-r-xs m-l-sm"></i> {{ $storeCount }}--}}
                </span>
                <h4 class="m-t-none m-b-md text-black">Total Number of Warehouse </h4>
                <div class=" m-b">
                    @if(count($userCollection))
                        @foreach($userCollection as $userModel)
                            <div class="m-b">
                                <span class="label pull-right text-base bg-info pos-rlt m-r"><i class="arrow left arrow-info"></i> {{ optional($userModel->storeRel())->count() }}</span>
                                <a href="{{ route('admin.stores.index', ['userId' => $userModel->id]) }}" class="">{{ $userModel->name }}</a>
                            </div>
                        @endforeach
                    @else
                        <div class="m-b">
                            <a href="javascript:void(0);">No Record found</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-8 b-l b-dark no-border-xs">
                <?php $total = \App\Item::select(\DB::raw('sum(quantity) as total'))->pluck('total');  ?>
                <span class="text-xs text-black pull-right m-r">
                    {{--<i class="fa fa-circle text-primary m-r-xs m-l-sm"></i> {{ $total[0] }}--}}
                </span>
                <h4 class=" m-t-none m-b-md text-black m-l">Accumulative Stock </h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class=" m-b">
                            @if(!count($firstHalfItems))
                                <div class="m-b">No Record Found</div>
                            @else
                                @foreach($firstHalfItems as $item)
                                    <?php $quantity = $item->itemsRel()->select(\DB::raw('sum(quantity) as total'))->pluck('total');  ?>
                                    <div class="m-b m-l">
                                        <span class="label pull-right text-base bg-info pos-rlt m-r "><i class="arrow left arrow-info"></i> {{ $quantity[0] }}</span>
                                        <a href="{{ route('admin.items.index', ['itemMasterId' => $item->id]) }}"  data-toggle="tooltip" title="{{ $item->name }}">{{ substr($item->name, 0, 30)  }} {{ strlen($item->name) > 25 ? ' ...' :'' }}</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class=" m-b">
                            @if(!count($secondHalfItems))

                            @else
                                @foreach($secondHalfItems as $item)
                                    <?php $quantity = $item->itemsRel()->select(\DB::raw('sum(quantity) as total'))->pluck('total');  ?>
                                    <div class="m-b">
                                        <span class="label pull-right text-base bg-info pos-rlt m-r"><i class="arrow left arrow-info"></i> {{ $quantity[0] }}</span>
                                        <a href="{{ route('admin.items.index', ['itemMasterId' => $item->id]) }}" data-toggle="tooltip" title="{{ $item->name }}">{{ substr($item->name, 0, 30)  }} {{ strlen($item->name) > 25 ? ' ...' :'' }}</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / stats -->

    <!-- tasks -->
    <div class="row">
        @if(count($userCollection))
            @foreach($userCollection as $userModel)
                <div class="col-md-4">
                    <div class="panel no-border" style="min-height: 410px;">
                        <div class="panel-heading wrapper b-b b-light">
                            <span class="text-xs text-black pull-right">
                                {{-- <i class="fa fa-circle text-primary m-r-xs"></i> 12 --}}
                                <i class="fa fa-circle text-info m-r-xs m-l-sm"></i> Warehouse List
                            </span>
                            <h4 class=" m-t-none m-b-none text-black">{{ $userModel->name }}</h4>
                        </div>
                        <ul class="list-group list-group-lg m-b-none">
                            @if(optional($userModel->storeRel())->count())
                                <?php $stores = $userModel->storeRel; ?>
                                @foreach($stores as $store)
                                    <li class="list-group-item">
                                        <a href="" class="thumb-sm m-r">
                                            <img src="{{ getImageUrl($store->image) }}" class="r r-2x">
                                        </a>
                                        <a class="pull-right ">{{ $store->village }} </a>
                                        <a href="{{ route('admin.items.index', ['storeId' => $store->id]) }}">{{ $store->name }}</a>
                                    </li>
                                @endforeach
                            @else
                                <li class="list-group-item">No Record found.</li>
                            @endif
                        </ul>
                        @if(optional($userModel->storeRel())->count() >= 5)
                            <div class="panel-footer">
                                {{-- <span class="pull-right badge badge-bg m-t-xs">32</span> --}}
                                <a href="{{ route('admin.stores.index', ['userId' => $userModel->id]) }}" class="btn btn-primary btn-addon btn-sm">View More</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-4">
                <div class="panel no-border">
                    <div class="panel-heading wrapper b-b b-light text-center">
                        <h4 class="font-thin m-t-none m-b-none text-muted">No Records Found.</h4>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <div class="row">
        @if(count($userCollection))
            @foreach($userCollection as $userModel)
                <?php
                    $activities = \App\ItemLog::
                                        join('items', 'items.id', '=', 'item_logs.item_id')
                                        ->where('item_logs.user_id', $userModel->id)
                                        ->select('item_logs.*')
                                        ->latest()
                                        ->take(5)
                                        ->get();
                ?>
                <div class="col-md-4">
                    <div class="panel no-border" style="min-height: 410px;">
                        <div class="panel-heading wrapper b-b b-light">
                            {{-- <span class="text-xs text-muted pull-right">
                                <i class="fa fa-circle text-primary m-r-xs"></i> 12
                                <i class="fa fa-circle text-info m-r-xs m-l-sm"></i> 30
                                <i class="fa fa-circle text-primary m-r-xs m-l-sm"></i> Stock Approval
                            </span> --}}
                            <h4 class=" m-t-none m-b-none text-black">Approval Status ({{ $userModel->name }})</h4>
                        </div>
                        <ul class="list-group list-group-lg m-b-none">
                            @if(count($activities))
                                @foreach($activities as $row)

                                    <li class="list-group-item">
                                        <a href="" class="">
                                            <span class="text-base  pos-rlt m-r"> {{ getDateValue($row->created_at) }} </span>
                                        </a>
                                        <?php $name = optional(optional($row->itemRel)->itemMasterRel)->name;

                                            if(! $name ) {
                                                dd( $row->toArray() );
                                            }

                                            $bg = $row->is_approved == 0 ? 'bg-primary' : 'bg-success';
                                        ?>
                                        @if($row->is_approved == 0)
                                            <span class="pull-right label {{ $bg }} inline m-t-none">Unapproved</span>
                                        @else
                                            <span class="pull-right label {{ $bg }} inline m-t-none">Approved</span>
                                        @endif

                                        <span class="m-t-none m-r ">{{ $row->activity_type }}</span>
                                        <a href="javascript:void(0);" data-toggle="tooltip" title="{{ $name }}" class="pull-right m-r">{{ substr($name, 0, 15)  }} {{ strlen($name) > 15 ? ' ...' :'' }}</a>

                                    </li>
                                @endforeach
                            @else
                                <li class="list-group-item">No Record found.</li>
                            @endif
                        </ul>
                        @if( count($activities) )
                            <div class="panel-footer">
                                {{-- <span class="pull-right badge badge-bg m-t-xs">32</span> --}}
                                <a href="{{ route('admin.items.activityIndex', [$userModel->id]) }}" class="btn btn-primary btn-addon btn-sm">View More</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-4">
                <div class="panel no-border">
                    <div class="panel-heading wrapper b-b b-light text-center">
                        <h4 class="font-thin m-t-none m-b-none text-muted">No Records Found.</h4>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- / tasks -->
@stop

@section('script')
    <script>
        $('document').ready(function(){
            $('.dashboard-menu').addClass('active');
        });
    </script>
@stop