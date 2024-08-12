<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class ContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'global',
                'label' => 'Website Title',
                'description' => 'Shown on the home page, as well as any tabs in the users browser.',
                'slug' => 'website-title',
                'type' => 'text',
                'value' => 'Organic Print Studio',
            ],
            [
                'parent' => 'global',
                'label' => 'Logo',
                'description' => 'Shown in the centre of the home page, and also in the top corner of all administration pages.',
                'slug' => 'logo',
                'type' => 'image',
            ],
            [
                'parent' => 'global',
                'label' => 'Copyright',
                'description' => 'Shown on the website anywhere of the copyright',
                'slug' => 'copyright',
                'type' => 'text',
                'value' => 'Copyright© 2024 Organic Print Studio',
            ],
            [
                'parent' => 'global',
                'label' => 'Number',
                'description' => 'Shown on the website anywhere of the contact number',
                'slug' => 'contact-number',
                'type' => 'text',
                'value' => '0457 800 078',
            ],
            [
                'parent' => 'global',
                'label' => 'Number',
                'description' => 'Shown on the website anywhere of the contact email',
                'slug' => 'contact-email',
                'type' => 'text',
                'value' => 'susy@organicprintstudio.com.au',
            ],
            [
                'parent' => 'global',
                'label' => 'Opening hours',
                'description' => 'Shown on the website anywhere of the opening hours',
                'slug' => 'opening-hour',
                'type' => 'text',
                'value' => 'Tuesday, Thursday, Friday: 9am-6pm',
            ],
            [
                'parent' => 'home',
                'label' => 'Home Page Content',
                'description' => 'The main content shown in the centre of the home page.',
                'slug' => 'home-content',
                'type' => 'text',
                'value' => "Join us for a fun-filled day and help raise essential funds for our school. Together, we can make a big impact on our students' futures!",
            ],
            [
                'parent' => 'home',
                'label' => 'Home Page Title',
                'description' => 'The title shown in the centre of the home page.',
                'slug' => 'home-title',
                'type' => 'text',
                'value' => "Join the Fun and raise funds together!",
            ],

        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
