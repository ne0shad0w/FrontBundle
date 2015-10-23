     $(document).ready(function(){
		 
		 
       jQuery('#camera_wrap').camera({
            loader: false,
            pagination: false ,
            minHeight: '250',
            thumbnails: false,
            height: '37.55208333333333%',
            caption: true,
            navigation: true,
            fx: 'mosaic'
          });
         /*Back to Top*/
        $().UItoTop({ easingType: 'easeOutQuart' });
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.async=true; js.src = "//connect.facebook.net/fr_CA/sdk.js#xfbml=1&appId=1511212909092088&version=v2.3";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.async=true; js.src = "bundles/front/js/sofeu.js";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'sopfeu-jssdk'));

     }); 
// JavaScript Document
