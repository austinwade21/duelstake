<template>
    <div id="app" class="row">
        <div class="flex-column col-md-12" :class="{'col-lg-9':chatOpen}">
            <Header></Header>
            <router-view/>
            <Footer></Footer>
        </div>
        <div v-show="chatOpen" class="flex-column chat col-lg-3 col-md-12">
            <chat></chat>
        </div>

    </div>
</template>

<script>
    import * as echo from "./laravel-echo-setup.js";

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
                chatOpen: 'ui/chatOpen',
            })
        },

        data(){
            return {
            }
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