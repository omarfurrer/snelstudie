
<nav class="navbar navbar-expand-lg navbar-dark myNav">
  <div class="container">
    <div class="container-fluid nbBrand">
      <div class="row">
        <div class="col-md-3">
          <a class="navbar-brand" href="{{ url('/') }}">
           <img class="navbarLogo" src="../images/logo.png">
         </a>
       </div>
       <button class="navbar-toggler togBtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span><i class="fa fa-bars"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a class="nav-link myNavItem" href="#">Blog <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link myNavItem" href="#">Education <span class="sr-only">(current)</span></a>
          </li> 
          <li class="nav-item">
            <a class="nav-link myNavItem" href="#">Certified Writers <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link myNavItem" href="#">Services <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link myNavItem" href="#">About <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link myNavItem" href="#">My Account <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link myNavItem" href="#"><i class="fa fa-search"></i> <span class="sr-only">(current)</span></a>
          </li>
          @guest

          @else

          @endguest
        </ul>
      </div>
    </div>
  </div>
</nav>


@push('scripts')
<script>

  $(function () {
    $(document).scroll(function () {
     $nav = $(".myNav");
     $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
   });
  });

  $(document).ready(function(){
   $('.togBtn').click(function(){
     $nav = $(".myNav");
     $nav.toggleClass('clicked');
   });
 });



</script>
@endpush