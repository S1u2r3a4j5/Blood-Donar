<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\GainerAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BloodController extends Controller
{
    public function index()
    {
        return view('blood.index');
    }

    public function search(Request $request)
    {
        // $users = User::with('address')->get();
        $usersDonar = User::where('user_type', 'donar')->with('address')->get();

        return view('blood.search', [
            'usersDonar' => $usersDonar,
        ]);
    }

    public function searchGainer(Request $request)
    {

        $userGainer = User::where('user_type', 'gainer')->with('gainerAddress')->get();

        return view('blood.gainerSearch', [
            'userGainer' => $userGainer
        ]);
    }

    public function gainerSearchWithoutLogin(Request $request)
    {
        $query = User::where('user_type', 'gainer')->with('gainerAddress');

        if ($request->filled('blood_group')) {
            $query->where('blood_group', $request->input('blood_group'));
        }

        if ($request->filled('kshetra')) {
            $query->whereHas('gainerAddress', function ($q) use ($request) {
                $q->where('kshetra', 'LIKE', '%' . $request->input('kshetra') . '%');
            });
        }

        if ($request->filled('prant')) {
            $query->whereHas('gainerAddress', function ($q) use ($request) {
                $q->where('prant', 'LIKE', '%' . $request->input('prant') . '%');
            });
        }

        if ($request->filled('maha-nagar')) {
            $query->whereHas('gainerAddress', function ($q) use ($request) {
                $q->where('maha_nagar', 'LIKE', '%' . $request->input('maha-nagar') . '%');
            });
        }

        if ($request->filled('bhag')) {
            $query->whereHas('gainerAddress', function ($q) use ($request) {
                $q->where('bhag', 'LIKE', '%' . $request->input('bhag') . '%');
            });
        }

        if ($request->filled('shakha')) {
            $query->whereHas('gainerAddress', function ($q) use ($request) {
                $q->where('shakha', 'LIKE', '%' . $request->input('shakha') . '%');
            });
        }

        if ($request->filled('city')) {
            $query->whereHas('gainerAddress', function ($q) use ($request) {
                $q->where('city', 'LIKE', '%' . $request->input('city') . '%');
            });
        }

        if ($request->filled('state')) {
            $query->whereHas('gainerAddress', function ($q) use ($request) {
                $q->where('state', 'LIKE', '%' . $request->input('state') . '%');
            });
        }

        if ($request->filled('country')) {
            $query->whereHas('gainerAddress', function ($q) use ($request) {
                $q->where('country', 'LIKE', '%' . $request->input('country') . '%');
            });
        }

        $userGainer = $query->get();

        if ($userGainer->isNotEmpty()) {
            session()->flash('success', "If you want the contact number or information of the blood donor, <b> Blood Gainer Register </b> and then <b> Login </b> .");
        }

        return view('blood.gainerSearch', [
            'userGainer' => $userGainer
        ])->with('success', "If you want donor details, please login.");
    }



    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'required|string|max:10',
            'blood_group' => 'nullable|string',
            'age' => 'nullable|string',
            'gender' => 'nullable|string',
            'password' => 'required|min:8|confirmed',

            'pincode' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',

            'kshetra' => 'nullable|string',
            'vibhag' => 'nullable|string',
            'prant' => 'nullable|string',

            'maha_nagar' => 'nullable|string',
            'bhag' => 'nullable|string',
            'nagar' => 'nullable|string',
            'shakha' => 'nullable|string',
            'address' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->phone,
            'blood_group' => $request->blood_group,
            'age' => $request->age,
            'gender' => $request->gender,
            'user_post_name' => $request->user_post_name,
            'password' => Hash::make($request->password),
            // 'user_type' => "donar",
            'user_type' => User::USER_TYPE_DONOR,
        ]);

        $address = Address::create([
            'user_id' => $user->id,
            'address' => $request->address,

            'pincode' => $request->pincode,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,

            'kshetra' => $request->kshetra,
            'prant' => $request->prant,
            'vibhag' => $request->vibhag,

            'maha_nagar' => $request->maha_nagar,
            'bhag' => $request->bhag,
            'nagar' => $request->nagar,
            'shakha' => $request->shakha,

        ]);

        return back()->with('success', 'Donor registered successfully');
    }

    public function gainerRegister(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|string|max:10',
            'blood_group' => 'nullable|string',
            'age' => 'nullable|string',
            'gender' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',

            'pincode' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',

            'kshetra' => 'nullable|string',
            'vibhag' => 'nullable|string',
            'prant' => 'nullable|string',

            'maha_nagar' => 'nullable|string',
            'bhag' => 'nullable|string',
            'nagar' => 'nullable|string',
            'shakha' => 'nullable|string',
            'address' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->phone,
            'blood_group' => $request->blood_group,
            'age' => $request->age,
            'gender' => $request->gender,
            'user_post_name' => $request->user_post_name,
            'password' => bcrypt($request->password),
            'user_type' => User::USER_TYPE_GAINER,


        ]);

        $address = GainerAddress::create([
            'user_id' => $user->id,
            'address' => $request->address,

            'pincode' => $request->pincode,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,

            'kshetra' => $request->kshetra,
            'prant' => $request->prant,
            'vibhag' => $request->vibhag,

            'maha_nagar' => $request->maha_nagar,
            'bhag' => $request->bhag,
            'nagar' => $request->nagar,
            'shakha' => $request->shakha,

        ]);

        return back()->with('success', 'Blood Gainer registered successfully');
    }

    public function show(Request $request)
    {
        $users = User::with('address')->get();
        // dd($users);

        return view('blood.search', [
            'users' => $users,
        ]);
    }

    public function donarSearch(Request $request)
    {
        $query = User::where('user_type', 'donar')->with('address');

        if ($request->filled('blood_group')) {
            $query->where('blood_group', $request->input('blood_group'));
        }

        if ($request->filled('kshetra')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('kshetra', 'LIKE', '%' . $request->input('kshetra') . '%');
            });
        }

        if ($request->filled('prant')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('prant', 'LIKE', '%' . $request->input('prant') . '%');
            });
        }

        if ($request->filled('maha-nagar')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('maha_nagar', 'LIKE', '%' . $request->input('maha-nagar') . '%');
            });
        }

        if ($request->filled('bhag')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('bhag', 'LIKE', '%' . $request->input('bhag') . '%');
            });
        }

        if ($request->filled('shakha')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('shakha', 'LIKE', '%' . $request->input('shakha') . '%');
            });
        }

        if ($request->filled('city')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('city', 'LIKE', '%' . $request->input('city') . '%');
            });
        }

        if ($request->filled('state')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('state', 'LIKE', '%' . $request->input('state') . '%');
            });
        }

        if ($request->filled('country')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('country', 'LIKE', '%' . $request->input('country') . '%');
            });
        }

        $usersDonar = $query->get();

        if ($usersDonar->isNotEmpty()) {
            session()->flash('success', "If you want the contact number or information of the blood donor, <b> Blood Gainer Register </b> and then <b> Login </b> .");
        }

        return view('blood.search', [
            'usersDonar' => $usersDonar
        ])->with('success', "If you want donor details, please login.");
    }


    public function donarSearchLoginUser(Request $request)
    {
        $query = User::where('user_type', 'donar')->with('address');

        if ($request->filled('blood_group')) {
            $query->where('blood_group', $request->input('blood_group'));
        }

        if ($request->filled('kshetra')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('kshetra', 'LIKE', '%' . $request->input('kshetra') . '%');
            });
        }

        if ($request->filled('prant')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('prant', 'LIKE', '%' . $request->input('prant') . '%');
            });
        }

        if ($request->filled('maha-nagar')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('maha_nagar', 'LIKE', '%' . $request->input('maha-nagar') . '%');
            });
        }

        if ($request->filled('bhag')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('bhag', 'LIKE', '%' . $request->input('bhag') . '%');
            });
        }

        if ($request->filled('shakha')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('shakha', 'LIKE', '%' . $request->input('shakha') . '%');
            });
        }

        if ($request->filled('city')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('city', 'LIKE', '%' . $request->input('city') . '%');
            });
        }

        if ($request->filled('state')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('state', 'LIKE', '%' . $request->input('state') . '%');
            });
        }

        if ($request->filled('country')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('country', 'LIKE', '%' . $request->input('country') . '%');
            });
        }

        $usersDonar = $query->get();

        if ($usersDonar->isNotEmpty()) {
            session()->flash('success', "If you want the contact number or information of the blood donor, <b> Blood Gainer Register </b> and then <b> Login </b> .");
        }

        return view('blood.search', [
            'usersDonar' => $usersDonar
        ])->with('success', "If you want donor details, please login.");
    }




    public function loginUserShow()
    {

        $users = User::with('address')->get();

        return view('blood.loginUserSearchShow', [
            'users' => $users,
        ]);
    }

    public function test()
    {
        return view('layouts.layout');
    }
}
