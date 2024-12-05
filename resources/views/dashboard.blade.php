<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-blue-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 mt-6 max-w-4xl max-auto ">
                    <span>
                        @foreach (str_split('Hello:'  . Auth::user()->name."~_~") as $index=>$char)
                            <span style="color: {{['red', 'orange','black', 'brown', 'blue', 'indigo', 'tortilla'][$index%7] }}">{{$char}}</span>
                        @endforeach
                    </span>

                </div>
                <div class='bg-white overflow-hidden shadow-sm sm:rounded-lg m-20 mt-10 '>
                <div class="grid grid-cols-6 md:grid-cols-3 gap-6 ">
                    @foreach ($users as $user)
                        <a href="{{route('chat',$user->id)}}"
                           class="bg-gray-100 p-6 rounded-lg shadow-lg block hover:bg-gray-200 border transform hover:scale-105 transition duration-300">
                            <h3 class="text-lg font-semibold">{{$user->name }}</h3>
                            <p> {{$user->email }}</p>
                        </a>
                    @endforeach
                </div>
                </div>
                <div class="mt-10">
                    {{$users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
