@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Pig Management System</h1>
                </div>

               
            </div>
        </div>

         <div class="col-md-8">
            <div class="card"  style="background-color:green">
                <div class="card-header">
                    <h1><a  href="{{ url('/stock') }}" style="text-decoration: none;color:black">Stock Management</a></h1>
                </div>

               
            </div>
        </div>

         <div class="col-md-8" >
            <div class="card" style="background-color:yellow">
                <div class="card-header">
                    <h1><a  href="{{ url('/pigs') }}" style="text-decoration: none;color:black">Pigs Management</h1>
                </div>

               
            </div>
        </div>

    </div>
</div>
@endsection
