@extends('layout.master')
@section('content')
        <div class="header header-affiliates">
                <h1>Affiliates</h1>
        </div>
        <table>
                <tr>
                  <th>Affiliate ID</th>
                  <th>Affiliate Name</th>
                  
                </tr>
                @foreach($affiliate_100km as $affiliate)
                
                  <tr>
                     <td>{{$affiliate->affiliate_id}}</td>
                     <td>{{$affiliate->name}}</td>
                  </tr>
                @endforeach
                
                
              </table>
                
@endsection    

