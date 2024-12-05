<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-900 text-blue-500">
                    <chat-component :user="{{ $user }}" :currentuser="{{auth()->user()}}"></chat-component>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
