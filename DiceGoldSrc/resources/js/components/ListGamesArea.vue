<template>
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

    .game-wrapper {
        width: 270px;
        height: 300px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin: 10px 14px;
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
        width: 224px;
        height: 174px;
    }

    .roulette > img {
        width: 174px;
        height: 174px;
    }

    .wheel > img {
        width: 175px;
        height: 201px;
    }

    .crash > img {
        width: 177px;
        height: 146px;
    }
</style>