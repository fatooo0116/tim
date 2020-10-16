(function($) {
    "use strict";

    var dir = assert_path;
    var map;
    var windowHeight;
    var windowWidth;
    var contentHeight;
    var contentWidth;
    var isDevice = true;

    // calculations for elements that changes size on window resize
    var windowResizeHandler = function() {
        windowHeight = window.innerHeight;
        windowWidth = $(window).width();
        contentHeight = windowHeight - $("#header").height();
        contentWidth = $("#content").width();
        $("#leftSide").height(contentHeight);
        $(".closeLeftSide").height(contentHeight);
        $("#wrapper").height(contentHeight);
        // $(".mapView").height(contentHeight);
        $("#content").height(contentHeight);
        setTimeout(function() {
            $(".commentsFormWrapper").width(contentWidth);
        }, 300);

        if (map) {
            google.maps.event.trigger(map, "resize");
        }
    }

    windowResizeHandler();




    var markerImg = "marker-green.png";
    var markerImg2 = "marker-green2.png";


    // Custom options for map
    var options = {
        zoom : 10,
        mapTypeId : "Styled",
        disableDefaultUI: true,
        scrollwheel: false,
        mapTypeControlOptions : {
            mapTypeIds : [ "Styled" ]
        }
    };

    var styles = [{
        stylers : [ {
            hue : "#cccccc"
        }, {
            saturation : -100
        }]
    }, {
        featureType : "road",
        elementType : "geometry",
        stylers : [ {
            lightness : 100
        }, {
            visibility : "simplified"
        }]
    }, {
        featureType : "road",
        elementType : "labels",
        stylers : [ {
            visibility : "on"
        }]
    }, {
        featureType: "poi",
        stylers: [ {
            visibility: "off"
        }]
    }];

    var newMarker = null;
    var markers = [];






    // json for properties markers on map

    var xmap = $(".mapView");
    if(xmap.length>0){
        var lat = xmap.attr("la");
        var lng = xmap.attr("lo");
    }

    var props = [ {
        title : "",
        // image : "6-1-thmb.png",
        type : "DoDo House",
        position : {
            lat : lat,
            lng : lng
        },
        markerIcon : markerImg2
    }];

    // custom infowindow object
    /*
    var infobox = new InfoBox({
        disableAutoPan: false,
        maxWidth: 202,
        pixelOffset: new google.maps.Size(-101, -185),
        zIndex: null,
        boxStyle: {
            //  background: "url("+dir+"/images/infobox-bg.png) 0 -100px no-repeat",
            opacity: 1,
            width: "202px",
            height: "145px"
        },
        closeBoxMargin: "28px 26px 0px 0px",
        closeBoxURL: "",
        infoBoxClearance: new google.maps.Size(1, 1),
        pane: "floatPane",
        enableEventPropagation: false
    });
    */

    // function that adds the markers on map
    var addMarkers = function(props, map) {
        $.each(props, function(i,prop) {
            var latlng = new google.maps.LatLng(prop.position.lat,prop.position.lng);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: new google.maps.MarkerImage(
                    dir+"/wdr_include/marker-green.png",
                    null,
                    null,
                    null,
                    new google.maps.Size(8, 8)
                ),
                draggable: false,
                animation: google.maps.Animation.DROP,
            });
            var infoboxContent = "<div class=\"infoW\">" +
                "<div class=\"propImg\">" +
                "<img src="+dir+"/images/prop/" + prop.image + ">" +
                "<div class=\"propBg\">" +
                "<div class=\"propType\">" + prop.type + "</div>" +
                "</div>" +
                "</div>";





            // infobox.setContent(infoboxContent);
          /*  infobox.open(map, marker); */

            /*
            google.maps.event.addListener(marker, "click", (function(marker, i) {
                return function() {
                    infobox.setContent(infoboxContent);
                    infobox.open(map, marker);
                }
            })(marker, i));
            */


            /*
            $(document).on("click", ".closeInfo", function() {
                infobox.open(null,null);
            });

            markers.push(marker);
            */


        });
    }



    var repositionTooltip = function(e, ui) {
        var div = $(ui.handle).data("bs.tooltip").$tip[0];
        var pos = $.extend({}, $(ui.handle).offset(), {
            width: $(ui.handle).get(0).offsetWidth,
            height: $(ui.handle).get(0).offsetHeight
        });
        var actualWidth = div.offsetWidth;

        var tp = {left: pos.left + pos.width / 2 - actualWidth / 2}
        $(div).offset(tp);

        $(div).find(".tooltip-inner").text( ui.value );
    }


    $(window).resize(function() {
        windowResizeHandler();
    });

    setTimeout(function() {
        $("body").removeClass("notransition");



        $(".mapView").each(function(){



            var xmap = $(this);
            if(xmap.length>0){
                var lat = xmap.attr("la");
                var lng = xmap.attr("lo");
            }

            var props = [ {
                title : "",
                // image : "6-1-thmb.png",
                type : "DoDo House",
                position : {
                    lat : lat,
                    lng : lng
                },
                markerIcon : markerImg2
            }];



            map = new google.maps.Map(this,options);
            var styledMapType = new google.maps.StyledMapType(styles, {
                name : "Styled"
            });
            map.mapTypes.set("Styled", styledMapType);
            map.setCenter(
                new google.maps.LatLng(lat,lng)
            );
            map.setZoom(15);
            addMarkers(props, map);
        });






    }, 300);




    // functionality for autocomplete address field
    if ($("#mapView").length > 0) {



        var address = document.getElementById("address");
        var addressAuto = new google.maps.places.Autocomplete(address);

        google.maps.event.addListener(addressAuto, "place_changed", function() {
            var place = addressAuto.getPlace();

            if (!place.geometry) {
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
            }
            newMarker.setPosition(place.geometry.location);
            newMarker.setVisible(true);
            $("#latitude").text(newMarker.getPosition().lat());
            $("#longitude").text(newMarker.getPosition().lng());

            return false;
        });
    }
})(jQuery);