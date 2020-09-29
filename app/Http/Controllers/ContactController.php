<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $submitError = null;
        return view('contact', ['submitError' => $submitError]);
    }
    public function list()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'name'             => 'required',
            'phone'            => 'required',
            'email'            => 'required'
        ]);
        $user    = new User();

        //Validate email address
        $emailExist = User::where('email', '=', $request->input('email'))->first();
        if ($emailExist) {
            $this->updateForm($request, $emailExist->id);

            $emailExist2 = User::where('email', '=', $request->input('email2'))->first();
            if($emailExist2){
                $this->updateForm2($request, $emailExist2->id);
            }else{
                $this->addForm2($request);
            }
        }else{
            $this->addForm($request);
            $emailExist2 = User::where('email', '=', $request->input('email2'))->first();
            if($emailExist2){
                $this->updateForm2($request, $emailExist2->id);
            }else{
                $this->addForm2($request);
            }
        }

        $submitError =null;
        return view('contact',compact('submitError'));
    }

    public function updateForm(Request $request, $id)
    {
            $validatedData = $request->validate([
                'name'       => 'required|min:1|max:256',
                'email'      => 'required|email|max:256',
                'phone'       => 'required|min:1|max:256',
            ]);

            $user = User::find($id);
            $user->name          = $request->input('name');
            $user->date_of_birth = $request->input('date_of_birth');
            $user->phone         = $request->input('phone');
            $user->gender        = $request->input('gender');
            $response = $user->save();
            $request->session()->flash('message', 'Successfully updated student');
    }

    public function updateForm2(Request $request, $id)
    {
            $validatedData = $request->validate([
                'name2'       => 'required|min:1|max:256',
                'email2'      => 'required|email|max:256',
                'phone2'       => 'required|min:1|max:256',
            ]);

            $user = User::find($id);
            $user->name          = $request->input('name2');
            $user->phone         = $request->input('phone2');
            $user->car_make      = $request->input('car_make2');
            $user->car_colour    = $request->input('car_colour2');
            $response = $user->save();
            $request->session()->flash('message', 'Successfully modified');
    }

    public function addForm(Request $request){
        $validatedData = $request->validate([
                'name'  => 'required|min:1|max:256',
                'email' => 'required|email|max:256',
                'phone' => 'required|min:1|max:256',
            ]);
        $user = new User();
        $user->name          = $request->input('name');
        $user->email         = $request->input('email');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->phone         = $request->input('phone');
        $user->gender        = $request->input('gender');
        $user->password        = $request->input('name');
        $user->save();
        $request->session()->flash('message', 'Successfully modified');

    }

    public function addForm2(Request $request){
        $validatedData = $request->validate([
                'name2'  => 'required|min:1|max:256',
                'email2' => 'required|email|max:256',
                'phone2' => 'required|min:1|max:256',
            ]);
        $user = new User();
        $user->name          = $request->input('name2');
        $user->email         = $request->input('email2');
        $user->phone         = $request->input('phone2');
        $user->car_make      = $request->input('car_make');
        $user->car_colour    = $request->input('car_colour');
        $user->password        = $request->input('name2');
        $user->save();
        $request->session()->flash('message', 'Successfully modified');

    }

}
