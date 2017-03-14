<?php

namespace App\Http\Controllers;

use App\Eloquent\comments;
use App\Eloquent\general_settings;
use App\Eloquent\reply;
use App\Eloquent\user_info;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CommentsController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            if(Auth::user()->rank == '3')
            {
                $rank = 'admin';
            }
            else
            {
                $rank = 'not_admin';
            }
        }
        else
        {
            $rank = 'not_admin';
        }
        $gen = general_settings::find('1');
        $genData['comment_img'] = $gen->comment_img;
        $genData['comment_capt'] = $gen->comment_capt;
        $commentsData = [];
        $replyData = [];
        $userData = [];
            $comments = comments::all();
            $user_info = user_info::all();
        if($comments !== null) {
            foreach ($comments as $comment) {
                $user = $comment->userInfo;
                $commentsData[$comment->id]['id'] = $comment->id;
                $commentsData[$comment->id]['name'] = $user->name;
                $commentsData[$comment->id]['message'] = $comment->body;
                $commentsData[$comment->id]['media'] = $comment->media;
                $commentsData[$comment->id]['timestamp'] = $comment->created_at;
                $commentsData[$comment->id]['email'] = $user->email;
                if($user_info !== null)
                {
                    foreach($user_info as $u)
                    {
                        $userData[$user->email]['icon'] = $u->icon;
                    }
                }
            }
            $reply = reply::all();
            if ($reply !== null) {
                foreach ($reply as $re) {
                    $replyData[$re->post_id][$re->id]['name'] = $re->user->name;
                    $replyData[$re->post_id][$re->id]['body'] = $re->body;
                    $replyData[$re->post_id][$re->id]['timestamp'] = $re->created_at;
                    $replyData[$re->post_id][$re->id]['email'] = $re->user->email;
                    $replyData[$re->post_id][$re->id]['id'] = $re->id;
                }
                return view('comments')->with('comments', $commentsData)->with('reply', $replyData)->with('user_info', $userData)->with('gen', $genData)->with('rank', $rank);
            }

            return view('comments')->with('comments', $commentsData)->with('user_info', $userData)->with('gen', $genData)->with('rank', $rank);
        }

        return view('comments')->with('gen', $genData)->with('rank', $rank);
    }
    public function addReply(Request $r)
    {
        $rep = new reply();
        if(Input::has('body') && Input::has('comment_id') && Auth::check())
        {
            $rep->user_id = Auth::user()->id;
            $rep->post_id = Input::get('comment_id');
            $rep->body = Input::get('body');
            $rep->timestamps;
            $rep->save();
            return redirect()->route('comm');
        }
            return redirect()->route('comm');
    }
    public function addComments(Request $r)
    {
        $comm = new comments();
        if(Input::has('addComment') && Auth::check())
        {
            $comm->user_id = Auth::user()->id;
            $comm->body = Input::get('addComment');
            if(Input::has('uploadMedia'))
            {
                $comm->media = Input::get('uploadMedia');
            }
            $comm->timestamps;
            $comm->save();
            return redirect()->route('comm');
        }
        return redirect()->route('comm');
    }
    public function deleteComm($id)
    {
        $comm = comments::find($id);
        $comm->delete();
        $reply = reply::where('post_id', '=', $id)->get();
        foreach($reply as $r)
        {
            $r->delete();
        }
        return redirect()->route('comm');

    }
    public function deleteReply($id)
    {
        $repl = reply::find($id);
        $repl->delete();
        return redirect()->route('comm');
    }
}
