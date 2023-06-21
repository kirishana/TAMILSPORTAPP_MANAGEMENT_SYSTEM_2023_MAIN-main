<table class="table table-striped table-bordered" id="filter1">
                                            <thead class="thead-Dark">
                                                <th>Club Name</th>
                                                <th>total &nbsp; amount</th>
                                                <th>Paid &nbsp; amount</th>
                                                <th>Payable &nbsp; amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </thead>
                                            <?php 
                                            ?>
                                        @foreach($registrations as $registration)
                                            <tr>
                                                <td>{{$registration->club_name}}</td>
                                                <?php 
                                                $total=App\Models\Registration::where('league_id',$league->id)->where('status','!=',3)->where('is_approved',1)->wherehas('user',function($q) use($registration){
                                                    $q->where('club_id',$registration->id);
                                                })->sum('totalfee');
                                                $total2=App\Models\GroupRegistration::where('league_id',$league->id)->where('status','!=',3)->where('club_id',$registration->id)->sum('totalfee');
                                                $sum=App\Models\Registration::where('league_id',$league->id)->whereIn('status',[1,2])->where('is_approved',1)->wherehas('user',function($q) use($registration){
                                                    $q->where('club_id',$registration->id);
                                                })->sum('totalfee');
                                                $sum2=App\Models\GroupRegistration::where('league_id',$league->id)->whereIn('status',[1,2])->where('club_id',$registration->id)->sum('totalfee');
                                                $unpaid=App\Models\Registration::where('league_id',$league->id)->whereNotIn('status',[1,2,3])->where('is_approved',1)->wherehas('user',function($q) use($registration){
                                                    $q->where('club_id',$registration->id);
                                                })->sum('totalfee');
                                                $unpaid2=App\Models\GroupRegistration::where('league_id',$league->id)->whereNotIn('status',[1,2,3])->where('club_id',$registration->id)->sum('totalfee');
                                                $totalPaidAmount=$sum+$sum2;
                                                $totaluserAmount=$total+$total2;
                                                ?>
                                                <td>{{$league->organization->country->currency->currency_iso_code}} .&nbsp;{{$total+$total2}}</td>
                                                <td>{{$league->organization->country->currency->currency_iso_code}} .&nbsp;{{$sum+$sum2}}</td>
                                                <td>{{$league->organization->country->currency->currency_iso_code}} .&nbsp;{{$unpaid+$unpaid2}}</td>
                                                <td>
                                                    @if($totaluserAmount==$totalPaidAmount && $totaluserAmount!=0 && $totalPaidAmount!=0)
                                                    <span class="label success">Paid</span>
                                                    @endif
                                                    @if($totaluserAmount>$totalPaidAmount && $totalPaidAmount!=0)
                                                    <span class="label primary">partially</span>
                                                    @endif
                                                    @if($totaluserAmount>$totalPaidAmount && $totalPaidAmount==0)
                                                    <span class="label warning">Due</span>
                                                    @endif
                                                </td>
                                                <td>
                                                <button style="padding: 2px 4px" value="{{Crypt::encrypt($registration->id)}}" data-id="{{$league->id}}" id="visible" class=" btn btn-info visible" ata-toggle="tooltip" data-placement="top" title="View Events"><i class="material-icons" style="margin-bottom:5px">visibility</i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
                integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                                            
                $(".visible").on('click', function () {
                    var value=$(this).val();
                    var league=$(this).attr('data-id');
                    $.ajax({
                        type: 'POST',
                        url: '/clubpayView',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'value': value,
                            'league': league,

                        },

                        success: function (response) {
                            window.open(response.url,'_blank');                        
                        }
                    });
                });

            </script>
