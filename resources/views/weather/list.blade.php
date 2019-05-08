@extends('layouts.main')
@section('container')

<h2>Weather</h2>
<ol class="breadcrumb">
  <li><a href="/weather/city/Toronto">Toronto</a></li>
  <li><a href="/weather/city/Montreal">Montreal</a></li>
  <li><a href="/weather/city/Vancouver">Vancouver</a></li>
  <li><a href="/weather/city/Edmonton">Edmonton</a></li>
</ol> 
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>City</th>
                <th>Temperature</th>  
                <th>Minimum temperature</th>  
                <th>Maximum temperature </th>  
                <th>Atmospheric pressure<br>(sea level)</th>  
                <th>Atmospheric pressure<br>(ground level)</th> 
                <th>Humidity%</th> 
                <th>Group of weather</th> 
                <th>Weather condition</th> 
                <th>Cloudiness%</th> 

                <th>Wind speed</th>
                <th>Wind direction</th>
                <th>Rain volume(last hour)</th>
                <th>Snow volume(last hour)</th>
                <th>Data/time</th> 
            </tr>
        </thead>
 
        <tbody>
            @foreach ($weathers as $p)
            <tr>
                <td>{{$p->city}} </td>
                <td>{{$p->temp}} </td>
                <td>{{$p->temp_min}}</td>
                <td>{{$p->temp_max}}</td>
                <td>{{$p->sea_level}} </td>
                <td>{{$p->grnd_level}}</td>
                <td>{{$p->humidity}}</td>
                <td>{{$p->main}} </td>
                <td>{{$p->description}}</td>
                <td>{{$p->icon}}</td>
                <td>{{$p->all}} </td>
                <td>{{$p->speed}} </td>
                <td>{{$p->deg}}</td>
                <td>{{$p->pod}}</td>
                <td>{{$p->aldt_txtl}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>  

    <div class="modal fade" id="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
	     <div class="modal-content">
	       <div class="modal-header">
	         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	         <h4 class="modal-title" id="myModalLabel">News</h4>
	       </div>
	       <div class="modal-body">
					 <div id="news">

					 </div>
	       </div>
	     </div>
	    </div>
	 </div>


<script>
function seedatail(id){

     $.post('/torontoNews/viewArticle/', {KEY_DATA: id}, function(return){
         $("#modal").modal({ backdrop: 'static' });
         $("#news").html(return);
     });
 }
</script>
@stop

