@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="../../../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../../fonts/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="../../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../../fonts/elegant-font/html-css/style.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/lightbox2/css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="../../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../../../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../../../css/util.css">
    <link rel="stylesheet" type="text/css" href="../../../css/main.css">

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2008481492505313&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="row">
    <!-- class="col s12 m6" -->
            <div  style="margin: 0 auto;" class="col s12 m6">
            </br>
            <ul>
                <li>
             <img  style="width:350px" src="https://s3-ap-southeast-1.amazonaws.com/hiramstorage/{{$post->cover_image}}" />
                </li>
                <li>
             <img  style="width:350px" src="https://s3-ap-southeast-1.amazonaws.com/hiramstorage/{{$post->image1}}" />
                </li>
                <li>
             <img  style="width:350px" src="https://s3-ap-southeast-1.amazonaws.com/hiramstorage/{{$post->image2}}" />
                </li>
                 </br>
</ul>   
            </div>
        <br><br>
        <div class="col s12 m6" style=" margin: 0 auto;">
            </br>
            <h1>{{$post->title}}</h1>
                <a href="/profile/{{$post->user_id}}">Owner {{$post->user->name}}</a>
                {{-- <small>Owner:</small>
                </br>
                <small>{{$post->user->name}}</small> --}}
            </br>
            </br>
            <div> 
            <small>{{$post->body}}</small>
                <hr><small>Price per hour {{$post->price_per_hour}} | Price per day {{$post->price_per_hour}}</small>
            </hr>
            </br>
            <hr>
               <small>Category:</small>
            </hr>
            </br>
                <small>{{$post->category}}</small>
            </div>
            
            <hr>
               <small>Location:</small>
            </hr>
            </br>
            <div>
                <small>{{$post->location}}</small>
            </div>
            <hr>
            <small>Terms and Conditions: </br> {{$post->condition}}</small>
            </hr>
            <hr>
            <small>Uploaded on {{$post->created_at}} </br> by {{$post->user->name}}</small>
            <hr>
            </br>
            <div class="fb-like" style="width:100%;" data-href="http://hiram.herokuapp.com/posts/{{$post->id}}" data-layout="button" data-action="recommend" data-size="large" data-show-faces="true" data-share="true"></div>
            <div class="fb-comments" style="width:90%;" data-href="http://hiram.herokuapp.com/posts/{{$post->id}}" data-numposts="4"></div>

        </div>
    </div>
    @if(!Auth::guest())
     
        @if(Auth::user()->id == $post->user->id)

            <div class="row">
                
                <div class="col s12 m6">
                    <!-- {{Form::submit('EDIT', ['class' => 'login100-form-btn'])}} -->
                    <a href="/posts/{{$post->id}}/edit">
                        <button class="login100-form-btn">
                            EDIT
                        </button>
                    </a>
                </div>
                
                <!-- Button trigger modal -->
                <div class="col s12 m6">
                    <a>
                        <button type="button" class="login100-danger-btn" data-toggle="modal" data-target="#exampleModal">
                                Delete
                        </button>
                    </a>
                </div>
                        
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are your sure you want to delete this post?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </br> </br>
         
        @else 
        <br>
            <div class="row">

                <div class="col s12 m6">
                    <a href="tel:{{$post->user->mobile}}">
                        <button class= "login100-form-btn">
                            CALL
                        </button>
                    </a>
                </div>
                
                <div class="col s12 m6">
                    <a href="sms:{{$post->user->mobile}}?body=hi {{$post->user->name}}, This is {{(Auth::user()->name)}} and I am interested on renting your {{$post->title}}">
                        <button class= "login100-form-btn">
                            MESSAGE
                        </button>
                    </a>
                </div>
                
            </div> 
            <br>
            <div class="col s12 m6 centered" style="width: 80%">
                
                <a href="/about">
                    <button class= "login100-form-btn">
                        REPORT
                    </button>
                </a>
            </div>
            </br> </br>
        @endif
    @else
    </br>
            <div class="col s12 m6">
                    <a href="/login">
                        <button class= "login100-form-btn centered" style=" width: 300px;">
                            Login to Hiram to rent
                        </button>
                    </a>
                </div>
                </br> </br>
    @endif    
    @include('inc.footer')
    </footer>
@endsection