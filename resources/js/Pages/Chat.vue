<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex" style="height: 400px;">
                    <div class="w-3/12 bg-gray-200 bg-opacity-25 border-r border-gray-200 overflow-y-scroll">
                        <ul>
                            <li
                                v-for="user in users" :key="user.id"
                                @click="() => {loadMessages(user.id)}"
                                class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200
                                    hover:bg-gray-200 hover:bg-opacity-50 hover:cursor-pointer">
                                <p class="flex items-center">{{ user.name }}
                                    <span class="ml-2 h-2 w-2 bg-blue-200 rounded-full"></span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="w-9/12 flex flex-col justify-between">
                        <div class="w-full p-6 flex flex-col overflow-y-scroll">
                            <div v-for="message in messages" :key="messages.id"
                                :class="(message.from == $attrs.user.id) ? 'text-right' : ''"
                                class="w-full mb-3">
                                <p :class="(message.from == $attrs.user.id) ? 'messageFromMe' : 'messageToMe'"
                                    class="inline-block p-2 rounded-md" style="max-width: 75%">
                                    {{ message.content }}
                                </p>
                                <span class="block mt-1 text-sm text-gray-500"> {{ message.created_at }}</span>
                            </div>
                        </div>
                        <div class="w-full bg-gray-200 bg-opacity-25 p-6 border-t border-gray-200">
                            <form action="" >
                                <div class="flex rounded-md overflow-hidden border border-gray-300">
                                    <input type="text" class="flex-1 px-4 py-2 text-sm border-0 focus:outline-none">
                                    <button type="submit" class="bg-indigo-500  px-4 py-2 hover:bg-indigo-600 text-white">Enviar
                                    </button>
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
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        data(){
            return {
                users: [],
                messages: []
            }
        },
        methods:{
            loadMessages:function (userId) {
                axios.get(`api/messages/${userId}`).then(response => {
                    this.messages = response.data.messages
                });
            }
        },
        mounted() {
            axios.get('api/users').then(response =>{
               this.users = response.data.users;
            });
        }
    }
</script>

