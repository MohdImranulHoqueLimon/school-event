<?php

namespace App\Services;


use App\Repositories\Admin\Refill\RefillRepository;
use App\Repositories\Admin\Refill\RefillSummaryRepository;
use Illuminate\Support\Facades\DB;

class ChartService
{
    /**
     * @var RefillRepository
     */
    private $refillRepository;
    /**
     * @var RefillSummaryRepository
     */
    private $refillSummaryRepository;

    /**
     * ChartService constructor.
     * @param RefillRepository $refillRepository
     * @param RefillSummaryRepository $refillSummaryRepository
     */
    public function __construct(
        RefillRepository $refillRepository,
        RefillSummaryRepository $refillSummaryRepository
    )
    {
        $this->refillRepository = $refillRepository;
        $this->refillSummaryRepository = $refillSummaryRepository;
    }

    public function getBarChart($input)
    {
        $refillData = [];
        $refillSummaryData = [];
        $dateFilter = $this->refillRepository->getDates($input);

        if($dateFilter['refills']['refill_table']==1){
            $input['refill_start_date']=$dateFilter['refills']['refill_start_date'];
            $input['refill_end_date']=$dateFilter['refills']['refill_end_date'];

            $refillData = $this->refillRepository->refillChartData($input)
                ->select(
                    [
                        DB::raw('COUNT(refills.id) AS total_refill'),
                        DB::raw('DATE(refills.refill_datetime) AS refill_date'),
                    ]
                )
                ->groupBy(DB::raw('DATE(refills.refill_datetime)'))
                ->get()->toArray();
        }

        if($dateFilter['refill_summaries']['refill_summary_table']==1){
            $input['refill_start_date']=$dateFilter['refill_summaries']['refill_start_date'];
            $input['refill_end_date']=$dateFilter['refill_summaries']['refill_end_date'];

            $refillSummaryData = $this->refillSummaryRepository->refillSummaryChartData($input)
                ->select(
                    [
                        DB::raw('SUM(refill_summaries.total_refill) AS total_refill'),
                        'refill_summaries.refill_date'
                    ]
                )
                ->groupBy('refill_summaries.refill_date')
                ->get()->toArray();
        }

        return array_merge($refillSummaryData, $refillData);
    }

    /**
     * @param $input
     * @return array
     */
    public function getLineChart($input)
    {
        $refillData = [];
        $refillSummaryData = [];
        $dateFilter = $this->refillRepository->getDates($input);

        if($dateFilter['refills']['refill_table']==1){
            $input['refill_start_date']=$dateFilter['refills']['refill_start_date'];
            $input['refill_end_date']=$dateFilter['refills']['refill_end_date'];

            $refillData = $this->refillRepository->refillChartData($input)
                ->select(
                    [
                        DB::raw('COUNT(refills.id) AS total_refill'),
                        DB::raw('DATE(refills.refill_datetime) AS refill_date'),
                        'refills.user_id',
                        DB::raw("users.name AS user_name")
                    ]
                )
                ->groupBy(DB::raw('DATE(refills.refill_datetime)'))
                ->groupBy('refills.user_id')
                ->get()->toArray();
        }

        if($dateFilter['refill_summaries']['refill_summary_table']==1){
            $input['refill_start_date']=$dateFilter['refill_summaries']['refill_start_date'];
            $input['refill_end_date']=$dateFilter['refill_summaries']['refill_end_date'];

            $refillSummaryData = $this->refillSummaryRepository->refillSummaryChartData($input)
                ->select(
                    [
                        DB::raw('SUM(refill_summaries.total_refill) AS total_refill'),
                        'refill_summaries.refill_date',
                        'refill_summaries.user_id',
                        DB::raw("users.name AS user_name")
                    ]
                )
                ->groupBy('refill_summaries.refill_date')
                ->groupBy('refill_summaries.user_id')
                ->get()->toArray();
        }

        return array_merge($refillSummaryData, $refillData);
    }
}