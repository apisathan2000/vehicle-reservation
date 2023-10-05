<x-app-layout>
    {{-- <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8"> --}}
        


        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('The List Of Reservations') }}
            </h2>
        </x-slot>

        <div class="relative overflow-x-auto max-w-6xl mx-auto p-4 sm:p-6 lg:p-8 ">
            <table class="w-full text-sm text-left text-gray-800 dark:text-gray-400 my-5">
                <thead class="text-xs text-gray-100 uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3"> Vehicle Number </th>
                        <th scope="col" class="px-6 py-3"> Mileage </th>
                        <th scope="col" class="px-6 py-3"> Reservation Date </th>
                        <th scope="col" class="px-6 py-3"> Reseration Time </th>
                        <th scope="col" class="px-6 py-3"> Location </th>
                        <th scope="col" class="px-6 py-3"> Message </th>
                        <th scope="col" class="px-6 py-3"> Actions </th>
                    </tr>
                </thead>

                @foreach ($vehicles as $vehicle )

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4"> {{ $vehicle->Vehicle_Number }} </td>
                    <td class="px-6 py-4"> {{ $vehicle->Mileage }} </td>
                    <td class="px-6 py-4"> {{ $vehicle->Reservation_Date }} </td>
                    <td class="px-6 py-4"> {{ $vehicle->Reservation_Time }} </td>
                    <td class="px-6 py-4"> {{ $vehicle->Location }} </td>
                    <td class="px-6 py-4"> {{ $vehicle->Message }} </td>
                    <td class="px-6 py-4"> 
                        <form action="{{ route('vehicles.destroy',$vehicle) }}" method="POST">
                            {{-- <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('vehicles.show',$vehicle->id) }}">Show</a> --}}
                            {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <a class="font-medium text-white" href="{{ route('vehicles.show',$vehicle->id) }}">Show</a>
                            </button> --}}

                            <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                <a class="font-medium text-white" href="{{ route('vehicles.edit',$vehicle) }}">Edit</a>
                            </button>
                            
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Delete
                            </button>
                            
                        </form>
                    </td>
                </tr>   
                @endforeach
            </table>
            {{ $vehicles->links() }}

        </div>

            
            
    {{-- </div> --}}


</x-app-layout>