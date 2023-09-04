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
        $temp = array_slice($this->larasheetsService->getAll(), 1);
        $result = array_reduce($temp, function ($carry, $item) {
            $am = $item['AM UPDATE'];
            $segment = $item['SEGMEN 2'];
            if ($am == "" || $segment == "") {
                return $carry;
            }
            // if ($am !== 'IRFAN') {
            //     return $carry;
            // }

            if (!isset($carry['am'])) {
                $carry['am'] = [];
                $carry['segment'] = [];
            }
            if (!isset($carry['am'][$am])) {
                $carry['am'][$am] = ['count_tagihan' => 0, 'count_tunggakan' => 0, 'sum_tagihan' => 0, 'sum_tunggakan' => 0];
            }
            if (!isset($carry['segment'][$segment])) {
                $carry['segment'][$segment] = ['count_tagihan' => 0, 'count_tunggakan' => 0, 'sum_tagihan' => 0, 'sum_tunggakan' => 0];
            }

            $tagihan = intval(str_replace('.', '', $item['0-3 Bulan']));
            $tunggakan = 0;
            $columnsToCheck = ['4-6 Bulan', '7-12 Bulan', '13-24 Bulan', '> 24 Bulan'];
            $counted = false;
            foreach ($columnsToCheck as $column) {
                $value = intval(str_replace('.', '', $item[$column]));
                if ($value !== 0) {
                    if (!$counted) {
                        $carry['am'][$am]['count_tunggakan'] = $carry['am'][$am]['count_tunggakan'] + 1;
                        $carry['segment'][$segment]['count_tunggakan'] = $carry['segment'][$segment]['count_tunggakan'] + 1;
                        $counted = true;
                    }
                    $tunggakan += $value;
                }
            }
            $carry['am'][$am]['sum_tagihan'] += $tagihan;
            $carry['am'][$am]['sum_tunggakan'] += $tunggakan;
            $carry['segment'][$segment]['sum_tagihan'] += $tagihan;
            $carry['segment'][$segment]['sum_tunggakan'] += $tunggakan;
            if ($tagihan < 1) {
                return $carry;
            }
            $carry['am'][$am]['count_tagihan'] += 1;
            $carry['segment'][$segment]['count_tagihan'] += 1;
            return $carry;
        }, []);
        return response()->json(['data' => $result]);
    }
}
