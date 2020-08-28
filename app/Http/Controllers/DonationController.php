<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DonationRequest;
use App\Repositories\DonationRepository;
use App\Models\Donation;

class DonationController extends Controller
{
    private $donationRepository;

    public function __construct(DonationRepository $donationRepository)
    {
        $this->donationRepository = $donationRepository;
    }

    public function allData()
    {
        $data = $this->donationRepository->allData();
        return view('dashboard', $data);
    }

    public function submit(DonationRequest $req)
    {
        $donation = $this->donationRepository->submit($req);
        return redirect('/');
    }
}