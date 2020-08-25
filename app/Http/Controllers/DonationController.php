<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DonationRequest;
use App\Models\Donations;
use DB;

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
        $data = DB::table('donations')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('sum(amount) as amount')
            )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
            $array[] = ['Date', 'Total donations'];
        foreach($data as $value) {
            $array[] = [$value->date, (float) $value->amount];
        }
        return view(
            'dashboard',
            [
                'data' => Donations::paginate(10),
                'max' => $donates->OrderBy('amount', 'desc')->first(),
                'totalMonth' => Donations::whereMonth(
                    'created_at', Carbon::now()->month
                )->sum('amount'),
                'max' => $donates->OrderBy('amount', 'desc')->first(),
                'total' => Donations::sum('amount'),
                'amount' => json_encode($array)
            ]
        );
    }
}