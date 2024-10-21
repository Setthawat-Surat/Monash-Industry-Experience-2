<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class ContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'Global',
                'label' => 'Website Title',
                'description' => 'Shown on the home page, as well as any tabs in the users browser.',
                'slug' => 'website-title',
                'type' => 'text',
                'value' => 'Organic Print Studio',
            ],
            [
                'parent' => 'Global',
                'label' => 'Logo',
                'description' => 'Shown in the top centre of the every pages.',
                'slug' => 'logo',
                'type' => 'image',
            ],
            [
                'parent' => 'Global',
                'label' => 'Copyright',
                'description' => 'Shown on the website anywhere of the copyright',
                'slug' => 'copyright',
                'type' => 'text',
                'value' => 'Copyright© 2024 Organic Print Studio',
            ],
            [
                'parent' => 'Global',
                'label' => 'Phone Number',
                'description' => 'Shown on the website anywhere of the contact number',
                'slug' => 'contact-number',
                'type' => 'text',
                'value' => '0457 800 078',
            ],
            [
                'parent' => 'Global',
                'label' => 'Email',
                'description' => 'Shown on the website anywhere of the contact email',
                'slug' => 'contact-email',
                'type' => 'text',
                'value' => 'susy@organicprintstudio.com.au',
            ],
/*            [
                'parent' => 'Global',
                'label' => 'Opening hours',
                'description' => 'Shown on the website anywhere of the opening hours',
                'slug' => 'opening-hour',
                'type' => 'text',
                'value' => 'Tuesday, Thursday, Friday: 9am-6pm',
            ],*/

            [
                'parent' => 'Home',
                'label' => 'Home Page Title',
                'description' => 'The title shown in the centre of the home page.',
                'slug' => 'home-title',
                'type' => 'text',
                'value' => "Support your school and the environment with our ACO certified organic cotton tea towels!",
            ],
            [
                'parent' => 'Home',
                'label' => 'Home Page Content',
                'description' => 'The main content shown in the centre of the home page.',
                'slug' => 'home-content',
                'type' => 'text',
                'value' => "Showcasing unigue artwork, each towel is a collaborative masterpiece. Your purchase directly supports local schools and educational programs. Dry dishes with pride, display student creativity, or gift these unique, sustainable pieces – every towel makes a difference.",
            ],
/*            [
                'parent' => 'Home',
                'label' => 'Why Choose Us Title',
                'description' => 'The title shown in why choose us section.',
                'slug' => 'wcu-title',
                'type' => 'text',
                'value' => "Why Choose Us?",
            ],*/
/*            [
                'parent' => 'Home',
                'label' => 'Why Choose Us Description',
                'description' => 'The description shown in why choose us section.',
                'slug' => 'wcu-description',
                'type' => 'text',
                'value' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia incidunt quia enim mollitia delectus? Perferendis sapiente quaerat quos. Odit quasi similique nobis earum laudantium ad doloribus quos eos quod. Delectus?",
            ],*/
            [
                'parent' => 'Home Why Us',
                'label' => 'Why Choose Us Reason1 Title',
                'description' => 'Why Choose Us Reason1 Title',
                'slug' => 'wcu-title1',
                'type' => 'text',
                'value' => "Raise Funds with Ease",
            ],
            [
                'parent' => 'Home Why Us',
                'label' => 'Why Choose Us Reason1',
                'description' => 'Why Choose Us Reason1',
                'slug' => 'wcu-reason1',
                'type' => 'text',
                'value' => "The Fund4Schools portal will allow you to centrally manage all tea-towel fundraisers whilst having direct communication with Organic Print Studio to streamline the design process. This, along with the shopping portal will allow family and friends of the school to directly purchase these designed to order, allowing schools to reduce waste and get professional consultation about tea-towel designs prior to printing.",
            ],
            [
                'parent' => 'Home Why Us',
                'label' => 'Why Choose Us Reason2 Title',
                'description' => 'Why Choose Us Reason2 Title',
                'slug' => 'wcu-title2',
                'type' => 'text',
                'value' => "Years of Experience",
            ],
            [
                'parent' => 'Home Why Us',
                'label' => 'Why Choose Us Reason2',
                'description' => 'Why Choose Us Reason2',
                'slug' => 'wcu-reason2',
                'type' => 'text',
                'value' => "Organic Print Studio has years in the tea towel printing industry whilst introducing unique, creative flares to your designs to make your tea-towels stand out!",
            ],
            [
                'parent' => 'Home Why Us',
                'label' => 'Why Choose Us Reason3 Title',
                'description' => 'Why Choose Us Reason3 Title',
                'slug' => 'wcu-title3',
                'type' => 'text',
                'value' => "Environmentally Friendly",
            ],
            [
                'parent' => 'Home Why Us',
                'label' => 'Why Choose Us Reason3',
                'description' => 'Why Choose Us Reason3',
                'slug' => 'wcu-reason3',
                'type' => 'text',
                'value' => "Using 100% certified organic cotton, as well as commitments to sustainability and ethically sourcing materials, you can be assured that your tea towels are both high-quality and good for the environment.",
            ],


            [
                'parent' => 'Home Testimonial',
                'label' => 'Section Title',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-title',
                'type' => 'text',
                'value' => "Testimonials",
            ],
