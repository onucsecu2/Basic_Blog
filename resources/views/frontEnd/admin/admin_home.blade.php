@extends('layouts.admin_app')

@section('admin_content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                {!! Form::open() !!}
            	<div class="panel panel-default">

                    <div class="panel-body">
                        <div class="form-group">
                        	 <label>Heading</label>
                        	<textarea class="form-control" name="status-heading-text"  id="status-heading-text"></textarea>
                            <label> Write Something</label>
                            <textarea class="form-control" name="status-text"  id="status-text"></textarea>   
                        </div>

                    </div>
                <div class="panel-footer clearfix">
      			<div class= "form-group">
						<select class="selectpicker show-tick" name="type" id="type" data-size="4">

    								<option>Education</option>
    								<option>Sports</option>
                                  	<option>Campus</option>
                                  	<option>News</option>
                          </select>
                 </div>
                 	<button class="btn btn-info pull-right btn-sm">Post</button>
                 </div>
            	
            	{!! Form::close() !!}
            	</div>
            	 @foreach($top_15_posts as $status)
           
                {!!
                    view('layouts.user_status_layout',[
                    'status' => $status,
                     'user' => \App\Eloquent\User::find($status->user_id),
                     'comments' => \App\Eloquent\Comment::where('status_id',$status->id)->orderBy('id','DESC')->get() 
                      ]) 

               !!}
            @endforeach
              
            	</div>           	
        </div>
        {{$top_15_posts->links()}}
    </div>
</div>
</div>
@endsection
