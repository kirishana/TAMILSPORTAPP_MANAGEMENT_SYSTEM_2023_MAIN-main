@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Invoice
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/css/pages/invoice.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Registered Events</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Events</a></li>
        <li class="active">All Events</li>
    </ol>
</section>
<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        
                </div>
                <div class="panel-body" style="border:1px solid #ccc;padding:0;margin:0;">
                 
                  
                    <div class="row" style="padding: 15px;">
                      
                        <div class="col-md-12" style="margin-top:5px;text-align:center;">

                            <strong style="font-size:25px;">{{ $org->league->name }} - {{ $org->league->from_date }}</strong>

                        </div>
                        <div class="col-md-4 col-xs-6" style="padding-right:0">

                        </div>
                    </div>
                  
                <!-- children basis -->
                <div class="row" style="padding:15px;">
                                        <div class="col-md-4 col-xs-12"></div>

                    <div class="col-md-4 col-xs-12">
                        <div class="table-responsive">
                            <form action="/event/register/not-pay" method="POST">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                <input type="hidden" name="org" value="{{ $organization_id }}">
                                <input type="hidden" name="league" value="{{ $league_id }}">
                                <input type="hidden" name="user" value="{{ $user }}">

                                @if($fieldEvents)
                                @foreach ( $fieldEvents as $fieldEvent)
                                <input type="hidden" name="fieldevents[]" value="{{ $fieldEvent }}">

                                @endforeach
                                @endif
                                @if($trackEvents)
                                @foreach ( $trackEvents as $trackEvent)
                                <input type="hidden" name="trackEvents[]" value="{{ $trackEvent }}">

                                @endforeach
                                @endif
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Registered Events</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                                  @if($fieldEvents)
                                                @foreach ( $fieldEvents as $key=>$fieldEvent)
                                                <?php
                                                $event = App\Models\Event::where('id', $fieldEvent)->first();
                                                ?>
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $event->mainEvent->name}}</td>
                                                    <td>{{ $iso }} {{ $event->mainEvent->price}}</td>
                                                   
                                                  
                                                   
                                                   
                                                    @if(Auth::User()->organization!=null)
                                                    @if(Auth::User()->organization_id==$organization->id)

                                                    <td>{{ $event->mainEvent->discount}}%</td>
                                                    @endif
                                                    @endif
                                                    @if(Auth::User()->organization!=null)
                                                    @if(Auth::User()->organization_id==$organization->id)

                                                    <?php
                                                    if ($event->mainEvent->discount > 0) {


                                                        $subtotal = $event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                                    } else {
                                                        $subtotal = $event->mainEvent->price;
                                                    }
                                                    ?>
                                                    @if(Auth::user()->member_or_not==0)
                                                    <td>{{ $subtotal }}</td>
                                                    @endif
                                                    @if(Auth::user()->member_or_not==1)
                                                    <td>0</td>
                                                    @endif
                                                    @else
                                                    @if(Auth::user()->member_or_not==0)
                                                    <td>{{ $event->mainEvent->price }}</td>
                                                    @endif
                                                    @if(Auth::user()->member_or_not==1)
                                                    <td>0</td>
                                                    @endif
                                                    @endif
                                                    @else
                                                    @if(Auth::user()->member_or_not==0)
                                                    <td>{{ $event->mainEvent->price }}</td>
                                                    @endif
                                                    @if(Auth::user()->member_or_not==1)
                                                    <td>0</td>
                                                    @endif
                                                    @endif
                                                </tr>
                                                @endforeach
                                                @endif
                                                {{-- dd($trackEvents); --}}
                                                @if($trackEvents)
                                                @foreach ( $trackEvents as $key=>$trackEvent)
                                                <?php
                                                $event = App\Models\Event::where('id', $trackEvent)->first();
                                                ?>
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $event->mainEvent->name}}</td>
                                                    <td>{{ $iso }} {{ $event->mainEvent->price}}</td>
                                                    @if(Auth::User()->organization!=null)
                                                    @if(Auth::User()->organization_id==$organization->id)

                                                    <td>{{ $event->mainEvent->discount}}%</td>
                                                    @endif
                                                    @endif
                                                    @if(Auth::User()->organization!=null)
                                                    @if(Auth::User()->organization_id==$organization->id)

                                                    <?php
                                                    if ($event->mainEvent->discount > 0) {


                                                        $subtotal = $event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                                    } else {
                                                        $subtotal = $event->mainEvent->price;
                                                    }
                                                    ?>
                                                     @if(Auth::user()->member_or_not==0)
                                                     <td>{{ $subtotal }}</td>
                                                    @endif
                                                    @if(Auth::user()->member_or_not==1)
                                                    <td>0</td>
                                                    @endif
                                                    @else
                                                    @if(Auth::user()->member_or_not==0)
                                                    <td>{{ $event->mainEvent->price }}</td>
                                                    @endif
                                                    @if(Auth::user()->member_or_not==1)
                                                    <td>0</td>
                                                    @endif
                                                    @endif
                                                    @else
                                                    @if(Auth::user()->member_or_not==0)
                                                    <td>{{ $event->mainEvent->price }}</td>
                                                    @endif
                                                    @if(Auth::user()->member_or_not==1)
                                                    <td>0</td>
                                                    @endif
                                                    @endif
                                                </tr>

                                                @endforeach
                                                @endif
                                                @if(Auth::User()->organization!=null)
                                                @if(Auth::User()->organization_id==$organization->id)

                                                <tr>


                                                    <td><strong>Total : </strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td id="total">
                                                    </td>

                                                </tr>
                                                @else

                                                <tr>


                                                    <td><strong>Total : </strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td id="total">
                                                    </td>


                                                </tr>
                                                @endif
                                                @else
                                                <td><strong>Total : </strong></td>
                                                <td></td>
                                                <td></td>
                                                <td id="total">
                                                </td>
                                                @endif
                                            </tbody>

                                        </table>


                                        <?php
                                        if (Auth::User()->organization_id!=null) {
                                            if(Auth::User()->organization_id==$organization->id){

                                        ?>
                                            <script>
                                                var table = document.getElementById("table"),
                                                    sumVal = 0;
                                                for (var i = 1; i < table.tBodies[0].rows.length; i++) {
                                                    sumVal = sumVal + parseInt(table.rows[i].cells[4].innerHTML);
                                                }
                                                var iso = <?php echo json_encode($iso); ?>

                                                document.getElementById("total").innerHTML = iso.concat(" ", sumVal);
                                            </script>
                                            <input type="hidden" name="total" id="total1" value="">
                                            <script>
                                                var a = $('#total1').val($('#total').text());
                                                
                                            </script>

                                        <?php

                                        }
                                    
                                        else if(Auth::User()->organization_id!=$organization->id){

?>
<script>
                                                var table = document.getElementById("table"),
                                                    sumVal = 0;
                                                for (var i = 1; i < table.tBodies[0].rows.length; i++) {
                                                    sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
                                                }
                                                var iso = <?php echo json_encode($iso); ?>

                                                document.getElementById("total").innerHTML = iso.concat(" ", sumVal);
                                            </script>
                                            <input type="hidden" name="total" id="total1" value="">
                                            <script>
                                                var a = $('#total1').val($('#total').text());
                                               
                                            </script>
                                            <?php
                                        }
                                    }
                                      else {
                                        ?>
                                            <script>
                                                var table = document.getElementById("table"),
                                                    sumVal = 0;
                                                for (var i = 1; i < table.tBodies[0].rows.length; i++) {
                                                    sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
                                                }
                                                var iso = <?php echo json_encode($iso); ?>

                                                document.getElementById("total").innerHTML = iso.concat(" ", sumVal);
                                            </script>
                                            <input type="hidden" name="total" id="total1" value="">
                                            <script>
                                                var a = $('#total1').val($('#total').text());
                                               
                                            </script>

                                        <?php }
                                        ?>
</tbody>
                                    <tbody>
                                        @if($fieldEvents)
                                        @foreach ( $fieldEvents as $key=>$fieldEvent)
                                        <?php
                                        $event = App\Models\Event::where('id', $fieldEvent)->first();
                                        ?>
                                        <tr>
                                            <td>{{ $event->mainEvent->name}}</td>
                                            <br>
                                        
                                        </tr>
                                        @endforeach
                                        @endif
                                        @if($trackEvents)
                                        @foreach ( $trackEvents as $key=>$trackEvent)
                                        <?php
                                        $event = App\Models\Event::where('id', $trackEvent)->first();
                                        ?>
                                        <tr>
                                            
                                            <td>{{ $event->mainEvent->name}}</td>
                                            <br>
                                     </tr>
                                     @endforeach
                                     @endif
</table>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-labeled btn-primary">
                                        Register
                                        <span class="btn-label cool_btn_right">
                                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="{{ asset('assets/js/pages/invoice.js') }}" type="text/javascript"></script>


@stop