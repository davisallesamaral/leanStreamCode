@extends('layouts.main')
@section('container')
	<!-- Preloader -->
	
   
    
<div id="content">
	
	<div class="page-title">
	<h1>{{$p->title}}</h1>
	</div>
	
	<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-sm-6">
		<div class="pane equal">
		<p><span>Published At: {{$p->publishedAt}}</span></p>
		<p><span>Author: {{$p->author}}</span></p>
		Source: {{$p->source->name}}
		<img src="{{$p->urlToImage}}">
		{{$p->description}}<br><br>
		</div><!-- pane -->


		</div><!-- col -->
	
	</div><!-- row -->
	</div><!-- container-fluid -->
	
</div><!-- content -->
<!-- CONTENT -->
<script type="text/javascript">
	$(document).ready(function(){
		var url = "/torontoNews/viewArticle/1";
		jQuery('#modellink').click(function(e) {
		    $('.modal-container').load(url,function(result){
				$('#myModal').modal({show:true});
			});
		});
	});
</script>

@stop