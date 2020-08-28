<?php

namespace App\Repositories;

use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use Carbon\Carbon;

class DonationRepository
{

    public function submit(DonationRequest $req)
    {
        $donation = new Donation();
        $donation->name = $req->input('name');
        $donation->email = $req->input('email');
        $donation->amount = $req->input('amount');
        $donation->message = $req->input('message');
        $donation->save();
        return;
    }

    public function allData()
    {
        $data = Donation::select(
            Donation::raw('DATE(created_at) as date'),
            Donation::raw('sum(amount) as amount')
        )
            ->groupBy(Donation::raw('DATE(created_at)'))
            ->get();
            $array[] = ['Date', 'Total donations'];
        foreach ($data as $value) {
            $array[] = [$value->date, (float) $value->amount];
        }
        return [
                'data' => Donation::paginate(10),
                'max' => Donation::OrderBy('amount', 'desc')->first(),
                'totalMonth' => Donation::whereMonth(
                    'created_at', Carbon::now()->month
                )->sum('amount'),
                'total' => Donation::sum('amount'),
                'amount' => json_encode($array)
        ];
    }
}