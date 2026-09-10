<?php

namespace App\Observers;

use App\Models\DataPertanahan;

class DataPertanahanObserver
{
    /**
     * Handle the DataPertanahan "created" event.
     */
    public function created(DataPertanahan $dataPertanahan): void
    {
        //
    }

    /**
     * Handle the DataPertanahan "updated" event.
     */
    public function updated(DataPertanahan $dataPertanahan): void
    {
        //
    }

    /**
     * Handle the DataPertanahan "deleted" event.
     */
    public function deleted(DataPertanahan $dataPertanahan): void
    {
        // Delete the associated image when the record is deleted.
        if ($dataPertanahan->peta_bidang) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($dataPertanahan->peta_bidang);
        }
    }

    /**
     * Handle the DataPertanahan "restored" event.
     */
    public function restored(DataPertanahan $dataPertanahan): void
    {
        //
    }

    /**
     * Handle the DataPertanahan "force deleted" event.
     */
    public function forceDeleted(DataPertanahan $dataPertanahan): void
    {
        // Delete the associated image when the record is force deleted.
        if ($dataPertanahan->peta_bidang) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($dataPertanahan->peta_bidang);
        }
    }
}
