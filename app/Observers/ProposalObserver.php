<?php

namespace App\Observers;

use App\Models\Proposal;
use App\Services\NotificationService;

class ProposalObserver
{
    public function created(Proposal $proposal)
    {
        //
    }

    public function updated(Proposal $proposal)
    {
        if ($proposal->status == 'approved') {
            $successfulNotification = NotificationService::sendNotification();
            if ($successfulNotification) {
                $proposal->notificado = true;
            }
        }
    }

    public function deleted(Proposal $proposal)
    {
        //
    }

    public function restored(Proposal $proposal)
    {
        //
    }

    public function forceDeleted(Proposal $proposal)
    {
        //
    }
}
