<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetEtec - Gestão Veterinária Inteligente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        teal: {
                            100: '#B2F5EA',
                            500: '#38B2AC',
                            600: '#319795',
                        },
                        beige: {
                            50: '#FDFBF7',
                            100: '#FAF7F0',
                        },
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }
        .animate-slideIn {
            animation: slideIn 0.5s ease-out;
        }
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-beige-50">
    <header class="px-4 lg:px-6 h-14 flex items-center bg-teal-600 animate-fadeIn">
        <a href="#" class="flex items-center justify-center">
            <i class='bx bxs-paw text-white text-2xl mr-2'></i>
            <span class="text-white font-bold">VetEtec</span>
        </a>
        <nav class="ml-auto flex gap-4 sm:gap-6">
            <a class="text-sm font-medium hover:underline underline-offset-4 text-white" href="#recursos">Recursos</a>
            <a class="text-sm font-medium hover:underline underline-offset-4 text-white" href="#sobre">Sobre</a>
            <a class="text-sm font-medium hover:underline underline-offset-4 text-white" href="#contato">Contato</a>
        </nav>
    </header>
    <main class="flex-1">
        <section class="w-full py-12 md:py-24 lg:py-32 xl:py-48 bg-teal-500">
            <div class="container px-4 md:px-6 mx-auto">
                <div class="flex flex-col items-center space-y-4 text-center">
                    <div class="space-y-2">
                        <h1 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl lg:text-6xl/none text-white animate-slideIn">
                            Bem-vindo ao VetEtec
                        </h1>
                        <p class="mx-auto max-w-[700px] text-teal-100 md:text-xl animate-slideIn delay-100">
                            Otimize sua clínica veterinária e o cuidado com os pets usando nossa plataforma inteligente.
                        </p>
                    </div>
                    <div class="space-x-4 animate-slideIn delay-200">
                        <a href="login.php" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-white text-teal-600 hover:bg-teal-100 h-10 py-2 px-4 transform hover:scale-105 transition-transform">
                            Cadastre-se Grátis
                        </a>
                        <a href="#" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background border border-input hover:bg-accent hover:text-accent-foreground h-10 py-2 px-4 text-white border-white hover:bg-teal-600 transform hover:scale-105 transition-transform">
                            Saiba Mais
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full py-12 md:py-24 lg:py-32 bg-white">
            <div class="container px-4 md:px-6 mx-auto">
                <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl text-center mb-8 text-gray-800">
                    Como Funciona
                </h2>
                <div class="grid gap-6 lg:grid-cols-3">
                    <div class="flex flex-col items-center space-y-2 border-t pt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8 text-teal-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <h3 class="text-xl font-bold text-gray-800">1. Cadastre-se</h3>
                        <p class="text-center text-gray-600">
                            Crie uma conta como veterinário ou tutor de pet.
                        </p>
                    </div>
                    <div class="flex flex-col items-center space-y-2 border-t pt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8 text-teal-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <h3 class="text-xl font-bold text-gray-800">2. Configure seu Perfil</h3>
                        <p class="text-center text-gray-600">
                            Adicione os detalhes da sua clínica ou informações do seu pet.
                        </p>
                    </div>
                    <div class="flex flex-col items-center space-y-2 border-t pt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8 text-teal-600"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <h3 class="text-xl font-bold text-gray-800">3. Comece a Gerenciar</h3>
                        <p class="text-center text-gray-600">
                            Agende consultas, gerencie registros e muito mais.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="recursos" class="w-full py-12 md:py-24 lg:py-32 bg-beige-100">
            <div class="container px-4 md:px-6 mx-auto">
                <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl text-center mb-8 text-gray-800 animate-slideIn">
                    Principais Recursos
                </h2>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white animate-slideIn delay-100" data-v0-t="card">
                        <div class="flex flex-col items-center space-y-2 p-6">
                            <i class='bx bx-calendar text-5xl text-teal-600'></i>
                            <h3 class="text-xl font-bold text-gray-800">Gestão de Consultas</h3>
                            <p class="text-center text-gray-600">
                                Agende e gerencie consultas para sua clínica ou pets facilmente.
                            </p>
                        </div>
                    </div>
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white animate-slideIn delay-200" data-v0-t="card">
                        <div class="flex flex-col items-center space-y-2 p-6">
                            <i class='bx bx-file text-5xl text-teal-600'></i>
                            <h3 class="text-xl font-bold text-gray-800">Registros Médicos</h3>
                            <p class="text-center text-gray-600">
                                Mantenha o histórico de saúde, vacinas e tratamentos dos pets.
                            </p>
                        </div>
                    </div>
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-white animate-slideIn delay-300" data-v0-t="card">
                        <div class="flex flex-col items-center space-y-2 p-6">
                            <i class='bx bx-group text-5xl text-teal-600'></i>
                            <h3 class="text-xl font-bold text-gray-800">Gestão de Clientes</h3>
                            <p class="text-center text-gray-600">
                                Gerencie tutores e seus pets de forma eficiente.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="sobre" class="w-full py-12 md:py-24 lg:py-32 bg-white">
            <div class="container px-4 md:px-6 mx-auto">
                <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl text-center mb-8 text-gray-800 animate-slideIn">
                    Sobre o VetEtec
                </h2>
                <p class="text-center text-gray-600 max-w-2xl mx-auto animate-slideIn delay-100">
                    O VetEtec é uma plataforma inovadora projetada para simplificar e otimizar a gestão de clínicas veterinárias. 
                    Nossa missão é fornecer ferramentas intuitivas e eficientes para veterinários e tutores de pets, 
                    melhorando a qualidade do atendimento e facilitando o cuidado com os animais.
                </p>
            </div>
        </section>
        <section id="contato" class="w-full py-12 md:py-24 lg:py-32 bg-beige-100">
            <div class="container px-4 md:px-6 mx-auto">
                <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl text-center mb-8 text-gray-800 animate-slideIn">
                    Entre em Contato
                </h2>
                <div class="flex flex-col items-center space-y-4 animate-slideIn delay-100">
                    <p class="text-center text-gray-600">
                        Tem alguma dúvida ou sugestão? Estamos aqui para ajudar!
                    </p>
                    <a href="mailto:contato@vetetec.com" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-teal-600 text-white hover:bg-teal-700 h-10 py-2 px-4">
                        <i class='bx bx-envelope mr-2'></i> Enviar E-mail
                    </a>
                    <p class="text-gray-600">
                        <i class='bx bx-phone mr-2'></i> (11) 1234-5678
                    </p>
                </div>
            </div>
        </section>
        
        <section class="w-full py-12 md:py-24 lg:py-32 bg-teal-500" id="cta">
            <div class="container px-4 md:px-6 mx-auto">
                <div class="flex flex-col items-center space-y-4 text-center">
                    <div class="space-y-2">
                        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl text-white animate-slideIn">
                            Pronto para Começar?
                        </h2>
                        <p class="mx-auto max-w-[600px] text-teal-100 md:text-xl animate-slideIn delay-100">
                            Junte-se ao VetEtec hoje e experimente um novo nível de eficiência na gestão veterinária e cuidados com pets.
                        </p>
                    </div>
                    <div class="space-x-4 animate-slideIn delay-200">
                        <a href="login.php" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-white text-teal-600 hover:bg-teal-100 h-11 px-8 transform hover:scale-105 transition-transform">
                            Cadastre-se Agora
                        </a>
                        <a href="#" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background border border-input hover:bg-accent hover:text-accent-foreground h-11 px-8 text-white border-white hover:bg-teal-600 transform hover:scale-105 transition-transform">
                            Fale conosco
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="flex flex-col gap-2 sm:flex-row py-6 w-full shrink-0 items-center px-4 md:px-6 border-t bg-beige-50">
        <p class="text-xs text-gray-500">© 2024 VetEtec. Todos os direitos reservados.</p>
        <nav class="sm:ml-auto flex gap-4 sm:gap-6">
            <a class="text-xs hover:underline underline-offset-4 text-gray-500" href="#">Termos de Serviço</a>
            <a class="text-xs hover:underline underline-offset-4 text-gray-500" href="#">Privacidade</a>
        </nav>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fadeIn');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('section').forEach(section => {
                observer.observe(section);
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>