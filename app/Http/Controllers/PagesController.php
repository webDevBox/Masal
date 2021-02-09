<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\products;
use App\Category;
use App\country;
use App\state;
use App\fabric;
use App\neckline;
use App\silhouette;
use App\sleeve;
use App\city;
use App\buyer_country;
use App\buyer_state;
use App\buyer_city;
use App\User;
use App\feedback;
use App\visitor;
use App\homePage;
use App\footer;
use App\real;
use App\wedding;
use App\sale;
use App\retailer_bride;
use App\emails;
use App\menu;
class PagesController extends Controller
{

    public function real()
    {
       $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
       $latestProduct=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $real=real::all();
        $collection=Category::all();
        $foot=footer::where('id',1)->first();
        $retailer_real=retailer_bride::where('status',2)->get();
        $wedding=wedding::get();
        return view('pages.real')->with(array('wedding'=>$wedding,'retailer_real'=>$retailer_real,'foot'=>$foot,'collection'=>$collection,'gallery'=>$gallery,'latestProduct'=>$latestProduct,'real'=>$real));
    }


    public function wedding_detail($id)
    {
       $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
       $latestProduct=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $real=real::all();
        $collection=Category::all();
        $foot=footer::where('id',1)->first();
        $retailer_real=retailer_bride::where('status',2)->where('wedding',$id)->get();
        $wedding=wedding::find($id);
        return view('pages.wedding')->with(array('wedding'=>$wedding,'retailer_real'=>$retailer_real,'foot'=>$foot,'collection'=>$collection,'gallery'=>$gallery,'latestProduct'=>$latestProduct,'real'=>$real));
    }




    public function index()
    {
        $country=buyer_country::get();
        $user=User::where('userRole',2)->where('status',1)->get();
        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $collection=Category::all();
        $foot=footer::where('id',1)->first();
        $menu=menu::where('header_status',1)->where('status',1)->get();
        return view('pages.wherebuy')->with(array('menu'=>$menu,'foot'=>$foot,'collection'=>$collection,'gallery'=>$gallery,'country'=>$country,'user'=>$user));
    }
   
    // public function find_buy(Request $request)
    // {
    //     $country=buyer_country::get();

    //     $search_country=buyer_country::where('country',$request->search)->first();
    //     $search_state=buyer_state::where('state',$request->search)->first();
    //     $search_city=buyer_city::where('city',$request->search)->first();
        
    //     $user=User::where('userRole',2)->where('status',1)->get();
    //     $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
    //     $collection=Category::all();
    //     $foot=footer::where('id',1)->first();
    //     $menu=menu::where('header_status',1)->where('status',1)->get();
    //     return view('pages.wherebuy')->with(array('search_country'=>$search_country,'search_state'=>$search_state,
    //     'search_city'=>$search_city,'menu'=>$menu,'foot'=>$foot,'collection'=>$collection,
    //     'gallery'=>$gallery,'country'=>$country,'user'=>$user));
    // }

    public function statepicker(Request $request)
    {
        $state = '';
        if(isset($request['country']) && $request['country'] != '') {
            $state = buyer_state::orderBy('state', 'asc')->where('country', $request['country'])->get();
        }
        $data_array = [
            "success" => [
            "status" => "1",
            "states" => $state,
            ]
        ];
        return response()->json($data_array);

    }

    public function retailerstatepicker(Request $request)
    {
        $state = '';
        if(isset($request['country']) && $request['country'] != '') {
            $state = state::orderBy('name', 'asc')->where('country_id', $request['country'])->get();
        }
        $data_array = [
            "success" => [
            "status" => "1",
            "states" => $state,
            ]
        ];
        return response()->json($data_array);
    }

    public function cityPicker(Request $request)
    {
        $city = '';
        if(isset($request['state']) && $request['state'] != '') {
            $city = buyer_city::orderBy('city', 'asc')->where('state', $request['state'])->get();
        }
        $data_array = [
            "success" => [
            "status" => "1",
            "cities" => $city,
            ]
        ];
        return response()->json($data_array);

    }


    public function retailercitypicker(Request $request)
    {
        $city = '';
        if(isset($request['state']) && $request['state'] != '') {
            $city = city::orderBy('id', 'asc')->where('state_id', $request['state'])->get();
        }
        $data_array = [
            "success" => [
            "status" => "1",
            "cities" => $city,
            ]
        ];
        return response()->json($data_array);

    }



