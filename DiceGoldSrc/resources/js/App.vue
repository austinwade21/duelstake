<template>
    <div id="app">
        <Header></Header>
        <div id="nav">
            <router-link to="/">Home</router-link> |
            <template v-if="!authenticated">
                <router-link to="/signin">Sign in</router-link> |
            </template>
            <template v-else>
                <router-link to="/account">{{ user.user_name }}</router-link> |
                <a href="#" @click.prevent="signOut">Sign out</a>
            </template>
        </div>
        <router-view/>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import Header from "./components/Header";

    export default {
        name: "App",
        components: {Header},
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },

        methods: {
            ...mapActions({
                signOutAction: 'auth/signOut'
            }),

            async signOut () {
                await this.signOutAction()

                this.$router.replace({ name: 'home' })
            }
        }
    }
</script>