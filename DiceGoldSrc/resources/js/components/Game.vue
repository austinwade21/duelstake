<template>
    <div id="game" class="game">
        <canvas id="game-area" style="display: none;"></canvas>
        <div class="game__field">
            <div class="game-process">
                <div class="game-bonus-element"></div>
                <div class="game-process__top">
                    <div class="game-information tutorial-step-stats">
                        <ul class="game-information__list">
                            <li>
                                <div class="game-number">Luck <span
                                        class="number number_luck">{{gameInformation.luck}}</span></div>
                                <span class="separator-dot"><span></span></span></li>
                            <li>
                                <div class="game-number">Bets <span class="number">{{gameInformation.bets}}</span></div>
                                <span class="separator-dot"><span></span></span></li>
                            <li>
                                <div class="game-number">Wins <span class="number">{{gameInformation.wins}}</span></div>
                                <span class="separator-dot"><span></span></span></li>
                            <li>
                                <div class="game-number">Losses <span class="number">{{gameInformation.losses}}</span>
                                </div>
                                <span class="separator-dot"><span></span></span></li>
                            <li>
                                <div class="game-number">Wagered <span class="number"><span
                                        class="fab fa-bitcoin"></span>&nbsp;{{gameInformation.wagered | eightDecimal}}</span>
                                </div>
                                <span class="separator-dot"><span></span></span></li>
                            <li>
                                <div class="game-number">Profit <span class="number"><span
                                        class="fab fa-bitcoin"></span>&nbsp; <span
                                        class="number-profit">{{gameInformation.profit | eightDecimal}}</span></span></div>
                            </li>
                        </ul>
                        <div data-tip="Reset game stats" class="button_link button_link-small"
                             currentitem="false"><span class="icon-refresh"></span></div>
                    </div>
                </div>
                <div class="game-animation tutorial-step-greeting" id="game-animation">
                    <div class="game-animation__low"><span v-if="bet.game_type==='high'">{{bet.game_number}} &lt;</span></div>
                    <div class="purse-container game-animation__number">
                        <div class="purse">
                            <div v-bind:class="{spin: playAnim, repeat: isRolling}" class="coin">
                                <div class="front">
                                    <span class="label">{{numbers.n1}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="purse">
                            <div v-bind:class="{spin: playAnim, repeat: isRolling}" class="coin">
                                <div class="front">
                                    <span class="label">{{numbers.n2}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="purse">
                            <div v-bind:class="{spin: playAnim, repeat: isRolling}" class="coin">
                                <div class="front">
                                    <span class="label">{{numbers.n3}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="purse">
                            <div v-bind:class="{spin: playAnim, repeat: isRolling}" class="coin">
                                <div class="front">
                                    <span class="label">{{numbers.n4}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="game-animation__high"><span v-if="bet.game_type==='low'">&lt; {{bet.game_number}}</span></div>
                </div>
                <div class="game-circle-section">
                    <div class="game-bets"></div>
                </div>
            </div>
            <div class="game-controls" tabindex="1">
                <form class="controls-form" novalidate="">
                    <div class="controls-form__buttons">
                        <div class="switch-game-btn tutorial-step-threshold on" id="game-type-low" @click="changeGameType('low')">Low</div>
                        <div class="game-buttons-wrapper">
                            <button type="submit" id="game-submit-button" @click="roll"
                                    class="tutorial-step-game-main-button game-main-button">ROLL
                            </button>
                        </div>
                        <div class="switch-game-btn" id="game-type-high" @click="changeGameType('high')">High</div>
                    </div>
                    <div class="controls-form__row row">
                        <div class="grid grid_sm2">
                            <div id="bet-amount-item" class="grid__item">
                                <div class="element-input element-input_text element-input_default tutorial-step-bet-amount">
                                    <label for="bet-amount-input">BET AMOUNT</label>
                                    <div class="element-input__holder">
                                        <div class="popover top" role="tooltip">
                                            <div class="arrow"></div>
                                            <div class="popover-content"></div>
                                        </div>
                                        <div class="element-input__group">
                                            <span class="element-input__addon element-input__addon_fill">
                                                <span class="fab fa-bitcoin"></span>
                                            </span>
                                            <input id="bet-amount-input"
                                                   v-model="bet.bet_amount"
                                                   name="bet-amount-input"
                                                   class="form-control"
                                                   placeholder="0.00000000"
                                                   />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="chance-item" class="grid__item">
                                <div class="element-input element-input_text element-input_default tutorial-step-win-chance">
                                    <label for="chance-input">WIN CHANCE(%)</label>
                                    <div class="element-input__holder">
                                        <div class="popover top" role="tooltip">
                                            <div class="arrow"></div>
                                            <div class="popover-content"></div>
                                        </div>
                                        <div class="element-input__group">
                                            <input type="text" class="form-control"
                                                   name="chance-input" id="chance-input"
                                                   placeholder="45.00" disabled
                                                   v-model="bet.chance"
                                                   />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="payout-item" class="grid__item">
                                <div class="element-input element-input_text element-input_default">
                                    <label for="payout-input">PAYOUT(x)</label>
                                    <div class="element-input__holder">
                                        <div class="popover top">
                                            <div class="arrow"></div>
                                            <div class="popover-content"></div>
                                        </div>
                                        <div class="element-input__group">
                                            <input class="form-control"
                                                   name="payout-input" id="payout-input"
                                                   placeholder="0.00000000" disabled
                                                   v-model="bet.payout"
                                                   />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profit-item" class="grid__item">
                                <div class="element-input element-input_text element-input_default">
                                    <label for="profit-amount-input">PROFIT ON WIN</label>
                                    <div class="element-input__holder">
                                        <div class="popover top" role="tooltip">
                                            <div class="arrow"></div>
                                            <div class="popover-content"></div>
                                        </div>
                                        <div class="element-input__group">
                                            <span class="element-input__addon element-input__addon_fill">
                                                <span class="fab fa-bitcoin"></span>
                                            </span>
                                            <input id="profit-amount-input"
                                                   type="text"
                                                   name="profit-amount-input"
                                                   class="form-control"
                                                   disabled
                                                   v-model="bet.profit"
                                                   min="0.0000001"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    $(document).ready(function () {
        $('.purse').each(function () {

            $(this).find('.coin').append('<div class="back"><span class="label">DG</span></div>');
            $(this).find('.coin').append('<div class="side"></div>');
            for (var i = 0; i < 16; i++)
                $(this).find('.coin').find('.side').append('<div class="spoke"></div>');
        })
    });

    export default {
        name: "Game",
        data() {
            return {
                gameInformation: {
                    luck: 'Good',
                    bets: 1234,
                    wins: 23,
                    losses: 32,
                    wagered: 123456,
                    profit: 654321,
                },
                mute: false,
                isRolling: false,
                playAnim: false,
                numbers:{ n1: 2, n2: 3, n3: 1, n4: 8, },
                bet: {
                    bet_amount: '0.0000001',
                    payout: '2.0',
                    chance: '45.0',
                    game_number: 4500,
                    game_type: 'low',
                    roll: 4532,
                    profit: '0.0000002',
                }
            }
        },
        watch:{
            'bet.bet_amount': function (val) {
                this.bet.profit = (val * parseFloat(this.bet.payout)).toFixed(8);
            },
            'bet.chance': function (val) {
                if(this.bet.game_type === 'low'){
                    this.bet.game_number = val * 100;
                }
                else{
                    this.bet.game_number = 10000 - val * 100;
                }
            },
            'bet.game_type': function (val) {
                if(val === 'low'){
                    this.bet.game_number = this.bet.chance * 100;
                }
                else{
                    this.bet.game_number = 10000 - this.bet.chance * 100;
                }
            }
        },
        methods: {
            roll(e) {
                e.preventDefault();

                if(this.isRolling){
                    return;
                }
                // coin.removeClass("spin");
                // coin.width();
                // coin.addClass("spin");
                // coin.addClass("repeat");
                this.playAnim = false;
                this.isRolling = true;
                setTimeout(() => {
                    this.playAnim = true;
                }, 10);

                // setTimeout(() => {
                //     this.numbers.n1 = "X";
                //     this.numbers.n2 = "X";
                //     this.numbers.n3 = "X";
                //     this.numbers.n4 = "X";
                // }, 500);

                axios.post('api/bet/store', {
                    'api_token': window.api_token,
                    'bet_amount': this.bet.bet_amount,
                    'payout': this.bet.payout,
                    'chance': this.bet.chance,
                    'game_number': this.bet.game_number,
                    'game_type': this.bet.game_type,
                    'roll': this.numbers.n1*1000 + this.numbers.n2*100 + this.numbers.n3*10 + this.numbers.n4,
                    'profit': this.bet.profit,
                }).then(response => {
                    // this.updateResult(response.data.data, "Request");
                });

            },
            changeGameType(type, e){
                this.bet.game_type = type;
                var low = $('#game-type-low');
                var high = $('#game-type-high');
                if(type === 'low'){
                    low.addClass('on');
                    high.removeClass('on');
                }
                else{
                    low.removeClass('on');
                    high.addClass('on');
                }
            },
            getStatistics(){
                axios.get('api/bet/statistics', {headers:{'Authorization': 'Bearer ' + window.api_token}}).then(response => {
                    this.gameInformation = response.data.data;
                    this.gameInformation.wagered = Math.abs(Math.round(parseFloat(this.gameInformation.wagered) * 100000000) / 100000000);
                    this.gameInformation.profit = Math.round(parseFloat(this.gameInformation.profit) * 100000000) / 100000000;
                });
            },
            updateResult(bet_data, fromWhere){
                if(this.isRolling){
                    this.bet.roll = bet_data.roll;
                    this.numbers.n1 = Math.floor(this.bet.roll / 1000);
                    this.numbers.n2 = Math.floor((this.bet.roll % 1000)/ 100);
                    this.numbers.n3 = Math.floor((this.bet.roll % 100)/ 10);
                    this.numbers.n4 = this.bet.roll % 10;
                    this.isRolling = false;
                    console.log(bet_data);
                    this.getStatistics();
                }
                else{
                    console.error("Update result failed!");
                }
            }
        },
        created() {
            this.getStatistics();
            window.Echo.channel('bets-channel')
                .listen('.BetCreated', (data) => {
                    if(data.bet_data.user_id === window.userid){
                        this.updateResult(data.bet_data, "Socket");
                    }
                });

        }
    }
</script>

<style scoped>

</style>