<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = [array(
            'title' => 'Photo 1',
            'description' => 'This is description for Photo 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '/img/home-office-336373_1920.jpg',
            'uploaded_employee_id' => 1
        ), array(
            'title' => 'Photo 2',
            'description' => 'This is description for Photo 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '/img/office-620822_1920.jpg',
            'uploaded_employee_id' => 2
        ),
        array(
            'title' => 'Photo 3',
            'description' => 'This is description for Photo 3. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '{{getStatic({{getStatic(/img/plastic-1.jpeg}}}}',
            'uploaded_employee_id' => 3
        ),
        array(
            'title' => 'Photo 4',
            'description' => 'This is description for Photo 4. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '{{getStatic(/img/plastic-1.jpeg}}',
            'uploaded_employee_id' => 3
        ),
        array(
            'title' => 'Photo 5',
            'description' => 'This is description for Photo 5. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '{{getStatic(/img/plastic-1.jpeg}}',
            'uploaded_employee_id' => 3
        ),
        array(
            'title' => 'Photo 6',
            'description' => 'This is description for Photo 6. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '{{getStatic(/img/plastic-1.jpeg}}',
            'uploaded_employee_id' => 3
        ),
        array(
            'title' => 'Photo 7',
            'description' => 'This is description for Photo 7. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '{{getStatic(/img/plastic-1.jpeg}}',
            'uploaded_employee_id' => 3
        ),
        array(
            'title' => 'Photo 8',
            'description' => 'This is description for Photo 8. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '{{getStatic(/img/plastic-1.jpeg}}',
            'uploaded_employee_id' => 3
        ),
        array(
            'title' => 'Photo 9',
            'description' => 'This is description for Photo 9. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
            'path' => '{{getStatic(/img/plastic-1.jpeg}}',
            'uploaded_employee_id' => 3
        )
        ];
        foreach ($photos as $photo) {
            DB::table('galleries')->insert($photo);
        }
    }
}
