 <div>
     <div class="p-4 calendar">
         @foreach ($weeks as $week)
             <div class="items-center justify-between mb-4 sm:flex">
                 <h2 class="text-2xl font-semibold dark:text-white">Week of: {{ $week[0]['date'] }}</h2>
                 <div class="navigation">
                     <button class="px-4 py-1 text-white bg-[#25e35f] font-semibold mr-1"
                         wire:click="previousWeek">Last</button>
                     <button class="px-4 py-1 text-white bg-[#25e35f] font-semibold ml-1"
                         wire:click="nextWeek">Next</button>
                 </div>
             </div>

             <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                 @foreach ($week as $day)
                     <div class=" rounded bg-[#2a2e35] p-1 h-44{{ $day['current'] ? ' current' : '' }}">
                         <div class="text-center dark:text-white">{{ $day['date'] }}</div>
                         <!-- Add your event content or any other information for the day here -->
                         <div class="events">
                             @if ($day['events']->isNotEmpty())
                                 @foreach ($day['events'] as $event)
                                     <span>{{ $event->title }}</span>
                                 @endforeach
                             @endif
                         </div>
                     </div>
                 @endforeach
             </div>
         @endforeach
     </div>
 </div>
