<?php

namespace App\Jobs\Farmer;

use App\Models\CattleRegReport;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\ConnectionException;


class CattleRegistrationProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $basename;
    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $basename, $user)
    {
        $this->data = $data;
        $this->basename = $basename;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return string
     */
    public function handle()
    {

        $data = $this->data;
        $basename = $this->basename;
        $options = 'registration';
        $apiUrl = "http://13.232.34.224/cattle_identification";
        Log::info($data['cattle_name']);

        $cattle_name = $data['cattle_name'];
        $cow_with_owner = $data['cow_with_owner'];

        CattleRegReport::create([
            'cattle_name' => $cattle_name,
            'cow_with_owner' => $cow_with_owner,
            'verification_report' => "processing",
            'user_id' => $this->user->id
        ]);

        try {
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $basename)),
                basename($basename) // File name to use in the request
            )->post($apiUrl, ['options' => $options]);

            if ($response->status() == 200) {

                $apiResponse = $response->json('output');

                if ($apiResponse == "Success") {

                    $output = $this->user->cattleRegister()->create($data);

                    CattleRegReport::create([
                        'cattle_name' => $cattle_name,
                        'cow_with_owner' => $cow_with_owner,
                        'verification_report' => "success",
                        'user_id' => $this->user->id
                    ]);

                    Log::info("Success");

                } elseif ($apiResponse == "Failed") {

                    CattleRegReport::create([
                        'cattle_name' => $cattle_name,
                        'cow_with_owner' => $cow_with_owner,
                        'verification_report' => "failed",
                        'user_id' => $this->user->id
                    ]);

                    Log::info("failed");
                } else {

                    CattleRegReport::create([
                        'cattle_name' => $cattle_name,
                        'cow_with_owner' => $cow_with_owner,
                        'verification_report' => "server currently busy, please try again later",
                        'user_id' => $this->user->id
                    ]);

                    Log::info("Server Error");
                }

            } else {

                Log::info("Error");
            }
        } catch (ConnectionException $e) {

            CattleRegReport::create([
                'cattle_name' => $cattle_name,
                'cow_with_owner' => $cow_with_owner,
                'verification_report' => "server timeout, please try later",
                'user_id' => $this->user->id
            ]);

            Log::info("Catch Exception");
        }


    }
}
