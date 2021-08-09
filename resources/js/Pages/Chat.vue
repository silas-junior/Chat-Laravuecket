<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto px-6 px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-md flex" style="min-height: 500px;max-height: 500px;">
                    <!-- LIST CONVERSATIONS -->
                    <div class="w-3/12 flex flex-col overflow-y-scroll">
                        <div class="m-2 border-b">
                            <input class="w-full appearance-none focus:outline-none border-none" type="text" placeholder="Pesquisar">
                        </div>
                        <div class="bg-gray-200 bg-opacity-25 border-r border-gray-200 shadow-md">
                            <ul>
                                <li v-for="user in users" :key="user.id"
                                    @click="loadMessages(user.id)"
                                    :class="userActive && userActive.id === user.id ? 'bg-gray-400' : ''"
                                    class="p-6 bg-gray-300 bg-opacity-25 text-lg text-gray-600 border-b border-gray-300 leading-7 font-semibold shadow-sm hover:bg-opacity-50 hover:cursor-pointer">
<!--                                    <p class="flex items-center justify-between">-->
                                        <span>{{ user.name }}</span>
                                        <span class="ml-2 w-2 h-2 bg-blue-500 justify-end rounded-full"></span>
<!--                                    </p>-->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- BOX MESSAGE -->
                    <div class="w-9/12 flex flex-col justify-between" style="min-height: 500px; max-height: 500px;">
                        <!-- CONVERSATION MESSAGES -->
                        <div v-if="userActive" class="w-full p-6 flex flex-col overflow-y-auto">
                            <div v-for="message in messages" :key="message.id"
                                 :class="message.from === $page.props.auth.user.id ? 'text-right' : ''"
                                 class="w-full mb-3">
                                <p
                                    :class="message.from === $page.props.auth.user.id ? 'messageFromMe' : 'messageToMe'"
                                    class="inline-block p-2 rounded-md " style="min-width: 50px;">
                                    {{ message.content }}
                                    <span class="text-right block mt-1 text-xs text-gray-600">{{ message.created_at }}</span>
                                </p>
                            </div>
                        </div>
                        <div v-else class="flex flex-col justify-center mt-28">
                            <h1 class="text-2xl text-center">Selecione um contato para iniciar uma conversa</h1>
                        </div>
                        <!-- SEND MESSAGE -->
                        <div v-if="userActive" class="w-full bg-gray-200 bg-opacity-25 p-3 border-t">
                            <form v-on:submit.prevent="sendMessage">
                                <div class="flex">
                                    <div class="w-full border-b-2 overflow-hidden">
                                        <input v-model="message" class="w-full send-message-input" placeholder="Digite uma mensagem" type="text">
                                    </div>
                                    <div>
                                        <button type="submit" class="ml-3 mt-1.5 rounded-md bg-blue-600 hover:bg-blue-500 text-white px-4 py-2">Enviar</button>
                                    </div>
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
    import { Inertia } from '@inertiajs/inertia'

    export default {
        name: "Chat",
        components: {
            Button,
            AppLayout,
        },
        props: {
            message: String,
        },
        data() {
          return {
              users: [],
              messages: [],
              exported: false,
              urlPdf: null,
              exporting: false,
              userActive: null,
              message: '',
          }
        },
        methods: {
            loadMessages(user_id) {
                axios.get(`api/users/${user_id}`).then(response => {
                    this.userActive = response.data.user
                })
                axios.get(`api/messages/${user_id}`).then(response => {
                    this.messages = response.data.messages
                })
            },
            sendMessage() {
                if (this.message === '') {
                    console.log('Não foi possível enviar a mensagem')
                } else {
                    console.log(this.message)
                }
            },
        },
        mounted() {
          axios.get('api/users').then((response) => {
              this.users = response.data.users
          })
        },
    }
</script>
<style>
.send-message-input:focus {
    outline-width: 0;
}

</style>
