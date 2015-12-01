<?php

namespace App\Http\Controllers;
use App\Browser;
use App\City;
use App\Country;
use App\Hit;
use App\Key;
use App\Operating_system;
use App\Redirected_websites;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;
use hisorange\BrowserDetect\Facade\parser;
use Torann\GeoIP\GeoIPFacade;

class UrlController extends MainController
{

    public function index(Request $request)
    {
        $url = $request->input('input_data');
        $title = "Ucut | Cut Your url";


        return view('url.index', compact('title','url'));

    }
    public function features(){
        $title = "Ucut | Features";
        return view('url.features',compact('title'));
    }
    public function pricing(){
        $title = "Ucut | Pricing";
        return view('url.pricing',compact('title'));
    }
    public function team(){
        $title = "Ucut | Who we are";
        return view('url.team',compact('title'));
    }
    //saving the data in database

    public function show(Request $request)
    {

//
        $url = $request->input('input_data');

        $key = $this->getUniqueRandomKey();


        if ($request->ajax()) {

            $data = new key;
            $data->url = $url;
            $data->key = $key;
            $data->user_id='1';
            $data->ip = $request->getClientIp();
            $data->save();

            //checking the url repetition and if repeated then returning the old one

            if($this->checkUrlRepetition($url))
            {
                $repeated_key = DB::table('keys')->where('keys.url','=',$url)->value('key');

                $full_url = "http://ucut.in/" . $repeated_key;

            }
            else{
                $full_url = "http://ucut.in/" . $key;
            }

            return response()->json([
                'message' => 'created',
                'url' => $full_url
              ]);

        }


    }


    public function hash(Request $request,$key)
    {
        $link = DB::table('keys')->where('key', '=', $key)->get();

        if ($link) {

            $current_ip = $request->getClientIp();
            $test = app('Illuminate\Routing\UrlGenerator')->previous();



            // $name = $this->get_title($test);
            $name = 'google.com';
            $location = GeoIPFacade::getLocation('202.142.69.126');
            $os_info = parser::detect();

            //City data
            if(!City::where('city_name',$location['city'])->count())
            {
                $city = new City;
                $city_id = $city->insertGetId([
                    'city_name' => $location['city']
                 ]);
            }
            else
            {
                $city_id = City::where('city_name',$location['city'])->value('id');
            }

            //Country Data

            if(!Country::where('country_name',$location['country'])->count())
            {
                $country = new Country;
                $country_id = $country->insertGetId([
                     'country_name' => $location['country']
                ]);
            }
            else
            {
                $country_id = Country::where('country_name',$location['country'])->value('id');
            }

            //Os Data

            if(!Operating_system::where('operating_system',$os_info['osFamily'])->count())
            {
                $os = new Operating_system;
                $os_id = $os->insertGetId([
                       'operating_system' => $os_info['osFamily']
                ]);
            }
            else
            {
                $os_id = Operating_system::where('operating_system',$os_info['osFamily'])->value('id');
            }

            //Browser_data

            if(!Browser::where('browser_name',$os_info['browserFamily'])->count())
            {
                $browser = new Browser;
                $browser_id =$browser->insertGetId([
                          'browser_name' => $os_info['browserFamily']
                ]);
            }
            else
            {
                $browser_id = Browser::where('browser_name',$os_info['browserFamily'])->value('id');
            }


            //Redirected Website data

                $website_hits = new Redirected_websites;
                $website_hits->user_id =$link[0]->user_id;
                $website_hits->url_id = $link[0]->id;
                $website_hits->city_id = $city_id;
                $website_hits->country_id = $country_id;
                $website_hits->website_url = $test;
                $website_hits->website_name = $name;
                $website_hits->browser_id = $browser_id;
                $website_hits->os_id = $os_id;
                $website_hits->is_mobile = $os_info['isMobile'];
                $website_hits->is_tablet = $os_info['isTablet'];
                $website_hits->is_desktop = $os_info['isDesktop'];

            //Hits data
                $data = new Hit;
                $data->url_ip = $current_ip;
                $data->url_id = $link[0]->id;
                $data->save();
                $website_hits->save();


            //Deep linking


            if (parser::isMobile()) {
                if (parser::osFamily() == 'Apple iOS') {
                    //link for apple store
                } elseif (parser::osFamily() == 'Windows') {
                    return redirect('https://www.microsoft.com/en-us/store/apps/google/9wzdncrfhx3w');
                } elseif (parser::osFamily() == 'Blackberry') {
                    //link for blackberry store
                } elseif (parser::osFamily() == 'AndroidOS') {
                    return redirect('https://play.google.com/store/apps/details?id=com.facebook.katana&hl=en');
                }


            }

                if(parser::isMobile())
                {
                    if(parser::osFamily() == 'Apple iOS')
                    {
                        //link for apple store
                    }
                    elseif(parser::osFamily() == 'Windows')
                    {
                        return redirect('https://www.microsoft.com/en-us/store/apps/google/9wzdncrfhx3w');
                    }
                    elseif(parser::osFamily() == 'Blackberry')
                    {
                        //link for blackberry store
                    }
                    elseif(parser::osFamily() == 'AndroidOS')
                    {
                        return redirect('https://play.google.com/store/apps/details?id=com.facebook.katana&hl=en');
                    }

                 }
                 else {
                     return redirect($link[0]->url);

                 }
        }
        else
        {
            return redirect('/');
        }
    }

}
