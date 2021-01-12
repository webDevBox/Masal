@extends('layout.web')
@section('content')
   <center><h1 style="margin-bottom: -80px">Direction</h1></center>
    <div id="floating-panel" style="display: none;">
    <b>Start: </b>
    <select id="start">
      <option value="bahria town lahore"  selected>Chicago</option>
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
    <b>End: </b>
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
   @endsection
 