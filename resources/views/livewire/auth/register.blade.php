<div class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
    <header class="max-w-lg mx-auto">
        <a href="/">
            <h1 class="text-4xl font-bold text-white text-center">Quizzouz</h1>
        </a>
    </header>

    <div class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
         <section>
            <h3 class="font-bold text-2xl">Bienvenue sur mon super Quizz</h3>
            <p class="text-gray-600 pt-2">Créer un compte</p>
        </section>

        <section class="mt-5">
            <form wire:submit.prevent="register" class="flex flex-col">

            <x-inputs.text id="username" model="username" label="Pseudo" />
            <x-inputs.text id="email" model="email" label="Email" />
            <x-inputs.text id="password" model="password" label="Mot de passe" />
            <x-inputs.text id="passwordConfirm" model="passwordConfirm" label="Confirmation" />

            <button
                class="mt-8 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                type="submit">S'inscrire</button>
            </form>
        </section>
    </div>
</div>