import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { CheckCircle, PawPrint, Calendar, Clipboard, Users } from "lucide-react"
import Link from "next/link"

export default function PaginaInicial() {
  return (
    <div className="flex flex-col min-h-screen bg-beige-50">
      <header className="px-4 lg:px-6 h-14 flex items-center bg-teal-600">
        <Link className="flex items-center justify-center" href="#">
          <PawPrint className="h-6 w-6 text-white" />
          <span className="sr-only">VetConnect</span>
        </Link>
        <nav className="ml-auto flex gap-4 sm:gap-6">
          <Link className="text-sm font-medium hover:underline underline-offset-4 text-white" href="#">
            Recursos
          </Link>
          <Link className="text-sm font-medium hover:underline underline-offset-4 text-white" href="#">
            Sobre
          </Link>
          <Link className="text-sm font-medium hover:underline underline-offset-4 text-white" href="#">
            Contato
          </Link>
        </nav>
      </header>
      <main className="flex-1">
        <section className="w-full py-12 md:py-24 lg:py-32 xl:py-48 bg-teal-500">
          <div className="container px-4 md:px-6">
            <div className="flex flex-col items-center space-y-4 text-center">
              <div className="space-y-2">
                <h1 className="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl lg:text-6xl/none text-white">
                  Bem-vindo ao VetConnect
                </h1>
                <p className="mx-auto max-w-[700px] text-teal-100 md:text-xl">
                  Otimize sua clínica veterinária e o cuidado com os pets usando nossa plataforma completa.
                </p>
              </div>
              <div className="space-x-4">
                <Button className="bg-white text-teal-600 hover:bg-teal-100">Cadastre-se Grátis</Button>
                <Button variant="outline" className="text-white border-white hover:bg-teal-600">Saiba Mais</Button>
              </div>
            </div>
          </div>
        </section>
        <section className="w-full py-12 md:py-24 lg:py-32 bg-beige-100">
          <div className="container px-4 md:px-6">
            <h2 className="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl text-center mb-8 text-gray-800">
              Principais Recursos
            </h2>
            <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
              <Card className="bg-white">
                <CardContent className="flex flex-col items-center space-y-2 p-6">
                  <Calendar className="h-12 w-12 text-teal-600" />
                  <h3 className="text-xl font-bold text-gray-800">Gestão de Consultas</h3>
                  <p className="text-center text-gray-600">
                    Agende e gerencie consultas para sua clínica ou pets facilmente.
                  </p>
                </CardContent>
              </Card>
              <Card className="bg-white">
                <CardContent className="flex flex-col items-center space-y-2 p-6">
                  <Clipboard className="h-12 w-12 text-teal-600" />
                  <h3 className="text-xl font-bold text-gray-800">Registros Médicos</h3>
                  <p className="text-center text-gray-600">
                    Mantenha o histórico de saúde, vacinas e tratamentos dos pets.
                  </p>
                </CardContent>
              </Card>
              <Card className="bg-white">
                <CardContent className="flex flex-col items-center space-y-2 p-6">
                  <Users className="h-12 w-12 text-teal-600" />
                  <h3 className="text-xl font-bold text-gray-800">Gestão de Clientes</h3>
                  <p className="text-center text-gray-600">
                    Gerencie tutores e seus pets de forma eficiente.
                  </p>
                </CardContent>
              </Card>
            </div>
          </div>
        </section>
        <section className="w-full py-12 md:py-24 lg:py-32 bg-white">
          <div className="container px-4 md:px-6">
            <h2 className="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl text-center mb-8 text-gray-800">
              Como Funciona
            </h2>
            <div className="grid gap-6 lg:grid-cols-3">
              <div className="flex flex-col items-center space-y-2 border-t pt-4">
                <CheckCircle className="h-8 w-8 text-teal-600" />
                <h3 className="text-xl font-bold text-gray-800">1. Cadastre-se</h3>
                <p className="text-center text-gray-600">
                  Crie uma conta como veterinário ou tutor de pet.
                </p>
              </div>
              <div className="flex flex-col items-center space-y-2 border-t pt-4">
                <CheckCircle className="h-8 w-8 text-teal-600" />
                <h3 className="text-xl font-bold text-gray-800">2. Configure seu Perfil</h3>
                <p className="text-center text-gray-600">
                  Adicione os detalhes da sua clínica ou informações do seu pet.
                </p>
              </div>
              <div className="flex flex-col items-center space-y-2 border-t pt-4">
                <CheckCircle className="h-8 w-8 text-teal-600" />
                <h3 className="text-xl font-bold text-gray-800">3. Comece a Gerenciar</h3>
                <p className="text-center text-gray-600">
                  Agende consultas, gerencie registros e muito mais.
                </p>
              </div>
            </div>
          </div>
        </section>
        <section className="w-full py-12 md:py-24 lg:py-32 bg-teal-500">
          <div className="container px-4 md:px-6">
            <div className="flex flex-col items-center space-y-4 text-center">
              <div className="space-y-2">
                <h2 className="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl text-white">
                  Pronto para Começar?
                </h2>
                <p className="mx-auto max-w-[600px] text-teal-100 md:text-xl">
                  Junte-se ao VetConnect hoje e experimente um novo nível de eficiência na gestão veterinária e cuidados com pets.
                </p>
              </div>
              <div className="space-x-4">
                <Button size="lg" className="bg-white text-teal-600 hover:bg-teal-100">Cadastre-se Agora</Button>
                <Button size="lg" variant="outline" className="text-white border-white hover:bg-teal-600">
                  Fale com Vendas
                </Button>
              </div>
            </div>
          </div>
        </section>
      </main>
      <footer className="flex flex-col gap-2 sm:flex-row py-6 w-full shrink-0 items-center px-4 md:px-6 border-t bg-beige-50">
        <p className="text-xs text-gray-500">© 2024 VetConnect. Todos os direitos reservados.</p>
        <nav className="sm:ml-auto flex gap-4 sm:gap-6">
          <Link className="text-xs hover:underline underline-offset-4 text-gray-500" href="#">
            Termos de Serviço
          </Link>
          <Link className="text-xs hover:underline underline-offset-4 text-gray-500" href="#">
            Privacidade
          </Link>
        </nav>
      </footer>
    </div>
  )
}