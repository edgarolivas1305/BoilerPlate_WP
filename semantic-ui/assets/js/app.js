/*===================================
=            Global Vars            =
===================================*/
var $ = jQuery;
var pathname;
var full_url;


/*====================================================
=            Inits or Functions Excecutes            =
====================================================*/
$(document).ready(function(){
    /*-------- Semantic Init --------*/
  
    /*----------  Pathname and Full Url  ----------*/
    pathname = window.location.pathname; // Returns path only
    full_url = window.location.href;     // Returns full URL
  
});

/*----------  Manual Redirection  ----------*/
$('[redireccion]').on('click',function(){
    location.href = $(this)[0].getAttribute('redireccion');
});