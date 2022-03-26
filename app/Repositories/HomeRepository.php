<?php 

namespace App\Repositories;

use App\Models\Jadwal;
use App\Models\Result;
use App\Traits\Repository;
use App\Models\Question;
use App\Models\Responden;
use App\Contracts\RepositoryInterface;

class HomeRepository implements RepositoryInterface
{
	use Repository;

    /**
     * Untuk API IKM yang dipilih berdasarkan table responden (database), default id 1 
     * Digunakan pada table halaman dashboard / home
     *
     * @param int $ipnbkId
     * @return collections of Datatables 
     */
	public function api(int $ipnbkId = null)
    {
        $ipnbkId 		= $ipnbkId ?? 1;

        $responden  = Responden::whereipnbkId($ipnbkId)->latest()->get();

        return  datatables($responden)->addIndexColumn()
                ->addColumn('action', function ($responden) use ($ipnbkId) {
                    return '
                    <a href="'.route('intern.ikm.home.edit', $responden->id).'" class="btn btn-xs btn-primary">
                        <i class="glyphicon glyphicon-edit"></i> Edit
                    </a>
                    <a href="'.route('intern.ikm.home.show', [$responden->id, $ipnbkId]).'" class="btn btn-xs btn-success">
                        <i class="glyphicon glyphicon-eye-open"></i> Detail
                    </a>
                    <a href="#" data-id = "'.$responden->id.'"  class="btn btn-danger btn-xs" id="deleteIkm">
                        <i class="glyphicon glyphicon-trash"></i> Delete
                    </a>';
                })->make(true);
    }

    /**
     * Untuk Detail API Per Responden, menampilkan jawaban dan nilai dari responden 
     *
     * @param int $id
     * @param int $ipnbkId
     * @return collections of Datatables 
     */
    public function detailApi(int $id, int $ipnbkId)
    {
        $result =  Result::whereIn('responden_id', [$id])->whereipnbkId($ipnbkId)->get();

        return datatables($result)->addIndexColumn()->make(true);
    }

    /**
     * Untuk update jawaban responden 
     *
     * @param Request $request
     * @param instance of App\Models\Responden
     * @return bool
     */
    public function update($request, $responden)
    {
    	$answer 	= $request->except(['responden_id','submit','_method','_token']);

        $combined 	= Question::select('id')->get()->map(function($question){

            return $question->id;

        })->combine(collect($answer)->flatMap(function($value){

            return $value;

        }));

        foreach ($combined as $key => $value) {

            $result 			= Result::whereRespondenId($responden->id)
                        			->whereQuestionId($key)
                        			->first();

            $result->answer_id 	= $value;

            $result->save();

        }

        return true;
    }

}