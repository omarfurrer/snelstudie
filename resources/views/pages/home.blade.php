@extends('layouts.main')

@section('content')
<div class="homeBgContainer container-fluid">
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

@endsection

@push('scripts')
<script>
	
            $(function () {
                $(document).scroll(function () {
                        console.log("Mido");
                         $nav = $(".myNav");
                        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                });
        });


</script>
@endpush
