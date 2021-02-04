@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center pt-4 px-2">

        <div class="card" style="width: 40rem;">
            <div class="pl-4 pt-4">
                <label class="h3">Profile</label>
            </div>
            <div class="d-flex justify-content-center">
                <avatar size="170px">
                    <img src="{{asset('img/user.png')}}" style="width: 150px; height: 150px" />
                </avatar>
            </div>
            <div class="card-body justify-content-center">

                <div class="row rounded-border pb-2">
                    <div class=" col-12 col-sm-12 col-lg-12 col-xs-12">
                        <span class="pl-3 h6 ">
                            Name</span>
                        <span class="pl-4 h6"><label>{{$user->name}}</label></span>
                    </div>
                </div>
                <div class="row rounded-border pb-2">
                    <div class="col-sm-12 col-lg-12 col-xs-12 ">
                        <span class="pl-3 h6   ">
                            Email</span>
                        <span class="pl-5 h6"><label>{{$user->email}}</label></span>
                    </div>
                </div>
                <div class="row rounded-border pb-3">
                    <div class="col-sm-12 col-lg-12 col-xs-12">
                        <span class="pl-3 h6 "> </span>
                        Telephone
                        <span class="pl-4 h6"><label>{{$user->telephone}}</label></span>
                    </div>
                </div>
                <div class="row justify-content-center pt-3 pb-3">
                    <div>
                        <a role="button" class="btn text-white" href="/user/profile/{{$user->id}}/edit">
                            Update Profile
                            <span class="pl-3"><i class="fas fa-pen"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style scoped>
    .btn {
        background-color: darkcyan;
    }
</style>
@endsection