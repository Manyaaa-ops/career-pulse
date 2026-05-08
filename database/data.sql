-- Career Pulse Database Export
-- For MySQL Deployment

-- Create Categories Table
CREATE TABLE IF NOT EXISTS categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Insert Categories
INSERT INTO categories (id, name, slug, created_at, updated_at) VALUES
(1, 'Latest Jobs', 'latest-jobs', NOW(), NOW()),
(2, 'Admit Cards', 'admit-cards', NOW(), NOW()),
(3, 'Results', 'results', NOW(), NOW()),
(4, 'Scholarships', 'scholarships', NOW(), NOW()),
(5, 'Internships', 'internships', NOW(), NOW()),
(6, 'Answer Key', 'answer-key', NOW(), NOW()),
(7, 'Syllabus', 'syllabus', NOW(), NOW());

-- Create Posts Table
CREATE TABLE IF NOT EXISTS posts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id BIGINT UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT,
    content LONGTEXT,
    image VARCHAR(255),
    author VARCHAR(255) DEFAULT 'Career Pulse',
    views INT DEFAULT 0,
    is_featured TINYINT DEFAULT 0,
    status VARCHAR(50) DEFAULT 'published',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Insert Posts
INSERT INTO posts (id, category_id, title, slug, excerpt, content, image, author, views, is_featured, status, created_at, updated_at) VALUES
(1, 1, 'UPSC Civil Services 2024 Notification Released - Apply Now', 'upsc-civil-services-2024-notification', 'The Union Public Service Commission (UPSC) has released the official notification for Civil Services Examination 2024. Eligible candidates can apply online through the official UPSC portal.', '<p>The Union Public Service Commission (UPSC) has released the official notification for Civil Services Examination 2024. Eligible candidates can apply online through the official UPSC portal.</p><p><strong>Important Dates:</strong></p><ul><li>Application Start Date: February 14, 2024</li><li>Last Date to Apply: March 5, 2024</li><li>Prelims Exam Date: June 16, 2024</li></ul><p><strong>Eligibility:</strong> Bachelor's degree from recognized university, age between 21-32 years.</p>', 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800', 'Career Pulse', 1250, 1, 'published', NOW(), NOW()),
(2, 2, 'SSC CGL 2024 Admit Card Download - Tier 1 Exam', 'ssc-cgl-2024-admit-card', 'The Staff Selection Commission (SSC) has released the admit cards for CGL Tier 1 Examination 2024. Candidates can download their hall tickets from the official SSC website.', '<p>The Staff Selection Commission (SSC) has released the admit cards for CGL Tier 1 Examination 2024. Candidates can download their hall tickets from the official SSC website.</p><p><strong>Exam Details:</strong></p><ul><li>Exam Date: June 25-27, 2024</li><li>Shift: Morning (9:00 AM - 11:00 AM)</li><li>Venue: Various Centers across India</li></ul><p>Carry your admit card along with valid ID proof to the examination center.</p>', 'https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=800', 'Career Pulse', 890, 0, 'published', NOW(), NOW()),
(3, 3, 'IBPS PO 2023 Final Result Released - Check Now', 'ibps-po-2023-final-result', 'The Institute of Banking Personnel Selection (IBPS) has declared the final result for Probationary Officer Recruitment 2023. Selected candidates can check their result now.', '<p>The Institute of Banking Personnel Selection (IBPS) has declared the final result for Probationary Officer Recruitment 2023. Selected candidates can check their result now.</p><p><strong>Result Status:</strong> Available on IBPS Official Portal</p><p>Selected candidates will be allotted to various banks based on their preference and merit.</p>', 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800', 'Career Pulse', 1560, 1, 'published', NOW(), NOW()),
(4, 4, 'National Scholarship Portal 2024 - Apply for Merit Scholarship', 'national-scholarship-portal-2024', 'The Ministry of Education has opened registrations for National Scholarship Portal 2024. Students can apply for various scholarships up to Rs 1 lakh per year.', '<p>The Ministry of Education has opened registrations for National Scholarship Portal 2024. Students can apply for various scholarships up to Rs 1 lakh per year.</p><p><strong>Scholarship Details:</strong></p><ul><li>Pre-Matric Scholarships</li><li>Post-Matric Scholarships</li><li>Top Class Education Scheme</li><li>Merit cum Means Scholarship</li></ul><p>Last date to apply: March 31, 2024</p>', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800', 'Career Pulse', 720, 0, 'published', NOW(), NOW()),
(5, 5, 'Google Summer Internship 2024 - Apply Now', 'google-summer-internship-2024', 'Google invites applications for Summer Internship 2024. B.tech/B.E students can apply for paid internship opportunities in various domains.', '<p>Google invites applications for Summer Internship 2024. B.tech/B.E students can apply for paid internship opportunities in various domains.</p><p><strong>Internship Details:</strong></p><ul><li>Duration: 8-12 weeks</li><li>Stipend: Competitive</li><li>Locations: Bangalore, Hyderabad, Chennai</li><li>Domains: Software Engineering, Product Management, Data Science</li></ul><p>Apply through Google Careers portal before February 28, 2024.</p>', 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800', 'Career Pulse', 2100, 1, 'published', NOW(), NOW()),
(6, 6, 'UPSC NDA Answer Key 2024 Released - Check Now', 'upsc-nda-answer-key-2024', 'The Union Public Service Commission has released the official answer key for NDA Written Examination 2024. Candidates can check their responses and calculate estimated score.', '<p>The Union Public Service Commission has released the official answer key for NDA Written Examination 2024. Candidates can check their responses and calculate estimated score.</p><p><strong>How to Check:</strong></p><ul><li>Visit UPSC Official Website</li><li>Login with Roll Number</li><li>Download PDF Answer Key</li><li>Challenge window opens for 7 days</li></ul>', 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800', 'Career Pulse', 450, 0, 'published', NOW(), NOW()),
(7, 7, 'CBSE Class 12 Syllabus 2024-25 - Download Now', 'cbse-class-12-syllabus-2024-25', 'CBSE has released the revised syllabus for Class 12 for the academic year 2024-25. Students can download the complete syllabus subject-wise.', '<p>CBSE has released the revised syllabus for Class 12 for the academic year 2024-25. Students can download the complete syllabus subject-wise.</p><p><strong>Key Changes:</strong></p><ul><li>Reduced syllabus by 30%</li><li>More focus on practical knowledge</li><li>Internal assessment weight increased</li></ul><p>Board exams 2025 will be conducted in February-March.</p>', 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800', 'Career Pulse', 680, 0, 'published', NOW(), NOW()),
(8, 1, 'Railway NTPC 2024 Recruitment - 10,328 Vacancies', 'railway-ntpc-2024-recruitment', 'Railway Recruitment Board (RRB) has announced massive recruitment for NTPC posts. Graduate candidates can apply for various positions including Graduate Trainee and Junior Clerk.', '<p>Railway Recruitment Board (RRB) has announced massive recruitment for NTPC posts. Graduate candidates can apply for various positions including Graduate Trainee and Junior Clerk.</p><p><strong>Vacancy Details:</strong></p><ul><li>Total Posts: 10,328</li><li>Graduate Level: 5,895</li><li>Under-Graduate: 4,433</li><li>Salary: Rs 19,900 - Rs 35,400</li></ul><p>Online application starts from September 2024.</p>', 'https://images.unsplash.com/photo-1474487548417-781cb71495f3?w=800', 'Career Pulse', 1890, 1, 'published', NOW(), NOW());

-- Create Users Table for Admin
CREATE TABLE IF NOT EXISTS users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Insert Admin User (Password: password123 - hashed with bcrypt)
INSERT INTO users (id, name, email, password, created_at, updated_at) VALUES
(1, 'Admin', 'admin@careerpulse.com', '$2y$10$eGx0ybGmTRI9BY7/HWmuUOX2iqGqb15FwGBxPAP0XwOYQ9V4FUCrS', NOW(), NOW());