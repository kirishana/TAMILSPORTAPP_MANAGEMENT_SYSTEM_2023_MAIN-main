
@if(!(Auth::user()->id==1))
<?php

// use Illuminate\Support\Facades\Auth;

$general = App\generalSetting::first();
$url=$general->website_url."assets/images/icons/loadingIcon.gif";
?>
<style>
.loader {
display:none;
position: fixed;
top: 50%;
left:50%;
right:50%;
bottom: 0;
width: 50%;
background-image: url(<?php echo $url ?>);
/* background-image:url("http:127.0.0.1:8000//media2.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif"); */
background-repeat: no-repeat;
background-size: 75px 75px;
z-index: 99999;
}
 </style>

<ul id="menu" class="page-sidebar-menu" style="height: 1000px;">
       

    @if(Auth::user()->id==1)
    <?php
    $organizations = App\Models\Organization::where('status', 1)->get();
    $orgId = Session::get('id');

    ?>
    <br>
    <br>
    {{--  <li>
        <select name="org" class="org" id="org" style="width: 250px;height:35px;">
            <option disabled selected>select organization</option>
            @foreach($organizations as $organization)
            <option id="{{$organization->id}}" value="{{$organization->id}}" {{$org->id==$organization->id?'selected':''}}>
                {{$organization->name}}
            </option>
            @endforeach
        </select>

    </li>  --}}
    <br>
    @endif
    @if(Auth::user()->hasRole(5)||Auth::user()->hasRole(6)||Auth::user()->hasRole(4))
    @elseif(Auth::user()->hasRole(8))
    <li {!! (Request::is('dashboard') )!!}>
        <a class="hover" href="{{route('systemDashboard',Auth::user()->organization_id?Auth::user()->organization_id:Auth::user()->id)}}">
            <i class="material-icons text-light leftsize">home</i>
            <span class="title">Dashboard</span>
            <!-- <span class="fa arrow"></span> -->
        </a>
    </li>
    @elseif(Auth::user()->hasRole(7))
    <li {!! (Request::is('dashboard') )!!}>
        <a class="hover" href="{{route('systemDashboard',Auth::user()->id)}}">
            <i class="material-icons text-light leftsize">home</i>
            <span class="title">Dashboard</span>
            <!-- <span class="fa arrow"></span> -->
        </a>
    </li>

    @else
    <li {!! (Request::is('dashboard') )!!}>
        <a  class="hover" href="{{route('systemDashboard',Auth::user()->organization_id?Auth::user()->organization_id:Auth::user()->id)}}">
            <i class="material-icons text-light leftsize">home</i>
            <span class="title">{{ __('sidebar.dashboard') }}</span>
        </a>
    </li>

    @endif
    @if (Auth::user()->hasAnyPermission(['Create-Organization','ViewSettings','View-Organization','View-staff','View-org-member']))
    <li {!! (Request::is('organizations/create')||Request::is('organizations/view/*') || Request::is('org/user/create') || Request::is('organization/atheletic-settings') || Request::is('organizations/edit/*') || Request::is('org-member/events/*') || Request::is('member/events/*') ||Request::is('organizations/create_org_member') ||Request::is('organization-staffs') || Request::is('org_member_data') || Request::is('organizations/settings') || Request::is('organization/atheletic-settings') || Request::is('organizations/payment-methods') || Request::is('organization/email-settings') || Request::is('organization/sms-settings') || Request::is('admin/age-groups') || Request::is('main-events') ? 'class="active"' : '' ) !!}>
        <a  class="hover" href="#">
            <i class="material-icons text-light leftsize">spa</i>
            <span class="title">{{ __('sidebar.organization') }}</span>
            <span class="fa arrow"></span>
        </a>

        <ul>
        
            
 @if (Auth::guard('web')->user()->can('View-Organization'))
            <li {!!  (Request::is('organizations/view/*')||Request::is('organizations/edit/*') ? 'class="active"' : '') !!}>
                <a  class="hover" href="{{ route('organization.view', Auth::user()->id) }}">
                    <span class="title">{{ __('sidebar.view') }}</span>

                </a>
            </li>

         @endif
          @if (Auth::guard('web')->user()->can('View-staff'))

            <li {!! (Request::is('organization-staffs')||Request::is('org/user/create')? 'class="active"' : '' ) !!}>
                <a  class="hover" href="/organization-staffs">
                    <!-- <span class="title">{{ __('sidebar.view') }}</span> -->

                    {{ __('sidebar.staffs_lists') }}

                </a>
            </li>
