<template>
    <!-- Profile dropdown -->
    <div class="ml-3 relative">
        <div>
            <button @click="toggleDropdown" type="button"
                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full"
                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                     alt="">
            </button>
        </div>
        <transition enter-active-class="transition ease-out duration-100"
                    enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-75"
                    leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showDropdown"
                 class="origin-top-right absolute right-0 mt-4 w-96 rounded-b-md shadow-lg p-3.5 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <form method="post" @submit.prevent="login">
                    <div class="mt-2 flex flex-col">
                        <input type="text" name="login" id="login"
                               v-model="form.login"
                               :class="{ 'border-red-300' : errors && errors.login }"
                               class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md shadow-sm sm:text-sm border-gray-300"
                               placeholder="Логин">
                        <div class="text-sm" v-if="errors && errors.login">{{ errors.login[0] }}</div>
                    </div>
                    <div class="mt-2 flex flex-col">
                        <input type="password" name="password" id="password"
                               v-model="form.password"
                               :class="{ 'border-red-300' : errors && errors.password }"
                               class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md shadow-sm sm:text-sm border-gray-300"
                               placeholder="Пароль">
                        <div class="text-sm" v-if="errors && errors.password">{{ errors.password[0] }}</div>
                    </div>
                    <div class="mt-2 flex">
                        <label for="remember_me" class="flex items-center">
                            <input type="checkbox"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                   id="remember_me" name="remember"/>
                            <span class="ml-2 text-sm text-gray-600">Запомнить меня</span>
                        </label>
                    </div>
                    <div class="flex mt-4">
                        <button type="submit"
                                :disabled="manyRequests"
                                :class="[ manyRequests ? 'bg-indigo-200' : 'bg-indigo-600' ]"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Войти
                        </button>
                    </div>
                </form>
            </div>
        </transition>
    </div>
</template>
<script>
export default {
    props: ['route'],
    data() {
        return {
            showDropdown: false,
            errors: {},
            manyRequests: false,
            form: {
                login: null,
                password: null,
            }
        }
    },
    methods: {
        toggleDropdown() {
            this.showDropdown = !this.showDropdown
        },
        login() {
            axios.post(this.route, this.form).then(response => {
                this.reload()
                this.errors = {}
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    if (error.response.status === 429) {
                        this.manyRequests = true
                        this.errors = {}
                    }
                });
        },
        reload() {
            location.reload()
        }
    }
}
</script>
