@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto animate__animated animate__fadeIn">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-amber-600 px-6 py-4 text-white flex justify-between items-center">
            <h2 class="text-xl font-bold">កែប្រែព័ត៌មានសិស្ស៖ {{ $student->khmername ?? 'ឈ្មោះសិស្ស' }}</h2>
            <span class="bg-amber-700/50 px-3 py-1 rounded text-xs uppercase">{{ $student->stuno ?? 'STU-001' }}</span>
        </div>

        {{-- បានកែប្រែ៖ ប្តូរលេខ 1 ទៅជា $student->id ដើម្បីឱ្យកែប្រែចំសិស្សម្នាក់ៗ --}}
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="flex items-center gap-4 bg-amber-50/50 p-4 rounded-xl border border-amber-100/70">
                {{-- បានកែប្រែ៖ ប្លុកឆែកលក្ខខណ្ឌបង្ហាញរូបភាពដើម្បីកុំឱ្យដាច់រូបភាពលើ Vercel --}}
                @if($student->photo)
                @if(str_starts_with($student->photo, 'http://') || str_starts_with($student->photo, 'https://'))
                <img src="{{ $student->photo }}" alt="Current Photo" class="w-16 h-16 rounded-lg object-cover ring-4 ring-white shadow">
                @else
                <img src="{{ asset('storage/' . $student->photo) }}" alt="Current Photo" class="w-16 h-16 rounded-lg object-cover ring-4 ring-white shadow">
                @endif
                @else
                <img src="https://placehold.co/150x150" alt="Current Photo" class="w-16 h-16 rounded-lg object-cover ring-4 ring-white shadow">
                @endif

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ប្តូររូបថតថ្មី</label>
                    <input type="file" name="photo" class="text-sm text-gray-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200 cursor-pointer">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ឈ្មោះខ្មែរ</label>
                    <input type="text" name="khmername" value="{{ $student->khmername ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ឈ្មោះអង់គ្លេស</label>
                    <input type="text" name="englishname" value="{{ $student->englishname ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">សញ្ជាតិ</label>
                    <input type="text" name="nation" value="{{ $student->nation ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">សាសនា</label>
                    <input type="text" name="religion" value="{{ $student->religion ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">លេខទូរស័ព្ទ</label>
                    <input type="text" name="phone" value="{{ $student->phone ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">អាសយដ្ឋាន</label>
                    <input type="text" name="address" value="{{ $student->address ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ខេត្ត/ក្រុង</label>
                    <input type="text" name="province" value="{{ $student->province ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ស្រុក/ខណ្ឌ</label>
                    <input type="text" name="district" value="{{ $student->district ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ឃុំ/សង្កាត់</label>
                    <input type="text" name="commune" value="{{ $student->commune ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ភូមិ</label>
                    <input type="text" name="village" value="{{ $student->village ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">សុខភាព</label>
                    <input type="text" name="healthy" value="{{ $student->healthy ?? '' }}" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ស្ថានភាពគ្រួសារ</label>
                    <select name="marital_status" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">
                        <option value="">ជ្រើសរើស</option>
                        <option value="នៅលីវ" {{ (isset($student) && $student->marital_status == 'នៅលីវ') ? 'selected' : '' }}>នៅលីវ</option>
                        <option value="រៀបការរួច" {{ (isset($student) && $student->marital_status == 'រៀបការរួច') ? 'selected' : '' }}>រៀបការរួច</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">ប្រវត្តិ</label>
                    <textarea name="history" rows="3" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-amber-500 focus:ring-amber-200">{{ $student->history ?? '' }}</textarea>
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                <a href="{{ route('students.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition">បោះបង់</a>
                <button type="submit" class="px-5 py-2 text-sm font-medium text-white bg-amber-600 rounded-lg hover:bg-amber-700 shadow-md transition duration-300">ធ្វើបច្ចុប្បន្នភាព</button>
            </div>
        </form>
    </div>
</div>
@endsection
