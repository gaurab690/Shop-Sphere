<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Orders Overview -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">My Orders</h3>
                    <p class="text-gray-600 dark:text-gray-400">View your recent orders and track delivery.</p>
                    <a href="" class="text-blue-500 hover:underline">View Orders</a>
                </div>

                <!-- Cart Summary -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Shopping Cart</h3>
                    <p class="text-gray-600 dark:text-gray-400">Items in your cart ready for checkout.</p>
                    <a href="" class="text-blue-500 hover:underline">View Cart</a>
                </div>


                <!-- Profile Settings -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Profile Settings</h3>
                    <p class="text-gray-600 dark:text-gray-400">Update your account information.</p>
                    <a href="" class="text-blue-500 hover:underline">Manage Profile</a>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
