/*===================================
=            Global Vars            =
===================================*/
var $ = jQuery;
var pathname;
var full_url;
/*=====  End of Global Vars  ======*/

/*====================================================
=            Inits or Functions Excecutes            =
====================================================*/
$(document).ready(function(){
  /*-------- Foundation Init --------*/
  $(document).foundation();

  /*----------  Pathname and Full Url  ----------*/
  pathname = window.location.pathname; // Returns path only
  full_url = window.location.href;     // Returns full URL

  
  /*----------  Skroller Init  ----------*/
  skroller_init();
});


/*=====  End of Inits or Functions Excecutes  ======*/

/*========================================
=            Normal Functions            =
========================================*/

/*----------  Skroller  ----------*/
function skroller_init(){
  if (screen.width<500) {
    var s = skrollr.init().destroy();
  }else {
    var s = skrollr.init({forceHeight: false});
  }
}


/*----------  Loader Enter and Exit  ----------*/
// function enterLoader(){
//   $('#loader').css("top", "-"+100+"vh");
//   $('#loader').removeClass("exitload");    
//   $('#loader').addClass("enterload");    
// }
// function exitLoader(){
//   $('#loader').removeClass("enterload");        
//   $('#loader').addClass("exitload");
// }

/*----------  Block this URL  ----------*/
// function block_url(path,url_f){
//   var url_to_split = path.split("pleno");
//   url_to_split = url_to_split[1];
//   url_to_split = url_to_split.split('/');
//   var url_to_block = url_to_split[1];
//   // console.log(url_to_block);
//   if(url_to_block != ""){
//       $("#mobile-"+url_to_block).addClass("active_mobile");
//       $("#"+url_to_block).addClass("active");
//       $("#mobile-"+url_to_block).attr("disableLink","true");
//       $("#"+url_to_block).attr("disableLink","true");
//   }
// }

/*----------  Activate Masonry  ----------*/
// $('#grid2 img').each(function(){
//   var $this = $(this); 
//   $this.wrap('<div class="item"><a></a></div>');
//   $('a').removeAttr('href');  
// });
// $('#grid2').addClass('effect-2');

// $(window).load(function(){
// // initialize
// $('.grid').masonry({
//   //columnWidth: 200,
//   itemSelector: '.item'
// })
// $('.item > a').removeAttr('href')
// })
/*=====  End of Normal Functions  ======*/




/*===========================================
=            Atributte Functions            =
===========================================*/

// Funcionalidad Burguer menu
$('[open_menu]').on('click',function(){
    $(this).toggleClass('is-active');
  // if($("#menu_global").hasClass('is-active')){
  //   $("[open_menu]").removeClass('is-active');
  // }else{
  //   $("[open_menu]").addClass('is-active');
  // }
});












/*----------  Share Social  ----------*/
// $('[sharesocial]').on('click',function(e){
//   e.preventDefault();
//   var referencia = $(this)[0].getAttribute('sharesocial');
//   var link_share = $(this)[0].getAttribute('href');
//   var title = $(this)[0].getAttribute('title');
//   var link_share = encodeURIComponent(link_share);  
//   if(referencia == 'facebook'){
//     window.open('https://www.facebook.com/sharer/sharer.php?u='+link_share, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;
//   }
//   if(referencia == 'twitter'){
//     window.open('https://twitter.com/share?url='+link_share+'&via=Mar_De_Fondo&text='+title+'\n', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;
//   }
// });




/*----------  Manual Redirection  ----------*/
$('[redireccion]').on('click',function(){
  location.href = $(this)[0].getAttribute('redireccion');
});