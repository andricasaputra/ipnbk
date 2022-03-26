<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Jadwal;
use App\Models\Result;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Http\Request;
use App\Repositories\HomeRepository;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('admin.home.index')
                ->with('ipnbk', $jadwal)
                ->withTotalResponden($this->totalResponden())
                ->withTotalQuestion($this->totalQuestion());
    }

    protected function totalResponden()
    {   
        return Result::countResponden()->get()->count();   
    }

    protected function totalQuestion()
    {   
        return Result::countQuestion()->get()->count();   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Responden $responden, int $year)
    {
        return view('admin.home.show')
                ->with(compact('responden', 'year'));
    }

    /**
     * Set default ipnbk id jika tidak ada yang terpilih
     *
     * @return int
     */
    private function setIpnbkId()
    {
        return Jadwal::active()->first() ?? 1;
    }
}
