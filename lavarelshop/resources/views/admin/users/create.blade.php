@extends('admin.layout')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Basic form</h4>
            {{-- <p class="card-description"> THêm  user </p> --}}
            <div class="card-header">Thêm user</div>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="cart-body">
                @if(Session('status'))
                <div class="aler aler-success" role="alert">
                    {{Session('status')}}
                </div>
                @endif
            </div>
            
            <form class="forms-sample" action="{{ route('admin.users.store') }}" method="post">
                {{ csrf_field() }}
               

                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="name" value="" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" name="email" value=""  class="form-control" id="exampleInputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" name="password" value=""  class="form-control" id="exampleInputPassword4" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection