<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use one2tek\larasheets\Services\LarasheetsService;

class ScrapeController extends Controller
{
    private $larasheetsService;
    public function scrapeData(Request $request)
    {
        $spreadsheetId = '1wPJ22IagwOml8Au4qeHZ56KQ65dOnH560osSYrkDpS0';
        $sheetName = 'DATA ALL';
        $headers = ['Partner', 'Idnumber', 'BPName', 'Account Name', 'Subsegmen', 'Business Share', 'Divisi', 'Witel', 'Cicilan', 'Bill Curr', 'Saldo Akhir N-1', 'Tagihan N', 'Total Tagihan', 'Total CL', 'Saldo Akhir', '0-3 Bulan', '4-6 Bulan', '7-12 Bulan', '13-24 Bulan', '> 24 Bulan', 'L11 Saldo', 'STATUS 1', '"UPDATE" TUNGGAKAN', 'TGL UPDATE', 'STATUS 2', 'SEGMEN 2', 'AM UPDATE', 'NAMA PELANGGAN', 'STO', 'HERO', 'DATEL'];

        $this->larasheetsService = new LarasheetsService($spreadsheetId, $sheetName, $headers);
        $temp = $this->larasheetsService->getAll();
        return response()->json(['message' => $this->larasheetsService->getAll()]);
    }
    public function getSummary(Request $request)
    {
        $spreadsheetId = '1wPJ22IagwOml8Au4qeHZ56KQ65dOnH560osSYrkDpS0';
        $sheetName = 'DATA ALL';
        $headers = ['Partner', 'Idnumber', 'BPName', 'Account Name', 'Subsegmen', 'Business Share', 'Divisi', 'Witel', 'Cicilan', 'Bill Curr', 'Saldo Akhir N-1', 'Tagihan N', 'Total Tagihan', 'Total CL', 'Saldo Akhir', '0-3 Bulan', '4-6 Bulan', '7-12 Bulan', '13-24 Bulan', '> 24 Bulan', 'L11 Saldo', 'STATUS 1', '"UPDATE" TUNGGAKAN', 'TGL UPDATE', 'STATUS 2', 'SEGMEN 2', 'AM UPDATE', 'NAMA PELANGGAN', 'STO', 'HERO', 'DATEL'];

        $this->larasheetsService = new LarasheetsService($spreadsheetId, $sheetName, $headers);
        $temp = $this->larasheetsService->getAll();
        // Initialize arrays for the two formats
$segmentSumFormat = [];
$amCountFormat = [];

// Use array_reduce to calculate sums and counts by 'SEGMEN 2' and 'AM UPDATE'
$result = array_reduce($temp, function ($carry, $item) use (&$segmentSumFormat, &$amCountFormat) {
    $segment = $item['SEGMEN 2'];
    $amUpdate = $item['AM UPDATE'];

    if (!isset($carry[$segment])) {
        $carry[$segment] = [];
    }

    if (!isset($carry[$segment][$amUpdate])) {
        $carry[$segment][$amUpdate] = [
            '0-3 Bulan' => ['Sum' => 0, 'Count' => 0],
            '4-6 Bulan' => ['Sum' => 0, 'Count' => 0],
            '7-12 Bulan' => ['Sum' => 0, 'Count' => 0],
            '13-24 Bulan' => ['Sum' => 0, 'Count' => 0],
            '> 24 Bulan' => ['Sum' => 0, 'Count' => 0],
        ];
    }

    // Add the values to the corresponding segments if they are numeric
    if (is_numeric($item['0-3 Bulan'])) {
        $carry[$segment][$amUpdate]['0-3 Bulan']['Sum'] += $item['0-3 Bulan'];
        $carry[$segment][$amUpdate]['0-3 Bulan']['Count']++;
    }

    if (is_numeric($item['4-6 Bulan'])) {
        $carry[$segment][$amUpdate]['4-6 Bulan']['Sum'] += $item['4-6 Bulan'];
        $carry[$segment][$amUpdate]['4-6 Bulan']['Count']++;
    }
    if (is_numeric($item['7-12 Bulan'])) {
        $carry[$segment][$amUpdate]['7-12 Bulan']['Sum'] += $item['7-12 Bulan'];
        $carry[$segment][$amUpdate]['7-12 Bulan']['Count']++;
    }

    if (is_numeric($item['13-24 Bulan'])) {
        $carry[$segment][$amUpdate]['13-24 Bulan']['Sum'] += $item['13-24 Bulan'];
        $carry[$segment][$amUpdate]['13-24 Bulan']['Count']++;
    }

    if (is_numeric($item['> 24 Bulan'])) {
        $carry[$segment][$amUpdate]['> 24 Bulan']['Sum'] += $item['> 24 Bulan'];
        $carry[$segment][$amUpdate]['> 24 Bulan']['Count']++;
    }

    // Build the segment sum format
    if (!isset($segmentSumFormat[$segment])) {
        $segmentSumFormat[$segment] = [];
    }
    foreach ($carry[$segment][$amUpdate] as $key => $value) {
        if (!isset($segmentSumFormat[$segment][$key])) {
            $segmentSumFormat[$segment][$key] = 0;
        }
        $segmentSumFormat[$segment][$key] += $value['Sum'];
    }

    // Build the am count format
    if (!isset($amCountFormat[$amUpdate])) {
        $amCountFormat[$amUpdate] = [];
    }
    foreach ($carry[$segment][$amUpdate] as $key => $value) {
        if (!isset($amCountFormat[$amUpdate][$key])) {
            $amCountFormat[$amUpdate][$key] = 0;
        }
        $amCountFormat[$amUpdate][$key] += $value['Count'];
    }
    return $carry;
}, []);
        dd($amCountFormat, $segmentSumFormat);
        return response()->json(['data' => $result]);
    }
}
