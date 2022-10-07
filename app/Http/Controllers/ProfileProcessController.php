<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Packages;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProfileProcessController extends Controller
{
    public function index()
    {
        $profile = Company::with('package')->where('user_id', Auth::user()->id)->first();
        //dd($profile);
        if(!isset($profile->id)){
            return redirect('packages');
        }

        $user_id = Auth::user()->id;
        $comments = Comment::where('company_id',$profile->id)->get();
        return view('site.home.profile-process',compact('profile','comments','user_id'));
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $profile = Company::with('package')->where('user_id', Auth::user()->id)->first();
        $validate['comment'] = 'required|min:2|max:256';
        $validator = Validator::make(
            $request->all(), $validate
        );

        if($validator->fails())
        {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $comment->create([
            'user_id'=>Auth::user()->id,
            'company_id'=>$profile->id,
            'comment'=>$request->comment,
            'user_type'=>'agency',
        ]);
        return back()->with('success','Commented Successfuly');
    }
}