@endif
          @if (Auth::guard('web')->user()->can('View-org-member'))

            <li {!! (Request::is('org_member_data')|| Request::is('organizations/create_org_member') || Request::is('member/events/*') ? 'class="active"' : '')!!} >
                <a  class="hover" href="/org_member_data">
                    <!-- <span class="title">{{ __('sidebar.view') }}</span> -->
                   {{ __('sidebar.members_lists') }}
                </a>
            </li>
@endif     
            @if (Auth::guard('web')->user()->can('ViewSettings'))
            <li {!! (Request::is('organization/news-letter') || Request::is('organizations/settings') || Request::is('organization/atheletic-settings')   || Request::is('organizations/payment-methods') || Request::is('organization/email-settings') || Request::is('organization/sms-settings') ? 'class="active"' : '' ) !!}>

                <a  class="hover" href="#">
                    <!-- <span class="fa arrow"></span> -->
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="title">{{ __('sidebar.settings') }}</span>

                </a>
                <ul class="sub-menu">
                    <li {!! (Request::is('organizations/settings')  ? 'class="active"' : '' ) !!}>
                        <a  class="hover" href="/organizations/settings">
                            <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                            <span class="title">{{ __('sidebar.general') }}</span>

                        </a>
                    </li>

                    <li {!! (Request::is('organization/atheletic-settings') ? 'class="active"' : '' ) !!}>
                        <a class="hover" href="/organization/atheletic-settings">
                            <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                            <span class="title">{{ __('sidebar.athletic_settings') }}</span>
                        </a>
                    </li>
                    <li {!! (Request::is('organization/email-settings') ? 'class="active"' : '' ) !!}>
                        <a class="hover" href="/organization/email-settings">
                           <span class="title">{{ __('sidebar.email_settings') }}</span>
                       </a></li>
                        {{--  <li {!! (Request::is('organization/news-letter') ? 'class="active"' : '' ) !!}>
                        <a class="hover" href="/organization/news-letter">
                           <span class="title">News Letter</span>
                       </a></li>  --}}
                    <li {!! (Request::is('organizations/payment-methods') ? 'class="active"' : '' ) !!}>
                        <a class="hover" href="/organizations/payment-methods">
                            <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                            <span class="title">{{ __('sidebar.payment_methods') }}</span>
                        </a>
                    </li>
                </ul>

            </li>
            @endif

          @if (Auth::guard('web')->user()->can('viewMasterData'))

            <li {!! (Request::is('admin/age-groups') || Request::is('main-events') ? 'class="active"' : '' ) !!}>

                <a class="hover" href="#">
                    <span><i class="material-icons">keyboard_arrow_right</i></span>
                    <span class="title">{{ __('sidebar.master_data') }}</span>

                </a>
                <ul class="sub-menu">

                    <li {!! (Request::is('admin/age-groups') ? 'class="active"' : '' ) !!}>
                        <a class="hover" href="/admin/age-groups">
                            <span class="title">{{ __('sidebar.age_group') }}</span>

                        </a>
                    </li>

                    <li {!! (Request::is('main-events') ? 'class="active"' : '' ) !!}>
                        <a class="hover" href="/main-events">
                            <span class="title">{{ __('sidebar.events') }}</span>
                        </a>
                    </li>

                </ul>

            </li>
            @endif

        </ul>
    </li>
    @endif


    @if (Auth::user()->hasAnyPermission(['Create-Club','View-Club','View-team','view-member','View-Setting-club']))

    <li {!! (Request::is('all-clubs')||Request::is('club/create')  ||Request::is('add/club_member')||Request::is('club-members') || Request::is('teams')||Request::is('user/imports') || Request::is('club/settings') || Request::is('club/show')||Request::is('member/events/*') ? 'class="active"' : '' ) !!}>
        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">people</i>
            <span class="title">{{ __('sidebar.clubs') }}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
         @if (Auth::guard('web')->user()->can('Create-Club'))
         <li {!! (Request::is('club/create')   ? 'class="active"' : '' ) !!}>
                <a class="hover" href="{{ URL::to('club/create') }}">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.add_new') }}</span>
                </a>
            </li>
           @endif
            @if (Auth::guard('web')->user()->can('View-Club'))
            <li {!! (  Request::is('all-clubs')  ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/all-clubs">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.all_clubs') }}</span>
            </a>
            </li>
            @endif
          @if (Auth::guard('web')->user()->can('Create-member2'))

            <li {!! (Request::is('club-members') ||Request::is('add/club_member') || Request::is('member/events/*')  ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/club-members">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <!-- <span class="title">{{ __('sidebar.all_clubs') }}</span> -->
                   {{ __('sidebar.club_members') }}
                </a>
            </li>
@endif

  @if (Auth::guard('web')->user()->can('View-team'))
            <li {!! (Request::is('teams') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/teams">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                   <span class="title">{{ __('sidebar.club_teams') }}</span> 
                 
                </a>
            </li>
            @endif
              @if (Auth::guard('web')->user()->can('ViewSettings-club'))
            <li {!! (Request::is('club/settings') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/club/settings">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.settings') }}</span>

                </a>
            </li>
            @endif
        @if (Auth::guard('web')->user()->can('Edit-Club'))
            <li {!! (Request::is('club/show') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/club/show">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.view') }}</span>

                </a>
            </li>
            @endif
              @if (Auth::guard('web')->user()->can('import-member'))
             <li {!! (Request::is('user/imports') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/user/imports">
                   {{ __('sidebar.import_club_members') }}
                </a>
                </li>
            @endif
              

        </ul>
    </li>
    @endif
    @if(Auth::user()->hasRole(3))
    @if (Auth::guard('web')->user()->can('import-member'))
              <?php 
              $oldclubReg=App\Models\ClubeRquest::where('status',0)->where('old_club_id', Auth::user()->club_id)->count();
              $newclubReg=App\Models\ClubeRquest::where('status',3)->where('new_club_id', Auth::user()->club_id)->count();
              
              ?>
            <!-- <li {!! (Request::is('club-requests') ? 'class="active"' : '' ) !!}>-->
            <!--    <a class="hover" href="/club-requests">-->
            <!--    <i class="material-icons text-light leftsize">room</i>-->
            <!--<span class="title">{{ __('sidebar.Club_Requests') }}</span>-->
            <!--       <span class="label label-danger" style="border-radius:50px 50px;">{{$oldclubReg+$newclubReg}}</span>-->
            <!--    </a>-->
            <!--    </li>-->
            @endif
        @endif
    {{--  @if(Auth::user()->hasRole(4))
    <li {!! (Request::is('organization-staffs')||Request::is('org/user/create') ? 'class="active"' : '' ) !!}>
                   <a  class="hover" href="/organization-staffs">
   
                       Staffs List
   
                   </a>
               </li>
               @endif  --}}
    @if (Auth::user()->hasAnyPermission(['Create-Venue','View-venue']))

    <li {!! (Request::is('venues/create') || Request::is('venues')|| Request::is('venues/edit/*')? 'class="active"' : '' ) !!}>
        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">room</i>
            <span class="title">{{ __('sidebar.venues') }}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-Venue'))

            <li {!! (Request::is('venues/create') ? 'class="active"' : '' ) !!}>
                <a  class="hover" href="/venues/create">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.add_new') }}</span>

                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('View-venue'))

            <li {!! (Request::is('venues')||Request::is('venues/edit/*') ? 'class="active"' : '' ) !!}>
                <a href="/venues">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.all_venues') }}</span>
                </a>
            </li>
            @endif


        </ul>
    </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['Create-league','view-leagues']))

    <li {!! (Request::is('leagues/create') || Request::is('leagues')|| Request::is('leagues/view/*') || Request::is('leagues/*/edit') || Request::is('league/champion/*') ? 'class="active"' : '' ) !!}>

        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">golf_course</i>
            <span class="title">{{ __('sidebar.leagues') }}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            @if (Auth::guard('web')->user()->can('Create-league'))

            <li {!! (Request::is('leagues/create') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/leagues/create">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.add_new') }}</span>

                </a>
            </li>
            @endif
            @if (Auth::guard('web')->user()->can('view-leagues'))

            <li {!! (Request::is('leagues') || Request::is('leagues/*/edit')|| Request::is('leagues/view/*') || Request::is('league/champion/*') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/leagues">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.all_leagues') }}</span>
                </a>
            </li>
            @endif

        </ul>
    </li>
    @endif
    @if(Auth::user()->hasRole(7))
    <li {!! (Request::is('members/create') || Request::is('members')? 'class="active"' : '' ) !!}>
        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">wc</i>
            <span class="title">{{ __('sidebar.family_members') }}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">


            <li {!! (Request::is('members/create') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/members/create">

                    {{ __('sidebar.add_new') }}
                </a>
            </li>

            <li {!! (Request::is('members') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/members">

                    {{ __('sidebar.al_members') }}
                </a>
            </li>

        </ul>
        </li>
        @endif
    @if(Auth::user()->hasRole(7))
    <!--<li {!! (Request::is('manage-club')? 'class="active"' : '' ) !!}>-->
    <!--    <a class="hover" href="/manage-club">-->
    <!--        <i class="material-icons text-light leftsize">wc</i>-->
    <!--        <span class="title">{{__('sidebar.Club_Requests')}}</span>-->
            
    <!--    </a>-->
    <!--</li>-->
        @endif
        {{-- @endif --}}
        @if (Auth::user()->hasAnyPermission(['Create-user','View-user']))
        @if(Auth::user()->hasRole(2)||Auth::user()->hasRole(8))
        <?php
        $count = App\User::where('organization_id', Auth::user()->organization_id?Auth::user()->organization->id:$orgId)->where('is_approved', 2)->count();
        ?>
        @endif
        <li {!! (Request::is('users/create') || Request::is('imports') || Request::is('users') ? 'class="active"' : '' ) !!}>
            <a class="hover" href="#">
                <i class="material-icons text-light leftsize">person</i>
                <span class="title">{{ __('sidebar.users') }} @if(Auth::user()->hasRole(2)||Auth::user()->hasRole(8))<span class="label label-danger" style="border-radius:50px 50px;"><?php echo $count ?></span>@endif</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                @if (Auth::guard('web')->user()->can('Create-user'))

                <li {!! (Request::is('users/create')  ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/users/create">
                        {{ __('sidebar.add_new') }}
                    </a>
                </li>
                @endif
                @if (Auth::guard('web')->user()->can('View-user'))

                <li {!! (Request::is('users')? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/users">
                        {{ __('sidebar.all_users') }}
                    </a>
                </li>
                @endif
                @if (Auth::guard('web')->user()->can('import-users'))
                 <li {!! (Request::is('imports') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/imports">
                   {{ __('sidebar.import_users') }}
                </a>
                </li>
                @endif

            </ul>
        </li>
        @endif
        <!-- @if(Auth::user()->hasRole(3))-->

        <!--<li {!! (Request::is('events')  ? 'class="active"' : '' ) !!}>-->
        <!--    <a class="hover" href="#">-->
        <!--        <i class="material-icons text-light leftsize">event</i>-->
        <!--        <span class="title">Events</span>-->
        <!--        <span class="fa arrow"></span>-->
        <!--    </a>-->
        <!--    <ul class="sub-menu">-->
               

        <!--        <li {!! (Request::is('events') ? 'class="active"' : '' ) !!}>-->
        <!--            <a class="hover" href="/events">-->
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <!-- <span class="title">{{ __('sidebar.all_events') }}</span> -->
                       
        <!--                {{ __('sidebar.all_events') }}-->
        <!--            </a>-->
        <!--        </li>-->

             

        <!--    </ul>-->
        <!--</li>-->
        <!--@endif -->

        <!--@if (Auth::user()->hasRole(7))-->
        
        <!--<li {!! (Request::is('events') ? 'class="active"' : '' ) !!}>-->
        <!--    <a class="hover" href="#">-->
        <!--        <i class="material-icons text-light leftsize">event</i>-->
        <!--        <span class="title">Events</span>-->
        <!--        <span class="fa arrow"></span>-->
        <!--    </a>-->
        <!--    <ul class="sub-menu">-->
                
                
        <!--        <li {!! (Request::is('events') ? 'class="active"' : '' ) !!}>-->
        <!--            <a class="hover load" href="/events">-->
                        

        <!--                {{ __('sidebar.all_events') }}-->
        <!--            </a>-->
        <!--        </li>-->
               
                

        <!--    </ul>-->
        <!--</li>-->
        <!--@endif-->
        
        
        <li {!! (Request::is('event/create')|| Request::is('clubteams') || Request::is('event/participantResults')|| Request::is('event/cancel')  ||  Request::is('league/participants')|| Request::is('participants/*')||Request::is('events') || Request::is('all') ||Request::is('results') || Request::is('calender')||(Request::is('marathon')) ? 'class="active"' : '' ) !!}>
            <a class="hover" href="#">
                <i class="material-icons text-light leftsize">event</i>
                <span class="title"> {{ __('sidebar.events') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                @if (Auth::guard('web')->user()->can('Create-event'))

                <li {!! (Request::is('event/create') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/event/create">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.add_new') }}</span>
                    </a>
                </li>
                @endif
                
                <li {!! (Request::is('events')||Request::is('participants/*') ? 'class="active"' : '' ) !!}>
                    <a class="hover load" href="/events">
                        @if(Auth::user()->hasRole(2))
                        {{ __('sidebar.event_by_age_group') }}
                        @elseif(Auth::user()->hasRole(3))
                        {{ __('sidebar.group_events') }}
                        @else

                        {{ __('sidebar.all_events') }}
                        @endif
                    </a>
                </li>
                @if (Auth::guard('web')->user()->can('viewevent'))

                <li {!! (Request::is('all') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/all">

                         {{ __('sidebar.event_lists') }}
                    </a>
                </li>
                @endif

                @if (Auth::guard('web')->user()->can('view-participants'))

                <li {!! (Request::is('league/participants') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/league/participants">

                         {{ __('sidebar.participants') }}
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole(2)||Auth::user()->hasRole(8))

                <li {!! (Request::is('clubteams') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/clubteams">

                         {{ __('sidebar.club_teams') }}
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole(5)||Auth::user()->hasRole(6))
                <li {!! (Request::is('calender') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/calender">
                        <span class="title"> {{ __('sidebar.calender') }}</span>
                    </a>
                </li>
                @endif
                 @if (Auth::guard('web')->user()->can('view-cancellation'))
                {{--  @if(Auth::user()->hasRole(2)||Auth::user()->hasRole(8))  --}}
                <li {!! (Request::is('event/cancel') ? 'class="active"' : '' ) !!}>
                    <a class="hover load" href="/event/cancel">
                        <span class="title"> {{ __('sidebar.event_cancel') }}</span>
                    </a>
                </li>
                {{--  @endif  --}}
                @endif
                 @if (Auth::guard('web')->user()->can('view-marathon'))
               {{--  @if(Auth::user()->hasRole(2)||Auth::user()->hasRole(8))  --}}
                <li {!! (Request::is('marathon') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/marathon">
                        <span class="title"> {{ __('sidebar.marathon') }}</span>
                    </a>
                </li>
                @endif

                @if (Auth::guard('web')->user()->can('viewresults'))
                {{--  @if(Auth::user()->hasRole(2)||Auth::user()->hasRole(8))  --}}
                <li {!! (Request::is('event/participantResults') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/event/participantResults">
                        <span class="title"> {{ __('sidebar.event_participant_results') }}</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @if (Auth::guard('web')->user()->can('view-request'))
        <?php
        $regs = App\Models\Registration::with(['user', 'league'])->where('organization_id', Auth::user()->organization_id)->whereIn('status',[1])->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
       
        $count = count($regs);
        $Greg = App\Models\GroupRegistration::where('organization_id', Auth::user()->organization->id)->whereNotIn('trans_id',[0])->whereIn('status',[1,5])->groupBy('trans_id','league_id','club_id')->get();
        $count2 = count($Greg);
        $count3 = $count + $count2;
        ?>
     
        <li {!!(Request::is('payment-requests')? 'class="active"' : '' )!!}>
            <a class="hover" href="/payment-requests">
                <i class="material-icons text-light leftsize">monetization_on</i>

                <span class="title"> {{ __('sidebar.payment_req') }} @if(Auth::user()->hasRole(2))<span class="label label-danger" style="border-radius:50px 50px;"><?php echo $count3 ?></span>@endif</span>


                <!-- <span class="fa arrow"></span> -->
            </a>
        </li>
        @endif
        @if(Auth::user()->hasRole(3))
        <?php 
         $count = 0;
         $count2=0;
                $leagueEvents =App\Models\League::where('to_date', '>', Carbon\Carbon::now())->get();
                foreach ($leagueEvents as $league){
                                                if($league->registrations->count()>0){
                                                foreach($league->registrations as $group){
                                                if($group->user->club_id == Auth::user()->club_id){
                                                    if($group->status==4){
                                                $count+=1;
}
                                            }
                                        }
                                        }
                                    }

                                    foreach ($leagueEvents as $league){
                                                if($league->groupRegistrations->count()>0){
                                                foreach($league->groupRegistrations as $group){
                                                if($group->club_id == Auth::user()->club_id){
                                                    if($group->status==0){
                                                $count2+=1;
}
                                            }
                                        }
                                        }
                                    }
                                    $count3=$count+$count2;

        ?>
        <li {!! (Request::is('group-event/payment') ? 'class="active"' : '' ) !!}>
            <a class="hover" href="/group-event/payment">
                <i class="material-icons text-light leftsize">monetization_on</i>
                <span class="title">{{ __('sidebar.payments') }} </span>
                <!-- <span class="fa arrow"></span> -->
            </a>
        </li>
        <li {!! (Request::is('event-approvals') ? 'class="active"' : '' ) !!}>
            <?php 
            $pendingreq=0;
            $pendingreq2=0;
                $pendingRequests=App\Models\Registration::where('is_approved','2')->get();
                foreach($pendingRequests as $pendingRequest){
                    $user=App\User::find($pendingRequest->user_id);
                    if(Auth::user()->club_id==$user->club_id){
                        $pendingreq+=1;

                    }
                    
                }
                $pendingRequests2=App\Models\Registration::where('is_approved','1')->where('status',4)->get();
                foreach($pendingRequests2 as $pendingRequest){
                    $user=App\User::find($pendingRequest->user_id);
                    if(Auth::user()->club_id==$user->club_id){
                        $pendingreq2+=1;

                    }
                    
                }
                $pending3=$pendingreq+$pendingreq2;
                ?>
            <a class="hover" href="/event-approvals">
                <img style="margin-top:0px" src="{{ asset('assets/images/icons/eventaproved.png') }}">

                <span class="title">{{ __('sidebar.approvals') }} <span class="label label-danger" style="border-radius:50px 50px;"><?php echo $pendingreq ?></span></span>


                <!-- <span class="fa arrow"></span> -->
            </a>
        </li>
        @elseif(Auth::user()->hasRole(7)&& Auth::user()->club_id==null)
        <?php 
         $count= 0;
         $count1=0;
         $count2=0;
         $children=array();
         foreach(Auth::user()->children as $child){
             $children[]=$child->id;
         }
         $regs=App\Models\Registration::where('user_id',Auth::user()->id)->where('status',4)->get();
        foreach($regs as $reg){
            $count++;
        }
            $childrenRegs=App\Models\Registration::where('status',4)->whereIn('user_id',$children)->get();   
            foreach($childrenRegs as $reg)     
            {
                $count1++;
            }   
            $count2=$count+$count1;
        ?>
       
        <li>
            {{-- {{ dd(Auth::user()->children) }} --}}
            <a class="hover" href="/members/pay">
                <i class="material-icons text-light leftsize">monetization_on</i>
                <span class="title">{{ __('sidebar.payments') }} <span class="label label-danger" style="border-radius:50px 50px;"><?php echo $count2 ?></span></span>
             </a>
        </li>
        @endif



        
        @if (Auth::user()->hasAnyPermission(['Membership','Registration']))

        <li>
            <a class="hover" href="#">
                <i class="material-icons text-light leftsize">live_help</i>
                <span class="title">Inquaries</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                @if (Auth::guard('web')->user()->can('Membership'))

                <li>
                    <a class="hover" href="{{ URL::to('admin/news') }}">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.membership') }}</span>
                    </a>
                </li>
                @endif
                @if (Auth::guard('web')->user()->can('Registration'))

                <li>
                    <a class="hover" href="{{ URL::to('admin/news_item') }}">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.registration') }}</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
        @endif


        <li {!! (Request::is('paymentplay') || Request::is('report/league/invoices') || Request::is('event/group-results') || Request::is('report/clubevents') || Request::is('report/eventParticipants') || Request::is('report/clubteams') ||Request::is('report/club-points') || Request::is('transactions') || Request::is('participantsRegOverview') || Request::is('participantsOverview') || Request::is('report/events') || Request::is(' /report/club-points') || Request::is('report/clubMembers') || Request::is('report/clubpay') || Request::is('report/users')|| Request::is('report/events') || Request::is('participants')|| Request::is('report/champions')|| Request::is('paymentsRequest')|| Request::is('report/judges')|| Request::is('report/starters')|| Request::is('report/prize-list')|| Request::is('event/final-results')? 'class="active"' : '' ) !!}>
            <a class="hover" href="#">
                <i class="material-icons text-light leftsize">insert_drive_file</i>
                <span class="title"> {{ __('sidebar.reports') }}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
         
            @if(Auth::user()->hasRole(1)||Auth::user()->hasRole(5)||Auth::user()->hasRole(6)||Auth::user()->hasRole(4)||Auth::user()->hasRole(2)||Auth::user()->hasRole(8))
            <li {!! (Request::is('report/eventParticipants') ? 'class="active"' : '' ) !!}>
    <a class="hover load" href="/report/eventParticipants">
        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
        <span class="title">{{ __('sidebar.event_participant_results') }}</span>
    </a>
</li>
   
@endif
            @if(Auth::user()->hasRole(2))
            <li {!! (Request::is('event/final-results') ? 'class="active"' : '' ) !!}>
    <a class="hover load" href="/event/final-results">
        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
        <span class="title">{{ __('sidebar.event_results') }}</span>
    </a>
</li>
   
@endif
            @if(Auth::user()->hasRole(3))
                <li {!! (Request::is('report/clubMembers') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/clubMembers">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">Club Members</span>
                    </a>
                </li>
                <li {!! (Request::is('report/clubteams') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/clubteams">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">Club Teams</span>
                    </a>
                </li>

                <li {!! (Request::is('report/clubevents') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/clubevents">
                      
                        <span class="title">Club Events</span>
                    </a>
                </li>

                <li {!! (Request::is('report/clubpay') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/clubpay">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">Payment</span>
                    </a>
                </li>
                <li {!! (Request::is('event/group-results') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/event/group-results">

                        Group Event Results
                    </a>
                </li>
                <li {!! (Request::is('report/league/invoices') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/league/invoices">

                        Invoices
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole(2)||Auth::user()->hasRole(8)||Auth::user()->hasRole(1))

                <li {!! (Request::is('report/users') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/users">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.users') }}</span>
                    </a>
                </li>
                @elseif(Auth::user()->hasRole(2)||Auth::user()->hasRole(7)||Auth::user()->hasRole(8)||Auth::user()->hasRole(1)||Auth::user()->hasRole(5)||Auth::user()->hasRole(6)||Auth::user()->hasRole(4))


                <li {!! (Request::is('event/final-results') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/event/final-results">

                        {{ __('sidebar.event_results') }}
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole(7))
                <li {!! (Request::is('report/events') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/events">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.events') }}</span>
                    </a>
                </li>

                {{-- <li {!! (Request::is('participants') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/participants">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">Participants</span>
                    </a>
                </li> --}}
                <li {!! (Request::is('paymentplay') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/paymentplay">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.payment') }}</span>
                    </a>
                </li>
                @endif
@if(Auth::user()->hasRole(1)||Auth::user()->hasRole(2)||Auth::user()->hasRole(5)||Auth::user()->hasRole(6)||Auth::user()->hasRole(4)||Auth::user()->hasRole(8))
                <li {!! (Request::is('report/events') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/events">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.events') }}</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole(4))
                <li {!! (Request::is('report/prize-list') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/prize-list">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.prize_lists') }}</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole(2)||Auth::user()->hasRole(8)||Auth::user()->hasRole(1))

                <li {!! (Request::is('participants') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/participants">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.participants') }}</span>
                    </a>
                </li>
               
                <li {!! (Request::is('report/champions') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/champions">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.champions') }}</span>
                    </a>
                </li>
           

              
                <li {!! (Request::is('paymentsRequest') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/paymentsRequest">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.paymnet_req') }}</span>
                    </a>
                </li>
               
                <li {!! (Request::is('report/judges') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/judges">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.starters_judges') }}</span>
                    </a>
                </li>
                {{-- <li {!! (Request::is('report/starters') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/starters">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">Starters</span>
                    </a>
                </li> --}}
                
                <li {!! (Request::is('report/prize-list') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/prize-list">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.prize_lists') }}</span>
                    </a>
                </li>
                <li {!! (Request::is('report/club-points') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/report/club-points">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.club_points') }}</span>
                    </a>
                </li>
                <li {!! (Request::is('participantsRegOverview') ? 'class="active"' : '' ) !!}>
                    <a class="hover load" href="/participantsRegOverview">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.part_reg_overview') }}</span>
                    </a>
                </li>
                <li {!! (Request::is('participantsOverview') ? 'class="active"' : '' ) !!}>
                    <a class="hover load" href="/participantsOverview">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.part_overview') }}</span>
                    </a>
                </li>
                <li {!! (Request::is('transactions') ? 'class="active"' : '' ) !!}>
                    <a class="hover" href="/transactions">
                        <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                        <span class="title">{{ __('sidebar.trans_det') }}</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
                @if (Auth::guard('web')->user()->can('view-iframe'))
            <li {!! (Request::is('out-results') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="#">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">{{ __('sidebar.iframes') }}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
    
                    <li {!! (Request::is('out-results') ? 'class="active"' : '' ) !!}>
                        <a class="hover" href="{{ URL::to('/out-results') }}">
                            <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                            <span class="title">{{ __('sidebar.out_results') }}</span>
                        </a>
                    </li>
    
                   
                </ul>
            </li>
            
               @endif
               
                @if(Auth::user()->hasRole(2))
                <li>
                <a class="hover" href="#">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">{{ __('sidebar.documentation') }}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
    
                <li>
               <a class="hover" href="{{asset('assets/documentation/OrganizationAdmin.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">{{ __('sidebar.org_admin') }}</span>
                </a>
        </li>
        <li>
                <a class="hover" href="{{asset('assets/documentation/ClubAdmin.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">{{ __('sidebar.club_admin') }}</span>
                </a>
        </li>
        <li>
<a class="hover" href="{{asset('assets/documentation/Starter&Judge.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">{{ __('sidebar.starter_judge') }}</span>
                </a>
        </li>
        <li>
<a class="hover" href="{{asset('assets/documentation/Player.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">{{ __('sidebar.player') }}</span>
                </a>
        </li>
        <li>
<a class="hover" href="{{asset('assets/documentation/EventOrganizer.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">{{ __('sidebar.event_organizer') }}</span>
                </a>
        </li>
                   
                </ul>
            </li>
        
              
       
@elseif(Auth::user()->hasRole(3))
<li>
                <a class="hover" href="{{asset('assets/documentation/ClubAdmin.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">Documentation</span>
                </a>
        </li>
       
        @elseif(Auth::user()->hasRole(4))
<li>
<a class="hover" href="{{asset('assets/documentation/EventOrganizer.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">Documentation</span>
                </a>
        </li>
       
        @elseif(Auth::user()->hasRole(5))
<li>
<a class="hover" href="{{asset('assets/documentation/Starter&Judge.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">Documentation</span>
                </a>
        </li>
       
        @elseif(Auth::user()->hasRole(6))
<li>
<a class="hover" href="{{asset('assets/documentation/Starter&Judge.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">Documentation</span>
                </a>
        </li>
        
        @elseif(Auth::user()->hasRole(7))
<li>
<a class="hover" href="{{asset('assets/documentation/Player.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">Documentation</span>
                </a>
        </li>
       
      @endif
           @if(Auth::user()->hasRole(2))     
     <li>
                <a class="hover" href="{{ URL::to('/activity') }}">
                <i class="far fa-eye"></i>
                    <span class="title">ActivityLog</span>
                </a>
        </li>
           @endif
            
             
        
</ul>
 <div class='loader'></div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$(".load").on('click', function() {    
        $('.loader').show();

    });
    $("#org").on('change', function() {
        var org = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/organization/' + org,
            data: {
                "_token": "{{ csrf_token() }}",
                "org": org
            },
            success: function(response) {
                window.location.href = response.url;
            }
        });

    });
</script>
@endif