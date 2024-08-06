<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Sushi\Sushi;

class ReportFile extends Model
{
    use HasFactory;
    use Sushi;

    public function getRows(): array
    {
        $files = Storage::disk('local')->allFiles();

        $rows = Arr::map($files, function (string $value, string $key) {
            $size = Storage::disk('local')->size($value);
            $date = Storage::disk('local')->lastModified($value);

            return [
                'name' => $value,
                'date' => $date,
                'size' => $size,
            ];
        });

        return $rows;
    }
}
