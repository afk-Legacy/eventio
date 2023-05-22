<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="text-align: center;">
                <div class="p-6 text-gray-900">
                  <h1 style="font-size: 24px">{{ __("Edit Profile Information") }}
</h1><br><br>
<form action="{{route('society.update')}}" method="post">
        @csrf
            <label for="name">Society Name</label><br>
            <input type="text" id="name" name="name" value="{{$society->name}}"><br><br>
            <label for="type">Society Type:</label><br>
            <input type="text" id="type" name="type" value="{{$society->type}}"><br><br>
            <label for="uniname">Society University:</label><br>
            <input type="text" id="uniname" name="uniname" value="{{$society->uniname}}"><br><br>
            
            <br><br>
         
        <input type="submit" value="Save info" style="background-color: blue; padding:05px; color:white">
    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>