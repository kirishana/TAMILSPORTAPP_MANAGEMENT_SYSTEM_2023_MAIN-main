<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\JoshController;
use App\Http\Requests\UserRequest;
use App\User;
use App\Models\MessageRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use Validator;
Use App\Mail\Restore;
Use App\Models\Organization;
use Auth;
use App\Notifications\Adminmessage;
use App\Models\Message;
use Illuminate\Database\Eloquent\softDeletes;
use Spatie\Permission\Models\Role;
use DB;
use App\generalSetting;
use Illuminate\Support\Facades\DB as FacadesDB;

class MsgController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $user->unreadNotifications->where('type','App\Notifications\Adminmessage')->where('read_at','')->pluck('data');
        $user->readNotifications->where('type','App\Notifications\Adminmessage')->where('read_at','not null')->pluck('data');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
        $roles=Role::whereNotIn('name',[Auth::user()->roles()->pluck('name')])->get(); 
        $organizations=Organization::all();  
        $general=generalSetting::where('id',1)->first();
        return view('admin.message.msgnotification',compact('roles','organizations','general'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $message=Message::all();
        $roles=Role::all();  
        $organizations=Organization::all();
        $users=User::all();
        $validator = Validator::make(
        $request->all(), [
            'content_title'     => 'required',
            'content'           => 'required',
            'role_id'           => 'required',
            
        ],
        [
            'content_title.required' => 'Title is Required',
            'content.required'           => 'Information is Required',
            'role_id.required'    => 'atleast select one usergroup',
        ]
       
        );
        
        if ($validator->fails()) {
            return redirect('/msg')->withErrors($validator)->withInput();
        }


        $msg = new Message;  
        $msg->content_title = $request->input('content_title');
        $msg->content       = $request->input('content'); 
        $msg->save();
        $msg->roles()->attach($request->input('role_id'));       
        Notification::send(User::role($request->role_id)->get() , new Adminmessage($msg));

        return redirect ('/msg-show');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
       
        $message=Message::all()->sortByDesc('created_at');
        $organizations=Organization:: all();
        $roles=Role::all();
        $general=generalSetting::where('id',1)->first();

       return view('admin.message.msg-show',compact('message','organizations','roles','general'));
      
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $id)
    {
        $organizations=Organization::all();
        $note = auth()->user()->notifications()->findorfail($id);
        $general=generalSetting::where('id',1)->first();

        if($note->read_at=='')
        $note->markAsRead();
        return view('admin.message.ms',compact('organizations','note','general'));  
        // dd($note->data['content_title']); 
     }
     public function delete(Request $request)
     {
        $messageId = explode(',', $request->input('id'));

foreach ($messageId as $id) {
    $message = Message::findOrFail($id);
    $message->roles()->detach();
    $message->delete();
}
      
           
    
       
     }
 

}
