<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use one2tek\larasheets\Services\LarasheetsService;

class ScrapController extends Controller
{
    private $larasheetsService;
    public function scrapData(Request $request)
    {
        $spreadsheetId = '1wPJ22IagwOml8Au4qeHZ56KQ65dOnH560osSYrkDpS0';
        $sheetName = 'DATA ALL';
        $headers = ['Partner'];

        $this->larasheetsService = new LarasheetsService($spreadsheetId, $sheetName, $headers);
        // Lakukan proses scraping atau tugas yang Anda inginkan di sini
        // Misalnya:
        // $scrapedData = ... // Lakukan scraping menggunakan library atau kode Anda sendiri
        // return view('hasil_scraping', compact('scrapedData'));
        // dd("kepo");
        return response()->json(['message' => $this->larasheetsService->getAll()]);
    }

}
