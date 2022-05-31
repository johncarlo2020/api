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
               <h2 class="text-lg">Name: {{$user->name}}</h2>
               <h2 class="text-lg">Email: {{$user->email}}</h2>
               <h2 class="text-lg">User Type: {{$user->type}}</h2>
               <h2 class="text-lg">USer Subscription: {{$user->subcription}}</h2>
            @endforeach
       
            <h1 class="text-lg pt-10">Notes</h1>
            @foreach($notes as $note)
                <div class="max-w-md py-4 px-8 bg-gray-100 dark:bg-gray-900 shadow-lg rounded-lg my-20">
                    <div>
                        <h2 class="text-gray-800 text-3xl font-semibold">{{$note->title}}</h2>
                        <p class="mt-2 text-gray-600">{{$note->body}}</p>
                    </div>
            @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

</script>
