<?php

namespace App\Http\Resources\api\v2\Lesson;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        switch ($this->host) {
            case 'Image':
                $fileUrl = $this->video_url ? (string) asset($this->video_url) : '';
                break;
            default:
                $fileUrl = (string)$this->video_url;
                break;
        }

        return [
            'lesson_id'             => (int) $this->id,
            'course_id'             => (int) $this->course_id,
            'chapter_id'            => (int) $this->chapter_id,
            'lesson_name'           => (string) $this->name,
            'duration'              => (int) $this->duration,
            'host'                  => (string) $this->host,
            'video_url'             => $fileUrl,
            'privacy'               => (int) $this->is_lock,
            'description'           => (string) $this->description,
        ];
    }
}
