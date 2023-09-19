<?php

namespace App\Jobs\Farmer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CattleRegistrationProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $basename;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($basename, $data)
    {
        $this->data = $data;
        $this->basename = $basename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $basename = $this->basename;
        $options = 'claim';
        $apiUrl = env('API_URL');

//        auth()->user()->cattleRegister()->create($data);
//        session()->flash("register", "Cattle Registered Successfully");
//        return back()

        try {
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $basename)),
                basename($basename) // File name to use in the request
            )->post($apiUrl, ['options' => $options]);


            if ($response->status() == 200) {

                $apiResponse = $response->json('output');

                if ($apiResponse == "Success") {
                    auth()->user()->cattleRegister()->create($data);
                    session()->flash("register", "Cattle Registered Successfully");
                } elseif ($apiResponse == "Failed") {
                    session()->flash("register", "Cattle data exists, try different muzzle");
                } else {
                    session()->flash("register", "Server error");
                }

            } else {

                return "Error";
            }
        } catch (Exception $e) {

            return "Catch Exception";
        }


    }
}
