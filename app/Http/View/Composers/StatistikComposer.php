<?php

namespace App\Http\View\Composers;

use App\Models\Jadwal;
use App\Models\Question;
use App\Http\Controllers\StatistikController as Statistik;

class StatistikComposer
{
    /**
     * The answer repository implementation.
     *
     * @var AnswerRepository
     */
    protected static $data;

    public static function construct(Statistik $data)
    {
        static::$data = $data;

        return new static;       
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose()
    {
        view()->composer('admin.statistik.index', function ($view){

            $view->with('id', static::$data->id); 

            $view->with('questions', Question::all());

            $view->with('ikm', Jadwal::select('id', 'keterangan')->get());

            $view->with('ikm_ket', Jadwal::select('keterangan')->whereId(static::$data->id)->first()); 
        });     
    }
}