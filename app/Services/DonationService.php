<?php

namespace App\Services;

use App\Repositories\DonationRepository;
use Illuminate\Http\Request;

class DonationService
{
    private $donationRepository;

    public function __construct(
        DonationRepository $donationRepository
    ) {
        $this->donationRepository = $donationRepository;
    }

    public function prepareAmountData()
    {
        $data = $this->donationRepository->getChartData();

        $array[] = ['Date', 'Total donations'];

        foreach ($data as $value) {
            $array[] = [$value->date, (float) $value->amount];
        }

        return json_encode($array);
    }

    public function formatInitialTableData()
    {
        return [
            'data' => $this->donationRepository->paginate(),
            'amount' => $this->prepareAmountData() // ajax
        ];
    }

// ajax

    // public function prepareAjaxAmountData(Request $request)
    // {
    //     $data = $this->donationRepository->getAjaxChartData($request);

    //     $array[] = ['Date', 'Total donations'];

    //     foreach ($data as $value) {
    //         $array[] = [$value->date, (float) $value->amount];
    //     }

    //     return json_encode($array);
    // }

    // public function formatAjaxChartData(Request $request)
    // {
    //     return [
    //         'amount' => $this->prepareAjaxAmountData($request)
    //     ];
    // }

    public function formatTableData(Request $request)
    {
        return [
            'data' => $this->donationRepository->fetch_data($request)
        ];
    }

    public function formatWidgetData(Request $request)
    {
        return [
            'max' => $this->donationRepository->fetch_max($request),
            'totalMonth' => $this->donationRepository->fetch_totalMonth($request),
            'total' => $this->donationRepository->fetch_total($request),
        ];
    }

}