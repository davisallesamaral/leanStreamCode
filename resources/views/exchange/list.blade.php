@extends('layouts.graph')
@section('container')

<h2>Exchange rate information</h2>
    @foreach ($result as $p)
    <div class="widget widget-monthly-statistics">
        <div class="widget-content container-fluid">
        <div class="row text-center">
        
            <div class="col-xs-4">
            <div class="fit-text">
                <h4>{{$p['From_Currency_Name']}}</h4>
                <h5>$1,00</h5>
                
                @if($p['From_Currency_Code']=='CAD')
                    <span class="label label-danger">
                @else
                    <span class="label label-success">
                @endif
                <i class="fa fa-arrow-circle-up"> </i>
                 {{$p['From_Currency_Code']}} </span><br>
                <small>{{$p['Last_Refreshed']}}</small>
            </div><!-- fit-text -->
            </div><!-- col -->
        
            <div class="col-xs-4">
            <div class="fit-text">
                <h4>{{$p['To_Currency_Name']}}</h4>
                <h5>${{ substr($p['Exchange_Rate'], 0, 4) }}</h5>
                @if($p['From_Currency_Code']=='CAD')
                    <span class="label label-success">
                @else
                    <span class="label label-danger">
                @endif
                <i class="fa fa-arrow-circle-down"></i> {{$p['To_Currency_Code']}}</span><br>
                <small>{{$p['Last_Refreshed']}}</small>
            </div><!-- fit-text -->
            </div><!-- col -->
            
        </div><!-- row -->
        @endforeach
  

@stop

