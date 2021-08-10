<div class="Footer-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer">
                    <ul>
                        
                        
                         @if(Session::get('locale')=='nl')
                                @foreach ($link_status as $link)
                                @if ( $link->link_status == 1)
                                     
                                        @if($link->slug == 'terms_conditions')
                                        @if(trans('home.terms&conditions')!="home.terms&conditions")
                                         <li>
                                        <a href="{{ trans('home.terms_link') }}">
                                         @lang('home.terms&conditions') </a>
                                          </li>
                                          @endif
                                        @endif
                                        @if($link->slug == 'contact')
                                        @if(trans('home.contact')!="home.contact")
                                        <li>
                                        <a href="{{ trans('home.contact_link') }}">  @lang('home.contact') </a>
                                        </li>
                                        @endif
                                        @endif
                                        @if($link->slug == 'frequent_questions')
                                        @if(trans('home.frequent_questions')!="home.frequent_questions")
                                        <li>
                                        <a href="{{ trans('home.frequent_link') }}">
                                        
                                    @lang('home.frequent_questions') </a>
                                    </li>
                                        @endif
                                        @endif
                                        @if($link->slug == 'powered_by')
                                        @if(trans('home.powered_by')!="home.powered_by")
                                        <li>
                                        <a href="{{ trans('home.powered_by_link') }}"> @lang('home.powered_by') </a>
                                         </li>
                                         @endif
                                        @endif
                                    
                                @else

                                      @if($link->slug == 'terms_conditions')
                                        @if(trans('home.terms&conditions')!="home.terms&conditions")
                                         <li>
                                        <a href="{{ trans('home.terms_link') }}">
                                         @lang('home.terms&conditions') </a>
                                          </li>
                                          @endif
                                        @endif
                                        @if($link->slug == 'contact')
                                        @if(trans('home.contact')!="home.contact")
                                        <li>
                                        <a href="{{ trans('home.contact_link') }}">  @lang('home.contact') </a>
                                        </li>
                                        @endif
                                        @endif
                                        @if($link->slug == 'frequent_questions')
                                        @if(trans('home.frequent_questions')!="home.frequent_questions")
                                        <li>
                                        <a href="{{ trans('home.frequent_link') }}">
                                        
                                    @lang('home.frequent_questions') </a>
                                    </li>
                                        @endif
                                        @endif
                                        @if($link->slug == 'powered_by')
                                        @if(trans('home.powered_by')!="home.powered_by")
                                        <li>
                                        <a href="{{ trans('home.powered_by_link') }}"> @lang('home.powered_by') </a>
                                         </li>
                                         @endif
                                        @endif
                                @endif
                                @endforeach
                       
                        @else
                                @foreach ($link_status as $link)
                                @if ( $link->link_status == 1)
                                        @if($link->slug == 'terms_conditions')
                                        @if(trans('home.terms&conditions')!="home.terms&conditions")
                                         <li>
                                        <a href="{{ trans('home.terms_link') }}">
                                         @lang('home.terms&conditions') </a>
                                          </li>
                                          @endif
                                        @endif
                                        @if($link->slug == 'contact')
                                        @if(trans('home.contact')!="home.contact")
                                        <li>
                                        <a href="{{ trans('home.contact_link') }}">  @lang('home.contact') </a>
                                        </li>
                                        @endif
                                        @endif
                                        @if($link->slug == 'frequent_questions')
                                        @if(trans('home.frequent_questions')!="home.frequent_questions")
                                        <li>
                                        <a href="{{ trans('home.frequent_link') }}">
                                        
                                    @lang('home.frequent_questions') </a>
                                    </li>
                                        @endif
                                        @endif
                                        @if($link->slug == 'powered_by')
                                        @if(trans('home.powered_by')!="home.powered_by")
                                        <li>
                                        <a href="{{ trans('home.powered_by_link') }}"> @lang('home.powered_by') </a>
                                         </li>
                                         @endif
                                        @endif
                                @else
                                        @if($link->slug == 'terms_conditions')
                                        @if(trans('home.terms&conditions')!="home.terms&conditions")
                                         <li>
                                        <a href="{{ trans('home.terms_link') }}">
                                         @lang('home.terms&conditions') </a>
                                          </li>
                                          @endif
                                        @endif
                                        @if($link->slug == 'contact')
                                        @if(trans('home.contact')!="home.contact")
                                        <li>
                                        <a href="{{ trans('home.contact_link') }}">  @lang('home.contact') </a>
                                        </li>
                                        @endif
                                        @endif
                                        @if($link->slug == 'frequent_questions')
                                        @if(trans('home.frequent_questions')!="home.frequent_questions")
                                        <li>
                                        <a href="{{ trans('home.frequent_link') }}">
                                        
                                    @lang('home.frequent_questions') </a>
                                    </li>
                                        @endif
                                        @endif
                                        @if($link->slug == 'powered_by')
                                        @if(trans('home.powered_by')!="home.powered_by")
                                        <li>
                                        <a href="{{ trans('home.powered_by_link') }}"> @lang('home.powered_by') </a>
                                         </li>
                                         @endif
                                        @endif
                                @endif
                                @endforeach

                        @endif
                    </ul>
                    <P>@lang('home.Copyright') {{date('Y')}}</P>
                </div>
            </div>
        </div>
    </div>
</div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://kit.fontawesome.com/5371eb2245.js"></script>
     


