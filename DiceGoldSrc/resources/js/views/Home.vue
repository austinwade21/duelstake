<template>
    <div class="row">
        <div class="home-main-area">
            <WelcomeArea></WelcomeArea>
            <ListGamesArea></ListGamesArea>
            <div class="container">
                <div class="play-block-content">
                    <bets-stats></bets-stats>

                </div>
            </div>
        </div>

        <my-info></my-info>
    </div>
</template>

<script>
    import Game from "../components/Game";
    import BetsStats from "../components/BetsStats";
    import MyInfo from "../components/MyInfo";
    import WelcomeArea from "../components/WelcomeArea";
    import ListGamesArea from "../components/ListGamesArea";

    export default {
        name: "Home",
        components: {
            ListGamesArea,
            WelcomeArea,
            MyInfo,
            Game,
            BetsStats
        },
        data: function data() {
            return {
                rotation: 0,
                scale: 1,
                borderRadius: 0,
            };
        },

        methods: {
            saveClicked: function saveClicked() {
                var img = this.$refs.vueavatar.getImageScaled();
                this.$refs.image.src = img.toDataURL();
            },
            onImageReady: function onImageReady() {
                this.scale = 1;
                this.rotation = 0;
            }
        }
    }

</script>

<style scoped>
    .home-main-area{
        width: 100%;
    }
    .game-area{
        padding-left: 0;
        padding-right: 0;
    }
</style>