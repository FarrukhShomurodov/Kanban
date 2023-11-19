<template>
    <b-container class="bv-example-row bv-example-row-flex-cols">
        <b-row align-h="center" align-v="center" style="height: 100vh">
            <b-col>
                <b-img src="/img/3594607.png" fluid alt="Фото"></b-img>
            </b-col>
            <b-col cols="12" sm="6" md="4">
                <b-card border-variant="light">
                    <h2>Добро пожаловать</h2>
                    <span>Войдите в систему, чтобы продолжить</span>
                    <b-form>
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
                            <!--                <div class="mt-2">-->
                            <!--                    <a href="#">Забыли пароль?</a>-->
                            <!--                </div>-->
                        </b-form-group>
                        <b-button @click.prevent="login" class="mt-2" type="submit" variant="primary">Войти</b-button>
                    </b-form>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            email: null,

            password: null,
        }
    },
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', {
                    email: this.email,
                    password: this.password
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
