<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DonationRequest;
use App\Repositories\DonationRepository;
use App\Services\DonationService;
use App\Models\Donation;

class DonationController extends Controller
{
    private $donationService;
    private $donationRepository;

    public function __construct(
        DonationService $donationService,
        DonationRepository $donationRepository
    ) {
        $this->donationService = $donationService;
        $this->donationRepository = $donationRepository;
    }

    public function submit(DonationRequest $req)
    {
        $this->donationRepository->submit($req);
        return redirect('/');
    }

    public function getInitialTableData()
    {
        return view(
            'dashboard',
            $this->donationService->formatInitialTableData()
        );
    }

    public function getChartData()
    {
        return $this->donationService->formatAjaxChartData();
    }

    public function getTableData(Request $request)
    {
        return $this->donationService->formatTableData($request);
    }

    public function getWidgetData(Request $request)
    {
        return response()->json($this->donationService->formatWidgetData($request), 200);
    }

}