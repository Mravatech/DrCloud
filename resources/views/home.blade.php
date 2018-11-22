@extends('layouts.app')

@section('content')
<style type="text/css">
    #map {
    margin: 0;
    padding: 0;
    height: 400px;
    max-width: none;
}
#map img {
    max-width: none !important;
}
.gm-style-iw {
    width: 350px !important;
    top: 15px !important;
    left: 0px !important;
    background-color: #fff !important;
    box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6) !important;
    border: 1px solid rgba(72, 181, 233, 0.6) !important;
    border-radius: 2px 2px 10px 10px !important;
}
#iw-container {
    margin-bottom: 10px;
}
#iw-container .iw-title {
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 22px;
    font-weight: 400 !important;
    padding: 10px;
    background-color: #48b5e9 !important;
    color: white !important;
    margin: 0 !important;
    border-radius: 2px 2px 0 0 !important;
}
#iw-container .iw-content {
    font-size: 13px !important;
    line-height: 18px !important;
    font-weight: 400 !important;
    margin-right: 1px !important;
    padding: 15px 5px 20px 15px !important;
    max-height: 140px !important;
    overflow-y: auto !important;
    overflow-x: hidden !important;
}
.iw-content img {
    float: right;
    margin: 0 5px 5px 10px; 
}
.iw-subTitle {
    font-size: 16px;
    font-weight: 700;
    padding: 5px 0;
}
.iw-bottom-gradient {
    position: absolute;
    width: 326px;
    height: 25px;
    bottom: 10px;
    right: 18px;
    background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%) !important;
    background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%) !important;
    background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%) !important;
    background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%) !important;
}
</style>
  <div class="wrapper">
      <div class="container-fluid">

          <div class="row">
              <div class="col-lg-3">
                  <div class="card m-b-30">
                      <div class="card-body">

                        <!-- Messages-->
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">{{ count($doctors) }}</span>Active Doctor</h5>
                                </div>

                                @foreach($doctors as $doctor)

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon"><img src="assets/images/users/avatar-2.jpg" alt="user-img" class="img-fluid rounded-circle" /> Dr. {{ $doctor['surname'] }} {{ $doctor['first_name'] }}</div>
                                </a>
                                @endforeach


                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    View All
                                </a>


                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">{{ count($patients) }}</span>Active Patient</h5>
                                </div>

                                @foreach($patients as $patient)
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon"><img src="assets/images/users/avatar-3.jpg" alt="user-img" class="img-fluid rounded-circle" /> {{ $patient['surname'] }} {{ $patient['first_name'] }}</div>
                                </a>
                                @endforeach

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    View All
                                </a>


                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">{{ count($hospitals) }}</span>Active Hospitals</h5>
                                </div>
                                @foreach($hospitals as $hospital)
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon"><img src="assets/images/users/avatar-4.jpg" alt="user-img" class="img-fluid rounded-circle" /> {{ $hospital['name'] }}</div>
                                </a>
                                @endforeach
                                
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    View All
                                </a>



                      </div>
                  </div>
              </div> <!-- end col -->

              <div class="col-lg-6">
                  <div class="card m-b-30">
                      <div class="card-body">

                          <div style="float: right;">
                              <div id="map" style="width:606px; height:600px;"></div>
                          </div>

                      </div>
                  </div>
              </div> <!-- end col -->

              <div class="col-lg-3">
                  <div class="card m-b-30">
                      <div class="card-body" style="margin-left: -34px;">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Incoming Calls (3)</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b></br><small class="text-muted">Dummy text of the printing an industry.</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-warning"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details"><b>New Message received</b></br><small class="text-muted">You have 87 unread messages</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-info"><i class="mdi mdi-martini"></i></div>
                                <p class="notify-details"><b>Your item is shipped</b></br><small class="text-muted">It is a long established fact that a reader will</small></p>
                            </a>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                View All
                            </a>

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Emergency Request (3)</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b></br><small class="text-muted">Dummy text of the printing an industry.</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-warning"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details"><b>New Message received</b></br><small class="text-muted">You have 87 unread messages</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-info"><i class="mdi mdi-martini"></i></div>
                                <p class="notify-details"><b>Your item is shipped</b></br><small class="text-muted">It is a long established fact that a reader will</small></p>
                            </a>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                View All
                            </a>


                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Incoming Calls (3)</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Your order is placed</b></br><small class="text-muted">Dummy text of the printing an industry.</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-warning"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details"><b>New Message received</b></br><small class="text-muted">You have 87 unread messages</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item" style="height: 112px !important;">
                                <div class="notify-icon-right bg-info"><i class="mdi mdi-martini"></i></div>
                                <p class="notify-details"><b>Your item is shipped</b></br><small class="text-muted">It is a long established fact that a reader will</small></p>
                            </a>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                View All
                            </a>

                      </div>
                  </div>
              </div> <!-- end col -->
          </div> <!-- end row -->


      </div> <!-- end container -->
  </div>
  <!-- end wrapper -->
  <script type="text/javascript">

    function initMap(){
        var options = {
            zoom : 6,
            center : {lat:9.081999,lng:8.675277 }
        }

        var map = new google.maps.Map(document.getElementById('map'),options);
            @foreach($requests as $request)
            var content = '<div id="iw-container" style="font-size: 22px;font-weight: 400 !important;padding: 10px;background-color: #48b5e9 !important;color: white !important;margin: 0 !important;border-radius: 2px 2px 0 0 !important;">' +
                    '<div class="iw-title"><h4>{{ $request['name'] }} needs help<h4></div>' +
                    '<div class="iw-content" style="font-size: 13px !important;line-height: 18px !important;font-weight: 400 !important;margin-right: 1px !important;padding: 15px 5px 20px 15px !important;max-height: 140px !important;overflow-y: auto !important;overflow-x: hidden !important">' +
                      '<div class="iw-subTitle"><h5>location: {{ $request['location']}} </h5></div>' +
                      '<div class="iw-subTitle">Contacts</div>' +
                      '<p>VISTA ALEGRE ATLANTIS, SA<br>3830-292 Ílhavo - Portugal<br>'+
                    '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';
                var fireLat         = {{ $request['lat'] }};
                var fireLong        = {{ $request['long'] }};
                addMarker{{$request['request_id']}}({coords :{lat:fireLat,lng: fireLong }});
                function addMarker{{$request['request_id']}}(props){

                var marker = new google.maps.Marker({
                        position : props.coords,
                        map : map,
                        icon : props.iconImage
                    })
                var infoWindow = new google.maps.InfoWindow({
                        content : content
                    });
                marker.addListener('click',function(){
                        infoWindow.open(map,marker)
                    });
                }
            @endforeach


        
    }
    </script>


<script type="text/javascript">

    
    // var width=678;
    // var height=500;
    // self.moveTo((screen.availwidth-width)/2,(screen.availheight-height)/2);
    // self.resizeTo(width,height);
</script>
@endsection
