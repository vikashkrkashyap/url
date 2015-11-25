<?php

namespace App\Http\Controllers\API;

use App\Hit;
use App\Key;
use App\Redirected_websites;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Ucut\Transformers\BrowserTransformer;
use Ucut\Transformers\CityTransformer;
use Ucut\Transformers\CountryTransformer;
use Ucut\Transformers\HitsTransformer;
use Ucut\Transformers\OsTransformer;

/**
 * Class AnalyticsController
 * @package App\Http\Controllers\API
 */
class AnalyticsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $hitsTransformer;
    /**
     * @var CityTransformer
     */
    protected $cityTransformer;
    /**
     * @var
     */
    protected $countryTransformer;
    /**
     * @var
     */
    protected $browserTransformer;
    /**
     * @var
     */
    protected $osTransformer;

    /**
     * AnalyticsController constructor.
     * @param $hitsTransformer
     */
    public function __construct(HitsTransformer $hitsTransformer, CityTransformer $cityTransformer,CountryTransformer $countryTransformer,
                                BrowserTransformer $browserTransformer,OsTransformer $osTransformer)
    {
        $this->hitsTransformer = $hitsTransformer;
        $this->cityTransformer = $cityTransformer;
        $this->countryTransformer = $countryTransformer;
        $this->browserTransformer = $browserTransformer;
        $this->osTransformer = $osTransformer;
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

        $hits_count = Hit::all()->count();

        //Jit vs time
        $hits = Hit::where('url_id',$url->id)->select(DB::raw('date(created_at) as date'), DB::raw('count(id) as hits'))
            ->groupBy(DB::raw('date(created_at)'))->distinct()->get();

        //Referral websites Data
        $referral_data =Redirected_websites::where('url_id',$url->id)->select(DB::raw('website_name as website'), DB::raw('count(website_name) as hits'))
            ->groupBy('website_name')->distinct()->get();

        //country vs hits graph
        $country_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('(select(country_name) from countries where id =country_id) as country'),
            DB::raw('count(country_id) as hits'))
            ->groupBy('country')->distinct()->get();
        //city vs hits graph
        $city_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('(select(city_name) from cities where id =city_id) as city'),
            DB::raw('count(city_id) as hits'))
            ->groupBy('city')->distinct()->get();

        //Browser vs hits graph
        $browser_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('(select(browser_name) from browsers where id =browser_id) as browser'),
            DB::raw('count(browser_id) as hits'))
            ->groupBy('browser')->distinct()->get();

        //Operating System vs hits graph
        $os_data = Redirected_websites::where('url_id',$url->id)->select(DB::raw('(select(operating_system) from operating_systems where id = os_id) as os'),
            DB::raw('count(os_id) as hits'))
            ->groupBy('os')->distinct()->get();

        //platform Data
        $query1 = Redirected_websites::where('url_id',$url->id)->select(DB::raw('"Desktop"  as device'),DB::raw('count(is_desktop) as hit'))->where('is_desktop',1)
            ->groupBy('is_desktop')->get();

        $query2 = Redirected_websites::where('url_id',$url->id)->select(DB::raw('"Mobile"  as device'),DB::raw('count(is_mobile) as hits'))->where('is_mobile',0)
            ->groupBy('is_mobile')->get();
        $query3 = Redirected_websites::where('url_id',$url->id)->select(DB::raw('"Tablet"  as device'),DB::raw('count(is_tablet) as hits'))->where('is_tablet',0)
            ->groupBy('is_tablet')->get();

        $platform = array();
        array_push($platform,['Desktop' =>$query1, 'Mobile' =>$query2,'Tablet' =>$query3]);



        return response()->json([
            'Total_hits'=>$hits_count,
            'Hits_data'=>$this->hitsTransformer->transform($hits),
            'City_data' =>$this->cityTransformer->transform($city_data),
            'Country_data' =>$this->countryTransformer->transform($country_data),
            'Browser_data' =>$this->browserTransformer->transform($browser_data),
            'Os_data' =>$this->osTransformer->transform($os_data),
            'Platforms_visit'=>$platform

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
