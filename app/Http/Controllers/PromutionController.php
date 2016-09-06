<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\PromutionUser;
use Illuminate\Http\Request;
use Response;

class PromutionController extends Controller
{
    //
    public function show($id)
    {
    	$user = PromutionUser::find($id);
    	if(!$user) return;

    	return Response::json(['result' => $user->childsGet()]);
    }

    public function index(Request $request)
    {
    	$searchValue = $request->search;

    	if($searchValue) {
    		$promUsers = PromutionUser::where(function ($query) use ($searchValue) {
            $query->where('fname', 'like', '%'.$searchValue.'%')
                  ->orWhere('registryNo', 'like', '%'.$searchValue.'%')
                  ->orWhere('lname', 'like', '%'.$searchValue.'%');
        	})
            ->orderBy('childCount', 'DESC')
            ->paginate(30);
    	}
    	else
		{
    		$promUsers = PromutionUser::orderBy('childCount', 'DESC')->paginate(30);
    	}

        $request->flash();

        return view('promution.index')
                ->with('users', $promUsers)
                ->with('search', $searchValue);
    }
}
