var fireLat     = "{{ $request['lat'] }}";

alert (fireLat);
function initMap(){
        //map option
        var options = {
            zoom : 6,
            center : {lat:9.081999,lng:8.675277 }
        }
        // new map
        var map = new google.maps.Map(document.getElementById('map'),options);
        // map marker
        var marker = new google.maps.Marker({
            position : {lat:7.377746,lng:3.897250 },
            map : map,
            icon : ''
        })
        // info window
        var infoWindow = new google.maps.InfoWindow({
            content : `<h3>Help needed here</h3>`
        });
        // add listener
        marker.addListener('click',function(){
            infoWindow.open(map,marker)
        });
        // adding marker
        // addMarker({
        //     coords :{lat:12.8259,lng: 80.21607 },
        //     iconImage : 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
        // });
          addMarker({coords :{lat:6.524379,lng: 3.379206 }});

        function addMarker(props){

    var marker = new google.maps.Marker({
            position : props.coords,
            map : map,
            icon : props.iconImage
        })
        // info window
        var infoWindow = new google.maps.InfoWindow({
            content : `<h3>Help needed here</h3>`
        });
        // add listener
        marker.addListener('click',function(){
            infoWindow.open(map,marker)
        });
        }

    }
    
    var width=678;
    var height=500;
    self.moveTo((screen.availwidth-width)/2,(screen.availheight-height)/2);
    self.resizeTo(width,height);
