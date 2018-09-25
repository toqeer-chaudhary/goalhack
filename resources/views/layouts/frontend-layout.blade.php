<?php
      /*$commonAssetsFrontendCssPath      = "assets/frontend/css/"             ;
      $commonAssetsFrontendJsPath       = "assets/frontend/js/"              ;
      $commonAssetsFrontendFontsPath    = "assets/frontend/"                  ;
      $commonAssetsCommonImagesPath     = "assets/frontend/images/"    ;*/
?>
        <!DOCTYPE html>
<html lang="en">
   <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Title -->
   <title>@yield("title")</title>
   {{--includig all required files for css--}}
   @include('includes.frontend.style-files')
   {{--this yield is for a pages's special css file--}}
   @yield('styles')
</head>
<body>
   <!-- Preloader Area Start -->
   @include('includes.frontend.pre-loader')
   <!-- Preloader Area Start -->
   <!-- Header Area Start -->
   @include('includes.frontend.header')
   <!-- Header Area End -->
   <!-- Slider Area Start -->
   @yield("slider")
   <!-- Slider Area End -->
   <!-- Main Body Start-->
   @yield("container")
   <!-- Main Body End-->
   <!-- Footer Area Start -->
   @include('includes.frontend.footer')
   <!-- Footer Area End -->
   <!-- Script Files Area Start -->
   @include('includes.frontend.script-files')
   <!-- Script Files Area Start -->
   <!-- this yield is for a pages's special js file -->
   @yield("scripts")
</body>
</html>