//            [
//                'parent' => 'Home',
//                'label' => 'Section description',
//                'description' => 'Words From Our Customers Section',
//                'slug' => 'wfoc-description',
//                'type' => 'text',
//                'value' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit dolor volutpat porttitor sagittis nunc nisl. Sagittis sit pellentesque gravida viverra. Leo ut sed euismod tortor risus et. Ornare non neque, leo, ornare. Lorem ipsum dolor sit amet.",
//            ],


            [
                'parent' => 'Home Testimonial',
                'label' => 'Section testimonial1',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-text1',
                'type' => 'text',
                'value' => "\"We recently worked with Susy to create a tea towel for school's 150th celebration, and we couldn't be happier with the result! We couldn't have asked for a better experience, and we highly recommend her to anyone looking for quality and care in their custom creations!\"",
            ],
            [
                'parent' => 'Home Testimonial',
                'label' => 'Testimonial 1 name',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-name1',
                'type' => 'text',
                'value' => "Michelle",
            ],
            [
                'parent' => 'Home Testimonial',
                'label' => 'Section Location1',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-loc1',
                'type' => 'text',
                'value' => "Oakey State School",
            ],
            [
                'parent' => 'Home Testimonial',
                'label' => 'Section testimonial2',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-text2',
                'type' => 'text',
                'value' => "\"We received the tea towels Friday, they look fantastic! I also wanted to thank you for being so efficient and patient with me doing my first school fundraiser! I appreciated your courteous and kind manner. I will certainly be recommending your business to my friends.\"",
            ],
            [
                'parent' => 'Home Testimonial',
                'label' => 'Testimonial 2 name',
                'description' => 'Words From Our Customers Section',
                    'slug' => 'TMs-name2',
                'type' => 'text',
                'value' => "Narelle",
            ],
            [
                'parent' => 'Home Testimonial',
                'label' => 'Section Location2',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-loc2',
                'type' => 'text',
                'value' => "Merri-bek Primary School",
            ],
            [
                'parent' => 'Home Testimonial',
                'label' => 'Section testimonial3',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-text3',
                'type' => 'text',
                'value' => "\"Susy was brilliant to work with, she was very informative about the process and guided me through every step. The final product looks and feels amazing, is of high quality and was delivered on time. I would definitely work with Susy again!\"",
            ],
            [
                'parent' => 'Home Testimonial',
                'label' => 'Testimonial 3 name',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-name3',
                'type' => 'text',
                'value' => "Emily",
            ],
            [
                'parent' => 'Home Testimonial',
                'label' => 'Section Location3',
                'description' => 'Words From Our Customers Section',
                'slug' => 'TMs-loc3',
                'type' => 'text',
                'value' => "Gowrie Clare Court Kinder",
            ],
            [
                'parent' => 'Home',
                'label' => 'Homepage Top Picture',
                'description' => 'The first image of gallery at the top homepage.',
                'slug' => 'home-image1',
                'type' => 'image',
            ],
            [
                'parent' => 'Home',
                'label' => 'Homepage Top Picture',
                'description' => 'The second image of gallery at the top homepage.',
                'slug' => 'home-image2',
                'type' => 'image',
            ],
            [
                'parent' => 'Home',
                'label' => 'Homepage Top Picture',
                'description' => 'The third image of gallery at the top homepage.',
                'slug' => 'home-image3',
                'type' => 'image',
            ],
            [
                'parent' => 'Home',
                'label' => 'Homepage Head Picture',
                'description' => 'The fourth image at the Head homepage.',
                'slug' => 'home-image4',
                'type' => 'image',
            ],
            [
                'parent' => 'Home',
                'label' => 'Homepage Middle Picture',
                'description' => 'The fifth image at the middle homepage.',
                'slug' => 'home-image5',
                'type' => 'image',
            ],
            [
                'parent' => 'Home',
                'label' => 'Homepage Bottom Picture',
                'description' => 'The sixth image at the bottom homepage.',
                'slug' => 'home-image6',
                'type' => 'image',
            ],









            [
                'parent' => 'FAQ',
                'label' => 'Question1',
                'description' => 'FAQ question1',
                'slug' => 'faq-question1',
                'type' => 'text',
                'value' => "How can I Register with Tea Towels for Schools?",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Question2',
                'description' => 'FAQ question2',
                'slug' => 'faq-question2',
                'type' => 'text',
                'value' => "What is a Campaign and how do I start one?",
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
                'value' => "What are belly bands?",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer1',
                'description' => 'FAQ Answer1',
                'slug' => 'faq-answer1',
                'type' => 'text',
                'value' => "You can also register by navigating to the home page, and selecting the “Start Fundraising” button in yellow. You will then be prompted to set up an account. ",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer2',
                'description' => 'FAQ Answer2',
                'slug' => 'faq-answer2',
                'type' => 'text',
                'value' => "A campaign is a specific product with its own design, price, and selling period. It contains all of the details that make that tea towel unique. Campaigns could be themed for events like Mother’s Day or school events, and you can begin a campaign by logging in to your account on the website, and navigating to the “Create a Campaign” button on the left hand side. When you set up a campaign, you will be asked to give it a title and description, as well as choosing which dates the campaign should run between. These dates are the dates which the product will be available to purchase on the Tea Towels for Schools website. ",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer3',
                'description' => 'FAQ Answer3',
                'slug' => 'faq-answer3',
                'type' => 'text',
                'value' => "The money that has been raised will be collected by Organic Print Studio, and minus the production costs, all profits will be sent directly to the school for your fundraising efforts. ",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer4',
                'description' => 'FAQ Answer4',
                'slug' => 'faq-answer4',
                'type' => 'text',
                'value' => " Of course! Organic Print Studio caters for all order sizes, however with a minimum order size of 25 Tea Towels per campaign. Check out our pricing calculator on the home page!",
            ],
            [
                'parent' => 'FAQ',
                'label' => 'Answer5',
                'description' => 'FAQ Answer5',
                'slug' => 'faq-answer5',
                'type' => 'text',
                'value' => "Belly bands are a card stock product that holds the tea towel together. Belly bands are available on both white card stock (350gsm EcoStar – 100% recycled and uncoated) or Kraft board (Enviro Board – 100 % recycled and uncoated). We will happily fold and wrap your tea towels and totes in your belly bands unless requested they be supplied flat and not packed.",
            ],



            [
                'parent' => 'About Us',
                'label' => 'About Us Pge Title',
                'description' => 'About us Section',
                'slug' => 'abt-title',
                'type' => 'text',
                'value' => "Organic Print Studio",
            ],            [
                'parent' => 'About Us',
                'label' => 'About Us Subtitle',
                'description' => 'About us Section',
                'slug' => 'abt-subtitle',
                'type' => 'text',
                'value' => "Encourage, Educate, Empower",
            ],
            [
                'parent' => 'About Us',
                'label' => 'About Us Video Title',
                'description' => 'About us Section',
                'slug' => 'abt-vidotitle',
                'type' => 'text',
                'value' => "You Can Learn More About Us!",
            ],
            [
                'parent' => 'About Us',
                'label' => 'About Us Video Link',
                'description' => 'About us Section',
                'slug' => 'abt-video',
                'type' => 'text',
                'value' => "https://www.youtube.com/embed/RMk4wd5TCfM",
            ],
            [
                'parent' => 'About Us',
                'label' => 'About Us Content',
                'description' => 'About us Section',
                'slug' => 'abt-text',
                'type' => 'text',
                'value' => "From her little garden studio, Susy Kennedy is creating beautiful personalised souvenir tea towels for special events. Printed on top-quality ACO Certified cotton, these unique keepsakes will remind guests of your happy occasion, or as merchandise for your business. Organic Print Studio is all about the beauty of life and the occasions that mark our journeys through it.<br><br>
            Constantly developing new products in collaboration with local artists, Susy strives to ethically source materials that minimise impact on the environment. She applies her love for quality textiles in the beautiful tactile products she develops. Susy keeps her finger on the pulse of design trends and feeds that back through her products to customers.<br><br>
            Tea Towels for Schools allows you to create a bespoke design that reflects the character of your school. Choosing any style you wish, you can personalise designs for each class, year level, or social group. Elevate your school’s fundraising efforts with vibrant, organic tea towels! Organic Print Studio believes in creating beautiful art while nurturing a sustainable future.<br><br>
            Key Features:
            <ul>
            <li>Vibrant Designs: From whimsical illustrations to inspiring quotes, our prints cater to a variety of tastes and themes that resonate with students, parents, and teachers alike.</li>
            <li>Eco-Conscious Materials: We use only organic inks and recycled paper, minimizing our carbon footprint and promoting a healthier planet for future generations.</li>
            <li>Fundraising Made Easy: Each purchase directly supports your school’s fundraising goals. With attractive pricing and customizable options, you can maximize your profits while offering a product your community will love.</li>
            <li>Educational Value: Our prints come with fun facts and art history insights, sparking creativity and conversation in classrooms and homes.</li><br>
            Join the movement towards sustainability and creativity! Partner with us to inspire your community and fund essential programs for your school. Together, we can create a brighter future—one print at a time.",
            ],
            [
                'parent' => 'About Us',
                'label' => 'About Us Page Background Picture',
                'description' => 'The image at the top of about us page.',
                'slug' => 'abt-background',
                'type' => 'image',
            ],
            [
                'parent' => 'About Us',
                'label' => 'Image 1',
                'description' => 'The image in the about us page.',
                'slug' => 'abt-image1',
                'type' => 'image',
            ],
            [
                'parent' => 'About Us',
                'label' => 'Image 2',
                'description' => 'The image in the about us page.',
                'slug' => 'abt-image2',
                'type' => 'image',
            ],
            [
                'parent' => 'About Us',
                'label' => 'Image 3',
                'description' => 'The image in the about us page.',
                'slug' => 'abt-image3',
                'type' => 'image',
            ],
            [
                'parent' => 'About Us',
                'label' => 'Image 4',
                'description' => 'The image in the about us page.',
                'slug' => 'abt-image4',
                'type' => 'image',
            ],
            [
                'parent' => 'About Us',
                'label' => 'Image 5',
                'description' => 'The image in the about us page.',
                'slug' => 'abt-image5',
                'type' => 'image',
            ],
            [
                'parent' => 'About Us',
                'label' => 'Image 6',
                'description' => 'The image in the about us page.',
                'slug' => 'abt-image6',
                'type' => 'image',
            ],







            [
                'parent' => 'The Process',
                'label' => 'The Process Title',
                'description' => 'The title of the process page',
                'slug' => 'proc-title',
                'type' => 'text',
                'value' => "Steps to Raise Funds for your School",
            ],
            [
                'parent' => 'The Process',
                'label' => 'Step1 of the process',
                'description' => 'The step1 title of the process',
                'slug' => 'proc-subtitle1',
                'type' => 'text',
                'value' => "Register an Account",
            ],
            [
                'parent' => 'The Process',
                'label' => 'Step description1 of the process',
                'description' => 'The step3 description1 text of the process',
                'slug' => 'proc-text1',
                'type' => 'text',
                'value' => "Register an account through the 'Start Fundraising' button and provide your school's details. Then, create a fundraising campaign from your dashboard.",
            ],
            [
                'parent' => 'The Process',
                'label' => 'Step2 of the process',
                'description' => 'The step2 title of the process',
                'slug' => 'proc-subtitle2',
                'type' => 'text',
                'value' => "Upload Student Designs",
            ],
            [
                'parent' => 'The Process',
                'label' => 'Step description2 of the process',
                'description' => 'The step3 description2 text of the process',
                'slug' => 'proc-text2',
                'type' => 'text',
                'value' => "Collate and scan designs created by your students and upload them through your account dashboard. Once approved, parents and guardians will be able to purchase the designs through the website.",
            ],
            [
                'parent' => 'The Process',
                'label' => 'Step3 of the process',
                'description' => 'The step3 title of the process',
                'slug' => 'proc-subtitle3',
                'type' => 'text',
                'value' => "Receive Tea Towels and Payment",
            ],
            [
                'parent' => 'The Process',
                'label' => 'Step description3 of the process',
                'description' => 'The step3 description3 text of the process',
                'slug' => 'proc-text3',
                'type' => 'text',
                'value' => "After the campaign has ended, Organic Print Studio will create the tea towels and send them to your school, along with the funds raised.",
            ],
            [
                'parent' => 'The Process',
                'label' => 'Image',
                'description' => 'The image of the process page.',
                'slug' => 'proc-image',
                'type' => 'image',
            ],



        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
