@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Champions
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
    <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>{{ __('league.champ_lists') }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="/leagues"> Leagues</a></li>
            <li class="active">Champion Lists</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary " style="min-height:px;">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                        {{ __('sidebar.champions') }}
                        <div style="float:right">
                            <a href="" style="color:white">
                                <i class="material-icons">keyboard_arrow_left</i>

                                <a href="/leagues" style="color:white">
                                    {{ __('staffs.back') }}</a>
                        </div>
                    </h4>

                </div>
                <br />
                <ul style="background:none" class="nav nav-tabs ">
                    <li class="active">
                        <a class="panel-title" href="#tab1" data-toggle="tab">
                            {{ __('league.single_events') }}</a>
                    </li>
                    <li>
                        <a class="panel-title" href="#tab2" data-toggle="tab">
                            {{ __('league.club_points') }}</a>
                    </li>


                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab1">
                        <div class="panel-body table-responsive">
                            <div class="row">

                                <div class="col-md-1">


                                </div>
                                <div class="col-md-5"></div>

                                <div class="col-md-4"></div>

                                <div class="col-md-2" style="float:left">

                                </div>
                            </div>
                            <table class="table table-striped table-bordered showall"  id="showall">
                                <thead class="thead-Dark">
                                    <tr>
                                        <th style="text-align: center;">{{ __('sidebar.age_group') }}</th>
                                        <th style="text-align: center;">{{ __('dashboard.gender') }} </th>
                                        @if ($league->champions == 1)
                                            <th style="text-align: center;">{{ __('league.points') }}</th>
                                        @endif
                                        <th style="text-align: center;">{{ __('sidebar.champions') }}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($AgeGroups as $ageGroup)


                                        <?php
                                        
                                        $age = App\Models\AgeGroupEvent::where('age_group_id', $ageGroup->id)->get();
                                        $count = 0;
                                        foreach ($age as $ag) {
                                            if ($ag->Event->league_id == $league->id) {
                                                if ($ag->Event->mainEvent->event_category_id != 3) {
                                                    $count = $count + 1;
                                                }
                                            }
                                        }
                                        $league3 = [];
                                        $league1 = App\Models\League::wherehas('events', function ($q) use ($ageGroup) {
                                            $q->wherehas('ageGroups', function ($q) use ($ageGroup) {
                                                $q->where('age_group_id', $ageGroup->id);
                                            });
                                        })->get();
                                        foreach ($league1 as $key => $league2) {
                                            $league3[] = $league2->id;
                                        }
                                        
                                        //    dd($league3);
                                        
                                        ?>


                               @if($count>0)
                           {{-- {{ dd($league1->id==$league->id) }} --}}
                               @if(in_array($league->id,$league3))
                              
                               @if($league->champions==1)
                               <?php
                                       
                                       $players= DB::table('age_group_gender_user')->where('league_id',$league->id)->where('marks','!=',null)
                                         ->join('age_group_genders','age_group_gender_user.age_group_gender_id','=','age_group_genders.id')  
                                                 ->select('age_group_genders.*', 'age_group_gender_user.*')                                     
                                          ->having(DB::raw('count(age_group_gender_user.user_id)'),'=',DB::raw('total_events'))                                  
                                         ->groupBy('age_group_gender_user.user_id')->get();
$champs=array();
                                         foreach($players as $player){
                                            $user=App\User::find($player->user_id);
                                            $reg=$user->registrations()->where('league_id',$player->league_id)->first();
                                           $events=$reg->events;
                                           $field=0;
                                            $track=0;
                                           foreach($events as $event){
                                            
                                            if($event->mainEvent->event_category_id==1){
                                                $track++;
                                            }
                                            elseif($event->mainEvent->event_category_id==2){
                                                $field++;
                                            }
                                           }
                                           if($field>0 && $track>0){
$champs[]=$player;
                                           }
                                         }
                                         ?>
                               <tr>
                                   <td>{{$ageGroup->name}}</td>
                                   <td>male</td>
                                <td>
                                
                                         <?php
                                         $marks = array();
                                         $userlists = array();
                                         $users1 = array();
                                         ?>
                                         <?php 
                                         if(count($champs) != 0){
                                             ?>
                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 1)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $marks[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->get()
                                                                                        ->SUM('marks');
                                                                                    
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach



                                                            <?php
                                                            if (count($marks) > 0) {
                                                                echo max($marks);
                                                            }
                                                            ?>
                                                            <?php 
                                       }
                                       ?>
                                                        </td>


                                                        <td>

                                                            <?php
                                                            $marks = [];
                                                            $userlists = [];
                                                            $users1 = [];
                                                            ?>
                                                            <?php 
                                         if(count($champs) != 0){
                                             ?>
                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 1)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $marks[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->get()
                                                                                        ->SUM('marks');
                                                                                    
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach



                                                            <?php
                                                            if (count($marks) > 0) {
                                                                max($marks);
                                                            }
                                                            ?>


                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 1)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $userlists[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->select(DB::raw('user_id'), DB::raw('sum(marks) as total'))
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->groupBy(DB::raw('user_id'))
                                                                                        ->having('total', '=', max($marks))
                                                                                        ->get();
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                            <?php
                                                            $userUniqueists = array_unique($userlists);
                                                            foreach ($userUniqueists as $users) {
                                                                foreach ($users as $user) {
                                                                    $winner = App\User::find($user->user_id);
                                                                    echo $winner->first_name . '   ' . '[' . $winner->userId . ']';
                                                                    echo '<br>';
                                                                    echo $winner->club
                                                                        ? '<div style="color:black;font-weight:bold;">CLUB: 
                                                                                                             <span style="color:black;font-weight:bold;">' .
                                                                            $winner->club->club_name .
                                                                            '</span></div>'
                                                                        : '';
                                                            
                                                                    echo '<br>';
                                                                }
                                                            }
                                                            
                                                            ?>
                                                            <?php
                                         
                                         }
                                         ?>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                    $users = [];
                                                    ?>
                                                    <tr>
                                                        <td>{{ $ageGroup->name }}</td>
                                                        <td>female</td>
                                                        <td>

                                                            <?php
                                                            $marks = [];
                                                            $userlists = [];
                                                            $users1 = [];
                                                            ?>
                                                            <?php 
                                if(count($champs) != 0){
                                    ?>
                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 2)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $marks[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->get()
                                                                                        ->SUM('marks');
                                                                                    
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach



                                                            <?php
                                                            if (count($marks) > 0) {
                                                                echo max($marks);
                                                            }
                                                            ?>
                                                            <?php 
                              }
                              ?>
                                                        </td>


                                                        <td>

                                                            <?php
                                                            $marks = [];
                                                            $userlists = [];
                                                            $users1 = [];
                                                            ?>
                                                            <?php 
                                if(count($champs) != 0){
                                    ?>
                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 2)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $marks[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->get()
                                                                                        ->SUM('marks');
                                                                                    
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach



                                                            <?php
                                                            if (count($marks) > 0) {
                                                                max($marks);
                                                            }
                                                            ?>


                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 2)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $userlists[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->select(DB::raw('user_id'), DB::raw('sum(marks) as total'))
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->groupBy(DB::raw('user_id'))
                                                                                        ->having('total', '=', max($marks))
                                                                                        ->get();
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                            <?php
                                                            $userUniqueists = array_unique($userlists);
                                                            foreach ($userUniqueists as $users) {
                                                                foreach ($users as $user) {
                                                                    $winner = App\User::find($user->user_id);
                                                                    echo $winner->first_name . '   ' . '[' . $winner->userId . ']';
                                                                    echo '<br>';
                                                                    echo $winner->club
                                                                        ? '<div style="color:black;font-weight:bold;">CLUB: 
                                                                                                    <span style="color:black;font-weight:bold;">' .
                                                                            $winner->club->club_name .
                                                                            '</span></div>'
                                                                        : '';
                                                            
                                                                    echo '<br>';
                                                                }
                                                            }
                                                            
                                                            ?>
                                                            <?php
                                
                                }
                                ?>
                                                        </td>

                                                    </tr>
                                                @endif
                                                @if ($league->champions == 0)
                                                    <?php
                                                    
                                                    $players = DB::table('age_group_gender_user')
                                                        ->where('league_id', $league->id)
                                                        ->where('marks', '!=', null)
                                                        ->join('age_group_genders', 'age_group_gender_user.age_group_gender_id', '=', 'age_group_genders.id')
                                                        ->select('age_group_genders.*', 'age_group_gender_user.*')
                                                        ->having(DB::raw('count(age_group_gender_user.user_id)'), '=', DB::raw('total_events'))
                                                        ->groupBy('age_group_gender_user.user_id')
                                                        ->get();
                                                    $champs = [];
                                                    foreach ($players as $player) {
                                                        $user = App\User::find($player->user_id);
                                                        $reg = $user
                                                            ->registrations()
                                                            ->where('league_id', $player->league_id)
                                                            ->first();
                                                        $events = $reg->events;
                                                        $field = 0;
                                                        $track = 0;
                                                        foreach ($events as $event) {
                                                            if ($event->mainEvent->event_category_id == 1) {
                                                                $track++;
                                                            } elseif ($event->mainEvent->event_category_id == 2) {
                                                                $field++;
                                                            }
                                                        }
                                                        if ($field > 0 && $track > 0) {
                                                            $champs[] = $player;
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>{{ $ageGroup->name }}</td>
                                                        <td>male</td>
                                                        <td>

                                                            <?php
                                                            $marks = [];
                                                            $userlists = [];
                                                            $users1 = [];
                                                            ?>
                                                            <?php 
                                         if(count($champs) != 0){
                                             ?>
                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 1)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $marks[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->get()
                                                                                        ->SUM('marks');
                                                                                    
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach



                                                            <?php
                                                            if (count($marks) > 0) {
                                                                max($marks);
                                                            }
                                                            ?>


                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 1)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $userlists[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->select(DB::raw('user_id'), DB::raw('sum(marks) as total'))
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->groupBy(DB::raw('user_id'))
                                                                                        ->having('total', '=', max($marks))
                                                                                        ->get();
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                            <?php
                                                            $userUniqueists = array_unique($userlists);
                                                            foreach ($userUniqueists as $users) {
                                                                foreach ($users as $user) {
                                                                    $winner = App\User::find($user->user_id);
                                                                    echo $winner->first_name . $winner->last_name . '   ' . '[' . $winner->userId . ']';
                                                                    echo '<br>';
                                                                    echo $winner->club
                                                                        ? '<div style="color:black;font-weight:bold;">CLUB: 
                                                                                                             <span style="color:black;font-weight:bold;">' .
                                                                            $winner->club->club_name .
                                                                            '</span></div>'
                                                                        : '';
                                                            
                                                                    echo '<br>';
                                                                }
                                                            }
                                                            
                                                            ?>
                                                            <?php
                                         
                                         }
                                         ?>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                    $users = [];
                                                    ?>
                                                    <tr>
                                                        <td>{{ $ageGroup->name }}</td>
                                                        <td>female</td>
                                                        <td>

                                                            <?php
                                                            $marks = [];
                                                            $userlists = [];
                                                            $users1 = [];
                                                            ?>
                                                            <?php 
                                if(count($champs) != 0){
                                    ?>
                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 2)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $marks[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->get()
                                                                                        ->SUM('marks');
                                                                                    
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach



                                                            <?php
                                                            if (count($marks) > 0) {
                                                                max($marks);
                                                            }
                                                            ?>


                                                            @foreach ($ageGroup->events as $event)
                                                                @if ($event->league_id == $league->id)
                                                                    @foreach ($event->pivot->ageGroupGenders as $ageGroupGender)
                                                                        @if ($ageGroupGender->gender_id == 2)
                                                                            @foreach ($champs as $champ)
                                                                                @if ($ageGroupGender->id == $champ->age_group_gender_id)
                                                                                    <?php
                                                                                    $userlists[] = DB::table('age_group_gender_user')
                                                                                        ->where('league_id', $league->id)
                                                                                        ->select(DB::raw('user_id'), DB::raw('sum(marks) as total'))
                                                                                        ->where('user_id', $champ->user_id)
                                                                                        ->groupBy(DB::raw('user_id'))
                                                                                        ->having('total', '=', max($marks))
                                                                                        ->get();
                                                                                    ?>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                            <?php
                                                            $userUniqueists = array_unique($userlists);
                                                            foreach ($userUniqueists as $users) {
                                                                foreach ($users as $user) {
                                                                    $winner = App\User::find($user->user_id);
                                                                    echo $winner->first_name . '   ' . '[' . $winner->userId . ']';
                                                                    echo '<br>';
                                                                    echo $winner->club
                                                                        ? '<div style="color:black;font-weight:bold;">CLUB: 
                                                                                                    <span style="color:black;font-weight:bold;">' .
                                                                            $winner->club->club_name .
                                                                            '</span></div>'
                                                                        : '';
                                                            
                                                                    echo '<br>';
                                                                }
                                                            }
                                                            
                                                            ?>
                                                            <?php
                                
                                }
                                ?>
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- second tab -->
                    <div class="tab-pane" id="tab2">
                        <div class="panel-body table-responsive">
                            <div class="row">

                                <div class="col-md-1">


                                </div>
                                <div class="col-md-5"></div>

                                <div class="col-md-4"></div>

                                <div class="col-md-2" style="float:left">

                                </div>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead class="thead-Dark">
                                    <tr>
                                        <th>{{ __('sidebar.clubs') }}</th>
                                        <th colspan="5">{{ __('league.points') }}</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>{{ __('league.ind_event_points') }}</th>
                                        <th>{{ __('league.group_event_points') }}</th>
                                        <th>{{ __('league.marathon_points') }}</th>
                                        <th>{{ __('league.club_part_points') }}</th>
                                        <th>{{ __('league.total') }}</th>
                                    </tr>
                                </thead>
                                @if ($league != null)
                                    <tbody id="clubs" style="text-transform:capitalize;">
                                        <?php
                                        $genders = [];
                                        ?>
                                        @foreach ($events as $event)
                                            @if ($event->mainEvent->event_category_id == 3)
                                                @php
                                                    $ageGroupEvents = App\Models\AgeGroupEvent::where('event_id', $event->id)->get();
                                                    foreach ($ageGroupEvents as $ageEvent) {
                                                        $ageGroupgenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageEvent->id)->get();
                                                        foreach ($ageGroupgenders as $gender) {
                                                            $genders[] = $gender;
                                                        }
                                                    }
                                                @endphp
                                            @endif
                                        @endforeach

                                        <?php
                                        
                                        $teams = DB::table('age_group_gender_team')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '!=', null)
                                            ->get();

                                        $clubs = [];
                                        $compareClubs = [];
                                        
                                        ?>
                                        @if ($teams->count() > 0)
                                            @foreach ($teams as $team)
                                                <?php
                                                $cls = App\Models\Team::find($team->team_id);
                                                $clubs[] = $cls;
                                                $compareClubs[] = $cls->club_id;
                                                $total = [];
                                                ?>
                                            @endforeach
                                        @else
                                            <?php
                                            $clubs[] = null;
                                            $compareClubs[] = null;
                                            ?>
                                        @endif
                                        <?php
                                        $result = collect($clubs)->groupBy('club_id');
                                        ?>
                                        
                                        <?php
                                        
                                        $participatedTeams = DB::table('age_group_gender_team')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '=', null)
                                            ->get();
                                            
                                        $participatedClubs = [];
                                        $compareParticipatedClubs = [];
                                        
                                        ?>
                                        @if ($participatedTeams->count() > 0)
                                            @foreach ($participatedTeams as $team)
                                                <?php
                                                $cls1 = App\Models\Team::find($team->team_id);
                                                $participatedClubs[] = $cls1;
                                                $compareParticipatedClubs[] = $cls1->club_id;
                                                $total = [];
                                                ?>
                                            @endforeach
                                        @else
                                            <?php
                                            $participatedClubs[] = null;
                                            $compareParticipatedClubs[] = null;
                                            ?>
                                        @endif
                                        <?php
                                        $participatedResult = collect($participatedClubs)->groupBy('club_id');
                                        ?>




                                        <?php
                                        $users = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '!=', null)
                                            ->get();
                                            $participatedUsers = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '=', null)
                                            ->get();
                                        $allUsers = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->get()
                                            ->unique('user_id');
                                        // dd($allUsers->count());
                                        $userClubs = [];
                                        $userCompareClubs = [];
                                        $userParticipatedClubs = [];
                                        $userParticipatedCompareClubs = [];
                                        ?>

                                        @foreach ($participatedUsers as $user)
                                            <?php
                                            $cls1 = App\User::find($user->user_id);
                                            $userParticipatedClubs[] = $cls1;
                                            $userParticipatedCompareClubs[] = $cls1->club_id;
                                            ?>
                                        @endforeach

                                        @foreach ($users as $user)
                                            <?php
                                            $cls1 = App\User::find($user->user_id);
                                            $userClubs[] = $cls1;
                                            $userCompareClubs[] = $cls1->club_id;
                                            $total = [];
                                            ?>
                                        @endforeach




                                        <?php
                                        $result1 = collect($userClubs)->groupBy('club_id');

                                        $intersects = array_intersect($compareClubs, $userCompareClubs);
                                        $merge=array_merge($compareClubs, $userCompareClubs);
                                        $intersects2 = array_intersect($compareParticipatedClubs, $userParticipatedCompareClubs);                                        
                                        $differ=array_diff($intersects2,$merge);
                                        $participatedUnique=array_unique($differ);
                                        $unique = array_unique($intersects);
                                        $marathonPoints = App\Models\MarathonPoint::where('league_id', $league->id)->get();
                                        
                                        ?>
                                        @php
                                            
                                            $check = [];
                                        @endphp
                                        @foreach ($unique as $club)
                                            @php
                                                $total = 0;
                                                $total1 = 0;
                                                $total4 = 0;
                                                $total7 = 0;
                                                $cl = App\Models\Club::find($club);
                                            @endphp
                                            <tr>
                                                <td>

                                                    {{ $cl->club_name }}

                                                </td>
                                                <?php
                                                ?>


                                                @foreach ($teams as $user)
                                                    @php
                                                        $userDet = App\Models\Team::find($user->team_id);
                                                    @endphp
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total += $user->marks;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @php
                                                    
                                                @endphp
                                                @foreach ($users as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total1 += $user->marks;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($marathonPoints as $marathonPoint)
                                                    @if ($marathonPoint->club_id == $cl->id)
                                                        @php
                                                            $total4 += $marathonPoint->points;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($allUsers as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total7 += 1;
                                                            // $check[]=$userDet->userId
                                                        @endphp
                                                    @endif
                                                @endforeach





                                                <td> @php echo $total1 @endphp </td>
                                                <td> @php echo $total @endphp </td>
                                                <td> @php echo $total4 @endphp </td>
                                                <td> @php echo $total7 @endphp </td>
                                                <td> @php echo $total+$total1+$total4+$total7 @endphp </td>

                                            </tr>
                                        @endforeach
                                        <?php
                                        
                                        $all = array_merge($compareClubs, $userCompareClubs);
                                        $uniqueAll = array_unique($all);
                                        $diff = array_diff($uniqueAll, $unique);
                                        $marathonPoints = App\Models\MarathonPoint::where('league_id', $league->id)->get();
                                        
                                        ?>
                                        @php
                                            
                                        @endphp
                                        @foreach ($diff as $club)
                                            @if ($club != null)
                                                @php
                                                    $total3 = 0;
                                                    $total2 = 0;
                                                    $total5 = 0;
                                                    $total6 = 0;
                                                    $cl = App\Models\Club::find($club);
                                                @endphp
                                                <tr>
                                                    <td>

                                                        {{ $cl->club_name }}

                                                    </td>
                                                    @if ($teams != null)
                                                        @foreach ($teams as $user)
                                                            @php
                                                                $userDet = App\Models\Team::find($user->team_id);
                                                            @endphp
                                                            @if ($userDet->club_id == $cl->id)
                                                                @php
                                                                    $total3 += $user->marks;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @foreach ($users as $user)
                                                        @php
                                                            $userDet = App\User::find($user->user_id);
                                                        @endphp
                                                        @if ($userDet->club_id == $cl->id)
                                                            @php
                                                                $total2 += $user->marks;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @foreach ($allUsers as $user)
                                                        @php
                                                            $userDet = App\User::find($user->user_id);
                                                        @endphp
                                                        @if ($userDet->club_id == $cl->id)
                                                            @php
                                                                $total6 += 1;
                                                            @endphp
                                                        @endif
                                                    @endforeach


                                                    @foreach ($marathonPoints as $marathonPoint)
                                                        @if ($marathonPoint->club_id == $cl->id)
                                                            @php
                                                                $total5 += $marathonPoint->points;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <td> @php echo $total2 @endphp</td>
                                                    <td> @php echo $total3 @endphp </td>
                                                    <td> @php echo $total5 @endphp </td>
                                                    <td> @php echo $total6 @endphp </td>
                                                    <td>
                                                        @if ($total3 == 0)
                                                            @php echo $total2+$total5+$total6 @endphp
                                                        @else
                                                            @php echo $total3+$total5+$total6 @endphp
                                                        @endif
                                                    </td>

                                                    {{-- @php echo $total3+$total5 @endphp --}}
                                                    {{-- @php echo $total2 @endphp @endif --}}




                                                </tr>
                                            @endif
                                        @endforeach
<!--participated club -->
 @foreach ($participatedUnique as $club)
                                            @php
                                                $total8 = 0;
                                                $total9 = 0;
                                                
                                                $cl = App\Models\Club::find($club);
                                            @endphp
                                            <tr>
                                                <td>

                                                    {{ $cl->club_name }}

                                                </td>
                                                <?php
                                                ?>


                                               
                                                
                                                @foreach ($marathonPoints as $marathonPoint)
                                                    @if ($marathonPoint->club_id == $cl->id)
                                                        @php
                                                            $total8 += $marathonPoint->points;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($allUsers as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total9 += 1;
                                                            // $check[]=$userDet->userId
                                                        @endphp
                                                    @endif
                                                @endforeach





                                                <td> @php echo 0 @endphp </td>
                                                <td> @php echo 0 @endphp </td>
                                                <td> @php echo $total8 @endphp </td>
                                                <td> @php echo $total9 @endphp </td>
                                                <td> @php echo $total8+$total9 @endphp </td>

                                            </tr>
                                        @endforeach
<!--end-->

                                    </tbody>
                                @endif
                            </table>

                        </div>
                    </div>
                </div>

            </div>

    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    {{--<script src="https:code.jquery.com/jquery-3.5.1.js"></script> --}}

    <script src="https:cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https:cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https:cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https:cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>

    <script type="text/javascript">
               $("#showall tr td").each(function() {
            var cellText = $.trim($(this).text());
            if (cellText.length == 0) {
                $(this).parent().hide();
            }
        });
        var table = document.getElementById("clubs");
        var values = [];
        for (var r = 0, n = table.rows.length; r < n; r++) {
            var points = table.rows[r].cells[1].innerHTML;
            values.push(points);
        }
        var sornam = Math.max(...values);
        for (var r = 0, n = table.rows.length; r < n; r++) {
            var point = table.rows[r].cells[1].innerHTML;
            if (sornam == point) {
                //    alert(table.rows[r].cells[0].innerHTML)
                $champion = document.getElementById('champion');
                $champion.innerHTML = table.rows[r].cells[0].innerHTML;

            }
        }
            
       
    </script>




@stop