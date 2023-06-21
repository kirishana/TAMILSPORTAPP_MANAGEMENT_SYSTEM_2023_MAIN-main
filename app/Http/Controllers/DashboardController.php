<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Securimage;
use Sentinel;
use View;
use Analytics;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;
use Charts;
use App\User;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;
use File;
use Auth;
use Spatie\Permission\Models\Role;
use App\Models\Organization;
use App\generalSetting;
use App\Models\AgeGroupGender;
use App\Models\AthleticSetting;
use App\Models\Club;
use App\Models\Registration;
use App\Models\GroupRegistration;
use App\Models\Venue;
use App\Models\League;
use Session;
use App\Models\Team;
use App\Models\MarathonPoint;

class DashboardController extends Controller
{
	public function results(Request $request){
		$src = '"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fhierensolanki%2Fposts%2F1264241026994313&width=500" width="500" height="608" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"';

		$id=Session::get('id');
		$leagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
		$genders=null;
		$league=null;
		$view=null;
		$general = generalSetting::first();
		return view('admin.out-results',compact('leagues','genders','league','id','general'));

	}
	public function search(Request $request){
		$league=League::find($request->input('league'));
		$id=Session::get('id');
		Session::put('league',$request->input('league'));
		$leagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->where('from_date','<',Carbon::now())->where('to_date','>',Carbon::now())->orwhere('to_date','<',Carbon::now())->get();
		$genders=AgeGroupGender::with('ageGroupEvent')->get();
	
		$general = generalSetting::first();
		$view = view('admin.out-result-include', compact('genders', 'leagues','league','id','general'))->render();

        return response()->json([
            'html' => $view,
        ]);
	}
	public function copyIframe(Request $request,$id){
		$league=League::find($id);
		$genders=AgeGroupGender::with('ageGroupEvent')->get();
		$clubLists=array();
		$firstPlaceCount=array();
		$secondPlaceCount=array();
		$thirdPlaceCount=array();
		$eventStatus=array();
		$clubNames=array();
		$regs=Registration::where('league_id',$id)->get();
		$cls=array();
foreach($regs as $reg){
$cls[]=$reg->user->club_id;

}
$clubs=array_unique($cls);
		foreach($clubs as $club){
			
					$clubNames[]=$reg->club_id;
				
		}
	foreach($clubs as $uniqueClub){
		$clubName=Club::find($uniqueClub);
			$clubLists[] = 	$clubName->club_name;			
				
		
		$firstPlace= DB::table('users')
		->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
		->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
		->where('users.club_id',$uniqueClub)
		->where('age_group_gender_user.league_id',$league?$league->id:'')
		->where('age_group_gender_user.marks','=',5)
		->count();
		$firstPlaceCount[] = 			
			$firstPlace;

	$secondPlace= DB::table('users')
	->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
	->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
	->where('users.club_id',$uniqueClub)
	->where('age_group_gender_user.league_id',$league?$league->id:'')
	->where('age_group_gender_user.marks','=',3)
	->groupBy(DB::raw("users.club_id"))
	->count();
// 	dd(	$secondPlace);
	// dd($secondPlaces);

		$secondPlaceCount[] = 
				$secondPlace;

	$thirdPlace= DB::table('users')
	->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
	->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
	->where('users.club_id',$uniqueClub)
	->where('age_group_gender_user.league_id',$league?$league->id:'')
	->where('age_group_gender_user.marks','=',1)
	->count();
	
		$thirdPlaceCount[] =
			
				$thirdPlace;
	
		

		 }
		// $teams=array();
		 $teams = DB::table('age_group_gender_team')->where('league_id', $league->id)->where('marks', '!=', null)->get();
		 if($teams->count()>0){
		 $clubs = array();
		$compareClubs = array();
		 foreach ($teams as $team){
				$cls = Team::find($team->team_id);
				$clubs[] = $cls;
				$compareClubs[]=$cls->club_id;
				$total = array();

			}

		 
		 $result = collect($clubs)
			 ->groupBy('club_id');
		}
		
		else{
			$clubs[] = null;
				$compareClubs[]=null;
		}
		 $users = DB::table('age_group_gender_user')->where('league_id', $league->id)->where('marks', '!=', null)->get();
		 $allUsers= DB::table('age_group_gender_user')->where('league_id', $league->id)->get()->unique('user_id');

		 $userClubs=array();
		 $userCompareClubs=array();
		 foreach ($users as $user){
			$cls1 = User::find($user->user_id);
			$userClubs[] = $cls1;
			$userCompareClubs[]=$cls1->club_id;
			$total = array();
		 }
		 $result1 = collect($userClubs)
			 ->groupBy('club_id');
$intersects=array_intersect($compareClubs,$userCompareClubs);
$unique=array_unique($intersects);
$marathonPoints=MarathonPoint::where('league_id',$league->id)->get();
$suvars=array();
$totals=array();
$marathanPoints=array();
$cluParticipants=array();
foreach ($unique as $club){
	$total=0;
	$total1=0;
	$total4=0;
	$total7=0;
$cl=Club::find($club);
	 
		$suvars[]=$cl->club_name;

			
			 foreach($teams as $user){

			 
				$userDet=Team::find($user->team_id);
				if($userDet->club_id==$cl->id ){
					$total += $user->marks;
				 }
				
			 
			}
			
			 
			 

			 foreach($users as $user){
				$userDet=User::find($user->user_id);
				if($userDet->club_id==$cl->id ){
					$total1 += $user->marks;
				 }
			 }
			 
			 foreach($marathonPoints as $marathonPoint){
				if($marathonPoint->club_id==$cl->id ){
					$total4 += $marathonPoint->points;
	
				 }
			 }
                                   
			 
			 
			
			 foreach($allUsers as $user){
				$userDet=User::find($user->user_id);
				if($userDet->club_id==$cl->id ){
				   $total7 ++;
			 }
			 

			 }
			 $marathanPoints[]=$total4;
			 $cluParticipants[]=$total7;
			 $totals[]=$total+$total1;
			}
			$all=array_merge($compareClubs,$userCompareClubs);
			$uniqueAll=array_unique($all);
			$diff=array_diff($uniqueAll,$unique);
			$individualClubs=array();
			$tots=array();
			$marathanPoints1=array();
			$cluParticipants1=array();
			foreach ($diff as $club){
				if($club!=null){

			
			
			$total3=0;
												$total2=0;
												$total5=0;
												$total6=0;
			$cl=Club::find($club);
			
											
			$individualClubs[]=$cl->club_name;
			
							  if($teams!=null){

							  }
								foreach($teams as $user){

								
													$userDet=Team::find($user->team_id);
													if($userDet->club_id==$cl->id ){
														$total3 += $user->marks;
	
													}
												
											}
												
																				
												
												
												foreach($users as $user){
													$userDet=User::find($user->user_id);
													if($userDet->club_id==$cl->id ){
														$total2 += $user->marks;

													}
													
												}
												if($total2==0){
													$tots[]=$total3;
												}
												if($total3==0){
													$tots[]=$total2;
												} 
												foreach($marathonPoints as $marathonPoint){
													if($marathonPoint->club_id==$cl->id ){
														$total5 += $marathonPoint->points;
										
													 }
												 }
																	   
												 
												 
												 foreach($allUsers as $user){
													$userDet=User::find($user->user_id);
													if($userDet->club_id==$cl->id ){
													   $total6 ++;
												 }
												 
									
												 }
												 $marathanPoints1[]=$total5;
												 $cluParticipants1[]=$total6;						
											
			}
		}
												  
				$merge=array_merge($suvars,$individualClubs);  
				$totas=array_merge($totals,$tots);	
				$marathaonTotal=array_merge($marathanPoints,$marathanPoints1);	
				$cluParticipantCounts=array_merge($cluParticipants,$cluParticipants1);						
		 	$eventStatus=AgeGroupGender::select(DB::raw("COUNT(*) as count_row"), 'status')
		->whereHas('ageGroupEvent', function ($q) use($league){
			$q->whereHas('Event',function ($q) use($league) {
				$q->where('league_id',$league?$league->id:'');

			});
		})->groupBy(DB::raw("status"))->get();

		return view('admin.out-results-iframe',compact('marathaonTotal','cluParticipantCounts','totas','merge','eventStatus','clubLists','firstPlaceCount','secondPlaceCount','thirdPlaceCount','league','genders'));

	}
	protected $countries = array(
		""   => "Select Country",
		"AF" => "Afghanistan",
		"AL" => "Albania",
		"DZ" => "Algeria",
		"AS" => "American Samoa",
		"AD" => "Andorra",
		"AO" => "Angola",
		"AI" => "Anguilla",
		"AR" => "Argentina",
		"AM" => "Armenia",
		"AW" => "Aruba",
		"AU" => "Australia",
		"AT" => "Austria",
		"AZ" => "Azerbaijan",
		"BS" => "Bahamas",
		"BH" => "Bahrain",
		"BD" => "Bangladesh",
		"BB" => "Barbados",
		"BY" => "Belarus",
		"BE" => "Belgium",
		"BZ" => "Belize",
		"BJ" => "Benin",
		"BM" => "Bermuda",
		"BT" => "Bhutan",
		"BO" => "Bolivia",
		"BA" => "Bosnia and Herzegowina",
		"BW" => "Botswana",
		"BV" => "Bouvet Island",
		"BR" => "Brazil",
		"IO" => "British Indian Ocean Territory",
		"BN" => "Brunei Darussalam",
		"BG" => "Bulgaria",
		"BF" => "Burkina Faso",
		"BI" => "Burundi",
		"KH" => "Cambodia",
		"CM" => "Cameroon",
		"CA" => "Canada",
		"CV" => "Cape Verde",
		"KY" => "Cayman Islands",
		"CF" => "Central African Republic",
		"TD" => "Chad",
		"CL" => "Chile",
		"CN" => "China",
		"CX" => "Christmas Island",
		"CC" => "Cocos (Keeling) Islands",
		"CO" => "Colombia",
		"KM" => "Comoros",
		"CG" => "Congo",
		"CD" => "Congo, the Democratic Republic of the",
		"CK" => "Cook Islands",
		"CR" => "Costa Rica",
		"CI" => "Cote d'Ivoire",
		"HR" => "Croatia (Hrvatska)",
		"CU" => "Cuba",
		"CY" => "Cyprus",
		"CZ" => "Czech Republic",
		"DK" => "Denmark",
		"DJ" => "Djibouti",
		"DM" => "Dominica",
		"DO" => "Dominican Republic",
		"EC" => "Ecuador",
		"EG" => "Egypt",
		"SV" => "El Salvador",
		"GQ" => "Equatorial Guinea",
		"ER" => "Eritrea",
		"EE" => "Estonia",
		"ET" => "Ethiopia",
		"FK" => "Falkland Islands (Malvinas)",
		"FO" => "Faroe Islands",
		"FJ" => "Fiji",
		"FI" => "Finland",
		"FR" => "France",
		"GF" => "French Guiana",
		"PF" => "French Polynesia",
		"TF" => "French Southern Territories",
		"GA" => "Gabon",
		"GM" => "Gambia",
		"GE" => "Georgia",
		"DE" => "Germany",
		"GH" => "Ghana",
		"GI" => "Gibraltar",
		"GR" => "Greece",
		"GL" => "Greenland",
		"GD" => "Grenada",
		"GP" => "Guadeloupe",
		"GU" => "Guam",
		"GT" => "Guatemala",
		"GN" => "Guinea",
		"GW" => "Guinea-Bissau",
		"GY" => "Guyana",
		"HT" => "Haiti",
		"HM" => "Heard and Mc Donald Islands",
		"VA" => "Holy See (Vatican City State)",
		"HN" => "Honduras",
		"HK" => "Hong Kong",
		"HU" => "Hungary",
		"IS" => "Iceland",
		"IN" => "India",
		"ID" => "Indonesia",
		"IR" => "Iran (Islamic Republic of)",
		"IQ" => "Iraq",
		"IE" => "Ireland",
		"IL" => "Israel",
		"IT" => "Italy",
		"JM" => "Jamaica",
		"JP" => "Japan",
		"JO" => "Jordan",
		"KZ" => "Kazakhstan",
		"KE" => "Kenya",
		"KI" => "Kiribati",
		"KP" => "Korea, Democratic People's Republic of",
		"KR" => "Korea, Republic of",
		"KW" => "Kuwait",
		"KG" => "Kyrgyzstan",
		"LA" => "Lao People's Democratic Republic",
		"LV" => "Latvia",
		"LB" => "Lebanon",
		"LS" => "Lesotho",
		"LR" => "Liberia",
		"LY" => "Libyan Arab Jamahiriya",
		"LI" => "Liechtenstein",
		"LT" => "Lithuania",
		"LU" => "Luxembourg",
		"MO" => "Macau",
		"MK" => "Macedonia, The Former Yugoslav Republic of",
		"MG" => "Madagascar",
		"MW" => "Malawi",
		"MY" => "Malaysia",
		"MV" => "Maldives",
		"ML" => "Mali",
		"MT" => "Malta",
		"MH" => "Marshall Islands",
		"MQ" => "Martinique",
		"MR" => "Mauritania",
		"MU" => "Mauritius",
		"YT" => "Mayotte",
		"MX" => "Mexico",
		"FM" => "Micronesia, Federated States of",
		"MD" => "Moldova, Republic of",
		"MC" => "Monaco",
		"MN" => "Mongolia",
		"MS" => "Montserrat",
		"MA" => "Morocco",
		"MZ" => "Mozambique",
		"MM" => "Myanmar",
		"NA" => "Namibia",
		"NR" => "Nauru",
		"NP" => "Nepal",
		"NL" => "Netherlands",
		"AN" => "Netherlands Antilles",
		"NC" => "New Caledonia",
		"NZ" => "New Zealand",
		"NI" => "Nicaragua",
		"NE" => "Niger",
		"NG" => "Nigeria",
		"NU" => "Niue",
		"NF" => "Norfolk Island",
		"MP" => "Northern Mariana Islands",
		"NO" => "Norway",
		"OM" => "Oman",
		"PK" => "Pakistan",
		"PW" => "Palau",
		"PA" => "Panama",
		"PG" => "Papua New Guinea",
		"PY" => "Paraguay",
		"PE" => "Peru",
		"PH" => "Philippines",
		"PN" => "Pitcairn",
		"PL" => "Poland",
		"PT" => "Portugal",
		"PR" => "Puerto Rico",
		"QA" => "Qatar",
		"RE" => "Reunion",
		"RO" => "Romania",
		"RU" => "Russian Federation",
		"RW" => "Rwanda",
		"KN" => "Saint Kitts and Nevis",
		"LC" => "Saint LUCIA",
		"VC" => "Saint Vincent and the Grenadines",
		"WS" => "Samoa",
		"SM" => "San Marino",
		"ST" => "Sao Tome and Principe",
		"SA" => "Saudi Arabia",
		"SN" => "Senegal",
		"SC" => "Seychelles",
		"SL" => "Sierra Leone",
		"SG" => "Singapore",
		"SK" => "Slovakia (Slovak Republic)",
		"SI" => "Slovenia",
		"SB" => "Solomon Islands",
		"SO" => "Somalia",
		"ZA" => "South Africa",
		"GS" => "South Georgia and the South Sandwich Islands",
		"ES" => "Spain",
		"LK" => "Sri Lanka",
		"SH" => "St. Helena",
		"PM" => "St. Pierre and Miquelon",
		"SD" => "Sudan",
		"SR" => "Suriname",
		"SJ" => "Svalbard and Jan Mayen Islands",
		"SZ" => "Swaziland",
		"SE" => "Sweden",
		"CH" => "Switzerland",
		"SY" => "Syrian Arab Republic",
		"TW" => "Taiwan, Province of China",
		"TJ" => "Tajikistan",
		"TZ" => "Tanzania, United Republic of",
		"TH" => "Thailand",
		"TG" => "Togo",
		"TK" => "Tokelau",
		"TO" => "Tonga",
		"TT" => "Trinidad and Tobago",
		"TN" => "Tunisia",
		"TR" => "Turkey",
		"TM" => "Turkmenistan",
		"TC" => "Turks and Caicos Islands",
		"TV" => "Tuvalu",
		"UG" => "Uganda",
		"UA" => "Ukraine",
		"AE" => "United Arab Emirates",
		"GB" => "United Kingdom",
		"US" => "United States",
		"UM" => "United States Minor Outlying Islands",
		"UY" => "Uruguay",
		"UZ" => "Uzbekistan",
		"VU" => "Vanuatu",
		"VE" => "Venezuela",
		"VN" => "Viet Nam",
		"VG" => "Virgin Islands (British)",
		"VI" => "Virgin Islands (U.S.)",
		"WF" => "Wallis and Futuna Islands",
		"EH" => "Western Sahara",
		"YE" => "Yemen",
		"ZM" => "Zambia",
		"ZW" => "Zimbabwe"
	);
	/**
	 * Message bag.
	 *
	 * @var Illuminate\Support\MessageBag
	 */
	protected $messageBag = null;

