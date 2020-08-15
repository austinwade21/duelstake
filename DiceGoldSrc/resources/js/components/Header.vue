<template>
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="/" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/images/logo.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="/images/logo.png" alt="" height="20">
                                </span>
                    </a>

                    <a href="/" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/images/logo.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="/images/logo.png" alt="" height="20">
                                </span>
                    </a>
                </div>
                <div class="navbar-menu">
                        <div class="navbar-menu-item">
                            Forum
                        </div>
                        <div class="navbar-menu-item">
                            Bonuses
                        </div>
                        <div class="navbar-menu-item">
                            Stats
                        </div>
                        <div class="navbar-menu-item">
                            Contest
                        </div>
                        <div class="navbar-menu-item">
                            Awards
                        </div>
                        <div class="navbar-menu-item">
                            Lottery
                        </div>
                </div>

            </div>
            <div class="d-flex">
                <RightHeader></RightHeader>
            </div>

        </div>
    </header>

</template>

<script>
    import RightHeader from "./RightHeader";

    export default {
        name: "Header",
        components: {RightHeader},
    }
</script>

<style scoped>
    .navbar-header{
        height: 70px;
    }
    .navbar-brand-box{
        margin-right: 28px;
    }
    .navbar-menu{
        display: flex;
    }
    .navbar-menu-item{
        align-items: center;
        line-height: 70px;
        font-family: Nunito,serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        display: flex;
        text-transform: capitalize;
        color: #FFFFFF;
        margin-left: 12px;
        margin-right: 12px;
        cursor: pointer;
    }
</style>