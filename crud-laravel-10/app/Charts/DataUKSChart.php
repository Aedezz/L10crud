<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Book as ModelsBook;
use Carbon\Carbon;

class DataUKSChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        $dataBulan = [];
        $dataTotalUKS = [];

        for ($i = 1; $i <= $bulan; $i++) {
            $totalUKS = ModelsBook::whereYear('created_at', $tahun)
                                  ->whereMonth('created_at', $i)
                                  ->sum('nis');

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalUKS[] = $totalUKS;
        }

        return $this->chart->barChart()
            ->setTitle('Data UKS Bulanan.')
            ->setSubtitle('Total Data UKS tiap bulan')
            ->addData('Total UKS', $dataTotalUKS)
            ->setXAxis($dataBulan);
    }
}
