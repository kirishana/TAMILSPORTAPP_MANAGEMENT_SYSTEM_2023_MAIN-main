<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TeamsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\XSS;
use App\Exceptions\UnauthorizedException;
/*
|-------------------------------------------------------------user/createuser/create-------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require_once 'web_builder.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//reports
//testing
//payment
Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/{token}/reset/{email}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');
Route::post('user/password/reset', 'Auth\ForgotPasswordController@updatePassword')->name('user.password.update');
Route::post('user/password/change', 'Auth\ForgotPasswordController@changePassword');
Route::group(['controller' => 'DashboardController'], function () {
    Route::group(['middleware' => ['permission:view-iframe']], function () {
    Route::get('/out-results','results');
    Route::get('/out-results/search','search');
});
Route::get('out-frame-results/{id}','copyIframe');
});
// Route::group(['middleware' => ['twofactor']], function () {

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::get('account/verify/{id}', 'Auth\RegisterController@verify')->name('user.verify'); 
Route::get('/activity', 'ActivitylogController@showActivities');
Route::post('/activity/delete', 'ActivitylogController@delete');

// });

Route::group(['middleware' => ['XSS','auth']], function () {
    
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/track/divide', 'players\PlayerController@trackDivide');
Route::get('/event/stop/{id}', 'players\PlayerController@stopEvent');
Route::get('/event/group-results', 'Admin\reports\ClubGroupEventController@index');
Route::post('/event/group-results', 'Admin\reports\ClubGroupEventController@filter');    
Route::get('/event/group-export', 'Admin\reports\ClubGroupEventController@Pdf');    
Route::get('/event/group-excel', 'Admin\reports\ClubGroupEventController@Excel'); 

//
//event participant results
Route::group(['middleware' => ['permission:viewresults']], function () {
Route::get('/event/participantResults', 'Admin\reports\eventsParticipantsController@results');
Route::get('/event/participantResults/pdf', 'Admin\reports\eventsParticipantsController@pdf');
Route::get('/event/participantResults/excel', 'Admin\reports\eventsParticipantsController@excel');
});
Route::post('/event/participantResults/search', 'Admin\reports\eventsParticipantsController@search');
Route::post('event/participant/changeResults/{id}', 'Admin\reports\eventsParticipantsController@changeResults');

//participants
Route::get('/report/event-participants', 'Admin\reports\partcipantController@participants');
Route::post('/event-participant/search', 'Admin\reports\partcipantController@filter');
Route::get('/event-participant/export', 'Admin\reports\partcipantController@generatePDF');
//end
//judges
Route::group(['middleware' => ['permission:View-staff']], function() {
Route::get('/report/judges', 'Admin\reports\judgeReportController@judges');
Route::post('report/judges/search', 'Admin\reports\judgeReportController@filter');
Route::get('report/judges/generate', 'Admin\reports\judgeReportController@generatePdf');
Route::get('report/judges/export', 'Admin\reports\judgeReportController@excel');
Route::get('/judge-starter/sortBy', 'Admin\reports\judgeReportController@sortBy');
});
//end
//prize-lists
Route::get('/report/prize-list', 'Admin\reports\prizeReportController@prizeLists');
Route::post('/prizeGiven/{id}', 'Admin\reports\prizeReportController@prizeGiven');
Route::post('/prizeGroupGiven/{id}', 'Admin\reports\prizeReportController@prizeGroupGiven');
Route::post('report/prize-list/search', 'Admin\reports\prizeReportController@filter');
Route::get('/report/prize-list/generate', 'Admin\reports\prizeReportController@generatePdf');
Route::get('/report/prize-list/export', 'Admin\reports\prizeReportController@Excel');
//end
//starters
Route::group(['middleware' => ['auth']], function () {

Route::get('/report/starters', 'Admin\reports\starterReportController@starters');
Route::post('report/starters/search', 'Admin\reports\starterReportController@filter');
Route::get('report/starters/generate', 'Admin\reports\starterReportController@generatePdf');
Route::get('report/starters/export', 'Admin\reports\starterReportController@excel');
Route::get('/calender', 'Admin\reports\starterReportController@calender')->name('calender.index');

});
Route::get('/club_manager_form', function (request $request) {
    return redirect('club_register');
});


Route::group(['middleware' => ['auth']], function () {


//end
Route::get('/report/test', 'Admin\reports\reportsController@test');
//reports club points
Route::group(['middleware' => ['permission:view-leagues']], function() {
Route::get('/report/club-points', 'Admin\reports\reportsController@clubPoints');
Route::get('/report/club-points/search', 'Admin\reports\reportsController@clubPointsFilter');
Route::get('/report/club-points/export', 'Admin\reports\reportsController@clubPointsPdf');
Route::get('/report/club-points/excel', 'Admin\reports\reportsController@clubPointsExcel');
});
//end
//reports admin
Route::get('/report/organizations', 'Admin\reports\reportsController@organizations')->name('reports');
Route::post('/organization/search', 'Admin\reports\reportsController@filter');
Route::get('/organization/export', 'Admin\reports\reportsController@generatePDF');
Route::get('/organization/excel', 'Admin\reports\reportsController@Excel');

Route::get('/clubs', 'Admin\reports\reportsController@clubs');
Route::post('/club/search', 'Admin\reports\reportsController@filterClubs');
Route::get('/club/export', 'Admin\reports\reportsController@generateClubPdf');
Route::get('/club/excel', 'Admin\reports\reportsController@ClubExcel');

// club Members
Route::get('/report/clubMembers', 'Admin\reports\clubMembersController@index');
Route::post('/report/clubMembersfilter', 'Admin\reports\clubMembersController@filter');
Route::get('/report/clubMembers/export', 'Admin\reports\clubMembersController@generatePdf');
Route::get('/report/clubMembers/excel', 'Admin\reports\clubMembersController@Excel');

//club Teams
Route::get('/report/clubteams', 'Admin\reports\ClubteamController@index');
Route::post('/report/clubteamsfilter', 'Admin\reports\ClubteamController@filter');
Route::get('/report/clubteams/export', 'Admin\reports\ClubteamController@generatePdf'); 
Route::get('/report/clubteams/excel', 'Admin\reports\ClubteamController@Excel');


//club events
Route::get('/report/clubevents', 'Admin\reports\ClubteamController@clubevents');
Route::post('/report/clubevent/filter', 'Admin\reports\ClubteamController@eventfilter');
Route::get('/report/clubevent/export', 'Admin\reports\ClubteamController@eventgeneratePdf'); 
Route::get('/report/clubevent/excel', 'Admin\reports\ClubteamController@eventExcel');
Route::post('/report/clubIndividual/filter','Admin\reports\ClubteamController@individualeventfilter');
Route::get('/report/individualSelf/export','Admin\reports\ClubteamController@individualeventPDF');
Route::get('/report/individualSelf/excel','Admin\reports\ClubteamController@individualeventexcel');
Route::post('/report/clubIndividualclubReg/filter','Admin\reports\ClubteamController@individualeventclubRegfilter');
Route::get('/report/individualclubReg/export','Admin\reports\ClubteamController@individualeventclubRegPDF');
Route::get('/report/individualclubReg/excel','Admin\reports\ClubteamController@individualeventclubRegexcel');
Route::group(['middleware' => ['permission:view-participants']], function() {
Route::get('/participants', 'Admin\reports\reportsController@Participants');
Route::post('/participants/search', 'Admin\reports\reportsController@Participantsfilter');
Route::get('/participants/export', 'Admin\reports\reportsController@generateParticipantsPdf');
Route::get('/participants/excel', 'Admin\reports\reportsController@ParticipantsExcel');

Route::post('/group/search', 'Admin\reports\reportsController@teamsearch');
Route::get('/group/export', 'Admin\reports\reportsController@teamexport');
Route::get('/group/excel', 'Admin\reports\reportsController@teamExcel');
});
//payment request group event

Route::post('/G-paymentsearch', 'Admin\reports\reportsController@PaymentsRequestGFilter');
Route::get('/G-participants/export', 'Admin\reports\reportsController@PaymentsRequestGPdf');
Route::get('/G-participants/excel', 'Admin\reports\reportsController@G_PaymentsRequestExcel');


//payment request single event
Route::group(['middleware' => ['permission:view-request']], function () {
Route::get('/paymentsRequest', 'Admin\reports\reportsController@PaymentsRequest');
Route::post('/paymentsearch', 'Admin\reports\reportsController@PaymentsRequestFilter');
Route::get('/pay_request/export', 'Admin\reports\reportsController@PaymentsRequestPdf');
Route::get('/pay_request/excel', 'Admin\reports\reportsController@PaymentsRequestExcel');
Route::get('/transactions', 'Admin\reports\reportsController@Clubtransactions');
});
//payment request  player report
Route::get('/paymentplay', 'Admin\reports\PaymentController@index');
Route::post('/paymentplaysearch', 'Admin\reports\PaymentController@PayFilter');
Route::get('/pay_play/export', 'Admin\reports\PaymentController@PayPdf');
Route::get('/pay_play/excel', 'Admin\reports\PaymentController@PayExcel');

//payment request single event club
Route::get('/report/clubpay', 'Admin\reports\ClubPaymentController@Payments');
Route::post('/clubpaysearch', 'Admin\reports\ClubPaymentController@Filter');
Route::get('/clubpay/export', 'Admin\reports\ClubPaymentController@PaymentPdf');
Route::get('/clubpay/excel', 'Admin\reports\ClubPaymentController@PaymentExcel');

//payment request group event club
Route::post('/G-paysearch', 'Admin\reports\ClubPaymentController@GPayFilter');
Route::get('/G-pay/export', 'Admin\reports\ClubPaymentController@GPayPdf');
Route::get('/G-pay/excel', 'Admin\reports\ClubPaymentController@GPayExcel');


Route::get('/report/eventParticipants', 'Admin\reports\eventsParticipantsController@index');
Route::post('/eventParticipantsearch', 'Admin\reports\eventsParticipantsController@filter');
Route::get('/report/eventParticipantsPdf', 'Admin\reports\eventsParticipantsController@generateEventPartPDF');
Route::get('/report/eventParticipants/excel', 'Admin\reports\eventsParticipantsController@EventParticipantsExcel');

//

Route::get('/participnats/export', 'Admin\LeagueController@exportParticipants');
Route::get('league/edit-participant-event/{id}', 'Admin\LeagueController@editParticipantReg');


});


// Registration Routes...
Route::get('/club-manager', 'Auth\RegisterController@registration');
Route::get('signup_registation', 'Auth\LoginController@showLoginForm');


// club_register
Route::post('club_manager_form', 'Auth\RegisterController@register');

//eventresults
Route::get('/event/final-results', "players\PlayerController@FinalResults");
//end





//end
Route::group(['controller' => 'JoshController'], function () {
    Route::group(['prefix' => 'admin'], function () {

Route::get('/', 'showHome')->name('dashboard');
Route::get('/index2', 'showIndex2')->name('index2');
    });
});
//stripe
Route::group(['controller' => 'StripeController'], function () {

Route::get('stripe', 'stripe');
Route::post('stripe', 'stripePost')->name('stripe.post');
Route::post('stripe', 'edit')->name('stripe.edit');
Route::post('stripe/groupEvent', 'editGroupEvent')->name('stripe.editGroupEvent');
});

//club Teams by admin
Route::group(['controller' => 'TeamsController'], function () {
Route::group(['middleware' => ['permission:view-regs']], function () {
Route::get('/clubteams', 'clubTeams');
Route::put('/team/club/update/{id}', 'updateTeam');
Route::get('/clubteams/{id}', 'filter');
});
// Route::get('/report/clubteams/export', 'generatePdf'); 
// Route::get('/report/clubteams/excel', 'Excel');

Route::get("/teams/create", "create");
Route::post("/team/store", "store");
Route::get("/teams", "index")->middleware('permission:View-team');
Route::get("/teams/pagination", "pagination");
Route::get("/team/edit/{id}", "edit");
Route::delete("/team/delete/{id}", "delete");
Route::post('team/{id}/update', 'update');
Route::post('ageGroup/{id}', 'ageGroup');
Route::post('gender/{id}', 'gender');
});
//dashboard
Route::group(['middleware' => ['auth']], function() {
Route::group(['controller' => 'DashboardController'], function () {
Route::get('/dashboard/{id}', 'dashboard')->name('systemDashboard');
Route::get('/Pagination', 'Pagination');
Route::post('/league/chart/{id}', 'leagueSearch');
Route::get('/league/club-points/{id}', 'clubPoints');
Route::post('/singleEvent/chart', 'singleEvent');
Route::post('/singleEventPlace/HighChart/{id}', 'singleEventPlace');
Route::post('/GroupEvent/prize', 'GEvent');
Route::post('/GroupEvent/chart', 'GroupEvent');
Route::post('/singleEvent/prize', 'prize');
Route::post('/league/singleEvent/{id}', 'leagueSingleEvent');
Route::post('/league/groupEvent/{id}', 'leagueGroupEvent');
});
});
//end
Route::group(['middleware' => ['auth']], function() {
    Route::group(['controller' => 'Auth\ClubController'], function () {

Route::get('club/points/{id}', 'points'); 
Route::post('/club/update/{id}', 'update');
Route::group(['middleware' => ['permission:View-Club']], function() {
Route::get('/all-clubs', 'index');
Route::get('/club-print', 'print');
Route::get('/club-pdf', 'pdf');
Route::get('/clubexcel', 'excel');
});

Route::get('/club/show', 'show');
Route::get('/club_registration', 'Create');
Route::get('/club_register', 'clubCreateOut');
Route::post('/club_register/store', 'club_register');
Route::post('/create/club-member', 'club_register');
Route::get('/club/edit/{id}', 'edit')->name('clubs.edit');
Route::get('/club/create', 'clubCreate')->middleware('permission:Create-Club');
Route::post('/club/store', 'club_register2');
Route::get('/club', 'club');
Route::post('/new-club/approve/{id}', 'approve')->name('club.approve');
Route::post('/new-club/decline/{id}', 'decline')->name('club.decline');
Route::get('/club/settings', 'settings');
Route::post('/club/settings/{id}', 'generalSettings');
Route::get('club/data', 'data')->name('club.data');
});
});
//end
//EventController
Route::group(['controller' => 'Admin\EventController'], function () {
    Route::get('/marathon', 'marathon')->middleware('permission:view-marathon');
Route::get('/league/clubs/{id}', 'leagueClubs');
Route::get('/gender/registration/{id}', 'genderRegistration');
Route::get('/view_notification/event/{id}', 'viewEventNotification');


Route::get('/events/showall', 'showall');
Route::get('/event/show', 'showEvent');
Route::get('/event/group/show', 'showGroupEvent');
Route::get("/event/{id}/edit", "editEvent");
Route::get("/event/admin/{id}/edit", "editParticipantEvent");

Route::get("/event/{id}/edit/{userId}", "editChildrenEvent");
Route::get("/event/member/{id}/edit/{userId}", "editMemberEvent");

Route::get('events/data', 'data')->name('organizations.data');
Route::get('/events', 'index')->name('events');
Route::group(['middleware' => ['permission:view-cancellation']], function() {
Route::get('event/cancel', 'eventCancellation');
Route::get('/all-events/cancel/export', 'eventCancelPdfGenerate');
Route::get('/all-events/cancel/excel', 'eventCancelExcel');
});
Route::get('/eventCancel/sortBy', 'eventCancelSortBy');

Route::get('/events/{id}', 'childrenEvents');
Route::get('/member/events/{id}', 'clubMemberEvents');
Route::get('/org-member/events/{id}', 'orgMemberEvents');

Route::get('/event/edit/{id}', 'edit');
Route::get('/event/view/{id}', 'show')->name('organization.view');
Route::get('/event/settings', 'settings');
Route::post('/leagues/{id}', 'getEvents');
Route::get('/report/events', 'events');
Route::post('/event/search', 'filter');
Route::get('/event/export', 'generateEventPDF');
Route::get('/event/excel', 'excel');
Route::get('/user-list/search', 'UserListSearch');
Route::get('/event-list/search', 'EventListSearch');
Route::get('pdf/participants', 'participantLists')->name('pdf.participants');
   

Route::get('/league/{leagueid}/main-event/{id}', 'events');
Route::post('/event/add/{id}', 'changeOwnership');
Route::post('/event/assign/{id}', 'assign');
Route::post('/event/assign/starter/{id}', 'assignStarter');
Route::post('/event/assign/time/{id}', 'assignTime');
Route::post('/event/assign/prize/{id}', 'prizeGiven');
Route::post('/event/cancel', 'eventCancel');

Route::get('/final-participants-heats', 'finalParticipantHeats');
Route::group(['middleware' => ['permission:viewevent']], function() {
Route::get('/all', 'allEvents');
Route::get('/event-list/export', 'PDFEventGenerate');
Route::get('/event-list/excel', 'AllEventListExcel');
Route::get('/pdf/generate', 'generatePDF')->name('pdf.generate');
Route::get('/participants/{id}/export', 'participantsExport');
Route::get('/participant/export', 'participantAll');
});
Route::get('/league/events/showall/{id}', 'showleagueEvents');
Route::get('/league/events/{id}', 'leagueEvents');
Route::post('/search', 'search');
Route::get('/event/sortBy', 'sortByEvent');

Route::get('/participants/{id}', 'participants');
Route::get('/participants/final/{id}', 'finalParticipants');
Route::post('/starter-event/search', 'starterEventFilter');


Route::post('/event-cancel/search', 'eventCancelSearch');
Route::post('/event/cancel/starter/{id}', 'eventCancelStarter');

//end
Route::get('/sort-listed-participants/{id}', 'sortListedParticipants');
Route::get('/event/genders/edit/{id}', 'ageGenders');


Route::post('/events/{id}', 'getEvent');
Route::get('/event/genders/rules/{id}', 'getRule');
Route::get('/all-events/export', 'PDFGenerate');
Route::get('/all-events/excel', 'AllEventExcel');


});
//event
Route::get('/event/create', 'Admin\EventController@create')->middleware('permission:Create-event');
Route::post('/event/store', 'Admin\EventController@store')->name('event.store');

Route::get('/events/delete/{id}', 'Admin\LeagueController@deleteEvent');
//end


//payment
Route::group(['controller' => 'Admin\PaymentController'], function () {
    Route::get('/event-approvals', 'eventApporovals');
Route::post('event/approve/{id}', 'approve');
Route::post('event/decline/{id}', 'decline');
Route::post('/event/next', 'paymenthMethod');
Route::post('/event/next/edit', 'editPaymenthMethod');
Route::post('/event/payment/{id}/register', 'create');
Route::post('/event/member/payment/{id}/register', 'createClubMemberInvoice');
Route::post('/event/payment/{id}', 'createInvoice');
Route::post('/event/member/payment', 'create');
});
//end

Route::get('users/create', 'Admin\UsersController@create')->middleware('permission:Create-user');
Route::get('users/{id}', 'Admin\UsersController@show')->name('users.show');

Route::patch('/users/update/{id}', 'Admin\UsersController@update')->name('users.update');

Route::group(['controller' => 'Admin\UsersController'], function () {
    
Route::post('/two-factor/enable/{id}', 'twoFactorEnable');
Route::group(['middleware' => ['permission:View-user']], function() {
Route::get('/users','index');
Route::get('/org/user-list/export', 'org_generatUserListePDF');
Route::get('/org/user-list/print', 'org_UserPrint');
Route::get('/org/user-list/excel', 'org_Excel');
});
Route::get('/countriess/{id}', 'countryforsignup');
Route::post('/import_excel/import', 'import');
Route::get('/export_excel/export', 'export');
Route::get('user/import', 'importUsers');
Route::group(['middleware' => ['permission:View-user']], function() {
Route::get('/user-lists', 'userLists');
Route::get('/user-list/export', 'generatUserListePDF');
Route::get('/user-list/excel', 'UserListExcel');
});
Route::get('/user-listsfil', 'fil');
Route::get('/user-lists/data', 'userListData')->name('userLists.data');
Route::get('/user/edit/{id}', 'edit');
Route::delete('/user/delete/{id}', 'delete');
Route::get('/users/edit/{id}', 'edit2')->name('user.edit');
Route::post('/new-user/decline/{id}', 'decline');
Route::post('/new-user/decline/organization/{id}', 'declineOrgMember');
Route::post('/new-user/approve/organization/{id}', 'approveOrgMember');
Route::post('/new-user/org/decline/{id}', 'declineOrgUser');
Route::post('/new-user/org/approve/{id}', 'approveOrgUser');
Route::post('/new-user/org-staff/decline/{id}', 'declineOrgstaff');
Route::post('/new-user/org-staff/approve/{id}', 'approveOrgstaff');
Route::post('/new-staff/org/decline/{id}', 'declineOrgUser');
Route::post('/new-staff/org/approve/{id}', 'approveOrgUser');
Route::post('/new-user/approve/{id}', 'approve');
Route::post('/countries/{id}', 'country');
Route::post('/report/{id}', 'addReport');
Route::post('/report/edit/{id}', 'editReport');
Route::get('/user-reports/{id}', 'fetchReports');
Route::get('/user-report/edit/{id}', 'editReport');
Route::get('/user-report/{id}', 'fetchReports2');
Route::get('/download/{id}', 'downloadReport');
Route::get('/members/create', 'memberCreate');
Route::get('/family-member/age-restrict', 'memberAgeRestrict');
Route::post('/member/store', 'memberStore');
Route::get('/members', 'members');
Route::get('/members/edit/{id}', 'memberEdit');
Route::patch('/members/update/{id}', 'memberUpdate')->name('members.update');
Route::group(['middleware' => ['permission:View-user']], function() {
Route::get('/report/users', 'users');
Route::get('/user/excel', 'excel');
Route::get('/user/export', 'generatePDF');
});
Route::post('/user/search', 'filter');
Route::get('/user-list/print', 'generatUserListPrint');
Route::get('/user-list/user-search', 'UserListSearch');
Route::get('/org/staff-search', 'org_StaffListSearch');
Route::get('/organizations/create_org_member', 'org_member_Create')->middleware('permission:Create-org-member');
Route::get('/organizations/create_org_staff', 'org_staff_Create');
Route::post('/organization/memberStore', 'member_store');
Route::post('/organization/staff_Store', 'staff_store');
Route::get('/add/club_member', 'clubmemberCreate');
Route::post('/store/club-member', 'Club_member_store');
Route::group(['middleware' => ['permission:View-staff']], function() {
Route::get('/organization-staffs', 'org_staff');
Route::get('/export/staffId', 'exportStaffId');
Route::get('/org/staff-list/export', 'org_generat_staffListePDF');
Route::get('/org/staff-list/excel', 'org_staff_Excel');
Route::get('org/user/create', 'create3');
});
Route::get('/staff/sortBy', 'sortByStaff');
Route::get('/staffs', 'orgStaffs');

Route::get('/org-staff-print', 'org_staffprint');
Route::post('user/store', 'store');
Route::post('user/userStore', 'userStore');
Route::post('/organization/staff/store', 'staff_store');
Route::get('/clubname/{id}', 'clubname');
Route::patch('/user/update/member-ship','updateMembership');
Route::get('user/create', 'create2');
Route::get('/imports', 'imports')->middleware('permission:import-users');
Route::get('/user/imports', 'imports')->middleware('permission:import-member');

Route::get('user/{id}', 'show2')->name('user.show');

Route::get('user/view/{id}', 'viewUser');
Route::get('data', 'data')->name('users.data');
Route::get('clubs/data', 'clubData')->name('clubs.data');
Route::get('staff_data', 'staff_data');
Route::group(['middleware' => ['permission:View-org-member|import-member']], function() {
Route::get('org_member_data', 'org_member_data');
Route::get('/org_member_pdf', 'org_member_Pdf');
Route::get('/org_member_excel', 'User_mem_Excel');
});
Route::get('/org_member_print', 'org_member_Print');
});

//org controller
Route::get('/organization/news-letter', 'OrganizationController@newsLetter');
Route::post('/organization/news-letter/store', 'OrganizationController@newsLetterStore');


    Route::get('/organizations/payment-methods', 'OrganizationController@paymentMethods')->middleware('permission:ViewSettings');
    Route::post('/organization/bank-transfer', 'OrganizationController@bankTransfer');
    Route::post('/organization/bank-transfer/update/{bankId}', 'OrganizationController@bankTransferUpdate');
    Route::post('/organization/vi', 'OrganizationController@vipps');
    Route::post('/organization/vi/update/{id}', 'OrganizationController@vippsUpdate');
    Route::post('/organization/stripe', 'OrganizationController@stripe');
    Route::post('/organization/stripe/update/{id}', 'OrganizationController@stripeUpdate');
    Route::post('/organization/qrPayment', 'OrganizationController@qrPayment');
    Route::post('/organization/qrPayment/update/{vipsId}', 'OrganizationController@qrPaymentUpdate');
    Route::post('/organization/active-payment-methods', 'OrganizationController@activeMethods');
    Route::post('/organization/{id}', 'OrganizationController@org');
    Route::post('/user-role/change/{id}', 'OrganizationController@role_change');
    Route::post('/role/change/{id}', 'OrganizationController@change');
    Route::get('organizations/data', 'OrganizationController@data')->name('organizations.data');
    Route::get('/organizations/edit/{id}', 'OrganizationController@edit')->name('organizations.edit')->middleware('permission:Edit-Organization');
    Route::post('/organization/update-org/{id}', 'OrganizationController@update')->name('organizations.update');
    Route::post('/league/group-events/{id}', 'OrganizationController@futureLeagueEvents');
    
    Route::get('/organizations/view/{id}', 'OrganizationController@show')->name('organization.view')->middleware('permission:View-Organization');
    Route::get('/organizations/settings', 'OrganizationController@settings')->middleware('permission:ViewSettings');
    Route::get('/organization/email-settings', 'OrganizationController@emailSettings')->middleware('permission:ViewSettings');
    Route::get('/organization/sms-settings',  'OrganizationController@smsSettings')->middleware('permission:ViewSettings');
    Route::delete('/organizations/delete/{id}', 'OrganizationController@remove');
    Route::post('/organizations/ownership/{id}', 'OrganizationController@changeOwnership');
    Route::post('/organizations/archive/{id}', 'OrganizationController@archive');
    Route::post('/organizations/revert/{id}', 'OrganizationController@revert');
    Route::get('/organizations/data/archived', 'OrganizationController@archivedData');
    Route::get('/organizations/archived', 'OrganizationController@archived');
    Route::get('/organizations', 'OrganizationController@index');
    Route::get('/organization/create', 'OrganizationController@create');
    Route::post('/organizations/store', 'OrganizationController@store')->name('organizations.store');
    Route::get('/organizationsprint', 'OrganizationController@print');
    Route::get('/organizationsprint-arch', 'OrganizationController@archivedprint');
    Route::get('/organizationspdf', 'OrganizationController@pdf');
    Route::get('/organizations-arch-pdf', 'OrganizationController@arch_pdf');
    Route::get('/organizationsExcel', 'OrganizationController@org_excel');
    Route::get('/Arch-organizationsExcel', 'OrganizationController@Arch_org_excel');
    Route::post('/org/future-leagues/{id}', 'OrganizationController@futureLeagues');
    Route::get('/organizations/create', 'OrganizationController@create');
    Route::post('/organizations/store', 'OrganizationController@store');
    
//end

//notifications
Route::group(['middleware' => ['auth']], function () {
Route::get('/msg', 'MsgController@create')->name('create-notification');
Route::post('/msg', 'MsgController@store');
Route::get('/msg-show', 'MsgController@show');
Route::get('/show_notification', 'MsgController@index')->name('show-notification');
Route::get('/view_notification/{id}', 'MsgController@view');
Route::Post('/notification/delete', 'MsgController@Delete');
});



Route::get('/club_login', function () {
    return view('auth.club_login');
});

Route::get('/club', function () {
    return view('clubs.create');
});



Route::group(['middleware' => ['auth']], function () {
Route::group(['middleware' => ['permission:View-events']], function() {
Route::get('/club-members', 'Admin\reports\PaginationController@index');
Route::get('/club-members-print', 'Admin\reports\PaginationController@print');
Route::get('/club-members/export', 'Admin\reports\PaginationController@pdf');
Route::get('/club-members/excel', 'Admin\reports\PaginationController@excel');
});
});


// org_staff
Route::group(['middleware' => ['auth']], function () {
Route::get('/organizan-members', function () {
    return view('organizations.show_org_members');
});
Route::get('/org_test', function () {
    return view('organizations.test');
});
});





// Route::post('user/password/reset', 'Auth\ForgotPasswordController@updatePassword')->name('user.password.update');

// route('clubs.edit',$club->id



//manage-club
// Route::group(['middleware' => ['auth']], function () {

Route::get('/manage-club', 'players\ManageClubController@manageClub');
Route::get('/manage-club/create', 'players\ManageClubController@create');
Route::post('/manage-club/store', 'players\ManageClubController@store');
//end
//club-requests
Route::get('/club-requests', 'players\ManageClubController@clubRequests');
Route::post('/club-request/approve', 'players\ManageClubController@approveClubRequest');
Route::post('/club-request/decline', 'players\ManageClubController@declineClubRequest');

//end
//clubadmin invoicess
Route::get('/report/league/invoices', 'Admin\reports\invoiceController@invoices');
Route::get('/report/league/invoice/search', 'Admin\reports\invoiceController@filter');
Route::get('/report/{league}/invoice/{id}', 'Admin\reports\invoiceController@viewInvoice');
Route::get('/report/{league}/invoice/{id}/download', 'Admin\reports\invoiceController@downloadInvoice');

Route::get('/report/{league}/group-invoice/{invNo}', 'Admin\reports\invoiceController@viewGroupRegInvoice');
Route::get('/report/{league}/group-invoice/download/{invNo}', 'Admin\reports\invoiceController@downloadGroupRegInvoice');

//end
//language
Route::get('lang/home', 'LangController@index');
Route::get('lang/change', 'LangController@change')->name('changeLang');
//end
Route::post('/organization/atheletic/{id}', 'Admin\AthleticSettingsController@athletic');
# Error pages should be shown without requiring login
Route::get('404', function () {
    return view('admin/404');
});
Route::get('500', function () {
    return view('admin/500');
});
//groupeventregorg admin
//
//participants
Route::group(['middleware' => ['permission:view-participants']], function() {
Route::get('league/participants', 'Admin\LeagueController@participantByAgeGroup');
Route::post('league/participants/search', 'Admin\LeagueController@participantsSearch');
Route::get('league/participants/export', 'Admin\LeagueController@PDFParticipantGenerate');
Route::get('league/participants/pdf', 'Admin\LeagueController@ParticipantGeneratePdf');
Route::get('league/participants/excel', 'Admin\LeagueController@ParticipantGenerateExcel');
Route::get('league/participants/sortBy', 'Admin\LeagueController@sortByParticipant');
});
//end
//champions list
//users
Route::group(['middleware' => ['permission:view-leagues']], function() {
Route::get('/report/champions', 'Admin\LeagueController@championLists');
Route::get('/champion/search', 'Admin\LeagueController@filter');
Route::get('/champion/export', 'Admin\LeagueController@generatePdf');
Route::get('/champion/excel', 'Admin\LeagueController@Excel');
});
//
//particpants list
//users


Route::Post('/dependentDrop/{id}', 'Admin\LeagueController@dependentDrop');


//
//event list search
//users


//end
//orgadmin reports
//users

//results

Route::get('/results/export',  'players\PlayerController@generatePDF');
Route::get('/results/excel', 'players\PlayerController@Excel');
//
//settings
Route::group(['prefix' => 'admin'], function () {
    Route::get('/general-setting', 'settings\GeneralSettingsController@create');
    // Route::post('general-setting/store', 'settings\GeneralSettingsController@store');
    Route::post('general-setting/update/{id}', 'settings\GeneralSettingsController@update');
    Route::get('settings', 'settings\GeneralSettingsController@index');
    // Route::get('general-setting/edit/{id}', 'settings\GeneralSettingsController@edit');

});
//end

//roles
Route::group(['prefix' => 'admin'], function () {
    Route::group(['controller' => 'Admin\RolesController'], function () {

    Route::get('/roles/all', 'index');
    Route::get('/roles', 'role');
    Route::get('/roles/edit/{id}', 'edit')->name('roles.edit');
    Route::post('/roles/update/{id}', 'update');
    Route::post('/roles/create', 'store');
    Route::post('/roles/activate', 'activate');
    Route::post('/roles/deactivate', 'deactivate');



    Route::get('permission/{id}', 'permission')->name('roles.permission');
    Route::post('permission-store/{id}', 'permissionStore')->name('roles.permit');
});
});
//roles
Route::group(['prefix' => 'admin'], function () {
    Route::get('/countries/all', 'Admin\CountryController@index');
    Route::get('/countries', 'Admin\CountryController@country')->name('countries');
    Route::get('/country/edit/{id}', 'Admin\CountryController@edit')->name('roles.edit');
    Route::post('/country/membership/{id}', 'Admin\CountryController@changeOwnership');
    Route::post('/country/create', 'Admin\CountryController@store');
    Route::post('/country/delete', 'Admin\CountryController@destroy');
});
//end
// PartOverview
Route::group(['middleware' => ['permission:view-participants']], function() {
Route::get('/participantsOverview', 'Admin\reports\reportsController@ParticipantsOverview');
Route::post('/partOverview/search', 'Admin\reports\reportsController@ParticipantsOverviewSearch');
Route::get('/partOverview/excel', 'Admin\reports\reportsController@ParticipantsOverviewexcel');
// PartOverview
Route::get('/participantsRegOverview', 'Admin\reports\ParticipantsOverviewController@ParticipantsRegOverview');
Route::post('/partRegOverview/search', 'Admin\reports\ParticipantsOverviewController@ParticipantsRegOverviewSearch');
Route::get('/partRegOverview/excel', 'Admin\reports\ParticipantsOverviewController@ParticipantsRegOverviewexcel');
});
// //seasons
Route::group(['prefix' => 'admin'], function () {
    Route::get('/season/edit/{id}', 'Admin\SeasonController@edit')->name('season.edit');
    Route::get('/season/all', 'Admin\SeasonController@index');
    Route::get('/seasons', 'Admin\SeasonController@season');
    Route::post('/season/update/{id}', 'Admin\SeasonController@update');
    Route::post('/season/create', 'Admin\SeasonController@store');
    Route::post('/season/activate', 'Admin\SeasonController@activate');
    Route::post('/season/deactivate', 'Admin\SeasonController@deactivate');
    Route::post('/season/delete', 'Admin\SeasonController@delete');
});
//end
//age group
Route::group(['prefix' => 'admin'], function () {
    Route::get('/age-group/edit/{id}', 'Admin\AgeGroupController@edit');
    Route::get('/all', 'Admin\AgeGroupController@index');
    Route::get('/age-groups', 'Admin\AgeGroupController@agegroup');
    Route::post('/age-group/update/{id}', 'Admin\AgeGroupController@update');
    Route::post('/age-group/create', 'Admin\AgeGroupController@store');
    Route::post('/age-group/activate', 'Admin\AgeGroupController@activate');
    Route::post('/age-group/deactivate', 'Admin\AgeGroupController@deactivate');
    Route::post('/age-group/delete', 'Admin\AgeGroupController@delete');
    Route::get('/age-group/search', 'Admin\AgeGroupController@search');

});
//end

//main event
Route::get('/main-event/edit/{id}', 'Admin\MainEventController@edit');
Route::get('main-events/all', 'Admin\MainEventController@index');
Route::get('/main-events', 'Admin\MainEventController@agegroup');
Route::post('/main-event/update/{id}', 'Admin\MainEventController@update');
Route::post('/main-event/create', 'Admin\MainEventController@store');
Route::get('/main-event/search', 'Admin\MainEventController@search');

// Route::post('/age-group/activate', 'Admin\AgeGroupController@activate');
// Route::post('/age-group/deactivate', 'Admin\AgeGroupController@deactivate');
//end
//sample
Route::get('/sample', 'Admin\AuthController@sample');
Route::get('/table', 'Admin\AuthController@table');
//end


//player
Route::group(['middleware' => ['auth']], function () {

Route::post('/event/participated-players', 'players\PlayerController@store');
Route::post('/event/group-participated-players', 'players\PlayerController@groupEventStore');

Route::get('/players/{id}/{eventId}', 'players\PlayerController@players');
Route::get('/gender/{id}', 'players\PlayerController@eventStatus');
Route::get('/participants/ongoing/{id}', 'players\PlayerController@ongoingParticipants');
Route::get('/participants/lateComers/{id}', 'players\PlayerController@lateComers');
Route::get('/add/registration/{id}', 'players\PlayerController@playerReg');

Route::post('/event/finalParticipants', 'players\PlayerController@finalParticipants');
Route::get('/final/players', 'players\PlayerController@finalLists');


Route::post('/event/finish/time/{id}', 'players\PlayerController@finishEventTime');
Route::post('/event/finish/rank/{id}', 'players\PlayerController@finishEventRank');

Route::post('/event/heats/finish/{id}', 'players\PlayerController@finishHeatEvent');
Route::post('/event/heats/finish/rank/{id}', 'players\PlayerController@finishHeatEventRank');
Route::post('/event/heats/finish/time/{id}', 'players\PlayerController@finishHeatEventTime');

Route::post('/results/{id}', 'players\PlayerController@eventResults');
Route::get('/results', 'players\PlayerController@Results');
Route::get('/event/results/{id}', 'players\PlayerController@eventFinalResults');
Route::get('/results/search', 'players\PlayerController@search');
Route::get('/track/heats', 'players\PlayerController@heatstrackDivide');
Route::get('/track/heats/starter', 'players\PlayerController@heatstrackDivideStarter');
Route::get('/track/heats/{id}', 'players\PlayerController@heatstrackDivideFinal');
Route::get('/gender-user/{id}', 'players\PlayerController@confirmation');

Route::post('/event/field-event/finish/{id}', 'players\PlayerController@fieldEventFirstRound');
Route::post('/event/field-event/finish/second/{id}', 'players\PlayerController@fieldEventSecondRound');
Route::post('/event/field-event/finish/third/{id}', 'players\PlayerController@fieldEventThirdRound');
Route::get("/field-event/results", "players\PlayerController@fieldEventResults");
Route::get('/final/participants', 'players\PlayerController@lastParticipants');
});
//end

Route::get('/report/participants', 'players\PlayerController@participants');
Route::post('/participant/search', 'players\PlayerController@filter');

Route::post('/unread', 'Admin\NotificationController@unread')->name('unread');
Route::get('/new-notify/{id}', 'Admin\NotificationController@show');
//members
Route::group(['middleware' => ['auth']], function () {

Route::get('/members/pay', 'Admin\RegistrationController@payment');
Route::post('/transaction/update', 'Admin\RegistrationController@update');
// Route::get('/invoice/{id}/{orgId}', 'Admin\RegistrationController@invoice');
Route::get('/invoice/{orgId}/{id}/past', 'Admin\RegistrationController@pastInvoice');
Route::get('/pay/{id}/{regId}', 'Admin\RegistrationController@pay');
Route::group(['middleware' => ['permission:view-request']], function () {
Route::get('/payment-requests', 'Admin\RegistrationController@index');
Route::get('/payment-requests/pdf', 'Admin\RegistrationController@pdf');
Route::get('/G-pay_request/pdf', 'Admin\RegistrationController@GroupEventPdf');
Route::get('/G-pay_request/print', 'Admin\RegistrationController@GroupEventPrint');
Route::get('/G-pay_request/excel', 'Admin\RegistrationController@GroupEvReqExcel');
Route::get('/payment_req_excel', 'Admin\RegistrationController@SingleEvReqExcel');
Route::get('/payment-requests/print', 'Admin\RegistrationController@singlePrint');
});
Route::get('members/data', 'Admin\RegistrationController@data');
Route::get('group-events/data', 'Admin\RegistrationController@groupEventData');
});
Route::get('/event/delete-register/{id}', 'Admin\RegistrationController@delete');

//end


//Organization
// Route::group(['middleware' => ['auth']], function () {


// --------------------
//-------------------role/cha--
// });
//end

//athletic settings
Route::group(['middleware' => ['auth']], function () {

Route::get('/organization/atheletic-settings', 'Admin\AthleticSettingsController@edit')->middleware('permission:ViewSettings');


Route::post('athletic-setting/store', 'Admin\AthleticSettingsController@store');
Route::put('athletic-setting/{id}/update', 'Admin\AthleticSettingsController@update');
//end
//email verify setting

Route::post('/organization/email-verify-setting/store', 'emailVerificationSettingsController@store');
Route::post('/organization/email-verify-setting/update/{id}', 'emailVerificationSettingsController@update');
Route::post('/organization/email-verify-setting/reset-pw-update/{id}', 'emailVerificationSettingsController@resetPwUpdate');


//end
//end
//org onchange

//end

//event register


Route::post('/event/register', 'Admin\RegistrationController@store');
Route::post('/event/register/not-pay', 'Admin\RegistrationController@storeNotPay');
Route::post('/event/register/participant/edit', 'Admin\RegistrationController@editParticipant');


Route::post('/event/register/member/not-pay', 'Admin\RegistrationController@storeMemberNotPay');

Route::post('event/register/child-pay', 'Admin\RegistrationController@childPay');



//end
//venue

Route::get('venues/data', 'Admin\VenueController@data');
Route::get('/venues/print', 'Admin\VenueController@print');
Route::get('/venues/pdf', 'Admin\VenueController@pdf');
Route::get('venues/excel', 'Admin\VenueController@excel');
Route::get('/venues/edit/{id}', 'Admin\VenueController@edit')->name('venue.edit');

Route::delete('/venues/delete/{id}', 'Admin\VenueController@remove');
Route::get('/venues/create', 'Admin\VenueController@create')->middleware('permission:Create-Venue');
Route::post('/venues/store', 'Admin\VenueController@store')->name('venues.store');
Route::get('/venues', 'Admin\VenueController@index')->middleware('permission:View-venue');
Route::get('/venues/edit/{id}', 'Admin\VenueController@edit')->name('venue.edit')->middleware('permission:Edit-venue');
Route::put('/venues/update/{id}', 'Admin\VenueController@update')->name('venues.update');

//end

//new user notify

//end notify
//payment verify
Route::post('new-payment/decline', 'Admin\NotificationController@decline')->name('payment.decline');
Route::post('/unread', 'Admin\NotificationController@unread')->name('unread');
Route::post('new-payment/approve', 'Admin\NotificationController@approve')->name('payment.approve');
//
//leagues
//end
Route::get('leagues/data', 'Admin\LeagueController@data')->name('organizations.data');
Route::get('future-leagues/data', 'Admin\LeagueController@futureData');
Route::get('/leagues/edit/{id}', 'Admin\LeagueController@edit');
Route::get('/leagues/settings', 'Admin\LeagueController@settings');
Route::get('/leagues/view/{id}', 'Admin\LeagueController@events')->name('league.events.view');
Route::get('/leagues/participants/{id}', 'Admin\LeagueController@participants')->name('league.participants');
Route::get('/leagues/participants/registrations/{id}', 'Admin\LeagueController@participantRegs');
Route::get('/leagues/Postponed/{id}', 'Admin\LeagueController@Postponeddata');
Route::post('/postponed/sendMail', 'Admin\LeagueController@PostponedSendMail');
Route::post('/mail/{id}', 'Admin\LeagueController@Mail');
Route::post('/mailDeleteLeague/{id}', 'Admin\LeagueController@MailLeagueDelete');
Route::post('/leagues/cancel/{id}', 'Admin\LeagueController@CancellLeague');

Route::get('/league/edit/event/{id}', 'Admin\LeagueController@editEvent');
Route::get('/league/edit/event/date/{id}', 'Admin\LeagueController@editEventDate');

Route::put('/event/update/{id}', 'Admin\LeagueController@updateEvent');
Route::put('/event/update/date/{id}', 'Admin\LeagueController@updateEventDate');

Route::post('/event/delete/{id}', 'Admin\LeagueController@deleteEvent');
Route::get('/league/champion/{id}', 'Admin\LeagueController@champions')->name('league.champion');


//leagues
    Route::get('/leagues/create', 'Admin\LeagueController@create')->middleware('permission:Create-league');
    Route::post('/league/store', 'Admin\LeagueController@store')->name('leagues.store');
    Route::get('/leagues', 'Admin\LeagueController@index')->middleware('permission:view-leagues');
    Route::get('/leagues/edit/{id}', 'Admin\LeagueController@edit')->name('leagues.edit')->middleware('permission:Edit-league');
    Route::put('/leagues/update/{id}', 'Admin\LeagueController@update')->name('leagues.update');
    Route::delete('/leagues/delete/{id}', 'Admin\LeagueController@remove');
//end


Route::get('/leaguespdf', 'Admin\LeagueController@leaguepdf');
Route::get('/futureleaguespdf', 'Admin\LeagueController@futureleaguepdf');
Route::get('/futureleagueexcel', 'Admin\LeagueController@futureleagueexcel');
Route::get('/leaguesprint', 'Admin\LeagueController@print');
Route::get('/leaguesFutureprint', 'Admin\LeagueController@Futureprint');
Route::get('/leaguesexcel', 'Admin\LeagueController@leagueexcel');

//end
Route::post('/prefix', 'OrganizationController@OrgPrefix');





//grp event
Route::post('/group-event/invoice', 'GroupEventController@generateInvoice');
Route::get('/group-event/pay', 'GroupEventController@pay');
Route::post('/group-event/register', 'GroupEventController@register');
Route::post('/group-event/edit', 'GroupEventController@editGroupEvent');

Route::post('/VippsPay', 'GroupEventController@VippsPay');

Route::post('group-event/approve', 'GroupEventController@approve')->name('group.approve');
Route::post('group-event/decline', 'GroupEventController@decline')->name('group.decline');
Route::get('group-event/payment', 'GroupEventController@payment');
Route::get('/invoice/future/group/{id}', 'GroupEventController@futureInvoice');
Route::get('/future-invoice', 'GroupEventController@redirectInvoice');
Route::get('info/single-events/{id}', 'GroupEventController@individualEvent');
Route::get('next/payment', 'GroupEventController@payBill');

//club transactions individual
Route::post('/clubpayView', 'Admin\reports\reportsController@payview');
Route::post('/clubTrans/search', 'Admin\reports\reportsController@clubTrans');
Route::get('/brief-invoice', 'Admin\reports\reportsController@brief_invoice');
Route::get('/clubTransExport', 'Admin\reports\reportsController@clubTransExport');
Route::get('/clubTransExcel', 'Admin\reports\reportsController@clubTransExcel');
Route::get('/Brief/export', 'Admin\reports\reportsController@BriefExport');
Route::get('/Brief/excel', 'Admin\reports\reportsController@BriefExcel');
//club transactions group
Route::post('/clubTransGroup/search', 'Admin\reports\reportsController@clubTransGroup');
Route::get('/BriefGroup/export', 'Admin\reports\reportsController@BriefExportGroup');
Route::get('/BriefGroup/excel', 'Admin\reports\reportsController@clubTransExcelGroup');

Route::get('/group-event/edit/{id}', 'GroupEventController@editEvent');
Route::get('/group-event/delete-register/{id}', 'GroupEventController@delete');

// Route::get('/event/pay/bulk','GroupEventController@payBulk');
Route::post('/single-event-payment/edit', 'GroupEventController@editSingleEventPayment');
});
});

//end

?>