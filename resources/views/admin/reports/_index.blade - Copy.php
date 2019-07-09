<table border="2">
    <thead>
        <tr>
            <th rowspan="2"> S.No. </th>
            <th rowspan="2"> ITEM DESCRIPTION </th>
            <th colspan="3"> RECEIPT STATUS    </th>
            <th colspan="3"> ISSUED STATUS     </th>
            <th colspan="3"> RETURNED QTY BY S/C   </th>
            <th colspan="3"> Total </th>
        </tr>
        <tr>
            <th>UP TO PREV.MONTH</th>
            <th>FOR THE MONTH OF 	</th>
            <th>CUM.  QTY</th>
            <th>UP TO PREV.MONTH</th>
            <th>FOR THE MONTH OF 	</th>
            <th>CUM.  QTY</th>
            <th>UP TO PREV.MONTH</th>
            <th>FOR THE MONTH OF 	</th>
            <th>CUM.  QTY</th>
            <th>UP TO PREV.MONTH</th>
            <th>FOR THE MONTH OF 	</th>
            <th>CUM.  QTY	CUM. </th>

        </tr>

    </thead>
    <tbody>

        @foreach( $itemMasterCollection as $index => $model )
            <tr>
                <td>{{$index+1}}</td>
                <td>{{ $model->name }}</td>
                <td>
                    @if( isset($prevMonthCount[$model->id]) )
                        {{$prevMonthCount[$model->id]}}
                    @endif
                </td>
                <td>
                    @if( isset($currentMonthCount[$model->id]) )
                        {{ floatToInt($currentMonthCount[$model->id]) }}
                    @endif
                </td>
                <td>
                    <?php
                    $total = 0;
                    if( isset($prevMonthCount[$model->id]) ) $total += $prevMonthCount[$model->id];
                    if( isset($currentMonthCount[$model->id]) ) $total += $currentMonthCount[$model->id];
                    if($total) echo floatToInt($total);
                    ?>
                </td>
                <td>
                    @if( isset($prevMonthCountRL[$model->id]) )
                        {{$prevMonthCountRL[$model->id]}}
                    @endif
                </td>
                <td>
                    @if( isset($currentMonthCountRL[$model->id]) )
                        {{ floatToInt($currentMonthCountRL[$model->id]) }}
                    @endif
                </td>
                <td>
                    <?php
                    $total = 0;
                    if( isset($prevMonthCountRL[$model->id]) ) $total += $prevMonthCountRL[$model->id];
                    if( isset($currentMonthCountRL[$model->id]) ) $total += floatToInt($currentMonthCountRL[$model->id]);
                    if($total) echo $total;
                    ?>
                </td>
                <td>
                    @if( isset($prevMonthCountRT[$model->id]) )
                        {{$prevMonthCountRT[$model->id]}}
                    @endif
                </td>
                <td>
                    @if( isset($currentMonthCountRT[$model->id]) )
                        {{ floatToInt($currentMonthCountRT[$model->id]) }}
                    @endif
                </td>
                <td>
                    <?php
                    $total = 0;
                    if( isset($prevMonthCountRT[$model->id]) ) $total += $prevMonthCountRT[$model->id];
                    if( isset($currentMonthCountRT[$model->id]) ) $total += $currentMonthCountRT[$model->id];
                    if($total) echo floatToInt($total);
                    ?>
                </td>
                <td>
                    <?php

                        $total1 = 0;

                        if( isset($prevMonthCount[$model->id]) ) $total1 += $prevMonthCount[$model->id];
                        if( isset($prevMonthCountRL[$model->id]) ) $total1 += $prevMonthCountRL[$model->id];
                        if( isset($prevMonthCountRT[$model->id]) ) $total1 += $prevMonthCountRT[$model->id];

                        if($total1) echo floatToInt($total1);

                    ?>
                </td>
                <td>
                    <?php

                    $total2 = 0;

                    if( isset($currentMonthCount[$model->id]) ) $total2 += $currentMonthCount[$model->id];
                    if( isset($currentMonthCountRL[$model->id]) ) $total2 += $currentMonthCountRL[$model->id];
                    if( isset($currentMonthCountRT[$model->id]) ) $total2 += $currentMonthCountRT[$model->id];

                    if($total2) echo floatToInt($total2);

                    ?>
                </td>
                <td>
                    @if($total1 + $total2)
                        {{ floatToInt($total1 + $total2) }}
                    @endif
                </td>

            </tr>
        @endforeach

    </tbody>
</table>

`       

       
       
