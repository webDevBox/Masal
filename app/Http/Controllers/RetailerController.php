<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\emails;
use App\products;
use App\User;
use App\retailerOrder;
use App\Category;
use App\wedding;
use App\retailer_bride;
use Carbon\Carbon;
class RetailerController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    //Dashboard Page
    public function index()
    {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
         $welcome=emails::where('name','pending_order')->first();
         $signature=emails::where('name','Signature')->first();

         $email=retailerOrder::where('payment','none')->get();
         $current = Carbon::today();
         foreach($email as $send)
         {
            $user=User::find($send->RetailerId);
            $email=$user->email;
            $order_time=$send->created_at;
            $one_date=Carbon::parse($order_time)->addDays(1);
            $seven_date=Carbon::parse($order_time)->addDays(7);
            $fifteen_date=Carbon::parse($order_time)->addDays(15);
            if(now()->isSameDay($one_date) || now()->isSameDay($seven_date) || now()->isSameDay($fifteen_date))
            {
                $product=products::find($send->productId);
                $addition=0;
                if($send->extra != null)
                {
                    $extra=additional::where('additional',$send->extra)->first();
                    $addition=$extra->price;
                }
                $sub=($send->quantity*$addition)+($send->quantity*$product->wholesalePrice);
                $output='';
                $output.='
               <div class="table-responsive" id="tbl_detail">
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
                $output.='
                <tr>
                    <td style="padding:20px; border: 1px solid black;" > '.'OID.'.$send->id.' </td>
                    <td style="padding:20px; border: 1px solid black;" > <img style="height:100px;width:100px" src='.asset('images/'.$product->image1).'> </td>
                    <td style="padding:20px; border: 1px solid black;" > '.$product->name.' </td>
                    <td style="padding:20px; border: 1px solid black;" > '.$send->detail.'  </td>
                    <td style="padding:20px; border: 1px solid black;" > '.$send->colour.'  </td>
                    <td style="padding:20px; border: 1px solid black;" > '.$send->sizes.' </td>
                    <td style="padding:20px; border: 1px solid black;" > '.$send->extra.'  </td>
                    <td style="padding:20px; border: 1px solid black;" > '.$product->styleNumber.' </td>
                    <td style="padding:20px; border: 1px solid black;" > '.$send->quantity.' </td>
                    <td style="padding:20px; border: 1px solid black;" > '.$send->status.' </td>
                    <td style="padding:20px; border: 1px solid black;" > $'.$sub.'</td>
                </tr>
                ';
                $output.='
              </tbody>
              </table>
              </div>
                ';
              
              
                $ender=' ';
                if($signature->status == 1)
                {
                $ender=$signature->message;
                }
                if($welcome->status ==1)
                {
                    $mail=[
                        'title'=>$welcome->subject,
                        'body'=>$welcome->message.'<br><br>'.$output.'<br>'.$ender
                    ];
                    $subject=$welcome->subject;
                    Mail::to($email)->send(new masalMail($mail,$subject));
                }

            }
        }
         $collection=Category::orderBy('id', 'desc')->limit(8)->get();
         $todayOrder=retailerOrder::where('payment','Done')->where('RetailerId',Auth::user()->id)->whereDate('created_at', '=', Carbon::today())->count();
         $monthOrder=retailerOrder::where('payment','Done')
        ->whereMonth('created_at', '=', Carbon::now()->month)->where('RetailerId',Auth::user()->id)
        ->whereYear('created_at', '=', Carbon::now()->year)->count();


        $lastmonthOrder=retailerOrder::where('payment','Done')
        ->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->where('RetailerId',Auth::user()->id)
        ->whereYear('created_at', '=', Carbon::now()->subYear()->year)->count();
        return view('retailer.retailerdash')->with(array('monthOrder'=>$monthOrder,'lastmonthOrder'=>$lastmonthOrder,
        'todayOrder'=>$todayOrder,'collection'=>$collection));
    }

    //Collection Page
    public function collection(Request $request)
    {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
         $status=0;
         $send=0;
         $cat_product = '';
         if(isset($request->category) && $request->category != 'all')
         {
            $products=products::where('category',$request->category)->where('delete_status',0)->orderBy('created_at', 'desc')->get();
            $cat_log=Category::find($request->category);
            $cat_product=$cat_log->name;
            $status=1;
            $send=$request->category;
         }
         else
         {
         $products=products::orderBy('created_at', 'desc')->where('delete_status',0)->get();
         }
         $category=Category::all();
         return view('retailer.collection')->with(array('send'=>$send,'cat_product'=>$cat_product,'category'=>$category,'products'=>$products,'status'=>$status));
    }
    
    
    //Collection Page
    public function go_cat($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
         $status=0;
         $send=0;
         $cat_product = '';
        $products=products::where('category',$id)->where('delete_status',0)->orderBy('created_at', 'desc')->get();
        $cat_log=Category::find($id);
        $cat_product=$cat_log->name;
        $status=1;
        $send=$id;
         
         $category=Category::get();
         return view('retailer.collection')->with(array('send'=>$send,'cat_product'=>$cat_product,'category'=>$category,'products'=>$products,'status'=>$status));
    }

     //Orders Page
     public function orders()
     {
         if (Auth::check()) {
             if($this->user->userRole != 2)
             {
              return redirect('/');
             }
             if($this->user->status != 1)
             {
              return redirect('/retailerlogout');
             }
          }
          else
          {
              return redirect('/');
          }
          $id=Auth::user()->id;
          retailerOrder::where('RetailerId',$id)->update(['view'=>1]);
          $total=retailerOrder::where('RetailerId',$id)->where('payment','Done')->count();
          $payment=retailerOrder::orderBy('id', 'desc')->where('RetailerId',$id)->get();
          $Summary=retailerOrder::orderBy('id', 'desc')->where('RetailerId',$id)->where('payment','Done')->get();
          return view('retailer.order')->with(array('Summary'=>$Summary,'total'=>$total,'payment'=>$payment));
     }


      //Orders Delete
      public function retailer_del_order($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $order=retailerOrder::find($id);
           $user=User::find($order->RetailerId);
           $admin=User::where('userRole',1)->get();
           $product=products::find($order->productId);
           if($order->payment == 'Done')
           {
           $order->cancle_order_request=1;
           $order->save();

            $addition=0;
            if($order->extra != null)
            {
                $extra=additional::where('additional',$order->extra)->first();
                $addition=$extra->price;
            }
            $sub=($order->quantity*$addition)+($order->quantity*$product->wholesalePrice);
            if($order->extra == null)
            {
                $extra="No Extra";
            }
            else
            {
                $extra=$order->extra;
            }
           $output='';
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
            $output.='
            <tr>
            <td style="padding:20px; border: 1px solid black;" > '.'OID.'.$order->id.' </td>
                <td style="padding:20px; border: 1px solid black;" > <img style="height:100px;width:100px" 
                src='.asset('/images/'.$product->image1).'> </td>
                <td style="padding:20px; " > '.$product->name.' </td>
                <td style="padding:20px; border: 1px solid black;" > '.$order->detail.'  </td>
                <td style="padding:20px; " > '.$order->colour.'  </td>
                <td style="padding:20px; " > '.$order->sizes.' </td>
                <td style="padding:20px; " > '.$extra.'  </td>
                <td style="padding:20px; border: 1px solid black;" > '.$product->styleNumber.' </td>
                <td style="padding:20px; " > '.$order->quantity.' </td>
                <td style="padding:20px; border: 1px solid black;" > '.$order->status.' </td>
                <td style="padding:20px; " > $'.$sub.'</td>

            </tr>
            </tbody>
            </table>   
            </div>';

            $welcome=emails::where('name','Order_Cancle')->first();
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
                Mail::to($user->email)->send(new masalMail($mail,$subject));

                foreach($admin as $own)
                {
                    Mail::to($own->email)->send(new masalMail($mail,$subject));
                }
            }

           return redirect()->back()->with('success', 'Order Cancellation Requests Submitted');
           }
           return redirect()->back()->with('error', 'Your Order is not Paid');
           
      }

       //Category Details
       public function cat_detail($id)
       {
           if (Auth::check()) {
               if($this->user->userRole != 2)
               {
                return redirect('/');
               }
               if($this->user->status != 1)
               {
                return redirect('/retailerlogout');
               }
            }
            else
            {
                return redirect('/');
            }
           $products=products::where('category',$id)->where('delete_status',0)->get();
           $category=Category::find($id);
           return view('retailer.products')->with(array('products'=>$products,'category'=>$category));
       }

     public function account(Request $request)
     {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
       
          if(isset($request->update) && $request->update == 'update')
          {
                  $this->validate($request,[
                  'email'=>'required|email'
              ]);

                
                $update = $request->all();
                $email_checker = $this->update_email($update['id'],$update['email']);
               
                if($email_checker['canUpdateEmail'] != 1)
                {
                    unset($update['email']); 
                }
                $uploadId = $update['id'];
                unset($update['id']);
                unset($update['_token']);
                unset($update['update']);
                User::where('id', $uploadId)->update($update);
             return redirect()->back()->with('success', 'Your account Updated '.$email_checker['message']);
            }


     }

     function update_email($id, $email) {
        $canUpdateEmail = 0;
        $message = '';
        //check if user has changed his email or that new email is not already taken
        $user = User::where('id', $id)->first();
        if ($email != $user->email) {
        $alreadyExist = User::where('email', $email)->count();
        if ($alreadyExist <= 0) {
        $canUpdateEmail = 1;
        } else {
        $message = ', This Email Already Exist! ';
        }
        }
        return array('canUpdateEmail' => $canUpdateEmail, 'message' => $message);
        }




        public function passwordUpdate(Request $request)
     {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
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



     public function searcher(Request $request)
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
          $status = 0;
         if(isset($request['cat']) && $request['id'] != '') {
           $products = products::where("category", $request['cat'])->get();
           $status = 1;
         }
         $data_array = [
             "success" => [
             "status" => $status,
             ]
         ];
         return response()->json($data_array);
 
     }



      //Real Bride Images and Videos Page
      public function upload_real()
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $file=retailer_bride::where('retailerId',Auth::user()->id)->orderBy('id','desc')->get();
           $total=retailer_bride::where('retailerId',Auth::user()->id)->count();
           $wedding=wedding::where('retailer',Auth::user()->id)->count();
           $wed=wedding::where('retailer',Auth::user()->id)->get();
          return view('retailer.real')->with(array('wed'=>$wed,'wedding'=>$wedding,'file'=>$file,'total'=>$total));
      }


      //Real Bride Images and Videos Page
      public function retailer_wedding()
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $wedding=wedding::orderBy('id','desc')->where('retailer',Auth::user()->id)->get();
           $total=wedding::where('retailer',Auth::user()->id)->count();
          return view('retailer.wedding')->with(array('total'=>$total,'wedding'=>$wedding));
      }

      // Profile Page
    public function retailer_profile()
    {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
         $profile=User::find(Auth::user()->id);
         return view('retailer.profile')->with(array('profile'=>$profile));
    }


    public function retailerProfile(Request $request)
      {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
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
                 $retailer = Auth::user()->id;
                 $user=User::find($retailer);
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





       //Real Bride Images and Videos Page
       public function wedding_send(Request $request)
       {
           if (Auth::check()) {
               if($this->user->userRole != 2)
               {
                return redirect('/');
               }
               if($this->user->status != 1)
               {
                return redirect('/retailerlogout');
               }
            }
            else
            {
                return redirect('/');
            }
           if(isset($request->submit))
           {
               $this->validate($request,[
                   'wedding'=>'required'
               ]);
               $wedding= new wedding;
               $wedding->name=$request->wedding;
               $wedding->retailer=Auth::user()->id;
               $wedding->save();
               return redirect()->back()->with('success','Wedding Added Successfully');
           }
       }
      
      
       //Edit Wedding Name
       public function wedding_edit(Request $request)
       {
           if (Auth::check()) {
               if($this->user->userRole != 2)
               {
                return redirect('/');
               }
               if($this->user->status != 1)
               {
                return redirect('/retailerlogout');
               }
            }
            else
            {
                return redirect('/');
            }
           if(isset($request->submit))
           {
               $this->validate($request,[
                   'wedding'=>'required',
                   'id'=>'required|numeric'
               ]);
               $wedding=wedding::find($request->id);
               $wedding->name=$request->wedding;
               $wedding->save();
               return redirect()->back()->with('success','Wedding Name Updated');
           }
       }



      //Real Bride Images and Videos to DB
      public function bride_send(Request $request)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           if(isset($request->submit_img) && $request->submit_img == 'Upload')
           {
               $this->validate($request,[
                   'image'=>'required|image',
                   'wedding'=>'required'
               ]);
               $total=retailer_bride::where('wedding',$request->wedding)->count();
               if($total > 9)
               {
                return redirect()->back()->with('error','You can upload only 10 Brides in a Wedding');
               }
               $file=new retailer_bride;
               $file->retailerId=Auth::user()->id;
               $file->wedding=$request->wedding;
               $path=$request->image->store('real');
               $file->file=$path;
               $file->status=1;
               $file->type='image';
               $file->save();
               if($file->save())
               {
                        $admin=User::where('userRole',1)->get();
                        $welcome=emails::where('name','real_bride_get')->first();
                        $signature=emails::where('name','Signature')->first();
                $ender=' ';
                if($signature->status == 1)
                {
                $ender=$signature->message;
                }
                        if($welcome->status == 1)
                        {
                            foreach($admin as $row)
                            {
                            $mail=[
                                'title'=>$welcome->subject,
                                'body'=>$welcome->message.'<br>'.$ender
                            ];
                            $subject=$welcome->subject;
                            Mail::to($row->email)->send(new masalMail($mail,$subject));
                            }
                        }
                   return redirect()->back()->with('success','Your Real Bride Image is Uploaded');
               }

           }

           if(isset($request->submit_vid) && $request->submit_vid == 'Upload')
           {
            if(!isset($request->link))
            {
            $this->validate($request,[
                'video'=>'required'
            ]);
            }
            if(!isset($request->video))
            {
            $this->validate($request,[
                'link'=>'required'
            ]);
            }
            $total=retailer_bride::where('wedding',$request->wedding)->count();
            if($total > 9)
            {
             return redirect()->back()->with('error','You can upload only 10 Brides in a Wedding');
            }

               $file=new retailer_bride;
               //Video
               if(isset($request->video))
               {
               $this->validate($request,[
                   'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
               ]);
               $path=$request->video->store('real');
               $file->file=$path;
               $file->type='video';
               }
               //Video Link
               if(isset($request->link))
               {
               $this->validate($request,[
                   'link'=>'required'
               ]);
               $video_id = explode("?v=", $request->link);
               $file->file='https://www.youtube.com/embed/'.$video_id[1];
               $file->type='link';
               }
               $file->retailerId=Auth::user()->id;
               $file->wedding=$request->wedding;
               $file->status=1;
               $file->save();
               if($file->save())
               {
                        $admin=User::where('userRole',1)->get();
                        $welcome=emails::where('name','real_bride_get')->first();
                        $signature=emails::where('name','Signature')->first();
                        $ender=' ';
                        if($signature->status == 1)
                        {
                        $ender=$signature->message;
                        }
                        if($welcome->status == 1)
                        {
                            foreach($admin as $row)
                            {
                            $mail=[
                                'title'=>$welcome->subject,
                                'body'=>$welcome->message.'<br>'.$ender
                            ];
                            $subject=$welcome->subject;
                            Mail::to($row->email)->send(new masalMail($mail,$subject));
                            }
                        }
                   return redirect()->back()->with('success','Your Real Bride Video is Uploaded');
               }

           }

      }

      //Real Bride Images and Videos Delete
      public function del_real_data($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $file=retailer_bride::find($id);
           $path = $file->file;
           Storage::delete($path);
           $file->delete();
           return redirect()->back()->with('success','Your Real Bride Image is Deleted');
      }


      //Real Bride Images and Videos Delete
      public function del_wedding($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $wedding = wedding::find($id);
           $real = retailer_bride::where('wedding',$id)->get();
           foreach($real as $row)
           {
            if($row->type == 'image' || $row->type == 'video')
            {
                $path = $row->file;
                Storage::delete($path);
            }
            $row->delete();
           }
           $wedding->delete();
           return redirect()->back()->with('success','Your Wedding is Deleted');
      }

       //Category Details
       public function logo(Request $request)
       {
           if (Auth::check()) {
               if($this->user->userRole != 2)
               {
                return redirect('/');
               }
               if($this->user->status != 1)
               {
                return redirect('/retailerlogout');
               }
            }
            else
            {
                return redirect('/');
            }

            if(isset($request->submit))
            {
                $this->validate($request,[
                    'logo'=>'required|mimes:jpeg,jpg,png'
                ]);
                $user=Auth::user();
                $path1=$user->logo;
                Storage::delete($path1);
                $path = $request->logo->store('logos');
                User::where('id',$user->id)->update(['logo'=>$path]);
                return redirect()->back()->with('success','Your Logo Uploaded');
            }
          
       }

}