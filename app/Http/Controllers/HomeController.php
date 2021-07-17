<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Activity;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Activity::where('user_id', Auth::user()->id)->orderByDesc('date_time')->first();

        return view('home', ['data'=> $data]);
    }

    public function my_profile()
    {
        $data = User::where('id', Auth::user()->id)
                ->first();
        return view('user.profile', [
            'data' => $data,
        ]);
    }

    protected function update_profile(Request $data)
    {
        $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:100', Rule::unique('users')->ignore(auth()->user()->id, 'id')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id, 'id')],
        ]);

        User::where('id', Auth::user()->id)->update([
            'name' => $data->name,
            'username' => $data->username,
            'email' => $data->email,
            'updated_at' => Carbon::now()
        ]);
	    return redirect()->route('my_profile');
    }

    protected function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::where('id', Auth::user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        Auth::logout();
        return redirect('/login');
    }

    public function activity_get_all(Request $request)
    {
        $data = Activity::select(
            'date_time',
            'activity',
            'oxygen_lvl',
            'bloodpressure_sys',
            'bloodpressure_dia',
            'id', 'user_id')->where('user_id', Auth::user()->id)->orderByDesc('date_time');
            return Datatables::of($data)
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                             $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->where('activity', 'LIKE', "%$search%");
                            });
                        }
                    })
                    ->make(true);
    }
    public function activity_new(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([ 
                'activity'=> ['required', 'string'],
                'date' => ['required'],
                'time' => ['required'],
                'OxygenLevel' => ['required'],
                'SYS' => ['required'],
                'DIA' => ['required']
            ]);
            Activity::insert([
                'activity' => $request->activity,
                'date_time' => date('Y-m-d H:i', strtotime($request->date." ".$request->time)),
                'oxygen_lvl' => $request->OxygenLevel,
                'bloodpressure_sys' => $request->SYS,
                'bloodpressure_dia' => $request->DIA,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('activity');
        }
        return view('activity.new');
    }
    public function activity_edit($id, Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([ 
                'activity'=> ['required', 'string'],
                'date' => ['required'],
                'time' => ['required'],
                'OxygenLevel' => ['required'],
                'SYS' => ['required'],
                'DIA' => ['required']
            ]);
            Activity::where('id', $id)->update([ 
                'activity' => $request->activity,
                'date_time' => date('Y-m-d H:i', strtotime($request->date." ".$request->time)),
                'oxygen_lvl' => $request->OxygenLevel,
                'bloodpressure_sys' => $request->SYS,
                'bloodpressure_dia' => $request->DIA,
                'updated_at'=> Carbon::now()
            ]);
            
            return redirect()->route('activity');
        }
        $data=Activity::where('user_id','=', Auth::user()->id)->find($id);
        if($data == null){
            return redirect()->route('activity');
        }
        return view('activity.edit', ['data'=> $data]);
    }
}