@extends('layouts.main')
@section('container')

<h2>News from Toronto</h2>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Author</th>  
                <th>Source</th>  
                <th>Title</th>  
                <th>Url</th>  
                <th>Published At</th> 
                <th>Read</th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $p)
            <tr>
                <td>{{$p->author}} </td>
                <td>{{$p->source->name}} </td>
                <td>{{$p->title}}</td>
                <td><img src="{{$p->urlToImage}}" class="img-responsive" alt="Cinque Terre" width="94" height="126">  </td>
                <td>{{$p->publishedAt}}</td>
                <td>
                    <a href="{{$p->url}}" target="_blank">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </td>  
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

