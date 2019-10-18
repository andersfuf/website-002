// Init navigation menu
jQuery(function(){
    // main navigation init
    jQuery('ul.sf-menu').superfish({
        delay:       1000,      // one second delay on mouseout
        animation:   {opacity:'show',height:'show'}, // fade-in and slide-down animation
        speed:       'normal',  // faster animation speed
        autoArrows:  false,   // generation of arrow mark-up (for submenu)
        dropShadows: false
    });

    jQuery('.sf-menu > li > a').append('<em></em>');

});
 jQuery(function(){
  var ismobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i)
  if(ismobile){
   jQuery('.sf-menu').sftouchscreen({});
 }
});

// Init for si.files
SI.Files.stylizeAll();

//Zoom fix
jQuery(function(){
    // IPad/IPhone
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
    ua = navigator.userAgent,

    gestureStart = function () {
        viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
    },

    scaleFix = function () {
      if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
        viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
        document.addEventListener("gesturestart", gestureStart, false);
      }
    };
    scaleFix();
})