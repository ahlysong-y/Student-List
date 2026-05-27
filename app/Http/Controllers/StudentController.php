<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

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
        return view('students.create');
    }

    // មុខងារទទួលទិន្នន័យពី Form រួចរក្សាទុកក្នុង Database (Store)
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('students', 'public');
        }

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'បានរក្សាទុកទិន្នន័យដោយជោគជ័យ!');
    }

    // ទំព័របង្ហាញព័ត៌មានលម្អិតរបស់សិស្សម្នាក់ (Show)
    // កែប្រែពី ($id) មកជា (Student $student)
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // ទំព័របង្ហាញទម្រង់សម្រាប់កែប្រែព័ត៌មានសិស្ស (Edit)
    // កែប្រែពី ($id) មកជា (Student $student)
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // មុខងារធ្វើបច្ចុប្បន្នភាពទិន្នន័យដែលកែប្រែរួច (Update)
    // កែប្រែពី ($id) មកជា (Student $student)
    public function update(Request $request, Student $student)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'បានធ្វើបច្ចុប្បន្នភាពទិន្នន័យដោយជោគជ័យ!');
    }

    // មុខងារសម្រាប់លុបទិន្នន័យសិស្ស (Destroy)
    // កែប្រែពី ($id) មកជា (Student $student)
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'បានលុបទិន្នន័យរួចរាល់!');
    }
}
