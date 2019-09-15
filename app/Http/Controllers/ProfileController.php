<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\ProfilePhotoUploadRequest;
use App\Http\Requests\CollectionUploadRequest;
use App\User;
use App\Country;

class ProfileController extends Controller
{
    public function index(User $user)
    {
    	$countries = Country::all();
    	return view('profile',compact(['user','countries']));
    }
    public function editProfile(ProfileEditRequest $request, $id)
    {
    	User::where('id',$id)->update(request()->except(['_token','_method']));
    	return redirect()->back()->with('success','Profile Saved Successfully');
    }

    public function changeAvatar(ProfilePhotoUploadRequest $request, User $user)
    {
    	$oldMedia = $user->clearMediaCollection('profile_img');
    	$user->addMedia($request->profile_img)->toMediaCollection('profile_img');
    	return redirect()->back()->with('success','Profile Picture Changed!');
    }

    public function addCollection(CollectionUploadRequest $request, User $user)
    {
    	$user->addMedia($request->collection)->toMediaCollection('collection');
    	return redirect()->back()->with('success','Photo Added to the Collection');
    }
    public function deleteCollection(User $user)
    {
    	$user->clearMediaCollection('collection');
    	return redirect()->back()->with('warning','All Photos Collection Cleared Successfully');
    }
}
