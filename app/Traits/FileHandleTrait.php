<?php
namespace App\Traits;

trait FileHandleTrait
{

    protected function fileDelete($filepath, $fileName){

        if($fileName && !config('database.connections.saleprosass_landlord') && file_exists( 'public/'.$filepath . $fileName)){
            unlink( 'public/' . $filepath . $fileName);
        }elseif($fileName && file_exists($filepath . $fileName)){
            unlink( $filepath . $fileName);
        }
    }
}
