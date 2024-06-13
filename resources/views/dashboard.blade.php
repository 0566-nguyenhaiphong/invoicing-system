<x-app-layout>
    <x-slot name="header">  
        <div class="container">
            <div class="btn-group-vertical">
                <a href="/fruit-categories" class="btn btn-primary btn-block mb-2">Fruit Category</a>
                <a href="/fruit-items" class="btn btn-primary btn-block mb-2">Fruit Items</a>
                <a href="/invoices" class="btn btn-primary btn-block mb-2">Invoices</a>
            </div>
        </div>
        
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
</x-app-layout>
