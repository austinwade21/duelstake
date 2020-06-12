<template>
    <div class="container">

        <game></game>
        <div class="play-block-content">
            <bets-stats></bets-stats>
        </div>

    </div>
</template>


<script>

    import Game from "./Game";
    import BetsStats from "./BetsStats";

    export default {
        data(){
            return {
                isLoggedIn : null,
                name : null
            }
        },
        mounted(){
            this.isLoggedIn = localStorage.getItem('jwt')
            this.name = localStorage.getItem('user')
        },
        components: {
            Game,
            BetsStats
        },

    }
</script>
