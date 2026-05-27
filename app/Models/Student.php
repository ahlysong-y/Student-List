<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // កំណត់ឈ្មោះ Table (ក្នុងករណី Laravel មិនស្គាល់ស្វ័យប្រវត្តិ)
    protected $table = 'students';

    // អនុញ្ញាតឱ្យបញ្ចូលទិន្នន័យទៅលើ Columns ទាំងនេះតាមរយៈ Form
    protected $fillable = [
        'stuno',
        'khmername',
        'englishname',
        'gender',
        'birthdate',
        'nation',
        'religion',
        'room',
        'session',
        'subject',
        'teacher',
        'history',
        'phone',
        'address',
        'province',
        'district',
        'commune',
        'village',
        'fathername',
        'mothername',
        'healthy',
        'marital_status',
        'photo',
    ];

    // កំណត់ប្រភេទជម្រើសទិន្នន័យសម្រាប់ថ្ងៃខែឆ្នាំកំណើត (Optional)
    protected $casts = [
        'birthdate' => 'date',
    ];
}
