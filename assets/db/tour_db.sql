-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 29, 2024 at 02:58 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blog_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `blog` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blog_name`, `blog`, `post_date`) VALUES
(12, 'A Journey into Kenya\'s Rich Tapestry of Nature and Wildlife', '<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kenya, often revered for its bustling cities and vibrant cultures, is also a treasure trove of natural wonders that beckon travelers seeking an unparalleled safari experience. As you embark on a journey beyond the cityscapes, you&#39;ll discover the untouched landscapes and diverse wildlife that make Kenya a top destination for nature enthusiasts and adventure seekers alike.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>The Maasai Mara: A Symphony of Wildlife</strong></span></p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong><img alt=\"\" src=\"../assets/uploads/blog/1809022452.jpg\" style=\"height:333px; width:500px\" /></strong></span></p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Embark on a safari adventure like no other in the world-famous Maasai Mara National Reserve. Spanning over 1,500 square kilometers, this iconic landscape is home to the renowned Great Migration, where millions of wildebeest, zebras, and gazelles traverse the vast plains in search of greener pastures. The Mara River, a lifeline for the region&#39;s wildlife, becomes a stage for dramatic river crossings during this awe-inspiring annual event.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Beyond the migration, the Maasai Mara boasts a rich biodiversity that includes the &quot;Big Five&quot; &ndash; lions, elephants, buffalo, leopards, and rhinoceros. Expert guides, with an intimate knowledge of the terrain, lead safari excursions, ensuring that every moment is a chance to witness nature&#39;s raw beauty up close.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Amboseli National Park: Where Giants Roam in the Shadows of Kilimanjaro</strong></span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Nestled at the foot of Mount Kilimanjaro, Amboseli National Park is a picturesque haven that offers a unique safari experience. The majestic backdrop of Africa&#39;s tallest mountain provides a stunning setting for encounters with elephants, which are particularly abundant in the park. The Amboseli elephants are known for their impressive tusks and distinctive appearance, making every sighting a memorable spectacle.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">The park&#39;s diverse ecosystem also supports a myriad of other wildlife, including giraffes, zebras, wildebeests, and a variety of bird species. A visit to Observation Hill allows for panoramic views of the entire park, where you can witness the interplay of wildlife against the backdrop of the snow-capped peaks of Kilimanjaro.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Samburu National Reserve: A Unique Wilderness Experience</strong></span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">For those seeking a more off-the-beaten-path adventure, Samburu National Reserve offers a distinctive safari experience in Kenya&#39;s northern reaches. This arid landscape, crisscrossed by the Ewaso Ng&#39;iro River, is home to species not commonly found in other parts of the country.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Discover the &quot;Samburu Special Five,&quot; a collection of rare and endemic species &ndash; the Grevy&#39;s zebra, reticulated giraffe, Beisa oryx, Somali ostrich, and the gerenuk. Samburu&#39;s varied terrain, from acacia-studded plains to rugged mountains, provides a unique backdrop for game drives and nature walks.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>The Rift Valley Lakes: A Haven for Avian Enthusiasts</strong></span></p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong><img alt=\"\" src=\"../assets/uploads/blog/164061428.jpg\" style=\"height:533px; width:800px\" /></strong></span></p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Kenya&#39;s Rift Valley is adorned with a string of stunning lakes, each with its own unique character and ecological significance. Lake Nakuru, a UNESCO World Heritage Site and Ramsar Wetland, is renowned for its vibrant pink flamingo colonies and diverse birdlife. The nearby Lake Naivasha offers boat safaris amidst lush vegetation, providing opportunities to spot hippos and various bird species.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Venture further to Lake Bogoria, where geysers and hot springs add a geological marvel to the wildlife sightings. These lakes, set against the backdrop of the Rift Valley escarpment, form a mosaic of landscapes that showcase the breathtaking beauty of Kenya&#39;s natural heritage.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Community Conservancies: A Sustainable Safari Experience</strong></span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">In recent years, Kenya has embraced the concept of community conservancies, fostering a balance between wildlife conservation and community development. Places like the Ol Pejeta Conservancy and Lewa Wildlife Conservancy exemplify this ethos, providing travelers with an opportunity to engage in responsible tourism.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Participate in guided bush walks with local Maasai warriors, witness anti-poaching efforts firsthand, and contribute to community projects that uplift the lives of those living alongside these wild landscapes. These conservancies not only protect endangered species but also empower local communities, creating a holistic and sustainable approach to tourism.</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">In conclusion, Kenya&#39;s allure extends far beyond its vibrant cities, offering a kaleidoscope of natural wonders and wildlife experiences. Whether you find yourself marveling at the Great Migration in the Maasai Mara, standing in the shadow of Mount Kilimanjaro in Amboseli, encountering rare species in Samburu, exploring the Rift Valley lakes, or engaging in community-led conservation efforts, Kenya&#39;s diverse landscapes promise an unforgettable journey into the heart of Africa&#39;s untamed beauty. As you embark on your safari, be prepared to be enchanted by the hidden gems that make Kenya a haven for nature enthusiasts and a sanctuary for the world&#39;s most iconic wildlife. Karibu Kenya &ndash; welcome to a safari adventure like no other!</span></p>\n', '2024-03-06 13:45:27'),
(13, 'A Deep Dive into Tanzania\'s Timeless Tourism Treasures', '<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Introduction:</strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Nestled on the eastern coast of Africa, Tanzania stands as a beacon of untamed beauty, captivating travelers with its diverse landscapes, rich cultural heritage, and abundant wildlife. From the iconic plains of the Serengeti to the pristine beaches of Zanzibar, Tanzania offers a multifaceted experience that transcends the ordinary. In this blog, we embark on a virtual journey to explore the wonders of Tanzanian tourism, uncovering the hidden gems that make this East African nation a must-visit destination.</span></p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Serengeti National Park: Where the Wild Roams Free</strong></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">No discussion about Tanzanian tourism is complete without mentioning the Serengeti National Park. Renowned for its vast savannahs, the park is a sanctuary for an impressive array of wildlife, including the famous &quot;Big Five&quot; &ndash; lions, elephants, buffalos, leopards, and rhinos. The annual Great Migration, where millions of wildebeest and zebras traverse the plains in search of greener pastures, is a spectacle that leaves visitors in awe. A safari in the Serengeti promises an unforgettable adventure, immersing you in the heart of the untamed African wilderness.</span></p>\r\n\r\n<ol start=\"2\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Mount Kilimanjaro: Conquering Africa&#39;s Highest Peak</strong></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">For the adventure seekers, Tanzania offers the challenge of scaling Mount Kilimanjaro, the highest peak in Africa. This dormant stratovolcano stands proudly against the Tanzanian skyline, inviting trekkers from around the world to embark on a journey of a lifetime. The climb takes you through diverse ecosystems, from lush rainforests to alpine deserts, culminating in a stunning glaciated summit. Whether you&#39;re an experienced mountaineer or a novice looking for a thrilling challenge, Kilimanjaro offers an unparalleled trekking experience.</span></p>\r\n\r\n<ol start=\"3\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Zanzibar Archipelago: A Tropical Paradise</strong></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">After the thrill of the safari or the exhilaration of climbing Kilimanjaro, the Zanzibar Archipelago beckons with its idyllic beaches and vibrant cultural tapestry. This tropical paradise is a mosaic of pristine white sands, turquoise waters, and historic stone towns. Stone Town, a <span style=\"color:#f39c12\"><strong>UNESCO </strong></span>World Heritage Site, showcases a blend of Arabian, Persian, Indian, and European influences, reflecting the island&#39;s rich history. Zanzibar offers a perfect retreat for relaxation, water activities, and immersing oneself in the unique Swahili culture.</span></p>\r\n\r\n<ol start=\"4\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Ngorongoro Conservation Area: Nature&#39;s Amphitheater</strong></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"assets/uploads/blog/205441135.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">The Ngorongoro Conservation Area, often referred to as the &quot;eighth wonder of the world,&quot; is a geological masterpiece. The centerpiece is the Ngorongoro Crater, a vast volcanic caldera that shelters a remarkable concentration of wildlife. This natural amphitheater provides a unique setting for observing a diverse range of species in their natural habitat. The conservation area is also home to the indigenous Maasai people, offering visitors the opportunity to experience their traditional lifestyle and cultural practices.</span></p>\r\n\r\n<ol start=\"5\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Cultural Encounters: Embracing Tanzania&#39;s Diversity</strong></span></li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Beyond its breathtaking landscapes and wildlife, Tanzania is a melting pot of cultures, each contributing to the country&#39;s rich tapestry. A visit to local villages allows travelers to engage with the Maasai, Chaga, and other ethnic groups, gaining insights into their traditions, music, dance, and crafts. The warmth and hospitality of the Tanzanian people leave a lasting impression, adding a cultural dimension to the overall tourism experience.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Conclusion:</strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Tanzania&#39;s tourism landscape is a mosaic of natural wonders, cultural diversity, and exhilarating adventures. Whether you seek the thrill of a safari, the challenge of conquering a majestic peak, or the serenity of tropical beaches, Tanzania offers a kaleidoscope of experiences. As you navigate through the untamed beauty of this East African gem, you&#39;ll discover that Tanzania is not just a destination; it&#39;s an immersive journey into the heart of Africa&#39;s soul, leaving you with memories that will last a lifetime.</span></p>\r\n', '2024-03-06 14:05:44'),
(14, 'Maasai Mara: A Safari Symphony of Culture and Wildlife', '<p>The vast expanse of the Maasai Mara in Tanzania beckons travelers with a harmonious blend of untamed wilderness and vibrant Maasai culture. This extraordinary destination, nestled in the heart of East Africa, is a testament to the country&#39;s rich biodiversity and the enduring traditions of its indigenous people.</p>\r\n\r\n<p><strong>Embracing Nature&#39;s Grandeur: The Maasai Mara Landscape</strong></p>\r\n\r\n<p>The Maasai Mara, an extension of the renowned Serengeti ecosystem, sprawls across approximately 1,510 square kilometers of pristine terrain. This natural marvel is characterized by sweeping savannahs, acacia-dotted landscapes, and winding rivers, creating an ideal habitat for a diverse array of wildlife. Visitors are welcomed into a mesmerizing world where each sunrise and sunset paints the horizon with hues of gold and crimson, offering a front-row seat to the untamed beauty of the African wilderness.</p>\r\n\r\n<p><strong>Wildlife Extravaganza: A Safari Wonderland</strong></p>\r\n\r\n<p>Embarking on a safari in the Maasai Mara is akin to stepping into a real-life documentary. The reserve is home to the renowned Big Five &ndash; lions, elephants, buffalos, leopards, and rhinoceros &ndash; alongside an abundance of other species such as zebras, giraffes, hippos, and various antelope species. The annual Great Migration, a spectacle where vast herds of wildebeest, zebras, and gazelles traverse the Mara River in search of greener pastures, is a once-in-a-lifetime experience that captivates the hearts of all who witness it.</p>\r\n\r\n<p><strong>Cultural Kaleidoscope: The Maasai People</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"assets/uploads/blog/1952295460.jpg\" style=\"height:505px; width:900px\" /></strong></p>\r\n\r\n<p>Beyond its natural wonders, the Maasai Mara offers a unique opportunity to immerse oneself in the age-old traditions of the Maasai people. The Maasai, with their distinctive red attire and intricate beadwork, have inhabited these lands for centuries. Visitors can engage in cultural experiences, from participating in traditional dances to witnessing the artistry of Maasai craftsmanship. A visit to a Maasai village provides a glimpse into their pastoral lifestyle, fostering a deeper understanding of the symbiotic relationship between the indigenous people and their surroundings.</p>\r\n\r\n<p><strong>Balancing Conservation and Tourism: A Sustainable Approach</strong></p>\r\n\r\n<p>As the Maasai Mara continues to captivate the hearts of globetrotters, the importance of sustainable tourism practices becomes paramount. Efforts to preserve the delicate balance between human activity and the natural environment are underway, with local initiatives focusing on community-based conservation and responsible tourism. Visitors are encouraged to partake in eco-friendly practices, ensuring the preservation of this ecological masterpiece for generations to come.</p>\r\n\r\n<p><strong>Conclusion: A Tapestry of Nature and Culture Unveiled</strong></p>\r\n\r\n<p>The Maasai Mara stands as a testament to Tanzania&#39;s commitment to preserving its natural heritage and celebrating the vibrant cultures that call this land home. Whether you seek the thrill of a safari adventure or a deep dive into indigenous traditions, the Maasai Mara invites you to embark on a transformative journey where nature and culture converge in perfect harmony, creating memories that will endure for a lifetime.</p>\r\n', '2024-03-06 14:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

DROP TABLE IF EXISTS `blog_images`;
CREATE TABLE IF NOT EXISTS `blog_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blog_id` int NOT NULL,
  `image_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_id`, `image_name`) VALUES
(14, 11, 'rhino-4422728_1280.jpg'),
(15, 12, 'rhino-6065480_1280.jpg'),
(16, 13, 'banana-4493420_1280.jpg'),
(17, 14, 'lions-7763323_1280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `full_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `nationality` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adults` int DEFAULT NULL,
  `children` int DEFAULT NULL,
  `check_in` date NOT NULL,
  `requirements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `package_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

DROP TABLE IF EXISTS `company_info`;
CREATE TABLE IF NOT EXISTS `company_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `name`, `contact`, `email`, `about`, `address`) VALUES
(1, 'Geomic Tours', '759200998', 'info@pulmmertours.com', 'Geomic Tours, passionate explorers dedicated to crafting extraordinary journeys. With expertise, care, and a love for adventure, we transform travel dreams into unforgettable experiences.', 'The Well Mall, Karen');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `date`, `status`) VALUES
(17, 'Daniello Kabuga', 'mailme.kimagutgeorges@gmail.com', 789373600, 'Here is the last subject', 'I wanna write something cool', '2024-04-02 00:46:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `destination_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `destination_profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `destination_name`, `destination_profile`) VALUES
(27, 'Nairobi: The Vibrant Capital', '<p style=\"text-align:justify\"><span style=\"font-size:16px\">Welcome to Nairobi, the pulsating heart of Kenya and East Africa&#39;s economic powerhouse. Nestled between the Ngong Hills and the Great Rift Valley, Nairobi seamlessly blends modernity with nature. As the capital city, Nairobi boasts a rich cultural tapestry, offering an array of attractions and experiences.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Attractions:</strong></span></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p style=\"text-align:justify\"><span style=\"font-size:16px\"><em>Nairobi National Park:</em> A unique feature of the city, Nairobi National Park allows you to witness wildlife against the backdrop of skyscrapers. Lions, giraffes, and zebras roam freely in this urban wilderness.</span></p>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"../assets/uploads/images/1465295369.jpg\" style=\"height:667px; width:1000px\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p style=\"text-align:justify\"><span style=\"font-size:16px\"><em>Karen Blixen Museum:</em> Step into the world of the famous Danish author at her former residence. The museum showcases Blixen&#39;s life and the setting of her acclaimed novel, &quot;Out of Africa.&quot;</span></p>\r\n	</li>\r\n	<li>\r\n	<p style=\"text-align:justify\"><span style=\"font-size:16px\"><em>Giraffe Centre:</em> Interact with these elegant creatures at the Giraffe Centre, where the endangered Rothschild&#39;s giraffes freely roam. Don&#39;t miss the chance to feed and photograph these gentle giants.</span></p>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Cultural Delights:</strong></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:16px\">Nairobi is a melting pot of cultures, evident in its diverse neighborhoods. Explore the Maasai Market for traditional crafts, or visit the vibrant Kibera, one of Africa&#39;s largest informal settlements, to experience the resilience and creativity of its residents.</span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Modern Nairobi:</strong></span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:16px\">The city&#39;s skyline is dotted with modern architectural marvels, including the iconic Kenyatta International Convention Centre (KICC). Enjoy panoramic views from the observation deck and explore the bustling city below.</span></li>\r\n</ul>\r\n'),
(28, 'Mombasa: Where History Meets the Ocean', '<p style=\"text-align:justify\"><span style=\"font-size:16px\">Mombasa, Kenya&#39;s coastal gem, beckons with its historic charm, stunning beaches, and Swahili culture. This ancient port city has witnessed the ebb and flow of centuries, leaving behind a rich tapestry of history and tradition.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Historical Landmarks:</strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"color:#e74c3c\"><em>Fort Jesus:</em> A UNESCO World Heritage Site</span>, Fort Jesus stands as a testament to Mombasa&#39;s tumultuous past. Explore this 16th-century fortress and museum, which narrates the city&#39;s history through artifacts and exhibits.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><span style=\"color:#e74c3c\"><em>Old Town:</em> </span>Lose yourself in the narrow, winding streets of Old Town, where Swahili architecture, vibrant markets, and aromatic spice bazaars transport you back in time.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Beach Bliss:</strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Mombasa is renowned for its pristine beaches. Diani, Nyali, and Bamburi offer sun-soaked shores, water sports, and vibrant nightlife. Unwind on the white sands or dive into the crystal-clear waters of the Indian Ocean.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>Cultural Fusion:</strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:16px\">Immerse yourself in Swahili culture by savoring local dishes like biryani and samosas, and experience the rhythmic beats of Taarab music during a cultural performance.</span></p>\r\n'),
(29, 'Kisumu: Lakeside Serenity', '<p>Nestled along the shores of Lake Victoria, Kisumu is a tranquil city that provides a perfect blend of urban amenities and natural beauty. Known as the &quot;City of Impala,&quot; Kisumu is a gateway to the western region of Kenya.</p>\r\n\r\n<p><strong>Lakefront Attractions:</strong></p>\r\n\r\n<p><em>Dunga Beach:</em> Experience the laid-back atmosphere of Dunga Beach, where you can enjoy boat rides, fresh fish delicacies, and breathtaking sunsets over Lake Victoria.</p>\r\n\r\n<p><em>Impala Sanctuary:</em> Home to graceful impalas, giraffes, and other wildlife, this sanctuary offers a serene escape within the city. Stroll along nature trails and enjoy bird watching in this peaceful haven.</p>\r\n\r\n<p><strong>Cultural Experiences:</strong></p>\r\n\r\n<p>Kisumu Museum showcases the cultural heritage of the region, featuring traditional artifacts, ethnographic exhibits, and a botanical garden.</p>\r\n\r\n<p>Attend the annual Kisumu International Film Festival, a celebration of African cinema, attracting filmmakers and enthusiasts from around the globe.</p>\r\n\r\n<p><strong>Urban Delights:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"../assets/uploads/images/441516395.jpg\" style=\"height:562px; width:1000px\" /></p>\r\n\r\n<p>Explore vibrant markets such as Kibuye and Oile for local crafts, fresh produce, and a taste of Kisumu&#39;s urban life.</p>\r\n'),
(31, 'Maasai Mara', '<p><strong>Discovering the Majesty of Maasai Mara: Exploring Kenya&#39;s Iconic Safari Destination</strong></p>\r\n\r\n<p>Nestled in the southwest region of Kenya, Maasai Mara stands as a beacon of untamed wilderness, captivating visitors with its breathtaking landscapes, diverse wildlife, and rich cultural heritage. Renowned as one of Africa&#39;s premier safari destinations, Maasai Mara promises an unforgettable adventure for those seeking to immerse themselves in the heart of the wild.</p>\r\n\r\n<p><strong>Introduction to Maasai Mara</strong></p>\r\n\r\n<p>Spanning over 1,500 square kilometers of rolling plains, acacia-dotted savannas, and meandering rivers, Maasai Mara National Reserve is a sanctuary for an incredible array of wildlife. Named after the Maasai people who have inhabited the region for centuries and the Mara River that flows through its midst, this iconic reserve forms part of the larger Serengeti ecosystem, famous for the Great Migration of wildebeest, zebras, and gazelles.</p>\r\n\r\n<p><strong>Wildlife Encounters</strong></p>\r\n\r\n<p>The allure of Maasai Mara lies in its extraordinary wildlife sightings, offering visitors the chance to witness the Big Five - lions, elephants, buffaloes, leopards, and rhinoceros - in their natural habitat. Game drives through the reserve provide unparalleled opportunities to observe these majestic creatures up close, whether it&#39;s a pride of lions lounging in the shade, a herd of elephants crossing the plains, or a stealthy leopard perched on a tree branch.</p>\r\n\r\n<p>Moreover, the annual Great Migration is a spectacle like no other, as millions of wildebeest and zebras make their perilous journey across the Mara River in search of greener pastures. The sight of thousands of animals thundering across the plains is a testament to the raw power and beauty of nature, making it a bucket-list experience for wildlife enthusiasts and photographers alike.</p>\r\n\r\n<p><strong>Safari Experiences</strong></p>\r\n\r\n<p>Embarking on a safari adventure in Maasai Mara is a transformative experience, offering a glimpse into the rhythm of life in the African wilderness. Visitors can choose from a variety of safari activities, including morning and evening game drives, hot air balloon safaris, walking safaris, and cultural visits to Maasai villages.</p>\r\n\r\n<p>The golden hues of sunrise and sunset cast a magical spell over the savanna, painting the landscape in hues of orange and gold as wildlife awakens or settles down for the night. Game drives during these times offer the best chances of encountering elusive predators on the prowl or witnessing the drama of a hunt unfolding before your eyes.</p>\r\n\r\n<p>For a truly unforgettable experience, taking to the skies on a hot air balloon safari provides a bird&#39;s-eye view of Maasai Mara&#39;s vast plains, offering panoramic vistas of the sprawling landscape and its inhabitants below. Drifting serenely above the savanna as the sun rises is a surreal and awe-inspiring experience that will stay with you long after your journey ends.</p>\r\n\r\n<p><strong>Conservation Efforts</strong></p>\r\n\r\n<p>As stewards of the land, conservation efforts play a crucial role in preserving Maasai Mara&#39;s pristine ecosystem for future generations to enjoy. Various organizations and conservationists work tirelessly to protect the reserve&#39;s biodiversity, combat poaching, and promote sustainable tourism practices that minimize the impact on the environment and local communities.</p>\r\n\r\n<p>Initiatives such as community-based conservancies, wildlife monitoring programs, and anti-poaching patrols are instrumental in safeguarding Maasai Mara&#39;s wildlife and habitats. Additionally, responsible tourism practices, such as staying at eco-friendly lodges and camps, supporting local communities, and respecting wildlife and their natural behaviors, are essential in ensuring the long-term conservation of this iconic landscape.</p>\r\n\r\n<p><strong>Cultural Immersion</strong></p>\r\n\r\n<p>Beyond its natural wonders, Maasai Mara offers a glimpse into the rich cultural heritage of the Maasai people, one of Kenya&#39;s most renowned ethnic groups. Visitors have the opportunity to engage with Maasai communities, learning about their traditional way of life, customs, and rituals.</p>\r\n\r\n<p>A visit to a Maasai village provides insight into their nomadic lifestyle, characterized by colorful attire, intricate beadwork, and age-old traditions passed down through generations. Witnessing traditional dances, participating in spear-throwing competitions, and shopping for handmade crafts at local markets are just some of the cultural experiences that await visitors to Maasai Mara.</p>\r\n\r\n<p><strong>Conclusion</strong></p>\r\n\r\n<p>In conclusion, Maasai Mara stands as a testament to the untamed beauty and diversity of Kenya&#39;s wilderness. From its iconic wildlife sightings and awe-inspiring landscapes to its rich cultural heritage and conservation efforts, Maasai Mara offers a truly immersive safari experience that leaves a lasting impression on all who venture into its embrace. Whether you&#39;re a seasoned safari enthusiast or embarking on your first African adventure, Maasai Mara beckons with its unparalleled magic, promising an adventure of a lifetime amidst the wonders of the wild.</p>\r\n'),
(32, 'Malindi', '<p>Nestled along the pristine shores of the Indian Ocean, Malindi beckons travelers with its idyllic beaches, rich Swahili heritage, and vibrant culture. Located on the Kenyan coast, this coastal town boasts a unique blend of history, natural beauty, and modern amenities, making it a must-visit destination for those seeking sun, sand, and adventure.</p>\r\n\r\n<p>With its azure waters, swaying palm trees, and golden sands, Malindi epitomizes the quintessential tropical paradise. Originally founded as a Swahili settlement in the 14th century, the town has a storied past influenced by Arab traders, Portuguese explorers, and European colonizers. Today, Malindi retains its multicultural heritage, evident in its architecture, cuisine, and customs.</p>\r\n\r\n<p><strong>Beach Escapes</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"../assets/uploads/images/1383735047.jpg\" style=\"height:733px; width:1100px\" /></strong></p>\r\n\r\n<p>Malindi is renowned for its pristine beaches, which offer the perfect setting for relaxation and water-based activities. From the popular stretch of sand at Malindi Beach to the secluded coves of Watamu and the pristine shores of Che Shale, there&#39;s a beach for every traveler&#39;s preference. Visitors can sunbathe, swim, snorkel, dive, or simply stroll along the shoreline, soaking in the tranquil ambiance and panoramic views of the ocean.</p>\r\n\r\n<p><strong>Historical and Cultural Attractions</strong></p>\r\n\r\n<p>Beyond its beaches, Malindi boasts a wealth of historical and cultural attractions waiting to be explored. Highlights include the UNESCO-listed Gede Ruins, an ancient Swahili settlement dating back to the 12th century, and the Vasco da Gama Pillar, erected by the Portuguese explorer during his voyage to India in 1498. Additionally, visitors can explore the vibrant markets, mosques, and Swahili architecture that dot the town, offering insights into Malindi&#39;s rich heritage.</p>\r\n\r\n<p><strong>Marine Conservation</strong></p>\r\n\r\n<p>Malindi is also a hub for marine conservation efforts, with several organizations dedicated to protecting the region&#39;s rich biodiversity. The nearby Watamu Marine National Park and Reserve, home to vibrant coral reefs, diverse marine life, and nesting sea turtles, provides opportunities for snorkeling, diving, and eco-friendly boat tours. Visitors can learn about conservation initiatives, participate in beach cleanups, and support local projects aimed at preserving the marine environment for future generations.</p>\r\n\r\n<p><strong>Culinary Delights</strong></p>\r\n\r\n<p>No visit to Malindi is complete without sampling its delectable cuisine, influenced by Swahili, Arabic, Indian, and European flavors. From fresh seafood dishes like grilled lobster and coconut-infused curries to Swahili delicacies such as pilau rice and samosas, the culinary scene in Malindi is a feast for the senses. Visitors can dine at seaside restaurants, street food stalls, and local eateries, savoring the diverse flavors of coastal Kenya.</p>\r\n\r\n<p><strong>Conclusion</strong></p>\r\n\r\n<p>In conclusion, Malindi captivates travelers with its stunning beaches, rich history, vibrant culture, and commitment to marine conservation. Whether you&#39;re seeking relaxation, adventure, or cultural immersion, Malindi offers an unforgettable experience that celebrates the beauty and diversity of Kenya&#39;s coastal heritage.</p>\r\n\r\n<hr />'),
(33, 'Mount Kenya', '<p>Rising majestically above the equatorial plains of Kenya, Mount Kenya stands as the country&#39;s highest peak and a beacon for adventurers and nature enthusiasts alike. With its snow-capped summits, pristine glaciers, and diverse ecosystems, Mount Kenya offers a challenging yet rewarding ascent, <em>promising unparalleled vistas and unforgettable experiences for those who dare to conquer its heights.</em></p>\r\n\r\n<p><strong>Introduction to Mount Kenya</strong></p>\r\n\r\n<p>Formed by volcanic activity over millions of years, Mount Kenya is a UNESCO World Heritage Site and one of Africa&#39;s most iconic mountains. Named after the traditional Kikuyu name &quot;Kirinyaga,&quot; meaning &quot;Mountain of Whiteness,&quot; Mount Kenya boasts a series of jagged peaks, with Batian and Nelion standing as the highest points at over 5,000 meters above sea level.</p>\r\n\r\n<p><strong>Hiking and Climbing Routes</strong></p>\r\n\r\n<p>Mount Kenya offers a range of hiking and climbing routes catering to all levels of experience and fitness. The most popular route, the Sirimon Route, offers a scenic ascent through montane forests, alpine moorlands, and rugged terrain, culminating in breathtaking views from Point Lenana, the third-highest peak. Other routes, such as the Chogoria Route and Naro Moru Route, provide alternative approaches to the summit, each offering its own challenges and rewards.</p>\r\n\r\n<p><strong>Flora and Fauna</strong></p>\r\n\r\n<p>Mount Kenya&#39;s diverse ecosystems support a rich variety of flora and fauna, from dense forests teeming with wildlife to alpine meadows dotted with unique plant species. Visitors may encounter elephants, buffaloes, antelopes, and even elusive leopards in the lower slopes, while high-altitude areas are home to endemic species such as the giant lobelia and the unique mountain bamboo. Birdwatchers will delight in spotting colorful avian species, including the rare and endangered lammergeier, soaring overhead.</p>\r\n\r\n<p><strong>Cultural Heritage</strong></p>\r\n\r\n<p>Mount Kenya holds cultural significance for the indigenous communities that call its slopes home, including the Kikuyu, Embu, and Meru peoples. Sacred sites, traditional shrines, and ancient rituals are integral to the cultural heritage of these communities, reflecting their deep connection to the mountain and the natural world. Visitors can learn about local traditions, folklore, and customs through guided tours, homestays, and cultural experiences offered by community-based tourism initiatives.</p>\r\n\r\n<p><strong>Conservation Challenges</strong></p>\r\n\r\n<p>Despite its natural beauty and cultural importance, Mount Kenya faces numerous conservation challenges, including deforestation, habitat degradation, and the impacts of climate change. Efforts to preserve the mountain&#39;s ecosystems are underway, with initiatives focused on reforestation, sustainable land management, and community engagement. Responsible tourism practices, such as Leave No Trace principles and supporting eco-friendly lodges, play a crucial role in protecting Mount Kenya for future generations to enjoy.</p>\r\n\r\n<p><strong>Conclusion</strong></p>\r\n\r\n<p>In conclusion, Mount Kenya offers a true wilderness adventure for outdoor enthusiasts and nature lovers seeking to challenge themselves and experience the beauty of Africa&#39;s second-highest peak. With its stunning landscapes, rich biodiversity, and cultural heritage, Mount Kenya promises an unforgettable journey to the roof of Africa, where the spirit of adventure meets the wonders of the natural world.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `destination_images`
--

DROP TABLE IF EXISTS `destination_images`;
CREATE TABLE IF NOT EXISTS `destination_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `destination_id` int NOT NULL,
  `image_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination_images`
--

INSERT INTO `destination_images` (`id`, `destination_id`, `image_name`) VALUES
(28, 26, 'rhino-4422728_1280.jpg'),
(29, 27, 'nairobi-2770345_1280.jpg'),
(30, 28, 'old-port-271664_1280.jpg'),
(31, 29, 'kit-mikayi-1111408_1280.jpg'),
(32, 30, 'indigenous-peoples-7460268_1280.jpg'),
(33, 31, 'ndere-island-national.jpg'),
(34, 32, 'africa-4052504_1280.jpg'),
(35, 32, 'camel-2042792_1280.jpg'),
(36, 33, 'mount-kenya-7377719_1280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_email` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `sender_email`, `receiver_email`, `message`, `sent_at`, `type`) VALUES
(44, 'geojimagut@gmail.com', 'info@pulmmertours.com', 'This is the message I wanna send', '2024-03-12 08:40:34', 0),
(52, 'geojimagut@gmail.com', 'info@pulmmertours.com', 'Here is the message', '2024-04-01 21:38:47', 0),
(53, 'mailme.kimagutgeorges@gmail.com', 'info@pulmmertours.com', 'I wanna write something cool', '2024-04-01 21:46:16', 0),
(54, 'info@pulmmertours.com', 'mailme.kimagutgeorges@gmail.com', 'Why should I reply to you again', '2024-04-01 21:46:43', 1),
(55, 'info@pulmmertours.com', 'geojimagut@gmail.com', 'I want to try and see how it goes', '2024-04-01 21:47:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `faq_id` int NOT NULL AUTO_INCREMENT,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `faq_question`, `faq_answer`) VALUES
(8, 'What types of tours does Pulmmer Tours offer?', 'Pulmmer Tours offers a variety of tours, including wildlife safaris, cultural tours, adventure expeditions, and city tours, showcasing the diverse attractions of Kenya.'),
(9, 'How experienced are the tour guides?', 'Pulmmer Tours employs experienced and knowledgeable guides who are passionate about showcasing Kenya\'s beauty and culture, providing informative and engaging experiences.'),
(10, 'What safety measures are implemented during tours?', 'Pulmmer Tours prioritizes safety by using well-maintained vehicles, adhering to safety regulations, and employing experienced drivers and guides trained in first aid and emergency procedures.'),
(11, 'What is the company\'s cancellation and refund policy?', 'Pulmmer Tours has a clear cancellation and refund policy outlined in its terms and conditions, which may vary depending on factors such as timing and tour type.');

-- --------------------------------------------------------

--
-- Table structure for table `home_slide`
--

DROP TABLE IF EXISTS `home_slide`;
CREATE TABLE IF NOT EXISTS `home_slide` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(200) NOT NULL,
  `hotel_price` int NOT NULL,
  `hotel_location` int NOT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_images`
--

DROP TABLE IF EXISTS `hotel_images`;
CREATE TABLE IF NOT EXISTS `hotel_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) NOT NULL,
  `hotel` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

DROP TABLE IF EXISTS `itinerary`;
CREATE TABLE IF NOT EXISTS `itinerary` (
  `itinerary_id` int NOT NULL AUTO_INCREMENT,
  `pack_id` int NOT NULL,
  `day_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `activity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`itinerary_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`itinerary_id`, `pack_id`, `day_title`, `activity`) VALUES
(59, 37, 'Day 1: Arrival in Kisumu', 'Spend the morning at leisure for shopping or relaxation.\r\nCheck-out from your hotel and transfer to Kisumu International Airport for departure.\r\nEnd of the tour.'),
(60, 37, 'Day 2: Discovering Kisumu City', 'Explore Kisumu\'s vibrant markets in the morning, including Kibuye Market and Oile Market.\nVisit the Kisumu Museum to learn about the region\'s history, culture, and natural history.\nEmbark on a sunset boat cruise on Lake Victoria, admiring the stunning views.\nDine at a lakeside restaurant, enjoying fresh fish and local delicacies.\nOvernight stay at your hotel in Kisumu.'),
(61, 37, 'Day 3: Exploring Lake Victoria', 'Take a full-day excursion to Rusinga Island and Takawiri Island on Lake Victoria.\nExplore Rusinga Island, including visits to Tom Mboya Mausoleum and Rusinga Island Museum.\nContinue to Takawiri Island for relaxation, beach activities, and snorkeling.\nEnjoy a picnic lunch on the shores of Lake Victoria.\nReturn to Kisumu in the late afternoon.\nDinner and overnight stay at your hotel in Kisumu.'),
(62, 37, 'Day 4: Departure', 'Spend the morning at leisure for shopping or relaxation.\nCheck-out from your hotel and transfer to Kisumu International Airport for departure.\nEnd of the tour.'),
(63, 38, 'Morning', 'Begin your day with a visit to the iconic Kit Mikayi rock formation, located approximately 40 kilometers from Kisumu city center. Marvel at this unique geological wonder and learn about its cultural significance to the local Luo community.'),
(64, 38, 'Mid-Morning', 'Head back to Kisumu and explore the bustling Kibuye Market. Immerse yourself in the vibrant atmosphere as you browse through stalls selling fresh produce, traditional crafts, and clothing. Engage with friendly vendors and sample some local delicacies.'),
(65, 38, 'Lunch', 'Enjoy a delicious lunch at a lakeside restaurant, savoring fresh fish caught from Lake Victoria and other Kenyan specialties.'),
(66, 38, 'Evening', 'After a memorable day exploring Kisumu\'s attractions, transfer back to your accommodation or Kisumu International Airport for your onward journey, carrying with you the cherished experiences of your time in this captivating city by the lake'),
(67, 38, 'Departure', 'After a memorable day exploring Kisumu\'s attractions, transfer back to your accommodation or Kisumu International Airport for your onward journey, carrying with you the cherished experiences of your time in this captivating city by the lake'),
(68, 39, 'Day 1: Urban Exploration', 'Begin your exploration of Nairobi with a visit to the David Sheldrick Wildlife Trust, where orphaned baby elephants are cared for. Witness their feeding and playful antics, supporting the conservation efforts of this renowned organization. Then, head to the Giraffe Centre in Karen and get up close with the endangered Rothschild\'s giraffes, hand-feeding them from an elevated platform. Dive into the history of colonial Kenya at the Karen Blixen Museum, once the home of the famous Danish author of \"Out of Africa.\"'),
(69, 39, 'Day 2: Wildlife and Culture', 'Embark on an early morning safari adventure at Nairobi National Park, just a stone\'s throw from the city center. Spot a variety of wildlife against the backdrop of Nairobi\'s skyline, including lions, rhinos, giraffes, and zebras. Continue your wildlife exploration at the Nairobi Animal Orphanage, where rescued and rehabilitated animals, such as lions, cheetahs, and baboons, can be seen. Enjoy a picnic lunch amidst the scenic landscapes of Nairobi National Park. '),
(70, 40, 'Day 1: Arrival in Nairobi', 'Arrive in Nairobi, the vibrant capital of Kenya, and transfer to your hotel. Spend the evening relaxing and preparing for your upcoming safari adventure.'),
(71, 40, 'Day 2: Amboseli National Park - Land of Giants', 'Head to Amboseli National Park, famous for its large herds of elephants and stunning views of Mount Kilimanjaro. Embark on an afternoon game drive to witness the park\'s diverse wildlife against the backdrop of Africa\'s highest peak.'),
(72, 40, 'Day 3: Full Day in Amboseli', 'Spend a full day exploring Amboseli National Park. Enjoy morning and afternoon game drives, with opportunities to see lions, cheetahs, giraffes, and more. Marvel at the sight of elephants wandering across the vast plains, with Kilimanjaro looming in the distance.'),
(73, 40, 'Day 4: Lake Nakuru National Park - Flamingo Haven', 'Depart for Lake Nakuru National Park, known for its abundance of birdlife, including thousands of flamingos that flock to its shores. Embark on an afternoon game drive to spot rhinos, buffaloes, and other wildlife against the picturesque backdrop of the lake.'),
(74, 40, 'Day 5: Maasai Mara National Reserve - Big Five Territory', 'Travel to the world-famous Maasai Mara National Reserve, home to the Big Five and the annual Great Migration. Arrive in time for lunch at your lodge, followed by an afternoon game drive to search for lions, leopards, and other predators.'),
(75, 40, 'Day 6: Full Day in Maasai Mara', 'Spend a full day exploring the vast plains of Maasai Mara. Embark on morning and afternoon game drives to witness the incredible diversity of wildlife, from herds of wildebeest and zebras to graceful giraffes and elusive cheetahs.'),
(76, 40, 'Day 7: Return to Nairobi', 'Return to Nairobi\nDepart Maasai Mara for Nairobi, with a stop at the Great Rift Valley viewpoint for breathtaking panoramic views. Arrive in Nairobi in the late afternoon, where you can enjoy a farewell dinner before transferring to the airport for your onward journey.'),
(78, 41, 'Day 1: Exploring Malindi and Watamu', 'Arrive in Malindi and check into your beachfront resort. Spend the day relaxing by the Indian Ocean, soaking in the sun, and enjoying the serene coastal atmosphere. Take a leisurely stroll along the sandy beaches, dip your toes in the crystal-clear waters, and unwind in paradise.'),
(79, 41, 'Day 2: Departure from Malindi', 'In the morning, explore the charms of Malindi town. Visit the historic Vasco da Gama Pillar, erected by the Portuguese explorer during his voyage to India, and explore the Malindi Museum to learn about the town\'s rich Swahili heritage. Enjoy lunch at a local restaurant, sampling fresh seafood dishes and Swahili delicacies.'),
(77, 41, 'Day 3: Arrival in Malindi', 'After breakfast, enjoy some leisure time to soak in the final moments of your coastal escape. Take a last-minute swim in the ocean, collect seashells along the shore, or simply relax and savor the tranquility of your surroundings.'),
(80, 42, 'Day 1: Nanyuki to Shipton\'s Camp', 'Depart from Nanyuki early in the morning and drive to the Sirimon Gate, the starting point of your trek. Begin your ascent through the montane forests of Mount Kenya, surrounded by towering trees and the sounds of birdsong. Arrive at Old Moses Camp for a rest and lunch break before continuing your trek to Shipton\'s Camp. Traverse through the scenic moorlands, with panoramic views of the surrounding peaks, before reaching your overnight accommodation at Shipton\'s Camp. Enjoy dinner and rest under the starlit sky, anticipating the summit attempt tomorrow.'),
(81, 42, 'Day 2: Summit Attempt and Descent', 'Wake before dawn and prepare for the highlight of your expedition: the summit attempt to Point Lenana. Begin the challenging ascent under the glow of headlamps, trekking through rocky terrain and snowfields as you make your way to the summit. Reach Point Lenana in time to witness the spectacular sunrise over the African plains, with views stretching as far as the eye can see. Celebrate your achievement before beginning the descent back to Shipton\'s Camp. After breakfast and a brief rest, continue your descent through the alpine landscape, retracing your steps back to the Sirimon Gate. Bid farewell to Mount Kenya and transfer back to Nanyuki, where you can enjoy a well-deserved meal and reminisce about your unforgettable trekking experience.\r\n\r\nDepart with memories of your epic Mount Kenya adventure, feeling inspired by the beauty of nature and the triumph of reaching the summit of this legendary mountain.');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `latitude` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `longitude` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `latitude`, `longitude`, `name`) VALUES
(1, '0.20387000', '35.10500000', 'Kapsabet, Kenya');

-- --------------------------------------------------------

--
-- Table structure for table `mail_files`
--

DROP TABLE IF EXISTS `mail_files`;
CREATE TABLE IF NOT EXISTS `mail_files` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `email_id` int NOT NULL,
  `file` varchar(200) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `package_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `package_duration` int NOT NULL,
  `package_destination` int NOT NULL,
  `package_tour` int NOT NULL,
  `seasons` int DEFAULT NULL,
  `package_price` int NOT NULL,
  `package_overview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deal` int NOT NULL,
  `offer` int NOT NULL DEFAULT '0',
  `package_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_duration`, `package_destination`, `package_tour`, `seasons`, `package_price`, `package_overview`, `deal`, `offer`, `package_creation`) VALUES
(32, 'Nairobi Urban Adventure', 2, 0, 0, 4, 345, '<p><span style=\"font-size:16px\">Welcome to Nairobi, the pulsating heart of Kenya and East Africa&#39;s economic powerhouse. Nestled between the Ngong Hills and the Great Rift Valley, Nairobi seamlessly blends modernity with nature.</span></p>\r\n', 0, 0, '2024-03-29 13:35:42'),
(37, 'By the Lakeside', 4, 29, 2, 2, 640, '<p>Embark on a captivating 4-day journey to Kisumu, a vibrant city nestled on the shores of Lake Victoria, Kenya&#39;s largest freshwater lake. Rich in culture, history, and natural beauty, Kisumu offers a unique blend of urban life and serene landscapes. This tour is designed to immerse you in the essence of Kisumu, from exploring its bustling markets to experiencing the tranquility of the lake.</p>\r\n', 1, 10, '2024-04-03 16:26:50'),
(38, 'One Day Tour of Kisumu', 1, 29, 3, 3, 350, '<p>Embark on an enriching one-day journey to discover the highlights of Kisumu, a charming city nestled on the shores of Lake Victoria.</p>\r\n', 1, 5, '2024-04-04 11:21:05'),
(39, '2-wende Nairobi', 2, 27, 3, 3, 430, '<p>Explore the vibrant capital city of Kenya, Nairobi, in this immersive two-day tour. From wildlife encounters to cultural experiences, discover the best of Nairobi&#39;s attractions in just two days.</p>\r\n', 0, 0, '2024-04-04 13:24:27'),
(40, 'Classic Kenya Safari Adventure', 7, 27, 1, 5, 1340, '<p>Embark on a classic Kenya safari adventure, where the untamed wilderness of Amboseli, the flamingo-filled shores of Lake Nakuru, and the iconic plains of Maasai Mara await. Journey through diverse landscapes, from the shadow of Mount Kilimanjaro to the heart of the Great Rift Valley, as you seek out Africa&#39;s most majestic wildlife on this unforgettable safari experience.</p>\r\n', 1, 10, '2024-04-09 19:19:06'),
(41, 'Coastal Escape to Malindi and Watamu', 5, 32, 3, 3, 540, '<p>Escape to the tropical paradise of Kenya&#39;s coast, where the turquoise waters of Malindi and the vibrant marine life of Watamu beckon. <em>Discover the rich Swahili</em> heritage of Malindi, explore ancient ruins and pristine beaches, and immerse yourself in the natural wonders of the<strong> Indian Ocean on this coastal getaway.</strong></p>\r\n', 0, 0, '2024-04-09 19:27:40'),
(42, 'Mount Kenya Trekking Expedition', 2, 33, 6, 5, 700, '<p>Embark on an exhilarating Mount Kenya trekking expedition, where you&#39;ll journey to the heart of Africa&#39;s second-highest peak and conquer its majestic summit. <strong><span style=\"color:#e74c3c\">Experience</span></strong> the thrill of hiking through diverse landscapes, from lush montane forests to rugged alpine terrain, as you challenge yourself and soak in the breathtaking beauty of this iconic mountain.</p>\r\n', 0, 0, '2024-04-09 19:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `package_images`
--

DROP TABLE IF EXISTS `package_images`;
CREATE TABLE IF NOT EXISTS `package_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `package_id` int NOT NULL,
  `image_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_images`
--

INSERT INTO `package_images` (`id`, `package_id`, `image_name`) VALUES
(67, 32, 'baby-elephants-4748163_1280.jpg'),
(68, 32, 'lions-7763323_1280.jpg'),
(69, 32, 'zebra-838562_1280.jpg'),
(76, 37, 'kit-mikayi-1111408_1280.jpg'),
(77, 37, 'old-port-271664_1280.jpg'),
(78, 38, '1-30.jpg'),
(79, 38, 'ndere-island-national.jpg'),
(80, 38, 'S1050548.jpeg'),
(81, 39, 'baby-elephants-4748163_1280.jpg'),
(82, 39, 'lions-7763323_1280.jpg'),
(83, 39, 'zebra-838562_1280.jpg'),
(84, 40, 'common-zebra-7235516_1280.jpg'),
(85, 40, 'nairobi-2770345_1280.jpg'),
(86, 40, 'wildebeest-migration-3995945_1280.jpg'),
(87, 41, 'africa-4052504_1280.jpg'),
(88, 41, 'young-woman-1745173_1280.jpg'),
(89, 42, 'mount-kenya-7377719_1280.jpg'),
(90, 42, 'mount-kenya-7377780_1280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `transaction_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
  `method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `phone`, `date`, `transaction_id`, `amount`, `method`) VALUES
(1, '759200998', '2023-06-03 10:55:03', 'RF211VP563', 1, 'M-pesa');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reviewer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `review_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `package_id` int NOT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
CREATE TABLE IF NOT EXISTS `seasons` (
  `season_id` int NOT NULL AUTO_INCREMENT,
  `season` varchar(200) NOT NULL,
  PRIMARY KEY (`season_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`season_id`, `season`) VALUES
(1, 'Christmas'),
(2, 'Easter'),
(3, 'Short Holidays'),
(4, 'Ramadhan Deals'),
(5, 'School Holidays'),
(6, 'Wildebeest Migration');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int NOT NULL AUTO_INCREMENT,
  `currency` varchar(20) DEFAULT NULL,
  `recaptcha` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `recaptcha_key` text,
  `recaptcha_secret` text,
  `smtp_host` varchar(200) DEFAULT NULL,
  `smtp_username` varchar(200) DEFAULT NULL,
  `smtp_password` text NOT NULL,
  `system_email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `currency`, `recaptcha`, `recaptcha_key`, `recaptcha_secret`, `smtp_host`, `smtp_username`, `smtp_password`, `system_email`) VALUES
(1, '$', 'No', '6Le6y5UpAAAAAGyDBSCMvr2EcVQLYwbKsaaCXlho', '6Le6y5UpAAAAAPgsnmNKvbK1rlE2j1j02dnTP7W9', 'smtp.gmail.com', 'yako.mailer@gmail.com', 'aefh qgeu gpbh wrjw', 'geojimagut@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tailor`
--

DROP TABLE IF EXISTS `tailor`;
CREATE TABLE IF NOT EXISTS `tailor` (
  `tailor_id` int NOT NULL AUTO_INCREMENT,
  `arrival_date` date NOT NULL,
  `days` int NOT NULL,
  `adults` int NOT NULL,
  `children` int NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`tailor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tailor`
--

INSERT INTO `tailor` (`tailor_id`, `arrival_date`, `days`, `adults`, `children`, `full_name`, `email`, `phone`, `message`) VALUES
(2, '2024-04-17', 3, 2, 1, 'George Kimagut', 'someone@example.com', 759200998, 'What should I do');

-- --------------------------------------------------------

--
-- Table structure for table `tour_type`
--

DROP TABLE IF EXISTS `tour_type`;
CREATE TABLE IF NOT EXISTS `tour_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tour_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_type`
--

INSERT INTO `tour_type` (`id`, `tour_name`) VALUES
(1, 'Group Tours'),
(2, 'Honey moon'),
(3, 'Individual'),
(4, 'Corporate Tours'),
(5, 'Business'),
(6, 'Excursions');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'geojimagut@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `full_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `full_name`, `password`, `type`) VALUES
(2, 'danielomwero@yahoo.com', 'Daniel Omwero', '0192023a7bbd73250516f069df18b500', 0),
(3, 'geojimagut@gmail.com', 'George Kimagut', '0192023a7bbd73250516f069df18b500', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
