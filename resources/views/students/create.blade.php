@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto animate__animated animate__slideInUp">
    <a href="{{ route('students.index') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-indigo-600 mb-4 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        ត្រឡប់ទៅបញ្ជីឈ្មោះ
    </a>

    {{-- បានបន្ថែម៖ ប្លុកបង្ហាញ Error ថ្មី មិនប៉ះពាល់ដល់ទំហំ Form --}}
    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl animate__animated animate__fadeIn">
        <div class="flex items-center gap-2 text-red-800 font-bold mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>សូមពិនិត្យមើលចំណុចខ្វះខាតខាងក្រោម៖</span>
        </div>
        <ul class="list-disc pl-5 text-sm text-red-600 space-y-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-indigo-900 px-6 py-4 text-white">
            <h2 class="text-xl font-bold">ទម្រង់ចុះឈ្មោះសិស្សថ្មី</h2>
        </div>

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            {{-- ១. ព័ត៌មានផ្ទាល់ខ្លួនសិស្ស --}}
            <div>
                <h3 class="text-md font-semibold text-indigo-900 border-b border-indigo-100 pb-2 mb-4">១. ព័ត៌មានផ្ទាល់ខ្លួនសិស្ស</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

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
                        <input type="text" name="nation" value="ខ្មែរ" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">សាសនា</label>
                        <input type="text" name="religion" value="ព្រះពុទ្ធ" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">រូបថតសិស្ស</label>
                        <input type="file" name="photo" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                    </div>
                </div>
            </div>

            {{-- ២. ព័ត៌មានសិក្សា និងអាណាព្យាបាល --}}
            <div>
                <h3 class="text-md font-semibold text-indigo-900 border-b border-indigo-100 pb-2 mb-4">២. ព័ត៌មានសិក្សា និងអាណាព្យាបាល</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">បន្ទប់/ថ្នាក់</label>
                        <select name="room" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                            <option value="">បន្ទប់ថ្នាក់</option>
                            <option value="101">101</option>
                            <option value="102">102</option>
                            <option value="103">103</option>
                            <option value="104">104</option>
                            <option value="105">105</option>
                            <option value="106">106</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">វេនសិក្សា</label>
                        <select name="session" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                            <option value="">ជ្រើសរើសវេន</option>
                            <option value="ព្រឹក">វេនព្រឹក</option>
                            <option value="រសៀល">វេនរសៀល</option>
                            <option value="ល្ងាច">វេនល្ងាច/យប់</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">មុខវិជ្ជា</label>
                        <select name="subject" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                            <option value="">ជ្រើសរើសមុខវិជ្ជា/ជំនាញ</option>
                            <option value="ចំណេះដឹងទូទៅ">ចំណេះដឹងទូទៅ</option>
                            <option value="ភាសាអង់គ្លេស">ភាសាអង់គ្លេស</option>
                            <option value="ព័ត៌មានវិទ្យា">ព័ត៌មានវិទ្យា</option>
                        </select>
                    </div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">គ្រូបន្ទុកថ្នាក់</label><input type="text" name="teacher" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">ឈ្មោះឪពុក</label><input type="text" name="fathername" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">ឈ្មោះម្តាយ</label><input type="text" name="mothername" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                </div>
            </div>

            {{-- ៣. ព័ត៌មានផ្សេងៗ --}}
            <div>
                <h3 class="text-md font-semibold text-indigo-900 border-b border-indigo-100 pb-2 mb-4">៣. ព័ត៌មានផ្សេងៗ</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">លេខទូរស័ព្ទ</label><input type="text" name="phone" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">អាសយដ្ឋាន (ផ្ទះ/ផ្លូវ)</label><input type="text" name="address" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50" placeholder="ផ្ទះលេខ... ផ្លូវលេខ..."></div>

                    {{-- ខេត្ត/ក្រុង --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ខេត្ត/ក្រុង</label>
                        <select name="province" id="province" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition">
                            <option value="">ជ្រើសរើសខេត្ត/ក្រុង</option>
                            @isset($provinces)
                            @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                            @else
                            <option value="1">ភ្នំពេញ</option>
                            <option value="2">កណ្តាល</option>
                            <option value="3">សៀមរាប</option>
                            <option value="4">ព្រះសីហនុ</option>
                            <option value="5">បាត់ដំបង</option>
                            @endisset
                        </select>
                    </div>

                    {{-- ស្រុក/ខណ្ឌ --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ស្រុក/ខណ្ឌ</label>
                        <select name="district" id="district" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition" disabled>
                            <option value="">ជ្រើសរើសស្រុក/ខណ្ឌ</option>
                        </select>
                    </div>

                    {{-- ឃុំ/សង្កាត់ --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ឃុំ/សង្កាត់</label>
                        <select name="commune" id="commune" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition" disabled>
                            <option value="">ជ្រើសរើសឃុំ/សង្កាត់</option>
                        </select>
                    </div>

                    {{-- ភូមិ --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ភូមិ</label>
                        <select name="village" id="village" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50 transition" disabled>
                            <option value="">ជ្រើសរើសភូមិ</option>
                        </select>
                    </div>

                    <div><label class="block text-sm font-medium text-gray-700 mb-1">សុខភាព</label><input type="text" name="healthy" class="w-full rounded-lg border-gray-200 p-2.5 text-sm focus:border-indigo-500 focus:ring-indigo-200 bg-gray-50" value="ធម្មតា"></div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinceSelect = document.getElementById('province');
        const districtSelect = document.getElementById('district');
        const communeSelect = document.getElementById('commune');
        const villageSelect = document.getElementById('village');

        // ១. ពេលផ្លាស់ប្តូរ ខេត្ត
        provinceSelect.addEventListener('change', function() {
            const provinceId = this.value;

            districtSelect.innerHTML = '<option value="">ជ្រើសរើសស្រុក/ខណ្ឌ</option>';
            communeSelect.innerHTML = '<option value="">ជ្រើសរើសឃុំ/សង្កាត់</option>';
            villageSelect.innerHTML = '<option value="">ជ្រើសរើសភូមិ</option>';
            communeSelect.disabled = true;
            villageSelect.disabled = true;

            if (provinceId) {
                fetch(`/get-districts/${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(district => {
                            districtSelect.innerHTML += `<option value="${district.id}">${district.name}</option>`;
                        });
                        districtSelect.disabled = false;
                    });
            } else {
                districtSelect.disabled = true;
            }
        });

        // ២. ពេលផ្លាស់ប្តូរ ស្រុក
        districtSelect.addEventListener('change', function() {
            const districtId = this.value;
            communeSelect.innerHTML = '<option value="">ជ្រើសរើសឃុំ/សង្កាត់</option>';
            villageSelect.innerHTML = '<option value="">ជ្រើសរើសភូមិ</option>';
            villageSelect.disabled = true;

            if (districtId) {
                fetch(`/get-communes/${districtId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(commune => {
                            communeSelect.innerHTML += `<option value="${commune.id}">${commune.name}</option>`;
                        });
                        communeSelect.disabled = false;
                    });
            } else {
                communeSelect.disabled = true;
            }
        });

        // ៣. ពេលផ្លាស់ប្តូរ ឃុំ
        communeSelect.addEventListener('change', function() {
            const communeId = this.value;
            villageSelect.innerHTML = '<option value="">ជ្រើសរើសភូមិ</option>';

            if (communeId) {
                fetch(`/get-villages/${communeId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(village => {
                            villageSelect.innerHTML += `<option value="${village.id}">${village.name}</option>`;
                        });
                        villageSelect.disabled = false;
                    });
            } else {
                villageSelect.disabled = true;
            }
        });
    });

</script>
@endsection
