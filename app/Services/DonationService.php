<?php

namespace App\Services;

use App\Repositories\DonationRepository;

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
            'max' => $this->donationRepository->max(),
            'totalMonth' => $this->donationRepository->totalMonth(),
            'total' => $this->donationRepository->total(),
            'amount' => $this->prepareAmountData()
        ];
    }
}