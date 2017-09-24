/* */
define([
        "jquery",
        "googlemapsapi"
], function($){
    
    $.widget('mage.storeFinder', {
        options: {
            places : [],
            navigationSelector: "#adm-shop-navigation",
            mapSelector: "#adm-shop-map",
            localizeSelector: ".storefinder-shop-item .links a.localize",
            localizeAttr: "data-code",
            placeContentHtmlWrapper: '<div class="map-infowindow">{:content}</div>',
            placeContentHtmlSelector: '#adm-shop-{:code}', //Use jquery regax selector to get html place from navigation to inject in infowindow markers 
            placeContentJsonKey: false, //Use Key from json places to inject in infowindow markers 
            placeKey: "code",
            autoZoomOnSelect: 15, //Set a zoom on select
            markerImage: false,  //Set an image as a json {url:"http://... myimage.png", width:52, height: 60}
            mapOptions: {
                    zoom: 5,
                    minZoom: 4, // Minimum zoom level allowed (0-20)
                    maxZoom: 17, // Maximum soom level allowed (0-20)                    
                    mapTypeId: google.maps.MapTypeId.ROADMAP, // Set the type of Map
                    scrollwheel: true, // Disable Mouse Scroll zooming (Essential for responsive sites!)
                    // All of the below are set to true by default, so simply remove if set to true:
                    panControl:false, // Set to false to disable
                    mapTypeControl:false, // Disable Map/Satellite switch
                    scaleControl:false, // Set to false to hide scale
                    streetViewControl:false, // Set to disable to hide street view
                    overviewMapControl:false, // Set to false to remove overview control
                    rotateControl:false // Set to false to disable rotate control                    
            }
            
        },

        _create: function() {
            this.markerRegistry = {};
            var mapElem = $(this.options.mapSelector);
            if (mapElem) {
                this.gmap = new google.maps.Map(mapElem[0], this.options.mapOptions);
                
                places = this._getPlaces();
                this._setPlaceList(places);
                
                $(this.options.localizeSelector).on('click', $.proxy(this._openPlace, this));
                
                //google.maps.event.addDomListener(window, 'resize', function() { map.setCenter(myLatlng); }); // Keeps the Pin Central when resizing the browser on responsive sites
            }
        },
        
        
        _setPlaceList: function(places) {
            
            // Loop through our array of markers & place each one on the map  
            for( var i = 0; i < places.length; i++ ) {
                this._setPlace(places[i]);
            }
            
            this._autoCenter();
            
        },
        
        // Center the map fitting all markers on the screen
        _autoCenter: function() {
            var bounds = new google.maps.LatLngBounds();
            $.each(this.markerRegistry, function(key, marker){
                bounds.extend(marker.getPosition());
            });
            this.gmap.fitBounds(bounds);
        },
        
        _setPlace: function(place, fitbound) {
            
            var title = (place.title) ? place.title : place[this.options.placeKey];
            var position = new google.maps.LatLng(place.latitude,place.longitude);
            markerOptions = {
                    position: position,
                    map: this.gmap,
                    title: title
            };
            if(this.options.markerImage) {
                //markerOptions.image = new google.maps.MarkerImage(this.options.markerImage.url, null, null, null, new google.maps.Size(this.options.markerImage.width, this.options.markerImage.height)); // Create a variable for our marker image.
            }
            
            var marker = new google.maps.Marker(markerOptions);
            
            // Allow each marker to have an info window    
            marker.infoWindow = new google.maps.InfoWindow({content:this._getPlaceInfo(place)});
            google.maps.event.addListener(marker, 'click', (function(marker, map) {
                return function() {
                    marker.infoWindow.open(map, marker);
                }
            })(marker, this.gmap));
            this.markerRegistry[place[this.options.placeKey]] = marker;
        },
        
        _getPlaceInfo: function(place) {    
            var content = (place[this.options.placeKey]) ? place[this.options.placeKey] : '';
            if(this.options.placeContentHtmlSelector) {
                var contentRegex    = new RegExp('\{:(\.*)\}');
                var contentSelector = this.options.placeContentHtmlSelector
                var contentMatch = contentSelector.match(contentRegex);
                if(contentMatch) {
                    placeElemId = contentSelector.replace(contentMatch[0], ((place[contentMatch[1]]) ? place[contentMatch[1]] : ''))
                    if($(placeElemId) && $(placeElemId).length>0) {
                        content = $(placeElemId).html();
                    }
                }
            } else if(this.options.placeContentJsonKey && place[this.options.placeContentJsonKey]) {
                content = place[this.options.placeContentJsonKey];
            }
            
            if(this.options.placeContentHtmlWrapper) {
                content = this.options.placeContentHtmlWrapper.replace('{:content}', content);
            }
            
            return content;
        },
        
        _openPlace: function(e) {    
            var currentKey = $(e.target).attr(this.options.localizeAttr);
            if(this.markerRegistry[currentKey]) {
                $.each(this.markerRegistry, $.proxy(function(key, marker){
                    if (key==currentKey) {
                        this.gmap.panTo( marker.getPosition() );
                        if(this.options.autoZoomOnSelect) {
                            this.gmap.setZoom( this.options.autoZoomOnSelect );
                        }
                        google.maps.event.trigger(marker, 'click');
                    } else {
                        marker.infoWindow.close();
                    }
                }, this));
            }
        },
        
        _getPlaces: function() {
            return this.options.places;
        }
    });
});