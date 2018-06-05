<?php

namespace App\Http\Controllers;
use App\Eloquent\Comment;
use App\Eloquent\Status;
use App\Eloquent\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Input::has('post_comment'))
        {
            $status = Input::get('post_comment');
            $commentBox= Input::get('comment-text');
            
            $selectedStatus = Status::find($status);
            $id1=Status::find($status)->id;
            $id2=Status::find($id1)->user_id ;
           
                $selectedStatus->comment()->create([
                    'comment_text' => $commentBox,
                    'user_id' => Auth::user()->id,
                    'status_id' => $id1
                ]);
            
            return redirect('/');
            
        }
        if(Input::has('status-text'))
        {
            $text = (Input::get('status-text'));
            $userStatus = new Status();
            $userStatus->user_id = Auth::user()->id;
            $userStatus->status_text= $text;
            $userStatus->status_heading_text=Input::get('status-heading-text');
            $userStatus->type=Input::get('type');
            
            $userStatus->save();
            //Flash::success('Your status has been posted.');
            return redirect('/');
            
        }
        $status=Status::where('approval',1)->orderBy('id','DESC')->take(1000)->get();
        return view('frontEnd.home',[
            
            'top_15_posts' => $status       
        ]);
    }
    public function dashboard()
    {
        $status=Status::where('user_id',Auth::user()->id)->where('approval',0)->orderBy('id','DESC')->take(1000)->get();
        return view('frontEnd.dashboard',[
            'top_15_posts' => $status
        ]);
    }
    public function dashboard_post(Request $request)
    {
        $status=Status::where('user_id',Auth::user()->id)->where('approval',1)->orderBy('id','DESC')->take(1000)->get();
        return view('frontEnd.dashboard_post',[
            'top_15_posts' => $status
        ]);
    }
}
