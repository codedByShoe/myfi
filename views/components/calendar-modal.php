<div @keydown.escape.window="modalOpen = false" :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
            <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-gray-900 bg-opacity-50 backdrop-blur-sm"></div>
            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="relative w-full py-6 bg-white shadow-md px-7 bg-opacity-90 drop-shadow-md backdrop-blur-sm sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-3">
                    <h3 class="text-lg font-semibold">Add Event</h3>
                    <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative w-auto pb-8">
                    <form class="grid gap-4 mx-auto sm:grid-cols-2">
                        <span x-text="eventDate"></span>
                        <div class="sm:col-span-2">
                            <label for="event-name" class="inline-block mb-2 text-sm font-medium text-gray-500 sm:text-base">Event Name</label>
                            <input name="event-name" type="text" class="w-full px-3 py-2 text-gray-800  duration-100 border rounded-md transition-colors outline-none bg-gray-50 focus:none ring-neutral-900 focus:outline-none" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="date" class="inline-block mb-2 text-sm font-medium text-gray-500 sm:text-base">Date</label>
                            <input name="date" type="date" class="w-full px-3 py-2 text-gray-800 transition-colors duration-100 border rounded-md outline-none bg-gray-50 focus:none ring-neutral-900 focus:outline-none" />
                        </div>

                        <div class="sm:col-span-2">
                            <label for="color" class="inline-block mb-2 text-sm font-medium text-gray-500 sm:text-base">Color</label>
                            <select name="color" class="w-full px-3 py-2 text-gray-800  duration-100 border rounded-md transition-colors outline-none bg-gray-50 focus:none ring-neutral-900 focus:outline-none">
                                <option value="red">Red</option>
                                <option value="yellow">Yellow</option>
                                <option value="green">Green</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-between sm:col-span-2">
                            <button class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-neutral-900">Create Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>
