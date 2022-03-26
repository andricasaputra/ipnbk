<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::whereIsOpen(1)->first();

        return view('survey.survey')
            ->withJadwal($jadwal)
            ->withUser(Auth::user())
            ->withQuestions(Question::all())
            ->withImages($this->surveyImagesIcon());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            foreach ($request->all() as $key => $value) {

               Result::updateOrCreate(
                [
                    'question_id' => $value['question_id'],
                    'responden_id' => $value['responden_id']
                ],
                [
                   'answer_id' => $value['answer_id'], 
                    'ipnbk_id' => $value['ipnbk_id']
                ]
               );
            }

            DB::commit();

            return response()->json([
                'success' => true
            ]);

        } catch(Exception $e) {

            DB::rollback();
            throw $e;
        }

    }

    public function success()
    {
        return view('survey.success');
    }

    public function done()
    {
        return view('survey.done_survey');
    }

    public function closed()
    {
        return view('survey.closed');
    }

    protected function surveyImagesIcon()
    {
        return [
            'assets/images/man.png',
            'assets/images/no-energy.png',
            'assets/images/boy.png',
            'assets/images/drink.png'
        ];
    }
}
