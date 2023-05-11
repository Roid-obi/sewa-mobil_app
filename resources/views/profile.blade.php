@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

<!-- Profile Image -->
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
             src="{{ asset('images/doktah.jpg') }}"
             alt="User profile picture">
      </div>

      <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

      <p class="text-muted text-center">{{ Auth::user()->role }}</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
          <b>ID</b> <a class="float-right">{{ Auth::user()->id }}</a>
       </li>
        <li class="list-group-item">
           <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
        </li>
        <li class="list-group-item">
          <b>Umur</b> <a class="float-right">{{ Auth::user()->umur }}</a>
        </li>
        <li class="list-group-item">
          <b>Alamat</b> <a class="float-right">{{ Auth::user()->alamat }}</a>
        </li>
      </ul>

      {{-- <a href="{{ route('logout') }}" class="btn btn-danger btn-block"><b>Logout</b></a> --}}
      <div class="m-1">
        <a class="btn btn-danger btn-block" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

        </div>
      </div>
    </div>
 </section>
  @endsection