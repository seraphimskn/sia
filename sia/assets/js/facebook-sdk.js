  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1915539438668479',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.12'
    });
    
    FB.api(
    		'/Bandnewses',
    		{fields: 'feed'},
    		function (response){    			
    				console.log(response);    			
    		}
    );
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/pt_BR/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));