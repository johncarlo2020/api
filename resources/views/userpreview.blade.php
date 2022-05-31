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
               <h1 class="text-lg">Name: {{$user->name}}</h1>
               <h1 class="text-lg">Email: {{$user->email}}</h1>
               <h1 class="text-lg">User Type: {{$user->type}}</h1>
               <h1 class="text-lg">USer Subscription: {{$user->subcription}}</h1>
            @endforeach
            <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                Notes
                                
                            </div>
                        </div>
                    </div>
            </div>
            <div class="max-w-md py-4 px-8 bg-brown shadow-lg rounded-lg my-20">
                                    <div>
                                        <h2 class="text-gray-800 text-3xl font-semibold">Design Tools</h2>
                                        <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>
                                    </div>
                                    
                                </div>
                        
               
            </div>
        </div>
    </div>
</x-app-layout>

</script>
