<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http; // គន្លឹះសំខាន់៖ ត្រូវមាន Class នេះសម្រាប់ហៅទៅ API

class StudentController extends Controller
{
    // ទំព័របង្ហាញបញ្ជីឈ្មោះសិស្សទាំងអស់ (Index)
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    // ទំព័របង្ហាញទម្រង់សម្រាប់ចុះឈ្មោះសិស្សថ្មី (Create)
    public function create()
    {
        $provinces = DB::table('provinces')->get();

        // គណនាបង្កើតអត្តលេខទុកជាមុនសម្រាប់គ្រាន់តែបង្ហាញលើ Form ឱ្យសិស្សមើលឃើញ
        $currentYear = date('Y');
        $lastStudent = Student::where('stuno', 'LIKE', "STU-{$currentYear}-%")->latest('id')->first();
        $nextNumber = $lastStudent ? ((int) substr($lastStudent->stuno, -4)) + 1 : 1;
        $autoID = 'STU-' . $currentYear . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        return view('students.create', compact('provinces', 'autoID'));
    }

    // មុខងារទទួលទិន្នន័យពី Form រួចរក្សាទុកក្នុង Database (Store)
    public function store(Request $request)
    {
        // ធ្វើការ Validate ទិន្នន័យជាមុនសិន
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // --- កូដបង្កើតអត្តលេខសិស្ស Auto ឡើងវិញពេលចុច Save ដើម្បីការពារការខកខានតម្លៃពី Form ---
        $currentYear = date('Y');
        $lastStudent = Student::where('stuno', 'LIKE', "STU-{$currentYear}-%")->latest('id')->first();
        $nextNumber = $lastStudent ? ((int) substr($lastStudent->stuno, -4)) + 1 : 1;
        $newStuNo = 'STU-' . $currentYear . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // ញាត់អត្តលេខចូលទៅក្នុង Array ទិន្នន័យ
        $data['stuno'] = $newStuNo;
        // --------------------------------------------------------------------------------

        // ពិនិត្យមើលថាតើមានការជ្រើសរើសរូបភាពដែរឬទេ
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            // ១. បំប្លែងរូបភាពទៅជា Base64
            $imageData = base64_encode(file_get_contents($image->path()));

            // ២. ផ្ញើរូបភាពទៅកាន់ FreeImage API 
            $response = Http::asForm()->post('https://freeimage.host/api/1/upload', [
                'key' => env('FREEIMAGE_API_KEY'),
                'source' => $imageData,
                'format' => 'json'
            ]);

            // ៣. បើផ្ញើទៅ Cloud ជោគជ័យ យក Link មកជំនួសឈ្មោះ File
            if ($response->successful()) {
                $data['photo'] = $response->json()['image']['url'];
            } else {
                return back()->withErrors(['photo' => 'មិនអាច Upload រូបភាពទៅកាន់ Cloud បានឡើយ។ សូមព្យាយាមម្តងទៀត!'])->withInput();
            }
        }

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'បានរក្សាទុកទិន្នន័យដោយជោគជ័យ! អត្តលេខសិស្សគឺ៖ ' . $newStuNo);
    }

    // ទំព័របង្ហាញព័ត៌មានលម្អិតរបស់សិស្សម្នាក់ (Show)
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // ទំព័របង្ហាញទម្រង់សម្រាប់កែប្រែព័ត៌មានសិស្ស (Edit)
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // មុខងារធ្វើបច្ចុប្បន្នភាពទិន្នន័យដែលកែប្រែរួច (Update)
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // ពិនិត្យមើលថាតើមានការជ្រើសរើសរូបភាពថ្មីដើម្បីដូរដែរឬទេ
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            // ១. បំប្លែងរូបភាពថ្មីទៅជា Base64
            $imageData = base64_encode(file_get_contents($image->path()));

            // ២. ផ្ញើរូបភាពថ្មីទៅកាន់ FreeImage API 
            $response = Http::asForm()->post('https://freeimage.host/api/1/upload', [
                'key' => env('FREEIMAGE_API_KEY'),
                'source' => $imageData,
                'format' => 'json'
            ]);

            if ($response->successful()) {
                $data['photo'] = $response->json()['image']['url'];
            } else {
                return back()->withErrors(['photo' => 'មិនអាច ប្តូររូបភាពថ្មីទៅកាន់ Cloud បានឡើយ។'])->withInput();
            }
        } else {
            // បើអត់ជ្រើសរូបភាពថ្មីទេ រក្សារូបភាពចាស់ដែលមានក្នុង DB ដដែល
            $data['photo'] = $student->photo;
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'បានធ្វើបច្ចុប្បន្នភាពទិន្នន័យដោយជោគជ័យ!');
    }

    // មុខងារសម្រាប់លុបទិន្នន័យសិស្ស (Destroy)
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'បានលុបទិន្នន័យរួចរាល់!');
    }
}
