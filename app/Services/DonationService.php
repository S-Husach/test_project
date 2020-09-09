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

    public function formatChatData()
    {
        return [
            'data' => $this->donationRepository->paginate(),
            // 'max' => $this->donationRepository->max(),
            // 'totalMonth' => $this->donationRepository->totalMonth(),
            // 'total' => $this->donationRepository->total(),
            'amount' => $this->prepareAmountData()
        ];
    }

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