<!DOCTYPE html>
<html lang="es">
  <head>
    <title> @yield('title')</title>
    @include('theme.frontoffice.layouts.includes.head')
    {{-- @yield('head') --}}
  </head>

  <body>
      @include('theme.frontoffice.layouts.includes.nav')

      {{-- @include('theme.frontoffice.layouts.includes.loader') --}}

     <div id="main">
        <div class="wrapper">
            
            <section id="content">
                {{-- @include('theme.backoffice.layouts.includes.breadcumbs') --}}
                <div class="container">
                  @yield('content')
                </div>
            </section>
        </div>
    </div> 
       
     @include('theme.frontoffice.layouts.includes.footer') 
     @include('theme.frontoffice.layouts.includes.foot') 
     @include('sweetalert::alert')

     @yield('foot')
  </body>
</html>
