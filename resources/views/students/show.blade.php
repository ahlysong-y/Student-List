@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="md:col-span-1 bg-white rounded-xl shadow-md border border-gray-100 p-6 text-center animate__animated animate__fadeInLeft">
        <div class="relative inline-block mb-4">
            @if($student->photo)
                <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" class="w-32 h-32 rounded-full mx-auto object-cover ring-4 ring-indigo-50 shadow-md">
            @else
                <img src="https://via.placeholder.com/150" alt="Student Photo" class="w-32 h-32 rounded-full mx-auto object-cover ring-4 ring-indigo-50 shadow-md">
            @endif
            <span class="absolute bottom-1 right-2 bg-green-500 text-white text-xs px-2 py-0.5 rounded-full border-2 border-white">សកម្ម</span>
        </div>
        <h2 class="text-xl font-bold text-gray-800">{{ $student->khmername }}</h2>
        <p class="text-sm text-gray-500 uppercase tracking-wider font-medium">{{ $student->englishname }}</p>
        <span class="inline-block mt-2 px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-semibold rounded-full">ID: {{ $student->stuno }}</span>

        <hr class="my-4 border-gray-100">

        <div class="text-left space-y-2 text-sm text-gray-600">
            <p class="flex items-center gap-2"><strong class="text-gray-800">ថ្នាក់៖</strong> {{ $student->room }}</p>
            <p class="flex items-center gap-2"><strong class="text-gray-800">វេន៖</strong> {{ $student->session }}</p>
            <p class="flex items-center gap-2"><strong class="text-gray-800">ទូរស័ព្ទ៖</strong> {{ $student->phone }}</p>
        </div>
    </div>

    <div class="md:col-span-2 bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden animate__animated animate__fadeInRight">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-gray-700 text-lg">ព័ត៌មានប្រវត្តិរូបសិស្ស</h3>
            <a href="{{ route('students.edit', $student->id) }}" class="text-sm bg-amber-50 text-amber-700 hover:bg-amber-100 px-3 py-1.5 rounded-lg border border-amber-200 transition">កែប្រែប្រវត្តិរូប</a>
        </div>

        <div class="p-6 space-y-6">
            <div>
                <h4 class="text-indigo-900 font-semibold text-sm mb-3"># ព័ត៌មានផ្ទាល់ខ្លួន និងសង្គម</h4>
                <div class="grid grid-cols-2 gap-4 text-sm bg-slate-50 p-4 rounded-xl">
                    <div><span class="text-gray-500 block">ថ្ងៃខែឆ្នាំកំណើត៖</span> <span class="font-medium text-gray-800">{{ $student->birthdate ? $student->birthdate->format('d-m-Y') : 'N/A' }}</span></div>
                    <div><span class="text-gray-500 block">សញ្ជាតិ/សាសនា៖</span> <span class="font-medium text-gray-800">{{ $student->nation }} / {{ $student->religion }}</span></div>
                    <div><span class="text-gray-500 block">ស្ថានភាពគ្រួសារ៖</span> <span class="font-medium text-gray-800">{{ $student->marital_status }}</span></div>
                    <div><span class="text-gray-500 block">សុខភាព៖</span> <span class="font-medium text-gray-800">{{ $student->healthy }}</span></div>
                </div>
            </div>

            <div>
                <h4 class="text-indigo-900 font-semibold text-sm mb-3"># អាសយដ្ឋានបច្ចុប្បន្ន</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm bg-slate-50 p-4 rounded-xl">
                    <div><span class="text-gray-500 block">ខេត្ត/ក្រុង៖</span> <span class="font-medium text-gray-800">{{ $student->province }}</span></div>
                    <div><span class="text-gray-500 block">ស្រុក/ខណ្ឌ៖</span> <span class="font-medium text-gray-800">{{ $student->district }}</span></div>
                    <div><span class="text-gray-500 block">ឃុំ/សង្កាត់៖</span> <span class="font-medium text-gray-800">{{ $student->commune }}</span></div>
                    <div><span class="text-gray-500 block">ភូមិ៖</span> <span class="font-medium text-gray-800">{{ $student->village }}</span></div>
                </div>
                <div class="mt-2 text-sm px-4 text-gray-700"><strong>លម្អិត៖</strong> {{ $student->address }}</div>
            </div>

            <div>
                <h4 class="text-indigo-900 font-semibold text-sm mb-2"># ប្រវត្តិសិក្សា/កំណត់ចំណាំ</h4>
                <div class="bg-indigo-50/40 p-4 rounded-xl text-sm text-gray-700 leading-relaxed border border-indigo-50">
                    {{ $student->history ?? 'គ្មានកំណត់ចំណាំ' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
