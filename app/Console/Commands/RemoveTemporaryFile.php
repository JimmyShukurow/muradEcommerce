<?php

namespace App\Console\Commands;

use App\Models\TemporaryFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RemoveTemporaryFile extends Command
{

    protected $signature = 'remove:temp';

    protected $description = 'Removes temporary images file';

    public function handle()
    {
        $temps = TemporaryFile::all();
        foreach($temps as $temp){
            if($temp->updated_at->diffInSeconds(now()) > 24){
                unlink(storage_path('app/public/images/temp/'.$temp->folder.'/'.$temp->filename));
                rmdir(storage_path('app/public/images/temp/'.$temp->folder));
                $temp->delete();
            }
          
        }
        rmdir(storage_path('app/public/images/temp'));
        rmdir(storage_path('app/public/images'));
      
        

    }
}
