@extends('layouts.main')

@section('content')
<div class="container-fluid staticBgContainer">
</div>

<div class="whiteRotateBox">
</div>

<div class="container hero">
	<div class="row">
		<div class="col-md-12">
			<center><h1>Words that Work for Smarter Digital Marketing and Sales</h1></center>
		</div>
		<div class="col-md-8 offset-md-2">
			<div class="imgBox">
				<h4>You need a superior digital marketing and sales education to build a remarkable online presence.</h4>
				<button class="imgBoxBtn">Get Free Training</button>
			</div> 
			<p class="linkParent"><a class="postImgLink" href="#">CLICK FOR THE LATEST COPYBLOGGER ARTICLES ↓</a></p>
		</div>
	</div>
</div>	

<div class="container mt-5">

	<div class="row">
		<div class="col-md-8 mt-5">
			@include("subviews.cards.bigCard")				
		</div>
		<div class="col-md-4">
			<div class="row">
				@include("subviews.cards.card")	
			</div>
			<div class="row mt-5">
				@include("subviews.cards.card")
			</div>
		</div>
	</div> 

	<div class="row mt-5">
		<div class="col-md-4">
			@include("subviews.cards.card")		
		</div>
		<div class="col-md-4">
			@include("subviews.cards.card")			
		</div>
		<div class="col-md-4">
			@include("subviews.cards.card")		
		</div>
	</div>
	
	<div class="row mt-5">
		<div class="col-md-4">
			<div class="row">
				@include("subviews.cards.card")	
			</div>
			<div class="row mt-5">
				@include("subviews.cards.card")
			</div>	
		</div>
		<div class="col-md-8 mt-5 bigCard2">
			@include("subviews.cards.bigCard")				
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-md-4">
			@include("subviews.cards.card")		
		</div>
		<div class="col-md-4">
			@include("subviews.cards.card")			
		</div>
		<div class="col-md-4">
			@include("subviews.cards.card")		
		</div>
	</div>   

	<div class="row mt-5">
		<div class="col-md-4 offset-md-4">
			<nav aria-label="Page navigation example" class="myPagi">
				<ul class="pagination">
					<li class="page-item"><a class="page-link myPagiLink active" href="#">1</a></li>
					<li class="page-item"><a class="page-link myPagiLink" href="#">2</a></li>
					<li class="page-item"><a class="page-link myPagiLink" href="#">3</a></li>
					<li class="page-item"><sub>...</sub></li>
					<li class="page-item"><a class="page-link myPagiLink" href="#">317</a></li>
					<li class="page-item"><a class="page-link myPagiBtn" href="#">Next Page</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<div class="container-fluid staticBgContainerB">
	</div>


	<div class="row mt-5">
		<div class="col-md-6">
			<div class="imgBox">
				<h4>You need a superior digital marketing and sales education to build a remarkable online presence.</h4>
				<button class="imgBoxBtn">Get Free Training</button>
			</div> 
		</div>

		<div class="col-md-6 preFooter">
			<h1 class="mt-15">Get free access to proven marketing training.</h1>
		</div>

		<hr class="preFooterHr">
	</div>
</div>

@endsection

@push('scripts')

@endpush
