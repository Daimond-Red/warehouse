
@if(!$model)
    <tr class="quantity-exceed">
        <td colspan="15" class="text-center ">Quantity is exceed.</td>
    </tr>
@else
    <tr>
        {!! Form::hidden('item_id[]', $model->id) !!}
        <!-- {!! Form::hidden('quantities[]', $model->quantity, ['id' => 'quantities_'.$model->id]) !!} -->
        <td><input type="checkbox" name="items[]" class="item_list" value="{{$model->id}}"></td>

        <td>{{ optional($model->itemMasterRel)->name }}</td>
        {{-- <td>
            <img src="{{ getImageUrl($model->image) }}" width="30">
        </td> --}}
        <td><span>{{ $model->quantity  }} </span>{{ optional(optional($model->itemMasterRel)->unit)->unit }} </td>
        <td>
            {!! Form::text('quantities[]', $model->quantity, ['id' => 'quantities_'.$model->id, 'class' => 'check-stock']) !!}
        </td>
        {{-- <td width="15%">
            <div class="btn-group dropdown">
                <a
                        data-id="#modelContent"
                        data-href="{{ route('admin.items.quantity', ['id' => $model->id] ) }}"
                        class="btn btn-info btn-xs dataModelPopup">Edit</a>
            </div>
            <div class="btn-group dropdown">
                <a class="removeItem btn btn-danger btn-xs" href="javascript:void(0);" >Remove</a>
            </div>
        </td> --}}
    </tr>
@endif