@extends('BillDataPlugins::layout')

@section('cdn')
    <!-- popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" 
    integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- moment.js -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" 
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" 
    integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" 
    integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- TempusDominus 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus/6.2.10/css/tempus-dominus.min.css" 
    integrity="sha512-pWpMljGtRWINCDZids0D5gLdAxmyqLmoNFTx2PQl0ZTIq9oFQRc/xPmLgPLxLFJmn1aPxXm8r+g8z8O2TNci+A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempus-dominus/6.2.10/js/tempus-dominus.js" 
    integrity="sha512-M1nRraFe0fQ2MyPlesmjWHTJtaPgA81UH+QVOlw/kR7Hv+B8g6oTiT2Yh5Seb9YinuI2RsOHlZJ9+aLlRc6kgQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Perfect Scrollbar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js" 
    integrity="sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.css" 
    integrity="sha512-2xznCEl5y5T5huJ2hCmwhvVtIGVF1j/aNUEJwi/BzpWPKEzsZPGpwnP1JrIMmjPpQaVicWOYVu8QvAIg9hwv9w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" 
    integrity="sha512-nzSGtgaJWS79WO+bCKLhowPkjbM+WI18/K4T77XPB4QPMybSKLozMFzDNPEHcWxN1dOx1gvYGKP39nXLNNZ8qg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="{{  url('/billdataPlugins/js/search.js')  }}"></script>
    
@endsection

@section('content')

<strong>Database Connected: </strong>
<?php
    try {
        \DB::connection()->getPDO();
        echo \DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
        echo 'None';
    }
?>

    
@endsection