 <div class="h-screen pb-0 m-0">
     {{-- <div class="flex-col hidden md:flex">
         <div class="header">
             <div class="month-year">
                 {{ date('F Y', strtotime($activeYear . '-' . $activeMonth . '-' . $activeDay)) }}
                 <div class="flex items-center">
                     <button wire:click="decrementDate" aria-label="calendar backward"
                         class="text-gray-800 focus:text-gray-400 hover:text-gray-400 dark:text-gray-100">
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                             <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                             <polyline points="15 6 9 12 15 18" />
                         </svg>
                     </button>
                     <button wire:click="incrementDate" aria-label="calendar forward"
                         class="ml-3 text-gray-800 focus:text-gray-400 hover:text-gray-400 dark:text-gray-100">
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                             <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                             <polyline points="9 6 15 12 9 18" />
                         </svg>
                     </button>
                 </div>
             </div>
         </div>
         <div class="days">
             @foreach ($days as $day)
                 <div class="day_name">{{ $day }}</div>
             @endforeach

             @for ($i = $firstDayOfWeek; $i > 0; $i--)
                 <div class="day_num ignore">
                     {{ $numDaysLastMonth - $i + 1 }}
                 </div>
             @endfor

             @for ($i = 1; $i <= $numDays; $i++)
                 @php
                     $selected = $i == $activeDay ? ' selected' : '';
                 @endphp
                 <div class="day_num{{ $selected }}">
                     <span>{{ $i }}</span>
                     @foreach ($events as $event)
                         @for ($d = 0; $d <= $event[2] - 1; $d++)
                             @if (date('y-m-d', strtotime($activeYear . '-' . $activeMonth . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[1])))
                                 <div class="event{{ $event[3] }}">{{ $event[0] }}</div>
                             @endif
                         @endfor
                     @endforeach
                 </div>
             @endfor

             @for ($i = 1; $i <= 42 - $numDays - max($firstDayOfWeek, 0); $i++)
                 <div class="day_num ignore">
                     {{ $i }}
                 </div>
             @endfor
         </div>
     </div> --}}
     {{-- Mobile Calendar --}}
     <div class="flex items-center justify-center">
         <div class="w-full">
             <div class="p-5 bg-white rounded-t md:p-8 dark:bg-[#12181b]">
                 <div class="flex items-center justify-between md:px-14">
                     <span tabindex="0"
                         class="px-4 text-2xl font-bold text-gray-800 focus:outline-none dark:text-gray-100">
                         {{ date('F Y', strtotime($activeYear . '-' . $activeMonth . '-' . $activeDay)) }}
                     </span>
                     <div class="flex items-center">
                         <button aria-label="calendar backward" wire:click="decrementDate"
                             class="text-gray-800 focus:text-gray-400 hover:text-gray-400 dark:text-gray-100">
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <polyline points="15 6 9 12 15 18" />
                             </svg>
                         </button>
                         <button aria-label="calendar forward" wire:click="incrementDate"
                             class="ml-3 text-gray-800 focus:text-gray-400 hover:text-gray-400 dark:text-gray-100">
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <polyline points="9 6 15 12 9 18" />
                             </svg>
                         </button>
                     </div>
                 </div>
                 <div class="flex items-center justify-between pt-12 overflow-x-auto">
                     <table class="w-full mb-7">
                         <thead>
                             <tr>
                                 @foreach ($days as $day)
                                     <th>
                                         <div class="flex justify-center w-full">
                                             <p
                                                 class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                 {{ $day }}
                                             </p>
                                         </div>
                                     </th>
                                 @endforeach
                             </tr>
                         </thead>
                         <tbody>
                             @for ($week = 0; $week < 6; $week++)
                                 <tr>
                                     @for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++)
                                         @php
                                             $dayNum = $daysInMonth - $firstDayOfWeek;
                                             $activeClass = $dayNum == $activeDay - 1 && $activeMonth == date('m') ? 'bg-gray-200 text-gray-900 p-2 rounded-lg' : '';
                                         @endphp

                                         <td class="pt-4 text-center md:pt-6">
                                             @if ($dayNum >= 1 && $dayNum <= $numDays)
                                                 <div class="justify-center w-full px-2 py-2 text-white cursor-pointer">
                                                     <span class="{{ $activeClass }}">{{ $dayNum }}</span>
                                                 </div>
                                                 @foreach ($events as $event)
                                                     {{-- TODO: create a helper for this --}}
                                                     @if (date('d', strtotime($event->date)) == $dayNum &&
                                                             date('m', $event[1]) == $activeMonth &&
                                                             date('Y', $event[1] == $activeYear))
                                                         <div
                                                             class="mx-1 text-xs bg-blue-500 rounded sm:text-sm dark:text-white">
                                                             {{ $event->title }}</div>
                                                     @endif
                                                 @endforeach
                                             @endif
                                         </td>

                                         @if ($dayNum >= $numDays)
                                             @php
                                                 break 2;
                                             @endphp
                                         @endif

                                         @php
                                             $daysInMonth++;
                                         @endphp
                                     @endfor
                                 </tr>
                             @endfor

                         </tbody>
                     </table>
                 </div>
             </div>
             <div class="block px-5 py-5 sm:hidden rounded-t-2xl md:py-8 md:px-16 dark:bg-gray-800 bg-gray-50">
                 <div class="px-4">
                     <div class="pb-4 border-b border-gray-400 border-dashed">
                         <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">9:00 AM</p>
                         <a tabindex="0"
                             class="mt-2 text-lg font-medium leading-5 text-gray-800 focus:outline-none dark:text-gray-100">Zoom
                             call with design team</a>
                         <p class="pt-2 text-sm leading-none text-gray-600 md:leading-4 dark:text-gray-300">Discussion
                             on
                             UX sprint and Wireframe review</p>
                     </div>
                     <div class="pt-5 pb-4 border-b border-gray-400 border-dashed">
                         <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">10:00 AM</p>
                         <a tabindex="0"
                             class="mt-2 text-lg font-medium leading-5 text-gray-800 focus:outline-none dark:text-gray-100">Orientation
                             session with new hires</a>
                     </div>
                     <div class="pt-5 pb-4 border-b border-gray-400 border-dashed">
                         <p class="text-xs font-light leading-3 text-gray-500 dark:text-gray-300">9:00 AM</p>
                         <a tabindex="0"
                             class="mt-2 text-lg font-medium leading-5 text-gray-800 focus:outline-none dark:text-gray-100">Zoom
                             call with design team</a>
                         <p class="pt-2 text-sm leading-none text-gray-600 sm:leading-4 dark:text-gray-300">Discussion
                             on
                             UX sprint and Wireframe review</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
