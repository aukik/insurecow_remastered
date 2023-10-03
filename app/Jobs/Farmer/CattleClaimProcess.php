<?php

namespace App\Jobs\Farmer;

use App\Models\CattleRegReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CattleClaimProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $muzzle;
    public $basename;
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $muzzle,$basename, $user)
    {
        $this->muzzle = $muzzle;
        $this->data = $data;
        $this->basename = $basename;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Additional parameters to send to the API
        $options = 'claim';

        // API endpoint URL
        $apiUrl = "http://13.232.34.224/cattle_identification";

        try {
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $this->muzzle)),
                basename($this->basename) // File name to use in the request
            )->post($apiUrl, ['options' => $options]);


            if ($response->status() == 200) {

                $apiResponse = $response->json('output');

                if (Str::length($apiResponse) > 30) {

//                    auth()->user()->insurance_claimed()->create($inputs);

                    CattleRegReport::create([
                        'cattle_name' => $this->data->cattle_name,
                        'cow_with_owner' => $this->data->cow_with_owner,
                        'verification_report' => "claimed",
                        'user_id' => $this->user->id,
                        'cattle_id' => $this->data->id,
                        'operation' => 'claim'

                    ]);

                } elseif ($apiResponse == "Failed") {
                    CattleRegReport::create([
                        'cattle_name' => $this->data->cattle_name,
                        'cow_with_owner' => $this->data->cow_with_owner,
                        'verification_report' => "claim Failed",
                        'user_id' => $this->user->id,
                        'cattle_id' => $this->data->id,
                        'operation' => 'claim'

                    ]);

                } else {

                    CattleRegReport::create([
                        'cattle_name' => $this->data->cattle_name,
                        'cow_with_owner' => $this->data->cow_with_owner,
                        'verification_report' => "server currently busy, please try again later",
                        'user_id' => $this->user->id,
                        'cattle_id' => $this->data->id,
                        'operation' => 'claim'

                    ]);

//                    session()->flash("error", "Server error");
                }

            } else {
                // Handle API error, e.g., log or throw an exception
                // You can access the response content with $response->body()
                // and the status code with $response->status()
                return "Error";
            }
        } catch (ConnectionException $e) {
            // Handle exceptions, e.g., connection issues or timeouts
            // Log or rethrow the exception as needed
            CattleRegReport::create([
                'cattle_name' => $this->data->cattle_name,
                'cow_with_owner' => $this->data->cow_with_owner,
                'verification_report' => "server timeout, please try again later",
                'user_id' => $this->user->id,
                'cattle_id' => $this->data->id,
                'operation' => 'claim'
            ]);

        }
    }
}
