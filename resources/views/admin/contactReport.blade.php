@extends('layout.admin')
@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
    
        <div class="block full">
            <!-- All Products Title -->
            <div class="block-title">
             
                
                <h2><strong>All</strong> Feedback</h2><br>
                @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="width: 500px;">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="width: 500px;">{{ Session::get('error') }}</p>
            @endif
            </div>
            <!-- END All Products Title -->
            
            <!-- All Products Content -->
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter table-responsi">
                <thead>
                    <tr>
                        <th class="text-center">User Name</th>
                        <th class="text-center">User Phone</th>
                        <th class="text-center">User Email</th>
                        <th class="text-center">User Message</th>
                        <th class="text-center">Added</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($feedback) > 0)
                    @foreach($feedback as $row)
                    <tr>
                        <td class="text-center">{{$row->name}}</td>
                        <td class="text-center">
                            {{$row->phone}}
                        </td>
                        <td class="text-center">
                            {{$row->email}}
                        </td>
                        <td class="text-center">
                            {{$row->message}}
                        </td>
                      
                        <td class="text-center">{{$row->created_at}}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="#" data-toggle="modal" data-target="#reply" id="{{ $row->id }}" title="Reply" class="btn btn-xs btn-primary mail_replier"><i class="fa fa-reply" aria-hidden="true"></i></a>
                                <a href="{{route('deletefeed', array('id' => $row->id))}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            
            
            <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Reply to User</h3>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="{{route('mail_reply')}}" method="POST">
                    @csrf
                <div class="row">
                <div class="form-group col-md-12 col-sm-12" style="display: none;">
                <input type="text" name="id" class="form-control" value="" id="sender" required>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label for="">Email Title <span style="color: red;">*</span></label>
                    <input type="text" name="title" placeholder="Your Title" class="form-control" required>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                <label for="">Message Body <span style="color: red;">*</span></label>
                <textarea name="message" id="" rows="5" class="form-control ckeditor" placeholder="Your Reply" required></textarea>
                </div>
                </div>
                <div class="modal-footer">
                <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
                <input type="submit" name="send" value="SEND" class="btn btn-primary"> 
                </form>
                </div>
                </div>
                </div>
                </div>
            
            
            <!-- END All Products Content -->
            </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
    
    </div>
    </div>
    </div>
    <script>
        $('.mail_replier').click(function()
        {
           var id = $(this).attr('id');
           $('#sender').attr('value',id);
        });
    </script>
@endsection