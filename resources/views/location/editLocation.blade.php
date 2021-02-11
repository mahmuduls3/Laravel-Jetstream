<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">Update Location</h3>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <form method="POST" action="{{route('location.update', $location->id)}}" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
            @csrf
            @method('PUT')
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Id</th>
                        <td>{{$location->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Place</th>
                        <td>
                            <input class="form-control" type="text" name="place" value="{{$location->place}}">
                            <span style="color: red;"> @error('place'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        <td>
                            <input class="form-control" type="text" name="country" value="{{$location->country}}">
                            <span style="color: red;"> @error('country'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Country Code</th>
                        <td>
                            <input class="form-control" type="text" name="country_code" value="{{$location->country_code}}">
                            <span style="color: red;"> @error('country_code'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Airport</th>
                        <td>
                            <input class="form-control" type="text" name="airport" value="{{$location->airport}}">
                            <span style="color: red;"> @error('airport'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Airport Code</th>
                        <td>
                            <input class="form-control" type="text" name="airport_code" value="{{$location->airport_code}}">
                            <span style="color: red;"> @error('airport_code'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Days</th>
                        <td>
                            <input class="form-control" type="number" name="days" value="{{$location->days}}">
                            <span style="color: red;"> @error('days'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Nights</th>
                        <td>
                            <input class="form-control" type="number" name="nights" value="{{$location->nights}}">
                            <span style="color: red;"> @error('nights'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Package Name</th>
                        <td>
                            <input class="form-control" type="text" name="package_name" value="{{$location->package_name}}">
                            <span style="color: red;"> @error('package_name'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Price</th>
                        <td>
                            <input class="form-control" type="number" name="price" value="{{$location->price}}">
                            <span style="color: red;"> @error('price'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>
                            <select name="status" id="" class="form-control">
                                <option {{ ($location->status) == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                <option {{ ($location->status) == 'featured' ? 'selected' : '' }} value="featured">Featured</option>
                            </select>
                            <span style="color: red;"> @error('status'){{$message}} @enderror </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="edited_by" class="form-control"  placeholder="" value="{{ Auth::user()->name }}" required>
                        </td>
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