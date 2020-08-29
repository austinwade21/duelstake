<template>
    <div class="list-games">
        <div class="list-games-title">List of games</div>
        <div class="row list-games-container">
            <div class="col-sm-6 col-md-3">
                <div class="dice game-wrapper">
                    <img src="/images/Dice/Dice.svg">
                    <div class="game-text">Dice</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="roulette game-wrapper">
                    <img src="/images/Roulette/Roulette.svg">
                    <div class="game-text">Roulette</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="wheel game-wrapper">
                    <img src="/images/wheel/wheel.svg">
                    <div class="game-text">Wheel</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="crash game-wrapper">
                    <img src="/images/Crash/Crash.svg">
                    <div class="game-text">Crash</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListGamesArea"
    }
</script>

<style scoped>
    .list-games-container {
        padding: 10px 140px;
    }

    .list-games-container > div{
        padding-top: 36.3%;
        height: 0;
    }

    .game-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 90%;
        height: 80%;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin: 10px 12px;
        -webkit-background-size: cover;
        background-size: cover;
    }

    .game-wrapper .game-text {
        font-family: Nunito, serif;
        font-style: normal;
        font-weight: bold;
        font-size: 36px;
        line-height: 30px;
        color: #FFFFFF;
        margin-bottom: 50px;
    }

    .dice {
        background-image: url("/images/dice_bg.png");
    }

    .roulette {
        background-image: url("/images/roulette_bg.png");
    }

    .wheel {
        background-image: url("/images/wheel_bg.png");
    }

    .crash {
        background-image: url("/images/crash_bg.png");
    }

    .dice > img {
        width: 100%;
        margin: auto;
    }

    .roulette > img {
        width: 100%;
        height: 58%;
        margin: auto;
    }

    .wheel > img {
        height: 66%;
        margin: auto;
    }

    .crash > img {
        width: 80%;
        /* height: 100%; */
        margin: 15% auto auto 15%;
    }
</style>