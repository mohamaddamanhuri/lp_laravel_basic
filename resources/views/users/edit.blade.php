@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Edit') }}</div>

                <div class="card-body">
                    <form action ="" method="POST">
                    @csrf
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Please fill your name" value="{{$User->name}}">
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="email" class="form-control" placeholder="Add your email">{{$User->email}}</textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update My Users!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
