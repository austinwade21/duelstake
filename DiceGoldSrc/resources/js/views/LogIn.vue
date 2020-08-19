<template>
    <transition name="modal" appear>
        <div class="modal modal-overlay" @click.self="$emit('close')">
            <div class="modal-window" :style="{ width: width + 'px', height: height + 'px'}">
                <div class="modal-content">
                    <form action="#" @submit.prevent="submit">
                        <div class="title">
                            LOGIN
                        </div>
                        <div class="form-group">
                            <div class="form-label">
                                <label for="email">Enter Email</label>
                            </div>
                            <div class="form-input">
                                <span class="input-icon">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input id="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="enter email"
                                       v-model="form.email"
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-input">
                                <span class="input-icon">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input id="password"
                                       name="password"
                                       type="password"
                                       class="form-control"
                                       placeholder="enter password"
                                       v-model="form.password"
                                />
                            </div>
                        </div>
                        <div class="form-group form-button">
                            <button class="btn btn-primary full-width" type="submit">
                                Sign in
                            </button>
                        </div>
                        <div class="social-label">
                            or Continue with these social profiles
                        </div>
                        <div class="social-login-buttons">
                            <div class="social-login-wrapper">
                                <div class="social-login-google">
                                    <i class="fab fa-google"></i>
                                </div>
                                <div class="social-login-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                                <div class="social-login-twitter">
                                    <i class="fab fa-twitter"></i>
                                </div>
                            </div>
                        </div>
                        <div class="sign-up-block">
                            <span class="sign-up-text">
                                Don't have Account? &nbsp;<a class="sign-up-link" @click.self="$emit('register')">Sign up</a>
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import axios from 'axios'
    import {mapActions} from 'vuex'

    export default {
        name: 'LogIn',

        data() {
            return {
                form: {
                    email: '',
                    password: '',
                },
                width: 840,
                height: 560,
            }
        },

        methods: {
            ...mapActions({
                logIn: 'auth/logIn'
            }),

            async submit() {
                await this.logIn(this.form);

                this.$router.replace({name: 'home'});
                this.$emit('close');
            }
        }
    }
</script>

<style lang="scss">
    body{
        font-family: Nunito, serif;
    }
        .modal {
        &.modal-overlay {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            z-index: 2901;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        &-window {
            position: absolute;
            overflow: hidden;
            font-weight: bold;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        &-content {
            padding: 30px 70px;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            height: 100%;
            background-color: #1D222E;
            background-image: url('/images/login_background.jpg');
            background-position-x: 100px;
            background-repeat: no-repeat;

        }

        &-content:after{
        }

        &-footer {
            background: #CCCCCC;
            padding: 10px;
            text-align: right;
            height: 30px;
        }
    }

    .form-group{
        margin-top: 20px;
    }

    .form-input{
        display: flex;
        line-height: 100%;
        align-items: center;
    }

    .input-icon{
        display: table-cell;
        font-size: 16px;
        height: 100%;
        line-height: 10px;
        width: 40px;
        padding: 7px 0;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover,
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
        -webkit-text-fill-color: white;
        -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.1) inset;
        transition: background-color 5000s ease-in-out 0s;
        background: transparent;
    }
    .form-input > input{
        background: rgba(255, 255, 255, 0.2);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        padding-left: 40px;
        margin-left: -40px;
    }
    .form-input > input:focus{
        background: rgba(255, 255, 255, 0.1);
        color: #FFFFFF;
        border-color: #FFFFFF;
    }
    .form-label{
        font-size: 12px;
        font-weight: 600;
    }
    .full-width{
        width: 100%;
    }

    .btn{
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }

</style>
<style scoped>
    form{
        width: 260px;
    }

    .btn-primary{
        height: 44px;
        margin-top: 10px;
        font-weight: bold;
    }
    input{
        height: 44px;
    }
    .title{
        font-family: 'Nunito', serif;
        font-size: 30px;
        font-weight: bold;
        text-transform: uppercase;
        color: #FFFFFF;
    }
    .social-label{
        font-size: 12px;
        text-align: center;
        margin: 20px;
    }
    .social-login-buttons{
        display: flex;
        text-align: center;
        align-items: center;
        margin: 0;
    }
    .social-login-wrapper > div{
        width: 35px;
        height: 35px;
        display: flex;
        text-align: center;
        align-items: center;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: solid 1px rgba(255, 255, 255, 0.2);
        margin: 0 7px;
        cursor: pointer;
    }
    .social-login-wrapper{
        margin: auto;
        display: flex;
    }
    .social-login-wrapper i{
        margin: auto;
        color: #FFFFFF;
    }
    .sign-up-block{
        margin-top: 65px;
        font-size: 14px;
        color: #FFF;
        font-weight: 200;
    }
    .sign-up-link{
        color: #5664D2;
        cursor: pointer;
    }
    .sign-up-link:hover{
        color: #8888D2;
    }
</style>