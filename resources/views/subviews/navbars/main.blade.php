
<nav class="navbar navbar-expand-lg navbar-dark myNav">
  <div class="container">
    <div class="container-fluid nbBrand">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <a class="navbar-brand" href="{{ url('/') }}">
           <img class="navbarLogo" src="../images/logo.png">
         </a>
         <button class="navbar-toggler myNavTogBtn togBtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          Menu <span><i class="fa fa-bars"></i></span>
        </button>
      </div>

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
          <li class="nav-item noMob">
            <a class="nav-link myNavItem"  data-toggle="modal" data-target="#exampleModal1" href="#"><i class="fa fa-search"></i> <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item text-center searchMobLi">
            <form> 

              <span class="sr-only">(current)</span>

              <input type="search" id="searchMob" name="searchMob" placeholder="Search Copyblogger...">

              <input type="submit" id="searchMobCta" value="Search"> 

            </form>
          </li>
          @guest

          @else

          @endguest
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="container myModal">
    <div class="row">
      <div class="col-md-12 mt-2">
        <button type="button" class="pull-right closeCta" data-dismiss="modal"><i class="fa fa-close"></i>
        </button>
      </div>
      <div class="col-md-12">
        <h4>Type in your keyword and press enter to search Copyblogger.com:</h4>
      </div>

      <div class="col-md-12">
        <form>
          <button class="btn pull-right searchCta">Search</button>
          <input type="search" placeholder="Search Copyblogger" name="searchInput">
        </form>
      </div>

    </div>
  </div>
</div>


@push('scripts')
<script>

  $(function () {
    $(document).scroll(function () {
     $nav = $(".myNav");
     $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
   });
  });



  $(document).ready(function(){
   $('.closeCta').click(function(){
    $("#exampleModal1").hide();
  });
 });

</script>
@endpush