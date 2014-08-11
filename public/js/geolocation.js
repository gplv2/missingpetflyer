var style = {
    fillColor: '#000',
    fillOpacity: 0.1,
    strokeWidth: 0
};

var map = new OpenLayers.Map('map');
var layer = new OpenLayers.Layer.OSM( "Lost Pet map");
var vector = new OpenLayers.Layer.Vector('vector');
// map.addControl(new OpenLayers.Control.MousePosition());
map.addLayers([layer, vector]);

controls = {
       drag: new OpenLayers.Control.DragFeature(vector, {
                onComplete: function(feature, pixel){
                    var bounds = feature.geometry.getBounds();
                    var latlon = bounds.transform( map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326"));
                    $('#idtaglat').val(latlon.bottom);
                    $('#idtaglon').val(latlon.left);
                }
        })
};

for(var key in controls) {
    map.addControl(controls[key]);
}

for(key in controls) {
    var control = controls[key];
    control.activate();
}

map.setCenter(
    new OpenLayers.LonLat(0, 32.472).transform(
        new OpenLayers.Projection("EPSG:4326"),
        map.getProjectionObject()
    ), 12
);

var geolocate = new OpenLayers.Control.Geolocate({
    bind: false,
    geolocationOptions: {
        enableHighAccuracy: false,
        maximumAge: 0,
        timeout: 7000
    }
});
map.addControl(geolocate);
var firstGeolocation = true;
geolocate.events.register("locationupdated",geolocate,function(e) {
    vector.removeAllFeatures();
/*
    var circle = new OpenLayers.Feature.Vector(
        OpenLayers.Geometry.Polygon.createRegularPolygon(
            new OpenLayers.Geometry.Point(e.point.x, e.point.y),
            e.position.coords.accuracy/2,
            40,
            0
        ),
        {},
        style
    );
*/
    var feature = new OpenLayers.Feature.Vector(
            e.point,
            {},
            {
                graphicName: 'cross',
                strokeColor: '#f00',
                strokeWidth: 2,
                fillOpacity: 0,
                pointRadius: 10
            }
    );

    vector.addFeatures([ feature ]);

    if (firstGeolocation) {
        map.zoomToExtent(vector.getDataExtent());
        firstGeolocation = false;
        this.bind = true;
    }
    var bounds = feature.geometry.getBounds();
    var latlon = bounds.transform( map.getProjectionObject(), new OpenLayers.Projection("EPSG:4326"));
    // console.log(latlon);
    $('#idtaglat').val(latlon.bottom);
    $('#idtaglon').val(latlon.left);
});
geolocate.events.register("locationfailed",this,function() {
    // OpenLayers.Console.log('Location detection failed');
    // console.log(this);
});
/*
   $("#clearmap").click( function() {
        $('body').css('cursor', 'wait');
        vector.removeAllFeatures();
        vector.destroyFeatures();
        $('body').css('cursor', 'default');
        return true;
   });
*/
document.getElementById('locate').onclick = function() {
    vector.removeAllFeatures();
    geolocate.deactivate();
    document.getElementById('track').checked = false;
    geolocate.watch = false;
    firstGeolocation = true;
    geolocate.activate();
};
document.getElementById('track').onclick = function() {
    vector.removeAllFeatures();
    geolocate.deactivate();
    if (this.checked) {
        geolocate.watch = true;
        firstGeolocation = true;
        geolocate.activate();
    }
};

document.getElementById('track').checked = false;
