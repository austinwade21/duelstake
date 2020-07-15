<template>
    <tr class="row-clickable" data-table-bet-hash="88b7edd57b5">
        <td v-if="!hidden.includes('id')" class="cell-hidden cell-hidden_4"><span
                class="link-name">{{id}}</span></td>
        <td v-if="hidden.includes('time')===false" class="cell-hidden cell-hidden_3">{{time | toLocalTimeString}}</td>
        <td v-if="username && !hidden.includes('username')" class="cell-clickable" data-table-user-hash="2a584338ba"
            data-table-user-symbol="BTC"><span
                class="link-name link-name_custom"><span
                class="fas fa-user"></span> {{username}}</span></td>
        <td v-else-if="!hidden.includes('username')"><span class="ninja"><span></span>Duckling</span></td>

        <td v-if="!hidden.includes('betAmount')" class=""><span class="bet amount-icon"><span
                class="fab fa-bitcoin"></span> <strong
                class="bonus-decor">{{betAmount}}</strong></span></td>
        <td v-if="!hidden.includes('payout')" class="cell-hidden cell-hidden_2">{{payout | oneDecimal}}x</td>
        <td v-if="!hidden.includes('chance')" class="cell-hidden cell-hidden_2">{{chance | oneDecimal}}%</td>
        <td v-if="!hidden.includes('gameNumber')" class="cell-hidden cell-hidden_1">
            <span v-if="gameType==='low'"> < </span><span v-else> > </span>{{gameNumber}}</td>
        <td v-if="!hidden.includes('roll')" class="cell-hidden cell-hidden_3">{{roll}}</td>
        <td v-if="profit<0 && !hidden.includes('profit')"><span class="amount-icon bet loss"><span
                class="fab fa-bitcoin"></span> <strong>{{profit | eightDecimal}}</strong></span>
        </td>
        <td v-else-if="!hidden.includes('profit')"><span class="amount-icon bet win"><span
                class="fab fa-bitcoin"></span> <strong>{{ profit | eightDecimal }}</strong></span>
        </td>
    </tr>
</template>

<script>
    export default {
        name: "Bet",
        props: ['id', 'time', 'username', 'betAmount', 'payout', 'chance', 'gameNumber', 'gameType', 'roll', 'profit', 'hidden'],
    }
</script>

<style scoped>

</style>