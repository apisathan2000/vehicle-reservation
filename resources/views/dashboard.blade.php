<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
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

</x-app-layout>
