<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\Channel; // Public Channel
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ScoreUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $arrayData = [];


    public function __construct($data)
    {
        // Convert Eloquent Collection to array if needed
        $this->arrayData = is_array($data) ? $data : $data->toArray();

    }

    public function broadcastOn()
    {
        return new Channel('football-scores');
    }

    public function broadcastWith()
    {
        try {
            return $this->arrayData;
        } catch (\Throwable $th) {
            Log::error('Broadcast data error: ' . $th->getMessage());
            return [];
        }
    }

    public function broadcastAs()
    {
        return 'score.updated';
    }
}