	/**
	 * Initializer.
	 *
	 */
	public function __construct()
	{
		$this->messageBag = new MessageBag;
	}

	/**
	 * Crop Demo
	 */
	public function crop_demo()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$targ_w = $targ_h = 150;
			$jpeg_quality = 99;

			$src = base_path() . '/public/assets/img/cropping-image.jpg';
			//dd($src);
			$img_r = imagecreatefromjpeg($src);

			$dst_r = ImageCreateTrueColor($targ_w, $targ_h);

			imagecopyresampled($dst_r, $img_r, 0, 0, intval($_POST['x']), intval($_POST['y']), $targ_w, $targ_h, intval($_POST['w']), intval($_POST['h']));

			header('Content-type: image/jpeg');
			imagejpeg($dst_r, null, $jpeg_quality);

			exit;
		}
	}

	public function showIndex2()
	{
		if (Auth::check())
			return view('admin.index2');
		else
			return redirect('admin/signin')->with('error', 'You must be logged in!');
	}

	public function showView($name = null)
	{

		if (View::exists('admin/' . $name)) {
			if (Auth::check())
				return view('admin.' . $name);
			else
				return redirect('admin/signin')->with('error', 'You must be logged in!');
		} else {
			return view('admin.404');
		}
	}

	public function Pagination(Request $request)
	{
		if ($request->ajax()) {
			$TeaamsCount=League::OrderBy('created_at','desc')->paginate(6);
			$latestLeagues=League::OrderBy('created_at','desc')->paginate(6);
			$ongoingLeagues2=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->paginate(6);
			$view1= view('admin.dashboard.latestLeaguespage', compact('latestLeagues'))->render();
			$view2= view('admin.dashboard.clubGeventsTotalTeams', compact('TeaamsCount'))->render();
			$view3= view('admin.dashboard.onLeagueEveStatus', compact('ongoingLeagues2'))->render();
			return response()->json([
				'html1' => $view1,
				'html2' => $view2,
				'html3' => $view3,
			]);
		}
	}
	public function dashboard(Request $request)
	{
		$org=Auth::user()->organization_id;
		$id =Session::get('id');
		$user_count = User::count();
		$orgs=User::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->where('is_approved',1)->get();
		$futureLeagues=League::where('to_date','>',Carbon::now())->where('from_date','>',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
		$pastLeagues=League::where('to_date','<',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
		$ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
		if(count($ongngLeaguesCount)>0){
			$ongngLeagues=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
		}else{
			$ongngLeagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
		}
		$ongngLeagues1=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
		$genders=AgeGroupGender::with('ageGroupEvent')->get();
		// dd($ongngLeagues->athelaticsetting->third_place);

		$logs = DB::table('active_users')->latest()->take(5)->get();
		$users = User::orderBy('id', 'desc')->take(6)->get();
		$roles = Role::all();
		$chart_data = User::select(DB::raw("COUNT(*) as count_row"))
			->orderBy("created_at")
			->groupBy(DB::raw("month(created_at)"))
			->get();
		$organizations = Organization::all();
		$general = generalSetting::first();
		if(Auth::user()->hasRole(3)){
			$id =Session::get('id');
			$Cluborganizations = Organization::where('id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
			$leagues = League::where('to_date','>',Carbon::now())->get();
			
			$clubMembers=User::where('club_id',Auth::user()->club_id)->where('is_approved',1)->get();
		$registrations=Registration::where('is_approved',1)->get();
		$latestLeagues=League::OrderBy('created_at','desc')->paginate(6);


		$TeaamsCount=League::OrderBy('created_at','desc')->paginate(6);
		$pastLeagues=League::where('to_date','<',Carbon::now())->get();
		$futureLeagues=League::where('from_date','>',Carbon::now())->where('to_date','>',Carbon::now())->get();
		
		$ongoingLeagues2=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
		$eventsG=League::where('id',$ongngLeagues?$ongngLeagues->id:'')->get();
			$eventsS=League::where('id',$ongngLeagues?$ongngLeagues->id:'')->get();
			// $ongoingleague=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->orderBy('id','desc')->first();

			// dd($atheleticSetting->first_place);
		$grpregistrations=GroupRegistration::all();
		$places= DB::table('users')
		->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
		->Join('leagues', 'age_group_gender_user.league_id', '=', 'leagues.id')
		->Join('age_group_genders', 'age_group_gender_user.age_group_gender_id', '=', 'age_group_genders.id')
		->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks','age_group_genders.first_place','age_group_genders.second_place','age_group_genders.third_place')
		->where('users.club_id',Auth::user()->club_id)
		->where('age_group_gender_user.league_id',$ongngLeagues?$ongngLeagues->id:'')
		->where('age_group_gender_user.marks','!=',Null)
		->groupBy(DB::raw("age_group_gender_user.marks"))
		->get();
		$placesGroup= DB::table('teams')
		->leftJoin('age_group_gender_team', 'age_group_gender_team.team_id', '=', 'teams.id')
		->Join('age_group_genders', 'age_group_gender_team.age_group_gender_id', '=', 'age_group_gender_team.id')
		->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_team.team_id'),'teams.club_id','age_group_gender_team.marks','age_group_genders.group_first_place','age_group_genders.group_second_place','age_group_genders.group_third_place')
		->where('teams.club_id',Auth::user()->club_id)
		->where('age_group_gender_team.league_id',$ongngLeagues?$ongngLeagues->id:'')
		->where('age_group_gender_team.marks','!=',Null)
		->groupBy(DB::raw("age_group_gender_team.marks"))
		->get();
		$clubParticipantCounts = DB::table('users')
			->Join('registrations', 'registrations.user_id', '=', 'users.id')
			->select(DB::raw("COUNT(*) as count_row", 'registrations.user_id'),'users.club_id')
			->where('registrations.league_id',$ongngLeagues?$ongngLeagues->id:'')
			->where('users.club_id','!=','null')
			->groupBy(DB::raw("users.club_id"))
			->get();
			// dd($places);

			// $groupsEvent= DB::table('teams')
			// ->Join('age_group_gender_team', 'age_group_gender_team.team_id', '=', 'teams.id')
			// ->Join('age_group_genders', 'age_group_genders.id', '=', 'age_group_gender_team.age_group_gender_id')
			// ->Join('age_group_event', 'age_group_event.id', '=', 'age_group_genders.age_group_event_id')
			// ->where('teams.club_id',Auth::user()->club_id)
			// ->where('age_group_gender_team.league_id',$ongngLeagues->id)
			// ->get();
			// dd($groupsEvent->events);

			return view('admin.dashboard.clubs', ['TeaamsCount'=>$TeaamsCount,'ongoingLeagues2'=>$ongoingLeagues2,'eventsS'=>$eventsS,'eventsG'=>$eventsG,'clubParticipantCounts'=>$clubParticipantCounts,'latestLeagues'=>$latestLeagues,'placesGroup'=>$placesGroup,'places'=>$places,'grpregistrations'=>$grpregistrations,'ongngLeagues'=>$ongngLeagues,'leagues'=>$leagues,'registrations'=>$registrations,'clubMembers'=>$clubMembers,'genders'=>$genders,'ongngLeagues'=>$ongngLeagues,'pastLeagues'=>$pastLeagues,'futureLeagues'=>$futureLeagues,'Cluborganizations' => $Cluborganizations,  'chart_data' => $chart_data,  'user_count' => $user_count, 'users' => $users, 'id' => $id]);

		}
		if(Auth::user()->hasRole(7)){
			$id =Session::get('id');
			$child_id=array();
		$user_ids=Auth::user()->children;
		foreach($user_ids as $user_id){
			$child_id[]=$user_id->id;
		}
		array_push($child_id,Auth::user()->id);

			$leagues = League::where('to_date','>',Carbon::now())->get();
			$ongoingLeagues=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
			$participatedEventsCount=DB::table('age_group_gender_user')->whereIn('user_id',$child_id)->get();
			$WonEventsCount=DB::table('age_group_gender_user')->whereIn('user_id',$child_id)->whereNotNull('marks')->get();
			$pastLeagues=League::where('to_date','<',Carbon::now())->get();
			$futureLeagues=League::where('from_date','>',Carbon::now())->where('to_date','>',Carbon::now())->get();
		// dd($ongoingLeagues);
		$points= DB::table('users')
		->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')->whereIn('age_group_gender_user.user_id',$child_id)
		->where('age_group_gender_user.marks','!=',Null)
		->select(DB::raw('sum(age_group_gender_user.marks) AS sum'),'age_group_gender_user.league_id','age_group_gender_user.marks')
		->groupBy(DB::raw("age_group_gender_user.league_id"))
		->get();

			return view('admin.dashboard.players', ['WonEventsCount'=>$WonEventsCount,'user_ids'=>$user_ids,'points'=>$points,'ongoingLeagues'=>$ongoingLeagues,'ongngLeaguesCount'=>$ongngLeaguesCount,'leagues'=>$leagues,
						'participatedEventsCount'=>$participatedEventsCount,'pastLeagues'=>$pastLeagues,'futureLeagues'=>$futureLeagues,'id' => $id]);

		}
		else{
			$user=Auth::user()->organization_id?Auth::user()->organization_id:$id;
			$venues=Venue::where('organization_id',$user)->get();
			$org=Organization::find($user);
			$latestLeague=$org->leagues?League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->latest()->first():'';
			$registrations=Registration::where('league_id',$ongngLeagues?$ongngLeagues->id:'')->select(DB::raw("COUNT(*) as count_row"), 'league_id')
			->orderBy("created_at")
			->groupBy(DB::raw("league_id"))
			->where('is_approved',1)
			->get();	
			// dd($ongngLeagues);	
			$grpregistrations=GroupRegistration::where('league_id',$ongngLeagues?$ongngLeagues->id:'')->select(DB::raw("COUNT(*) as count_row"), 'league_id')
			->orderBy("created_at")
			->groupBy(DB::raw("league_id"))
			->get();
			$leagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();

		

			$clubParticipantCounts = DB::table('users')
			->leftJoin('registrations', 'registrations.user_id', '=', 'users.id')
			->select(DB::raw("COUNT(*) as count_row", 'registrations.user_id'),'users.club_id')
			->where('registrations.league_id',$ongngLeagues?$ongngLeagues->id:'')
			->where('users.club_id','!=','null')
			->groupBy(DB::raw("users.club_id"))
			->get();

			$clubGroupParticipantCounts = DB::table('group_registrations')
			->select(DB::raw("COUNT(*) as count_row", 'group_registrations.club_id'),'group_registrations.club_id')
			->where('group_registrations.league_id',$ongngLeagues?$ongngLeagues->id:'')
			->groupBy(DB::raw("group_registrations.club_id"))
			->get();


			//barchart

		$dataPoints = [];
		$singleEvenCounts = [];
		$groupEvenCounts=[];
		$groupEvenGroupCount=[];
		$singleEvenGroupCount=[];
		$singleEventCounts = Registration::select(DB::raw("COUNT(*) as count_row"),  'league_id')
			->where('organization_id',  $user)
			->where('status',[2,1])
			->where('league_id',$ongngLeagues?$ongngLeagues->id:'')
			->groupBy(DB::raw("league_id"))
			->get();
			$groupEventCounts = Registration::select(DB::raw("COUNT(*) as count_row"),  'league_id')
			->where('organization_id',  $user)
			->where('status',4)
			->where('league_id',$ongngLeagues?$ongngLeagues->id:'')
			->groupBy(DB::raw("league_id"))
			->get();
			$singleEventGroupCounts = GroupRegistration::select(DB::raw("COUNT(*) as count_row"),  'league_id')
			->where('organization_id',  $user)
			->where('status',[1,2])
			->where('league_id',$ongngLeagues?$ongngLeagues->id:'')
			->groupBy(DB::raw("league_id"))
			->get();
			$groupEventGroupCounts = GroupRegistration::select(DB::raw("COUNT(*) as count_row"),  'league_id')
			->where('organization_id',  $user)
			->where('status',0)
			->where('league_id',$ongngLeagues?$ongngLeagues->id:'')
			->groupBy(DB::raw("league_id"))
			->get();
		foreach ($singleEventCounts as $singleEventCount) {
			$league=DB::table('leagues')->where('id',$singleEventCount->league_id)->first();
			$dataPoints[] = array(				
					$league->name,	
			);
		}
		foreach ($singleEventCounts as $singleEventCount) {
			$singleEvenCounts[] = array(
				
					$singleEventCount->count_row,
					
				
			);
		}
		foreach ($groupEventCounts as $groupEventCount) {
			$groupEvenCounts[] = array(
				
					$groupEventCount->count_row,
					
				
			);
		}
		foreach ($singleEventGroupCounts as $singleGroupCount) {
			$singleEvenGroupCount[] = array(
				
					$singleGroupCount->count_row,
					
				
			);
		}
		foreach ($groupEventGroupCounts as $groupGroupCount) {
			$groupEvenGroupCount[] = array(
				
					$groupGroupCount->count_row,
					
				
			);
		}
		
		$clubNames=[];
		$firstPlaceCount=[];
		$secondPlaceCount=[];
		$thirdPlaceCount=[];
		 $clubs=Club::where('is_approved',1)->wherehas('users',function($q){
			$q->has('registrations','>',0);
		 })->get();
		 foreach($clubs as $club){
			$clubNames[] = array(				
				$club->club_name,	
		);
		$firstPlace= DB::table('users')
		->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
		->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
		->where('users.club_id',$club->id)
		->where('age_group_gender_user.league_id',$ongngLeagues?$ongngLeagues->id:'')
		->where('age_group_gender_user.marks','=',$ongngLeagues?$ongngLeagues->organization->athelaticsetting->first_place:'')
		->count();
		$firstPlaceCount[] = array(				
			$firstPlace
	);
	$secondPlace= DB::table('users')
	->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
	->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
	->where('users.club_id',$club->id)
	->where('age_group_gender_user.league_id',$ongngLeagues?$ongngLeagues->id:'')
	->where('age_group_gender_user.marks','=',$ongngLeagues?$ongngLeagues->organization->athelaticsetting->second_place:'')
	->groupBy(DB::raw("users.club_id"))
	->count();
	
	// dd($secondPlaces);

		$secondPlaceCount[] = array(
			
				$secondPlace


			
		);
	

	$thirdPlace= DB::table('users')
	->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
	->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
	->where('users.club_id',$club->id)
	->where('age_group_gender_user.league_id',$ongngLeagues?$ongngLeagues->id:'')
	->where('age_group_gender_user.marks','=',$ongngLeagues?$ongngLeagues->organization->athelaticsetting->third_place:'')
	->count();
	
		$thirdPlaceCount[] = array(
			
				$thirdPlace,	
		);
	

		 }
		
		
	
$category=$ongngLeagues?$ongngLeagues->name:'';
$var=null;
$ongLeague=$ongngLeagues?$ongngLeagues:null;
$events=$ongngLeagues?$ongngLeagues->events:'';
			return view('admin.dashboard.organizations', ['events'=>$events,'ongLeague'=>$ongLeague,'clubNames'=>$clubNames,'ongngLeagues1'=>$ongngLeagues1,'ongngLeaguesCount'=>$ongngLeaguesCount,'logs'=>$logs,'category'=>$category,'thirdPlaceCount'=>$thirdPlaceCount,'secondPlaceCount'=>$secondPlaceCount,'clubs'=>$clubs,'firstPlaceCount'=>$firstPlaceCount,'singleEventGroupCount'=>$singleEvenGroupCount,'groupEventGroupCount'=>$groupEvenGroupCount,'dataPoints'=>$dataPoints,'singleEventCounts'=>$singleEvenCounts,'groupEventCounts'=>$groupEvenCounts,'clubGroupParticipantCounts'=>$clubGroupParticipantCounts,'clubParticipantCounts'=>$clubParticipantCounts,'venues'=>$venues,'latestLeague'=>$latestLeague,'grpregistrations'=>$grpregistrations,'registrations'=>$registrations,'leagues'=>$leagues,'id'=>$id,'orgs'=>$orgs,'genders'=>$genders,'ongngLeagues'=>$ongngLeagues,'pastLeagues'=>$pastLeagues,'futureLeagues'=>$futureLeagues,'organizations' => $organizations,  'chart_data' => $chart_data, 'user_count' => $user_count, 'users' => $users, 'var'=>$var, 'id' => $id]);
		}
	}
	public function leagueSearch(Request $request,$id){
		$ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
		if(count($ongngLeaguesCount)>0){
			$ongngLeagues=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
		}else{
			$ongngLeagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
		}
		$ongngLeagues=League::find($id);
			$registrations=Registration::where('league_id',$ongngLeagues->id)->select(DB::raw("COUNT(*) as count_row"), 'league_id')
		->orderBy("created_at")
		->groupBy(DB::raw("league_id"))
		->get();
		$grpregistrations=GroupRegistration::where('league_id',$ongngLeagues->id)->select(DB::raw("COUNT(*) as count_row"), 'league_id')
		->orderBy("created_at")
		->groupBy(DB::raw("league_id"))
		->get();
		
				
		$view = view('admin.dashboard.leagueSearch', compact('grpregistrations','registrations','ongngLeagues'))->render();

		return response()->json([
            'html' => $view,
        ]);
	}
public function clubPoints($id){
	$ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','=<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
		if(count($ongngLeaguesCount)>0){
			$league=League::where('to_date','>',Carbon::now())->where('from_date','=<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
		}else{
			$league=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
		}
	$ongLeague=League::find($id);
	$events =$league->events ;
	$var="yes";
	$view = view('admin.dashboard.clubPoints', compact('var','ongLeague','events'))->render();

		return response()->json([
            'html' => $view,
        ]);
}
	public function leagueSingleEvent(Request $request,$id){
		$latestLeague=League::find($id);
		$clubParticipantCounts = DB::table('users')
		->leftJoin('registrations', 'registrations.user_id', '=', 'users.id')
		->select(DB::raw("COUNT(*) as count_row", 'registrations.user_id'),'users.club_id')
		->where('registrations.league_id',$latestLeague->id)
		->where('users.club_id','!=','null')
		->groupBy(DB::raw("users.club_id"))
		->get();	
		$view = view('admin.dashboard.SingleEventClubParticipants', compact('clubParticipantCounts','latestLeague'))->render();

		return response()->json([
            'html' => $view,
        ]);	
	}
	public function leagueGroupEvent(Request $request,$id){
		$latestLeague=League::find($id);
		$clubGroupParticipantCounts = DB::table('group_registrations')
		->select(DB::raw("COUNT(*) as count_row", 'group_registrations.club_id'),'group_registrations.club_id')
		->where('group_registrations.league_id',$latestLeague->id)
		->groupBy(DB::raw("group_registrations.club_id"))
		->get();
		$view2 = view('admin.dashboard.groupEventClubParticipants', compact('clubGroupParticipantCounts','latestLeague'))->render();
		return response()->json([
            'html' => $view2,
        ]);	
	}
	public function singleEvent(Request $request)
	{
		$value=$request->input('value');
		// dd($value);

		$ongngLeagues=League::find($value);
		// dd($ongngLeague->organization->athelaticsetting->first_place);
		$places= DB::table('users')
		->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
		->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
		->where('users.club_id',Auth::user()->club_id)
		->where('age_group_gender_user.league_id',$ongngLeagues->id)
		->where('age_group_gender_user.marks','!=',Null)
		->groupBy(DB::raw("age_group_gender_user.marks"))
		->get();
	


	$view= view('admin.dashboard.clubsingleeventchart', compact('places','ongngLeagues'))->render();

	return response()->json([
	'html' => $view,
]);	

	}

	public function singleEventPlace(Request $request)
	{
		$value=$request->input('value');

		$ongngLeagues=League::find($value);
		$clubNames=[];
		$firstPlaceCount=[];
		$secondPlaceCount=[];
		$thirdPlaceCount=[];
		 $clubs=Club::where('is_approved',1)->wherehas('users',function($q){
			$q->has('registrations','>',0);
		 })->get();
		 foreach($clubs as $club){
			$clubNames[] = array(				
				$club->club_name,	
		);
		$firstPlace= DB::table('users')
		->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
		->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
		->where('users.club_id',$club->id)
		->where('age_group_gender_user.league_id',$ongngLeagues?$ongngLeagues->id:'')
		->where('age_group_gender_user.marks','=',$ongngLeagues?$ongngLeagues->organization->athelaticsetting->first_place:'')
		->count();
		$firstPlaceCount[] = array(				
			$firstPlace
	);
// dd($ongngLeagues->organization->athelaticsetting->third_place);
	$secondPlace= DB::table('users')
	->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
	->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
	->where('users.club_id',$club->id)
	->where('age_group_gender_user.league_id',$ongngLeagues?$ongngLeagues->id:'')
	->where('age_group_gender_user.marks','=',$ongngLeagues?$ongngLeagues->organization->athelaticsetting->second_place:'')
	->groupBy(DB::raw("users.club_id"))
	->count();
	
	// dd($secondPlaces);

		$secondPlaceCount[] = array(
			
				$secondPlace


			
		);
	

	$thirdPlace= DB::table('users')
	->leftJoin('age_group_gender_user', 'age_group_gender_user.user_id', '=', 'users.id')
	->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_user.user_id'),'users.club_id','age_group_gender_user.marks')
	->where('users.club_id',$club->id)
	->where('age_group_gender_user.league_id',$ongngLeagues?$ongngLeagues->id:'')
	->where('age_group_gender_user.marks','=',$ongngLeagues?$ongngLeagues->organization->athelaticsetting->third_place:'')
	->count();
	
		$thirdPlaceCount[] = array(
			
				$thirdPlace,	
		);

		 }
	$category=$ongngLeagues?$ongngLeagues->name:'';



	$view= view('admin.dashboard.individualPlaceHighChart', compact('category','clubNames','ongngLeagues','firstPlaceCount','secondPlaceCount','thirdPlaceCount'))->render();

	return response()->json([
	'html' => $view,
]);	

	}


	public function prize(Request $request)
	{
		$d=Session::get('id');
	$value=$request->input('value');
	if(Auth::user()->hasRole(3)){
		
			$eventsS=League::where('id',$value)->get();
	
	$view= view('admin.dashboard.prizeList', compact('eventsS'))->render();
	return response()->json(['html' => $view]);

	}
	}

	
	public function GroupEvent(Request $request)
	{
		$value=$request->input('value');
		$ongngLeagues=League::find($value);
		$placesGroup= DB::table('teams')
		->leftJoin('age_group_gender_team', 'age_group_gender_team.team_id', '=', 'teams.id')
		->select(DB::raw("COUNT(*) as count_row", 'age_group_gender_team.team_id'),'teams.club_id','age_group_gender_team.marks')
		->where('teams.club_id',Auth::user()->club_id)
		->where('age_group_gender_team.league_id',$ongngLeagues->id)
		->where('age_group_gender_team.marks','!=',Null)
		->groupBy(DB::raw("age_group_gender_team.marks"))
		->get();

		$view= view('admin.dashboard.clubGroupeventchart', compact('placesGroup','ongngLeagues'))->render();
		return response()->json([
		'html' => $view,
	]);		
	}
	public function GEvent(Request $request)
	{
		$value=$request->input('value');
		if(Auth::user()->hasRole(3)){
		
			$eventsG=League::where('id',$value)->paginate(12);

			$view= view('admin.dashboard.prizeListGroup', compact('eventsG'))->render();
			return response()->json(['html' => $view]);
		
			}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
