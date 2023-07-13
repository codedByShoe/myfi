<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
    public $activeYear;
    public $activeMonth;
    public $activeDay;
    public $events;
    public $daysInMonth = 1;

    public function mount($date = null)
    {
        $this->events = Event::all();
        $this->activeYear = $date != null ? date('Y', strtotime($date)) : date('Y');
        $this->activeMonth = $date != null ? date('m', strtotime($date)) : date('m');
        $this->activeDay = $date != null ? date('d', strtotime($date)) : date('d');
    }

    public function addEvent($txt, $date, $days = 1, $color = '')
    {
        $color = $color ? ' ' . $color : $color;
        // $this->events[] = [$txt, $date, $days, $color];
    }

    public function incrementDate()
    {
        $formattedDate = $this->activeDay . '-' . $this->activeMonth + 1 . '-' . $this->activeYear;
        $this->mount($formattedDate);
    }

    public function decrementDate()
    {
        $formattedDate = $this->activeDay . '-' . $this->activeMonth - 1 . '-' . $this->activeYear;
        $this->mount($formattedDate);
    }

    public function render()
    {
        $numDays = date('t', strtotime($this->activeDay . '-' . $this->activeMonth . '-' . $this->activeYear));
        $numDaysLastMonth = date('j', strtotime('last day of previous month', strtotime($this->activeDay . '-' . $this->activeMonth . '-' . $this->activeYear)));
        $days = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];
        $firstDayOfWeek = array_search(date('D', strtotime($this->activeYear . '-' . $this->activeMonth)), $days);

        return view('livewire.calendar', [
            'numDays' => $numDays,
            'numDaysLastMonth' => $numDaysLastMonth,
            'days' => $days,
            'firstDayOfWeek' => $firstDayOfWeek,
        ]);
    }
}
