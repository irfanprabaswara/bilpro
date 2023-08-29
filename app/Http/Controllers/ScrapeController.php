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
        return response()->json(['message' => $this->larasheetsService->getAll()]);
    }
}