    public function home()
    {
        $latestCat=Category::orderBy('created_at', 'desc')->limit(8)->get();

        $latestProduct=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(8)->get();

        $smallProduct=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(8)->get();

        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();

        $collection=Category::all();
        $category=Category::orderBy('id','desc')->limit(3)->get();
        $country=buyer_country::all();
        $home=homePage::first();
        $foot=footer::where('id',1)->first();
        $visit=visitor::count();
        if($visit == 0)
        {
        $user=new visitor;
        $user->visitors=1;
        $user->save();
        }
        else
        {
            $data=visitor::first();
            $new=$data->visitors+1;
            visitor::where('id',1)->update(['visitors'=>$new]); 
        }
        return view('pages.index')->with(array('country'=>$country,'category'=>$category,'foot'=>$foot,'home'=>$home,'collection'=>$collection,'gallery'=>$gallery,'latestProduct'=>$latestProduct,'latestCat'=>$latestCat,'smallProduct'=>$smallProduct));
    }

    public function contact()
    {
        $latestCat=Category::orderBy('created_at', 'desc')->limit(8)->get();

       $latestProduct=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();

         $smallProduct=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(8)->get();

       $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $collection=Category::all();
        $foot=footer::where('id',1)->first();
        return view('pages.contact')->with(array('foot'=>$foot,'collection'=>$collection,'gallery'=>$gallery,'latestProduct'=>$latestProduct,'latestCat'=>$latestCat,'smallProduct'=>$smallProduct));
    }

    public function nav_collection($id)
    {
        $products=products::where('category',$id)->where('delete_status',0)->paginate(6);
        $collection=Category::all();
        $cat=Category::find($id);
        $seleve=sleeve::get();
        $fabric=fabric::get();
        $neck=neckline::get();
        $silhouette=silhouette::get();
        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $foot=footer::where('id',1)->first();

        return view('pages.collections')->with(array('seleve'=>$seleve,'fabric'=>$fabric,'neck'=>$neck,'silhouette'=>$silhouette,
        'foot'=>$foot,'collection'=>$collection,'cat'=>$cat,'gallery'=>$gallery,'products'=>$products));
    }
    
    
    public function filter(Request $request,$id)
    {
        $fabric = $request->fabric;
        $neckline = $request->neckline;
        $silhouette = $request->silhouette;
        $sleeve = $request->sleeve;
        $products=products::where('category',$id)->where('delete_status',0)->whereIn('silhouette',[$silhouette])
        ->orWhereIn('neckline',[$neckline])->orWhereIn('fabric',[$fabric])->orWhereIn('sleeve',[$sleeve])->paginate(6);
        $collection=Category::all();
        $cat=Category::find($id);
        $seleve=sleeve::get();
        $fabric=fabric::get();
        $neck=neckline::get();
        $silhouette=silhouette::get();
        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $foot=footer::where('id',1)->first();

        return view('pages.collections')->with(array('seleve'=>$seleve,'fabric'=>$fabric,'neck'=>$neck,'silhouette'=>$silhouette,
        'foot'=>$foot,'collection'=>$collection,'cat'=>$cat,'gallery'=>$gallery,'products'=>$products));
    }



   

    public function detail($id)
    {
       $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $detail=products::find($id);
        $collection=Category::all();
        $foot=footer::where('id',1)->first();
        $fabric=fabric::find($detail->fabric);
        $neck=neckline::find($detail->neckline);
        $seleve=sleeve::find($detail->sleeve);
        $silhouette=silhouette::find($detail->silhouette);
        return view('pages.detail')->with(array('fabric'=>$fabric,'neck'=>$neck,'seleve'=>$seleve,'silhouette'=>$silhouette,'foot'=>$foot,'collection'=>$collection,'gallery'=>$gallery,'detail'=>$detail));
    }


