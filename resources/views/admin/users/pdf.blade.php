<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       text-transform: capitalize;
       /* background-color: red; */
    }
    table td,
    table th {
        padding-bottom: 5px;
        line-height: 2;
        border: 1px solid #ddd;

    }

     td {
        width: 1px;
    }
  .thead {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F6;
}
h2 {
    text-align: center;
}
</style>
<div class="row" id="usr">
   
    <div class="container">
       @include('reports.header')
        </div>
<h2>{{$setting->organization->name}}'s Users ({{$setting->organization->country->name}})</h2>
<table class="table table-striped  table-bordered users" style="width: 100%;
border-collapse: collapse;">
        <thead class="thead">
            <tr  style="text-align: center;padding: 3px;text-align: left;">
<th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th  class="role">Role</th>
                <th class="age">Age</th>
                <th class="age">Gender</th>
                <th class="phone" >Mobile</th>
                <th class="city">Club</th>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <th style="border: 1px solid black;">Sil Member</th>
                @endif
                @endif
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key=>$user)
            <tr>
            <td style="text-align: left;border: 1px solid #ddd;width:6%;padding:5px;">{{++$key}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width:15%;padding:5px;">{{$user->first_name}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width:15%;padding:5px;">{{$user->last_name}}</td>

                <td style="text-align: left;border: 1px solid #ddd;width:20%;padding:5px;">{{$user->email}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width:8%;padding:5px;">{{$user->roles->pluck('name')->implode(' ')}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width:4%;padding:5px;"><?php 
                                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                                                                                    $today = Carbon\Carbon::now()->format('Y');
                                                                                    $age = $today - $mine;
                                ?>{{ $age }}</td>
                <td style="text-align: left;border: 1px solid #ddd;width:7%;padding:5px;">{{$user->gender}}</td>

                <td style="text-align: left;border: 1px solid #ddd;width:10%;padding:5px;">{{$user->tel_number}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width:15%;padding:5px;">{{$user->club ? $user->club->club_name : ''}}</td>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <td style="width:10%;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                @endif
                @endif
                @endif
                
            </tr>
            @endforeach

        </tbody>
    </table>
    <section class="content-footer" >
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            {!! html_entity_decode($setting?$setting->footer:'') !!}


        </div>
        <div class="col-md-2">
        </div>
    </section>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 400;
            $y = 560;
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