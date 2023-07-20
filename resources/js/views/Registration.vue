<template>
    <b-container class="bv-example-row bv-example-row-flex-cols">
        <b-row align-h="center" align-v="center" style="height: 100vh">
            <b-col>
                <img src="/img/3594607.png" alt="Фото" class="img-fluid">
            </b-col>
            <b-col cols="12" sm="6" md="4">
                <b-card border-variant="light">
                    <div class="card__body">
                        <h2 class="card__title">Хай!</h2>
                        <span>Создайте новую учетную запись</span>
                        <b-form>
                            <b-form-group label="Имя пользователя...">
                                <b-form-input
                                    v-model="name"
                                    type="text"
                                    id="name"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group label="Электронная почта...">
                                <b-form-input
                                    v-model="email"
                                    type="email"
                                    id="name"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group label="Пароль...">
                                <b-form-input
                                    v-model="password"
                                    type="password"
                                    id="password"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group label="Подтвердить Пароль...">
                                <b-form-input
                                    v-model="password_confirmation"
                                    type="password"
                                    id="password"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-button @click.prevent = 'register' class="mt-2" type="submit" variant="primary">Регистрация</b-button>
                        </b-form>
                    </div>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: "Registr",

    data(){
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null
        }
    },

    methods:{
        register(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                    .then(response => {
                    })
                    .catch(err => {
                    })
            })
        }
    }
}
</script>

<style scoped>

</style>