    public function mapper(Request $request)
    {
      if(isset($request->country))
      {
        $country1=buyer_country::get();
        $menu=menu::where('header_status',1)->where('status',1)->get();
        $collection=Category::all();
        $foot=footer::where('id',1)->first();
        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $this->validate($request,[
            'country'=>'required'
            ]);

            $countryPick=$request->country;
            $country_name=buyer_country::find($countryPick);
            $country=$country_name->country;

            if(isset($request->state))
            {
            $statePick=$request->state;
            $state_name=buyer_state::find($statePick);
            $state=$state_name->state;
            }

            if(isset($request->city))
            {
            $cityPick=$request->city;
            $city_name=buyer_city::find($cityPick);
            $city=$city_name->city;
            $result=User::where([
                ['city', '=', $city],
                ['state', '=', $state],
                ['country', '=', $country], 
                ['userRole', '=', 2], 
                ['status', '=', 1], 
            ])->get();
            $fullAddress = $city." ". $state." ".$country;
           
            $user=User::all();
            $cityclean = str_replace (" ", "+", $fullAddress);
        $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $cityclean . "&key=AIzaSyAUx-lN2Wy6w2C0f2o14A3GgY--AqGiXPc";
     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = json_decode(curl_exec($ch), true);
        $data = ["lat" => $geoloc['results'][0]['geometry']['location']['lat'], "lng" => $geoloc['results'][0]['geometry']['location']['lng']];
        $zoom=9;
        // var_dump($geoloc);
// var_dump($geoloc['results'][0]['geometry']['location']['lng']);
// die();   
       
return view('pages.retailersList')->with('country',$country1)->with('menu',$menu)->with('foot',$foot)->with('collection',$collection)->with('gallery',$gallery)->with('result',$result)->with('user',$user)->with('data',$data)->with('zoom',$zoom);
            }

            if(isset($request->state) && !isset($request->city))
            {
            $result=User::where([
                ['country', '=', $country],
                ['state', '=', $state], 
                ['userRole', '=', 2], 
                ['status', '=', 1], 
            ])->get();
            $user=User::all();
            $fullAddress = $state." ". $country;
            $cityclean = str_replace (" ", "+", $fullAddress);
        $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $cityclean . "&key=AIzaSyAUx-lN2Wy6w2C0f2o14A3GgY--AqGiXPc";
     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = json_decode(curl_exec($ch), true);
        $data = ["lat" => $geoloc['results'][0]['geometry']['location']['lat'], "lng" => $geoloc['results'][0]['geometry']['location']['lng']];
        $zoom=7;
            return view('pages.retailersList')->with('country',$country1)->with('menu',$menu)->with('foot',$foot)->with('collection',$collection)->with('gallery',$gallery)->with('result',$result)->with('user',$user)->with('data',$data)->with('zoom',$zoom);
            }

            

            if(isset($request->country))
            {
            $result=User::where([
                ['country', '=', $country],
                ['userRole', '=', 2], 
                ['status', '=', 1], 
                ])->get();
                $user=User::all();
                $cityclean = str_replace (" ", "+", $country);
        $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $cityclean . "&key=AIzaSyAUx-lN2Wy6w2C0f2o14A3GgY--AqGiXPc";
     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = json_decode(curl_exec($ch), true);

        $zoom=5;
        $data = ["lat" => $geoloc['results'][0]['geometry']['location']['lat'], "lng" => $geoloc['results'][0]['geometry']['location']['lng']];
      
            return view('pages.retailersList')->with('country',$country1)->with('menu',$menu)->with('foot',$foot)->with('collection',$collection)->with('gallery',$gallery)->with('result',$result)->with('user',$user)->with('data',$data)->with('zoom',$zoom);
            }
      }
      else
      {
        $get='Random';
        $menu=menu::where('header_status',1)->where('status',1)->get();
        $collection=Category::all();
        $foot=footer::where('id',1)->first();
        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();
        $result=User::where([
            ['country', '=', 'Australia'], 
            ['userRole', '=', 2], 
            ['status', '=', 1], 
        ])->get();
        $country='Australia';
        $cityclean = str_replace (" ", "+", $country);
        $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $cityclean . "&key=AIzaSyAUx-lN2Wy6w2C0f2o14A3GgY--AqGiXPc";
     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = json_decode(curl_exec($ch), true);

        $zoom=5;
        $data = ["lat" => $geoloc['results'][0]['geometry']['location']['lat'], "lng" => $geoloc['results'][0]['geometry']['location']['lng']];
        $user=User::all();
        $country=buyer_country::get();
        return view('pages.retailersList')->with('country',$country)->with('menu',$menu)->with('foot',$foot)->with('collection',$collection)->with('gallery',$gallery)
        ->with('result',$result)->with('get',$get)->with('user',$user)->with('data',$data)->with('zoom',$zoom);

      }
      
    }

    //Submit Feedback
    public function feedback(Request $request)
    {
      if(isset($request->submit))
      {
        $this->validate($request,[
            'email'=>'required',
            'message'=>'required'
            ]);
            $feedback=new feedback;
            $feedback->name=$request->name;
            $feedback->phone=$request->phone;
            $feedback->email=$request->email;
            $feedback->message=$request->message;
            $feedback->save();
            if($feedback->save())
            {
                $admin=User::where('userRole',1)->where('status',1)->get();
                $signature=emails::where('name','Signature')->first();
                $ender=' ';
                if($signature->status == 1)
                {
                $ender=$signature->message;
                }
                    foreach($admin as $row)
                    {
                    $mail=[
                        'title'=>'User Feedback',
                        'body'=>'<h3 style="display:inline;">Sender Email: </h3> '.$request->email.'<br><br> <h3 style="display:inline;"> Sender Message: </h3>'.$request->message.'<br>'.$ender
                    ];
                    $subject='User Feedback';
                    Mail::to($row->email)->send(new masalMail($mail,$subject));
                    }
                return redirect()->back()->with('success', 'Your Feedback Received');
            }
            else
            {
                return redirect()->back()->with('error', 'Your Feedback Not Received');
            }

      }

    } 

    public function location($status)
    {
        $collection=Category::all();
        $foot=footer::where('id',1)->first();
        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(6)->get();

        return view('pages.direction')->with('status',$status)->with('foot',$foot)->with('collection',$collection)->with('gallery',$gallery);
    }
}
