<template>
    <transition name="modal" appear>
        <div class="modal modal-overlay" @click.self="$emit('close')">
            <div class="modal-window" :style="{ width: width + 'px', height: height + 'px'}">
                <div class="modal-content">
                    <form action="#" @submit.prevent="submit">
                        <div class="title">
                            LOGIN
                        </div>
                        <div>
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
                        <div>
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
                        <div class="form-button">
                            <button class="btn btn-primary full-width" type="submit">
                                Sign in
                            </button>
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

                this.$router.replace({name: 'home'})
            }
        }
    }
</script>

<style lang="scss">
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
            background: rgba(0, 0, 0, 0.7);
        }

        &-window {
            position: absolute;
            overflow: hidden;
            font-family: "Roboto",serif;
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
        width: 34px;
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
    }
    .form-input > input{
        background: rgba(255, 255, 255, 0.2);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        padding-left: 38px;
        margin-left: -34px;
    }
    .form-input > input:focus{
        background: rgba(255, 255, 255, 0.1);
        color: #FFFFFF;
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
    }
    input{
        height: 44px;
    }
</style>