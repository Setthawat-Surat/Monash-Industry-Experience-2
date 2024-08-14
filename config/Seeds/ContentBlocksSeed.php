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
            [
                'parent' => 'home',
                'label' => 'Why Choose Us Title',
                'description' => 'The title shown in why choose us section.',
                'slug' => 'wcu-title',
                'type' => 'text',
                'value' => "Why Choose Us?",
            ],
            [
                'parent' => 'home',
                'label' => 'Why Choose Us Description',
                'description' => 'The description shown in why choose us section.',
                'slug' => 'wcu-description',
                'type' => 'text',
                'value' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia incidunt quia enim mollitia delectus? Perferendis sapiente quaerat quos. Odit quasi similique nobis earum laudantium ad doloribus quos eos quod. Delectus?",
            ],
            [
                'parent' => 'home',
                'label' => 'Why Choose Us Reason1 Title',
                'description' => 'Why Choose Us Reason1 Title',
                'slug' => 'wcu-title1',
                'type' => 'text',
                'value' => "Years of Experience",
            ],
            [
                'parent' => 'home',
                'label' => 'Why Choose Us Reason2 Title',
                'description' => 'Why Choose Us Reason2 Title',
                'slug' => 'wcu-title2',
                'type' => 'text',
                'value' => "Environmentally Friendly",
            ],
            [
                'parent' => 'home',
                'label' => 'Why Choose Us Reason3 Title',
                'description' => 'Why Choose Us Reason3 Title',
                'slug' => 'wcu-title3',
                'type' => 'text',
                'value' => "Raise Funds with Ease",
            ],
            [
                'parent' => 'home',
                'label' => 'Why Choose Us Reason1 Text',
                'description' => 'Why Choose Us Reason1 Text',
                'slug' => 'wcu-reason1',
                'type' => 'text',
                'value' => "Organic Print Studio has years in the tea-towel printing industry whilst introducing unique, creative flares to your designs to make your tea-towels stand out! Organic Print Studio has been operating out of our Boronia workshop for over BLANK years.",
            ],
            [
                'parent' => 'home',
                'label' => 'Why Choose Us Reason2',
                'description' => 'Why Choose Us Reason2',
                'slug' => 'wcu-reason2',
                'type' => 'text',
                'value' => "Using 100% certified organic cotton, as well as commitments to sustainability and ethically sourcing materials, you can be assured that your tea towels are both high-quality and good for the environment. ",
            ],
            [
                'parent' => 'home',
                'label' => 'Why Choose Us Reason3',
                'description' => 'Why Choose Us Reason3',
                'slug' => 'wcu-reason3',
                'type' => 'text',
                'value' => "The Fund4Schools portal will allow you to centrally manage all tea-towel fundraisers whilst having direct communication with Organic Print Studio to streamline the design process. This, along with the shopping portal will allow family and friends of the school to directly purchase these designed to order, allowing schools to reduce waste and get professional consultation about tea-towel designs prior to printing.",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Question1',
                'description' => 'FAQ question1',
                'slug' => 'faq-question1',
                'type' => 'text',
                'value' => "How can I Register with fund4schools?",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Question2',
                'description' => 'FAQ question2',
                'slug' => 'faq-question2',
                'type' => 'text',
                'value' => "What is a campaign?",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Question3',
                'description' => 'FAQ question3',
                'slug' => 'faq-question3',
                'type' => 'text',
                'value' => "What happens to the money that has been raised?",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Question4',
                'description' => 'FAQ question4',
                'slug' => 'faq-question4',
                'type' => 'text',
                'value' => "I am expecting more than 1000 orders, can I order in bulk?",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Question5',
                'description' => 'FAQ question5',
                'slug' => 'faq-question5',
                'type' => 'text',
                'value' => "How can I submit my designs?",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer1',
                'description' => 'FAQ Answer1',
                'slug' => 'faq-answer1',
                'type' => 'text',
                'value' => "By visiting the Organic Print Studio",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer2',
                'description' => 'FAQ Answer2',
                'slug' => 'faq-answer2',
                'type' => 'text',
                'value' => "A campaign",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer3',
                'description' => 'FAQ Answer3',
                'slug' => 'faq-answer3',
                'type' => 'text',
                'value' => "What happens to the money that has been raised?
We collect the orders on your behalf, and return the profits from each order to you at the end of the campaign.",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer4',
                'description' => 'FAQ Answer4',
                'slug' => 'faq-answer4',
                'type' => 'text',
                'value' => "Of course! By using our interactive pricing scale, you can see the manufacturing cost and how much profit you can generate for your school, based on how many tea towels you order.",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer5',
                'description' => 'FAQ Answer5',
                'slug' => 'faq-answer5',
                'type' => 'text',
                'value' => "By logging in to your account",
            ],


        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
