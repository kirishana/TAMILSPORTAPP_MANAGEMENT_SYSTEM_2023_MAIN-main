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
        padding-bottom: 5px;

 /* border-color: #792700; */

}
h2{
    text-align: center;
}
</style>
<div class="row" id="usr" >
    <div class="container">
      @include('reports.header')
    
        </div>

    </div>
    <h2>{{ $org->name }}'s STAFFS ({{ $org->country->name }})</h2>
<table class="table table-striped table-bordered users"  width="100%" style="width: 100%;
border-collapse: collapse;">
        <thead class="thead-Dark">
            <tr  style="text-align: center;padding: 5px;
            width: 1%;
            text-align: left;">
                <th style="width:6%" >No.</th>

                <th style="width:18%;" >First Name</th>
                <th style="width:18%;" >Last Name</th>
                <th style="width:20%;
                ">E-mail</th>
                <th style="width:12%;
                "class="phone" >Mobile</th>
                <th style="width:4%;
                "class="age">Age</th>
                <th style="width:15%;
                "class="role">Role</th>
                <th style="width:10%;
                "class="country" >Club</th>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <th style="width:10%;
                "class="country" >Sil-Member</th>
              @endif
              @endif
              @endif
             
              
            </tr>
        </thead>
        <tbody>

            @foreach($users as $key=>$user)
            <tr style="padding: 5px;
            width: 1%;
            text-align: left;">
            <td>{{ ++$key}}</td>
                <td style="padding: 5px;
                width: 1%;
                text-align: left;width:15%">{{$user->first_name}}</td>
                 <td style="padding: 5px;
                 width: 1%;
                 text-align: left;width:15%">{{$user->last_name}}</td>
                <td style="padding: 5px;
                width: 1%;
                text-align: left;text-transform:none;width:25%;">{{$user->email}}</td>
                <td style="padding: 5px;
                width: 1%;
                text-align: left;width:12%;">{{$user->tel_number}}</td>
                <td style="padding: 5px;
                width: 1%;
                text-align: left;width:4%;"><?php $age=Carbon\Carbon::parse($user->dob)->diff(Carbon\Carbon::now())->y ?>{{ $age }}</td>
                <td style="padding: 5px;
                width:10%;
                text-align: left;">{{$user->roles->pluck('name')->implode(' ')}}</td>
               
                <td style="padding: 5px;
                width: 19%;
                text-align: left;width:20%;">{{$user->club ? $user->club->club_name : ''}}</td>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <th style="padding: 5px;
                width: 19%;
                text-align: left;width:20%;" >{{$user->member_or_not==1 ? 'Yes' : 'No'}}</th>
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