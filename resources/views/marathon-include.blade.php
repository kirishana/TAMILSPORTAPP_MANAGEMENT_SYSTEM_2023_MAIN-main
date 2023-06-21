<table class="table table-striped table-bordered marathon"  id="users">
    <thead class="thead-Dark">
        <tr class="filters" style="text-align: center">

            <th>Clubs</th>
            <th>Points</th>
            
        </tr>
    </thead>
    @if($clubs!=null)
    <tbody>

        @foreach($clubs as $cl)
        <?php
        $club=App\Models\Club::find($cl);
        $value=$club->marathonPoints->where('league_id',$league->id)->first();
        
        ?>
        <tr>
            <td style="width:15%;text-transform:capitalize;">
                
                {{$club->club_name}}
                
            </td>
                      <td style="width:18%;text-transform:none;">
                <input  style="width: 10%;
  padding: 12px 20px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" type="text" data-id="{{$club->id}}" data-league="{{$league->id}}"  value="{{$value?$value->points:''}}" data-marathon="{{$value?$value->id:''}}">&nbsp;
                <button class="btn btn-primary club" data-id="{{$club->id}}" data-league="{{$league->id}}" data-marathon="{{$value?$value->id:''}}">Add</button> &nbsp;
                <span style="background-color:#01BC8C;display:none;" class="badge badge-success" id="added<?php echo $club['id']; ?>">Added</span>

            </td>    
        </tr>
        @endforeach

    </tbody>
    @endif
</table>