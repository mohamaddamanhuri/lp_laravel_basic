@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Create') }}</div>

                <div class="card-body">
                    <form action ="" method="POST">
                    @csrf
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Please fill your name">
                    </div>
                    <div class="form-group">
                    <label>Email</label>
                    <textarea type="text" name="email" class="form-control" placeholder="Add your E-mail"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create New Users</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection