<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Latest Jobs', 'slug' => 'latest-jobs'],
            ['name' => 'Admit Cards', 'slug' => 'admit-cards'],
            ['name' => 'Results', 'slug' => 'results'],
            ['name' => 'Scholarships', 'slug' => 'scholarships'],
            ['name' => 'Internships', 'slug' => 'internships'],
            ['name' => 'Answer Key', 'slug' => 'answer-key'],
            ['name' => 'Syllabus', 'slug' => 'syllabus'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $posts = [
            [
                'title' => 'UPSC Civil Services 2024 Notification Released - Apply Now',
                'slug' => 'upsc-civil-services-2024-notification',
                'category_id' => 1,
                'short_description' => 'Union Public Service Commission has released the notification for Civil Services Examination 2024. Eligible candidates can apply online before the last date.',
                'content' => '<h3>UPSC Civil Services 2024</h3><p>The Union Public Service Commission (UPSC) has released the notification for Civil Services Examination 2024. This is one of the most prestigious examinations in India.</p><h4>Important Dates:</h4><ul><li>Online Application Start: February 2024</li><li>Last Date to Apply: March 2024</li><li>Prelims Exam Date: June 2024</li></ul><h4>Eligibility:</h4><p>Candidates must have a graduation degree from a recognized university. Age limit is 21-32 years for general category.</p><h4>How to Apply:</h4><p>Visit the official UPSC website and fill the online application form. Pay the required application fee and submit the form.</p>',
                'publish_date' => '2024-02-15',
                'status' => 'published',
            ],
            [
                'title' => 'SSC CGL 2024 Admit Card Download - Tier 1 Exam',
                'slug' => 'ssc-cgl-2024-admit-card',
                'category_id' => 2,
                'short_description' => 'Staff Selection Commission has released the admit cards for CGL Tier 1 Examination 2024. Download your admit card from the official portal.',
                'content' => '<h3>SSC CGL Admit Card 2024</h3><p>The Staff Selection Commission (SSC) has released the admit cards for Combined Graduate Level (CGL) Tier 1 Examination 2024.</p><h4>Exam Details:</h4><ul><li>Exam Date: Multiple Shifts</li><li>Total Questions: 100</li><li>Total Marks: 200</li></ul><h4>How to Download:</h4><p>1. Visit the official SSC website<br>2. Click on the admit card link<br>3. Enter your registration number and password<br>4. Download and print the admit card</p>',
                'publish_date' => '2024-02-10',
                'status' => 'published',
            ],
            [
                'title' => 'IBPS PO 2023 Final Result Released - Check Now',
                'slug' => 'ibps-po-2023-final-result',
                'category_id' => 3,
                'short_description' => 'Institute of Banking Personnel Selection has released the final result for PO/MT 2023. Candidates can check their result using registration number.',
                'content' => '<h3>IBPS PO Final Result 2023</h3><p>The Institute of Banking Personnel Selection (IBPS) has released the final result for Probationary Officer/Management Trainee 2023.</p><h4>Result Status:</h4><p>The result is available on the official IBPS website. Candidates who have qualified will be allotted to various banks.</p><h4>Next Steps:</h4><p>Qualified candidates need to wait for the bank-wise allotment and joining details which will be communicated shortly.</p>',
                'publish_date' => '2024-02-08',
                'status' => 'published',
            ],
            [
                'title' => 'National Scholarship Portal 2024 - Apply for Merit Scholarship',
                'slug' => 'national-scholarship-portal-2024',
                'category_id' => 4,
                'short_description' => 'Government has launched the National Scholarship Portal 2024 for students. Apply for merit-based scholarships and get financial assistance.',
                'content' => '<h3>National Scholarship Portal 2024</h3><p>The Ministry of Education has launched the National Scholarship Portal for the year 2024. Students can apply for various scholarships.</p><h4>Eligibility:</h4><ul><li>Indian citizens</li><li>Annual family income less than specified limit</li><li>Minimum 75% attendance in previous year</li></ul><h4>Scholarship Amount:</h4><p>Rs. 12,000 per annum for students studying in classes 1 to 10</p>',
                'publish_date' => '2024-02-05',
                'status' => 'published',
            ],
            [
                'title' => 'Google Summer Internship 2024 - Apply Now',
                'slug' => 'google-summer-internship-2024',
                'category_id' => 5,
                'short_description' => 'Google is offering summer internships for students. Get an opportunity to work with Google and gain valuable experience.',
                'content' => '<h3>Google Summer Internship 2024</h3><p>Google is accepting applications for Summer Internship 2024. This is a great opportunity for students to work with one of the world\'s leading tech companies.</p><h4>Eligibility:</h4><ul><li>Currently enrolled in B.Tech/M.Tech/PhD</li><li>Available for 12-14 weeks</li><li>Strong technical skills</li></ul><h4>Benefits:</h4><ul><li>Stipend</li><li>Housing allowance</li><li>Industry exposure</li></ul>',
                'publish_date' => '2024-02-03',
                'status' => 'published',
            ],
            [
                'title' => 'UPSC NDA Answer Key 2024 - Download Now',
                'slug' => 'upsc-nda-answer-key-2024',
                'category_id' => 6,
                'short_description' => 'Union Public Service Commission has released the answer key for NDA Written Examination 2024. Check your answers and calculate your score.',
                'content' => '<h3>UPSC NDA Answer Key 2024</h3><p>The Union Public Service Commission has released the official answer key for NDA Written Examination 2024.</p><h4>How to Calculate Score:</h4><ul><li>Marks for correct answer: 2.5</li><li>Negative marking: 0.83 for wrong answer</li></ul><h4>Objection Window:</h4><p>Candidates can raise objections against the answer key within the specified period.</p>',
                'publish_date' => '2024-02-01',
                'status' => 'published',
            ],
            [
                'title' => 'RRB NTPC Syllabus 2024 - Complete Exam Pattern',
                'slug' => 'rrb-ntpc-syllabus-2024',
                'category_id' => 7,
                'short_description' => 'Railway Recruitment Board has released the revised syllabus for NTPC 2024. Check the complete exam pattern and preparation strategy.',
                'content' => '<h3>RRB NTPC Syllabus 2024</h3><p>The Railway Recruitment Board (RRB) has released the syllabus for Non-Technical Popular Categories (NTPC) Examination 2024.</p><h4>Exam Pattern:</h4><ul><li>Stage 1: Computer Based Test</li><li>Stage 2: Computer Based Test</li><li>Typing Test/Computer Based Aptitude Test</li></ul><h4>Syllabus Topics:</h4><p>General Awareness, Mathematics, General Intelligence and Reasoning</p>',
                'publish_date' => '2024-01-28',
                'status' => 'published',
            ],
            [
                'title' => 'State PSC Recruitment 2024 - Apply for Various Posts',
                'slug' => 'state-psc-recruitment-2024',
                'category_id' => 1,
                'short_description' => 'Various State Public Service Commissions have released recruitment notifications. Apply for multiple administrative posts.',
                'content' => '<h3>State PSC Recruitment 2024</h3><p>Multiple State Public Service Commissions have announced fresh recruitment drives for various administrative posts.</p><h4>Vacancies:</h4><ul><li>Deputy Collector: 50 posts</li><li>Tehsildar: 30 posts</li><li>Assistant Commissioner: 20 posts</li></ul><h4>Application Process:</h4><p>Apply through the official PSC portal before the deadline.</p>',
                'publish_date' => '2024-01-25',
                'status' => 'published',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}