<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <button class="btn btn-outline-success mr-3 mt-3 mb-3"  data-toggle="modal" data-target="#add-location">Add Location</button>
        </h2>
		@if(session('updateLocation'))
			<h4 style="color: green">{{session('updateLocation')}} has been updated successfully.</h4>
		@endif

		@if(session('deleteLocation'))
			<h4 style="color: green">{{session('deleteLocation')}} has been deleted successfully.</h4>
		@endif
	</x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <table class="table" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Place</th>
						<th scope="col">Country</th>
						<th scope="col">Country Code</th>
						<th scope="col">Airport</th>
						<th scope="col">Airport Code</th>
						<th scope="col">Days</th>
                        <th scope="col">Nights</th>
						<th scope="col">Package Name</th>
						<th scope="col">Price</th>
						<th scope="col">Status</th>
						<th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
					</tr>
				</thead>
				<tbody id="dynamic-row">
					@foreach($locations as $location)
					<tr>
						<td style="vertical-align: middle;">{{$location->id}}</td>
						<td style="vertical-align: middle;">{{$location->place}}</td>
						<td style="vertical-align: middle;">{{$location->country}}</td>
                        <td style="vertical-align: middle;">{{$location->country_code}}</td>
						<td style="vertical-align: middle;">{{$location->airport}}</td>
						<td style="vertical-align: middle;">{{$location->airport_code}}</td>
                        <td style="vertical-align: middle;">{{$location->days}}</td>
						<td style="vertical-align: middle;">{{$location->nights}}</td>
						<td style="vertical-align: middle;">{{$location->package_name}}</td>
                        <td style="vertical-align: middle;">{{$location->price}}</td>
						<td style="vertical-align: middle;">{{$location->status}}</td>
						<td style="vertical-align: middle;">{{$location->created_at}}</td>
						<td style="vertical-align: middle;">{{$location->updated_at}}</td>
						<td style="vertical-align: middle;">
							<a href="{{route('location.edit', $location->id)}}"><button class="btn btn-outline-warning">Edit</button></a>
							<a href="{{route('location.show', $location->id)}}"><button class="btn btn-outline-danger">Delete</button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>

    <!-- Modal -->
	
	<!-- Add Location -->
	<div class="modal fade" id="add-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Location</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('location.store')}}" class="ml-0 col-md-12 col-lg-12 col-sm-12 col-xs-12">
					@csrf
						<div class="form-group">
							<label class="col-form-label">Place</label>
							<input type="text" name="place" class="form-control"  placeholder="Enter place's name..." value="{{old('place')}}" required>
							<span style="color: red;"> @error('place'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Country</label>
							<input type="text" name="country" class="form-control" placeholder="Enter country's email..." value="{{old('country')}}" required>
							<span style="color: red;"> @error('country'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label class="col-form-label">Country Code</label>
							<input type="text" name="country_code" class="form-control" placeholder="Enter country code..." value="{{old('country_code')}}" >
							<span style="color: red;"> @error('country_code'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label class="col-form-label">Airport</label>
							<input type="text" name="airport" class="form-control" placeholder="Enter Airport's name..." value="{{old('airport')}}" >
							<span style="color: red;"> @error('airport'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label class="col-form-label">Airport Code</label>
							<input type="text" name="airport_code" class="form-control" placeholder="Enter Airport code..." value="{{old('airport_code')}}" >
							<span style="color: red;"> @error('airport_code'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label class="col-form-label">Days</label>
							<input type="number" name="days" class="form-control" placeholder="Enter number of days..." value="{{old('days')}}" >
							<span style="color: red;"> @error('days'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label class="col-form-label">Nights</label>
							<input type="number" name="nights" class="form-control" placeholder="Enter number of nights..." value="{{old('nights')}}" >
							<span style="color: red;"> @error('nights'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label class="col-form-label">Package Name</label>
							<input type="text" name="package_name" class="form-control" placeholder="Enter Package name..." value="{{old('package_name')}}" >
							<span style="color: red;"> @error('package_name'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Package Style</label>
                            <select name="package_style" id="">
                                <option value="domestic">Domestic</option>
                                <option value="international">International</option>
                            </select>
							<span style="color: red;"> @error('package_style'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label class="col-form-label">Description</label>
							<textarea name="description" class="form-control" id="" cols="30" rows="5" value="{{old('description')}}"></textarea>
							<span style="color: red;"> @error('description'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label class="col-form-label">Price</label>
							<input type="number" name="price" class="form-control" placeholder="Enter price..." value="{{old('price')}}" >
							<span style="color: red;"> @error('price'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label class="col-form-label">Status</label>
                            <select name="status" id="">
                                <option value="normal">Normal</option>
                                <option value="featured">Featured</option>
                            </select>
							<span style="color: red;"> @error('status'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<input type="hidden" name="edited_by" class="form-control"  placeholder="" value="{{ Auth::user()->name }}" required>
						</div>
                        @if(session('newLocation'))
                        <h4 style="color: green">{{session('newLocation')}} has been added</h4>
                        @endif
						<div class="text-center">
							<button type="submit" class="btn btn-outline-success">Add Location</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</x-app-layout>