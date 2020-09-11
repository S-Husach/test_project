<?php

namespace App\Repositories;

use App\Http\Services\DonationService;
use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;

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
    }

    public function getChartData()
    {
        // if ($request->ajax()) {
            return Donation::select(
                Donation::raw('DATE(created_at) as date'),
                Donation::raw('sum(amount) as amount')
            )
                ->groupBy(Donation::raw('DATE(created_at)'))
                ->get();
        // }
    }

    // public function getAjaxChartData($request)
    // {
    //     if ($request->ajax()) {
    //         return Donation::select(
    //             Donation::raw('DATE(created_at) as date'),
    //             Donation::raw('sum(amount) as amount')
    //         )
    //             ->groupBy(Donation::raw('DATE(created_at)'))
    //             ->get();
    //     }
    // }

    public function paginate($amount = 10)
    {
        return Donation::paginate($amount);
    }

    public function fetch_data($request) 
    {
        if ($request->ajax()) {
            return Donation::paginate(10);
        }
    }

    public function fetch_max($request)
    {
        if ($request->ajax()) {
            return Donation::OrderBy('amount', 'desc')->first();
        }
    }

    public function fetch_totalMonth($request)
    {
        if ($request->ajax()) {
            return Donation::whereMonth(
                'created_at', Carbon::now()->month
            )->sum('amount');
        }
    }

    public function fetch_total($request)
    {
        if ($request->ajax()) {
            return Donation::sum('amount');
        }
    }
}