<?php

namespace App\Http\View\Composers;

use App\Models\Jadwal;
use App\Models\Question;
use App\Models\Responden;
use App\Http\Controllers\SurveyPageController as Survey;

class SurveyPageComposer
{
    /**
     * The answer repository implementation.
     *
     * @var Survey $data
     */
    protected static $data;

    /**
     * Class Setter, act like constructor
     *
     * @return this
     */
    public static function construct(Survey $data)
    {
        static::$data = $data;

        return new static;       
    }

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose()
    {
        view()->composer('admin.survey', function ($view){

            $umur       = Umur::all();
            $layanan    = Layanan::all();
            $pekerjaan  = Pekerjaan::all();
            $pendidikan = Pendidikan::all();
            $is_open    = Jadwal::active()->first();
            $questions  = Question::with('answer')->get();

            $view->with(compact('is_open', 'questions', 'layanan', 'umur', 'pendidikan', 'pekerjaan'));
            
        });     
    }

    /**
     * Bind data to the view cetak.
     *
     * @param Responden $responden
     * @return void
     */
    public function composeCetak(Responden $responden)
    {
        view()->composer('admin.cetak', function ($view) use ($responden) {

            $answers         = $responden->answer;
            $question_answer = Question::with('question_answer')->get();

            $view->with(compact('responden', 'answers', 'question_answer'));
            
        }); 
    }

    /**
     * Bind data to the view success.
     *
     * @param Responden $responden
     * @return void
     */
    public function composeSuccess(Responden $responden)
    {
        view()->composer('admin.success', function ($view) use ($responden) {

            $view->with(compact('responden'));
            
        }); 
    }
}