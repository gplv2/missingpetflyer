<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ trans('texts.title') }}</title>
        <title></title>
        <meta name="author" content="{{ trans('texts.author') }}">
        <meta name="description" content="{{ trans('texts.contentdescription') }}">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="{{ url('css/petflyer.css')}}">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ url('bootstrap/bootstrap-2.3.1.css?v=0.2')}}">
        <link rel="stylesheet" href="{{ url('bootstrap/bootstrap-responsive-2.3.1.min.css')}}">
        <link rel="stylesheet" href="{{ url('css/main.css')}}">
        @yield('styles')
        <!--[if lt IE 9]>
            <script src="{{ url('js/vendor/html5-3.6-respond-1.1.0.min.js')}}"></script>
        <![endif]-->
    </head>
    <body>
    	<div id="fb-root"></div>
    	<script>(function(d, s, id) {
    	  var js, fjs = d.getElementsByTagName(s)[0];
    	  if (d.getElementById(id)) return;
    	  js = d.createElement(s); js.id = id;
    	  // js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=259410807538564";
    	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=269710886550943";
    	  fjs.parentNode.insertBefore(js, fjs);
    	}(document, 'script', 'facebook-jssdk'));</script>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div id="wrap">

        <div class="container">
            @yield('content')
        </div> <!-- /container -->

        	<div id="push"></div>
        </div>
        <div id="footer">
        	<div class="container">
			    <div class="row">
			      <div class="span12">
			      	<div class="pull-right">

			      		<a href="https://twitter.com/share" class="twitter-share-button" data-url="{{ 'uploads/' . Session::get('hash') . '/poster.jpg' }}" data-text="Missing pet poster/flyer maker" data-via="findbackpets" data-count="none" data-hashtags="missingpet" data-dnt="true">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						<div class="fb-like" data-href="{{ 'uploads/' . Session::get('hash') . '/poster.jpg' }}" data-send="false" data-width="300" data-show-faces="false" data-font="arial"></div>
					</div>
			        <p>Forked from <a href="http://twitter.com/msurguy" target="_blank">@msurguy</a> by <a href="http://bitless.be" target="_blank">BitLess</a>.  <i class="icon-attention"></i> {{ trans('texts.privacynote') }}</p>
			      </div>
			    </div>
			</div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="{{ url('js/vendor/bootstrap.min.js')}}"></script>

        <script src="{{ url('js/main.js')}}"></script>
        @yield('scripts')
	<!-- Piwik -->
	<script type="text/javascript">
  		var _paq = _paq || [];
  		_paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  		_paq.push(["setDomains", ["*.www.animalperdu.eu","*.animalperdu.eu","*.huisdierkwijt.eu","*.petlost.eu","*.www.huisdierkwijt.eu","*.www.petlost.eu"]]);
  		_paq.push(["trackPageView"]);
  		_paq.push(["enableLinkTracking"]);
		
  		(function() {
    		var u=(("https:" == document.location.protocol) ? "https" : "http") + "://byte-consult.be/piwik/";
    		_paq.push(["setTrackerUrl", u+"piwik.php"]);
    		_paq.push(["setSiteId", "10"]);
    		var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    		g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  		})();
	</script>
<!-- End Piwik Code -->
    </body>
</html>
