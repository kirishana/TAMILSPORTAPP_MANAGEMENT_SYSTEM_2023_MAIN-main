<style>
    td {
        text-align: center;
    }
</style>
<table class="table table-striped table-bordered" id="invoices"style="text-transform: capitalize;">
    <thead class="thead-Dark">
        <tr>

            <th style="width:10%">Invoice No</th>
            <th style="width:10%">Organization</th>
            <th style="width:8%">Amount</th>
            <th style="width:8%">Transaction Number</th>
            <th style="width:10%">Status</th>
            <th style="width:8%">Transaction Date & Time</th>
            <th style="width:10%">Actions</th>

        </tr>

    </thead>
    @if ($invoices != null)

        <tbody>

            @foreach ($invoices->groupBy('trans_id') as $invoice)
                @php
                    $total = 0;
                @endphp

                @php
                    foreach ($invoice as $group) {
                        if($group->events->count()>0){
                        $total = $total + $group->totalfee;
                        }
                    }
                @endphp
                <tr>

                    @if ($group->inv_no == 0)
                        <td></td>
                    @else
                        <td>{{ 'INV' . ' ' . str_pad($group->inv_no, 6, '0', STR_PAD_LEFT) }}</td>
                    @endif
                    <td>{{ $group->league->organization->name }} </td>

                    <td>{{ Auth::user()->country->currency->currency_iso_code }} {{ $total }}</td>
                    @if ($group->status == 1 && $group->payment_method == 3)
                    <td></td>
                    @else
                    <td>{{ $group->trans_id}}</td>
                    @endif
                    @if ($group->status == 1 && $group->payment_method == 3)
                        <td><button class="btn btn-default">SIL Member</button></td>
                    @elseif($group->status == 1)
                        <td><button class="btn btn-success">Paid</button></td>
                    @elseif($group->status == 2)
                        <td><button class="btn btn-success">Approved</button></td>
                    @elseif($group->status == 3)
                        <td><button class="btn btn-danger">Rejected</button></td>
                    @elseif($group->status == 4)
                        <td><button class="btn btn-warning">Pending</button></td>
                    @endif
                    <td>{{ $group->updated_at->format('Y.m.d') }}</td>
                    <td><a target="_blank"href="/report/{{ $group->league_id }}/invoice/{{ $group->trans_id }}"><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip"
                                data-placement="top" title="View Invoice"><img style="margin:3px;"
                                    src="{{ asset('assets/images/icons/invoice.png') }}"></button></a></td>
                </tr>
            @endforeach
            @foreach ($groupInvoices as $invoice)
            @php
                $total = 0;
            @endphp

            @php
                foreach ($invoice as $group) {
                    $total = $total + $group->totalfee;
                    
                }
            @endphp
            <tr>

                @if ($group->inv_no == 0)
                    <td></td>
                @else
                    <td>{{ 'INV GR' . ' ' . str_pad($group->inv_no, 6, '0', STR_PAD_LEFT) }} {{ '(Group Registrations)' }}</td>
                @endif
                <td>{{ $group->league->organization->name }} </td>

                <td>{{ Auth::user()->country->currency->currency_iso_code }} {{ $total }}</td>
                <td>{{ $group->trans_id }}</td>
               @if($group->status == 1)
                    <td><button class="btn btn-success">Paid</button></td>
                @elseif($group->status == 2)
                    <td><button class="btn btn-success">Approved</button></td>
                @elseif($group->status == 3)
                    <td><button class="btn btn-danger">Rejected</button></td>
                @elseif($group->status == 0)
                    <td><button class="btn btn-warning">Pending</button></td>
                @endif
                <td>{{ $group->updated_at->format('Y.m.d') }}</td>                
                <td><a target="_blank"href="/report/{{ $group->league_id }}/group-invoice/{{$group->inv_no}}"><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip"
                            data-placement="top" title="View Invoice"><img style="margin:3px;"
                                src="{{ asset('assets/images/icons/invoice.png') }}"></button></a></td>
            </tr>
        @endforeach
        </tbody>
    @endif
</table>
