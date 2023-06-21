<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: center;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    h2{
        text-align: center;
        text-transform: capitalize;
    }
</style>
<div class="row" id="print">
<div>
    @include('reports.adminPrintHeader')
            
    </div>
    <h2>Payments</h2>
    
    <br>
    <table class="table table-striped table-bordered text-uppercase play " id="pay-pdf">
        <thead>
        <tr>
                <th>Organization</th>
                <th>League</th>
                <th>Participant's Name</th>
                <th>Events</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registration as $regist)
           

                <tr> 
                    
                    <td>{{$regist->organization->name}}
                    </td>
                    <td>{{$regist->league->name}} 
                    </td>
                    <td>{{$regist->user->first_name}} &nbsp;{{$regist->user->last_name}} 
                    </td>
                    <td>
                    <ul class="text-left">

                    @foreach($regist->events as $event)
                    <li>
                        {{ $event->mainEvent->name }}
                    </li>
                    @endforeach


                    </ul>
                    </td>
                  
                    @if($regist->user->club)
                    <td>Paid by club</td>
                    @else
                    @if($regist->payment_method== 1)
                    <td>Vipps</td>
                    @endif
                    @if($regist->payment_method== 2)
                    <td>Bank</td>
                    @endif
                    @endif
                  
                    @if($regist->status== 2)
                                
                                    <td><span class="badge bg-success">approved</span></td>
                                
                                @else
                                    <td><span class="badge bg-warning text-dark">pending</span></td>
                                
                                  @endif  

                    <td>{{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
                    </td>
                </tr>

           
           
            @endforeach
        </tbody>
    </table>
   
    <section class="content-footer">
        <div class="col-md-1">
            @if($general){!! html_entity_decode($general->footer) !!}@endif


        </div>
    </section>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>