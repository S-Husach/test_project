<?php

namespace App\Repositories;

use App\Http\Services\DonationService;
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

    public function getChartData()
    {
        return Donation::select(
            Donation::raw('DATE(created_at) as date'),
            Donation::raw('sum(amount) as amount')
        )
            ->groupBy(Donation::raw('DATE(created_at)'))
            ->get();
    }

    public function paginate($amount = 10)
    {
        return Donation::paginate($amount);
    }

    public function max()
    {
        return Donation::OrderBy('amount', 'desc')->first();
    }

    public function totalMonth()
    {
        return Donation::whereMonth(
            'created_at', Carbon::now()->month
        )->sum('amount');
    }

    public function total()
    {
        return Donation::sum('amount');
    }

}