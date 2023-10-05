<x-app-layout>



    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">


            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Make changes to the reservation') }}
                </h2>
            </x-slot>

            <div class="max-w-20xl mx-h-20xl">
                <p class="text-5xl my-10">Reservation Edit Form </p>
            </div>

            @if(session('failure'))
                <div class="p-4 mb-4 text-sm text-red-700 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-500" role="alert">
                    <span class="font-medium">Invalid Vehicle Number!</span><br>{{ session('failure') }}
                </div>
            @endif

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success !</span><br>{{ session('success') }}
                </div>
            @endif
            

            <form method="POST" action="{{ route('vehicles.update', $vehicle) }}">
                @csrf
                @method('patch')
                <label for='number'>{{ __('Vehicle Number') }}</label><br>
                <input  name ="Vehicle_Number" 
                        type="text" 
                        placeholder={{ $vehicle->Vehicle_Number }} 
                        id='number'
                        value={{ $vehicle->Vehicle_Number }} 
                        class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        >
                <br>

                @if($errors->has('vNumber'))
                    <p class="text-red-500">{{ $errors->first('vNumber') }}</p>
                @endif

                <label for='mileage'>{{ __('Current Vehicle Mileage') }}</label><br>
                <input  name ="Mileage" 
                        type="number" 
                        placeholder={{ $vehicle->Mileage }}
                        id='mileage'
                        value={{ $vehicle->Mileage }}
                        class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        >



                <br>
                <label for='date'>{{ __('Preferred Reservation Date') }}</label><br>
                <input  name ="Reservation_Date" 
                        type="date" 
                        placeholder="Reservation Date" 
                        id='date'
                        {{-- value="{{ old('rDate') }}" --}}
                        value={{ $vehicle->Reservation_Date }}
                        class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        oninput="checkSelectedDate(this)"
                        min="{{ now()->toDateString() }}"
                        
                        >

                        <script>
                            function checkSelectedDate(inputElement) {
                                const selectedDate = new Date(inputElement.value);
                                const today = new Date();
                                
                                if (selectedDate < today || selectedDate.getDay() === 0) {
                                    // The selected date is either before today or a Sunday, so reset the input value to an empty string
                                    inputElement.value = '';
                                    alert('Sundays and dates before today are not allowed for reservations.');
                                }
                            }
                            </script>

                <br>
                <label for='time'>{{ __('Preferred Time') }}</label><br>
                <input  name ="Reservation_Time" 
                        type="time"
                        placeholder="Preferred Time" 
                        id='Time'
                        {{-- value="{{ old('rTime') }}" --}}
                        value={{ $vehicle->Reservation_Time }}
                        class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        >


                <br>
                <label for="location">{{ __('Preferred Location') }}</label><br>
                <select name="Location" id="location" class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="Ampara">Ampara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Matale">Matale</option>
                    <option value="Matara">Matara</option>
                    <option value="Moneragala">Moneragala</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Vavuniya">Vavuniya</option>

                    <option selected>{{ $vehicle->Location }}</option>
                </select>
                



                <br>
                <label for="vmessage"> Message </label>
                <textarea
                    name="Message"
                    id="vmessage"
                    placeholder="{{ $vehicle->Message }}"
                    value={{ $vehicle->Message }}
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ $vehicle->Message }}
                </textarea>

                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
            
            </form>
    </div>





</x-app-layout>