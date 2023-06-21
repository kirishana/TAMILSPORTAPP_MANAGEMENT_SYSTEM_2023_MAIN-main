<style  type="text/css">
    
    table {
        border:solid #B2BABB;
        opacity:50;
        border-width: thin;
    }
    table td,
    table th {
        border:solid #B2BABB;
        opacity:50;
        border-width: thin;
        text-transform: capitalize;
        padding-bottom: 5px;
    }
    tr:nth-child(even) {
  background-color: #F4F6F7;
}
    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
}
    .table .thead-Dark th {
 
        color: white;
        background-color: #3A3B3C;
        text-transform: uppercase;
        line-height:2;
        text-align: center;

 /* border-color: #792700; */

}
h2{
    text-align: center;
}
</style>
<div class="row" id="" >
    <div class="container">
        @include('reports.header')
    
    
        </div>
    <h2>{{ $org->name }}'s MEMBERS ({{ $org->country->name }})</h2>
<table class="table table-striped table-bordered"  width="100%" style="width: 100%;
border-collapse: collapse;">
        <thead class="thead-Dark">
            <tr  style="text-align: center;padding: 3px;
            width: 1%;
            text-align: left;">
                <th style="width:6%;" >No.</th>

                <th style="width:18%;" >First Name</th>
                <th style="width:18%;" >Last Name</th>

                <th style="width:20%;
                ">E-mail</th>
                <th style="width:10%;
                "class="phone" >Phone</th>
                <th style="width:4%;
                "class="age">Age</th>  
                                <th style="width:18%;" >Club</th>
                                @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1)
                                <th>SIL Member</th>
                                @endif
                                @endif
                                @endif
    
            </tr>
        </thead>
        <tbody class="text-uppercase">
            @foreach($usermems as $key=>$user)
            <tr style="padding: 3px;
            width: 1%;
            text-align: left;">
                <td style="padding: 3px;
                text-align: left;width:6%">{{++$key}}</td>
                <td style="padding: 3px;
                text-align: left;width:15%">{{$user->first_name}}</td>
                    <td style="padding: 3px;
                    width: 1%;
                    text-align: left;width:15%">{{$user->last_name}}</td>
                    <td style="padding: 3px;
                    text-align: left;text-transform:lowercase;width:30%;">{{$user->email}}</td>
                    <td style="padding: 3px;
                    text-align: left;width:8%;">{{$user->tel_number}}</td>
                    <td style="padding: 3px;
                    text-align: left;width:4%;"><?php  $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');$today = Carbon\Carbon::now()->format('Y');$age = $today - $mine; ?>{{ $age }}</td>
                    <td style="padding: 3px;
                    text-align: left;text-transform:lowercase;width:30%;">{{$user->club->club_name}}</td>
                     @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1)
                    <td>{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                    @endif
                    @endif
                    @endif
            </tr>
            @endforeach

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($setting?$setting->footer:'') !!}


        </div>
    </section>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 370;
            $y = 570;
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $font = null;
            $size = 14;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>