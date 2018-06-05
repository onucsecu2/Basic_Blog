@extends('layouts.admin_app')

@section('admin_content')
<div class="container">
	
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                
            	<div class="panel panel-default">
<!-- <form  action="{{url('/admin/dashboard_')}}" method="post" enctype="multipart/form-data"> -->


<!-- </form> -->
            	 @foreach($top_15_posts as $status)
            	 
            	 <div class="panel panel-default">
                	 	<div class="panel-heading ">
        					<div class="panel-title text-left">				
             					<b>{{$status->status_heading_text}}</b>
        					</div>
        					<div class="panel-title text-right">				
             					<i><span>{{$status->type}}</span></i>
        					</div>
        				</div>
                       <div class="panel-body">
                         <div class="row">
                           <div class="col-md-11">
                               <p>{{$status->status_text}}</p>
                               <i>{{$status->created_at->diffForHumans()}}</i>
                           </div>
                           <div class="col-md-8">
                              <hr>
                              <ul class="list-unstyled list-inline">
                                <li>
                                     {!! Form::open() !!}
                                     {!! Form::hidden('approve',$status->id) !!}
                                        <input type="submit" name="submit" value="Approve" id="submit" class="btn btn-success btn-lg">
                                     {!! Form::close() !!}
                                     {!! Form::open() !!}
                                     {!! Form::hidden('dismiss',$status->id) !!}
                                        <input type="submit" name="submit" value="Dismiss" id="submit" class="btn btn-danger btn-lg">
                                     {!! Form::close() !!}
                               		
                                </li>
                             </ul>
                           </div>
                          </div>
                       </div>
                </div>
                 
            	@endforeach
            	</div>           
            	
        </div>
          
    </div>
</div>
</div>
</div>
@endsection
