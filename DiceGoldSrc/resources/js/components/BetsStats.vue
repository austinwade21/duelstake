<template>
    <div>
        <div id="bets-stats">
        <div class="tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabAllBets"
                       role="tab" aria-selected="true">
                        <span class="d-none d-sm-block">ALL BETS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabMyBets" role="tab"
                       aria-selected="false">
                        <span class="d-none d-sm-block">MY BETS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabHighRollers" role="tab"
                       aria-selected="false">
                        <span class="d-none d-sm-block">HIGH ROLLERS</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane table-responsive active" id="tabAllBets" role="tabpanel">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="cell-hidden cell-hidden_4">Bet ID</th>
                            <th class="cell-hidden cell-hidden_3">Time</th>
                            <th>Duckling</th>
                            <th>Bet Amount</th>
                            <th class="cell-hidden cell-hidden_2">Payout</th>
                            <th class="cell-hidden cell-hidden_2">Chance</th>
                            <th class="cell-hidden cell-hidden_1">Game</th>
                            <th class="cell-hidden cell-hidden_3">Roll</th>
                            <th>Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <Bet v-for="bet in allBets"
                             v-bind:key="bet.id"
                             :id="bet.id"
                             :time="bet.created_at"
                             :username="bet.username"
                             :bet-amount="bet.bet_amount"
                             :payout="bet.payout"
                             :game-number="bet.game_number"
                             :game-type="bet.game_type"
                             :chance="bet.chance"
                             :roll="bet.roll"
                             :profit="bet.profit"
                             :hidden="[]"
                        ></Bet>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane table-responsive" id="tabMyBets" role="tabpanel">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="cell-hidden cell-hidden_4">Bet ID</th>
                            <th>Time</th>
                            <th>Bet Amount</th>
                            <th class="cell-hidden cell-hidden_2">Payout</th>
                            <th class="cell-hidden cell-hidden_2">Chance</th>
                            <th class="cell-hidden cell-hidden_2">Game</th>
                            <th>Roll</th>
                            <th>Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <Bet v-for="bet in myBets"
                             v-bind:key="bet.id"
                             :id="bet.id"
                             :time="bet.created_at"
                             :username="bet.username"
                             :bet-amount="bet.bet_amount"
                             :payout="bet.payout"
                             :game-number="bet.game_number"
                             :game-type="bet.game_type"
                             :chance="bet.chance"
                             :roll="bet.roll"
                             :profit="bet.profit"
                             :hidden="['username']"
                        ></Bet>
                        <tr v-if="!myBets.length">
                            <td class="table-empty-td" colspan="9" style="text-align: center;">No bets
                                yet
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane table-responsive " id="tabHighRollers" role="tabpanel">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="cell-hidden cell-hidden_4">Bet ID</th>
                            <th class="cell-hidden cell-hidden_3">Time</th>
                            <th>Duckling</th>
                            <th>Bet Amount</th>
                            <th class="cell-hidden cell-hidden_2">Payout</th>
                            <th class="cell-hidden cell-hidden_2">Chance</th>
                            <th class="cell-hidden cell-hidden_1">Game</th>
                            <th class="cell-hidden cell-hidden_3">Roll</th>
                            <th>Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <Bet v-for="bet in highRollers"
                             v-bind:key="bet.id"
                             :id="bet.id"
                             :time="bet.created_at"
                             :username="bet.username"
                             :bet-amount="bet.bet_amount"
                             :payout="bet.payout"
                             :game-number="bet.game_number"
                             :game-type="bet.game_type"
                             :chance="bet.chance"
                             :roll="bet.roll"
                             :profit="bet.profit"
                             :hidden="[]"
                        ></Bet>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    import Bet from "./Bet";
    import {EventBus} from '../app.js';

    export default {
        name: "BetsStats",
        components: {
            Bet,
        },
        data() {
            return {
                allBets: [
                    {
                        bet_amount: "0.0000001",
                        chance: "40",
                        created_at_str: "12:04:30",
                        game_number: 1234,
                        game_type: "low",
                        id: 61,
                        payout: "1.98",
                        profit: "0.00000009",
                        roll: 9491,
                        created_at: "2020-06-21T12:04:30.000000Z",
                        updated_at: "2020-06-21T12:04:30.000000Z",
                        user_id: 1
                    },
                ],
                myBets: [
                    {
                        id: '88b7edd57b5',
                        time: '17:17:41',
                        username: 'ajib8888',
                        betAmount: '0.00000266',
                        payout: '0.34x',
                        chance: '50',
                        game: '< 5000',
                        roll: '2537',
                        profit: -0.00000250,
                    },
                    {
                        id: 'ebe4d6684d4',
                        time: '17:17:40',
                        username: 'Dandiego',
                        betAmount: '0.00000250',
                        payout: '0x',
                        chance: '0.23',
                        game: '< 23',
                        roll: '1678',
                        profit: '0.00000750',
                    },
                    {
                        id: '88b7edda57b',
                        time: '17:17:41',
                        username: 'LordPanic',
                        betAmount: '0.00000250',
                        payout: '0x',
                        chance: '0.23',
                        game: '> 5333',
                        roll: '2537',
                        profit: '-0.00000250',
                    },
                    {
                        id: '88b7e5657b5',
                        time: '17:17:41',
                        username: '',
                        betAmount: '0.00000250',
                        payout: '0x',
                        chance: '0.23',
                        game: '< 8555',
                        roll: '2537',
                        profit: -0.00000250,
                    },

                ],
                highRollers: [
                    {
                        id: 'ebe4d6684d4',
                        time: '17:17:40',
                        username: 'Dandiego',
                        betAmount: '0.00000250',
                        payout: '0x',
                        chance: '0.23',
                        game: '< 23',
                        roll: '1678',
                        profit: '0.00000750',
                    },
                    {
                        id: '88b7edda57b',
                        time: '17:17:41',
                        username: 'LordPanic',
                        betAmount: '0.00000250',
                        payout: '0x',
                        chance: '0.23',
                        game: '> 5333',
                        roll: '2537',
                        profit: '-0.00000250',
                    },
                ],
            }
        },
        created() {
            window.Echo.channel('bets-channel')
                .listen('.BetCreated', (data) => {
                    if(data.bet_data.user_id === window.userid){
                        return;
                    }
                    this.allBets.unshift(data.bet_data);
                    this.allBets.length = Math.min(this.allBets.length, 10);
                });

            axios.get('api/bet/index', {headers:{'Authorization': 'Bearer ' + window.api_token}}).then(response => {
                this.allBets = response.data.data.allBets;
                this.myBets = response.data.data.myBets;
                window.userid = response.data.data.userid;
            });

            const self1 = this;
            EventBus.$on('animation-finished', function (bet) {
                self1.myBets.unshift(bet);
                self1.allBets.unshift(bet);
                self1.allBets.length = Math.min(self1.allBets.length, 10);
                self1.myBets.length = Math.min(self1.myBets.length, 10);
            })
        }
    }
</script>

<style scoped>

</style>