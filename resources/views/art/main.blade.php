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
    <div class='alert alert-info'>Searched for: {{ $period."th century ".$continent }} </div>
    @if($errors->get('continent'))
    <ul>
        @foreach($errors->get('continent') as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
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
  <label for="checkbox">Object type</label>

  <br>
  <input type="checkbox" name="checkbox[]" value="textile"> textiles<br><br>
  <input type="checkbox" name="checkbox[]" value="decorative"> decorative<br><br>
  <input type="checkbox" name="checkbox[]" value="painting"> paintings<br><br>
  <input type="checkbox" name="checkbox[]" value="sculpture"> sculptures<br>
  <hr style="width:200px">


  <label for="century">Date of creation</label>
  <br>
  <input type="radio" name="century" value="17"> 1600-1800 AD<br><br>
  <input type="radio" name="century" value="18"> 1800-1900 AD<br><br>
  <input type="radio" name="century" value="20"> 1900-present<br><br>

  <hr style="width:200px">

  <label for="continent">Continent</label>
  <br>

  <select name="continent">
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
</body>
</html>
@endsection
