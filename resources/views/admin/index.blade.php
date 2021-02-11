<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <button class="btn btn-outline-success mr-3 mt-3 mb-3"  data-toggle="modal" data-target="#add-employee">Add Employee</button>
        </h2>
		@if(session('updateEmployee'))
			<h4 style="color: green">{{session('updateEmployee')}} has been updated successfully.</h4>
		@endif

		@if(session('deleteEmployee'))
			<h4 style="color: green">{{session('deleteEmployee')}} has been deleted successfully.</h4>
		@endif
	</x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <table class="table" id="myTable">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Profile Photo</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Created At</th>
						<th scope="col">Updated At</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody id="dynamic-row">
					@foreach($users as $user)
					<tr>
						<td style="vertical-align: middle;">{{$user->id}}</td>
						@if($user->profile_photo_path)
							<td style="vertical-align: middle;"><img style="clip-path: circle(50%); width: 100px;" src="storage/{{$user->profile_photo_path}}" alt="{{$user->name}}"></td>
						@else
							<td style="vertical-align: middle;"><img style="clip-path: circle(50%); width: 100px;" src="https://ui-avatars.com/api/?name=urlencode({{$user->name}})&color=7F9CF5&background=EBF4FF" alt="{{$user->name}}"></td>
						@endif
						<td style="vertical-align: middle;">{{$user->name}}</td>
						<td style="vertical-align: middle;">{{$user->email}}</td>
						<td style="vertical-align: middle;">{{$user->created_at}}</td>
						<td style="vertical-align: middle;">{{$user->updated_at}}</td>
						<td style="vertical-align: middle;">
							<a href="{{route('adminPanel.edit', $user->id)}}"><button class="btn btn-outline-warning">Edit</button></a>
							<a href="{{route('adminPanel.show', $user->id)}}"><button class="btn btn-outline-danger">Delete</button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>

    <!-- Modal -->
	
	<!-- Add Employee -->
	<div class="modal fade" id="add-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('adminPanel.store')}}" class="ml-0 col-md-12 col-lg-12 col-sm-12 col-xs-12">
					@csrf
						<div class="form-group">
							<label >Name</label>
							<input type="text" name="name" class="form-control"  placeholder="Enter employee's name..." value="{{old('name')}}" required>
							<span style="color: red;"> @error('name'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email Address</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter employee's email..." value="{{old('email')}}" required>
							<span style="color: red;"> @error('email'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control"  placeholder="Enter employee's password..." required>
							<span style="color: red;"> @error('password'){{$message}} @enderror </span>
						</div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm employee's password...">
                            <span style="color: red;"> @error('password_confirmation'){{$message}} @enderror </span>
                        </div>
                        @if(session('newEmployee'))
                        <h4 style="color: green">{{session('newEmployee')}} has been added</h4>
                        @endif
						<div class="text-center">
							<button type="submit" class="btn btn-outline-success">Add Employee</button>
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