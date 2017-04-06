{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')
@section('title')
    Search
@endsection
@section('content')

<div class="page-header" style="text-align:center;">
<h1>Highlights from the Metropolitan Museum of Art</h1>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-md-6 col-lg-6" style="text-align:center;">
    <div class='alert alert-info'>Searched for: {{ $continent }} </div>
     @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                {{ $error }}.<br>
            @endforeach
     @endif    
    
	<ul class="gallery">
		@foreach($image_data as $image_key=>$image_value) 
                <?='<li>'?>
		<?='<img src="/images/'.$image_value['file_name'].'" style="width:100px;">'?>
		<?='<span style="margin:300px 0px 0px 0px;">'?>
		<?='<img src="/images/'.$image_value['file_name'].'" style="width:300px;">'?>
                <?= $image_value['description'] ?>
		<?='</span>'?>
		<?='</li>'?>
	  	@endforeach
	</ul>
</div>
<div class="col-md-6 col-lg-6" style="text-align:center;">
<h4>Select from the options below to see highlights from the Met!</h4>

<hr style="width:200px">
<form method='POST' action="/">
  {{ csrf_field() }}
  <h4>Object type</h4>

  <br>
  <input type="checkbox" name="object[]" value="textile" id="textile"><label for="textile" style="margin:5px"> textiles</label>
  <input type="checkbox" name="object[]" value="decorative"><label for="decorative" style="margin:5px"> decorative</label>
  <input type="checkbox" name="object[]" value="painting"><label for="painting" style="margin:5px"> paintings</label>
  <input type="checkbox" name="object[]" value="sculpture"><label for="painting" style="margin:5px"> sculptures</label>
  <hr style="width:200px">


  <h4>Date of creation</h4>
  <br>
  <input type="radio" name="date" value="17" id="17"><label for="17" style="margin:5px">1600-1800 AD</label>
  <input type="radio" name="date" value="18" id="18"><label for="18" style="margin:5px">1800-1900 AD</label>
  <input type="radio" name="date" value="20" id="20"><label for="20" style="margin:5px">1900-present</label>

  <hr style="width:200px">

  <label for="continent"><h4>Continent</h4></label>
  <br>

  <select name="continent" id="continent">
  <option value="Africa">Africa</option>
  <option value="Asia">Asia</option>
  <option value="Europe">Europe</option>
  <option value="Americas">Americas</option>
  </select>

  <br><br>
  <input type="submit" value="Submit">


</form>
</div>
</div>
</div>
@endsection

