<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

try {
    echo "Starting Manual Seed...\n";

    // 1. Members
    $memberId = 'M001';
    // SHA256 of 'password'
    $pass = hash('sha256', 'password'); 
    
    // Check if exists
    $exists = DB::table('member')->where('member_id', $memberId)->exists();
    if (!$exists) {
        DB::table('member')->insert([
            'member_id' => $memberId,
            'member_name' => 'Manuel Member',
            'gender' => 1,
            'member_type_id' => 1,
            // 'member_status' => 1, // Does not exist
            'mpasswd' => $pass,
            'input_date' => date('Y-m-d'),
            'last_update' => date('Y-m-d'),
            'expire_date' => date('Y-m-d', strtotime('+1 year'))
        ]);
        echo "Member M001 created.\n";
    } else {
        echo "Member M001 already exists.\n";
    }

    // 2. Admin (redundant check)
    $admin = DB::table('user')->where('username', 'admin')->first();
    if ($admin) {
        DB::table('user')->where('username', 'admin')->update([
            'passwd' => Hash::make('admin')
        ]);
        echo "Admin password reset.\n";
    }

    // 3. Dummy Book
    $biblioExists = DB::table('biblio')->where('title', 'Manual Seed Book')->exists();
    if (!$biblioExists) {
        $biblioId = DB::table('biblio')->insertGetId([
            'title' => 'Manual Seed Book',
            'publish_year' => '2024',
            'input_date' => date('Y-m-d'),
            'last_update' => date('Y-m-d'), 
        ]);
        DB::table('item')->insert([
             'biblio_id' => $biblioId,
             'item_code' => 'M-B001',
             'input_date' => date('Y-m-d'),
             'last_update' => date('Y-m-d'),
        ]);
        echo "Book M-B001 created.\n";
    }

    echo "Manual Seed Completed.\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
