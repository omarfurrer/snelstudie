@extends('layouts.main')

@section('content')

<!-- Home background sector --> 
<div class="absolute-wrapper homeBgContainer">
	<div class="container-fluid">
		<div class="row text-center homeHeaderRow">
			<div class="col-md-12">
				<h1>Translator Translations</h1>
			</div>
			<div class="col-md-12">
				<h4>Professional translations at affordable prices</h4>
			</div> 
			<div class="col-md-12">
				<button class="btn btn-success" id="ctaHomePg">Get A Quotation</button>
			</div>   
		</div>
	</div>
</div>
<!-- Video sector --> 

<div class="container vidContainer">
	<div class="row text-center">
		<div class="col-md-12">
			<h1>Translation Agency Translator</h1>
		</div>
		<div class="col-md-12">
			<hr class="redLine">
		</div>
		<div class="col-md-12">
			<h2 class="greySubHeader">Professional translations with superior quality</h2>
		</div>
		<div class="col-md-12">
			<p class="greyParagraph">Are you looking for a translation that gets your message across and reads just like the original? Would you like to enjoy the benefits of doing business on the internet, but still get the personal attention you deserve? Translation Agency Scriptware has been delivering professional translations with superior quality for more than 25 years. On time, as agreed, and always at an affordable price! But Scriptware offers much more than just expert translators who know how to talk to your target group in the right way.</p>
		</div>
		<div class="col-md-8 offset-md-2">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
			</div>
		</div>
	</div>
</div>

<!-- panoramaImg sector --> 

<div class="container-fluid panoramaImg">
	<div class="row text-center">
		<div class="col-md-12">
			<h1>Translator</h1>
		</div>
		<div class="col-md-12">
			<h5><small>= INNOVATION IN TRANSLATION =</small></h5>
		</div>
	</div>
</div>

<!-- team sector --> 
<div class="container team">
	<div class="row">
		<div class="col-md-6">
			<img src="../images/img3.jpg">
		</div>
		<div class="col-md-6">
			<h5>THE TEAM AT TRANSLATION AGENCY TRANSLATOR</h5>
			<p>Over the years, we have brought together a team of dedicated people, each an expert in their own field. Project managers who know how to select the right translators and coordinate projects. Translators who can translate anything and everything, reviewers who can spot the tiniest error, and advisers who can come up with efficient solutions for your documentation process. But whatever their role within our company, all our staff have one thing in common: they are all professionals with a passion for languages</p>
		</div> 
	</div>
</div>

<!-- counter sector --> 
<div class="container-fluid counterContainer">
	<div class="row text-center">
		<div class="col-md-3 sideBorder">
          <h1>26</h1>
          <h4>YEARS OF EXPERIENCE</h4>
		</div>
		<div class="col-md-3 sideBorder">
          <h1>20,054,725</h1>
          <h4>WORDS PER YEAR</h4>
		</div>
		<div class="col-md-3 sideBorder">
          <h1>974</h1>
          <h4>NEW CUSTOMERS</h4>
		</div>
		<div class="col-md-3">
          <h1>1,368</h1>
          <h4>TRANSLATORS</h4>
		</div>
	</div>
</div>

@endsection

@push('scripts')

@endpush
