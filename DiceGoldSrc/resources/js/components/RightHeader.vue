<template>
    <div id="right-header">
        <div class="right-header" v-if="!authenticated">
            <div class="menu-login" @click="showLogin">
                Login
            </div>

            <div class="btn btn-primary menu-register" @click="showRegister">Register</div>
            <div class="icon-button" href="#" id="chat-switcher" @click="setChatOpen()"><i
                    class="fas fa-comments align-middle"></i></div>

        </div>
        <div class="right-header" v-else>
            <div class="menu-profile dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-balances-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="header-currency-icon">
                        <i class="fab fa-btc"></i>
                    </span>
                    <span class="d-none d-xl-inline-block ml-2 mr-2">0.0000010
                            </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- Right Side Of Navbar -->
                    <!-- Authentication Links -->
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myInfoDialog">
                        <i class="fas fa-user align-middle mr-1"></i> My Info</a>
                    <a class="dropdown-item d-block" href="#" data-toggle="modal" data-target="#settingsDialog"><i
                            class="fa fa-cog align-middle mr-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href=""><i
                            class="fas fa-power-off align-middle mr-1 text-danger"></i> Logout
                    </a>

                </div>
            </div>

            <div class="btn btn-primary menu-deposit">Deposit</div>
            <div class="menu-profile dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="profile-image" class="rounded-circle header-profile-user"
                         :src="'/storage/' + user.avatar"
                         alt="HA">
                    <span class="d-none d-xl-inline-block ml-2 mr-2">{{user.user_name}}
                            </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- Right Side Of Navbar -->
                    <!-- Authentication Links -->
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myInfoDialog"><i class="fas fa-user align-middle mr-1"></i> My Info</a>
                    <a class="dropdown-item d-block" href="#" data-toggle="modal" data-target="#settingsDialog"><i
                            class="fa fa-cog align-middle mr-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="" @click.prevent="signOut"><i
                            class="fas fa-power-off align-middle mr-1 text-danger"></i> Logout
                    </a>

                </div>
            </div>
            <div class="icon-button" href="#" id="view-notification"><i
                    class="fas fa-bell align-middle"></i></div>
            <div class="icon-button" href="#" id="chat-switcher" @click="setChatOpen()"><i
                    class="fas fa-comments align-middle"></i></div>

        </div>
        <LogIn v-show="isShowLogIn" @close="closeLogIn" @register="showRegister"></LogIn>
        <Register v-show="isShowRegister" @close="closeRegister" @login="showLogin"></Register>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";
    import LogIn from "./Forms/LogIn";
    import Register from "./Forms/Register";

    export default {
        name: "RightHeader",
        components: {Register, LogIn},
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },
        methods: {
            ...mapActions({
                logOutAction: 'auth/logOut',
                setChatOpen: 'ui/setChatOpen',
            }),

            async signOut () {
                await this.logOutAction();

                this.$router.replace({ name: 'Home' })
            },

            closeLogIn() {
                this.isShowLogIn = false;
            },

            closeRegister(){
                this.isShowRegister = false;
            },

            showLogin(){
                this.isShowRegister = false;
                this.isShowLogIn = true;
            },

            showRegister() {
                this.isShowRegister = true;
                this.isShowLogIn = false;
            },
        },

        data() {
            return {
                isShowLogIn: false,
                isShowRegister: false,
            }
        },
    }
</script>

<style scoped>
    .right-header{
        display: flex;
    }
    .right-header > div{
        margin: auto 5px;
    }
    .header-item{
        height: 40px;
    }
    .header-profile-user{
        height: 32px;
        width: 32px;
        padding: 0;
    }
    .menu-login{
        font-family: Nunito,serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        color: #FFFFFF;
        cursor: pointer;
    }
    #page-header-balances-dropdown,
    #page-header-user-dropdown{
        border: solid 1px #CCC4;
        display: flex;
        align-items: center;
        padding: 0 20px;
    }

    .btn-primary{
        width: 114px;
        height: 40px;
        font-family: Nunito,serif;
        font-style: normal;
        font-weight: bold;
    }
    .icon-button{
        border: solid 1px #CCC4;
        border-radius: 3px;
        /*padding: 8px 6px;*/
        width: 40px;
        height: 40px;
        align-items: center;
        text-align: center;
        display: flex;
        cursor: pointer;
    }

    .icon-button > i{
        margin: auto;
        font-size: 18px;
    }
</style>