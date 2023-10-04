<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        


        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Vehicle Reservation System') }}
            </h2>
        </x-slot>


        <div class="max-w-20xl mx-h-20xl">
            <p class="text-5xl my-10">Vehicle Reservation Form </p>
        </div>


        <form method="POST" action="{{ route('vehicles.store') }}">
            @csrf
            <label for='vnumber'>{{ __('Vehicle Number') }}</label><br>
            <input  name ="vnumber" 
                    type="text" 
                    placeholder="Vehicle Number" 
                    id='vnumber'
                    class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >
            <br>
            <label for='mileage'>{{ __('Current Vehicle Mileage') }}</label><br>
            <input  name ="mileage" 
                    type="number" 
                    placeholder="Vehicle Mileage" 
                    id='mileage'
                    class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >



            <br>
            <label for='date'>{{ __('Preferred Reservation Date') }}</label><br>
            <input  name ="date" 
                    type="date" 
                    placeholder="Reservation Date" 
                    id='date'
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
            <input  name ="time" 
                    type="time"
                    placeholder="Preferred Time" 
                    id='Time'
                    class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >


            <br>
            <label for="location">{{ __('Preferred Location') }}</label><br>
            <select name="location" id="location" class="block w-auto border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
            </select>
            
    


            <br>
            <label for="vmessage"> Message </label>
            <textarea
                name="message"
                id="vmessage"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>

            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        
        </form>
    </div>





</x-app-layout>