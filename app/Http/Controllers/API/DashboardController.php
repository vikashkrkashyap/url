<?php

namespace App\Http\Controllers\API;
use App\Key;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Ucut\Transformers\DashboardTransformer;


class DashboardController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** @var
     * Ucut/Transformers/DashboardTransformers
     */

    protected $dashboardTransformer;

    /**
     * DashboardController constructor.
     * @param $dashboardTransformer
     */
    public function __construct(DashboardTransformer $dashboardTransformer)
    {
        $this->dashboardTransformer = $dashboardTransformer;
    }


    public function index()
    {
        $input = Input::get('user_id');


        if ($input) {

            $user_id = DB::table('users')->lists('id');

            if(in_array($input,$user_id))
            {
                $key = Key::where('user_id', '=', $input)->get();

                if (count($key)) {

                    return response()->json([

                        'data' => $this->dashboardTransformer->transformCollection($key->toArray())
                    ]);

                } else {

                    return $this->setStatusCode(201)->responseNotFound("No Url shorted by User");

                }
            }

            else{

                return $this->setStatusCode(404)->responseNotFound("User Doesn't Exist!");
            }
        }

        else {

           return $this->setStatusCode(400)->responseNotFound('Invalid Request');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // if ($request->ajax()) {

            $key = $this->getUniqueRandomKey();
            $url = $request->input('user_url');

            $data = new Key;
            $data->url = $url;
            $data->user_id =$request->input('user_id');
            $data->ip = $request->getClientIp();
            $data->key = $key;
            $data->save();


            //checking the url repetition and if repeated then returning the old key


            if($this->checkUserUrlRepetition($url))
            {
                $repeated_key = DB::table('keys')->where('keys.url','=',$url)->where('user_id','=',2)->value('key');

                $full_url = "http://ucut.in/" . $repeated_key;

            }
            else{
                $full_url = "http://ucut.in/" . $key;
            }
            return response()->json([
                'message' => 'successful',
                'url' => $full_url

            ]);
        //}

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Key::where('user_id','=', 2)->find('id');

        Key::destroy($id);
    }

}
