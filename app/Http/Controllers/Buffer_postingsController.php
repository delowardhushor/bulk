<?php

namespace Bulkly\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

// use App\buffer_postings;

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Bulkly\User;

use Bulkly\SocialPostGroups;

use Bulkly\SocialPosts;

use Illuminate\Support\Facades\DB;

class Buffer_postingsController extends Controller
{
    function index(){

        if(!Auth::guard('web')->check()){
            return redirect('/login');
        }

        //$buffers = DB::table('buffer_postings')->get();

        $groups = SocialPostGroups::all();

        if(isset($_GET['search'])){
            $searchWord = $_GET['search'];
        }else{
            $searchWord = '';
        }

        if(isset($_GET['date'])){
            $dateWord = $_GET['date'];
        }else{
            $dateWord = '';
        }
        
        if(isset($_GET['group'])){
            $groupWord = $_GET['group'];
        }else{
            $groupWord = '';
        }

        $buffers = BufferPosting::where('post_text', 'like', "%{$searchWord}%")->paginate(10);

        //return BufferPosting::find(385111)->groupInfo;

		$user = User::find(Auth::id());
        return view('admin.buffer_postings')
        ->with('user', $user)
        ->with('buffers', $buffers)
        ->with('groups', $groups)
        ->with('type', 'rss-automation');
       // return view('admin.buffer_postings');
    }
}
