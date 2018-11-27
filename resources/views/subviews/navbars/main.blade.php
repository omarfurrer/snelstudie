
<nav class="navbar navbar-expand-lg navbar-dark fixed-top myNav">
    <div class="container-fluid nbBrand">
        <a class="navbar-brand" href="{{ url('/') }}">
           <big> Translator </big>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
              
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link myNavItem" href="#">PRODUCTS <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link myNavItem" href="#">CITIES <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link myNavItem" href="#">ABOUT US <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link myNavItem" href="#">CONTACT US <span class="sr-only">(current)</span></a>
                </li> 
                @guest

                @else

                @endguest
            </ul>
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


</script>
@endpush