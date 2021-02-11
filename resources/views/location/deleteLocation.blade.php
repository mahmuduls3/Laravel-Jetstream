<x-app-layout>
    <x-slot name="header">  
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">Delete Location</h3>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <form method="POST" action="{{route('location.destroy', $location->id)}}" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
            @csrf
            @method('DELETE')
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Id</th>
                        <td>{{$location->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Place</th>
                        <td>{{$location->place}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        <td>{{$location->country}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Country Code</th>
                        <td>{{$location->country_code}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Airport</th>
                        <td>{{$location->airport}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Airport Code</th>
                        <td>{{$location->airport_code}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Days</th>
                        <td>{{$location->days}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nights</th>
                        <td>{{$location->nights}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Package Name</th>
                        <td>{{$location->package_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Price</th>
                        <td>{{$location->price}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>{{$location->status}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created At</th>
                        <td>{{$location->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Updated At</th>
                        <td>{{$location->updated_at}}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-outline-secondary mr-3"><a href="{{ URL::previous() }}" onMouseOver="this.style.color='#fff'" onMouseOut="this.style.color='#6c757d'">Back</a></button>
                <button type="submit" class="btn btn-outline-danger mr-3">Delete</button>
            </div>
        </form>
    </div>

</x-app-layout>