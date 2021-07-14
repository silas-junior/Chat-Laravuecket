<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-md flex" style="min-height: 600px;max-height: 600px;">
                    <!-- LIST CONVERSATIONS -->
                    <div class="w-3/12 flex flex-col overflow-y-scroll">
                        <div class="m-2 border-b border-teal-500">
                            <input class="w-full appearance-none focus:outline-none border-none" type="text" placeholder="Pesquisar">
                        </div>
                        <div class="bg-gray-200 bg-opacity-25 border-r border-gray-200 shadow-lg">
                            <ul>
                                <li v-for="user in 20"
                                    class="p-6 bg-gray-300 bg-opacity-25 text-lg text-gray-600 border-b border-gray-200 leading-7 font-semibold shadow-sm hover:bg-opacity-50 hover:cursor-pointer">
                                    <p class="flex items-center justify-between">
                                        <span>Teste</span>
                                        <span class="ml-2 w-2 h-2 bg-blue-500 justify-end rounded-full"></span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- BOX MESSAGE -->
                    <div class="w-9/12 flex flex-col justify-between" style="min-height: 600px; max-height: 600px;">
                        <!-- CONVERSATION MESSAGES -->
                        <div class="w-full p-6 flex flex-col overflow-y-auto">
                            <div class="w-full mb-3 text-right">
                                <p class="text-left inline-block p-2 rounded-md bg-gray-200 sm:max-w-sm message-from-me" style="min-width: 50px;">
                                    Olá! Teste Teste Teste Teste Teste Teste Teste Teste Teste Teste Teste Teste Teste Teste
                                    <span class="text-right block mt-1 text-xs text-gray-600">14:45</span>
                                </p>
                            </div>

                            <div class="w-full mb-3">
                                <p class="inline-block p-2 rounded-md bg-blue-300 sm:max-w-sm message-to-me" style="min-width: 50px;">
                                    Fala ai!
                                    <span class="text-left block mt-1 text-xs text-gray-600">14:45</span>
                                </p>
                            </div>
                        </div>
                        <!-- SEND MESSAGE -->
                        <div class="w-full bg-gray-200 bg-opacity-25 p-3 border-t border-gray-200">
                            <form>
                                <div class="flex rounded-md shadow-sm overflow-hidden border border-b border-teal-500">
                                    <input class="flex-1 px-4 py-2 text-sm appearance-none focus:outline-none border-none" type="text">
                                    <button type="submit" class="ml-1 bg-blue-600 hover:bg-blue-500 text-white px-4 py-2">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout';
    import Button from "../Jetstream/Button";

    export default {
        name: "Chat",
        components: {
            Button,
            AppLayout,
        },
        props: {
            message: String,
        },
    }
</script>
<style>
 .message-from-me {
     @apply
 }

 .message-to-me {

 }

</style>
