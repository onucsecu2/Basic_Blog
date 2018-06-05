@extends('layouts.admin_app')

@section('admin_content')
<div class="container">
	
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">



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
    </div>
</div>
</div>
@endsection
