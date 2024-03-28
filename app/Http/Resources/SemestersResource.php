<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\AcademicYearResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SemestersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'start_month' => $this->start_month,
            'end_month' => $this->end_month,
            'academic_year_id' => $this->academic_year_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'academic_year' => $this->whenLoaded('academicYear', function () {
                return $this->academicYear->academic_year;
            }),
        ];
    }
}
