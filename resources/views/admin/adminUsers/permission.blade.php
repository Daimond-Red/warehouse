<style>
	ol{
		padding:0;
	}
	ol li{
		float:left;
		width:15%;
		margin-right:1%;
		padding:10px;
		box-shadow:0 2px 10px lightgrey;
		min-height:208px;
		list-style:none;
	}
	
</style>

<label class="form-control-label">Permission List</label>
@if( isset($permissions)  && $permissions && count($permissions) )

    <ol>

        @foreach( \App\User::$arrs as $arr )

            <li>
                <p class="text-primary">{{ $arr['title']  }}</p>

                @foreach( $arr['items'] as $item )

                <div class="">
                    <label>
                        <input type="checkbox" <?php  if( in_array($arr['tag']. '_'.$item['tag'], $permissionIds) ) echo 'checked';  ?> name="permissions[]" value="{{ $arr['tag']. '_'.$item['tag'] }}">
						<span style="margin-left:7px;" class="mrgn-3-xs display-ib">{{ $item['title']  }}</span>
                    </label>
                </div>
                @endforeach

            </li>

        @endforeach

    </ol>

@else
    <p class="mrgn-all-none">No Menus Found</p>
@endif