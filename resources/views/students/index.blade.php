@extends('layouts.app')

@section('content')
<div class="animate__animated animate__fadeIn">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-indigo-900">បញ្ជីឈ្មោះសិស្ស</h1>
            <p class="text-sm text-gray-500">គ្រប់គ្រង និងមើលព័ត៌មានលម្អិតរបស់សិស្សទាំងអស់</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <!-- Export Buttons -->
            <button onclick="window.print()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg shadow-sm transition border border-gray-200 flex items-center gap-1 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                Print
            </button>
            <button onclick="exportToExcel()" class="bg-green-50 hover:bg-green-100 text-green-700 px-3 py-2 rounded-lg shadow-sm transition border border-green-200 flex items-center gap-1 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                Excel
            </button>
            <button onclick="exportToWord()" class="bg-blue-50 hover:bg-blue-100 text-blue-700 px-3 py-2 rounded-lg shadow-sm transition border border-blue-200 flex items-center gap-1 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                Word
            </button>
            <button onclick="exportToPDF()" class="bg-red-50 hover:bg-red-100 text-red-700 px-3 py-2 rounded-lg shadow-sm transition border border-red-200 flex items-center gap-1 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                PDF
            </button>

            <!-- Create Button -->
            <a href="{{ route('students.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow transition duration-300 ease-in-out transform hover:-translate-y-0.5 flex items-center gap-2 ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                ចុះឈ្មោះសិស្សថ្មី
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table id="studentsTable" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-indigo-50/70 text-indigo-900 text-sm whitespace-nowrap">
                        <th class="p-4 font-semibold">រូបថត</th>
                        <th class="p-4 font-semibold">អត្តលេខ</th>
                        <th class="p-4 font-semibold">ឈ្មោះខ្មែរ</th>
                        <th class="p-4 font-semibold">ឈ្មោះអង់គ្លេស</th>
                        <th class="p-4 font-semibold">ភេទ</th>
                        <th class="p-4 font-semibold">ថ្ងៃខែឆ្នាំកំណើត</th>
                        <th class="p-4 font-semibold">សញ្ជាតិ</th>
                        <th class="p-4 font-semibold">សាសនា</th>
                        <th class="p-4 font-semibold">ថ្នាក់/វេន</th>
                        <th class="p-4 font-semibold">មុខវិជ្ជា</th>
                        <th class="p-4 font-semibold">គ្រូបន្ទុកថ្នាក់</th>
                        <th class="p-4 font-semibold">ប្រវត្តិ</th>
                        <th class="p-4 font-semibold">លេខទូរស័ព្ទ</th>
                        <th class="p-4 font-semibold">អាសយដ្ឋាន</th>
                        <th class="p-4 font-semibold">ខេត្ត/ក្រុង</th>
                        <th class="p-4 font-semibold">ស្រុក/ខណ្ឌ</th>
                        <th class="p-4 font-semibold">ឃុំ/សង្កាត់</th>
                        <th class="p-4 font-semibold">ភូមិ</th>
                        <th class="p-4 font-semibold">ឈ្មោះឪពុក</th>
                        <th class="p-4 font-semibold">ឈ្មោះម្តាយ</th>
                        <th class="p-4 font-semibold">សុខភាព</th>
                        <th class="p-4 font-semibold">ស្ថានភាពគ្រួសារ</th>
                        <th class="p-4 font-semibold text-center sticky right-0 bg-indigo-50/70 z-10 border-l border-indigo-100">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($students as $student)
                    <tr class="hover:bg-slate-50/80 transition duration-200">
                        <td class="p-4 whitespace-nowrap">
                            @if($student->photo)
                            {{-- ពិនិត្យថាបើឈ្មោះរូបភាពមានពាក្យ http គឺវាជាលីង URL របស់ FreeImage ស្រាប់ ហៅមកចំៗតែម្តង --}}
                            @if(str_starts_with($student->photo, 'http://') || str_starts_with($student->photo, 'https://'))
                            <img src="{{ $student->photo }}" alt="Photo" class="w-10 h-10 rounded-full object-cover ring-2 ring-indigo-100">
                            @else
                            {{-- ករណីនេះសម្រាប់រូបភាពចាស់ៗដែលនៅក្នុង storage ម៉ាស៊ីន (បើមាន) --}}
                            <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo" class="w-10 h-10 rounded-full object-cover ring-2 ring-indigo-100">
                            @endif
                            @else
                            <img src="https://placehold.co/150x150" alt="Default Photo" class="w-10 h-10 rounded-full object-cover ring-2 ring-indigo-100">
                            @endif
                        </td>
                        <td class="p-4 font-semibold text-gray-700 whitespace-nowrap">{{ $student->stuno }}</td>
                        <td class="p-4 text-gray-900 whitespace-nowrap">{{ $student->khmername }}</td>
                        <td class="p-4 text-gray-600 uppercase text-xs font-medium whitespace-nowrap">{{ $student->englishname }}</td>
                        <td class="p-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $student->gender == 'ប្រុស' ? 'bg-blue-50 text-blue-700' : 'bg-pink-50 text-pink-700' }}">{{ $student->gender }}</span>
                        </td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->birthdate ? (is_string($student->birthdate) ? \Carbon\Carbon::parse($student->birthdate)->format('d/m/Y') : $student->birthdate->format('d/m/Y')) : '' }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->nation }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->religion }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">បន្ទប់ {{ $student->room }} ({{ $student->session }})</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->subject }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->teacher }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->history }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->phone }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->address }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->province }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->district }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->commune }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->village }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->fathername }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->mothername }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->healthy }}</td>
                        <td class="p-4 text-sm text-gray-600 whitespace-nowrap">{{ $student->marital_status }}</td>
                        <td class="p-4 text-center sticky right-0 bg-white group-hover:bg-slate-50/80 transition duration-200 z-10 border-l border-gray-100">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('students.show', $student->id) }}" class="p-1.5 text-gray-500 hover:text-indigo-600 rounded-lg hover:bg-indigo-50 transition" title="មើល">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </a>
                                <a href="{{ route('students.edit', $student->id) }}" class="p-1.5 text-gray-500 hover:text-amber-600 rounded-lg hover:bg-amber-50 transition" title="កែប្រែ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline-block" onsubmit="return confirm('តើអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនទេ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-gray-500 hover:text-red-600 rounded-lg hover:bg-red-50 transition" title="លុប">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="23" class="p-8 text-center text-gray-500">មិនមានទិន្នន័យសិស្សនៅឡើយទេ</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include Export Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
    function getCleanTable() {
        let table = document.getElementById("studentsTable").cloneNode(true);
        let rows = table.rows;
        for (let i = 0; i < rows.length; i++) {
            if (rows[i].cells.length > 0) {
                rows[i].deleteCell(-1); // Delete the last cell (actions)
            }
        }
        return table;
    }

    function exportToExcel() {
        let table = getCleanTable();
        let wb = XLSX.utils.table_to_book(table, {
            sheet: "Students"
        });
        XLSX.writeFile(wb, "students_list.xlsx");
    }

    function exportToWord() {
        let header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Students List</title><style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid black; padding: 8px; text-align: left; }</style></head><body>";
        let footer = "</body></html>";
        let table = getCleanTable();
        let sourceHTML = header + table.outerHTML + footer;

        let source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        let fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'students_list.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }

    function exportToPDF() {
        let tableContainer = document.createElement('div');
        let table = getCleanTable();
        table.style.width = '100%';
        table.style.borderCollapse = 'collapse';
        table.querySelectorAll('th, td').forEach(cell => {
            cell.style.border = '1px solid #ddd';
            cell.style.padding = '8px';
            cell.style.fontSize = '12px';
            cell.style.textAlign = 'left';
        });

        // Add a title
        let title = document.createElement('h2');
        title.innerText = 'បញ្ជីឈ្មោះសិស្ស';
        title.style.textAlign = 'center';
        title.style.fontFamily = 'sans-serif';
        tableContainer.appendChild(title);
        tableContainer.appendChild(table);

        let opt = {
            margin: 0.3
            , filename: 'students_list.pdf'
            , image: {
                type: 'jpeg'
                , quality: 0.98
            }
            , html2canvas: {
                scale: 2
                , useCORS: true
            }
            , jsPDF: {
                unit: 'in'
                , format: 'a3'
                , orientation: 'landscape'
            }
        };

        html2pdf().set(opt).from(tableContainer).save();
    }

</script>
@endsection
