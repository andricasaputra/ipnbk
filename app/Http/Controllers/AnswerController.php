<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer as Jawaban;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $answers = Jawaban::all();

        return view('admin.answer.index')->withAnswers($answers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jawaban $answer)
    {
        return view('admin.answer.edit')->withAnswer($answer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jawaban $answer)
    {
        $request->validate([

            'jawaban' => 'required|min:4|max:20',
            'nilai' => 'required'

        ]);

        $answer->answer = $request->jawaban;

        $answer->save();

        return redirect(route('admin.answer.index'))
                ->withSuccess('Berhasil Ubah Jawaban!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawaban $answer)
    {
        $answer->delete();

        return redirect(route('admin.answer.index'))
                ->withSuccess('Data Berhasil Dihapus!');
    }
}
