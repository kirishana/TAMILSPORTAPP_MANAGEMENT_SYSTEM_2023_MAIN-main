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
use App\Helpers\LogActivity;
use Yajra\DataTables\DataTables;
use App\Blog;
use Charts;
use App\User;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;
use File;
use Auth;
use Spatie\Permission\Models\Role;
use App\Models\League;
use App\generalSetting;
use App\Models\Club;
use App\Models\Country;
use App\Models\dayUser;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class JoshController extends Controller
{

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
	//log viewer
	public function activityLogData()
	{
		$logs = Activity::get(['causer_id', 'log_name', 'description', 'created_at']);
		return DataTables::of($logs)
			->make(true);
	}
	public function myTestAddToLog()
	{
		\LogActivity::addToLog('My Testing Add To Log.');
		dd('log insert successfully.');
	}


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	
	public function logActivity()
	{
		$logs = \LogActivity::logActivityLists();
		return view('logActivity', compact('logs'));
	}
	public function showHome()
	{
		$storagePath = storage_path() . '/app/analytics/';
		if (File::exists($storagePath . 'service-account-credentials.json')) {
			//Last week visitors statistics
			$month_visits = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7))->groupBy(function (array $visitorStatistics) {
				return $visitorStatistics['date']->format('Y-m-d');
			})->map(function ($visitorStatistics, $yearMonth) {
				list($year, $month, $day) = explode('-', $yearMonth);
				return ['date' => "{$year}-{$month}-{$day}", 'visitors' => $visitorStatistics->sum('visitors'), 'pageViews' => $visitorStatistics->sum('pageViews')];
			})->values();

			//yearly visitors statistics
			$year_visits = Analytics::fetchTotalVisitorsAndPageViews(Period::days(365))->groupBy(function (array $visitorStatistics) {
				return $visitorStatistics['date']->format('Y-m');
			})->map(function ($visitorStatistics, $yearMonth) {
				list($year, $month) = explode('-', $yearMonth);
				return ['date' => "{$year}-{$month}", 'visitors' => $visitorStatistics->sum('visitors'), 'pageViews' => $visitorStatistics->sum('pageViews')];
			})->values();

			// total page visitors and views
			$visitorsData = Analytics::performQuery(Period::days(7), 'ga:visitors,ga:pageviews', ['dimensions' => 'ga:date']);
			$visitorsData = collect($visitorsData['rows'] ?? [])->map(function (array $dateRow) {
				return [

					'visitors' => (int) $dateRow[1],
					'pageViews' => (int) $dateRow[2],
				];
			});
			$visitors = 0;
			$pageVisits = 0;
			foreach ($visitorsData as $val) {
				$visitors += $val['visitors'];
				$pageVisits += $val['pageViews'];
			}
			$analytics_error = 0;
		} else {
			$month_visits = 0;
			$year_visits = 0;
			$visitors = 0;
			$pageVisits = 0;
			$analytics_error = 1;
		}


		//total users
		$user_count = User::count();
		//total Blogs
		// $blog_count = Blog::count();
		// $blogs = Blog::orderBy('id', 'desc')->take(5)->get()->load('category', 'author');
		$users = User::orderBy('id', 'desc')->take(6)->get();
		$roles = Role::all();
		$chart_data = User::select(DB::raw("COUNT(*) as count_row"))
			->orderBy("created_at")
			->groupBy(DB::raw("month(created_at)"))
			->get();
		$userCounts = DB::table('users')
			->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
			->select(DB::raw("COUNT(*) as count_row", 'model_has_roles.role_id'))
			->groupBy(DB::raw("model_has_roles.role_id"))
			->get();
		// dd($userCounts);
		// $db_chart =  Charts::database(User::all(), 'area', 'morris')
		//     ->elementLabel("Users")
		//     ->dimensions(0, 250)
		//     ->responsive(true)
		//     ->groupByMonth( 2017, true);


		// $countries = DB::table('users')->where('deleted_at', null)
		//     ->leftJoin('countries', 'countries.sortname', '=', 'users.country')
		//     ->select('countries.name')
		//     ->get();
		// $geo = Charts::database($countries, 'geo', 'google')
		//     ->dimensions(0,250)
		//     ->responsive(true)

		//     ->groupBy('name');

		$roles = DB::table('model_has_roles')
			->join('users', 'users.id', '=', 'model_has_roles.model_id')
			->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
			->select(DB::raw("COUNT(*) as count_row"), 'roles.name')
			->groupBy(DB::raw("model_has_roles.role_id"))
			->get();
		// $user_roles = Charts::database($roles, 'pie', 'google')
		//     ->dimensions(0, 200)
		//     ->responsive(true)
		//     ->groupBy('name');
		// $line_chart =  Charts::database(User::all(), 'donut', 'morris')
		//     ->elementLabel("Users")
		//     ->dimensions(0, 150)
		//     ->responsive(true)
		//     ->groupByMonth( 2017, true);
		$userCounts = User::select(DB::raw("COUNT(*) as count_row"), 'organization_id')
			->orderBy("created_at")
			->where('organization_id', '!=', 'null')
			->groupBy(DB::raw("organization_id"))
			->get();
		$clubUserCounts = User::select(DB::raw("COUNT(*) as count_row"), 'club_id')
			->orderBy("created_at")
			->where('club_id', '!=', 'null')
			->groupBy(DB::raw("club_id"))
			->get();
			$countryOrgCounts= Organization::select(DB::raw("COUNT(*) as count_row"), 'country_id')
			->orderBy("created_at")
			->groupBy(DB::raw("country_id"))
			->get();
		$dataPoints = [];
		$maleCounts = [];
		$femaleCounts=[];
				 if(Auth::user()->hasRole(1)){
					$orgs=Organization::where('country_id',  Auth::user()->country_id)->get();

				 }
				 else{
					$orgs=Organization::all();

				 }
		// if(Auth::user()->hasRole(1)){

		// $males = User::select(DB::raw("COUNT(*) as count_row"), 'gender', 'organization_id')
		// 	->orderBy("created_at")
		// 	->where('country_id',  Auth::user()->country_id)
		// 	->where('organization_id', '!=', 'null')
		// 	->where('gender', 'male')
		// 	->groupBy(DB::raw("organization_id"))
		// 	->get();
		// }
		// else{
		// 	$males = User::select(DB::raw("COUNT(*) as count_row"), 'gender', 'organization_id')
		// 	->orderBy("created_at")
		// 	->where('organization_id', '!=', 'null')
		// 	->where('gender', 'male')
		// 	->groupBy(DB::raw("organization_id"))
		// 	->get();
		// }
		// if(Auth::user()->hasRole(1)){

		// 	$females = User::select(DB::raw("COUNT(*) as count_row"), 'gender', 'organization_id')
		// 	->orderBy("created_at")
		// 	->where('country_id',  Auth::user()->country_id)
		// 	->where('organization_id', '!=', 'null')
		// 	->where('gender', 'female')
		// 	->groupBy(DB::raw("organization_id"))
		// 	->get();
		// }
		// else{
		// 	$females = User::select(DB::raw("COUNT(*) as count_row"), 'gender', 'organization_id')
		// 	->orderBy("created_at")
		// 	->where('organization_id', '!=', 'null')
		// 	->where('gender', 'female')
		// 	->groupBy(DB::raw("organization_id"))
		// 	->get();
		// }
		// dd($orgs);
		foreach($orgs as $org){
			$dataPoints[] = array(
				
				$org->name,
				
			
		);
		$male=$org->users()->where('gender','male')->count();
		$maleCounts[] = array(
				
			$male
			
		
	);
	$female = $org->users()->where('gender','female')->count();
			$femaleCounts[] = array(
				
				$female
				
			
		);
		}
		
		$categories = [];
		$clubMaleCounts = [];
		$clubFemaleCounts=[];
		if(Auth::user()->hasRole(1)){

		$clubMales = User::select(DB::raw("COUNT(*) as count_row"), 'gender', 'club_id')
			->orderBy("created_at")
			->where('country_id',Auth::user()->country_id)
			->where('club_id', '!=', 'null')
			->where('gender', 'male')
			->groupBy(DB::raw("club_id"))
			->get();
		}
		else{
			$clubMales = User::select(DB::raw("COUNT(*) as count_row"), 'gender', 'club_id')
			->orderBy("created_at")
			->where('club_id', '!=', 'null')
			->where('gender', 'male')
			->groupBy(DB::raw("club_id"))
			->get();
		}
		if(Auth::user()->hasRole(1)){

			$clubFemales = User::select(DB::raw("COUNT(*) as count_row"), 'gender', 'club_id')
			->orderBy("created_at")
			->where('country_id',Auth::user()->country_id)
			->where('club_id', '!=', 'null')
			->where('gender', 'female')
			->groupBy(DB::raw("club_id"))
			->get();
		}
		else{
			$clubFemales = User::select(DB::raw("COUNT(*) as count_row"), 'gender', 'club_id')
			->orderBy("created_at")
			->where('club_id', '!=', 'null')
			->where('gender', 'female')
			->groupBy(DB::raw("club_id"))
			->get();
		}
		if(Auth::user()->hasRole(1)){
			$clubs=Club::where('country_id',Auth::user()->country_id);

		}
		else{
	$clubs=Club::all();
		}

		foreach ($clubs as $club) {
			$categories[] = array(
				
					$club->club_name,
					
				
			);
			$male=$club->users()->where('gender','male')->count();
			$clubMaleCounts[] = array(
				
				$male,
				
			
		);
		$female=$club->users()->where('gender','female')->count();

		$clubFemaleCounts[] = array(
			$female
	);
		}
		

		
		$leagues = League::where('to_date','>',Carbon::now())->get();
		if(Auth::user()->hasRole(1)){
			$organizations=Organization::where('country_id',Auth::user()->country_id)->get();
		}
		else{
			$organizations=Organization::get();

		}
		if(Auth::user()->hasRole(1)){
			$clubs=Club::where('country_id',Auth::user()->country_id)->get();
		}
		else{
			$clubs = Club::all();

		}
		$general = generalSetting::first();
		if(Auth::user()->hasRole(1)){
			$users=User::where('country_id',Auth::user()->country_id)->get();
		}
		else{
			$users = User::all();

		}
		$countries=Country::all();
		$logs = DB::table('active_users')->latest()->take(5)->get();
		$futureLeagues=League::where('to_date','>',Carbon::now())->where('from_date','>',Carbon::now())->paginate(8);
		$todayActiveUsers=null;
		 $todayActiveUsers=DB::table('day_users')->where('date',Carbon::now()->toDateString())->get();
		if(Auth::user()->hasRole(1)){
			$clubRequests=Club::where('country_id',Auth::user()->country_id)->where('is_approved',2)->get();
		}
		else{
			$clubRequests=Club::where('is_approved',2)->get();

		}
		$logs = DB::table('active_users')->latest()->take(5)->get();
		if (Auth::user()->id == 1 || Auth::user()->hasRole(1) || Auth::user()->hasRole(3)) {
			return view('admin.index3', ["futureLeagues"=>$futureLeagues,"todayActiveUsers"=>$todayActiveUsers,"clubRequests"=>$clubRequests,"categories"=>$categories,"clubMaleCounts"=>$clubMaleCounts,"clubFemaleCounts"=>$clubFemaleCounts,"countryOrgCounts"=>$countryOrgCounts,"leagues"=>$leagues,"femaleCounts"=>$femaleCounts,"maleCounts"=>$maleCounts,"dataPoints"=>$dataPoints, 'clubUserCounts' => $clubUserCounts, 'logs' => $logs, 'users' => $users, 'countries' => $countries, 'general' => $general, 'roles' => $roles, 'organizations' => $organizations, 'clubs' => $clubs, 'analytics_error' => $analytics_error, 'chart_data' => $chart_data,  'userCounts' => $userCounts, 'users' => $users,'visitors' => $visitors, 'pageVisits' => $pageVisits, 'month_visits' => $month_visits, 'year_visits' => $year_visits]);

			// else
		}
	}
}
