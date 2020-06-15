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
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabJackPots" role="tab"
                       aria-selected="false">
                        <span class="d-none d-sm-block">JACKPOTS</span>
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
                             :time="bet.time"
                             :username="bet.username"
                             :bet-amount="bet.betAmount"
                             :payout="bet.payout"
                             :game="bet.game"
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
                             :time="bet.time"
                             :username="bet.username"
                             :bet-amount="bet.betAmount"
                             :payout="bet.payout"
                             :game="bet.game"
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
                             :time="bet.time"
                             :username="bet.username"
                             :bet-amount="bet.betAmount"
                             :payout="bet.payout"
                             :game="bet.game"
                             :chance="bet.chance"
                             :roll="bet.roll"
                             :profit="bet.profit"
                             :hidden="[]"
                        ></Bet>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane table-responsive" id="tabJackPots" role="tabpanel">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="cell-hidden cell-hidden_4">Bet ID</th>
                            <th class="cell-hidden cell-hidden_3">Time</th>
                            <th>Duckling</th>
                            <th>Bet Amount</th>
                            <th class="cell-hidden cell-hidden_2">Percent</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <Bet v-for="bet in jackpots"
                             v-bind:key="bet.id"
                             :id="bet.id"
                             :time="bet.time"
                             :username="bet.username"
                             :bet-amount="bet.betAmount"
                             :payout="bet.payout"
                             :game="bet.game"
                             :chance="bet.chance"
                             :roll="bet.roll"
                             :profit="bet.profit"
                             :hidden="['payout', 'game', 'roll']"
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

    export default {
        name: "BetsStats",
        components: {
            Bet,
        },
        data() {
            return {
                allBets: [
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
                jackpots: [
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
            }
        },
    }
</script>

<style scoped>

</style>