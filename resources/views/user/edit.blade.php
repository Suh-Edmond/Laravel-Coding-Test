@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center pt-4">

        <div class="card  " style="width: 40rem;">
            <div class="d-flex justify-content-center pt-1">
                <avatar size="100px">
                    <img src="{{asset('img/user.png')}}" style="width: 100px; height: 100px" />
                </avatar>
            </div>
            <div class="card-body justify-content-center">
                <form action="/user/profile/{{$user->id}}" method="POST">
                    @method('PUT')

                    <div class="row rounded-border pb-3">
                        <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h6">

                            <span class="pl-2"><i class="fas fa-user pr-3"></i> Name</span>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                            <input type="text" class="form-control" name="name" required value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="row rounded-border pb-3">
                        <div class="col-sm-12 col-lg-12 col-xs-12 h6">
                            <span class="pl-2">
                                <i class="fas fa-envelope pr-3"></i>
                                Email
                            </span>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                            <input type="email" class="form-control" name="email" required value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="row rounded-border pb-3">
                        <div class="col-sm-12 col-lg-12 col-xs-12 h6">
                            <span class="pl-2">
                                <i class="fas fa-phone-alt pr-3"></i>
                                Telephone
                            </span>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-12 col-xs-12 ">
                            <input type="text" class="form-control" name="telephone" required value="{{$user->telephone}}">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Save Profile
                            </button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection