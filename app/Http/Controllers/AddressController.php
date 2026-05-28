<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    /**
     * ទាញយកទិន្នន័យស្រុក/ខណ្ឌ ផ្អែកលើលេខសម្គាល់ខេត្ត
     */
    public function getDistricts(int $province_id): JsonResponse
    {
        // ស្វែងរកស្រុកណាដែលមាន province_id ដូចការជ្រើសរើស
        $districts = DB::table('districts')->where('province_id', $province_id)->get();
        return response()->json($districts);
    }

    /**
     * ទាញយកទិន្នន័យឃុំ/សង្កាត់ ផ្អែកលើលេខសម្គាល់ស្រុក
     */
    public function getCommunes(int $district_id): JsonResponse
    {
        $communes = DB::table('communes')->where('district_id', $district_id)->get();
        return response()->json($communes);
    }

    /**
     * ទាញយកទិន្នន័យភូមិ ផ្អែកលើលេខសម្គាល់ឃុំ
     */
    public function getVillages(int $commune_id): JsonResponse
    {
        $villages = DB::table('villages')->where('commune_id', $commune_id)->get();
        return response()->json($villages);
    }
}
