<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
    }

    table td,
    table th {
        padding-bottom: 5px;
        line-height: 2;

    }

     td {
        width: 1px;
    }
  .thead {
 
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

}
tr:nth-child(even) {
  background-color: #F4F6F7;
}
tr:nth-child(even) {
  background-color: #F4F6F6;
}
h2 {
    text-align: center;
}
</style>
<div class="row" id="usr">
@include('reports.header')
    </div>
<h2>users</h2>
<table class="table table-striped  table-bordered users"  width="100%" style="width: 100%;
border-collapse: collapse;">
        <thead class="thead">
            <tr  style="text-align: center;padding: 3px;
            width: 1%;
            text-align: left;">

                <th >Name</th>
                <th>E-mail</th>
                <th class="phone" >Mobile</th>
                <th class="age">Age</th>
                <th  class="role">Role</th>
                <th  class="country" >Country</th>
              
              <th  class="country">Org</th>
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

            @foreach($users as $user)
            <tr>
                <td style="width:15%;">{{$user->first_name}} {{$user->last_name}}</td>
                <td style="padding: 3px;
                width: 30px;text-transform:none;">{{$user->email}}</td>
                <td style="width:10%;">{{$user->tel_number}}</td>
                <td style="width: 5%;"><?php 
                                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                                                                                    $today = Carbon\Carbon::now()->format('Y');
                                                                                    $age = $today - $mine;
                                ?>{{ $age }}</td>
                <td style="width:16%;">{{$user->roles->pluck('name')->implode(' ')}}</td>
                <td style="width: 10%;">{{$user->country ? $user->country->name : ''}}</td>
                <td style="width:10%;">{{$user->organization ? $user->organization->name : ''}}</td>
                <td>{{$user->club ? $user->club->club_name : ''}}</td>
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
    <section class="content-footer">
        <div class="col-md-1">
        {!! html_entity_decode($setting?$setting->footer:'') !!}


        </div>
    </section>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 400;
            $y = 550;
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