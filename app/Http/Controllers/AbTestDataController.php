<?php

namespace App\Http\Controllers;


use App\Models\AbTestData;

class AbTestDataController extends Controller {
    public function showData() {
        $allRows = AbTestData::all();
        echo '<ol>';
        foreach ($allRows as $row){
            echo "<li>id: {$row['id']}, data: {$row['ab_testname']}</li>";
        }
    }
}
