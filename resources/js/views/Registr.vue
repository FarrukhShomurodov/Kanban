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
                            <b-form-group label="Электронная почта...">
                                <b-form-input
                                    type="email"
                                    id="name"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group label="Пароль...">
                                <b-form-input
                                    type="password"
                                    id="password"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-button class="mt-2" type="submit" variant="primary">Регистрация</b-button>
                            <div class="mt-2">
                                <p>У вас уже есть учетная запись?
                                    <router-link to="/login"> Войти</router-link>
                                </p>
                            </div>
                        </b-form>
                    </div>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: "Registr"
}
</script>

<style scoped>

</style>
