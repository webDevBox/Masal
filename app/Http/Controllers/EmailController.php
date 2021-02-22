<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\products;
use App\Category;
use App\User;
use App\ColourSwatches;
use App\feedback;
use App\retailerOrder;
use App\visitor;
use App\size;
use App\emails;
use App\additional;
use App\retailer_email;
use App\real;
use Carbon\Carbon;

class EmailController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }


    //Email Templates Page
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

        $templates=emails::orderBy('id','desc')->get();
        $user=User::where('userRole',2)->where('status',1)->count();
        return view('admin.email_templates')->with(array('user'=>$user,'templates'=>$templates));

      }
    
    
      //Product Detail Email
    public function emailshare($id)
    {
        $product = products::find($id);
        return view('pages.mailto')->with('product',$product);
    }
      
    
    //Product Detail Send Email
    public function send_mail(Request $request)
    {
        $product=products::find($request->id);
        $name=$request->friend;
        $output='';
                $output.=' <center> <img style="height:400px;width:250px" src='.asset('/images/'.$product->image1).'>  <br>
                     '.$product->name.' <br> $'.$product->wholesalePrice.'  
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
                     cursor: pointer;" href="http://masal.com.au/Collection/'.$product->styleNumber.'">View Product</a>
                     ';
        $mail=[
            'body'=>$request->message.'<br><br>'.$output
        ];
        $subject=$request->subject;
        Mail::to($request->FriendEmail)->send(new masalMail($mail,$subject));
        return redirect()->back()->with(array('success'=>'Your Email Send Successfully','name'=>$name));
    }






      //Email Templates Edit Page
    public function template_edit($id)
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

        $template=emails::find($id);
        return view('admin.email_edit')->with(array('template'=>$template));

      }


      //Email Retailer Page
    public function retailer_mail()
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

        $stokist=User::where('userRole',2)->where('status',1)->get();
        $template=retailer_email::where('status',1)->get();
        return view('admin.email_retailer')->with(array('template'=>$template,'stokist'=>$stokist));
      }


       //Email Send to Retailer
    public function send_email(Request $request)
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
        if(isset($request->sender) && $request->sender == 'send')
        {
            $this->validate($request,[
                'id'=>'required|numeric',
                'subject'=>'required',
                'body'=>'required'
            ]);
            $signature=emails::where('name','Signature')->first();
            $ender=' ';
            if($signature->status == 1)
            {
            $ender=$signature->message;
            }
            $user=User::find($request->id);
            $email=$user->email;
            $mail=[
                'body'=>$request->body.'<br>'.$ender
            ];
            $subject=$request->subject;
            Mail::to($email)->send(new masalMail($mail,$subject));

            if(isset($request->status))
            {   
                $temp=retailer_email::where('subject',$request->subject)->where('message',$request->body)->count();
                if($temp == 0)
                {
                    $template=new retailer_email;
                    $template->subject=$request->subject;
                    $template->message=$request->body;
                    $template->status=1;
                    $template->save();
                }
                
            }
            return redirect()->back()->with('success','Email has been Send');   
        }
        else
        {
            return redirect()->back()->with('error','Email has not been Send');  
        }
    }




       //Email Send to Retailer
       public function all_retailer_mail(Request $request)
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
           if(isset($request->sender) && $request->sender == 'send')
           {
               $this->validate($request,[
                   'subject'=>'required',
                   'body'=>'required'
               ]);
               
               $stokist=User::where('userRole',2)->where('status',1)->get();
               $signature=emails::where('name','Signature')->first();
               $ender=' ';
               if($signature->status == 1)
               {
               $ender=$signature->message;
               }
                foreach($stokist as $row)
                {
                    $mail=[
                        'body'=>$request->body.'<br>'.$ender
                    ];
                    $subject=$request->subject;
                    Mail::to($row->email)->send(new masalMail($mail,$subject));
                }
   
               if(isset($request->status))
               {   
                   $temp=retailer_email::where('subject',$request->subject)->where('message',$request->body)->count();
                   if($temp == 0)
                   {
                       $template=new retailer_email;
                       $template->subject=$request->subject;
                       $template->message=$request->body;
                       $template->status=1;
                       $template->save();
                   }
                   
               }
               return redirect()->back()->with('success','Email has been Send');   
           }
           else
           {
               return redirect()->back()->with('error','Email has not been Send');  
           }
       }



    //Email Send to Retailer
    public function specific(Request $request)
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
                'id'=>'required|numeric',
                'user'=>'required|numeric'
            ]);
            $user=User::find($request->user);
            $email=$user->email;
            $welcome=retailer_email::find($request->id);
            $signature=emails::where('name','Signature')->first();
            $ender=' ';
            if($signature->status == 1)
            {
            $ender=$signature->message;
            }
            $mail=[
                'body'=>$welcome->message.'<br>'.$ender
            ];
            $subject=$welcome->subject;
            Mail::to($email)->send(new masalMail($mail,$subject));
            return redirect()->back()->with('success','Email has been Send');   
        
    }


      //Email Retailer to all
    public function mail_all(Request $request)
    {
        if (Auth::check()) 
        {
           if($this->user->userRole != 1)
           {
            return redirect('/admin');
           }
        }
        else
        {
            return redirect('/admin');
        }
        $stokist=User::where('userRole',2)->where('status',1)->get();
        $welcome=retailer_email::find($request->id);
        $signature=emails::where('name','Signature')->first();
            $ender=' ';
            if($signature->status == 1)
            {
            $ender=$signature->message;
            }
            foreach($stokist as $row)
            {
                $mail=[
                    'body'=>$welcome->message.'<br>'.$ender
                ];
                $subject=$welcome->subject;
                Mail::to($row->email)->send(new masalMail($mail,$subject));
            }
            return redirect()->back()->with('success','Email has been Send'); 
        
    }


       //Email Templates Edit Page
    public function templateeditor(Request $request)
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
            $this->validate($request,[
                'subject'=>'required',
                'message'=>'required',
                'status'=>'required'
            ]);
            $template=emails::find($request->id);
            $template->subject=$request->subject;
            $template->message=$request->message;
            $template->status=$request->status;
            $template->save();
            if(retailer_email::where('email_id',$request->id)->count() > 0)
            {
            retailer_email::where('email_id',$request->id)->update([
                'subject'=>$request->subject,
                'message'=>$request->message,
                'status'=>$request->status
            ]);
            }
            return redirect()->back()->with('success','Your Email Template Updated Successfully');
        }   
      }


      //Email Templates Edit Page
    public function template_stat($id,$value)
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
            $template=emails::find($id);
            $template->status=$value;
            $template->save();

            retailer_email::where('email_id',$id)->update([
                'status'=>$value
            ]);
            if($value == 1)
            {
            return redirect()->back()->with('success','Your Email Template Active Successfully');
            }
            if($value == 2)
            {
            return redirect()->back()->with('success','Your Email Template InActive Successfully');
            }
    }      


    //Email Templates Add In DB
    public function add_template(Request $request)
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
            if(isset($request->send) && $request->send == 'send')
            {
                $this->validate($request,[
                    'temp_name'=>'required|unique:emails,name',
                    'subject'=>'required',
                    'message'=>'required',
                    'status'=>'required'
                ]);
                $template=new emails;
                $template->name=$request->temp_name;
                $template->subject=$request->subject;
                $template->message=$request->message;
                $template->status=$request->status;
                $template->save();

                $retailer=new retailer_email;
                $retailer->subject=$request->subject;
                $retailer->message=$request->message;
                $retailer->status=$request->status;
                $retailer->save(); 
                return redirect()->back()->with('success','Your Email Template Added Successfully');
            }   
    }   
    
    
     //Email Reply to User
     public function mail_reply(Request $request)
     {
         if (Auth::check()) 
         {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         if(isset($request->send) && $request->send == 'SEND')
         {
             $this->validate($request,[
                 'id'=>'required|numeric',
                 'title'=>'required',
                 'message'=>'required'
             ]);
             $user=feedback::find($request->id);
             $email=$user->email;
             $signature=emails::where('name','Signature')->first();
             $ender=' ';
             if($signature->status == 1)
             {
             $ender=$signature->message;
             }
             $mail=[
                'title'=>$request->title,
                'body'=>$request->message.'<br>'.$ender
            ];
            $subject=$request->title;
            Mail::to($email)->send(new masalMail($mail,$subject));
            return redirect()->back()->with('success','Your Reply has been send');
         }
         return redirect()->back()->with('error','Your Reply has not been send');
        
     }


     //Delete Retailer Email Templete
     public function delete_templete($id)
     {
         if (Auth::check()) 
         {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $temp=retailer_email::find($id);
         $email=emails::find($temp->email_id);
         $email->delete();
         $temp->delete();
         return redirect()->back()->with('success','Templete Deleted Successfully');
     }

     //Edit Retailer Email Templete Page
     public function edit_templete($id)
     {
         if (Auth::check()) 
         {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $template=retailer_email::find($id);
         return view('admin.retailer_temp')->with('template',$template);
     }


     //Edit Retailer Email Templete in DB
     public function temp_edit(Request $request)
     {
         if (Auth::check()) 
         {
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
             $this->validate($request,[
                 'id'=>'required|numeric',
                 'subject'=>'required',
                 'message'=>'required'
             ]);
            $template=retailer_email::find($request->id);
            $template->subject=$request->subject;
            $template->message=$request->message;
            $template->save();

            if(emails::where('id',$template->email_id)->count() > 0)
            {
                emails::where('id',$template->email_id)->update([
                    'subject'=>$request->subject,
                    'message'=>$request->message
                ]);
            }
            

            return redirect()->back()->with('success','Templete Updated Successfully');
         }
         return redirect()->back()->with('error','Templete Not Updated');
        
     }



}