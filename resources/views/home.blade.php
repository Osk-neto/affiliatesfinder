@extends('layout.master')
@section('content')
    <div class="header">
        <h1>Find the affiliates within 100km from Gambling.com</h1>
    </div>
    <form action="{{ route('affiliates-view') }}" method="get">
        <div class="btn">
            <button type="submit">Find affiliates</button>
        
        </div>
        

    </form>    
@endsection    
         
    



















