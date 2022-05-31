<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @foreach($users as $user)
               <h1 class="text-lg">{{$user->name}}</h1>
               <h1 class="text-lg">{{$user->email}}</h1>
               <h1 class="text-lg">{{$user->type}}</h1>
               <h1 class="text-lg">{{$user->subcription}}</h1>



            @endforeach
               
            </div>
        </div>
    </div>
</x-app-layout>

</script>
