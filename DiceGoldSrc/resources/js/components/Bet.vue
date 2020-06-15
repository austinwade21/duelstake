<template>
    <tr class="row-clickable" data-table-bet-hash="88b7edd57b5">
        <td v-if="!hidden.includes('id')" class="cell-hidden cell-hidden_4"><span
                class="link-name">{{id}}</span></td>
        <td v-if="hidden.includes('time')===false" class="cell-hidden cell-hidden_3">{{time}}</td>
        <td v-if="username && !hidden.includes('username')" class="cell-clickable" data-table-user-hash="2a584338ba"
            data-table-user-symbol="BTC"><span
                class="link-name link-name_custom"><span
                class="fas fa-user"></span> {{username}}</span></td>
        <td v-else-if="!hidden.includes('username')"><span class="ninja"><span></span>Duckling</span></td>

        <td v-if="!hidden.includes('betAmount')" class=""><span class="bet amount-icon"><span
                class="fab fa-bitcoin"></span> <strong
                class="bonus-decor">{{betAmount}}</strong></span></td>
        <td v-if="!hidden.includes('payout')" class="cell-hidden cell-hidden_2">{{payout}}</td>
        <td v-if="!hidden.includes('chance')" class="cell-hidden cell-hidden_2">{{chance}}%</td>
        <td v-if="!hidden.includes('game')" class="cell-hidden cell-hidden_1">{{game}}</td>
        <td v-if="!hidden.includes('roll')" class="cell-hidden cell-hidden_3">{{roll}}</td>
        <td v-if="profit<0 && !hidden.includes('profit')"><span class="amount-icon bet loss"><span
                class="fab fa-bitcoin"></span> <strong>{{profit}}</strong></span>
        </td>
        <td v-else-if="!hidden.includes('profit')"><span class="amount-icon bet win"><span
                class="fab fa-bitcoin"></span> <strong>{{profit}}</strong></span>
        </td>
    </tr>
</template>

<script>
    export default {
        name: "Bet",
        props: ['id', 'time', 'username', 'betAmount', 'payout', 'chance', 'game', 'roll', 'profit', 'hidden'],
    }
</script>

<style scoped>

</style>