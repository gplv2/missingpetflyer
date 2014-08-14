@section('styles')
<link rel="stylesheet" href="{{url('css/jquery.Jcrop.min.css')}}" type="text/css" />
<!-- <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" /> -->
<link rel="stylesheet" href="{{url('js/jquery-ui/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{url('js/OpenLayers/theme/default/style.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('css/geostyle.css')}}" type="text/css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.6/slick.css"/>


<style type="text/css">
html, body {
    background:#FFF url(img/subtle_white_feathers.jpg);  
}

#files img{
   width: auto;
   max-width: none;
}

/* Apply these styles only when #preview-pane has
   been placed within the Jcrop widget */
.jcrop-holder #preview-pane {
  display: block;
  z-index: 2000;
  padding: 6px;
  border: 1px rgba(0,0,0,.4) solid;
  background-color: white;

  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;

  -webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
}

#imageContainer {
	margin: 30px 0 0;
  width: 320px;
}

#imageContainer.affix {
  top: 40px;
}
#imageContainer.affix-bottom {
  position: absolute;
  top: auto;
  bottom: 100;
}

/* The Javascript code will set the aspect ratio of the crop
   area based on the size of the thumbnail preview,
   specified here */
#preview-pane .preview-container {
  width: 250px;
  height: 170px;
  overflow: hidden;
}

.fileinput-button {
  position: relative;
  overflow: hidden;
}
.fileinput-button input {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  opacity: 0;
  filter: alpha(opacity=0);
  transform: translate(-300px, 0) scale(4);
  font-size: 23px;
  direction: ltr;
  cursor: pointer;
}
.fileupload-buttonbar .btn,
.fileupload-buttonbar .toggle {
  margin-bottom: 5px;
}
.progress-animated .bar {
  background: url(../img/progressbar.gif) !important;
  filter: none;
}
.fileupload-loading {
  float: right;
  width: 32px;
  height: 32px;
  background: url(../img/loading.gif) center no-repeat;
  background-size: contain;
  display: none;
}
.fileupload-processing .fileupload-loading {
  display: block;
}

@media (max-width: 767px) {
	.fileupload-buttonbar .toggle,
	.files .toggle,
	.files .btn span {
	display: none;
	}
	.files .name {
	width: 80px;
	word-wrap: break-word;
	}

	#imageContainer {
	  width: auto;
	  margin-bottom: 20px;
	}
	#imageContainer.affix {
	  position: static;
	  width: auto;
	  top: 0;
	}

}

/* Desktop
------------------------- */
@media (max-width: 980px) {
 
  #imageContainer  {
    top: 0;
    width: 218px;
    margin-top: 30px;
    margin-right: 0;
  }

}

@media (min-width: 768px) and (max-width: 979px) {

  /* Adjust sidenav width */
   #imageContainer {
    width: 166px;
    margin-top: 20px;
  }
   #imageContainer.affix {
    top: 0;
  }
}

</style>
@stop

@section('scripts')
<script src="{{ url('js/OpenLayers/OpenLayers.js')}}"></script>
<script src="{{ url('js/geolocation.js')}}"></script>
<!-- <script src="{{ url('js/vendor/jquery.ui.widget.js')}}"></script>-->
<script src="{{ url('js/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{ url('js/vendor/jquery.iframe-transport.js')}}"></script>
<script src="{{ url('js/vendor/jquery.fileupload.js')}}"></script>
<script src="{{ url('js/vendor/jquery.fileupload-process.js')}}"></script>
<script src="{{ url('js/vendor/jquery.fileupload-validate.js')}}"></script>
<script src="{{ url('js/vendor/jquery.Jcrop.min.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.6/slick.min.js"/></script>

<script type="text/javascript">
    $('#lostpetform').submit(function() {
    	ImageSpinner.spin(document.getElementById('previewSpinner'));
        $.post("{{url('form')}}", $("#lostpetform").serialize()).done(function(data) { 
		$('#previewContainer').attr('src',data.image); $('#downloadBtn').fadeIn(400);
 	}).fail(function() { alert("error"); }).always(function() { 
		ImageSpinner.stop();
	});
      	return false;
    });
</script>
@stop

@section('content')
	<div class="row" style="margin-top:30px;">
		<div class="span8 offset2">
			<h1 class="text-center">{{ trans('texts.maptitle') }}</h1>
			<div class="well text-center">
				<p class="lead">{{ trans('texts.mapdescription') }}</p>
				<p >{{ trans('texts.mapinstructions') }}</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span6">
			<div class="well text-center"  id="previewSpinner">
				  <fieldset>
				    <legend>{{ trans('texts.lostmap') }}</legend>
				    <h3>{{ trans('texts.lostmaptitle') }}</h3>
				    <p><div id="map" class="map"></div></p>
                <p><button id="locate">{{ trans('texts.locateme') }}</button></p>
					 <p><input type="checkbox" name="track" id="track"><label for="track">{{ trans('texts.trackme') }}</label></p>
						
					<input type="hidden" id="idtaglat" name="idtaglat" />
					<input type="hidden" id="idtaglon" name="idtaglon" />
					<br>
			</div>
		</div>
		<div class="span6">
			<div class="well">
				<p class="lead"><i class="icon-attention"></i> {{ trans('texts.mapmenu') }}:</p>
				<ul>
					<li>{{ trans('texts.linkmap1') }}</li>
					<li>{{ trans('texts.linkmap2') }}</li>
				</ul>
			</div>
		</div>
{{--
		<div class="span6">
			<div class="well">
				<div class="slider autoplay">
			           <div><div class="image"><img data-lazy="uploads/nPVUw7Ad/poster.jpg"/></div></div>
			           <div><div class="image"><img data-lazy="uploads/RdOYY5i8/poster.jpg"/></div></div>
			           <div><div class="image"><img data-lazy="uploads/Mh21Vmjd/poster.jpg"/></div></div>
			           <div><div class="image"><img data-lazy="uploads/vH77QgNa/poster.jpg"/></div></div>
			           <div><div class="image"><img data-lazy="uploads/xGhWDXxO/poster.jpg"/></div></div>
			           <div><div class="image"><img data-lazy="uploads/tkcE7ACm/poster.jpg"/></div></div>
			           <div><div class="image"><img data-lazy="uploads/YMH97lWO/poster.jpg"/></div></div>
				</div>
			</div>
		</div
--}}
</div>
	
@stop
