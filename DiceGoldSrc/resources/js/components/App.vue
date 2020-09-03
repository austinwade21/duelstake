<template>
</template>


<script>

    import * as echo from "../laravel-echo-setup.js";

    import Game from "./Game";
    import BetsStats from "./BetsStats";
    import Chat from "./Chat";
    import MyInfo from "./MyInfo";

    export default {
        components: {
            MyInfo,
            Chat,
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
