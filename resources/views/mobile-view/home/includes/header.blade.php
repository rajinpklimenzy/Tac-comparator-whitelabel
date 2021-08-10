
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('css/style.css')}}">
  <link rel="stylesheet" href="{{url('css/responsive.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--<script src="accordion.js"></script>-->
  <link rel="stylesheet" type="text/css" href="{{url('css/teriefchecker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('css/tcrequest.css')}}">

<div class="header-sec mobile-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12 submenus">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="row">
                            <div class="col-md-6 col-9 logo-com">
                                 @if(Session::get('locale')=='nl')
                <a href="/"><img src="{{url('images/tariefchecker goedkoopste energieleveranciers vergelijken 400x200 - retina.png')}}" alt="tariefchecker"></a>
                @else
                 <a href="/"><img src="{{url('images/veriftarif.png')}}" alt="tariefchecker"></a>
                @endif 
                </div>
                            <div class="col-md-6 col-3 text-right responsive-menu">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                              <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                    @if(Session::get('locale')=='nl')
                            <a class="nav-link" href="https://www.tariefchecker.be/faq/geen-verbrekingsvergoedingen-meer-voor-particulieren-en-kmo-s" target="_blank">FAQs</a>
                        @else
                            <a class="nav-link" href="https://www.veriftarif.be/faq-foire-aux-questions/les-particuliers-et-petits-consommateurs-professionnels-ne-paieront-plus-de-frais-de-resiliation-de-leurs-contrats-d-energie" target="_blank"> FAQs</a>
                        @endif
                              </li>
                              <li class="nav-item">
                            @if(Session::get('locale')=='nl')
                            <a class="nav-link" href="https://www.tariefchecker.be/contact" target="_blank"> @lang('home.Email')</a>
                        @else
                            <a class="nav-link" href="https://www.veriftarif.be/contact" target="_blank"> @lang('home.Email')</a>
                        @endif
                              </li>
                            </ul>
                          </div>
                        </div>
                          
                          
                          
                    </nav>
                </div>
            </div>
        </div>
    </div>