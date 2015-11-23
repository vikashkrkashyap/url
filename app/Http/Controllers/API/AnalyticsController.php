<?php

namespace App\Http\Controllers\API;

use App\Hit;
use App\Key;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Ucut\Transformers\HitsTransformer;

class AnalyticsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $hitsTransformer;

    /**
     * AnalyticsController constructor.
     * @param $hitsTransformer
     */
    public function __construct(HitsTransformer $hitsTransformer)
    {
        $this->hitsTransformer = $hitsTransformer;
    }

    public function index()
    {
        $user_id = Input::get('user_id');
        $url_id = Input::get('url_id');


       if($this->checkUrlId($url_id) AND $this->checkUserId($user_id))
       {return 'ok';}
        elseif($this->checkUrlId($url_id) && !$this->checkUserId($user_id))
        {return 'user nahi h url h';}
       elseif(!$this->checkUrlId($url_id) && $this->checkUserId($user_id))
       {return 'user h url nahi h';}
        else{return 'kuch nahi'; }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = Key::findOrFail($id);

        $hits = Hit::where('url_id',$url->id)->select(DB::raw('date(created_at) as date'), DB::raw('count(id) as hits'))
            ->groupBy(DB::raw('date(created_at)'))->distinct()->get();

        return response()->json([
            'hits_data'=>$this->hitsTransformer->transform($hits),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
