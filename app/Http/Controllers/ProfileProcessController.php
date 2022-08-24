<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\packages;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProfileProcessController extends Controller
{
    public function index()
    {
        $profiles = DB::table('companies')
        ->leftjoin('packages','packages.id','=','companies.package_id')->value('package_id');
        $user_id = Auth::user()->id;
        $comments = Comment::where('company_id','=',$user_id)->get();
        return view('site.home.profile-process',compact('profiles','comments','user_id'));
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'comment'=>$request->comment,
        ]);
        return back()->with('status','Commented Successfuly');
    }
}
