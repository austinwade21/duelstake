<template>
    <div id="app" class="row">
        <div class="flex-column col-lg-9 col-md-12">
            <Header></Header>
            <router-view/>
            <Footer></Footer>
        </div>
        <div class="flex-column chat col-lg-3 col-md-12">
            <chat></chat>
        </div>

    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import Header from "./components/Header";
    import Footer from "./components/Footer";
    import Chat from "./components/Chat";

    export default {
        name: "App",
        components: {
            Footer,
            Header,
            Chat,
        },
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