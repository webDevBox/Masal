<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\products;
use App\Category;
use App\fabric;
use App\neckline;
use App\silhouette;
use App\sleeve;
use App\User;
use App\footer;
use App\ColourSwatches;
use DB;
use App\feedback;
use App\retailerOrder;
use App\visitor;
use App\size;
use App\additional;
use App\real;
use Carbon\Carbon;
use App\emails;
use App\sale;
use App\menu;
use App\retailer_bride;
use LVR\Colour\Hex;
class AdminController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }


     //Product Page
     public function products(Request $request)
     {
         if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $swatches=ColourSwatches::all();
         $category=Category::all();
         $silhouette=silhouette::all();
         $fabric=fabric::all();
         $neckline=neckline::all();
         $sleeve=sleeve::all();
         $total_products=products::all()->count();
         $counter=products::where('stock',0)->count();
         $outer=products::where('stock',0)->get();
         $size=size::all();
         $addition=additional::all();
         $sale=sale::all();
         if(isset($request->category))
         {
            $product=products::where('category',$request->category)->where('delete_status',0)->orderBy('created_at', 'desc')->paginate(8);
         }
         else if(isset($request->size))
         {
            $product=products::where('size', 'like', '%' . $request->size . '%')->where('delete_status',0)->orderBy('created_at', 'desc')->paginate(8);
         }
         else if(isset($request->color))
         {
            $product=products::where('colour', 'like', '%' . $request->color . '%')->where('delete_status',0)->orderBy('created_at', 'desc')->paginate(8);
         }
         else if(isset($request->style))
         {
            $product=products::where('styleNumber',$request->style)->where('delete_status',0)->orderBy('created_at', 'desc')->paginate(8);
         }
         else
         {
         $product = products::orderBy('id','desc')->where('delete_status',0)->paginate(8);
        }
         return view('admin.products')
         ->with(array('fabric'=>$fabric,'neckline'=>$neckline,'sleeve'=>$sleeve,'sale'=>$sale,'silhouette'=>$silhouette,'addition'=>$addition,'size'=>$size,'outer'=>$outer,'total_products'=>$total_products,
         'counter'=>$counter,'category'=>$category,'swatches'=>$swatches,'product'=>$product));
     }


    // Real Bride Request Page
    public function real_request($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $real=retailer_bride::where('wedding',$id)->get();
         return view('admin.real_request')->with(array('real'=>$real));
    }
    
    
    // Profile Page
    public function profile()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $profile=User::find(Auth::user()->id);
         return view('admin.profile')->with(array('profile'=>$profile));
    }


    //Dashboard
    public function index()
    {
        if (Auth::check()) {
           if($this->user->userRole != 1)
           {
            return redirect('/admin');
           }
        }
        else
        {
            return redirect('/admin');
        }
        $order=retailerOrder::count();
        $stat_order=retailerOrder::where('payment','Done')->count();
        $customer=User::where('userRole',2)->where('status',1)->count();
        $retailer=User::where('userRole',2)->where('status',1)->orderBy('id','desc')->limit(7)->get();
        $visits=visitor::count();
        $products=products::count();

        $todayOrder=retailerOrder::where('payment','Done')->whereDate('created_at', '=', Carbon::today())->count();

        $date=Carbon::today()->subDays(7);
        // echo $date;die();
        $weekOrder=retailerOrder::where('payment','Done')->where('created_at', '>=', $date)->count();


        $monthOrder=retailerOrder::where('payment','Done')
        ->whereMonth('created_at', '=', Carbon::now()->month)
        ->whereYear('created_at', '=', Carbon::now()->year)->count();


        $lastmonthOrder=retailerOrder::where('payment','Done')
        ->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)
        ->whereYear('created_at', '=', Carbon::now()->subYear()->year)->count();

        if($order == 0)
        {
            $order = 0.5;
        }

        $percent = round(($monthOrder/$order)*100 , 0);
        $sale=0;
        $stat='No Comparison';
        $amount=0;
        if($monthOrder > 0)
        {
        $current=retailerOrder::where('payment','Done')
        ->whereMonth('created_at', '=', Carbon::now()->month)
        ->whereYear('created_at', '=', Carbon::now()->year)->get();
        foreach($current as $row)
            {
                $prod=products::find($row->productId);
                $amount=$amount+$prod->wholesalePrice;
            }
        }  
        
        $total=0;
        if($lastmonthOrder > 0)
        {
        $previous=retailerOrder::where('payment','Done')
        ->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)
        ->whereYear('created_at', '=', Carbon::now()->subYear()->year)->get();
        foreach($previous as $row)
            {
                $prod=products::find($row->productId);
                $total=$total+$prod->wholesalePrice;
            }
        }
            if($amount != 0 && $total != 0)
            {
                if($amount == $total)
                {
                    $stat='Same Earning as last month';
                }
                if($amount > $total)
                {
                    $stat=round(($amount/$total)*100 ,2) .'% more earnings than last month.';
                }
                else if($total > $amount)
                {
                    $stat=round(($total/$amount)*100 ,2).'% less earnings than last month.';
                }
            }

            $orders=retailerOrder::get();
            if(count($orders) > 0)
            {
                foreach($orders as $item)
                {
                    $prod=products::find($item->productId);
                    $sale=$sale+$prod->wholesalePrice;
                }
            }
            $currentYear=Carbon::now()->year;
            $lastYear=Carbon::now()->subYear()->year;
            $previousYear=Carbon::now()->subYear(2)->year;

            $rev_this=retailerOrder::where('payment','Done')->whereYear('created_at', '=', Carbon::now()->year)->get();
            $this_year_rev=0;
                if(count($rev_this) > 0)
                {            
                foreach($rev_this as $row)
                    {
                        $prod=products::find($row->productId);
                        $this_year_rev=$this_year_rev+$prod->wholesalePrice;
                    }
                }

                $rev_last=retailerOrder::where('payment','Done')->whereYear('created_at', '=', Carbon::now()->subYear()->year)->get();
                $last_year_rev=0;
                    if(count($rev_last) > 0)
                    {            
                    foreach($rev_last as $row)
                        {
                            $prod=products::find($row->productId);
                            $last_year_rev=$last_year_rev+$prod->wholesalePrice;
                        }
                    }


                    $rev_previous=retailerOrder::where('payment','Done')->whereYear('created_at', '=', Carbon::now()->subYear(2)->year)->get();
                    $previous_year_rev=0;
                        if(count($rev_previous) > 0)
                        {            
                        foreach($rev_previous as $row)
                            {
                                $prod=products::find($row->productId);
                                $previous_year_rev=$previous_year_rev+$prod->wholesalePrice;
                            }
                        }

                        $process = retailerOrder::where('status','processing')->count();
                        $complete = retailerOrder::where('status','completed')->count();

                        $order_over = round(($complete/$order)*100 , 0);

                        if($order = 0.5)
                        {
                            $order = 0;
                        }

        return view('admin.dashboard')->with(array('stat_order'=>$stat_order,'weekOrder'=>$weekOrder,'order_over'=>$order_over,'process'=>$process,'complete'=>$complete,'retailer'=>$retailer,'this_year_rev'=>$this_year_rev,'last_year_rev'=>$last_year_rev,
        'previous_year_rev'=>$previous_year_rev,'currentYear'=>$currentYear,'lastYear'=>$lastYear,'previousYear'=>$previousYear,'percent'=>$percent,
        'sale'=>$sale,'stat'=>$stat,'amount'=>$amount,'lastmonthOrder'=>$lastmonthOrder,'todayOrder'=>$todayOrder,'monthOrder'=>$monthOrder,'order'=>$order,
        'customer'=>$customer,'visits'=>$visits,'products'=>$products));
    }


    //Product Page
    public function editCat($id)
    {
        if (Auth::check()) {
           if($this->user->userRole != 1)
           {
            return redirect('/admin');
           }
        }
        else
        {
            return redirect('/admin');
        }
      $category=Category::find($id);
      return view('admin.catEditor')->with('category',$category);
    }


    // Category Edit In Db
    public function cat_edit_indb(Request $request)
    {
        if (Auth::check()) {
           if($this->user->userRole != 1)
           {
            return redirect('/admin');
           }
        }
        else
        {
            return redirect('/admin');
        }
        if(isset($request->update) && $request->update == 'UPDATE')
        {
            if($request->cat_name != $request->cat_rename)
            {
            $this->validate($request,[
                'cat_name'=>'required|unique:categories,name'
                ]);
            }
            else
            {
                $this->validate($request,[
                    'cat_name'=>'required'
                    ]);
            }
            $id=$request->cat_id;
            $category=Category::find($id);
            $category->name=$request->cat_name;
            if(isset($request->cat_image))
            {
                $path = $category->image;
                Storage::delete($path);

                $path1 = $request->cat_image->store('category');
                $category->image=$path1;
            }
            $category->save();
            if($category->save())
            {
                return redirect()->back()->with('success', 'Category Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Category Not Added');
             }

    
      return view('admin.catEditor')->with('category',$category);
    }
    }
   


    //Add Single Image
    public function imgUploader(Request $request)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         if(isset($request->img_upload))
         {
             $id=$request->id;
             $product=products::find($id);
             if($request->hasFile('image1'))
             {
                 $path =  $request->image1->store('products');
                 $product->image1=$path;
                 $product->save();
                    if($product->save())
                    {
                    return redirect()->back()->with('success', 'Image Added');
                    }
                    else
                    {
                        return redirect()->back()->with('error', 'Image Not Added');
                    }
             }
             if($request->hasFile('image2'))
             {
                 $path =  $request->image2->store('products');
                 $product->image2=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
             if($request->hasFile('image3'))
             {
                 $path =  $request->image3->store('products');
                 $product->image3=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
             if($request->hasFile('image4'))
             {
                 $path =  $request->image4->store('products');
                 $product->image4=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
             if($request->hasFile('image5'))
             {
                 $path =  $request->image5->store('products');
                 $product->image5=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
             if($request->hasFile('image6'))
             {
                 $path =  $request->image6->store('products');
                 $product->image6=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
         }
         
    }



    //Product add to database
    public function addProduct(Request $request)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         if(isset($request->send))
         {
            $this->validate($request,[
                'product_name'=>'required',
                'key'=>'required',
                'product_description'=>'required',
                'wholesale_price'=>'required',
                'retail_price'=>'required',
                'stock'=>'required',
                'style'=>'required|unique:products,styleNumber',
                'bar'=>'required|unique:products,barcode',
                'first'=>'required|image',
                'category'=>'required|numeric',
                'silhouette'=>'required|numeric',
                'neckline'=>'required|numeric',
                'fabric'=>'required|numeric',
                'sleeve'=>'required|numeric',
                'second'=>'image',
                'third'=>'image',
                'forth'=>'image',
                'fifth'=>'image',
                'sixth'=>'image'
            ]);
            $product=new products;
            $product->name=$request->product_name;
            $product->keyword=$request->key;
            $product->description=$request->product_description;
            $size=json_encode($request->size);
            $extra='';
            if(isset($request->addition))
            {
            $extra=json_encode($request->addition);
            }
            else
            {
             $extra=null;  
            }
            $product->category=$request->category;
            $product->silhouette=$request->silhouette;
            $product->neckline=$request->neckline;
            $product->fabric=$request->fabric;
            $product->sleeve=$request->sleeve;
            if(isset($request->tag))
            {
            $product->tag=$request->tag;
            }
            $product->colour=$request->colour;
            $product->size=$size;
            $product->extra=$extra;
            $product->retailerPrice=$request->retail_price;
            $product->wholesalePrice=$request->wholesale_price;
            $product->styleNumber=$request->style;
            $product->barcode=$request->bar;
            $product->status=$request->product_condition;
            $product->stock=$request->stock;
            $path1 = $request->first->store('products');
            $product->image1=$path1;
            if($request->hasFile('second'))
            {
                $path2 =  $request->second->store('products');
                $product->image2=$path2;
            }
          
            if($request->hasFile('third'))
            {
                $path3 = $request->third->store('products');
                $product->image3=$path3;
            }

            if($request->hasFile('forth'))
            {
                $path4 = $request->forth->store('products');
                $product->image4=$path4;
            }

            if($request->hasFile('fifth'))
            {
                $path5 = $request->fifth->store('products');
                $product->image5=$path5;
            }

            if($request->hasFile('sixth'))
            {
                $path6 = $request->sixth->store('products');
                $product->image6=$path6;
            }
           
            $product->save();
            if($product->save())
            {
                $new=products::where('styleNumber',$request->style)->first();
                $output='';
                $output.=' <center> <img style="height:400px;width:250px" src='.asset('/images/'.$new->image1).'>  <br>
                     '.$new->name.' <br> $'.$new->wholesalePrice.'  
                     </center>
                     <br><br>
                     <a style=" background-color: #4CAF50;
                     border: none;
                     color: white;
                     padding: 15px 32px;
                     text-align: center;
                     text-decoration: none;
                     display: inline-block;
                     font-size: 16px;
                     margin: 4px 2px;
                     cursor: pointer;" href="http://masal.com.au/detail/'.$new->id.'">View Product</a>
                     ';

                $retailer=User::where('userRole',2)->where('status',1)->get();
                $welcome=emails::where('name','New_product')->first();
                $signature=emails::where('name','Signature')->first();
                $ender=' ';
                if($signature->status == 1)
                {
                $ender=$signature->message;
                }
                if($welcome->status == 1)
                {
                    foreach($retailer as $row)
                    {
                    $mail=[
                        'body'=> $welcome->message.'<br><br>'.$output.'<br>'.$ender
                    ];
                    $subject=$welcome->subject;
                    Mail::to($row->email)->send(new masalMail($mail,$subject));
                    }
                }
            return redirect()->back()->with('success', 'Product Added');
         }
         else
         {
            return redirect()->back()->with('error', 'Product Not Added');
         }
        }
        
    }



    //Product edit form page
    public function addProductPage()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $swatches=ColourSwatches::all();
        $category=Category::all();
        $silhouette=silhouette::all();
        $fabric=fabric::all();
        $neckline=neckline::all();
        $sleeve=sleeve::all();
        $size=size::all();
        $addition=additional::all();
        $sale=sale::all();
        return view('admin.addProduct')->with(array('sleeve'=>$sleeve,'neckline'=>$neckline,'fabric'=>$fabric,'silhouette'=>$silhouette,'sale'=>$sale,'swatches'=>$swatches,'category'=>$category,'size'=>$size,
        'addition'=>$addition));;
    }
    
    
    //Product edit form page
    public function out_stock()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $outer=products::where('stock','<=',10)->where('delete_status',0)->get();
        return view('admin.outStock')->with(array('outer'=>$outer));;
    }
    
    
    //Product edit form page
    // public function top_sell()
    // {
    //     if (Auth::check()) {
    //         if($this->user->userRole != 1)
    //         {
    //          return redirect('/admin');
    //         }
    //      }
    //      else
    //      {
    //          return redirect('/admin');
    //      }
    //     $product = products::orderBy('id','desc')->where('delete_status',0)->get();
    //     return view('admin.topSell')->with(array('product'=>$product));;
    // }
    
    
    //Top Sell Products
    public function top_sell()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $product = DB::select("SELECT SUM(r.quantity) as 'min',p.id,p.name,p.styleNumber,r.created_at FROM retailer_orders r 
        INNER join products p on(p.id = r.productId ) GROUP by (r.productId) order by min Desc");
        return view('admin.topSell')->with(array('product'=>$product));
    }


    //Product edit form page
    public function edit_product($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $product= products::find($id);
        $swatches=ColourSwatches::all();
        $category=Category::all();
        $size=size::all();
        $addition=additional::all();
        $sale=sale::all();
        $silhouette=silhouette::get();
        $fabric=fabric::get();
        $neckline=neckline::get();
        $sleeve=sleeve::get();
        return view('admin.edit_product')->with(array('sale'=>$sale,'swatches'=>$swatches,'category'=>$category,'size'=>$size,
        'addition'=>$addition,'silhouette'=>$silhouette,'fabric'=>$fabric,'neckline'=>$neckline,'sleeve'=>$sleeve,'product'=>$product));
    }


    //Product edit in database
    public function editor(Request $request)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         if(isset($request->send))
         {
            $id=$request->id;
            $product=products::find($id);
            $price_check=$product->wholesalePrice;
            $this->validate($request,[
                'product_name'=>'required',
                'key'=>'required',
                'product_description'=>'required',
                'category'=>'required',
                'silhouette'=>'required',
                'neckline'=>'required',
                'fabric'=>'required',
                'sleeve'=>'required',
                'wholesale_price'=>'required',
                'retail_price'=>'required',
                'stock'=>'required',
                'style'=>'required',
                'bar'=>'required',
                'size'=>'required'
                ]);
                if($request->style != $request->check_style)
                {
                    $this->validate($request,[
                        'style'=>'unique:products,styleNumber'
                        ]);
                }
                if($request->bar != $request->check_bar)
                {
                    $this->validate($request,[
                        'bar'=>'unique:products,barcode'
                        ]);
                }
                $size=json_encode($request->size);
                $extra='';
            if(isset($request->addition))
            {
            $extra=json_encode($request->addition);
            }
            else
            {
             $extra=null;  
            }
            $product=products::find($id);
            $product->name=$request->product_name;
            $product->keyword=$request->key;
            $product->description=$request->product_description;
            $product->category=$request->category;
            $product->silhouette=$request->silhouette;
            $product->neckline=$request->neckline;
            $product->fabric=$request->fabric;
            $product->sleeve=$request->sleeve;
            if(isset($request->tag))
            {
                if($request->tag != '354545')
                {
                    $product->tag=$request->tag;
                }
                else
                {
                    $product->tag=null;
                }
            }
            $product->colour=$request->colour;
            $product->size=$size;
            $product->extra=$extra;
            $product->wholesalePrice=$request->wholesale_price;
            $product->retailerPrice=$request->retail_price;
            $product->styleNumber=$request->style;
            $product->barcode=$request->bar;
            $product->status=$request->product_condition;
            $product->stock=$request->stock;
            $product->save();
            if($product->save())
            {

                $output='';
                $output.=' <center> <img style="height:400px;width:250px" src='.asset('/images/'.$product->image1).'>  <br>
                     '.$product->name.' <br> $'.$request->wholesale_price.'  
                     </center>
                     <br><br>
                     <a style=" background-color: #4CAF50;
                     border: none;
                     color: white;
                     padding: 15px 32px;
                     text-align: center;
                     text-decoration: none;
                     display: inline-block;
                     font-size: 16px;
                     margin: 4px 2px;
                     cursor: pointer;" href="http://masal.com.au/detail/'.$product->id.'">View Product</a>
                     ';

                if($price_check != $request->wholesale_price)
                {
                    $retailer=User::where('userRole',2)->where('status',1)->get();
                    $welcome=emails::where('name','Price_change')->first();
                    $signature=emails::where('name','Signature')->first();
                    $ender=' ';
                    if($signature->status == 1)
                    {
                    $ender=$signature->message;
                    }
                    if($welcome->status == 1)
                    {
                        foreach($retailer as $row)
                        {
                        $mail=[
                            'body'=> $welcome->message.'<br><br>'.$output.'<br>'.$ender
                        ];
                        $subject=$welcome->subject;
                        Mail::to($row->email)->send(new masalMail($mail,$subject));
                        }
                    }
                }
            return redirect()->back()->with('success', 'Product Updated');
            }
         else
         {
            return redirect()->back()->with('error', 'Product Not Updated');
         }
        }


    }

    // Delete Product
    public function destroy($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $product= products::find($id);
        // $path1 = $product->image1;
        // $path2 = $product->image2;
        // $path3 = $product->image3;
        // $path4 = $product->image4;
        // $path5 = $product->image5;
        // $path6 = $product->image6;
        // Storage::delete($path1);
        // Storage::delete($path2);
        // Storage::delete($path3);
        // Storage::delete($path4);
        // Storage::delete($path5);
        // Storage::delete($path6);
        // $product->delete();

        
        $product->delete_status=1;
        $product->save();
        

        $real=real::where('product',$id);
        $real->delete();
        return redirect()->back()->with('success', 'Product Deleted');
    }


    //Order Update by Admin
    public function update_order(Request $request)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
            $this->validate($request,[
                'id'=>'required',
                'color'=>'required',
                'size'=>'required',
                'status'=>[
                    'required',
                    Rule::in(['pending','processing','completed','canceled']),
                ],
                'quantity'=>'required|numeric|min:1'
                ]);
                $order=retailerOrder::find($request->id);
                $status=$order->status;
                $order->colour=$request->color;
                $order->sizes=$request->size;
                $order->status=$request->status;
                if($request->status == 'completed' && $order->cancle_order_request == 1)
                {
                    $order->view=0;
                    $order->cancle_order_request=3;
                }

                if($request->status == 'canceled' && $order->cancle_order_request == 1)
                {
                    $order->cancle_order_request=2;
                    $order->view=0;
                    $user=User::find($order->RetailerId);
                    $credit=$user->credit;
                    $extra=0;
                        if($order->extra != null)
                        {
                            $addition=additional::where('additional',$order->extra)->first();
                            $extra=$addition->price*$order->quantity;
                        }
                    $product=products::find($order->productId);
                    $price=$product->wholesalePrice;
                    $new=$extra+($price*$order->quantity);
                    User::where('id',$order->RetailerId)->update(['credit'=>$new]);                                                              
                }
                $order->quantity=$request->quantity;
                $order->save();
                if($order->save())
                {
                    
                    if($status != $request->status)
                    {
                        $retailer=retailerOrder::where('id',$request->id)->first();
                        $retailer_id=$retailer->RetailerId;
                        $email=User::find($retailer_id);

                        $output='';
                            $total=0;
                            $output.='<h1> Your Order Status is: '.$request->status.' </h1>';

                            $output.='<div class="table-responsive">
                            <table class="table table-dark" style="border-collapse: collapse;background-color:#212529;color:white" >
                            <thead>
                                <tr>
                                <th style="padding:20px; border: 1px solid black;" ><b>Order Id</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Image</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Name</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Notes</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Color</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Size</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Extra</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Style #</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Quantity</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Status</b></th>
                                <th style="padding:20px; border: 1px solid black;" ><b>Price</b></th> 
                                </tr>
                            </thead>
                            <tbody>
                            ';
                                $product=products::find($retailer->productId);
                                if($request->status == 'completed')
                                {
                                    $prod_quant=$product->stock;
                                    $new_quant=$prod_quant-$order->quantity;
                                    products::where('id',$product->id)->update(['stock'=>$new_quant]);
                                }
                                $addition=0;
                                if($retailer->extra != null)
                                {
                                    $extra=additional::where('additional',$retailer->extra)->first();
                                    $addition=$extra->price;
                                }
                                $sub=($retailer->quantity*$addition)+($retailer->quantity*$product->wholesalePrice);
                                if($retailer->extra == null)
                                {
                                    $extra="No Extra";
                                }
                                else
                                {
                                    $extra=$retailer->extra;
                                }
                                $output.='
                                <tr>
                                <td style="padding:20px; border: 1px solid black;" > '.'OID.'.$retailer->id.' </td>
                                   <td style="padding:20px; border: 1px solid black;" > <img style="height:100px;width:100px" 
                                   src='.asset('/images/'.$product->image1).'> </td>
                                    <td style="padding:20px; " > '.$product->name.' </td>
                                    <td style="padding:20px; border: 1px solid black;" > '.$retailer->detail.'  </td>
                                    <td style="padding:20px; " > '.$retailer->colour.'  </td>
                                    <td style="padding:20px; " > '.$retailer->sizes.' </td>
                                    <td style="padding:20px; " > '.$extra.'  </td>
                                    <td style="padding:20px; border: 1px solid black;" > '.$product->styleNumber.' </td>
                                    <td style="padding:20px; " > '.$retailer->quantity.' </td>
                                    <td style="padding:20px; border: 1px solid black;" > '.$retailer->status.' </td>
                                    <td style="padding:20px; " > $'.$sub.'</td>

                                </tr>
                                ';
                            $total+=$sub; 
                            $output.='
                            </tbody>
                            </table>
                            <a href="http://www.masal.com.au" style=" background-color: #4CAF50;
                            border: none;
                            color: white;
                            padding: 15px 32px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            margin: 4px 2px;"> View Site </a>    
                            </div>';
                        $welcome=emails::where('name','change_order_status')->first();
                        $signature=emails::where('name','Signature')->first();
                        $ender=' ';
                        if($signature->status == 1)
                        {
                        $ender=$signature->message;
                        }
                        if($welcome->status == 1)
                        {
                            $mail=[
                                'body'=>$welcome->message.'<br><br>'.$output.'<br>'.$ender
                            ];    
                            $subject=$welcome->subject;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                            Mail::to($email->email)->send(new masalMail($mail,$subject));
                        }
                    }
                    return redirect()->back()->with('success','Order Updated Successfully');
                }
        
    }




    // Delete Feedback
    public function deletefeed($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $feedback= feedback::find($id);
        $feedback->delete();
        return redirect()->back()->with('success', 'Feedback Deleted');
    }



    // Delete Category
    public function deleteCat($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $category= Category::find($id);
        $path1 = $category->image;
       
        Storage::delete($path1);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted');
    }


     //Edit website Page
     public function mainpage()
     {
         if (Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
          $feedback=feedback::all();
          $category= Category::all();
          $size=size::all();
          $swatches=ColourSwatches::all();
          $sale=sale::all();
          return view('admin.mainpage')->with(array('sale'=>$sale,'size'=>$size,'category'=>$category,'swatches'=>$swatches,'feedback'=>$feedback));
     }

      //Add Category
      public function add_category(Request $request)
      {
          if (Auth::check()) {
              if($this->user->userRole != 1)
              {
               return redirect('/admin');
              }
           }
           else
           {
               return redirect('/admin');
           }
           if(isset($request->sendCategory))
         {
           $this->validate($request,[
            'category'=>'required|unique:categories,name',
            'first'=>'required'
            ]);
            $category=new Category;
            $category->name=$request->category;
            $path1 = $request->first->store('category');
            $category->image=$path1;
            $category->save();
            if($category->save())
            {
                return redirect()->back()->with('success', 'Category Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Category Not Added');
             }
            }
      }


  
      public function adminProfile(Request $request)
      {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         //General Update
        
           if(isset($request->general) && $request->general == 'Submit')
           {
                   $this->validate($request,[
                    'name'=>'required',
                    'email'=>'required|email',
                    'logo'=>'mimes:jpeg,bmp,png'
               ]);
                    if(Auth::user()->email != $request->email)
                    {
                        $this->validate($request,[
                            'email'=>'unique:users,email'
                       ]);
                    }
                 $admin = Auth::user()->id;
                 $user=User::find($admin);
                 $user->name=$request->name;
                 $user->email=$request->email;
                 if(isset($request->logo))
                 {
                     $old=$user->logo;
                   Storage::delete($old);
                 $path=$request->logo->store('logo');
                 $user->logo=$path;
                 }
                 $user->save();
                 return redirect()->back()->with('success', 'Your Data Updated ');
             }

             //Password Update
             if(isset($request->secure) && $request->secure == 'Submit')
           {
                   $this->validate($request,[
                    'password'=>'required',
                    'confirm'=>'required|same:password'
               ]);
                 $pass=bcrypt($request->password);
                 User::where('id',Auth::user()->id)->update(['password'=>$pass]);
                 return redirect()->back()->with(array('success'=>'Your Password Updated','status'=>'ok'));
             }
      }
     
        public function passwordUpdate(Request $request)
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
          
             if(isset($request->update) && $request->update == 'update')
             {
                     $this->validate($request,[
                       'password'=>'required|min:8|same:repassword',
                 ]);
                 $id=$request->id;
                 $user=User::find($id);
                 $user->password=bcrypt($request->password);
                 $user->save();
                return redirect()->back()->with('success', 'Your Password Updated ');
               }
   
   
        }




        public function manageCategory()
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             $category=Category::orderBy('id','desc')->get();
             return view('admin.managerCat')->with('category',$category);
        }

         //silhouette Page
        public function manageSilhouette()
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             $silhouette= silhouette::all();
             return view('admin.managerSilhouette')->with('silhouette',$silhouette);
        }
         //silhouette Page
        public function manageFabric()
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             $silhouette= fabric::all();
             return view('admin.manageFabric')->with('silhouette',$silhouette);
        }
         //silhouette Page
        public function manageSleeve()
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             $silhouette= sleeve::all();
             return view('admin.manageSleeve')->with('silhouette',$silhouette);
        }
         //neckline Page
        public function manageNeckline()
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             $silhouette= neckline::all();
             return view('admin.managerNeckline')->with('silhouette',$silhouette);
        }


         //Add silhouette
      public function silhouette(Request $request)
      {
          
          if (Auth::check()) {
              if($this->user->userRole != 1)
              {
               return redirect('/admin');
              }
           }
           else
           {
               return redirect('/admin');
           }
           if(isset($request->sendSilhouette))
         {
           $this->validate($request,[
            'silhouette'=>'required|unique:silhouettes,name',
            'first'=>'required'
            ]);
            
            $category=new silhouette;
            $category->name=$request->silhouette;
            $path1 = $request->first->store('silhouette');
            $category->image=$path1;
            $category->save();
            if($category->save())
            {
                return redirect()->back()->with('success', 'Silhouette Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Silhouette Not Added');
             }
            }
      }
         
      
      //Add silhouette
      public function sleeve(Request $request)
      {
          if (Auth::check()) {
              if($this->user->userRole != 1)
              {
               return redirect('/admin');
              }
           }
           else
           {
               return redirect('/admin');
           }
           if(isset($request->sendCategory))
         {
           $this->validate($request,[
            'sleeve'=>'required|unique:sleeves,name',
            'first'=>'required'
            ]);
            $category=new sleeve;
            $category->name=$request->sleeve;
            $path1 = $request->first->store('sleeve');
            $category->image=$path1;
            $category->save();
            if($category->save())
            {
                return redirect()->back()->with('success', 'Sleeve Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Sleeve Not Added');
             }
            }
      }


       // Category Edit In Db
     public function sleeve_edit_indb(Request $request)
     {
         if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         if(isset($request->update) && $request->update == 'UPDATE')
         {
             if($request->sleeve_name != $request->cat_rename)
             {
             $this->validate($request,[
                 'sleeve_name'=>'required|unique:sleeves,name',
                 'cat_image'=>'image|mimes:jpeg,png,jpg,gif,svg'
                 ]);
             }
             else
             {
                 $this->validate($request,[
                     'sleeve_name'=>'required',
                     ]);
             }
                 $id=$request->cat_id;
                 $category=sleeve::find($id);
             $category->name=$request->sleeve_name;
             if(isset($request->cat_image))
             {
                Storage::delete($category->image);
                $path1 = $request->cat_image->store('sleeve');
                $category->image=$path1;
             }
             $category->save();
             if($category->save())
             {
                 return redirect()->back()->with('success', 'Sleeve Added');
              }
              else
              {
                 return redirect()->back()->with('error', 'Sleeve Not Added');
              }
 
     
       return view('admin.necklineEditor')->with('category',$category);
     }
     }



         //Add neckline
      public function neckline(Request $request)
      {
          if (Auth::check()) {
              if($this->user->userRole != 1)
              {
               return redirect('/admin');
              }
           }
           else
           {
               return redirect('/admin');
           }
           if(isset($request->sendNeckline))
         {
           $this->validate($request,[
            'neckline'=>'required|unique:necklines,name',
            'first'=>'required'
            ]);
            $category=new neckline;
            $category->name=$request->neckline;
            $path1 = $request->first->store('neckline');
            $category->image=$path1;
            $category->save();
            if($category->save())
            {
                return redirect()->back()->with('success', 'Neckline Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Neckline Not Added');
             }
            }
      }
         
      //Add neckline
      public function fabric(Request $request)
      {
          if (Auth::check()) {
              if($this->user->userRole != 1)
              {
               return redirect('/admin');
              }
           }
           else
           {
               return redirect('/admin');
           }
           if(isset($request->sendCategory))
         {
           $this->validate($request,[
            'fabric'=>'required|unique:fabrics,name',
            'first'=>'required'
            ]);
            $category=new fabric;
            $category->name=$request->fabric;
            $path1 = $request->first->store('fabric');
            $category->image=$path1;
            $category->save();
            if($category->save())
            {
                return redirect()->back()->with('success', 'Fabric Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Fabric Not Added');
             }
            }
      }

       // Delete Category
    public function deleteSilhouette($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $category= silhouette::find($id);
        $path1 = $category->image;
       
        Storage::delete($path1);
        $category->delete();
        return redirect()->back()->with('success', 'Silhouette Deleted');
    }
       
    
    // Delete Category
    public function deleteSleeve($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $category= sleeve::find($id);
        $path1 = $category->image;
       
        Storage::delete($path1);
        $category->delete();
        return redirect()->back()->with('success', 'Sleeve Deleted');
    }


       // Delete Category
    public function deleteNeckline($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $category=neckline::find($id);
        $path1 = $category->image;
       
        Storage::delete($path1);
        $category->delete();
        return redirect()->back()->with('success', 'Neckline Deleted');
    }
      
    
    // Delete Category
    public function deleteFabric($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $category= fabric::find($id);
        $path1 = $category->image;
       
        Storage::delete($path1);
        $category->delete();
        return redirect()->back()->with('success', 'Fabric Deleted');
    }

     // Category Edit In Db
     public function silhouette_edit_indb(Request $request)
     {
         if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         if(isset($request->update) && $request->update == 'UPDATE')
         {
             if($request->cat_name != $request->cat_rename)
             {
             $this->validate($request,[
                 'cat_name'=>'required|unique:silhouettes,name',
                 ]);
             }
             else
             {
                 $this->validate($request,[
                     'cat_name'=>'required',
                     ]);
             }
                 $id=$request->cat_id;
                 $category=silhouette::find($id);
             $category->name=$request->cat_name;
             if(isset($request->cat_image))
             {
               Storage::delete($category->image);
             $path1 = $request->cat_image->store('silhouette');
             $category->image=$path1;
             }
             $category->save();
             if($category->save())
             {
                 return redirect()->back()->with('success', 'Silhouette Added');
              }
              else
              {
                 return redirect()->back()->with('error', 'Silhouette Not Added');
              }
 
     
       return view('admin.catEditor')->with('category',$category);
     }
     }

     // Category Edit In Db
     public function neckline_edit_indb(Request $request)
     {
         if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         if(isset($request->update) && $request->update == 'UPDATE')
         {
             if($request->cat_name != $request->cat_rename)
             {
             $this->validate($request,[
                 'cat_name'=>'required|unique:necklines,name',
                 ]);
             }
             else
             {
                 $this->validate($request,[
                     'cat_name'=>'required',
                     ]);
             }
                 $id=$request->cat_id;
                 $category=neckline::find($id);
             $category->name=$request->cat_name;
             if(isset($request->cat_image))
             {
               Storage::delete($category->image);
             $path1 = $request->cat_image->store('neckline');
             $category->image=$path1;
             }
             $category->save();
             if($category->save())
             {
                 return redirect()->back()->with('success', 'Neckline Added');
              }
              else
              {
                 return redirect()->back()->with('error', 'Neckline Not Added');
              }
 
     
       return view('admin.necklineEditor')->with('category',$category);
     }
     }
     
     
     
     // Category Edit In Db
     public function fabric_edit_indb(Request $request)
     {
         if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         if(isset($request->update) && $request->update == 'UPDATE')
         {
             if($request->fabric_name != $request->cat_rename)
             {
             $this->validate($request,[
                 'fabric_name'=>'required|unique:fabrics,name',
                 ]);
             }
             else
             {
                 $this->validate($request,[
                     'fabric_name'=>'required',
                     ]);
             }
                 $id=$request->cat_id;
                 $category=fabric::find($id);
             $category->name=$request->fabric_name;
             if(isset($request->cat_image))
             {
               Storage::delete($category->image);
             $path1 = $request->cat_image->store('fabric');
             $category->image=$path1;
             }
             $category->save();
             if($category->save())
             {
                 return redirect()->back()->with('success', 'Fabric Added');
              }
              else
              {
                 return redirect()->back()->with('error', 'Fabric Not Added');
              }
 
     
       return view('admin.necklineEditor')->with('category',$category);
     }
     }
     
            //Product Page
            public function editSilhouette($id)
            {
                if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                    return redirect('/admin');
                }
                }
                else
                {
                    return redirect('/admin');
                }
            $category=silhouette::find($id);
            return view('admin.silhouetteEditor')->with('category',$category);
            }
            
            
            //Product Page
            public function editSleeve($id)
            {
                if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                    return redirect('/admin');
                }
                }
                else
                {
                    return redirect('/admin');
                }
            $category=sleeve::find($id);
            return view('admin.sleeveEditor')->with('category',$category);
            }
           
           
            //Product Page
            public function editNeckline($id)
            {
                if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                    return redirect('/admin');
                }
                }
                else
                {
                    return redirect('/admin');
                }
            $category=neckline::find($id);
            return view('admin.necklineEditor')->with('category',$category);
            }
           
            //Product Page
            public function editFabric($id)
            {
                if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                    return redirect('/admin');
                }
                }
                else
                {
                    return redirect('/admin');
                }
            $category=fabric::find($id);
            return view('admin.fabricEditor')->with('category',$category);
            }



         //swatches page
    public function swatches()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $swatches=ColourSwatches::orderBy('id','desc')->get();
         return view('admin.swatch')->with('swatches',$swatches);
    }

    // Delete Colour Swatch
    public function deleteSwatch($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $swatches= ColourSwatches::find($id);
       
        $swatches->delete();
        return redirect()->back()->with('success', 'Colour Swatch Deleted');
    }



    // Delete Size
    public function deleteSize($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $size= size::find($id);
       
        $size->delete();
        return redirect()->back()->with('success', 'Size Deleted');
    }


     // Delete Extra
     public function deleteExtra($id)
     {
         if (Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
         $extra= additional::find($id);
         $extra->delete();
         return redirect()->back()->with('success', 'Extra Deleted');
     }


     // Edit Colour Swatch Page
     public function editSwatch($id)
     {
         if (Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
         $swatches= ColourSwatches::find($id);
        return view('admin.swatch_edit')->with('swatches',$swatches);
        
     }


     //Add Colour in DB
     public function swatch_color(Request $request)
     {
         if (Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
          if(isset($request->sendswatch))
        {
            $id=$request->id;
          $this->validate($request,[
           'color'=>'required'
           ]);
           $swatches= ColourSwatches::find($id);
            $old=json_decode($swatches->colour);
            $latest=array_merge($old,$request->color);
            $myJSON = json_encode($latest);
           $swatches->colour=$myJSON;
           $swatches->save();
           if($swatches->save())
           {
               return redirect()->back()->with('success', 'Colour Added');
            }
            else
            {
               return redirect()->back()->with('error', 'Colour Added');
            }
           }
     }


     //Add Colour Swatch
     public function add_swatch(Request $request)
     {
         if (Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
          if(isset($request->sendswatch))
        {
          $this->validate($request,[
           'swatch'=>'required|unique:colour_swatches,name',
           'color'=>'required'
           ]);
           $swatch=new ColourSwatches;
           $swatch->name=$request->swatch;
           $myJSON = json_encode($request->color);
           $swatch->colour=$myJSON;
           $swatch->save();
           if($swatch->save())
           {
               return redirect()->back()->with('success', 'Colour Swatch Added');
            }
            else
            {
               return redirect()->back()->with('error', 'Colour Swatch Not Added');
            }
           }
     }


     public function contactReport()
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             feedback::where('status',0)->update(['status'=>1]);
             $feedback= feedback::orderBy('id','desc')->get();
             return view('admin.contactReport')->with('feedback',$feedback);
        }


          //Search Result Page
    public function admin_searcher(Request $request)
    {
        if (Auth::check()) {
           if($this->user->userRole != 1)
           {
            return redirect('/admin');
           }
        }
        else
        {
            return redirect('/admin');
        }

        $retailer=User::where('userRole',2)->where('status',1)->where('name', 'like', '%' . $request->data . '%')
        ->orWhere('email', 'like', '%' . $request->data . '%')->orWhere('registrationNumber', 'like', '%' . $request->data . '%')->get();

        
        $inter=products::where('name', 'like', '%' . $request->data . '%')
        ->orWhere('colour', 'like', '%' . $request->data . '%')->orWhere('tag', 'like', '%' . $request->data . '%')
        ->orWhere('keyword', 'like', '%' . $request->data . '%')->orWhere('styleNumber', 'like', '%' . $request->data . '%')
        ->orWhere('status', 'like', '%' . $request->data . '%')->get();

       $orders='';
       $word='OID';
       $word1= 'oid';
       if(strpos($request->data, $word) != false || strpos($request->data, $word1) != false)
       {
        preg_match_all('!\d+!', $request->data, $matches);
        $orders = retailerOrder::where('payment','Done')->whereIn('id' , [$matches])->get();
       }
       else
       {
           $product=products::where('name',$request->data)->first();
           $orders=retailerOrder::where('payment','Done')->where('productId',$product->id)->get();
       }
        return view('admin.result')->with(array('inter'=>$inter,'orders'=>$orders,'retailer'=>$retailer));
    }

    public function size()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $size=size::all();
         return view('admin.size')->with('size',$size);
    }



    public function addition()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $addition=additional::orderBy('id','desc')->get();
         return view('admin.addition')->with('addition',$addition);
    }



     //Add Size
     public function add_size(Request $request)
     {
         if (Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
          if(isset($request->sendsize))
        {
          $this->validate($request,[
           'size'=>'required|unique:sizes,size',
           ]);
           $size=new size;
           $size->size=$request->size;
           $size->save();
           if($size->save())
           {
               return redirect()->back()->with('success', 'Size Added');
            }
            else
            {
               return redirect()->back()->with('error', 'Size Not Added');
            }
           }
     }


      //Add Extra
      public function add_extra(Request $request)
      {
          if (Auth::check()) {
              if($this->user->userRole != 1)
              {
               return redirect('/admin');
              }
           }
           else
           {
               return redirect('/admin');
           }
           if(isset($request->sendExtra))
         {
           $this->validate($request,[
            'extra'=>'required|unique:additionals,additional',
            'price'=>'required'
            ]);
            $extra=new additional;
            $extra->additional=$request->extra;
            $extra->price=$request->price;
            $extra->save();
            if($extra->save())
            {
                return redirect()->back()->with('success', 'Extra Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Extra Not Added');
             }
            }
      }





    public function del_image($id,$value){
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $product=products::find($id);
        $path=$product->$value;
        Storage::delete($path);
        $product->$value=null;
        $product->save();
        if($product->save())
        {
            return redirect()->back()->with('success', 'Image Deleted');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Deleted');
         }
    }

    //Sale Tag Page
    public function sale_tag()
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             $sale=sale::orderBy('id','desc')->get();
          return view('admin.sale')->with(array('sale'=>$sale));
        }

        //Sale Tag in DB
        public function add_sale(Request $request)
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             if(isset($request->upload) && $request->upload == 'Submit')
             {
                 $this->validate($request,[
                     'sale'=>'required|unique:sales,name',
                     'color' => ['required', new Hex]
                 ]);
                $sale=new sale;
                $sale->name=$request->sale;
                $sale->color=$request->color;
                $sale->save();
                if($sale->save())
                {  
                    return redirect()->back()->with('success','New Sale Tag Added');
                }
            }
        }


        //Sale Tag in Delete
        public function del_sale($id)
        {
            if (Auth::check()) {
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
             }
             $sale=sale::find($id);
             $sale->delete();
                return redirect()->back()->with('success','Sale Tag Deleted');
        }

         //sale Tag edit form page
    public function edit_sale($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
    
        $sale=sale::find($id);
        return view('admin.sale_edit')->with(array('sale'=>$sale));
    }


     //Update Sale Tag in DB
     public function update_sale(Request $request ,$id)
     {
         if (Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
          if(isset($request->update) && $request->update == 'UPDATE')
          {
            $sale=sale::find($id);
              $this->validate($request,[
                  'tag'=>'required',
                  'color' => ['required', new Hex]
              ]);
             if($sale->name != $request->tag)
             {
                $this->validate($request,[
                    'tag'=>'unique:sales,name'
                ]);
             }
             $sale->name=$request->tag;
             $sale->color=$request->color;
             $sale->save();
             if($sale->save())
             {  
                 return redirect()->back()->with('success','Sale Tag Updated');
             }
             else
             {
                return redirect()->back()->with('success','Sale Tag Not Updated');
             }
         }
     }

     // Menu Bar Page
    public function menu()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $menu=menu::get();
        return view('admin.menu')->with('menu',$menu);
    }

    // Menu Bar Page
    public function header($id,$value)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $menu=menu::find($id);
         $menu->header_status=$value;
         $menu->save();
         return redirect()->back()->with('success','Header Menu Status Updated');
        
    }

    // Menu Bar Page
    public function footer($id,$value)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $menu=menu::find($id);
         $menu->footer_status=$value;
         $menu->save();
         return redirect()->back()->with('success','Footer Menu Status Updated');
        
    }
    
    
    // Menu Bar Page
    public function OrderView($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $row=retailerOrder::find($id);
        $logo=footer::first();
        return view('admin.order_success')->with(['row'=>$row,'logo'=>$logo]);
    }
    
    
    
    // Menu Bar Page
    public function OrderEdit($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $order=retailerOrder::where('id',$id)->get();
        return view('admin.order_edit')->with('order',$order);
    }

}
