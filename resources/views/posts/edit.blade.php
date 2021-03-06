@extends('layouts.app')

@section('content')
@include('inc.navbarcss1')


    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group jumbotron">
        {{Form::label('title', 'What are item are you lending?')}}
                {{Form::text('title', $post->title, ['class' => 'input100','required' => 'required', 'placeholder' => 'Ex: Solderless Breadboard'])}}
                </div>

                <div class="input-100">
                </br>
                {{Form::label('body', 'Description and specifications')}}
                {{Form::textarea('body', $post->body, ['rows' => '3', 'style'=>'height: 80px; height: 140px;padding-left: 30px;padding-top: 10px;' , 'required' => 'required','class' => 'input100', 'data-validate-minlength' => '40', 'data-validate-mexlength' => '700', 'placeholder' => 'Description'])}}
                </div>
                <div class="input-100">
                </br>
                {{Form::label('location', 'Location')}}
                {{Form::text('location', $post->location, ['class' => 'input100','required' => 'required', 'placeholder' => 'City/zipcode'])}}
                </div>
                </br>
                <h3>Rental Rates</h3>	

                <div class="row">
                        <div class="col s12 m6">
                                {{Form::label('price', 'Price per day')}}
                                {{Form::text('price_per_day', $post->price_per_day, ['class' => 'input100','required' => 'required', 'input type'=>'number', 'placeholder' => '₱'])}}
                        </div>
                        <div class="col s12 m6">
                                {{Form::label('Insurance deposit', 'Insurance deposit')}}
                                {{Form::text('deposit', $post->deposit, ['class' => 'input100','required' => 'required', 'input type'=>'number', 'placeholder' => '₱'])}}
                        </div>
                </div>
                <!-- <small>Price per day = ( Original price / item lifetime ) * comission % </small> -->

                <div class="input-100">
                </br>
                {{Form::label('Terms and Conditions', 'Terms and Conditions')}}
                {{Form::textarea('condition', $post->condition, ['rows' => '3', 'style'=>'height: 140px;height: 140px;padding-left: 30px;padding-top: 10px;','value'=> 'The payment must be received before giving the item. Additional fee of "deposit price" for the insurance deposit will be given back after the item is returned with no issues. The rentee must replace the damaged/lost parts or buy the item. The item should be handled with care and kept away from water and children. The device is in good condition with no cosmetic defects.' , 'required' => 'required', 'class' => 'input100', 'data-validate-minlength' => '40', 'data-validate-mexlength' => '1800', 'placeholder' => 'Use of item, condition of item, return of item, charges and payments, general provisions, privacy and protection'])}}
                </div>
                <div class="input-100">
                </br>
                {{Form::label('category', 'Category')}}
                        <div class="row">
                        <div class="col s12 m3">
                        {{ Form::radio('category', 'Books and references' , false) }}Books and references
                        </div>
                        <div class="col s12 m3">
                        {{ Form::radio('category', 'Devices and instruments' , false) }}Devices and instruments
                        </div>
                        <div class="col s12 m3">
                        {{ Form::radio('category', 'Apparel and Accesories' , false) }}Apparel and Accesories
                        </div>
                        <div class="col s12 m3">
                        {{ Form::radio('category', 'General Supplies' , false) }}General Supplies
                        </div>
                        </div>
                </div>
                </br>
                <div >
                         <div class="row">
                                <div class="col s12 m6">
                                
                                 Choose an image (Max file size: 1mb)
                                 </br>
                                 Upload at least one image 
                                          </br></br>
                                 </div>
                                 <div class="col s12 m6">

                                 <ul>

                                         <li>                                 {{Form::file('cover_image')}}

                                         </li>
                                          </br>
                                         <li>                                 {{Form::file('image1')}}

                                         </li>
                                         </br>
                                         <li>                                 {{Form::file('image2')}}

                                         </li>
                                 </ul>
                                 </div>
                                
                        </div>
                </div>
                        </br>
                <div class="row">
                        {{-- Edit Modal --}}
                        <!-- Button trigger modal -->
                        <div class="col s12 m6">
                                <a>
                                <button type="button" class="login100-form-btn" data-toggle="modal" data-target="#exampleModal1">
                                        Save
                                </button>
                                </a>
                        </div>
                                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Save</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        Save Changes?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                {{Form::hidden('_method', 'PUT')}}
                                                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
                                        {!! Form::close() !!}
                                        </div>
                                </div>
                                </div>
                        </div>
                        {{-- Delete Modal --}}
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
@endsection