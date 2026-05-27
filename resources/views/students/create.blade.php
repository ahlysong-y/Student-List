@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto animate__animated animate__slideInUp">
    <a href="{{ route('students.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-indigo-600 mb-4 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        ត្រឡប់ទៅបញ្ជីឈ្មោះ
    </a>

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-indigo-900 px-6 py-4 text-white">
            <h2 class="text-xl font-bold">ទម្រង់ចុះឈ្មោះសិស្សថ្មី</h2>
        </div>

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <div>
                <h3 class="text-md font-semibold text-indigo-900 border-b border-indigo-100 pb-2 mb-4">១. ព័ត៌មានផ្ទាល់ខ្លួនសិស្ស</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">អត្តលេខសិស្ស *</label>
                        <input type="text" name="stuno" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 focus:bg-white transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ឈ្មោះខ្មែរ *</label>
                        <input type="text" name="khmername" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 focus:bg-white transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ឈ្មោះអង់គ្លេស *</label>
                        <input type="text" name="englishname" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 focus:bg-white transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ភេទ *</label>
                        <select name="gender" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                            <option value="ប្រុស">ប្រុស</option>
                            <option value="ស្រី">ស្រី</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ថ្ងៃខែឆ្នាំកំណើត *</label>
                        <input type="date" name="birthdate" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">សញ្ជាតិ</label>
                        <input type="text" name="nation" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">សាសនា</label>
                        <input type="text" name="religion" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">រូបថតសិស្ស</label>
                        <input type="file" name="photo" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-md font-semibold text-indigo-900 border-b border-indigo-100 pb-2 mb-4">២. ព័ត៌មានសិក្សា និងអាណាព្យាបាល</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">បន្ទប់/ថ្នាក់</label><input type="text" name="room" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">វេនសិក្សា</label><input type="text" name="session" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">មុខវិជ្ជា</label><input type="text" name="subject" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">គ្រូបន្ទុកថ្នាក់</label><input type="text" name="teacher" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">ឈ្មោះឪពុក</label><input type="text" name="fathername" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">ឈ្មោះម្តាយ</label><input type="text" name="mothername" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                </div>
            </div>

            <div>
                <h3 class="text-md font-semibold text-indigo-900 border-b border-indigo-100 pb-2 mb-4">៣. ព័ត៌មានផ្សេងៗ</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">លេខទូរស័ព្ទ</label><input type="text" name="phone" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">អាសយដ្ឋាន</label><input type="text" name="address" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">ខេត្ត/ក្រុង</label><input type="text" name="province" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">ស្រុក/ខណ្ឌ</label><input type="text" name="district" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">ឃុំ/សង្កាត់</label><input type="text" name="commune" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">ភូមិ</label><input type="text" name="village" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">សុខភាព</label><input type="text" name="healthy" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ស្ថានភាពគ្រួសារ</label>
                        <select name="marital_status" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                            <option value="">ជ្រើសរើស</option>
                            <option value="នៅលីវ">នៅលីវ</option>
                            <option value="រៀបការរួច">រៀបការរួច</option>
                        </select>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">ប្រវត្តិ</label>
                        <textarea name="history" rows="3" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition"></textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                <button type="reset" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition">សម្អាត</button>
                <button type="submit" class="px-5 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 shadow-md transition duration-300 transform hover:-translate-y-0.5">រក្សាទុកទិន្នន័យ</button>
            </div>
        </form>
    </div>
</div>
@endsection
