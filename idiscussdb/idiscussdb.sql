-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 12:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscussdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(250) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `c_desc` varchar(250) NOT NULL,
  `c_images` varchar(255) NOT NULL,
  `c_reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_desc`, `c_images`, `c_reg_date`) VALUES
(1, 'python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically typed and garbage-collect.', 'card-1.jpg', '2024-01-12 14:22:34'),
(2, 'java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is a general-purpose programming language.', 'card-2.jpg', '2024-01-12 14:24:10'),
(3, 'javascript', 'JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.', 'card-3.jpg', '2024-01-12 14:25:49'),
(4, 'c++', 'C++ is a high-level, general-purpose programming language created by Danish computer scientist Bjarne Stroustrup. First released in 1985 as an extension of the C programming language.', 'card-4.jpg', '2024-01-12 14:26:19'),
(5, 'php', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.', 'card-5.jpg', '2024-01-12 14:27:23'),
(6, 'react js', 'React is a free and open-source front-end JavaScript library for building user interfaces based on components. It is maintained by Meta and a community of individual developers and companies.', 'card-6.jpg', '2024-01-12 14:29:24'),
(7, 'other programming related questions', 'Ask any type of programming related question.', 'card-7.jpg', '2024-01-12 14:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(255) NOT NULL,
  `comment_by` int(255) NOT NULL,
  `comment_on_id` int(255) NOT NULL,
  `active` int(255) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_on_id`, `active`, `comment_date`) VALUES
(1, 'setup.py is a python file, the presence of which is an indication that the module/package you are about to install has likely been packaged and distributed with Distutils, which is the standard for distributing Python Modules.', 1, 2, 1, 1, '2024-01-12 15:34:34'),
(2, '$ pip install : - pip will use setup.py to install your module. Avoid calling setup.py directly.', 1, 7, 1, 1, '2024-01-12 15:36:33'),
(3, 'Why are you using an RC release?', 2, 1, 3, 1, '2024-01-12 15:55:57'),
(4, 'then which one to download I am new to python please help me to install?', 2, 3, 3, 0, '2024-01-12 15:56:30'),
(5, 'This error manifests when installing Python as a Windows Store app, too.  Open \'Manage App Execution Aliases\' through Start and disable all the Python entries before installing. After installation successfully completes, enable the appropriate aliases for python.exe, python3.exe and possible other version-specific ones.', 2, 4, 3, 1, '2024-01-12 15:57:48'),
(6, 'One of your files is corrupted. Simply download Jarfix and run it.\r\n\r\nThe Breakdown has an easy and helpful website to using Jarfix. Simply follow the instructions and download it in the link below:\r\n\r\nlink - https://thebreakdown.xyz/jarfix-to-repair-jar-files-on-your-pc/', 3, 1, 4, 1, '2024-01-12 16:00:56'),
(7, 'This usually happens due to Package Cache Folder absent in your local data.\r\n\r\nCheck the python log (from your installation window; where you see the error), scroll down to the end. After Restore Point Creation point log, you would find that it is unable to transfer file from local temp cache to this location C:\\Users&lt;>\\AppData\\local\\Package Cache.\r\nTo isolate this, check if the path exists in your system or not? If not then please create the folder name Package Cache in local folder.\r\n\r\nOnce you do, you would notice that fodler is populated with some temporary downloads.\r\n\r\nReinstall the python package. This time it will install.\r\nI had the same issue in my organization where I was using VDI. The folder was not present there and thats why everytime it comes to that point, it was failing.\r\n\r\nI was able to fix the issue.', 2, 5, 3, 1, '2024-01-12 16:02:48'),
(8, 'ty tho', 2, 3, 3, 0, '2024-01-12 16:06:01'),
(9, 'This isn\'t very helpful. You are shoving vocabulary and instructions that probably don\'t make sense to him. You are tell him to see his output however he most likely don\'t know what to do from there. Google more errors? No. The solution is to run jarfix.', 3, 3, 4, 1, '2024-01-12 16:07:47'),
(10, 'Would you please reword your question? What do you mean by \"formatted way\"? As in, with rich formatting, like bold/italic/etc? ', 4, 12, 10, 1, '2024-01-12 16:12:54'),
(11, 'is there a way to display the runtime value of a variable by printing the value of the variable using some console commands? ', 4, 10, 10, 0, '2024-01-12 16:14:17'),
(12, 'Just do console.log(\"\", yourObject1, yourObject2, yourObject3, etc...);. A shorter version is to just do console.log(yourObject1, yourObject2, etc...);', 4, 9, 10, 1, '2024-01-12 16:14:57'),
(13, 'missing or old java version on your machine? java -version?', 6, 10, 15, 1, '2024-01-12 16:20:43'),
(14, 'Java(TM) SE Runtime Environment (build 1.8.0_101-b13) Checking from browser: Your system is managed by your organization IT department. The following Java versions were detected on your system. Java 8 Update 101 (static) Java 8 Update 101 (64-bit)', 6, 15, 15, 0, '2024-01-12 16:21:04'),
(15, 'Can you check for any error information in the logs, they should be here &lt;DRIVE>\\Users\\&lt;username>\\.Pycharm&lt;version>', 6, 8, 15, 1, '2024-01-12 16:22:10'),
(16, 'I have tried pycharm.exe and it will never run and never display any message. Just found pycharm64.exe under the same folder and it works.', 6, 15, 15, 0, '2024-01-12 16:23:46'),
(17, 'I did a bit a digging. The shortcut my system is using points directly to that pycharm64.exe, and yet the shortcut doesn\'t work and opening the *.exe as you said does. I don\'t know windows well enough to debug that.', 6, 15, 15, 0, '2024-01-12 16:24:45'),
(18, 'Check if you have Java installed on your windows 10.', 6, 10, 15, 1, '2024-01-12 16:25:45'),
(19, 'its workin ty..', 4, 10, 10, 0, '2024-01-12 16:27:55'),
(20, 'I faced a similar problem many times, the launcher window will open and then immediately close without any error message. In my case it seems that this happens when I have insufficient disk space. Clearing 10-15Gb solves it for me. Hope that helps.', 6, 5, 15, 1, '2024-01-12 16:33:00'),
(21, '\r\nYes! There\'s a Python debugger called pdb just for doing that!\r\n\r\nYou can launch a Python program through pdb via python -m pdb myscript.py.\r\n\r\nThere are a few commands you can then issue, which are documented on the pdb page.\r\n\r\nSome useful ones to remember are:\r\n\r\nb: set a breakpoint\r\nc: continue debugging until you hit a breakpoint\r\ns: step through the code\r\nn: to go to next line of code\r\nl: list source code for the current file (default: 11 lines including the line being executed)\r\nu: navigate up a stack frame\r\nd: navigate down a stack frame\r\np: to print the value of an expression in the current context\r\nIf you don\'t want to use a command line debugger, some IDEs like Pydev, Wing IDE or PyCharm have a GUI debugger. Wing and PyCharm are commercial products, but Wing has a free \"Personal\" edition, and PyCharm has a free community edition.', 7, 13, 6, 1, '2024-01-12 16:37:15'),
(22, 'Wow, I cannot believe I\'m having a hard time finding a graphical pdb for linux/ubuntu. Am I missing something? I might have to look into making a SublimeText Plugin for it. ', 7, 6, 6, 0, '2024-01-12 16:38:06'),
(23, 'PyCharm is pretty good as a graphical debugger, and its Community Edition is free!', 7, 11, 6, 1, '2024-01-12 16:38:52'),
(24, '@dhruv, pudb is great for that. Also', 7, 5, 6, 1, '2024-01-12 16:40:36'),
(25, 'pdb is not a command line tool. To use it, use python -m pdb your_script.py. ', 7, 14, 6, 1, '2024-01-12 16:41:35'),
(26, '@devil I guess it\'s not standard, but on Ubuntu the pdb command is part of the python package. In any case, python -m &lt;module> is becoming the standard for other things too like pip, so it\'s probably best to use that by default. ', 7, 17, 6, 1, '2024-01-12 16:42:35'),
(27, 'By using Python Interactive Debugger \'pdb\'\r\nFirst step is to make the Python interpreter enter into the debugging mode.\r\n\r\nA. From the Command Line : Most straight forward way, running from command line, of python interpreter. \r\n\r\nMost straight forward way, running from command line, of python interpreter [ $ python -m pdb scriptName.py\r\n> .../pdb_script.py(7)&lt;module>()\r\n-> \"\"\"\r\n(Pdb) ] \r\nB. Within the Interpreter : \r\n\r\nWhile developing early versions of modules and to experiment it more iteratively. [  $ python\r\nPython 2.7 (r27:82508, Jul  3 2010, 21:12:11)\r\n[GCC 4.0.1 (Apple Inc. build 5493)] on darwin\r\nType \"help\", \"copyright\", \"credits\" or \"license\" for more information.\r\n>>> import pdb_script\r\n>>> import pdb\r\n>>> pdb.run(\'pdb_script.MyObj(5).go()\')\r\n> &lt;string>(1)&lt;module>()\r\n(Pdb) ]\r\n\r\n', 7, 12, 6, 1, '2024-01-12 16:47:19'),
(28, '\"Turning off the (Pdb) prompt… with “c” (continue)\" -- That doesn\'t sound right... The docs say c is \"Continue execution, only stop when a breakpoint is encountered.', 7, 9, 6, 1, '2024-01-12 16:48:38'),
(29, 'here is a module called \'pdb\' in python. At the top of your python script you do\r\n [ \r\nimport pdb\r\npdb.set_trace() ]\r\nand you will enter into debugging mode. You can use \'s\' to step, \'n\' to follow next line similar to what you would do with \'gdb\' debugger.', 7, 7, 6, 1, '2024-01-12 16:50:21'),
(30, 'When I saw breakpoint I was excited. But then I learnt that it is essentially just a shortcut for import pdb; pdb.set_trace() and that made me sad. Python devs: please focus on improving PDB with basic GDB features like context lines, persistent command history and tab auto-completion :-)', 7, 1, 6, 1, '2024-01-12 16:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(40) NOT NULL,
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` int(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `threads_id` int(255) NOT NULL,
  `threads_title` varchar(100) NOT NULL,
  `threads_desc` text NOT NULL,
  `threads_cat_id` int(255) NOT NULL,
  `threads_user_id` int(255) NOT NULL,
  `threads_reg_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threads_id`, `threads_title`, `threads_desc`, `threads_cat_id`, `threads_user_id`, `threads_reg_date`) VALUES
(1, 'What is setup.py?', 'What is setup.py and how can it be configured or used?', 1, 1, '2024-01-12 15:16:09'),
(2, 'Python setup failed error 0x80070005 access denied', 'When installing python on my system I am getting this - error set up failed...\r\nPlease help how can I fix this issue?\r\n\r\nMy account has admin rights on windows 10 pro 64 bit operating system. I have downloaded python setup from below link:', 1, 3, '2024-01-12 15:54:44'),
(3, 'Java Installation Not Completed / Unable to install Java', 'I downloaded a file for a game that requires Java to run. When I downloaded the file it saved as a WinRAR file. So I right clicked the file and pressed open with Java Platform SE Binary (As that was the only Java add-on that came up). Then an Error Message came up which says: \"Java Installation Not Completed.\r\nUnable to install Java.\r\nThere are errors in the following switches:\r\n(\"C:\\Users\\MyName\\Desktop\\The file name for The Game(2).jar\").\r\nCheck that the commands are valid and try again.\"\r\nBut I have already Installed Java as well.\r\n\r\nHas anyone got a fix they could recommend?', 2, 4, '2024-01-12 15:59:49'),
(4, 'How can I display a JavaScript object?', 'How do I display the content of a JavaScript object in a string format like when we alert a variable?\r\n\r\nThe same formatted way I want to display an object.', 3, 10, '2024-01-12 16:11:04'),
(5, 'Python- While Loop with error handling', 'Ive been reading up on while Loops while learning python. The following works without error, however if I insert 16 as value, I get only 16', 1, 16, '2024-01-12 16:18:06'),
(6, 'PyCharm is not Launching on Windows! What\'s wrong with it?', 'I downloaded and installed JetBrains PyCharm (Community version) on my Windows 10, but nothing happens when I try to run it. I tried everything like rebooting Windows, Run as administrator, etc. Nothing is found in Task Manager either.', 1, 15, '2024-01-12 16:19:37'),
(7, 'How to step through Python code to help debug issues?', 'n Java/C# you can easily step through code to trace what might be going wrong, and IDE\'s make this process very user friendly.\r\n\r\nCan you trace through python code in a similar fashion?', 1, 6, '2024-01-12 16:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_email`, `password`, `user_image`, `timestamp`) VALUES
(1, 'hey', 'hey@gmail.com', '$2y$10$.0V9lIcXm1Ac24s12Ws38ejOt20txWFR4BZm7M5mJrVphTRGrm6D2', 'profile-3.jpg', '2024-01-12 10:09:57'),
(2, 'vipin', 'vipin@gmail.com', '$2y$10$CAFA4Dd4DHVzPDwo4P1Lb.4iDqpSbWkUxctmQuSyLvL5fmw5zu2ZC', 'profile-5.jpg', '2024-01-12 10:15:15'),
(3, 'ensh', 'ensh@gmail.com', '$2y$10$2t4VBYIeehv6VD0T38rEneLqJwcu7.v//1gKGcpDNOxPMy/lJeQ66', 'profile-4.jpg', '2024-01-12 10:15:54'),
(4, 'abhishek', 'abhi@gmail.com', '$2y$10$E.8BmDCKYbAGRwuxBu8OduQ.SGYb8hKnZWFsTuvLydvZuyEdP4Lfq', 'profile-6.jpg', '2024-01-12 10:16:43'),
(5, 'shna', 'shna@gmail.com', '$2y$10$SyuloJ2PKjsSW3GtUWjEauxkV3OuaE6EvJM4Dbr6wF83YxeneDsaO', 'profile-7.jpg', '2024-01-12 10:17:38'),
(6, 'dhruv', 'scout@gmail.com', '$2y$10$MPCL1fwqugxOJwzNSlDDneKwJLQkfbiqheKeZNJAoT9cCaMq8MVkO', 'profile-6.jpg', '2024-01-12 10:18:46'),
(7, 'nefes', 'nefes@gmail.com', '$2y$10$8OylZ2q9nDL1AiPyVR8r5eKhCafX6yk0Qq/2HR/Q8LU1pfRzWmhgO', 'profile-7.jpg', '2024-01-12 10:19:36'),
(8, 'nilesh', 'nilesh@gmail.com', '$2y$10$lpMqxNL/wFeZQR4aWTX66u84ek2aZpXgtb6PhXloFHODbZN1xQTt6', 'profile-6.jpg', '2024-01-12 10:22:30'),
(9, 'angel', 'angel@gmail.com', '$2y$10$Ipjj2Fwb3fn1Wj/6Uv94kugnSbyyANTwqpfR1fVbYcCbylBpbcJY.', 'profile-14.jpg', '2024-01-12 10:23:25'),
(10, 'simmy', 'simmy@gmail.com', '$2y$10$NMO.VEyit/PNZK5h/1R8mezi6j/Ue0LY.Vl9KLGu9pbKOyYl34ppm', 'profile-3.jpg', '2024-01-12 10:23:54'),
(11, 'ritiksha', 'ritiksha@gmail.com', '$2y$10$e3aRE.UOZvBUdDYvZlyZLeJJmJo3iN8gbW8BAWxs2vbUa9ycmdQDq', 'profile-14.jpg', '2024-01-12 10:33:59'),
(12, 'aman', 'aman@gmail.com', '$2y$10$e0EZa9hrK9blBdnoBuZmwOyxw1GrQ4fY7SQRJQI5XYPL9UWm.tJLq', 'profile-8.jpg', '2024-01-12 10:34:41'),
(13, 'hy', 'hy@gmail.com', '$2y$10$U5/KG5VVy3Xh/fCJvEJCMemTU4IwU6dxRZwzoZOFZsFuYL3Tn48iG', 'profile-10.jpg', '2024-01-12 10:35:26'),
(14, 'devil', 'devil@gmail.com', '$2y$10$hmYk5J3MLX9L.8w8xcZRkud8gBwEvj.YvIx/.lFFLfAM2nwUWU3hi', 'profile-11.jpg', '2024-01-12 10:36:38'),
(15, 'chirag', 'chirag@gmail.com', '$2y$10$UtxEmgXUVR2Mmb/W0PeVNO8awvxYclWT7ZU6Clbb83xwslPSAFYYO', 'profile-2.jpg', '2024-01-12 10:38:01'),
(16, 'ankit', 'ankit@gmail.com', '$2y$10$id.lBP7zfxy2JtiHN7jpuut/aWLPZpE0Nhnz5DsDmH3Gka.HghPAO', 'profile-12.jpg', '2024-01-12 10:38:36'),
(17, 'nirmal', 'nirmal@gmail.com', '$2y$10$EX5PexRQdyu64hf6XsAHFeGSz6vJ1exQEhUFf8owh5NrhaSVs.7ES', 'profile-15.jpg', '2024-01-12 10:39:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`threads_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `threads_title` (`threads_title`,`threads_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threads_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
