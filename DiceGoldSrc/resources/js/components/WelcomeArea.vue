<template>
    <div class="welcome-container">
        <div class="img-carousel">
            <carousel :per-page="1">
                <slide>
                    <img class="carousel-img" src="/images/herobg.png" alt="">
                </slide>
            </carousel>
        </div>
        <div class="welcome-contents">
            <div class="welcome-package">
                <div class="row">
                    <div class="welcome-package-left col-md-6">
                        <div class="icon-gift">
                            <i class="fas fa-gift"></i>
                        </div>
                        <div class="welcome-package-text">
                            Welcome package
                        </div>
                        <div class="welcome-read-more">
                            Read more &nbsp;<i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="welcome-package-right col-md-6">
                        <div class="welcome-btc">
                            5 BTC
                        </div>
                        <div class="welcome-btc-or">
                            or
                        </div>
                        <div class="welcome-btc-text">
                            5 BTC + <span>180 FREE SPINS</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-bonus">
                <form>
                    <div class="sign-up-text">
                        Sign up and get your
                    </div>
                    <div class="welcome-bonus-title">
                        Welcome Bonus!
                    </div>
                    <div class="email-password-inputs row">
                        <div class="email-input col-md-6 form-group">
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="email-input form-group col-md-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="currency-select">
                        <select class="form-control">
                            <option>Select</option>
                            <option>Large select</option>
                            <option>Small select</option>
                        </select>
                    </div>
                    <div class="sign-up-button-area row">
                        <div class="terms-checkbox col-md-6 form-group">
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="terms-check">
                                <label class="custom-control-label" for="terms-check">I accept the terms and conditions and privacy policy</label>
                            </div>
                        </div>
                        <div class="email-input form-group col-md-6">
                            <button type="button" class="btn btn-primary btn-signup">Sign Up</button>
                        </div>
                    </div>
                    <div class="have-bonus-code-text">
                        I have a bonus code
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {Carousel, Slide} from 'vue-carousel';

    export default {
        name: "WelcomeArea",
        components: {
            Carousel,
            Slide
        },
    }
</script>

<style scoped>
    .welcome-container{
        margin: 70px 0 0 0;
    }

    .welcome-contents{
        position: absolute;
        top: 100px;
        left: 140px;
    }
    .welcome-package{
        width: 515px;
        height: 152px;
        background: #1D222ECC;
        padding: 25px 40px;
        color: #FFFFFF;
    }
    .welcome-package > div{
        height: 100%;
    }

    .welcome-bonus,
    .welcome-package-right,
    .welcome-package-left{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .icon-gift{
        font-size: 24px;
    }
    .welcome-package-text{
        font-size: 22px;
        font-weight: bold;
    }
    .welcome-read-more{
        font-size: 14px;
        font-weight: bold;
        color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
    }
    .welcome-read-more > i {
        font-size: 10px;
    }
    .carousel-img{
        width: 100%;
        height: 630px;
        object-fit: cover;
    }
    .img-carousel:after{
        content:'';
        position:absolute;
        left:0; top:0;
        width:100%; height:100%;
        display:inline-block;
        background: linear-gradient(93.08deg, #1D222E -16.47%, rgba(29, 34, 46, 0) 65.3%);
    }
    .VueCarousel-slide{
        display: contents;
    }
    .welcome-btc{
        font-size: 36px;
        line-height: 36px;
        font-weight: bold;
    }
    .welcome-btc-or{
        color: rgba(255, 255, 255, 0.5);
        font-size: 20px;
        font-weight: normal;
    }
    .welcome-btc-text{
        font-size: 16px;
        font-weight: 600;
    }
    .welcome-btc-text > span{
        color: #FFC841;
    }

    .welcome-bonus{
        width: 515px;
        height: 368px;
        background: #1D222ECC;
        padding: 25px 40px;
        color: #FFFFFF;
        margin-top: 20px;
    }
    .form-control{
        height: 44px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }
    .btn-signup{
        width: 100%;
        height: 44px;
        font-size: 16px;
        font-weight: bold;
    }
    .terms-checkbox{
        font-size: 12px;
        color: #FFFFFF99;
        font-weight: normal;
    }
    .sign-up-text{
        font-size: 18px;
        line-height: 25px;
        font-weight: normal;
        color: #FFFFFF99;
    }
    .welcome-bonus-title{
        margin-top: 5px;
        font-size: 30px;
        line-height: 41px;
        font-weight: 600;
        color: #FFC841;
    }
    .have-bonus-code-text{
        margin: 0;
        line-height: 14px;
        text-align: right;
        font-size: 14px;
        font-weight: normal;
        color: #FFFFFF88;
        cursor: pointer;
    }
</style>