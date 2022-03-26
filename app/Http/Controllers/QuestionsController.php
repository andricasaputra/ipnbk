<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer as Jawaban;
use App\Models\Question as Pertanyaan;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = Pertanyaan::all();

        return view('admin.question.index')->withQuestions($question);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $answers = Jawaban::all();
        
        return view('admin.question.create')->withAnswers($answers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'pertanyaan' => 'required|min:10',
            'jawabans' => 'required',
            'nilai' => 'required'
        ]);

        DB::beginTransaction();

        try {

            $question = Pertanyaan::create([
                'question' => $request->pertanyaan
            ]);

            $answers = collect($request->jawabans)->map(function($answer, $index) use ($request) {
 
                $penjelasan = $request->penjelasan[$index];
                $nilai = $request->nilai[$index];

                return [
                    'answer' => $answer,
                    'penjelasan' => $penjelasan,
                    'nilai' => $nilai
                ];

            });

            $question->answer()->createMany($answers);

            DB::commit();

        } catch(Exception $e) {

            DB::rollback();
            throw $e;
        }

        return redirect(route('admin.question.index'))
                ->withSuccess('Berhasil Tambah pertanyaan!');
    }

    public function show(Pertanyaan $question)
    {
        return view('admin.question.show')
                ->withQuestion($question)
                ->withAnswers($question->answer()->orderBy('id', 'asc')->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $question)
    {
        $answers = $question->answer;

        return view('admin.question.edit')
                ->withQuestion($question)
                ->withAnswers($answers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $question)
    {
        $request->validate([

            'pertanyaan' => 'required|min:10',
            'jawabans' => 'required'
        ]);

        DB::beginTransaction();

        try {

            $question->question = $request->pertanyaan;

            $question->save();

            $question->answer()->delete();

            $answers = collect($request->jawabans)->each(function($answer, $index) use ($request, $question) {
 
                $penjelasan = $request->penjelasan[$index];

                $nilai = $request->nilai[$index];

                $question->answer()->create([
                    'question_id' => $question->id, 
                    'answer' => $answer, 
                    'penjelasan' => $penjelasan,
                     'nilai' => $nilai
                ]);

            });

            DB::commit();

        } catch(Exception $e) {

            DB::rollback();
            throw $e;
        }

        return redirect(route('admin.question.index'))
                ->withSuccess('Berhasil Tambah pertanyaan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $question)
    {
        $question->answer()->delete();

        $question->delete();

        return redirect(route('admin.question.index'))
                ->withSuccess('Data Berhasil Dihapus!');
    }
}
