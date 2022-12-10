<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profil;
use App\Models\Postingan;
use App\Models\Komen;
use App\Models\Like;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();
        $password = User::where('password', $request->password)->first();
        $like = Like::all();
        $profil = User::all();
        $follow = Follow::all();
        if ($user == NULL) {
            return redirect('/')->withErrors(['msg' => 'Email tidak ditemukan!']);
        } elseif ($password == NULL) {
            return redirect('/')->withErrors(['msg' => 'Password salah!']);
        } else {
            $user = $user->getOriginal();
            $user_id = Profil::where('user_id', $user['id'])->first();
            // dd($user_id);
            if ($user_id == NULL) { // register
                Profil::create([
                    'umur' => 0,
                    'bio' => '',
                    'alamat' => '',
                    'user_id' => $user['id']
                ]);
                $posting = Postingan::all(); // ambil data postingan
                $komen = Komen::all();
                $profile = Profil::where('user_id', $user['id'])->first()->getOriginal();
                return view('postingan', compact('user', 'posting', 'komen', 'like', 'profil', 'follow', 'profile'));
            } else {
                $posting = Postingan::all(); // ambil data postingan
                $komen = Komen::all();
                $profile = Profil::where('user_id', $user['id'])->first()->getOriginal();
                return view('postingan', compact('user', 'posting', 'komen', 'like', 'profil', 'follow', 'profile'));
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password',
            'foto' => 'required'
        ]);
        if ($request->foto != NULL){
            $gambar = $request->foto;
            $name_img = time() . ' - ' . $gambar->getClientOriginalName();
            $gambar->move('img', $name_img);
        }
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'foto' => $name_img
        ]);
        return redirect('/')->with('status','Akun terdaftarkan! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Cookies($id)
    {
        $user = User::where('email', $id)->first();
        $user = $user->getOriginal();
        $profil = User::all();
        $profile = Profil::where('user_id', $user['id'])->first()->getOriginal();
        $posting = Postingan::all();
        $komen = Komen::all();
        $like = Like::all();
        $follow = Follow::all();
        return view('postingan', compact('user', 'posting', 'komen', 'like', 'profil', 'follow', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $user = User::where('email', $id)->first();
        $user = $user->getOriginal();
        $profil = User::all();
        $profile = Profil::where('user_id', $user['id'])->first()->getOriginal();
        $komen = Komen::all();
        $like = Like::all();
        $posting = Postingan::all();
        $follow = Follow::all();
        return view('edit', compact('user', 'posting', 'komen', 'like', 'profil', 'follow', 'profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apaajabebas(Request $request)
    {
        //
        $user = User::where('email', $request->email)->first();
        $user = $user->getOriginal();
        return redirect()->action(
            [UserController::class, 'update'],
            ['id' => $user['email']]
        );
    }

    public function editProfile(Request $request)
    {
        # code...
        $users = User::where('id', $request->id);
        $gambar = $request->foto;
        if ($gambar != NULL) {
            $name_img = time() . ' - ' . $gambar->getClientOriginalName();
            $users->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'foto' => $name_img
            ]);
            $gambar->move('img', $name_img);
        } else {
            $users->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password
            ]);
        }
        $profile = Profil::where('user_id', $request->id);
        $profile->update([
            'umur' => $request->umur,
            'bio' => $request->bio,
            'alamat' => $request->alamat
        ]);

        $user = User::where('email', $request->email)->first();
        $user = $user->getOriginal();
        return redirect()->action(
            [UserController::class, 'Cookies'],
            ['id' => $user['email']]
        );
    }
}
