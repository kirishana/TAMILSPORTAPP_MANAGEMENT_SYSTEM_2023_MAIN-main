<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       
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
@include('reports.adminHeader')

    </div>


   <h2>USERS</h2>
<table class="table table-striped  table-bordered users"   style="table-layout: fixed;
border-collapse: collapse;border: 1px solid #ddd;">
        <thead class="thead">
            <tr  style="text-align: center;
            width: 1%;
            text-align: left;">

                <th style="border: 1px solid #ddd;">Name</th>
                <th style="border: 1px solid #ddd; width:fit-content;
                ">E-mail</th>
                <th style="border: 1px solid #ddd;
                "class="phone">Mobile</th>
                <th style="border: 1px solid #ddd;
                "class="role">Age</th>
                <th style="border: 1px solid #ddd;width:10%;
                " >Role</th>
                 @if($org)
                @if($org->orgsetting)
                @if($org->orgsetting->active==1)
                <th>Sil Member</th>                
                @endif
                @endif
                @endif

            </tr>
        </thead>
        <tbody  style=" text-transform:capitalize;">

            @foreach($users as $user)
            <tr style="
          
            text-align: left;">
                <td style="text-align: left;border: 1px solid #ddd;width: 25%;padding:5px;">{{$user->first_name}} {{$user->last_name}}</td>
                <td style="
                text-align: left;border: 1px solid #ddd;text-transform: none;padding:5px; ">{{$user->email}}</td>
                <td style=" 
                text-align: left;border: 1px solid #ddd;width: 12%;padding:5px;">{{$user->tel_number}}</td>
                <td style="
                text-align: left;border: 1px solid #ddd;width: 5%;padding:5px;">
                <?php               
                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                                                                    $today = Carbon\Carbon::now()->format('Y');
                                                                    $age = $today - $mine; ?> {{ $age }}</td>
                <td style="               
                text-align: left;border: 1px solid #ddd;width:15%;padding:5px;">{{$user->roles->pluck('name')->implode(' ')}}</td>
               @if($org)
                @if($org->orgsetting)
                @if($org->orgsetting->active==1)
                <td style="width:12%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                @endif
                @endif
                @endif
               
                
            </tr>
            @endforeach

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
        {!! html_entity_decode($general?$general->footer:'') !!}


        </div>
    </section>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 360;
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