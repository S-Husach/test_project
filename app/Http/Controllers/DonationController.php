<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DonationRequest;
use App\Models\Donations;

class DonationController extends Controller
{
    public function submit(DonationRequest $req)
    {
        $donation = new Donations();
        $donation->name = $req->input('name');
        $donation->email = $req->input('email');
        $donation->amount = $req->input('amount');
        $donation->message = $req->input('message');
        $donation->save();
    return redirect('/');
    }

    public function allData(Donations $donates)
    {
        return view('dashboard', 
            [
                'data' => Donations::paginate(10),
                'max' => $donates->OrderBy('amount', 'desc')->first(),
                'totalMonth' => Donations::whereMonth('created_at', Carbon::now()->month)->sum('amount'),
                'max' => $donates->OrderBy('amount', 'desc')->first(),
                'total' => Donations::sum('amount')
            ]
        );
    }
}