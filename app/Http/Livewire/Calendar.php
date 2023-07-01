<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
    public $weeks;
    public $currentDate;

    public function mount()
    {
        $this->currentDate = Carbon::now();
        $this->generateCalendarWeeks();
    }

    public function generateCalendarWeeks()
    {
        $startDate = $this->currentDate->startOfWeek()->copy();
        $endDate = $this->currentDate->endOfWeek();

        $currentDate = clone $startDate;
        $weeks = [];

        while ($currentDate->lte($endDate)) {
            $week = [];

            for ($i = 0; $i < 7; $i++) {
                $events = $this->getEventsForDay($currentDate);
                $week[] = [
                    'date' => $currentDate->format('Y-m-d'),
                    'current' => $currentDate->isToday(),
                    'events' => $events
                ];
                $currentDate->addDay();
            }

            $weeks[] = $week;
        }

        $this->weeks = $weeks;
    }

    private function getEventsForDay($date)
    {
        $events = Event::where('date', $date->format('Y-m-d'))->get();
        $recurringEvents = Event::where('recurring', true)
            ->whereDay('date', $date->day)
            ->get();

        return $events->concat($recurringEvents);
    }

    public function previousWeek()
    {
        $this->currentDate->subWeek();
        $this->generateCalendarWeeks();
    }

    public function nextWeek()
    {
        $this->currentDate->addWeek();
        $this->generateCalendarWeeks();
    }

    public function render()
    {
        $events =  Event::select('id', 'title', 'start')->get();
        return view('livewire.calendar');
    }
}
