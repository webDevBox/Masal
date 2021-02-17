@extends('layout.web')
@section('content')
   <center><h1 style="margin-bottom: -80px">Direction</h1></center>
    <div id="floating-panel" style="display: none;">
    <b>Start: </b>
    <select id="start">
      <option value="" id="id1"  selected>current location</option>
                  <!-- <option value="st louis, mo">St Louis</option>
                  <option value="joplin, mo">Joplin, MO</option>
                  <option value="oklahoma city, ok">Oklahoma City</option>
                  <option value="amarillo, tx">Amarillo</option>
                  <option value="gallup, nm">Gallup, NM</option>
                  <option value="flagstaff, az">Flagstaff, AZ</option>
                  <option value="winona, az">Winona</option>
                  <option value="kingman, az">Kingman</option>
                  <option value="barstow, ca">Barstow</option>
                  <option value="san bernardino, ca">San Bernardino</option>
                  <option value="los angeles, ca">Los Angeles</option> -->
    </select>
    <b>End: </b>.
    <select id="end">
      <!-- <option value="chicago">Chicago</option>
      <option value="st louis, mo" >St Louis</option> -->
      <option value="{{ $status }}" selected>Joplin, MO</option>
      <!-- <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option> -->
    </select>
    </div>
    
    <div id="map"></div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUx-lN2Wy6w2C0f2o14A3GgY--AqGiXPc&callback=initMap">
</script>
    {{-- <script type="text/javascript">
   
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function (p) {
   
              var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
              var geocoder = new google.maps.Geocoder();
                    
   

              addresses1 = geocoder.getFromLocation(p.coords.latitude, p.coords.longitude, 1);
              alert(addresses1);

                  geocoder.geocode({ 'latLng': LatLng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        documnets.getElementById("id1").value = results[1].formatted_address;
                        alert("Location: " + results[1].formatted_address);
                    }
                }
            });

              
   
              var mapOptions = {
                  center: LatLng,
                  zoom: 13,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              };
              var map = new google.maps.Map(document.getElementById("map"), mapOptions);
              var marker = new google.maps.Marker({
                  position: LatLng,
                  map: map,
                  title: "<div style = 'height:60px;width:200px'><b>Your location:</b><br />Latitude: " + p.coords.latitude + "<br />Longitude: " + p.coords.longitude
              });
              google.maps.event.addListener(marker, "click", function (e) {
                  var infoWindow = new google.maps.InfoWindow();
                  infoWindow.setContent(marker.title);
                  infoWindow.open(map, marker);
              });
          });
      } else {
          alert('Geo Location feature is not supported in this browser.');
      }
      </script>
  --}}
 
  <script>
    $(document).ready(function () {
        debugger;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
        else {
            alert("Geolocation is not supported by this browser.");
        }


        function showPosition(position) {
            debugger;
            var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        document.getElementById("id1").value = results[1].formatted_address;
                    }
                }
            });
        }
    });
</script>
  @endsection
 