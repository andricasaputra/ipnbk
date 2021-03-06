<?php 

namespace App\Http\Controllers;

use App\Repositories\GrafikRepository;

class GrafikController
{
    /**
     * For keep repository instance on the bag
     *
     * @var App\Repositories\UserRepository
     */
    private $repository;

    /**
     * Save id IKM 
     *
     * @var int
     */
    private $id;

    /**
     * Set what repositories should use for this class
     *
     * @return App\Repositories Instance!
     */
    public function __construct(GrafikRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id = null)
    {
    	$this->id      = $id ?? $this->repository->default();

    	$keterangan    = $this->repository->getKeterangan($this->id);
        
    	return view('admin.grafik.index')->withKeterangan($keterangan);	           
    }

    /**
     * Create JSON chart data
     *
     * @return \Illuminate\Http\Response
     */
    public function chartApi(int $id = null)
    {
    	$this->id = $id ?? $this->repository->default();

        return $this->repository->chartApi($this->id);
    }

}
