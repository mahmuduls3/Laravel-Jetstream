<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">Update Employee</h3>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <form method="POST" action="{{route('admin.adminPanel.update', $user->id)}}" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
            @csrf
            @method('PUT')
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Id</th>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Profile Photo</th>
                        @if($user->profile_photo_path)
                            <td><img style="clip-path: circle(50%); width: 100px;" src="/storage/{{$user->profile_photo_path}}" alt="{{$user->name}}"></td>
                        @else
                            <td><img style="clip-path: circle(50%); width: 100px;" src="https://ui-avatars.com/api/?name=urlencode({{$user->name}})&color=7F9CF5&background=EBF4FF" alt="{{$user->name}}"></td>
                        @endif
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td>
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                            <span style="color: red;"> @error('name'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>
                            <input class="form-control" type="text" name="email" value="{{$user->email}}">
                            <span style="color: red;"> @error('email'){{$message}} @enderror </span>                           
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Created At</th>
                        <td>{{$user->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Updated At</th>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-outline-secondary mr-3"><a href="{{ URL::previous() }}" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#6c757d'">Back</a></button>
                <button type="submit" class="btn btn-outline-warning mr-3">Update</button>
            </div>
        </form>
    </div>

</x-app-layout>