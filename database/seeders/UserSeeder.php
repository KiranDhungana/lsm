<?php

namespace Database\Seeders;

use App\Models\UserEducation;
use App\Models\UserExperience;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\StudentSetting\Entities\Institute;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        if ($user) {
            $user->special_commission = 100;
            $user->save();
        }

        $user = new User();
        $user->role_id = 2;
        $user->name = 'John Doe';
        $user->image = 'public/demo/user/instructor1.jpg';
        $user->email = 'teacher@infixlms.com';
        $user->username = 'johndoe';
        $user->headline = 'Senior IT Specialist';
        $user->phone = '01711223345';
        $user->about =    "John has over 20 years of experience in the IT industry. He specializes in network security and has worked with several top companies to improve their security infrastructure. He is also a certified ethical hacker and enjoys teaching others about cybersecurity.";
        $user->short_details =  "Expert in network security and certified ethical hacker.";
        $user->email_verified_at = now();
        $user->password = Hash::make('12345678');
        $user->created_at = date('Y-m-d h:i:s');
        $user->referral = Str::random(10);
        $user->save();

        $user = new User();
        $user->role_id = 3;
        $user->image = 'public/demo/user/student.jpg';
        $user->name = 'Jane Smith';
        $user->email = 'student@infixlms.com';
        $user->username = 'student@infixlms.com';
        $user->headline = 'Computer Science Student';
        $user->phone = '01711223346';
        $user->balance = 500;
        $user->about =   "Jane is a second-year computer science student with a keen interest in artificial intelligence and machine learning. She has participated in several hackathons and has a strong foundation in programming.";
        $user->short_details =  "Passionate about AI and machine learning.";
        $user->email_verified_at = now();
        $user->password = Hash::make('12345678');
        $user->created_at = date('Y-m-d h:i:s');
        $user->referral = Str::random(10);
        $user->save();




            User::insert(
                 [
                     [
                         'name' => 'Alice Johnson',
                         'username' => 'alicejohnson',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'alice.johnson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Software Engineer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor01.jpg',
                         'about' => 'Alice is a software engineer with expertise in full-stack development. She has worked on numerous projects and enjoys mentoring young developers. Alice is passionate about open-source technologies and contributing to the tech community.',
                     ],
                     [
                         'name' => 'Bob Williams',
                         'username' => 'bobwilliams',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'bob.williams@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Cloud Architect',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor02.jpg',
                         'about' => 'Bob is a cloud architect with over 15 years of experience in cloud computing. He has designed and managed cloud solutions for various enterprises. Bob enjoys sharing his knowledge on cloud technologies and best practices through teaching and writing.',
                     ],
                     [
                         'name' => 'Michael Brown',
                         'username' => 'michaelbrown',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'michael.brown@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Data Science Specialist',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor03.jpg',
                         'about' => 'Michael is a data science specialist with a strong background in machine learning and big data. He has worked on numerous projects involving data analysis and predictive modeling. Michael is also a seasoned instructor, teaching data science courses to professionals and students.',
                     ],
                     [
                         'name' => 'Emily Davis',
                         'username' => 'emilydavis',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'emily.davis@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Cybersecurity Expert',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor04.jpg',
                         'about' => 'Emily is an expert in cybersecurity with extensive experience in protecting digital infrastructures. She has conducted various workshops and training sessions on cybersecurity best practices. Emily is passionate about educating others on how to safeguard their digital assets.',
                     ],
                     [
                         'name' => 'William Johnson',
                         'username' => 'williamjohnson',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'william.johnson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Cloud Computing Specialist',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor05.jpg',
                         'about' => 'William is a cloud computing specialist with over 15 years of experience in designing and managing cloud infrastructure. He has worked with major cloud providers and has a deep understanding of cloud security and deployment strategies.',
                     ],
                     [
                         'name' => 'Olivia Martinez',
                         'username' => 'oliviamartinez',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'olivia.martinez@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Digital Marketing Guru',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor06.jpg',
                         'about' => 'Olivia is a digital marketing expert with a proven track record of successful campaigns. She has worked with various brands to enhance their online presence and increase their engagement through effective marketing strategies.',
                     ],
                     [
                         'name' => 'James Wilson',
                         'username' => 'jameswilson',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'james.wilson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Machine Learning Engineer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor07.jpg',
                         'about' => 'James is a machine learning engineer with a passion for AI. He has developed several machine learning models for various applications and enjoys teaching others how to implement AI solutions effectively.',
                     ],
                     [
                         'name' => 'Sophia Lee',
                         'username' => 'sophialee',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'sophia.lee@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Full-Stack Developer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor08.jpg',
                         'about' => 'Sophia is a full-stack developer with expertise in both front-end and back-end technologies. She has built numerous web applications and enjoys mentoring junior developers.',
                     ],
                     [
                         'name' => 'David Garcia',
                         'username' => 'davidgarcia',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'david.garcia@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'DevOps Engineer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor09.jpg',
                         'about' => 'David is a DevOps engineer with extensive experience in automating and streamlining IT infrastructure. He has worked with various tools and technologies to enhance the efficiency and reliability of development processes.',
                     ],
                     [
                         'name' => 'Linda Rodriguez',
                         'username' => 'lindarodriguez',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'linda.rodriguez@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Data Analyst',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor10.jpg',
                         'about' => 'Linda is a data analyst with a knack for uncovering insights from complex data sets. She has worked with various organizations to help them make data-driven decisions and improve their business strategies.',
                     ],
                     [
                         'name' => 'Thomas Martinez',
                         'username' => 'thomasmartinez',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'thomas.martinez@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'AI Researcher',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor11.jpg',
                         'about' => 'Thomas is an AI researcher with a deep interest in advancing artificial intelligence. He has published several papers on AI and enjoys sharing his knowledge through teaching and mentorship.',
                     ],
                     [
                         'name' => 'Patricia Taylor',
                         'username' => 'patriciataylor',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'patricia.taylor@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Software Architect',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor12.jpg',
                         'about' => 'Patricia is a software architect with over 15 years of experience in designing scalable and robust software solutions. She has led several development teams and is passionate about creating high-quality software.',
                     ],
                     [
                         'name' => 'Mark Anderson',
                         'username' => 'markanderson',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'mark.anderson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Blockchain Developer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor13.jpg',
                         'about' => 'Mark is a blockchain developer with a deep understanding of distributed ledger technologies. He has worked on several blockchain projects and enjoys teaching others about this emerging technology.',
                     ],
                     [
                         'name' => 'Laura White',
                         'username' => 'laurawhite',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'laura.white@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Mobile App Developer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor14.jpg',
                         'about' => 'Laura is a mobile app developer with extensive experience in creating both Android and iOS applications. She enjoys building user-friendly apps and teaching others how to develop mobile applications.',
                     ],
                     [
                         'name' => 'Robert King',
                         'username' => 'robertking',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'robert.king@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Network Engineer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor15.jpg',
                         'about' => 'Robert is a network engineer with expertise in designing and maintaining network infrastructure. He has worked with various organizations to ensure their network systems are secure and efficient.',
                     ],
                     [
                         'name' => 'Sarah Harris',
                         'username' => 'sarahharris',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'sarah.harris@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'UX/UI Designer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor16.jpg',
                         'about' => 'Sarah is a UX/UI designer with a talent for creating intuitive and visually appealing interfaces. She has worked on several high-profile projects and loves teaching others about user experience and interface design.',
                     ],
                     [
                         'name' => 'Charles Lee',
                         'username' => 'charleslee',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'charles.lee@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Database Administrator',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor17.jpg',
                         'about' => 'Charles is a database administrator with over 10 years of experience in managing and optimizing database systems. He has a deep understanding of database architecture and enjoys sharing his knowledge through teaching.',
                     ],
                     [
                         'name' => 'Mia Clark',
                         'username' => 'miaclark',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'mia.clark@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'SEO Specialist',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor18.jpg',
                         'about' => 'Mia is an SEO specialist with a proven track record of improving website rankings. She has worked with various companies to enhance their online visibility and enjoys teaching others about search engine optimization.',
                     ],
                     [
                         'name' => 'Paul Walker',
                         'username' => 'paulwalker',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'paul.walker@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'IT Consultant',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor19.jpg',
                         'about' => 'Paul is an IT consultant with extensive experience in advising businesses on technology solutions. He has helped numerous companies improve their IT infrastructure and enjoys teaching others about the latest technology trends.',
                     ],
                     [
                         'name' => 'Emma Thompson',
                         'username' => 'emmathompson',
                         'role_id' => 2,
                         'email_verified_at' => now(),
                         'email' => 'emma.thompson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Graphic Designer',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/instructor20.jpg',
                         'about' => 'Emma is a graphic designer with a flair for creating stunning visual content. She has worked with various brands to develop their visual identity and enjoys teaching others about graphic design and visual communication.',
                     ],

                     //students

                     [
                         'name' => 'Sophia Williams',
                         'username' => 'sophiawilliams',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'sophia.williams@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student01.jpg',
                         'about' => 'Sophia is a student interested in data science and machine learning. She loves participating in hackathons and building innovative projects.',
                     ],
                     [
                         'name' => 'Liam Johnson',
                         'username' => 'liamjohnson',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'liam.johnson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student02.jpg',
                         'about' => 'Liam is a computer engineering student with a focus on embedded systems and IoT. He enjoys building hardware projects and experimenting with new technologies.',
                     ],
                     [
                         'name' => 'Olivia Brown',
                         'username' => 'oliviabrown',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'olivia.brown@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student03.jpg',
                         'about' => 'Olivia is a software engineering student who loves coding and solving complex problems. She is currently working on several open-source projects.',
                     ],
                     [
                         'name' => 'Noah Davis',
                         'username' => 'noahdavis',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'noah.davis@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student04.jpg',
                         'about' => 'Noah is a student passionate about artificial intelligence and robotics. He is working on a project to create an AI-powered robot.',
                     ],
                     [
                         'name' => 'Emma Wilson',
                         'username' => 'emmawilson',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'emma.wilson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student05.jpg',
                         'about' => 'Emma is a computer science student with a keen interest in cybersecurity. She is involved in various cybersecurity competitions and initiatives.',
                     ],
                     [
                         'name' => 'James Martinez',
                         'username' => 'jamesmartinez',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'james.martinez@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student06.jpg',
                         'about' => 'James is a computer engineering student interested in software development and cloud computing. He is working on a cloud-based project for his final year.',
                     ],
                     [
                         'name' => 'Isabella Garcia',
                         'username' => 'isabellagarcia',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'isabella.garcia@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student07.jpg',
                         'about' => 'Isabella is a software engineering student with a focus on mobile app development. She is creating a mobile app for her university as a part of her coursework.',
                     ],
                     [
                         'name' => 'Lucas Thompson',
                         'username' => 'lucasthompson',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'lucas.thompson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student08.jpg',
                         'about' => 'Lucas is a computer science student with an interest in web development. He is working on several web projects to enhance his skills.',
                     ],
                     [
                         'name' => 'Amelia Lopez',
                         'username' => 'amelialopez',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'amelia.lopez@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student09.jpg',
                         'about' => 'Amelia is a student interested in data analytics and big data technologies. She is working on a project to analyze large datasets and derive meaningful insights.',
                     ],
                     [
                         'name' => 'Mason Lee',
                         'username' => 'masonlee',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'mason.lee@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student10.jpg',
                         'about' => 'Mason is a student focusing on network engineering and security. He is involved in various network projects and enjoys learning about new networking technologies.',
                     ],
                     [
                         'name' => 'Mia Anderson',
                         'username' => 'miaanderson',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'mia.anderson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student11.jpg',
                         'about' => 'Mia is a computer science student with a passion for AI and machine learning. She is working on several projects to apply machine learning techniques to real-world problems.',
                     ],
                     [
                         'name' => 'Ethan Harris',
                         'username' => 'ethanharris',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'ethan.harris@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student12.jpg',
                         'about' => 'Ethan is a student with an interest in cybersecurity and ethical hacking. He is participating in various cybersecurity challenges and competitions.',
                     ],
                     [
                         'name' => 'Ava Clark',
                         'username' => 'avaclark',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'ava.clark@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student13.jpg',
                         'about' => 'Ava is a student passionate about software development and cloud computing. She is currently working on a cloud-based application as part of her coursework.',
                     ],
                     [
                         'name' => 'Logan Robinson',
                         'username' => 'loganrobinson',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'logan.robinson@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student14.jpg',
                         'about' => 'Logan is a computer engineering student with a focus on embedded systems. He enjoys building hardware projects and experimenting with new technologies.',
                     ],
                     [
                         'name' => 'Emily Walker',
                         'username' => 'emilywalker',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'emily.walker@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student15.jpg',
                         'about' => 'Emily is a student interested in web development and UX/UI design. She is working on several web projects and enjoys creating user-friendly interfaces.',
                     ],
                     [
                         'name' => 'Alexander White',
                         'username' => 'alexanderwhite',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'alexander.white@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student16.jpg',
                         'about' => 'Alexander is a student passionate about AI and data science. He is currently working on a project to apply machine learning techniques to solve real-world problems.',
                     ],
                     [
                         'name' => 'Abigail King',
                         'username' => 'abigailking',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'abigail.king@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student17.jpg',
                         'about' => 'Abigail is a software engineering student who loves coding and solving complex problems. She is currently working on several open-source projects.',
                     ],
                     [
                         'name' => 'Daniel Scott',
                         'username' => 'danielscott',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'daniel.scott@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student18.jpg',
                         'about' => 'Daniel is a computer engineering student with a focus on software development. He is working on several projects to improve his skills.',
                     ],
                     [
                         'name' => 'Avery Wright',
                         'username' => 'averywright',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'avery.wright@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student19.jpg',
                         'about' => 'Avery is a student interested in data science and machine learning. She loves participating in hackathons and building innovative projects.',
                     ],
                     [
                         'name' => 'Ella Green',
                         'username' => 'ellagreen',
                         'role_id' => 3,
                         'email_verified_at' => now(),
                         'email' => 'ella.green@example.com',
                         'password' => Hash::make('12345678'),
                         'email_verify' => 1,
                         'currency_id' => 1,
                         'headline' => 'Student',
                         'referral' => Str::random(10),
                         'image' => 'public/demo/user/student20.jpg',
                         'about' => 'Ella is a computer science student with a keen interest in cybersecurity. She is involved in various cybersecurity competitions and initiatives.',
                     ],
                 ]
            );



        $users = User::select('id','role_id')->with('role')->get();
        foreach ($users as $user) {
            $user->job_title = $user->role->name;
            $user->save();

            UserEducation::create([
                'user_id' => $user->id,
                'institution' => 'Default Institution',
                'degree' => 'Default Degree',
                'start_date' => null,
                'end_date' => null,
            ]);

            UserExperience::create([
                'user_id' => $user->id,
                'title' => 'Default Job Title',
                'company_name' => 'Default Company',
                'currently_working' => true,
                'start_date' => now(),
                'end_date' => null,
            ]);
        }

        $institutes = [
            [
                'name' => 'Tech Institute of Technology',
                'address' => '123 Tech Street, Tech City, Techland',
            ],
            [
                'name' => 'Institute of Computer Sciences',
                'address' => '456 Computer Road, Cyber City, Digitaland',
            ],
            [
                'name' => 'Advanced Learning Academy',
                'address' => '789 Academy Avenue, Knowledge Town, Learnville',
            ],
            [
                'name' => 'Science and Technology Institute',
                'address' => '101 Science Boulevard, Innovation City, Techtopia',
            ],
            [
                'name' => 'Engineering Excellence Center',
                'address' => '202 Engineering Drive, Innovation Valley, Techland',
            ],
        ];


        Institute::insert($institutes);
    }
}
