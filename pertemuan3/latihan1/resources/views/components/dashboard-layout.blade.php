<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite('resources/css/app.css')


    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>{{ $title }}</title>
</head>
<body>
<nav class="">
    <a href="/home" >Home</a>
    <a href="/about">About</a>
    <a href="/blog">blog</a>
    <a href="/contact">contact</a>
    <a href="/posts">posts</a>
    <a href="/categories">categories</a>
</nav>
<div class="h-[75vh]">


    {{ $slot }}
</div>


<footer class="bg-[#7E62F3] text-[#EDF0F7] p-[20px] md:p-[50px]">
    <div class="flex flex-col gap-6 md:gap-8">
        <!-- Social Links -->
        <div class="flex flex-wrap gap-3 md:gap-5 text-base md:text-xl">
            <a
                href="https://www.linkedin.com/in/biagiarchiefz/"
                class="hover:underline underline-offset-4 transition-all"
                target="_blank"
                rel="noopener noreferrer"
            >
                Linkedin
            </a>
            <a
                href="https://github.com/Biagiarchiefz"
                class="hover:underline underline-offset-4 transition-all"
                target="_blank"
                rel="noopener noreferrer"
            >
                Github
            </a>
            <a
                href="https://www.instagram.com/biagiarchiefz/"
                class="hover:underline underline-offset-4 transition-all"
                target="_blank"
                rel="noopener noreferrer"
            >
                Instagram
            </a>
            <a
                href="https://dribbble.com/Biagii"
                class="hover:underline underline-offset-4 transition-all"
                target="_blank"
                rel="noopener noreferrer"
            >
                Dribbble
            </a>
        </div>

        <!-- Email Heading -->
        <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold max-w-full md:max-w-[579px] leading-tight">
            Get in Touch with Me
            <a href="mailto:biagiiarchie@gmail.com">biagiiarchie@gmail.com</a>
        </h1>

        <!-- Copyright -->
        <p class="text-sm md:text-base">Biagi Archie Fais © 2025</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>
