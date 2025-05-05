<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;700&family=Lora:wght@400;600&family=Roboto:wght@300;400&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #1f2937, #111827);
            color: #d1d5db;
            overflow-x: hidden;
        }
        h1, h2 {
            font-family: 'Cormorant Garamond', serif;
            color: #f3e8d6;
        }
        .container {
            background: rgba(31, 41, 55, 0.95);
            backdrop-filter: blur(10px);
        }
        .parallax-bg {
            background: url('https://via.placeholder.com/1200x800?text=Abstract+Gold') no-repeat center;
            background-size: cover;
            height: 300px;
            opacity: 0.3;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: -1;
            transform: translateY(0);
            transition: transform 0.5s ease;
        }
        .clap-btn {
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .clap-btn:hover {
            transform: scale(1.1);
            color: #d4af37;
        }
        .clap-active {
            color: #d4af37;
            transform: scale(1.3);
        }
        .particle {
            position: absolute;
            width: 5px;
            height: 5px;
            background: #d4af37;
            border-radius: 50%;
            pointer-events: none;
            animation: particleBurst 0.5s ease-out forwards;
        }
        @keyframes particleBurst {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: translate(var(--x), var(--y)) scale(0); opacity: 0; }
        }
    </style>
  
<body class="antialiased">
    <div class="container max-w-4xl mx-auto px-8 py-12 mt-12 mb-12 rounded-2xl shadow-2xl relative">
        <div class="parallax-bg"></div>
        <header class="pb-8 border-b border-gray-700 relative z-10">
            <h1 class="text-5xl md:text-6xl font-bold leading-tight">{{$data->title}}</h1>
            <p class="text-xl md:text-2xl mt-4 italic">{{$data->category->title}}</p>
            
            <div class="flex items-center mt-8">
                <img src="{{$data->image?? "https://i.pravatar.cc/300"}}" alt="Author Avatar" class="w-14 h-14 rounded-full border-2 border-gray-600">
                <div class="ml-4">
                    <span class="font-semibold text-lg text-gray-200">{{$data->user->username}}</span>
                    <p class="text-sm text-gray-400">Published on  {{ \Carbon\Carbon::parse($data->published_at)->format('Y-m-d H:i:s') }}
                        · 7 min read · <span class="text-yellow-600 font-medium">Premium Plus</span></p>
                </div>
            </div>
        </header>
        <article class="mt-10 prose prose-lg prose-invert max-w-none relative z-10">
            {!! $data->content ?? "" !!}
        </article>
        <footer class="mt-16 text-center border-t border-gray-700 pt-8 relative z-10">
            <div class="flex justify-center items-center space-x-3">
                <span class="text-gray-400 text-2xl">👏</span>
                <button id="clap-btn" class="clap-btn text-gray-400 text-lg font-medium" onclick="triggerClap()">42 Claps</button>
            </div>
            <p class="text-gray-400 mt-6">Written by <span class="font-semibold text-gray-200">{{$data->user->name}}</span></p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="#" class="text-yellow-600 hover:text-yellow-500 transition-colors">Twitter</a>
                <a href="#" class="text-yellow-600 hover:text-yellow-500 transition-colors">LinkedIn</a>
                <a href="#" class="text-yellow-600 hover:text-yellow-500 transition-colors">Subscribe</a>
            </div>
        </footer>
    </div>
    <script>
        function triggerClap() {
            const clapBtn = document.getElementById('clap-btn');
            clapBtn.classList.add('clap-active');
            let claps = parseInt(clapBtn.textContent) || 42;
            clapBtn.textContent = `${claps + 1} Claps`;
            
            // Particle effect
            for (let i = 0; i < 10; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                const x = (Math.random() - 0.5) * 100;
                const y = (Math.random() - 0.5) * 100;
                particle.style.setProperty('--x', `${x}px`);
                particle.style.setProperty('--y', `${y}px`);
                clapBtn.appendChild(particle);
                setTimeout(() => particle.remove(), 500);
            }
            
            setTimeout(() => clapBtn.classList.remove('clap-active'), 300);
        }

        // Parallax effect on scroll
        window.addEventListener('scroll', () => {
            const parallax = document.querySelector('.parallax-bg');
            const scrollPos = window.scrollY;
            parallax.style.transform = `translateY(${scrollPos * 0.3}px)`;
        });
    </script>
</body>
</x-app-layout>