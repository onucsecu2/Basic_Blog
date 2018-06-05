@extends('layouts.app')

@section('content')
<div class="container">
	
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                {!! Form::open() !!}
            	<div class="panel panel-default">


            	 @foreach($top_15_posts as $status)
            	 <div class="panel panel-default">
                	 	<div class="panel-heading ">
        					<div class="panel-title text-left">				
             					<b>{{$status->status_heading_text}}</b>
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
                               		<span>{{$status->type}}</span>
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
@endsection
