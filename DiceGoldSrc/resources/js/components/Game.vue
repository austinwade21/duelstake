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
                                        class="fab fa-bitcoin"></span>&nbsp;{{gameInformation.wagered}}</span>
                                </div>
                                <span class="separator-dot"><span></span></span></li>
                            <li>
                                <div class="game-number">Profit <span class="number"><span
                                        class="fab fa-bitcoin"></span>&nbsp; <span
                                        class="number-profit">{{gameInformation.profit}}</span></span></div>
                            </li>
                        </ul>
                        <div data-tip="Reset game stats" class="button_link button_link-small"
                             currentitem="false"><span class="icon-refresh"></span></div>
                    </div>
                </div>
                <div class="game-animation tutorial-step-greeting" id="game-animation">
                    <div class="game-animation__low"></div>
                    <div class="purse-container game-animation__number">
                        <div class="purse">
                            <div class="coin">
                                <div class="front">
                                    <span class="label">{{numbers.n1}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="purse">
                            <div class="coin">
                                <div class="front">
                                    <span class="label">{{numbers.n2}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="purse">
                            <div class="coin">
                                <div class="front">
                                    <span class="label">{{numbers.n3}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="purse">
                            <div class="coin">
                                <div class="front">
                                    <span class="label">{{numbers.n4}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="game-animation__high">&lt; 5000</div>
                </div>
                <div class="game-circle-section">
                    <div class="game-bets"></div>
                </div>
            </div>
            <div class="game-controls" tabindex="1">
                <form class="controls-form" novalidate="">
                    <div class="controls-form__buttons">
                        <div class="switch-game-btn tutorial-step-threshold on">Low</div>
                        <div class="game-buttons-wrapper">
                            <button type="submit" id="game-submit-button" @click="roll"
                                    class="tutorial-step-game-main-button game-main-button">ROLL
                            </button>
                        </div>
                        <div class="switch-game-btn">High</div>
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
                                                   type="text"
                                                   name="bet-amount-input"
                                                   class="form-control"
                                                   placeholder="0.00000000"
                                                   value="0.00000010"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="chance-item" class="grid__item">
                                <div class="element-input element-input_text element-input_default tutorial-step-win-chance">
                                    <label for="chance-input">WIN CHANCE</label>
                                    <div class="element-input__holder">
                                        <div class="popover top" role="tooltip">
                                            <div class="arrow"></div>
                                            <div class="popover-content"></div>
                                        </div>
                                        <div class="element-input__group">
                                            <input type="text" class="form-control"
                                                   name="chance-input" id="chance-input"
                                                   placeholder="50.00%"
                                                   value="50%"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="payout-item" class="grid__item">
                                <div class="element-input element-input_text element-input_default">
                                    <label for="payout-input">PAYOUT</label>
                                    <div class="element-input__holder">
                                        <div class="popover top">
                                            <div class="arrow"></div>
                                            <div class="popover-content"></div>
                                        </div>
                                        <div class="element-input__group">
                                            <input type="text" class="form-control"
                                                   name="payout-input" id="payout-input"
                                                   placeholder="0.00000000"
                                                   value="1.98x"/>
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
                                                   value="0.00000009"
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

    // $(document).on('click', '#game-submit-button', function(e){
    //     e.preventDefault();
    //     $('.purse').each(function(){
    //         $(this).replaceWith($(this).clone());
    //     });
    // });
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
                numbers:{ n1: 2, n2: 3, n3: 1, n4: 8, }
            }
        },
        methods: {
            roll(e) {
                e.preventDefault();
                var coin = $('.coin');
                coin.removeClass("spin")
                coin.width();
                coin.addClass("spin");

                setTimeout(() => {
                    this.numbers.n1 = Math.floor(Math.random() * 10);
                    this.numbers.n2 = Math.floor(Math.random() * 10);
                    this.numbers.n3 = Math.floor(Math.random() * 10);
                    this.numbers.n4 = Math.floor(Math.random() * 10);
                    }, 1000);

                this.gameInformation.wagered = Math.floor(Math.random() * 100000);
            }
        },
    }
</script>

<style scoped>

</style>