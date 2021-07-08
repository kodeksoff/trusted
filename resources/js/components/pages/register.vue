<template>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" @submit.prevent="post">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="login" class="block text-sm font-medium text-gray-700">
                                login
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="login" id="login" v-model="form.login"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="Логин">
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                E-mail
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="email" name="email" id="email" v-model="form.email"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="Логин">
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Пароль
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="password" name="password" id="password" v-model="form.password"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="www.example.com">
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Повторите пароль
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       v-model="form.password_confirmation"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="www.example.com">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    props: ['route'],
    data() {
        return {
            form: {
                login: null,
                email: null,
                password: null,
                password_confirmation: null
            }
        }
    },
    methods: {
        post: function () {
            axios.post(this.route, this.form)
                .then()
                .catch(err => console.log(err));
        }
    }
}
</script>
