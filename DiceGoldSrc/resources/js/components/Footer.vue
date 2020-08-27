<template>
    <div class="footer">
        <div class="row footer-top">

        </div>
        <div class="row footer-middle">
            <div class="col-md-4">
                <a href="/" class="logo">
                    <span class="logo-sm">
                        <img src="/images/logo.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo.png" alt="" height="36">
                    </span>
                </a>
            </div>
            <div class="col-md-8 row">
                <div class="col-md-3">
                    <div class="footer-menu-item top">
                        Casino
                    </div>
                    <div class="footer-menu-item">
                        Games
                    </div>
                    <div class="footer-menu-item">
                        VIP Club
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-menu-item top">
                        Support
                    </div>
                    <div class="footer-menu-item">
                        Fairness
                    </div>
                    <div class="footer-menu-item">
                        Affiliate
                    </div>
                    <div class="footer-menu-item">
                        Gamble Aware
                    </div>
                    <div class="footer-menu-item">
                        Live Support
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-menu-item">
                        Community
                    </div>
                    <div class="footer-menu-item">
                        Blog
                    </div>
                    <div class="footer-menu-item">
                        Forum
                    </div>
                    <div class="footer-menu-item">
                        Facebook
                    </div>
                    <div class="footer-menu-item">
                        Twitter
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-menu-item top">
                        About Us
                    </div>
                    <div class="footer-menu-item">
                        Privacy Policy
                    </div>
                    <div class="footer-menu-item">
                        Terms of Service
                    </div>
                    <div class="footer-menu-item">
                        Self Exclusion
                    </div>
                    <div class="footer-menu-item">
                        Change Feed
                    </div>
                    <div class="footer-menu-item">
                        Primedice
                    </div>
                </div>

            </div>
        </div>
        <div class="row footer-bottom">

        </div>
    </div>
</template>

<script>
    export default {
        name: "Footer"
    }
</script>

<style scoped>
    .footer{
        position: relative;
        background: #161A24;
    }

    .footer-top{
        height: 100px;
        background: #212635;
        padding: 20px 140px;
    }
    .footer-middle{
        height: 264px;
        padding: 60px 0px;
    }
    .footer-bottom{
        height: 64px;
        border-top: solid 1px #212635;
        padding: 10px 140px;
    }

    .footer-menu-item{
        font-size: 16px;
        color: #FFFFFF;
        line-height: 22px;
        font-weight: normal;
        margin: 7px;
    }
</style>